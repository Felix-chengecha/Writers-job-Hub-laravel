<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingridients extends Model
{
    use HasFactory;

    protected $table = 'meals';

    protected $fillable = [
        'name',
        'category',
        'image'
    ];

    public function meals(){
        return $this->belongsTo(Meals::class);
    }
}
