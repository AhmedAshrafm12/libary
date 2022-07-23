<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class libraryConfig extends Model
{
    use HasFactory;
    public $fillable=[
        'libraryPercentage' ,
        'userPercentage'
    ];
}
