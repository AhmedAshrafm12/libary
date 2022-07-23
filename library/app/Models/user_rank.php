<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_rank extends Model
{
    use HasFactory;
    public $table = "user_rank";

    public $fillable=[
        "user_id",
        "comptetion_id",
        "rank"
    ];


    public function user(){
        return $this->belongsTo(user::class);
    }
    public function comptetion(){
        return $this->belongsTo(comptetion::class);
    }
}
