<?php

namespace App\Http\Controllers;

use App\User;
use App\Annonce;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user_id =  Auth::user('id');

        echo $user_id;


        // return view('Message.index')->with('user',$user_id);

        // return 'd';
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
    public function store(Request $request,$id)
    {
      

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $annonce = Annonce::find($id);

        $user = $annonce->user_id;

        // echo $user;

        $t = User::find($user);

        return view('Message.index')->with('User',$t);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        return vew('Message.index',['message'=>$message]);

        return redirect('/Message/{$content}/edit/')->with('success','Message Send');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          $content = $request['content'];
        $annonce = Annonce::find($id);
        $user = $annonce->user_id;

        // echo Auth::user('id')->id;

        if (isset($content)) {
            
            $message = new Message;

            $message->sender_id = Auth::user('id')->id;
            $message->receiver_id = $user;
            $message->content = $content;

            $message->save();



            // return vew('Message.index',['Message'=>$message])

            return redirect()->back()->with('success','Message Send');

            // return view('Message.index',compact('message'));

            // return view('Message.index');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        
    }
}
