<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'description',
        'image',
        'status',
        'file',
        'category_id',
        'user_id',
        'price',
        'paid' ,
        'rate'
        
    ];

    public function category(){
        return $this->belongsTo(category::class);
    }

    public function user(){
        return $this->belongsTo(user::class , 'user_id');
    }

}
