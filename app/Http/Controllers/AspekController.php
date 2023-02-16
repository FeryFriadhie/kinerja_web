<?php

namespace App\Http\Controllers;

use App\Models\Aspek;
use Illuminate\Http\Request;

class AspekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // for show database to table
        $aspek = Aspek::all();
        return view('admin.referensi-data.aspek.index', compact('aspek'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'aspek' => 'required',
        ]);
        $ver = new Aspek();

        $ver->aspek = $request->input('aspek');
        $ver->save();
        return redirect('/admin/data-aspek')->with('success', 'Data Telah Berhasil Disimpan.');
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
        $aspek = Aspek::find($id);
        $input = $request->all();
        $aspek->fill($input)->save();
        return redirect('/admin/data-aspek')->with('success','Data telah berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aspek = Aspek::find($id);
        $aspek->delete();
        return redirect('/admin/data-aspek')->with('success','Data telah berhasil dihapus!');
    }
}
