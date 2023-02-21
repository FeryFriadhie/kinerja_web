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
use Illuminate\Support\Facades\File;

class VerifikasiLaporanController extends Controller
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
        $pegVerifikator = PegVerifikator::all();

        $pegawai = DataPegawai::where('peg_verifikator_id', '=',  $id)->get(); //list guru dropdown filter
        $verifikasi = Verifikasi::whereIn('id', [1,2,3,4])->get(); //list filter status

        $kinerja = HeadReport::join('tabel_det_report', 'tabel_det_report.report_id', '=', 'tabel_head_report.id')
        ->where('tabel_det_report.verifikasi_id', '3')
        ->orderBy('tabel_head_report.created_at', 'desc')
        ->paginate(3);

        // dd($kinerja);

        if ($request->input('guru') && $request->input('status')) {
            $kinerja = HeadReport::join('tabel_det_report', 'tabel_det_report.report_id', '=', 'tabel_head_report.id')
            ->whereIn('tabel_det_report.verifikasi_id', [1,2,3,4])
            ->where('tabel_det_report.verifikasi_id', $request->input('status'))
            ->where('tabel_head_report.pegawai_id', $request->input('guru'))
            ->orderBy('tabel_head_report.created_at', 'desc')
            ->paginate(3);
        } 
        else {
            return view('verifikator.verifikasi-laporan', compact('aspek', 'pegawai', 'detReport', 'kinerja','stakeholder','group','usulan','verifikasi', 'pegVerifikator'))->with('danger', 'Mohon cari guru dengan status laporan!');
        }

        return view('verifikator.verifikasi-laporan', compact('aspek', 'pegawai', 'detReport', 'kinerja','stakeholder','group','usulan','verifikasi', 'pegVerifikator'));

        // dd($kinerja->bukti_dokumen);

        // $kinerja = HeadReport::with('aspek', 'pegawai', 'dReport','stakeholder','group', 'usulan','verifikasi')
        // ->where('peg_verifikator_id', '=',  $id)
        // ->orderBy('created_at', 'desc')
        // ->paginate(5);

        // // if($request->input('guru') && $request->input('status')){
        // if($request->input('guru')){
        //         $kinerja = HeadReport::with('aspek', 'pegawai', 'detReport','stakeholder','group', 'usulan','verifikasi')
        //             ->where('peg_verifikator_id', '=',  $id)
        //             ->where('pegawai_id', $request->input('guru'))
        //             ->orderBy('created_at', 'desc')
        //             ->paginate(5);
        //         // $d = $kinerja->detReport()->whereIn('verifikasi_id', [1, 2, 3, 4]);
        //         // $kinerja = $d;
        // }
         
    }

    //function for view dokumen in new tab
    public function viewDoc($file){
        $file = str_replace('&','.',$file);
        // dd($file);
        $ext = File::extension($file);
        // dd($ext);
        if ($ext == 'pdf') {
            $content_types='application/pdf';
        }elseif ($ext == 'doc') {
            $content_types='application/msword';
        }elseif ($ext == 'docx') {
            $content_types='application/vnd.openxmlformats-officedocument.wordprocessingml.document';
        }elseif ($ext=='xls') {
            $content_types='application/vnd.ms-excel';  
        }elseif ($ext=='xlsx') {
            $content_types='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';  
        }elseif ($ext=='txt') {
            $content_types='application/octet-stream';  
        }
        return response()->file(public_path('/bukti/dokumen/' .'/'. $file), [
            'Content-Type' => $content_types
        ]);
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
        
        if ($updateStatus) {
            $updateStatus->fill($input)->save();
            return redirect('/verifikator/verifikasi-laporan')->with('success','Status laporan berhasil disimpan!');
        } else {
            return redirect('/verifikator/verifikasi-laporan')->with('danger','Status laporan gagal disimpan!');
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
        $det = DetReport::find($id);
        $det->delete();
        return redirect('/verifikator/verifikasi-laporan')->with('success','Data telah berhasil dihapus!');
    }
}
