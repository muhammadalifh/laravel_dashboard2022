<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PortofolioExport;
use App\Models\Klien;
use App\Models\Jenis;
use App\Models\Status;
use App\Models\Teknologi;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\DataTables;

class PortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $klien_create = Klien::all();
        $jenis_create = Jenis::all();
        $teknologi_create = Teknologi::all();
        $status_create = Status::all();

        $portofolio = Portofolio::all();
        $portofolio = Portofolio::with('klien', 'jenis', 'teknologi','status')->get();
        return view ('portofolio.index');

    }

    public function portofolio_json()
    {
        $data = DB::table('portofolio')
        ->join('klien', 'klien.id', '=', 'portofolio.klien_id')
        ->join('jenis', 'jenis.id', '=', 'portofolio.jenis_id')
        ->join('status', 'status.id', '=', 'portofolio.status_id')
        ->join('teknologi', 'teknologi.id', '=', 'portofolio.teknologi_id')
        ->get();
        if (request()->ajax()) {
            return datatables()->of($data)
                ->addColumn('action', function ($data) {
                    if(auth()->user()->role == "2"){
                        $button = " <button data-toggle='tooltip' title='Edit' class='edit btn btn-warning btn-xs btn-flat' id='" . $data->id . "' ><i class='far fa-edit'></i></button> <br> <br>";
                        $button .= " <button title='Hapus' data-toggle='tooltip' type='submit' class='hapus btn btn-xs btn-danger btn-flat' id='" . $data->id . "' ><i class='fas fa-trash-alt'></i></button>";
                        return $button;
                    }
                    else if (auth()->user()->role == "1"){
                        $edit = " <button data-toggle='tooltip' title='Edit' class='edit btn btn-warning btn-xs btn-flat' id='" . $data->id . "' ><i class='far fa-edit'></i></button> <br> <br>";
                        return $edit;
                    }
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return Datatables::of($data)->make(true);
    }

    public function cetakPortofolio()
    {
        // $portofolio = Portofolio::all();
        $portofoliocetak = Portofolio::with('klien', 'jenis', 'teknologi','status')->get();
        return view ('portofolio.cetak', compact('portofoliocetak'));
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
        $jenis_create = Jenis::all();
        $teknologi_create = Teknologi::all();
        $status_create = Status::all();

        return view('portofolio.create', compact('klien_create', 'jenis_create', 'teknologi_create','status_create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = new Portofolio();
        $data->klien_id = $request->klien_id;
        $data->perusahaan = $request->perusahaan;
        $data->tahun = $request->tahun;
        $data->jenis_id = $request->jenis_id;
        $data->kapasitas = $request->kapasitas;
        $data->teknologi_id = $request->teknologi_id;
        $data->nilai_kontrak = $request->nilai_kontrak;
        $data->status_id = $request->status_id;
        $data->save();
        // if ($simpan == 200) {
        //     return response()->json(['data' => $data, 'text' => 'data berhasi disimpan']);
        // } else {
        //     return response()->json(['data' => $data, 'text' => 'data berhasi disimpan']);
        // }

        // Portofolio::create([
        //     'klien_id' => $request->klien_id,
        //     'perusahaan' => $request->perusahaan,
        //     'tahun' => $request->tahun,
        //     'jenis_id' => $request->jenis_id,
        //     'kapasitas' => $request->kapasitas,
        //     'teknologi_id' => $request->teknologi_id,
        //     'nilai_kontrak' => $request->nilai_kontrak,
        //     'status_id' => $request->status_id,
        // ]);

        // Alert::success('Berhasil!', 'Data berhasil disimpan!');

        // return redirect()->route('portofolio.index');
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
     * edits
     * Ambil Data
     * @param  mixed $request->id
     * @return void
     */
    public function edits(Request $request)
    {

        $id = $request->id;
        $data = Portofolio::find($id);
        return response()->json(['data' => $data]);

        // $klien_create = Klien::all();
        // $jenis_create = Jenis::all();
        // $teknologi_create = Teknologi::all();
        // $status_create = Status::all();

        // $portofolio = Portofolio::with('klien','jenis','teknologi','status')->findOrFail($id);

        // return view('portofolio.edit', compact('portofolio', 'klien_create', 'jenis_create','teknologi_create','status_create'));

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
    public function updates(Request $request)
    {


        $id = $request->id;
        $datas = [
            'klien_id' => $request->klien_id,
            'perusahaan' => $request->perusahaan,
            'tahun' => $request->tahun,
            'jenis_id' => $request->jenis_id,
            'kapasitas' => $request->kapasitas,
            'teknologi_id' => $request->teknologi_id,
            'nilai_kontrak' => $request->nilai_kontrak,
            'status_id' => $request->status_id
        ];
        $data = Portofolio::find($id);
        $data->update($datas);

        // $portofolio = Portofolio::find($id);
        // $portofolio->update([
        //     'klien_id' => $request->klien_id,
        //     'perusahaan' => $request->perusahaan,
        //     'tahun' => $request->tahun,
        //     'jenis_id' => $request->jenis_id,
        //     'kapasitas' => $request->kapasitas,
        //     'teknologi_id' => $request->teknologi_id,
        //     'nilai_kontrak' => $request->nilai_kontrak,
        //     'status_id' => $request->status_id,
        // ]);

        // Alert::success('Berhasil!', 'Data berhasil diupdate!');

        // return redirect()->route('portofolio.index');
    }

    public function hapus(Request $request)
    {
        $id = $request->id;
        $data = Portofolio::find($id);
        $data->delete();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portofolio = Portofolio::find($id);
        $portofolio->delete();

        Alert::success('Berhasil!', 'Data berhasil dihapus!');

        return redirect()->route('portofolio.index');
    }

    public function filter()
    {
        $klien_create = Klien::all();
        $jenis_create = Jenis::all();
        $status_create = Status::all();

        $portofolio = Portofolio::with('klien', 'jenis', 'teknologi','status')->get();
        return view('portofolio.filter', compact('portofolio','klien_create', 'jenis_create','status_create'));

    }

    public function server()
    {
        return view('portofolio.serverside');
    }

    public function filter_json()
    {

        // return Datatables::of(Portofolio::limit(10))->make(true);
        $query = DB::select('SELECT k.klien, j.jenis, t.teknologi, s.status, perusahaan, tahun, kapasitas, nilai_kontrak FROM
        klien k, jenis j, teknologi t, status s,  portofolio p WHERE
        p.klien_id = k.id AND
        p.teknologi_id = t.id AND
        p.jenis_id = j.id AND
        p.status_id = s.id');


        // $data = DB::table('klien')
        //             ->join('portofolio', 'portofolio.klien_id', '=', 'klien.klien_id')
        //             ->get();
        // $id = $request->query('klien_id');
        // $event = DB::table('portofolio')->where('id',$id)->get();
        // $pics = DB::table('pictures')->where('event_id',$id)->get();

        return Datatables::of($query)->make(true);
    }


}
