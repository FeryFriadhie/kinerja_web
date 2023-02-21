<?php

namespace App\Http\Controllers;

use App\Models\Aspek;
use App\Models\DetReport;
use App\Models\HeadReport;
use App\Models\Verifikasi;
use App\Models\DataPegawai;
use App\Models\Stakeholder;
use Illuminate\Http\Request;
use App\Models\AktifitasGroup;
use App\Models\AktifitasUsulan;
use App\Http\Controllers\Controller;

class LaporanVerifikatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detReport = DetReport::all();
        $headReport = HeadReport::all();
        $stakeholder = Stakeholder::all();
        $aspek = Aspek::all();
        $group = AktifitasGroup::all();
        $usulan = AktifitasUsulan::all();
        $verifikasi = Verifikasi::all();
        $pegawai = DataPegawai::all();

        $laporan = HeadReport::with('aspek', 'detReport', 'stakeholder','group', 'usulan','verifikasi')
        ->paginate();
        return view('verifikator.laporan', compact('laporan', 'detReport', 'aspek','stakeholder','group','usulan','verifikasi'));
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
        //
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
