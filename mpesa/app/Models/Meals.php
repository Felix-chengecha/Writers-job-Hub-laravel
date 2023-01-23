<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meals extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'category',
        'image'
    ];

    public function ingridients(){
        return $this->hasMany(Ingridients::class);
    }

    public function bookmarks(){
        return $this->hasMany(bookmarks::class);
    }
}
