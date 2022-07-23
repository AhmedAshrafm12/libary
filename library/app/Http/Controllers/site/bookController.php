<?php

namespace App\Http\Controllers\site;

use App\Models\book;
use App\Events\myEvent;
use App\Models\article;
use App\Models\category;
use App\Models\user_book;
use App\Models\comptetion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class bookController extends Controller
{
    function __construct()
    {
        $comptetions = comptetion::all();
        foreach($comptetions as $comptetion)
        {
          if(strtotime($comptetion->end_date) - strtotime($comptetion->start_date)  <= 0)

          $comptetion->status =  2 ;
          $comptetion->save();
         } ;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $latest_books = book::where("status" , 1)->latest()->get();
        $latest_articles = article::where("status" , 1)->latest()->get();
        $following_books = $this->followingBooks();
        $following_articles = $this->followinArticles();
     return view('site.index' , ['latest_books'=>$latest_books , 'latest_articles'=>$latest_articles , 'following_books'=>$following_books , 'following_articles'=>$following_articles]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    $categories = category::where("status","1")->get();
        return view("site.book.create" , compact("categories"));
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
            "name"=>"required|min:4",
            "file"=>"required|mimes:pdf,docs,dox,txt",
            "image"=>"required|mimes:png,jpg",
            "description"=>"required|min:8",
             'category_id'=>"required"
        ]);
        $file =  $request->file->store('uploads','book');
        $image =  $request->image->store('uploads/book/images','public');
       $paid =  $request->price ? 1 :   0;
   $book =   book::create([
        "name"=>$request->name,
        "description"=>$request->description,
        "file"=>$file,
        "status"=>0,
        "image"=>$image,
        'category_id'=>$request->category_id,
        'user_id'=>auth()->user()->id,
        'paid'=>$paid,
        'price'=>$request->price ??   0
     ]);
     event(new myEvent(["user_id"=>$book->user_id, "link"=>"/dashboard" , "massage"=>"your book has been added it waited to be aproved" ]));

     return redirect("/index")->with("add", "book added successfully");
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(book $book)
    {

        return view("site.book.show" , compact("book"));

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
      if (request()->user()->cannot('delete', $book)) {
        abort(403);
    }     
    $book->delete(); 
    return redirect()->back();


    }

public function library(){
  $saved_books = Auth::user()->savedBooks;
  $favourite_books = Auth::user()->favourites;
  $favourite_articles = Auth::user()->favourtieArticle;
  return view("site.library" , compact('saved_books' , 'favourite_books' , 'favourite_articles'));
    }
public function dashboard(){
  $books = Auth::user()->books;
  $articles = Auth::user()->articles;
  $comptetions = Auth::user()->comptetions;
  return view("site.dashboard" , compact('books' , 'articles' , 'comptetions'));
    }


  public function deactiveBook(book $book){ 
    if (request()->user()->cannot('deactive', $book)) {
      abort(403);
  }
    $book->update(["status"=>2]);
      return redirect()->back();
  }


public function saveBook(book $book){
  $user_book= new user_book();
if($book->paid == 1)
return view("payment" , compact("book"));

$user_book->book_id = $book->id;
$user_book->user_id = auth()->user()->id;
$user_book->save();
return redirect()->back();
}


public function addToFavourites(book $book){
  // auth()->user()->favourites()->toggle($book);
 Auth::user()->favourites()->toggle($book);
  return redirect()->back();
}
public function favourtieArticle(article $article){
  // auth()->user()->favourites()->toggle($book);
 Auth::user()->favourtieArticle()->toggle($article);
  return redirect()->back();
}
//   public function view(book $book){
//     $file_exists = Storage::disk('local')->get('/public/uploads/book/files/CF2weskC1vfTyZWTTQrb6hUjYc7LHcME0XErL0Jw.jpg');
//     // return($file_exists);
//   }


public function  followingBooks()
 {
  if (auth()->user()->follwing) {
      $users =  auth()->user()->follwing->pluck('user_id');
      $books = book::whereIn('user_id', $users)->with('user')->latest()->get(10);
      return $books;
  }
  else
  return false;
 }

public function  followinArticles()
 {
  if (auth()->user()->follwing) {
      $users =  auth()->user()->follwing->pluck('user_id');
      $articles = article::whereIn('user_id', $users)->with('user')->latest()->get(10);
      return $articles;
  }
  else
  return false;
 }

 public function getPaidBooks(){
   $books = Auth::user()->books()->where("paid", 1)->get();
   return $books ;
 }


 public function gift($user_id , $book_id){
$book = book::find($book_id)->get()->first();
  if (request()->user()->cannot('gift', $book)) {
    abort(403);
}    

  $user_book= new user_book();
  $user_book->book_id = $book_id;
  $user_book->user_id = $user_id;
  $user_book->save();
  return redirect()->back();

 }
 public function rate( $book_id , $rate){
  $book = book::findorFail($book_id)->get()->first();
  $book->rate = ($rate + $book->rate)/2;
  $book->save();
  // return redirect()->back();
 }
 public function view($pathToFile , $book_id){
  $book = book::findorFail($book_id)->get()->first();
  if (request()->user()->cannot('view', $book)) {
    abort(403);
}     
return Storage::disk('book')->download('uploads/'.$pathToFile);
 
 }


}
