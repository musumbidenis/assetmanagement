<?php

namespace App\Http\Controllers;

use App\Session;
use App\Asset;
use App\Lab;
use Illuminate\Http\Request;

class SessionsController extends Controller
{
    /*GET
     */
    public function labs()
    {
        $labs = Lab::get();

        return $labs;
    }
    /*POST
     */
    public function start(Request $request)
    {
        $session = new Session();
        $session->userId = $request->id;
        $session->serialNumber = $request->barcode;
        $session->labId = $request->lab;
        $session->sessionStart = now();

        if($session->save()){
            return response()->json('success');
        }else{
            return response()->json('error');
        }

    }

    /*POST
     */
    public function stop(Request $request)
    {      
    }
}
