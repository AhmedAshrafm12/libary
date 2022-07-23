<?php

namespace App\Http\Controllers\admin;

use App\Models\article;
use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class articleController extends Controller
{
    public function index()
    {
        $articles = article::where("status",0)->get();
        $categories = category::all();
        return view("dashboard.articles.index",compact("articles","categories"));
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
    public function declinearticle(article $article)
    {
        $article->status = 2;
        $article->save();
        return redirect()->back();
    }
    public function approvearticle(article $article)
    {
        $article->status = 1;
        $article->save();  
        return redirect()->back();

      }
    public function show(article $article)
    {
    return view("dashboard.articles.show" , compact("article"));

      }
}
