<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset;
use DB;
use PDF;

class ReportsController extends Controller
{
    /*GET
     */
    public function assetReport(Request $request)
    {
        $id = $request->session()->get('Techniciankey');

        //Fetch the data to generate report
        $id = $request->session()->get('Techniciankey');
        $assets = DB::table('assets')
                ->join('technicians', 'technicians.labId', '=', 'assets.labId')
                ->where('technicians.employeeId', '=', $id)
                ->distinct()
                ->get();
        view()->share('assets',$assets);

        
        // Send data to the view using loadView function of PDF facade
        $pdf = PDF::loadView('pdf.assets');

        // If you want to store the generated pdf to the server then you can use the store function
        $pdf->save(storage_path().'_filename.pdf');

        // Finally, you can download the file using download function
        return $pdf->download('assets.pdf');

    }

    /*GET
     */
    public function complete(Request $request)
    {
        $id = $request->session()->get('Techniciankey');
        
        $from = $request->from;
        $to = $request->to;

        //Fetch the data to generate report
        $sessions = DB::table('session1s')
                    ->join('technicians', 'technicians.labId', 'session1s.labId')
                    ->where('technicians.employeeId', '=', $id)
                    ->whereBetween('session1s.sessionStop', [$from, $to])
                    ->distinct()
                    ->get();
        view()->share('sessions',$sessions);

        
        // Send data to the view using loadView function of PDF facade
        $pdf = PDF::loadView('pdf.complete');

        // If you want to store the generated pdf to the server then you can use the store function
        //$pdf->save(storage_path().'_filename.pdf');

        // Finally, you can download the file using download function
        return $pdf->download('asset-usage-report.pdf');

    }
    
    /*GET
     */
    public function incomplete(Request $request)
    {
        $id = $request->session()->get('Techniciankey');
        
        //Fetch the data to generate report
        $sessions = DB::table('session1s')
                    ->join('technicians', 'technicians.labId', 'session1s.labId')
                    ->where('technicians.employeeId', '=', $id)
                    ->where('session1s.sessionStop', '2000-01-01 00:00:00')
                    ->distinct()
                    ->get();
        view()->share('sessions',$sessions);

        
        // Send data to the view using loadView function of PDF facade
        $pdf = PDF::loadView('pdf.incomplete');

        // If you want to store the generated pdf to the server then you can use the store function
        //$pdf->save(storage_path().'_filename.pdf');

        // Finally, you can download the file using download function
        return $pdf->download('asset-usage-report.pdf');

    }
}
