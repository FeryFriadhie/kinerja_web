<?php

namespace App\Http\Controllers;

use App\Models\DataPegawai;
use App\Models\Verifikator;
use Illuminate\Http\Request;

class DataPegawaiController extends Controller
{

    public function index()
    {
        //call relasi
        $verifikator = Verifikator::all();

        $pegawai = DataPegawai::with('verifikator')->paginate();
        return view('admin.master-data.data-pegawai.index', compact('pegawai','verifikator'));
    }

    // public function create()
    // {
    //     return view('admin.master-data.data-pegawai.tambah');
    // }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nik' => 'required|min:16|max:16',
            'nama_pegawai' => 'required',
            'verifikator_id' => 'required',
        ]);
        $pegawai = new DataPegawai();
        $pegawai->nik = $request->input('nik');
        $pegawai->nama_pegawai = $request->input('nama_pegawai');
        $pegawai->verifikator_id = $request->input('verifikator_id');

        if($pegawai){
            $pegawai->save();
            return redirect('/admin/data-pegawai')->with('success', 'Data Tersimpan');
        } else {
            return redirect('/admin/data-pegawai')->with('error', 'Data gagal tersimpan!');
        }
    }

    public function update(Request $request, $id)
    {
        $pegawai = DataPegawai::find($id);
        $input = $request->all();
        $pegawai->fill($input)->save();
        return redirect('/admin/data-pegawai')->with('success', 'Data berhasil diubah.');
    }

    public function destroy(Request $request, $id)
    {
        $pegawai = DataPegawai::find($id);
        if ($pegawai) {
            $pegawai->delete();
            return redirect('/admin/data-pegawai')->with('success', 'Data berhasil dihapus.');
        }else{
            return redirect('/admin/data-pegawai')->with('error', 'Data gagal dihapus.');
        }
        
    }
}
