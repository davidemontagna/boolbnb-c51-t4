<?php

namespace App\Http\Controllers\User;

use App\Apartment;
use App\Http\Controllers\Controller;
use App\Message;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $apartments = Apartment::where('user_id', auth()->user()->id)->get();
        $messages = Message::with("apartment")->get();
        $newMessages = [];
        foreach ($messages as $message) {
            if(!in_array($message, $newMessages)){
                if ($message->apartment->user_id == auth()->id()) {
                    array_push($newMessages, $message);
                }
            }
        }
        $messages = $newMessages;

        $notVisualized = [];
        foreach ($messages as $message) {
            if($message->visualized == 0){
                array_push($notVisualized, $message);
            }
        }
        
        return view('user.home', compact('messages', 'notVisualized', 'apartments'));
    }
}
