<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Session;


class PagesController extends Controller
{
      public function index()
    {
        return view('pages/welcome');
    }

      public function getAbout()
    {
        $first = 'Jack';
        $last = 'Mutua';
        $email='jackxanchez@gmail.com';
        $full = $first ." ". $last;
        return view('pages/about')->with("fullname",$full)->withEmail($email);
    }

      public function getContact()
    {
        return view('pages.contact');
    }

     public function getClosure()
    {
        return view('closure.bs');
    }

     public function postContact(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email',
            'subject'=>'min:3',
            'message'=>'min:10']);
        $data=array(
            'email'=>$request->email,
            'subject'=>$request->subject, 
            'bodyMessage'=>$request->message,
        );
        Mail::send('emails.contact', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('jackxanchez@gmail.com');
            $message->subject($data['subject']);

        });

        Session::flash('success','Your email has been received. Thank you for contacting us.');
        return redirect()->route('posts.index');

    }
}
