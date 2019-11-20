<?php

namespace EBN\Http\Controllers;

use Illuminate\Http\Request;
use EBN\Admin;
use EBN\User;
use Auth;

class AdminJsonResponseController extends Controller
{
    /*
    |-----------------------------------------
    | DO ADMIN LOGIN
    |-----------------------------------------
    */
    public function doLogin(Request $request){
    	// body
        $email      = $request->email;
        $password   = $request->password;

        // remember token
        $rememberToken = $request->remember;

        // check auth for Admin login Guard
        if (Auth::guard('admin')->attempt(['email' => $email, 'password' => $password], $rememberToken)) {
            // if successful 
            $data = [
                'status'  => 'success',
                'message' => 'Login Successful !'
            ];

        } else {
             // if successful 
            $data = [
                'status'  => 'error',
                'message' => 'Login Fail !'
            ];
        }
    	
    	
    	// return response.
    	return response()->json($data);
    }

    /*
    |-----------------------------------------
    | CREATE NEW USER
    |-----------------------------------------
    */
    public function createUser(Request $request){
        // body
        $user = new Admin();
        $data = $user->registerNewUser($request);

        // return response.
        return response()->json($data);
    }

}
