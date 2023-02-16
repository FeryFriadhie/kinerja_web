<?php

namespace App\Http\Controllers;

use DataTables;
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
use Symfony\Component\Mime\Part\DataPart;

class VerifikasiLaporanController extends Controller
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
        $stakeholder = Stakeholder::all();
        $aspek = Aspek::all();
        $group = AktifitasGroup::all();
        $usulan = AktifitasUsulan::all();
        $verifikasi = Verifikasi::all();
        $pegawai = DataPegawai::all();

        $kinerja = HeadReport::with('aspek', 'pegawai', 'detReport','stakeholder','group', 'usulan','verifikasi')
        ->where('peg_verifikator_id', '=',  $id)
        ->paginate(5); 
        return view('verifikator.verifikasi-laporan', compact('aspek', 'pegawai', 'kinerja','stakeholder','group','usulan','verifikasi'));
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
        $updateStatus->fill($input)->save();
        return redirect('/verifikator/verifikasi-laporan')->with('success','Aksi tersimpan!');

        // $updateHeadReport = HeadReport::find($id);
        // $input = $request->all();
        // $updateHeadReport->fill($input)->save();
        // return redirect('/verifikator/verifikasi-laporan')->with('success','Data telah berhasil diubah!');
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
