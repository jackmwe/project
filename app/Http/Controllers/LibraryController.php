<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Library;
use App\Category;
use Validator;
use Session;

class LibraryController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_admin')->only('index');
    }
	public function index()
	{
		$books = Library::orderBy('id','desc')->paginate(10);
		return view('library.index')->withBooks($books);
	}

	public function create()
	{
		$categories = Category::all();
        return view('library.create')->withCategories($categories);
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
            'name' => 'required',
            'phone' => 'required|regex:/(07)[0-9]{8}/',
            'title' =>'required|max:255',
            'author' =>'required|max:255',
            'category_id' =>'required|integer',
            'description' =>'required'

        ));

        // Store in Database
        $library= new Library;
        $library->name=$request->name;
        $library->phone=$request->phone;
        $library->title=$request->title;
        $library->author=$request->author;
        $library->category_id=$request->category_id;
        $library->description=$request->description;

        $library->save();

        Session::flash('success','Book Added Successifully');



        
        return redirect()->route('library.index', $library->id);
   
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		
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
		//
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		
	}
}
