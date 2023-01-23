<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;

class UsersController extends Controller
{
    public function user_login(Request $request){
        $creds = $request->only(['email', 'password']);
        if (!$token = auth()->attempt($creds)) {

            return response()->json([
                'success' => false
            ]);
        }

        return response()->json([
            'success' => true,
            'token' => $token,
            'user' => Auth::User(),
        ]);
    }

    public function user_register(Request $request){
        $encryptpass=Hash::make($request->password);
        $user=new User;

        try{

            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=$encryptpass;

            $user->save();
            return $this->user_login($request);
        }
        Catch(Exception $e){
            return response()->json([
                        'success'=>false,
                        'message'=>$e->getMessage(),
            ]);

        }




    }
}
