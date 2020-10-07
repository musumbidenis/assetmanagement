<?php

namespace App\Http\Controllers;

use App\Session1;
use App\Asset;
use App\Lab;
use DB;
use Illuminate\Http\Request;

class SessionsController extends Controller
{

    /*POST
     */
    public function start(Request $request)
    {
        /*Checks if asset exists in database
        * && if asset has been signed off
        */
        $barcode = $request->barcode;
        $checkAsset = Asset::where('serialNumber', $barcode)->count();
        $checkSession = Session1::where('serialNumber', $barcode)->where('sessionStop', '2000-01-01 00:00:00')->count();

        if ($checkAsset == 0){
           return response()->json('asset does not exist');
        }elseif ($checkSession != 0){
            return response()->json('asset not signed off');
        }else{ 
        /*Get the lab id for asset */
        $labId = Asset::select('labId')->where('serialNumber', $barcode)->get()->first();

        $session = new Session1();
        $session->userId = $request->id;
        $session->serialNumber = $barcode;
        $session->labId = $labId->labId;
        $session->sessionStart = now();

        $session->save();
           return response()->json('success');
        }
    }

    /*POST
     */
    public function stop(Request $request)
    {    
        $barcode = $request->barcode;
        $id = $request->id;

        $checkSession = Session1::where('serialNumber', $barcode)->where('userId', $id)->where('sessionStop', '2000-01-01 00:00:00')->count();

        if($checkSession == 0){
            return response()->json('youre not signed in for this asset');
        }else{
            
        $stop = now();
        DB::table('session1s')
                    ->where('userId', $id)
                    ->where('serialNumber', $barcode)
                    ->where('sessionStop', '2000-01-01 00:00:00')
                    ->update(['sessionStop' => $stop]);
        
        return response()->json('success');
        }
        
    }
}
