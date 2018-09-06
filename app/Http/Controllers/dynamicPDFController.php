<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class dynamicPDFController extends Controller
{
    function index(){
    	$user_data = $this->get_user_data();
    	return view('users.dynamic_pdf') ->with('user_data', $user_data);
    }

    function get_user_data(){
    	$user_data = DB::table('users')
    				->limit(10)
    				-> get();
    	return $user_data;
    }
}
