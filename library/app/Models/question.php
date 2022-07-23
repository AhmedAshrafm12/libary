<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    use HasFactory;
    public $fillable = [
        'question' ,
        'comptetion_id' ,
      
    ];

    public function comptetion(){
        return $this->belongsTo(comptetion::class);
    }
    public function answers(){
        return $this->hasMany(answer::class);
    }
}
