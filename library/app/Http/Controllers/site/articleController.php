<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\article;
use App\Models\category;
use Illuminate\Http\Request;

class articleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $categories = category::all();
        return view('site.article.create' , compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // return $request->all();
       $request->validate([
        "subject"=>"required|min:4",
        "description"=>"required|min:10",
        "image"=>"required|image",
        "content"=>"required|min:100",
         'category_id'=>"required"
    ]);
    // $file =  $request->file->store('uploads/book/files','public');
    $image =  $request->image->store('uploads/article/images','public');
   $paid =  $request->price ? 1 :   0;
 article::create([
    "subject"=>$request->subject,
    "description"=>$request->description,
    "content"=>$request->content,
    "cover"=>$image,
    'category_id'=>$request->category_id,
    'user_id'=>auth()->user()->id,
 ]);
 return redirect()->back()->with("add", "article added successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(article $article)
    {
        return view("site.article.show" , compact("article"));
        }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(article $article)
    {
        //
    }

    public function deactiveArticle(article $article){
        $article->update(["status"=>2]);
        return redirect()->back();
   }  
}
