<?php

namespace App\Http\Controllers;

use App\Models\Meals;
use App\Http\Resources\MealsResource;
use App\Http\Requests\StoreMealsRequest;
use App\Http\Requests\UpdateMealsRequest;

class MealsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        return Meals::all();

     }

}
