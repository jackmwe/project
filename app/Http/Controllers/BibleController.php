<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 
use App\Bible;

use Session;

use Auth;

class BibleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_admin')->only('index');
    }
     
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Create a variable and store all the blog posts in it.
        $bibles = Bible:: orderBy('id','desc')->paginate(100);
        //Return a view and pass the above variable
        return view('bibles.index')->withBibles($bibles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bibles.create');
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
            'name' =>'required|max:255',
            'regNo' => 'required|regex:/[a-zA-Z]{1,2}+\d{2,3}+[\/]+\d{5}+[\/]+\d{2}$/|unique:bibles',
            'phone' => 'required|regex:/(07)[0-9]{8}/',
            'yos' => 'integer',
            'residence' =>'required|max:255',
            'hostel'=>'required|string|max:255',
            'bs_leader'=>'required|string|max:5',
            

        ));

        // Store in Database
        $bible= new Bible;

        $bible->name=$request->name;
        $bible->regNo=$request->regNo;
        $bible->phone=$request->phone;
        $bible->yos=$request->yos;
        $bible->residence=$request->residence;
        $bible->hostel=$request->hostel;
        $bible->bs_leader=$request->bs_leader;
        $bible->user_id=Auth::id();

        $bible->save();

        Session::flash('success','You have successifully registered for Bible Study this Semester');



        //Redirect to another post
        return redirect()->route('bibles.show', $bible->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bible = Bible::find($id);
        return view('bibles.show')->with('bible',$bible);
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
        $bible=Bible::where('id',$id)->first();
        // dd($bible);
        if (Auth::id()!=$bible->user_id) {
            return view('errors.404');
        }
        //$bible = Bible::find($id);

        //Return the view and pass in the variable we previously created
        return view('bibles.edit')->withBible($bible);
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
        //Validate the data
        $this->validate($request, array(
            'name' =>'required|max:255',
            'regNo' => 'required|string|max:20|min:10',
            'phone' => 'required|regex:/(07)[0-9]{8}/',
            'yos' => 'integer',
            'residence' =>'required|max:255',
            'hostel'=>'required|string|max:255',
            'bs_leader'=>'required|string|max:5'

        ));


        //Save the data to the database

        $bible = Bible::find($id);
        $bible->name=$request->input('name');
        $bible->regNo=$request->input('regNo');
        $bible->phone=$request->input('phone');
        $bible->yos=$request->input('yos');
        $bible->residence=$request->input('residence');
        $bible->hostel=$request->input('hostel');
        $bible->bs_leader=$request->input('bs_leader');


        $bible->save();

        //Set flash data with success
        Session::flash('success','Your BS Registration has been succesifully updated');
        

        //Redirect with a flash data to posts.show
         return redirect()->route('bibles.show', $bible->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bible = Bible::find($id);
        $bible->delete();
        
        Session::flash('success','BS registration cancelled');
        return redirect()->route('bibles.index');

    }
     public function bs()
    {
        $check=Bible::where('user_id',Auth::id())->exists();
        $bible=Bible::where('user_id',Auth::id())->first();
        return view('bibles.bs',compact('check','bible'));
    }
}
