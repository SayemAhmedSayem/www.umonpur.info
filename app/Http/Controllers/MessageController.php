<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['messages'] = Message::latest()->paginate(10);
        $data['mg'] = Message::latest()->first();
        return view('backend.message.list', $data);
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
        // dd($request->all());
        $message = new Message();
        $message->name = $request->name;
        $message->email = $request->email;
        $message->subject = $request->subject;
        $message->phone = $request->phone;
        $message->message = $request->message;
        $message->status = 0;
         if ($request->hasfile('image')) {
            $file            = $request->file('image');
            $post_image = time() . $file->getClientOriginalName();
            $file->move(public_path() . "/uploads/message/", $post_image);
            $message->image =  $post_image;
         }
        $message->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = Message::find($id);
        $message->status = 1;
        $message->save();

       $data['mg'] = Message::find($id);
       $data['messages'] = Message::latest()->paginate(10);

       return view('backend.message.show', $data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $message = Message::find($id);
       if($message->status==0){
        $message->status = 1;
       }elseif($message->status==1){
        $message->status = 0;
       }
    //    return   $message ;
       $message->save();
       return  redirect()->route('message.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = Message::find($id);
        $message->delete();
       return redirect()->route('message.index');
    }
}
