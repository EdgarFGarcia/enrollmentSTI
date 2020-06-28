<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use Validator;
use DB;
use Hash;
use Auth;

class apiControllers extends Controller
{
    //
    public function index(){
        return view('welcome');
    }

    public function registeruser(Request $request){

        $validatedData = Validator::make($request->all(), [
            'username' => 'required|unique:users|max:255',
            'password' => 'required',
        ]);

        // kapag nag fail either existing na yung username or may maling pinasa from front-end
        if($validatedData->fails()){
            return response()->json([
                'response'      => false,
                'message'       => "Username Exists"
            ], 200);
        }else{
            try{
                DB::beginTransaction();
                $user = User::insert([
                    'username'      => $request->username,
                    'password'      => Hash::make($request->password)
                ]);
                DB::commit();
                if($user){
                    return response()->json([
                        'response'          => true,
                        'message'           => "Account Registration Successful"
                    ], 200);
                }
            }catch(\Exception $e){
                DB::rollBack();
                return response()->json([
                    'response'      => false,
                    'message'       => "There's an error"
                ], 200);
            }
        }
    }

    public function login(Request $request){
        $credentials;
        if(is_numeric($request->username)){
            $credentials = [
                'contact_number'    => $request->username,
                'password'          => $request->password
            ];
        }else if(filter_var($request->username, FILTER_VALIDATE_EMAIL)){
            $credentials = [
                'email'             => $request->username,
                'password'          => $request->password
            ];
        }else{
            $credentials = [
                'username'         => $request->username,
                'password'         => $request->password
            ];
        }

        $authAttempt = Auth::attempt($credentials);

        if($authAttempt){
            $Accesstoken = Auth::user()->createToken('authToken')->accessToken;
            return response()->json([
                'response'      => true,
                'user_id'       => Auth::user()->id,
                'user_position' => Auth::user()->roles_id,
                'token'         => $Accesstoken
            ], 200);
        }else{
            return response()->json([
                'response'      => false,
                'user_id'       => "",
                'token'         => ""
            ], 500);
        }
    }

    public function test(){
        return Auth::user()->id;
    }
}
