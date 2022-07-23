<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'userName',
        'email',
        'password',
        'mobile' ,
        'avatar'
    ];

    protected static function booted()
    {
        static::created(function ($user) {
            $user->about()->create([
                'about'=>"update your about",
           
            ]);
        });
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


// public function setPasswordAttribute($value){
//     return bcrypt($value);
// }


protected function password(): Attribute
{
    return Attribute::make(
        // get: fn ($value) => ucfirst($value),
        set: fn ($value) => bcrypt($value),
    );
}


public function about(){
    return $this->hasOne(user_about::class);
}
public function books(){
    return $this->hasMany(book::class);
}
public function articles(){
    return $this->hasMany(article::class);
}
public function favourites(){
    return $this->belongsToMany(book::class , 'user_favourites' );
}

public function savedBooks(){
    return $this->belongsToMany(book::class , 'user_book');
}

public function favourtieArticle(){
    return $this->belongsToMany(article::class , 'users_articles');
}
public function following(){
    return $this->belongsToMany(user::class , 'users_followers' , 'follower_id' ,'user_id' );
}
public function followers(){
    return $this->belongsToMany(user::class , 'users_followers' , 'user_id'  ,'follower_id');
}
public function  comptetions(){
    return $this->hasMany(comptetion::class);}

public function  orders(){
    return $this->hasMany(order::class);
}
public function notifications()
{
    return $this->hasMany(notification::class);
}





}
