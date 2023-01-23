<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topics extends Model
{
    use HasFactory;

    protected $fillable= [
        'title',
        'subtopic',
        'duedate',
        'price'
    ];


    public function bids(){
        return $this->hasMany(Bids::class);
    }
}
