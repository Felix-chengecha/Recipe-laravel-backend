<?php

namespace App\Http\Controllers;

use App\Http\Resources\IngridientsResource;
use App\Http\Resources\MealsResource;
use App\Models\Ingridients;
use App\Models\Meals;
use Illuminate\Http\Request;

class MealsController extends Controller{

    public function all_meals(Request $request) {
        $cat=$request->category;

        if($cat=='1'){
            return MealsResource::collection(Meals::all());
        }
        elseif($cat=='2'){
            return MealsResource::collection(Meals::where('category','fast food')->get() );
        }
        else if($cat=='3'){
            return MealsResource::collection(Meals::where('category','drinks')->get() );
        }
        else{
            return MealsResource::collection(Meals::all());
        }


     }

     public function search_food(Request $request){

        $food=$request->food;

        return MealsResource::collection(

            Meals::where('name', 'LIKE', '%' . $food. '%')->get()
          );

     }
}
