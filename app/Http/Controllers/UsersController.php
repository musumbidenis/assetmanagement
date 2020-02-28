<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /*POST
     */
    public function register(Request $request)
    {

        $user = new User();
        $user->userId = $request->id;
        $user->firstName = $request->fname;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->phoneNumber = $request->phoneNumber;
        $user->idNumber = $request->idNumber;

        if($user->save()){
          return response()->json('success');
        }else{
          return response()->json('error');
        }
    }

    /*POST
     */
    public function login(Request $request)
    {     
        $id = $request->id;
        $idNumber = $request->idNumber;

        $credentials = User::where('userId', $id)->where('idNumber', $idNumber)->count();

        if($credentials == 0){
            return response()->json('error');
        }else{
            return response()->json('success');
        }
    }
}
