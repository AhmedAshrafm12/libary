<?php

use App\Events\myEvent;
use App\Http\Controllers\admin\articleController as AdminArticleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\siteController;
use App\Http\Controllers\userController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\authorController;
use App\Http\Controllers\pamentController;
use App\Http\Controllers\admin\BookController;
use App\Http\Controllers\site\orderController;
use App\Http\Controllers\site\categoryController;
use App\Http\Controllers\author\articleController;
use App\Http\Controllers\admin\categoryControlller;
use App\Http\Controllers\admin\comptetionController as AdminComptetionController;
use App\Http\Controllers\admin\orderController as AdminOrderController;
use App\Http\Controllers\site\comptetionController;
use App\Http\Controllers\site\bookController as SiteBookController;
use App\Http\Controllers\site\articleController as SiteArticleController;
use App\Http\Controllers\author\categoryController as AuthorCategoryController;
use App\Http\Controllers\notificationsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return view('welcome');
});
Route::get('/test', function () {
    event(new myEvent(["user_id"=>6, "link"=>"test.ink" , "massage"=>"new notifi" ]));
    return "event sent";
});

Route::get('logout',[userController::class ,'logout']);



Route::middleware('guest')->group(function(){
    Route::get('login',function(){ return view('Registration.login'); });
    Route::get('signUp',function(){ return view('Registration.signUp'); });
    Route::post('register',[userController::class , 'register']);
    Route::post('login',[userController::class ,'login']);
})
;

// Route::get('/linkstorage', function () {
//     Artisan::call('storage:link');
// });



Route::prefix('admin')->group(function(){
    Route::middleware("guest:admins")->group(function(){
        Route::view('login', 'dashboard.signin');
        Route::post('login',[AdminController::class,'login']);
        // Route::resource("category",categoryControlller::class);
        // Route::resource("book",BookController::class);
        // Route::get('books/pending',[BookController::class,'pending']);
        // Route::get('books/archived',[BookController::class,'archived']);

        // Route::get('/{page}', [AdminController::class,'index']);

    });
    Route::middleware("auth:admins")->group(function(){

        Route::resource("category",categoryControlller::class);
        Route::resource("books",BookController::class);
        Route::resource("articles",AdminArticleController::class);
        Route::resource("comptetions",AdminComptetionController::class);
        Route::resource("orders",AdminOrderController::class);
        Route::get("/approveBook/{book}",[BookController::class , 'approveBook']);
        Route::get("/declineBook/{book}",[BookController::class , 'declineBook']);
   
        Route::get("/approvearticle/{article}",[AdminArticleController::class , 'approvearticle']);
        Route::get("/declinearticle/{article}",[AdminArticleController::class , 'declinearticle']);
   
        Route::get("/approvecomptetion/{comptetion}",[AdminComptetionController::class , 'approvecomptetion']);
        Route::get("/declinecomptetion/{comptetion}",[AdminComptetionController::class , 'declinecomptetion']);
        Route::get('/view/uploads/{file}/{book_id}', [BookController::class,'view']);
   

        Route::get('/{page}', [AdminController::class,'index']);

    });
    // Route::view('login', 'dashboard.signin');
    // Route::post('login',[AdminController::class,'login']);


});


    Route::middleware("auth")->group(function(){
        // Route::resource("category",categoryControlller::class);
        Route::resource("book",SiteBookController::class);
        Route::resource("article",SiteArticleController::class);
        Route::resource("categories",categoryController::class);
        Route::resource("comptetion",comptetionController::class);
        Route::get('/index', [SiteBookController::class , 'index']);
        Route::get('/profile/{user}', [userController::class , 'profile']);
        Route::get('/myLibrary', [SiteBookController::class , 'library']);
        Route::get('/dashboard', [SiteBookController::class , 'dashboard']);
        Route::get('/deactiveBook/{book}', [SiteBookController::class , 'deactiveBook']);
        Route::get('/book/destroy/{book}', [SiteBookController::class , 'destroy']);
        Route::get('/article/destroy/{article}', [SiteArticleController::class , 'destroy']);
        Route::get('/book/view/{book}', [SiteBookController::class , 'view']);
        Route::get('/deactiveArticle/{article}', [SiteArticleController::class , 'deactiveArticle']);
        Route::get('/follow/{user}', [userController::class , 'follow']);
        Route::post('/profile/update/{user}', [userController::class , 'updateProfile']);
        Route::get('/editProfile/{user}', [userController::class , 'editProfile']);
        Route::post('/submitAnswers/', [comptetionController::class , 'submitAnswers']);
        Route::get('/rank/{comptetion}', [comptetionController::class , 'rank']);
        Route::get('/comptetion/view/{comptetion}', [comptetionController::class , 'view']);
        Route::get('/deactive/{comptetion}', [comptetionController::class , 'deactive']);
        Route::get('/comptetion/delete/{comptetion}', [comptetionController::class , 'delete']);
        route::post("payment" , [pamentController::class,'payment']);
        route::get("overView" , [userController::class,'overView']);
        route::get("getPaidBooks" , [SiteBookController::class,'getPaidBooks']);
        route::get("gift/{user_id}/{book_id}" , [SiteBookController::class,'gift']);
        route::get("search/{value}" , [userController::class,'search']);
        route::get("/book/rate/{book}/{rate}" , [SiteBookController::class,'rate']);

        // Route::post('books/pending',[BookController::class,'pending']);
        // Route::get('books/archived',[BookController::class,'archived']);
        Route::get('/view/uploads/{file}/{book_id}', [SiteBookController::class,'view']);
        Route::get('/{page}', [siteController::class,'index']);

    });
    // Route::view('login', 'dashboard.signin');
    // Route::post('login',[AdminController::class,'login']);



Route::middleware("auth")->group(function(){
    Route::get('save/{book}' , [SiteBookController::class , 'saveBook']);
    Route::get('addToFavourites/{book}' , [SiteBookController::class , 'addToFavourites']);
    Route::get('favouriteArticle/{article}' , [SiteBookController::class , 'favourtieArticle']);
    Route::post('/makeOrder/{book}' , [orderController::class , 'store']);
    Route::get('/seen/{user}' , [notificationsController::class , 'seen']);
    // Route::get('showArtcile/{article}' , [ReaderArticleController::class , 'show']);
});

