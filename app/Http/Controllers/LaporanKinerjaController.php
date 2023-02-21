<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
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
use Egulias\EmailValidator\Result\Reason\DetailedReason;

class LaporanKinerjaController extends Controller
{

    // public function lap_kinerja(){
    //     return view('laporan.kinerja');
    // }
    // public function lap_kinerja_ajax(Request $request){

    //     $dari_tanggal = $request->dari_tanggal;
    //     $sampai_tanggal = $request->sampai_tanggal;

    //     $laporan = HeadReport::with('aspek','stakeholder','group', 'usulan','verifikasi', 'detReport')
    //     ->where('pegawai_id', '=', auth()->user()->id_pegawai)
    //     ->whereBetween('tanggal', [$dari_tanggal, $sampai_tanggal])
    //     ->paginate(10);


    //     $laporan = HeadReport::whereBetween('dateFrom', [$dari_tanggal, $sampai_tanggal])->get();
    //     dd($laporan);
    //     // $data = [];
    //         // foreach($det as $index => $item) {
    //         //     $list = [];
    //         //     $list[] = $index + 1;
    //         //     $list[] = $item->aspek->nama;
    //         //     $list[] = $item->stakeholder->nama;
    //         //     $list[] = $item->group->nama;
    //         //     $list[] = $item->usulan->nama;
    //         //     $list[] = $item->verifikasi->nama;
    //         //     $list[] = $item->tanggal;
    //         //     $list[] = $item->dari_tanggal;
    //         //     $list[] = $item->sampai_tanggal;
    //         //     $list[] = $item->keterangan;
    //         //     $list[] = $item->status;
    //         //     $list[] = $item->created_at;
    //         //     $list[] = $item->updated_at;
    //         //     $data[] = $list;
            
    //         // }
            
    //         // $laporan = HeadReport::with('aspek','stakeholder','group', 'usulan','verifikasi', 'detReport')
    //         // // $laporan = DetReport::with('aspek','stakeholder','group', 'usulan','verifikasi')
    //         // ->where('verifikasi_id', '=', '5')
    //         // ->whereBetween('tanggal', [$dari_tanggal, $sampai_tanggal])
    //         // ->paginate();{{  }}

    //     return response()->json([
    //         "data" => $laporan,
    //     ], 200);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //call relationship
        $detReport = DetReport::all();
        $headReport = HeadReport::all();
        $stakeholder = Stakeholder::all();
        $aspek = Aspek::all();
        $group = AktifitasGroup::all();
        $usulan = AktifitasUsulan::all();
        $verifikasi = Verifikasi::all();
        $pegawai = DataPegawai::all();

        // $laporan = HeadReport::with('aspek','stakeholder','group', 'usulan','verifikasi', 'detReport')
        // ->where('pegawai_id', '=', auth()->user()->id_pegawai)
        // ->paginate(10);

        $laporan = HeadReport::join('tabel_det_report', 'tabel_det_report.report_id', '=', 'tabel_head_report.id')
        ->where('tabel_head_report.pegawai_id', auth()->user()->id_pegawai)
        ->where('tabel_det_report.verifikasi_id', '5')
        ->orderBy('tabel_head_report.created_at', 'desc')
        ->paginate(3);

        if ($request->input('dari_tanggal') || $request->input('sampai_tanggal')) {
            // $daritgl->$request->input('dari_tanggal') = Carbon::locale('id')->isoFormat('D MMMM Y');
            // $sampaitgl = $request->input('sampai_tanggal');

            $daritgl =  date('d F Y', strtotime($request->input('dari_tanggal')));
            $sampaitgl =  date('d F Y', strtotime($request->input('sampai_tanggal')));

            // dd($dar  itgl);
            $laporan = HeadReport::join('tabel_det_report', 'tabel_det_report.report_id', '=', 'tabel_head_report.id')
            ->where('tabel_det_report.verifikasi_id', '5')
            // ->whereBetween('tabel_det_report.tanggal', 'LIKE', '%'.$daritgl.'%', 'AND' ,'%'.$sampaitgl.'%')
            ->whereBetween('tabel_det_report.tanggal', [$daritgl, $sampaitgl])
            ->orderBy('tabel_head_report.created_at', 'desc')
            ->paginate(3);
        }
        
        return view('member.laporan.index', compact('laporan','aspek','stakeholder','group','usulan','verifikasi'));
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
{{  }}