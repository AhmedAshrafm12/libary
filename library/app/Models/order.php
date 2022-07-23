<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    public $fillable = [
        'user_id',
        'book_id',
        'payer_id'
    ];

public function payer(){
    return $this->belongsTo(User::class , 'payer_id');
}
public function book(){
    return $this->belongsTo(book::class);
}
public function site(){
    return $this->hasOne(libraryIncome::class);
}
public function userIncome(){
    return $this->hasOne(userIncome::class);
}









}
