<?php

namespace App\Http\Controllers;

use App\Models\AktifitasGroup;
use App\Models\Aspek;
use Illuminate\Http\Request;

class AktifitasGroupController extends Controller
{
    // show data
    public function index()
    {
        //panggil relasi buat tambah data di modal
        $aspek = Aspek::all();

        $group = AktifitasGroup::with('aspek')->paginate(); //with aspek buat panggil si fungi relasi na di model
        return view('admin.master-data.aktifitas-group.index', compact('group', 'aspek'));
    }

    // create -> buat form, redirect ke form tambah 
    // public function create()
    // {
    //     $aspek = Aspek::all();
    //     return view('admin.master-data.aktifitas-group.tambah', compact('aspek'));
    // }

    // insert data
    public function store(Request $request)
    {
        $this->validate($request,[
            'id_group' =>'required|numeric|min:1',
            'aspek_id' =>'required|numeric|min:1',
            'group_aktifitas' => 'required',
        ]);
        $group = new AktifitasGroup();
        $group->id_group = $request->input('id_group');
        $group->aspek_id = $request->input('aspek_id');
        $group->group_aktifitas = $request->input('group_aktifitas');

        if($group){
            $group->save();
            return redirect('/admin/aktifitas-group')->with('success', 'Data Telah Berhasil Disimpan.');
        } else {
            return redirect('/admin/aktifitas-group')->with('error', 'Data Gagal Disimpan.');
        }
       
    }

    // update data
    public function update(Request $request, $id)
    {
        $group = AktifitasGroup::find($id);
        $input = $request->all();
        $group->fill($input)->save();
        return redirect('/admin/aktifitas-group')->with('success', 'Data Telah Berhasil Diubah.');
    }

    // delete data
    public function destroy(Request $request, $id, $aspek_id)
    {
        // delete validate with 2 id, ig group and aspek_id
        $group = AktifitasGroup::where('id', $id, 'aspek_id', $aspek_id)->firstOrFail();
        if ($group)
        {
            $group->delete();
            return redirect('/admin/aktifitas-group')->with('success', 'Data Telah Berhasil Dihapus.');
        }
        else
        {
            return redirect('/admin/aktifitas-group')->with('error', 'Data Telah Gagal Dihapus.');
        }
        // $group = AktifitasGroup::find($id);
        // $group->delete();
        // return redirect('/admin/aktifitas-group')->with('success', 'Data Telah Berhasil Dihapus.');
    }
}
