<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

 class PagesController extends Controller
 {
    

     public function home()
     {
 $first = 'Alex';
 $last = 'ccc';
 $full  = $first . $last;

     	return view('welcome')-> with("fullname",$full);
     }
 }
