<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Aspek;
use GuzzleHttp\Client;
use App\Models\DetReport;
use App\Models\HeadReport;
use App\Models\Verifikasi;
use App\Models\DataPegawai;
use App\Models\Stakeholder;
use App\Models\Verifikator;
use Illuminate\Http\Request;
use App\Models\AktifitasGroup;
use App\Models\PegVerifikator;
use App\Models\AktifitasUsulan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Calculation\Token\Stack;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;
use PhpOffice\PhpSpreadsheet\Calculation\DateTimeExcel\Month;

class KinerjaController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id_pegawai;
        //call relationship
        $detReport = DetReport::all();
        $headReport = HeadReport::all();
        $stakeholder = Stakeholder::all();
        $aspek = Aspek::all();
        $group = AktifitasGroup::all();
        $usulan = AktifitasUsulan::all();
        $verifikasi = Verifikasi::all();
        $pegawai = DataPegawai::all();
        $verifikator = Verifikator::all();
        $pegVerifikator = PegVerifikator::where('id_peg_verifikator', $id);

        $kinerja = HeadReport::with('aspek', 'detReport','stakeholder','group', 'usulan','verifikasi','verifikator')
        ->where('pegawai_id', '=', $id)
        ->orderBy('created_at', 'desc')
        ->paginate(5);
        
        return view('member.kinerja.index', compact('aspek','detReport','kinerja','stakeholder','group','usulan','verifikasi','verifikator'));
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

    public function create()
    {
        $id = Auth::user()->id;
        $detReport = DetReport::all();
        $headReport = HeadReport::all();
        $stakeholder = Stakeholder::all();
        $aspek = Aspek::all();
        $group = AktifitasGroup::all();
        $pegawai = DataPegawai::all();
        $usulan = AktifitasUsulan::all();
        $verifikasi = Verifikasi::all();

        $kinerja = HeadReport::with('aspek', 'detReport','stakeholder','group', 'usulan','verifikasi')
        ->where('pegawai_id', '=', $id)
        ->paginate(); 
        return view('member.kinerja.tambah', compact('aspek','detReport','kinerja','stakeholder','group','usulan','verifikasi'));
    } 

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'stakeholder_id' => 'required',
            'aspek_id' => 'required',
            'group_id' =>'required',
            'usul_id' => 'required',
            'jumlah' => 'required',
            // 'bukti_foto' => 'required',
            // 'bukti_foto.*' => 'image',
            'bukti_dokumen' => 'required',
            'bukti_dokumen.*' => 'required|mimes:doc,docx,xlsx,xls,pdf',
        ]);
        
        // STORE TO TABLE HEAD REPORT
        $pegawai_id = Auth::user()->id_pegawai;
        $peg_verifikator_id = Auth::user()->peg_verifikator_id;
        $hReport = new HeadReport();
        $hReport->pegawai_id = $pegawai_id;
        $hReport->bulan = Carbon::now()->isoFormat('MMMM');
        $hReport->tahun = Carbon::now()->isoFormat('Y');
        $hReport->peg_verifikator_id = $peg_verifikator_id; //verifikator
        $hReport->verifikator_id = 1; //validator
        $hReport->save();
    
        // STORE TO TABLE DET REPORT
        $dReport= new DetReport();
        $dReport->report_id = $hReport->id;
        $dReport->stakeholder_id = $request->input('stakeholder_id');
        $dReport->aspek_id = $request->input('aspek_id');
        $dReport->group_id = $request->input('group_id');
        $dReport->usul_id = $request->input('usul_id');
        $dReport->jumlah = $request->input('jumlah') * 45;
        $dReport->hari = Carbon::now()->locale('id')->isoFormat('dddd');
        $dReport->tanggal = Carbon::now()->locale('id')->isoFormat('D MMMM Y');
        $dReport->ket_foto = $request->input('ket_foto');
        $dReport->ket_dokumen = $request->input('ket_dokumen');
        $dReport->ket_aktifitas = $request->input('ket_aktifitas');

        // upload foto
        $files = [];
        if($request->hasfile('bukti_foto'))
        {
            foreach($request->file('bukti_foto') as $file)
            {
                $name = time().rand(1,50).'.'.$file->extension();
                $path = public_path('/bukti/images');
                $img = Image::make($file->path());
                $img->resize(300, 400, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path.'/'.$name);
                $files[] = $name;
            }
        }
        $dReport->bukti_foto = $files;

        // upload file/dokumen
        $doc = [];
        if($request->hasfile('bukti_dokumen'))
            {
            foreach($request->file('bukti_dokumen') as $file)
            {
                $name = time().rand(1,50).'.'.$file->extension();
                $destinationPath = public_path('/bukti/dokumen');
                $file->move($destinationPath, $name);
                $doc[] = $name;
            }
        }
        $dReport->bukti_dokumen = $doc;
        
        if($dReport){
            $dReport->save();
            return redirect('/member/kinerja')->with('success', 'Laporan Aktifitas Disimpan.');
        }else{
            return redirect('/member/kinerja/buat-laporan')->with('error', 'Laporan Aktifitas gagal disimpan.');
        }
    }


    public function update(Request $request, $id)
    {
        //UPDATE Laporan
        $det = DetReport::find($id);
        $input = $request->all();
        $det->fill($input)->save();
        //alditooww eta nu hapus, dina det report na teu kahapus
        //delete data foreign key id, kitu kan? ohh enya, brrti kla
        // report_id teh fk kannya? heem
        //mun id head report dihapus, report_id dina det report kudu kah9apus
        // eta kmu bisa akses database teu yeuh
        // mih puguh
        // basa eta ge nyobiant bisa wae siah, pling bsk di tnya ka si anto kmh, hilap deui:(
            // basa kmri orin ngim g tdk bisa
            // bbti anu hpus g acan ny?
        // )
        // $det = DetReport::findOrFail($id);
        // $det->stakeholder_id = $request->input('stakeholder_id');
            // $det->aspek_id = $request->input('aspek_id');
            // $det->group_id = $request->input('group_id');
            // $det->usul_id = $request->input('usul_id');
            // $det->jumlah = $request->input('jumlah') * 45;
            // $det->hari = Carbon::now()->locale('id')->isoFormat('dddd');
            // $det->tanggal = Carbon::now()->locale('id')->isoFormat('D MMMM Y');
            // $det->ket_foto = $request->input('ket_foto');
            // $det->ket_dokumen = $request->input('ket_dokumen');
            // $det->ket_aktifitas = $request->input('ket_aktifitas');

            // $updatefiles = [];
            // if($request->hasfile('bukti_foto'))
            // {   
            //     foreach($request->file('bukti_foto') as $file)
            //     {            //         $name = rand(1,50).'.'.$file->extension();
            //         $destinationPath = public_path('/bukti/images');
            //         $img = Image::make($file->path());
            //         $img->resize(300, 400, function ($constraint) {
            //             $constraint->aspectRatio();
            //         })->save($destinationPath.'/'.$name);
            //         $updatefiles[] = $name; 
            //     }
            // }
        // $det->bukti_foto = $updatefiles; 

        $awal = $det->bukti_foto;

        $foto = [
            'bukti_foto' =>  'array',
        ];
        $request->bukti_foto->move(public_path().'/bukti/images/', $awal);
        
        if($det){
            // $det->update();
            $det->update();
            return redirect('/member/kinerja')->with('success','Laporan Aktifitas Berhasil Diubah!');
        }else{
            return redirect('/member/kinerja')->with('error','Laporan Aktifitas Gagal Diubah!');
        }
    }


    public function destroy($id)
    {
        //DELETE LAPORAN
        $head = HeadReport::find($id);
        $det = DetReport::find($id->report_id);
        // $det = DetReport::find($id);
        // $head->headReport()->detach();
        if ($head) {
            $head->delete();
            $det->delete();
            return redirect('/member/kinerja')->with('success','Laporan Aktifitas Berhasil Dihapus!');
        } else {
            return redirect('/member/kinerja')->with('danger','Laporan Aktifitas Gagal Dihapus!');
        }
        
        // $det->delete();
        
// aldita, iyah apa yang? bade ngerjaken nu mana? abi can uih da :) inii abi ngrjkaeun delete/ saurna fery mah kan update? hayu ku abi dibantuan oke tapi abi can uih 
// uih na kapan?:(  fer pake hp? brrti blm instal di pc?
        // $head = HeadReport::find($id);
        // // $det = DetReport::find($id);
        // $head->heqdReport()->detach();
        // $head->delete();
        // // $det->delete();
        // return redirect('/member/kinerja')->with('success','Laporan Aktifitas Berhasil Dihapus!');
        
    }


    // function select option
    public function getGroup(Request $request)
    {
        $data['group'] = AktifitasGroup::where("aspek_id",$request->group_id)->get(["group_aktifitas", "id"]);
        return response()->json($data['group']);
    }

    public function getUsul(Request $request)
    {
        $data['usul'] = AktifitasUsulan::where("group_id",$request->usul_id)->get(["aktifitas_usulan", "id"]);
        return response()->json($data['usul']);
    }

    
}
