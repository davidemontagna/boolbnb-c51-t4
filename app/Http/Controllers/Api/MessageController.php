<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // Creare lo store dei messaggi sotto lo store dei commenti usato in bolpress pre "ispirazione"

        // $data = $request->all();

        // $validator = Validator::make($data, [
        //     'name' => 'nullable|string|max:50',
        //     'content' => 'string|required',
        //     'post_id' => 'exists:posts,id'
        // ]);

        // if ($validator->fails()) {
        //     return response()->json([
        //         "success" => false,
        //         "errors" => $validator->errors(),
        //         "data" => $data
        //     ],400);
        // }
        // $newComment = new Comment();
        // if( !empty($data["name"]) ){
        //     $newComment->name = $data["name"];
        // }
        // $newComment->content = $data["content"];
        // $newComment->post_id = $data["post_id"];
        // $newComment->save();

        // return response()->json([
        //     "success" => true
        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
