<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset;
use QrCode;
use Storage;

class AssetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $serial = $request->serial;
        $image = QrCode::format('png')
                 ->size(300)
                 ->errorCorrection('H')
                 ->generate($serial);

        $fileName = $serial.'.png';
        $output_file = 'qrcode_images/'.$fileName;
        Storage::disk('local')->put($output_file, $image);


        $asset = new Asset();
        $asset->assetName = $request->name;
        $asset->serialNumber = $request->serial;
        $asset->description = $request->description;
        $asset->qrCode_url = url('/').'/storage/qrcode_images/'.$fileName;
        $asset->labId = $request->lab;

        if($asset->save()){
            return redirect('/asset')->with('success','Asset added successfully!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
