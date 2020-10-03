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
        /*Generates QrCode from asset's serial number */
        $serial = $request->serial;
        $image = QrCode::format('png')
                 ->size(300)
                 ->errorCorrection('H')
                 ->generate($serial);

        $fileName = $serial.'.png';
        $output_file = 'qrcode_images/'.$fileName;
        Storage::disk('local')->put($output_file, $image);

        /*Gets the lab id */
        $id = $id = $request->session()->get('Techniciankey');
        $labId = Technician::select('labId')->where('employeeId', $id)->get()->first();

        /*Stores values to database */
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

    /*POST
     */
    public function destroy($id)
    {
        /*Deletes asset record from database */
        Asset::where('serialNumber', $id)->delete();

        /*Deletes image from file storage */
        Storage::disk('local')->delete('qrcode_images/'.$id. '.png');

        return redirect('/asset')->with('success1', 'Asset deleted successfully');
    }
}
