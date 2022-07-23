<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'avatar',
        'description',
        'status'
    ];

  public function books(){
    return $this->hasMany(book::class);
  }
}
