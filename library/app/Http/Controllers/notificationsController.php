<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class notificationsController extends Controller
{
    public function seen(User $user){
        $user->notifications()->update(
            ['seen'=>1]
        );
    }
}
