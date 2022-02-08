<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Exports\PegawaiExport;
use App\Imports\PegawaiImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pegawai = Pegawai::all();
        $pegawai = Pegawai::paginate(5);
        return view('users.pegawai.index', compact('pegawai'));
    }


    public function pegawaiexport()
    {
        return Excel::download(new PegawaiExport, 'pegawai.xlsx');
    }

    public function pegawaiimport(Request $request)
    {
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataPegawai', $namaFile);

        Excel::import(new PegawaiImport, public_path('/DataPegawai/'.$namaFile));
        toast('File Berhasil diimport!','success');

        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pegawai::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tgl_lahir' => $request->tgl_lahir,
            'no_telp' => $request->no_telp,
        ]);

        Alert::success('Congrats!', 'Data berhasil disimpan!');

        return redirect()->route('users.pegawai.index');
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
        return view('users.pegawai.edit',[
            'pegawai' => Pegawai::findOrFail($id),
        ]);
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
        $pegawai = Pegawai::find($id);
        $pegawai->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tgl_lahir' => $request->tgl_lahir,
            'no_telp' => $request->no_telp,
        ]);

        Alert::success('Berhasil!', 'Data berhasil diupdate!');
        // session()->flash('success', 'Data berhasil diupdate');

        return redirect()->route('users.pegawai.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pegawai = Pegawai::find($id);
        $pegawai->delete();

        toast('Data berhasil dihapus!','success');

        return redirect()->route('users.pegawai.index');
    }
}
