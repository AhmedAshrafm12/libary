<?php

namespace App\Http\Controllers\admin;

use App\Models\book;
use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = book::where("status",0)->get();
        $categories = category::all();
        return view("dashboard.books.index",compact("books","categories"));
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
    public function declineBook(book $book)
    {
        $book->status = 2;
        $book->save();
        return redirect()->back();
    }
    public function approveBook(book $book)
    {
        $book->status = 1;
        $book->save();  
        return redirect()->back();

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
                "file"=>"required",
                "image"=>"required",
                "description"=>"required|min:8",
                 'category_id'=>"required"
            ]);
            $file =  $request->file->store('uploads/book/files','public');
            $image =  $request->image->store('uploads/book/images','public');
         book::create([
            "name"=>$request->name,
            "description"=>$request->description,
            "file"=>$file,
            "status"=>1,
            "image"=>$image,
            'category_id'=>$request->category_id,
            'user_id'=>1
         ]);
         return redirect()->back()->with("add", "book added successfully");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(book $book)
    {
        //
    }



    public function view($pathToFile , $book_id){
        $book = book::findorFail($book_id)->get()->first();
   
      return Storage::disk('book')->download('uploads/'.$pathToFile);
       
       }
}
