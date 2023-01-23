<?php

namespace App\Http\Controllers;

use App\Models\Meals;
use Illuminate\Http\Request;
use App\Http\Resources\MealsResource;

class MMController extends Controller


{public function store(){


    return MealsResource::collection(Meals::all());

}

}
