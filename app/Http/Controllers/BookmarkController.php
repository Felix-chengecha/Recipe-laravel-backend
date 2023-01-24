<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\BookmarkResource;
use App\Models\Bookmarks;

class BookmarkController extends Controller
{
       public function all_bookmarks(Request $request){
        $user_id     =$request->user_id;
        return BookmarkResource::collection(  DB::table('bookmarks')
              ->select( 'bookmarks.meals_id', 'meals.name', 'meals.category', 'meals.image', 'meals.level')
                    ->leftJoin(  'meals', 'meals.id', '=', 'bookmarks.meals_id')
                    ->where('bookmarks.user_id', '=', $user_id)
                    ->get()
    );
}

       public function save_boomark(Request $request){

        $check=Bookmarks::where('user_id', $request->user_id)->where('meals_id',$request->meals_id)->exists();
          if($check){
            return response()->json([
                'MSG'=>'you have already saved this bookmark'
            ]);
          }
            $bookmarks=new Bookmarks();
                $bookmarks->user_id=$request->user_id;
                $bookmarks->meals_id=$request->meals_id;
                $bookmarks->save();

            return response()->json([
                'MSG' => 'bookmarks saved successfully'
             ]);


    }

}
