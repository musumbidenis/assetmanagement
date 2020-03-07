<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset;
use App\Lab;
use App\Session1;
use App\Technician;
use Session;
use DB;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home(Request $request)
    {
        $id = $request->session()->get('Techniciankey');
        $assets = DB::table('assets')
                  ->join('technicians', 'technicians.labId', '=', 'assets.labId')
                  ->where('technicians.employeeId', '=', $id)
                  ->distinct()
                  ->count();
        
        return view('pages.home')->with('assets', $assets)->with('id', $request->session()->get('Techniciankey'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function asset(Request $request)
    {
        $id = $request->session()->get('Techniciankey');
        $assets = DB::table('assets')
                ->join('technicians', 'technicians.labId', '=', 'assets.labId')
                ->where('technicians.employeeId', '=', $id)
                ->distinct()
                ->get();

        return view('pages.asset')->with('assets', $assets)->with('id', $request->session()->get('Techniciankey'));
    }

    /**
     */
    public function session(Request $request)
    {
        $id = $request->session()->get('Techniciankey');
        $sessions = DB::table('session1s')
                    ->join('technicians', 'technicians.labId', 'session1s.labId')
                    ->where('technicians.employeeId', '=', $id)
                    ->distinct()
                    ->get();
        return view('pages.session')->with('sessions', $sessions)->with('id', $request->session()->get('Techniciankey'));
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
