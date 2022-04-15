<?php

namespace App\Http\Controllers\User;

use App\Apartment;
use App\Http\Controllers\Controller;
use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $validation = [
        'sender_name' => 'nullable|string|max:50',
        'content' => 'string|required',
        'sender_email' => 'string|max:50|required',
        'apartment_id' => 'exists:apartment,id',
        'visualized' => 'boolean',
        'answered' => 'boolean',
    ];

    public function index()
    {
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
        return view('user.messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        if(!$message){
            abort(404);
        }
        return view('user.messages.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        return view('user.messages.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        

        $form_data = $request->all();
        

        $message->update($form_data);


        return redirect()->route("user.messages.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {

        $message->delete();

        return redirect()->route("user.messages.index");
    }
}
