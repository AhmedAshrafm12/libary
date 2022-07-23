<?php

namespace App\Http\Controllers\site;

use App\Models\book;
use App\Models\order;
use App\Models\userIncome;
use Illuminate\Http\Request;
use App\Models\libraryIncome;
use App\Http\Controllers\Controller;
use App\Models\libraryConfig;
use App\Models\user_book;

class orderController extends Controller
{
    public function store(book $book){

$libraryConfig =  libraryConfig::latest()->first();
$userValue = getClearAmount($libraryConfig->userPercentage , $book->price);
$libraryValue = getClearAmount($libraryConfig->libraryPercentage , $book->price);
   $order =   order::create([
        'payer_id'=>auth()->user()->id,
        'book_id'=>$book->id,
        'user_id'=>$book->user_id,
     ]);

     userIncome::create(
        [
            'user_id'=>auth()->user()->id,
            'value'=>$userValue,
            'order_id'=>$order->id

        ]);

       libraryIncome ::create(
        [
            'value'=>$libraryValue,
            'order_id'=>$order->id

        ]
        );
        $user_book = new user_book();
        $user_book->book_id = $book->id;
        $user_book->user_id = auth()->user()->id;
        $user_book->save();

        return redirect('/index');

    }


}
