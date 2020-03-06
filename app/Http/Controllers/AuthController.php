<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Technician;
use Auth;
use DB;
use Alert;
use Session;

class AuthController extends Controller
{
    /*GET
     */
    public function registrationForm()
    {
        return view('auth.register');
    }

    /*POST
     */
    public function register(Request $request)
    {

        $technician = new Technician();
        $technician->employeeId = $request->id;
        $technician->firstName = $request->fname;
        $technician->surname = $request->surname;
        $technician->email = $request->email;
        $technician->phoneNumber = $request->phoneNumber;
        $technician->labId = $request->lab;

        if($technician->save()){
          return redirect('/')->with('success','Registration successfull!');
        }
    }
    
    /*GET
     */
    public function loginForm()
    {
        return view('auth.login');
    }

    /*POST
     */
    public function login(Request $request)
    {     
        $email = $request->email;
        $id = $request->id;

        $credentials = Technician::where('email', $email)->where('employeeId', $id)->count();

        if($credentials == 0){
            return redirect('/')->with('error','Incorrect details!');
        }else{
            $request->session()->put('Techniciankey', $id);
            return redirect('home');
        }
        

    }

    /*GET
     */
    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/');
    }
}
