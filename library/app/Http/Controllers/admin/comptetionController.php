<?php

namespace App\Http\Controllers\admin;

use App\Models\category;
use App\Models\comptetion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class comptetionController extends Controller
{
    public function index()
    {
        $comptetions = comptetion::where("status",0)->get();
        $categories = category::all();
        return view("dashboard.comptetions.index",compact("comptetions","categories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function declinecomptetion(comptetion $comptetion)
    {
        $comptetion->status = 2;
        $comptetion->save();
        return redirect()->back();
    }
    public function approvecomptetion(comptetion $comptetion)
    {
        $comptetion->status = 1;
        $comptetion->save();  
        return redirect()->back();

      }
    public function show(comptetion $comptetion)
    {
    return view("dashboard.comptetions.show" , compact("comptetion"));

      }}
