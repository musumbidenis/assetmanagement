<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset;
use App\Technician;
use QrCode;
use Storage;
use Session;
use DB;

class AssetsController extends Controller
{
    /*POST
     */
    public function store(Request $request)
    {
        //Generating QrCode from asset's serial number//
        $serial = $request->serial;
        $image = QrCode::format('png')
                 ->size(300)
                 ->errorCorrection('H')
                 ->generate($serial);

        $fileName = $serial.'.png';
        $output_file = 'qrcode_images/'.$fileName;
        Storage::disk('local')->put($output_file, $image);

        //Getting the lab id//
        $id = $id = $request->session()->get('Techniciankey');
        $labId = Technician::select('labId')->where('employeeId', $id)->get()->first();

        //Store the values to database//
        $asset = new Asset();
        $asset->assetName = $request->name;
        $asset->serialNumber = $request->serial;
        $asset->description = $request->description;
        $asset->qrCode_url = url('/').'/storage/qrcode_images/'.$fileName;
        $asset->labId = $labId->labId;

        if($asset->save()){
            return redirect('/asset')->with('success','Asset added successfully!');
        }
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
