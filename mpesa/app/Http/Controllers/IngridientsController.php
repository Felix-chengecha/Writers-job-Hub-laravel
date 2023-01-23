<?php

namespace App\Http\Controllers;

use App\Http\Resources\IngridientResource;
use App\Models\Ingridients;
use Illuminate\Http\Request;

class IngridientsController extends Controller
{

    public function index(){

    return IngridientResource::collection(Ingridients::all());

                //  DB::table('ingridients')
                //     ->leftJoin( 'meals', 'meals.id', '=', 'ingridients.meals_id'
                //     )
                //     ->select(
                //         'meals.id',
                //         'meals.name',
                //         'meals.image',
                //         'meals.category',
                //         'ingridients.ingridients',
                //         'ingridients.process',
                //     )->groupBy('meals.id')
                //     ->get();


    }
}
