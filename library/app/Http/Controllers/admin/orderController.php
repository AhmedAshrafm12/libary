<?php

namespace App\Http\Controllers\admin;

use App\Models\order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class orderController extends Controller
{
    public function index(){
        $orders = order::all();
        return view("dashboard.orders.index" , compact("orders"));
    }

    public function show(order $order){
        return view("dashboard.orders.show" , compact("order"));
    }
}
