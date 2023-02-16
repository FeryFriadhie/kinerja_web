<?php

namespace App\Http\Controllers;

use App\Models\Verifikasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VerifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      
    
        $verifikasi = Verifikasi::all();
        return view('admin.referensi-data.verifikasi.index', compact('verifikasi'));

        // $verifikasi = Verifikasi::role('verifikator')->get();
        // return view('admin.referensi-data.verifikasi.index', compact('verifikasi'));      
    }

    /**
     * Shosiw the form for creating a new resource.
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
        $this->validate($request,[
            'status' => 'required',
        ]);
        $ver = new Verifikasi();

        $ver->status = $request->input('status');
        $ver->save();
        return redirect('/admin/data-status-verifikasi')->with('success', 'Data Telah Berhasil Disimpan.');
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
        $verifikasi = Verifikasi::find($id);
        $input = $request->all();
        $verifikasi->fill($input)->save();
        return redirect('/admin/data-status-verifikasi')->with('success', 'Data Telah Berhasil Diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $verifikasi = Verifikasi::find($id);
        $verifikasi->delete();
        return redirect('/admin/data-status-verifikasi')->with('success','Data telah berhasil dihapus!');
    }
}
