<?php

use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\IngridientController;
use App\Http\Controllers\MealsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/Recipe/allrecipes',[MealsController::class,'all_meals']);

Route::post('/Recipe/getingridients',[IngridientController::class,'all_ingridients']);

Route::post('/Recipe/cookingprocess',[IngridientController::class,'all_process']);

Route::post('/Recipe/searchfood',[MealsController::class,'search_food']);

Route::post('/Recipe/boookmarks',[BookmarkController::class,'all_bookmarks']);

Route::post('/Recipe/add_bookmark', [BookmarkController::class,'save_boomark']);


Route::post('/Recipe/login',[UsersController::class,'user_login']);
Route::post('/Recipe/register',[UsersController::class,'user_register']);

Route::post('/Recipe/userdetails',[UsersController::class,'user_details']);




// Route::group(['prefix'=>'v1'], function(){
//      Route::apiResource('meals',MealsController::class);
//      Route::apiResource('ingridiens', IngridientController::class);
// });

