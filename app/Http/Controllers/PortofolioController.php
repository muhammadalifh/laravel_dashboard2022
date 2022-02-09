<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PortofolioExport;
use App\Models\Klien;
use RealRashid\SweetAlert\Facades\Alert;

class PortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $portofolio = Portofolio::all();
        $portofolio = Portofolio::with('klien')->paginate(5);
        return view ('portofolio.index', compact('portofolio'));
    }

    public function portofolioexport()
    {
        return Excel::download(new PortofolioExport, 'portofolio.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $klien_create = Klien::all();

        return view('portofolio.create', compact('klien_create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Portofolio::create([
            'klien_id' => $request->klien_id,
            'perusahaan' => $request->perusahaan,
            'tahun' => $request->tahun,
            'kapasitas' => $request->kapasitas,
            'nilai_kontrak' => $request->nilai_kontrak,
        ]);

        Alert::success('Congrats!', 'Data berhasil disimpan!');

        return redirect()->route('portofolio.index');
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
        $klien_create = Klien::all();
        $portofolio = Portofolio::with('klien')->findOrFail($id);

        return view('portofolio.edit', compact('portofolio', 'klien_create'));

        // return view('portofolio.edit', compact('klien_create'),[
        //     'portofolio' => Portofolio::with('klien')->findOrFail($id),
        // ]);
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
        $portofolio = Portofolio::find($id);
        $portofolio->update([
            'klien_id' => $request->klien_id,
            'perusahaan' => $request->perusahaan,
            'tahun' => $request->tahun,
            'kapasitas' => $request->kapasitas,
            'nilai_kontrak' => $request->nilai_kontrak,
        ]);

        Alert::success('Berhasil!', 'Data berhasil diupdate!');

        return redirect()->route('portofolio.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pegawai = Portofolio::find($id);
        $pegawai->delete();

        toast('Data berhasil dihapus!','success');

        return redirect()->route('portofolio.index');
    }
}
