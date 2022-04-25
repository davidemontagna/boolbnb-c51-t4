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
    public function plans($apartment_id)
    {
        $plans = Plan::All();
        return view('user.sponsorship.plans', compact('plans', 'apartment_id'));
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


        return view('user.sponsorship.index', ['token' => $token, 'user' => $apartment->id_user, 'plan' => $plan, 'apartment_id' => $apartment->id]);
    }

    public function checkout(Request $request, Apartment $apartment, $plan_id)
    {

        $plan = Plan::where('id', $plan_id)->first();

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

        // $request->validate( [
        //     'sponsorship_id' => 'required|integer|exists:sponsorships,id',
        // ]);

        // $data = $request->all();

        
        // $nuovaSponsorship = new Sponsorship();

        // $sponsorshipLength = Sponsorship::where('id', $data['sponsorship_id'])->pluck('length')->first(); // pluck restituisce il solo valore e non anche la chiave! la first va usata perché è [value]
        // $start = new DateTime();
        // $expiration = $start->add(new DateInterval('PT'.$sponsorshipLength.'H'));  //aggiunte ore della sponsorship

        // $user->sponsorships()->attach($data['sponsorship_id'], array('start_date'=>$start,'expiration'=>$expiration));

        if ($result->success) {
            $transaction = $result->transaction;


            return back()->with('success_message', 'Transaction successful');
        } else {
            $errorString = "";

            foreach ($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }


            return back()->withErrors('An error occurred with the message: ' . $result->message);
        }


    }
}

