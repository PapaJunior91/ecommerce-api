<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
     /**
     * login user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        //
        $request->validate([
            'phone_number' => 'required',
            'password' => 'required'
        ]);

        $login_user = Auth::attempt([
            'phone_number'=>$request->phone_number,
            'password'=>$request->password
        ]);

        if($login_user){
            return response()->json([
                'status' => true,
                'data' => Auth::user(),
                'message' => "User Login Successful"
            ]);
        }
        
        return response()->json([
            'status' => false,
            'message' => "Wrong Phone or email"
        ]);
        

    }
}
