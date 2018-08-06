<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;

class UserController extends Controller
{

    public $successStatus = 200;

    // login api
    public function login(Request $request) {

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $user = Auth::user();
            $success['token'] = $user->createToken('Auth')->accessToken;
            return response()->json(['success' => $success], $this->successStatus);

        } else {

            return response()->json(['error' => 'Unauthorised'], 401);

        }

    } // login

    // register api
    public function register(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'c_password' => 'required | same:password',
        ]);

        if($validator->fails()) {

            return response()->json(['error' => $validator->errors()], 401);

        }

        $input = $request->all(); 
        $input['password'] = bcrypt($input['password']); 
        $user = User::create($input); 
        $success['token'] =  $user->createToken('Auth')->accessToken; 
        $success['name'] =  $user->name;
        return response()->json(['success'=>$success], $this->successStatus); 

    } // register

    // details api
    public function details() {

        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);

    } // details

} // UserController
