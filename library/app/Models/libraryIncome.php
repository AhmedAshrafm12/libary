<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class libraryIncome extends Model
{
    use HasFactory;
    public $fillable=[
        'order_id',
        'value'
    ];
}
