<?php

namespace App\Http\Controllers;

use App\Session;
use App\Asset;
use Illuminate\Http\Request;

class SessionsController extends Controller
{
    /*POST
     */
    public function start(Request $request)
    {
        $serial = $request->barcode;
        $assetId = Asset::select('assetId')->where('serialNumber', $serial)->get();

        $session = new Session();
        $session->userId = $request->id;
        $session->assetId = $assetId;
        $session->labId = $request->lab;
        $session->sessionStart = now();

        $session->save();

        
    }

    /*POST
     */
    public function stop(Request $request)
    {      
    }
}
