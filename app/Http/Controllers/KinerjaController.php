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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class KinerjaController extends Controller
{
    public function index(Request $request)
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

        $kinerja = HeadReport::join('tabel_det_report', 'tabel_det_report.report_id', '=', 'tabel_head_report.id')
        ->where('tabel_det_report.verifikasi_id', [1,3])
        ->orderBy('tabel_head_report.created_at', 'desc')
        ->paginate(3);

        if ($request->input('status')) {
            $kinerja = HeadReport::join('tabel_det_report', 'tabel_det_report.report_id', '=', 'tabel_head_report.id')
            ->whereIn('tabel_det_report.verifikasi_id', [1,2,3,4,5])
            ->where('tabel_det_report.verifikasi_id', $request->input('status'))
            ->orderBy('tabel_head_report.created_at', 'desc')
            ->paginate(3);
        }
        return view('member.kinerja.index', compact('aspek','detReport','kinerja','stakeholder','group','usulan','verifikasi','verifikator'));
    }

    public function viewDoc($file){ //function for view dokumen in new tab
        $file = str_replace('&','.',$file);
        $ext = File::extension($file);
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

        $verifikasi = Verifikasi::whereIn('id', [1,2,3,4])->get(); //list filter status

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
            'bukti_foto' => 'required',
            'bukti_foto.*' => 'image',
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
        $dReport->bukti_foto = json_encode($files);

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
            return redirect('/member/kinerja/buat-laporan')->with('danger', 'Laporan Aktifitas gagal disimpan.');
        }
    }

    public function update(Request $request, $id)
    {
        //UPDATE Laporan
        // $det = DetReport::findOrFail($id);
        $det = DetReport::findOrFail($id);
        $det->stakeholder_id = $request->input('stakeholder_id');
        $det->aspek_id = $request->input('aspek_id');
        $det->group_id = $request->input('group_id');
        $det->usul_id = $request->input('usul_id');
        $det->jumlah = $request->input('jumlah') * 45;
        $det->ket_foto = $request->input('ket_foto');
        $det->ket_dokumen = $request->input('ket_dokumen');
        $det->ket_aktifitas = $request->input('ket_aktifitas');

        //update images multiple and delete exist image
        $files = [];
        if($request->hasfile('foto')) 
        {
            #Using file
            // $path = public_path('/bukti/images');
            // $det->bukti_foto = basename($path);
            // if( File::exists(public_path('/bukti/dokumen/' .'/'. $path)) ) {
            //     File::delete(public_path('/bukti/dokumen/' .'/'. $path));
            // }   
            // basename($path);
            foreach($request->file('foto') as $file)
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
        $det->bukti_foto = $files;

        // update dokumen
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
        $det->bukti_dokumen = $doc;

        if($det){
            $det->save();
            return redirect('/member/kinerja')->with('success', 'Laporan Aktifitas Berhasil Diubah!');
        }else{
            return redirect('/member/kinerja')->with('danger', 'Laporan Aktifitas gagal diubah!');
        }
    }


    public function destroy($id)
    {
        //DELETE LAPORAN
        $head = HeadReport::find($id);
        DetReport::where('report_id', $id)->delete(); //get report_it
        if ($head) {
            $head->delete();
            return redirect('/member/kinerja')->with('success','Laporan Aktifitas Berhasil Dihapus!');
        } else {
            return redirect('/member/kinerja')->with('danger','Laporan Aktifitas Gagal Dihapus!');
        }
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
