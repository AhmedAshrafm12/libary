<?php

namespace App\Http\Controllers\admin;

use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class categoryControlller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = category::all();
        return view("dashboard.categories.index",compact("categories"));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"=>"required|min:4",
            "avatar"=>"required",
            "description"=>"required|min:8"
        ]);
        $avatar =  $request->avatar->store('uploads/categories','public');
   
     category::create([
        "name"=>$request->name,
        "avatar"=>$request->avatar,
        "description"=>$request->description,
        "avatar"=>$avatar,
        "status"=>1
     ]);
     return redirect()->back()->with("add", "category added successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        $request->validate([
            'name'=>'required|min:4',
            'description'=>'required|min:8',
        ]);
     $path = $category->avatar;
    if ($request->has('avatar')) {
        $path =  $request->avatar->store('uploads/categories','public');
        Storage::delete('public/'.$category->avatar);
        }        
        $status = $request->status  ? 1: 0;
        $category->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'status'=>$status,
            'avatar'=>$path
        ]);
        return redirect()->back()->with('update','category updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        //
    }
}
