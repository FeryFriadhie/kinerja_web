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
    public function index(Request $request)
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
        $pegVerifikator = PegVerifikator::where('verifikator_id', '=', '2')->get();

        $data = HeadReport::join('tabel_det_report', 'tabel_det_report.report_id', '=', 'tabel_head_report.id')
        ->where('tabel_det_report.verifikasi_id', '2')
        ->orderBy('tabel_head_report.created_at', 'desc')
        ->paginate(3);

        if ($request->input('verifikator') || $request->input('guru')) {
            $data = HeadReport::join('tabel_det_report', 'tabel_det_report.report_id', '=', 'tabel_head_report.id')
            ->where('tabel_det_report.verifikasi_id', '2')
            ->where('tabel_head_report.peg_verifikator_id', $request->input('verifikator'))
            ->where('tabel_head_report.pegawai_id', $request->input('guru'))
            ->orderBy('tabel_head_report.created_at', 'desc')
            ->paginate(3);
        }

        return view('validator.validasi-laporan', compact('aspek', 'pegawai', 'detReport', 'data','stakeholder','group','usulan','verifikasi', 'pegVerifikator'));
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
        $updateStatus = DetReport::findOrFail($id);
        $input = $request->all();
        $updateStatus->fill($input)->save();
        return redirect('/validator/validasi-laporan')->with('success','Data telah berhasil diubah!');
    }

    public function updateall(Request $request){
        if($request->get('verifikasi_id') == "5"){
            DetReport::where('id')
                ->update([
                    'verifikator_id' => 5
                ]);
            return redirect('/validator/validasi-laporan')->with('success','Semua Laporan telah divalidasi!');
        }else {
            return redirect('/validator/validasi-laporan')->with('danger','Gagal!'); 
        }

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

     // function select option
     public function getGuru(Request $request)
     {
         $data['guru'] = DataPegawai::where("peg_verifikator_id",$request->id_pegawai)->get(["id_pegawai", "nama_pegawai"]);
         return response()->json($data['guru']);
     }
}
