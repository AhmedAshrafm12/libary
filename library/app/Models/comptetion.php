<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comptetion extends Model
{



    use HasFactory;
    public $fillable=[
        'title' ,
        'description',
        'start_date',
        'end_date' ,
        'user_id'
    ];

    public function questions(){
        return $this->hasMany(question::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function ranks(){
        return $this->hasMany(user_rank::class);
    }


}
