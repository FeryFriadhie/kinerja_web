<?php

namespace App\Http\Controllers;

use App\Models\Stakeholder;
use Illuminate\Http\Request;

class StakeholderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('admin.referensi-data.stakeholder.index')->with([
        //     'stakeholder' => Stakeholder::all(),
        // ]);

        // for show database to table
        $stakeholder = Stakeholder::all();
        return view('admin.referensi-data.stakeholder.index', compact('stakeholder'));
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
        // $stake = new Stakeholder();
        // $stake = Stakeholder::create([
        //     'stakeholder' => $request->stakeholder,
        // ]);

        $this->validate($request,[
            'stakeholder' => 'required',
        ]);

        $stake = new Stakeholder();

        $stake->stakeholder = $request->input('stakeholder');
        $stake->save();
        return redirect('/admin/data-stakeholder')->with('success', 'Data Telah Berhasil Disimpan.');


        // $stake = new Stakeholder();
        // $stake->stakeholder = $request->input('stakeholder');
        // $stake->save();
 
        // return redirect('/admin/data-stakeholder');
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
        $stakeholder = Stakeholder::find($id);
        $input = $request->all();
        $stakeholder->fill($input)->save();
        return redirect('/admin/data-stakeholder')->with('success','Data telah berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aspek = Stakeholder::find($id);
        $aspek->delete();
        return redirect('/admin/data-stakeholder')->with('success','Data telah berhasil dihapus!');
    }
}
