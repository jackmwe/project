<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 
use App\Post;

use App\Category;

use Session;

class PostController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');

    }
    
     
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Create a variable and store all the blog posts in it.
        $posts = Post::orderBy('id','desc')->paginate(10);
        //Return a view and pass the above variable
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create')->withCategories($categories);
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
            'category_id' =>'required|integer',
            'body' =>'required'

        ));

        // Store in Database
        $post= new Post;
        $post->name=$request->name;
        $post->phone=$request->phone;
        $post->title=$request->title;
        $post->category_id=$request->category_id;
        $post->body=$request->body;

        $post->save();

        Session::flash('success','Your post has been received');



        //Redirect to another post
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $post= Post::where('id', '=', $id)->first();
        return view('posts.show')->withPost($post);
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
        $post = Post::find($id);

        $categories = Category::all();
        $cats=[];
        foreach ($categories as $category) {
           $cats[$category->id]=$category->name;

        }
        //Return the view and pass in the variable we previously created
        return view('posts.edit')->withPost($post)->withCategories($cats);
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
            'name' => 'required',
            'phone' => 'required|regex:/(07)[0-9]{8}/',
            'title' =>'required|max:255',
            'category_id' =>'required|integer',
            'body' =>'required'

        ));
    


        //Save the data to the database

        $post = Post::find($id);
        $post->name=$request->name;
        $post->phone=$request->phone;
        $post->title=$request->input('title');
        $post->category_id=$request->category_id;
        $post->body=$request->input('body');

        $post->save();

        //Set flash data with success
        Session::flash('success','Your post has been succesifully updated');
        

        //Redirect with a flash data to posts.show
         return redirect()->route('posts.show', $post->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        
        Session::flash('success','The post has been succesifully deleted');
        return redirect()->route('posts.index');

    }

    public function getSingle($id){
        //Fetch on the database based on the slug
        $post= Post::where('id', '=', $id)->first();

        //Return a view
        return view('posts.single')->withPost($post);
     }
}
