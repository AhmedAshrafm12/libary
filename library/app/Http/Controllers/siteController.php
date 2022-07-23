<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class siteController extends Controller
{
    public function index($id)
    {
        if(view()->exists("site.$id")){
            return view("site.$id");
        }
        else
        {
            return view('author.404');
        }

     //   return view($id);
    }



}
