<?php

use App\Models\user_book;
use App\Models\user_rank;
use App\Models\user_article;
use App\Models\user_favourite;
use Illuminate\Support\Facades\Auth;

function saved($book_id){
$count = user_book::where('user_id',auth()->user()->id)->where("book_id" ,$book_id)->count();
return $count;

}
function favourite($book_id){
$count = user_favourite::where('user_id',auth()->user()->id)->where("book_id" ,$book_id)->count();
return $count;
}
function favouriteArticle($article__id){
$count = user_article::where('user_id',auth()->user()->id)->where("article_id" ,$article__id)->count();

return $count;
}
function checkComptetionAttendance($comptetion_id){
$count = user_rank::where('user_id',auth()->user()->id)->where("comptetion_id" ,$comptetion_id)->count();

return $count;
}
function getClearAmount($percentage , $total){
$clear = ($total/100)*($percentage);

return $clear;
}

 function hasNewNotifications()
{
    $has = 0;
   foreach(Auth::user()->notifications as $notifi){
if ($notifi->seen  == 0) {
    $has=1;
    break;
}
   }

    return $has;
}
// function follow($user_id){
// $count = users_followers::where('follower_id',auth()->user()->id)->where("article_id" ,$article__id)->count();

// return $count;
// }
