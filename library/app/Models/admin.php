<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class admin  extends Authenticatable
{
    use HasFactory;
    protected $fillable=[
        "lastName",
        'email',
        'password'
    ];
  
    public function password():Attribute
    {
          return Attribute::make(
            set : fn($value)=>bcrypt($value)
          );
    }
}
