<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DateInterval;

use DateTime;


use App\Apartment;
use App\Plan;
use App\User;
use Illuminate\Support\Facades\Auth;


class PaymentController extends Controller
{
    public function plans(Apartment $apartment)
    {
        
        $plans = Plan::All();
        return view('user.sponsorship.plans', compact('plans', 'apartment'));
    }

    public function index(Apartment $apartment, $plan_id)
    {
        $plan = Plan::where('id', $plan_id)->first();
        $gateway = new \Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

        $token = $gateway->ClientToken()->generate();


        return view('user.sponsorship.index', ['token' => $token, 'user' => $apartment->user_id, 'plan' => $plan, 'apartment_id' => $apartment->id]);
    }

    public function checkout(Request $request, $apartment_id, $plan_id)
    {
        $apartment = Apartment::where('id', $apartment_id)->with('plans')->first();
        $plan = Plan::where('id', $plan_id)->first();

        if ($apartment->user_id != auth()->id() || $plan->price != $request->amount) {
            return redirect()->route('user.apartments.index');
        }

        $user = User::where('id', auth()->id())->first();

        $gateway = new \Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

        $amount = $request->amount;
        $nonce = $request->payment_method_nonce;

        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'customer' => [
                'firstName' => $user['name'],
                'lastName' => $user['surname'],

            ],
            'options' => [
                'submitForSettlement' => true
            ]
        ]);


        if ($result->success) {
            $transaction = $result->transaction;

            $dateCreation = new DateTime();

            $dateStart = $dateCreation;
            
            foreach ($apartment->plans as $sponsorship) {
                $tempDate = DateTime::createFromFormat('Y-m-d H:i:s', $sponsorship->pivot->date_end);
                if ($tempDate > $dateStart) {
                    $dateStart = $tempDate;
                }
            }
            
            $hours = $plan->duration;
            $dateEnd = (clone $dateStart)->add(new DateInterval("PT{$hours}H"));

            $apartment->plans()->attach($plan->id, array('date_start' => $dateStart, 'date_end' => $dateEnd, 'created_at' => $dateCreation, 'updated_at' => $dateCreation));

            return redirect()->route("user.apartments.show", $apartment->id);

        } else {
            $errorString = "";

            foreach ($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }


            return back()->withErrors('An error occurred with the message: ' . $result->message);
        }


    }
}

