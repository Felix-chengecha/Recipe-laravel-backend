<?php

namespace App\Http\Controllers;

use IntlChar;
use App\Models\Ingridients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\IngridientsResource;
use App\Http\Resources\ProcessResource;

class IngridientController extends Controller
{
    public function all_ingridients(Request $request){
        $meals_id=$request->meals_id;
        return IngridientsResource::collection(  DB::table('ingridients')
                    ->leftJoin( 'meals', 'meals.id', '=', 'ingridients.meals_id'
                    )
                    ->select(
                        'meals.id',
                        'meals.name',
                        'meals.image',
                        'meals.category',
                        'ingridients.ingridients',
                        'ingridients.process',)
                        ->where('meals.id', '=', $meals_id)
                        ->get()
    );
}

public function all_process(Request $request){
    $meals_id=$request->meals_id;

    return ProcessResource::collection( Ingridients::where('meals_id', $meals_id)->get());

}

}
