<?php

namespace App\Http\Controllers;

use App\Http\Resources\IngridientsResource;
use App\Models\Ingridients;
use App\Models\Meals;
use Illuminate\Http\Request;

class MealsController extends Controller{

    public function all_meals() {

        return IngridientsResource::collection(Meals::all());

     }

     public function search_food(Request $request){

        $food=$request->food;

        return IngridientsResource::collection(

            Meals::where('name', 'LIKE', '%' . $food. '%')->get()
          );

     }
}
