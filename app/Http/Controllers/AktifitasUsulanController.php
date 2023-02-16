<?php

namespace App\Http\Controllers;

use App\Models\AktifitasGroup;
use App\Models\AktifitasUsulan;
use App\Models\Aspek;
use Illuminate\Http\Request;

class AktifitasUsulanController extends Controller
{
    // menampilkan data
    public function index()
    {
        // relasi aktifitas group dan aktifitas usulan
        $group = AktifitasGroup::all();
        $aspek = Aspek::all();

        $usulan = AktifitasUsulan::with('aspek','group')->paginate(200);
        return view('admin.master-data.aktifitas-usul.index', compact('group','usulan','aspek'));
    }

    // insert data
    public function store(Request $request)
    {
        $this->validate($request,[
            'aktifitasUsulan' => 'required',
            'menit' => 'require',
            'waktuPengisian' => 'require',
            'output' => 'require',
        ]);
        $usulan = new AktifitasUsulan();
        $usulan->save();
        return redirect('/admin/aktifitas-usul')->with('success', 'Data Telah Berhasil Disimpan.');
    }

    // update data
    public function update(Request $request, $id)
    {
        $usulan = AktifitasUsulan::find($id);
        $input = $request->all();
        $usulan->fill($input)->save();
        return redirect('/admin/aktifitas-usul')->with('success', 'Data Telah Berhasil Diubah.');
    }

    // hapus data 
    public function destroy($id)
    {
        $usulan = AktifitasUsulan::find($id);
        $usulan->delete();
        return redirect('/admin/aktifitas-usul')->with('success', 'Data telah berhasil dihapus.');
    }

}