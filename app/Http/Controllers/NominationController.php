<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Session;
use App\Nomination;
use Auth;
use App\User;

class NominationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
     public function index()
    {
         $users = User::all();
        $check=Nomination::where('user_id',Auth::id())->exists();
        $nomination=Nomination::where('user_id',Auth::id())->first();
        return view('nominations.index',compact('check','nomination','users'));
    }

    
      public function getNomination()
    {
        // return view('nominations.create');
    }

     public function postNomination(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email',
            'regNo'=>'required|min:12',
            'chair'=>'required|min:3',
            'viceChair'=>'required|min:3',
            'secretary'=>'required|min:3',
            'viceSecretary'=>'required|min:3',
            'treasurer'=>'required|min:3',
            'prayerSecretary'=>'required|min:3',
            'missionCordinator'=>'required|min:3',
            'bsCordinator'=>'required|min:3',
            'musicDirector'=>'required|min:3',
            'technicalCordinator'=>'required|min:3',
            'librarian'=>'required|min:3',
            'orgSecretary'=>'required|min:3',
            'message'=>'min:10']);
        $nominations=array(
            
        );
        $data=array(
            'email'=>$request->email,
            'regNo'=>$request->regNo,
            'chair'=>$request->chair,
            'viceChair'=>$request->viceChair,
            'secretary'=>$request->secretary,
            'viceSecretary'=>$request->viceSecretary,
            'treasurer'=>$request->treasurer,
            'prayerSecretary'=>$request->prayerSecretary,
            'missionCordinator'=>$request->missionCordinator,
            'bsCordinator'=>$request->bsCordinator,
            'musicDirector'=>$request->musicDirector,
            'technicalCordinator'=>$request->technicalCordinator,
            'librarian'=>$request->librarian,
            'orgSecretary'=>$request->orgSecretary,
        );
        Mail::send('emails.nomination', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('jackxanchez@gmail.com');
            $message->cc($data['email']);
            $message->subject($data['regNo']);

        });

        Session::flash('success','You have nominated the leaders for the next spiritual year');
        return redirect()->route('posts.index');

    }







    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {       
        
            
            }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate Data
        $this->validate($request, array(
            'chair' =>'required|max:255',
            'viceChair' =>'required|max:255',
            'secretary' =>'required|max:255',
            'viceSecretary' =>'required|max:255',
            'treasurer' =>'required|max:255',
            'prayerSecretary' =>'required|max:255',
            'missionCordinator' =>'required|max:255',
            'bsCordinator' =>'required|max:255',
            'musicDirector' =>'required|max:255',
            'technicalCordinator' =>'required|max:255',
            'librarian' =>'required|max:255',
            'orgSecretary' =>'required|max:255',
            

        ));

        // Store in Database
        $nomination= new Nomination;

        $nomination->chair=$request->chair;
        $nomination->viceChair=$request->viceChair;
        $nomination->secretary=$request->secretary;
        $nomination->viceSecretary=$request->viceSecretary;
        $nomination->treasurer=$request->treasurer;
        $nomination->prayerSecretary=$request->prayerSecretary;
        $nomination->missionCordinator=$request->missionCordinator;
        $nomination->bsCordinator=$request->bsCordinator;
        $nomination->musicDirector=$request->musicDirector;        
        $nomination->technicalCordinator=$request->technicalCordinator;
        $nomination->librarian=$request->librarian;        
        $nomination->orgSecretary=$request->orgSecretary;
        $nomination->user_id=Auth::id();

        $nomination->save();

        Session::flash('success','Nominated the EUNCCU Leaders');



        //Redirect to another post
        return redirect()->route('nominations.index', $nomination->id);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
         public function edit($id)
    {
        //Find  the post in database and save it as a variable.
        $nomination=Nomination::where('id',$id)->first();
        // dd($bible);
        if (Auth::id()!=$nomination->user_id) {
            return view('errors.404');
        }
        //$bible = Bible::find($id);

        //Return the view and pass in the variable we previously created
        return view('nominations.edit')->withNomination($nomination);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request, array(
            'chair' =>'required|max:255',
            'viceChair' =>'required|max:255',
            'secretary' =>'required|max:255',
            'viceSecretary' =>'required|max:255',
            'treasurer' =>'required|max:255',
            'prayerSecretary' =>'required|max:255',
            'missionCordinator' =>'required|max:255',
            'bsCordinator' =>'required|max:255',
            'musicDirector' =>'required|max:255',
            'technicalCordinator' =>'required|max:255',
            'librarian' =>'required|max:255',
            'orgSecretary' =>'required|max:255',
            

        ));

        // Store in Database
        $nomination = Nomination::find($id);

        $nomination->chair=$request->chair;
        $nomination->viceChair=$request->viceChair;
        $nomination->secretary=$request->secretary;
        $nomination->viceSecretary=$request->viceSecretary;
        $nomination->treasurer=$request->treasurer;
        $nomination->prayerSecretary=$request->prayerSecretary;
        $nomination->missionCordinator=$request->missionCordinator;
        $nomination->bsCordinator=$request->bsCordinator;
        $nomination->musicDirector=$request->musicDirector;        
        $nomination->technicalCordinator=$request->technicalCordinator;
        $nomination->librarian=$request->librarian;        
        $nomination->orgSecretary=$request->orgSecretary;
        $nomination->user_id=Auth::id();

        $nomination->save();

        Session::flash('success','Nomination Successifuly Updated');



        //Redirect to another post
        return redirect()->route('nominations.index', $nomination->id);
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
