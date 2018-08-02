<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mission;

use Session;

class MissionController extends Controller
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
        $missions = Mission:: orderBy('id','desc')->paginate(100);
        //Return a view and pass the above variable
        return view('missions.index')->withMissions($missions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('missions.create');
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
            'Name' =>'required|max:255',
            'phone' => 'required|regex:/(07)[0-9]{8}/',
            'email' => 'required|email|unique:missions',
            'regNo' => 'required|regex:/[a-zA-Z]{1,2}+\d{2,3}+[\/]+\d{5}+[\/]+\d{2}$/|unique:missions',
            'yos' => 'integer',
            'et'=>'required|string|max:255',
            'pstName' =>'required|max:255',
            'pstPhone' => 'required|regex:/(07)[0-9]{8}/',
            'church' =>'required|max:255',
            'missioners' =>'required|integer',
            'county' =>'required|max:255',
            'area' =>'required|max:255',
            'fare' =>'required|integer',
            'distance' =>'required|integer',
            'substations' =>'required',
            'rate' =>'required|max:50',
            'facilities' =>'required|max:255',
            'description' =>'required'

        ));

        // Store in Database
        $mission= new Mission;

        $mission->Name=$request->input('Name');
        $mission->phone=$request->input('phone');
        $mission->email=$request->input('email');
        $mission->regNo=$request->input('regNo');
        $mission->yos=$request->input('yos');
        $mission->et=$request->input('et');
        $mission->pstName=$request->input('pstName');
        $mission->pstPhone=$request->input('pstPhone');
        $mission->church=$request->input('church');
        $mission->missioners=$request->input('missioners');
        $mission->county=$request->input('county');
        $mission->area=$request->input('area');
        $mission->distance=$request->input('distance');
        $mission->fare=$request->input('fare');
        $mission->substations=$request->input('substations');
        $mission->rate=$request->input('rate');
        $mission->facilities=$request->input('facilities');
        $mission->description=$request->input('description');

        $mission->save();

        Session::flash('success','You have successifully applied for a mission in your area');



        //Redirect to another post
        return redirect()->route('missions.show', $mission->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mission = Mission::find($id);
        return view('missions.show')->with('mission',$mission);
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
        $mission = Mission::find($id);

        //Return the view and pass in the variable we previously created
        return view('missions.edit')->withMission($mission);
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
            'Name' =>'required|max:255',
            'phone' => 'required|regex:/(07)[0-9]{8}/',
            'email' => 'required|email',
            'regNo' => 'required|regex:/[a-zA-Z]{1,2}+\d{2,3}+[\/]+\d{5}+[\/]+\d{2}$/',
            'yos' => 'integer',
            'et'=>'required|string|max:255',
            'pstName' =>'required|max:255',
            'pstPhone' => 'required|regex:/(07)[0-9]{8}/',
            'church' =>'required|max:255',
            'missioners' =>'required|integer',
            'county' =>'required|max:255',
            'area' =>'required|max:255',
            'fare' =>'required|integer',
            'distance' =>'required|integer',
            'substations' =>'required',
            'rate' =>'required|max:50',
            'facilities' =>'required|max:255',
            'description' =>'required'

        ));


        //Save the data to the database

        $mission = Mission::find($id);
        $mission->Name=$request->input('Name');
        $mission->phone=$request->input('phone');
        $mission->email=$request->input('email');
        $mission->regNo=$request->input('regNo');
        $mission->yos=$request->input('yos');
        $mission->et=$request->input('et');
        $mission->pstName=$request->input('pstName');
        $mission->pstPhone=$request->input('pstPhone');
        $mission->church=$request->input('church');
        $mission->missioners=$request->input('missioners');
        $mission->county=$request->input('county');
        $mission->area=$request->input('area');
        $mission->distance=$request->input('distance');
        $mission->fare=$request->input('fare');
        $mission->substations=$request->input('substations');
        $mission->rate=$request->input('rate');
        $mission->facilities=$request->input('facilities');
        $mission->description=$request->input('description');


        $mission->save();

        //Set flash data with success
        Session::flash('success','Your Mission Application has been updated');
        

        //Redirect with a flash data to posts.show
         return redirect()->route('missions.show', $mission->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mission = Mission::find($id);
        $mission->delete();
        
        Session::flash('success','Mission Application Deleted successifully');
        return redirect()->route('missions.index');

    }
}