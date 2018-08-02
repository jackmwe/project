<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;


class PortalController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth')->except('getIndex');
    }
     public function getIndex(){
     	//Fetch on the database based on the slug
     	$posts= Post::orderBy('id','desc')->paginate(5);

     	//Return a view
     	return view('portal.index')->withPosts($posts);
     }

     public function getSingle($id){
     	//Fetch on the database based on the slug
     	$post= Post::where('id', '=', $id)->first();

     	//Return a view
     	return view('portal.single')->withPost($post);
     }


}
