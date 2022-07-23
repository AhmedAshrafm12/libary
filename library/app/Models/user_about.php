<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_about extends Model
{
    use HasFactory;
    public $table = 'user_about';
    public $fillable =
    [
        'about',
         'user_id'
    ];
}
