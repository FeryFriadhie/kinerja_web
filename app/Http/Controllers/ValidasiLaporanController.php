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
use App\Models\PegVerifikator;
use App\Models\AktifitasUsulan;
use App\Models\VerifikatorLaporan;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ValidasiLaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id_pegawai;
        //call relationship
        $detReport = DetReport::all();
        $hReport = HeadReport::all();
        $stakeholder = Stakeholder::all();
        $aspek = Aspek::all();
        $group = AktifitasGroup::all();
        $usulan = AktifitasUsulan::all();
        $verifikasi = Verifikasi::all();
        $pegawai = DataPegawai::all();
        $pegVerifikator = PegVerifikator::all();
 
        //  $kinerja = DetReport::with('aspek','stakeholder','group', 'usulan','verifikasi')
        $kinerja = DetReport::with('aspek', 'pegawai', 'hReport', 'stakeholder','group', 'usulan','verifikasi')
        ->whereIn('verifikasi_id', array(2, 5))
        ->paginate(10);

        return view('validator.validasi-laporan', compact('aspek', 'pegawai', 'hReport', 'kinerja','stakeholder','group','usulan','verifikasi'));
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
        $updateStatus = DetReport::find($id);
        $input = $request->all();
        $updateStatus->fill($input)->save();
        return redirect('/validator/validasi-laporan')->with('success','Data telah berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $det = DetReport::find($id);
        // $det->delete();
        // return redirect('/validator/validasi-laporan')->with('success','Data telah berhasil dihapus!');
    }
}
