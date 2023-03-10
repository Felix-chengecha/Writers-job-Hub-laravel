<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bids extends Model
{
    use HasFactory;


    public function users(){
        return $this->belongsTo(User::class);
    }


    public function topics(){
        return $this->belongsTo(Topics::class);
    }
}
