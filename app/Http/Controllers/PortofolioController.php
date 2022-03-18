<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PortofolioExport;
use App\Mail\KontrakMail;
use App\Mail\PenawaranMail;
use App\Models\Klien;
use App\Models\Jenis;
use App\Models\Status;
use App\Models\Teknologi;
use App\Models\User;
use Carbon\Carbon;
use Dflydev\DotAccessData\Data;
use GrahamCampbell\ResultType\Success;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
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
        $id = request()->id;
        return view ('portofolio.index', compact('id', 'portofolio'));

    }

    public function portofolio_json()
    {
        $data = DB::table('portofolio')
        ->join('klien', 'klien.id', '=', 'portofolio.klien_id')
        ->join('jenis', 'jenis.id', '=', 'portofolio.jenis_id')
        ->join('status', 'status.id', '=', 'portofolio.status_id')
        ->join('teknologi', 'teknologi.id', '=', 'portofolio.teknologi_id')
        ->select('portofolio.*', 'klien.klien', 'jenis.jenis', 'status.status', 'teknologi.teknologi')
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
                ->addColumn('details', function ($data){
                    $details = " <button data-toggle='tooltip' title='Detail' class='details btn btn-info btn-xs btn-flat' id='" . $data->id . "' ><i class='fas fa-info-circle'></i></button>";
                    return $details;
                })
                ->rawColumns(['action', 'details'])
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

        // ddd($request->all());

        // dd($request->all());

        // $data  = new Portofolio();

        // return $request->file('gallery')->store('upload');

        $data = Validator::make($request->all(), [
            'inquiry_id' => 'required| unique:portofolio',
            'klien_id' => 'required|max:255',
            'perusahaan' => 'required',
            'tahun' => 'required',
            'jenis_id' => 'required',
            'kapasitas' => 'required',
            'teknologi_id' => 'required',
            'nilai_kontrak' => 'required',
            'status_id' => 'required',
            'gallery.*' => 'image|mimes:jpeg,png,jpg|max:2048|nullable',
            'penawaran' => 'mimes:pdf,doc,docx,pptx,ppt,xls,xlsx,zip,rar',
            'spk_po_wo' => 'mimes:pdf,doc,docx,pptx,ppt,xls,xlsx,zip,rar',
            'berita_acara_instal' => 'mimes:pdf,doc,docx,pptx,ppt,xls,xlsx,zip,rar',
            'berita_acara_comisioning' => 'mimes:pdf,doc,docx,pptx,ppt,xls,xlsx,zip,rar',
            'berita_acara_sampling' => 'mimes:pdf,doc,docx,pptx,ppt,xls,xlsx,zip,rar',
            'laporan_hasil_uji' => 'mimes:pdf,doc,docx,pptx,ppt,xls,xlsx,zip,rar',
            'berita_acara_kerja_tambah' => 'mimes:pdf,doc,docx,pptx,ppt,xls,xlsx,zip,rar',
            'berita_acara_serah_terima' => 'mimes:pdf,doc,docx,pptx,ppt,xls,xlsx,zip,rar',
            'gambar_desain' => 'mimes:pdf,doc,docx,pptx,ppt,xls,xlsx,zip,rar',
            'gambar_asbuilt' => 'mimes:pdf,doc,docx,pptx,ppt,xls,xlsx,zip,rar',
            'sop' => 'mimes:pdf,doc,docx,pptx,ppt,xls,xlsx,zip,rar',
            'dokumentasi' => 'mimes:pdf,doc,docx,pptx,ppt,xls,xlsx,zip,rar',

        ]);

        // if($request->file('gallery') != null){
        //     $data['gallery'] = $request->file('gallery')->store('upload');
        // }
        // Portofolio::create($data);

        if($data->fails()){
            Alert::error('Data gagal ditambahkan!', ($data->errors()->all(
                'ID/ Kode pelanggan sudah di gunakan.'
            )));
            return redirect()->route('portofolio.index');
            // return response()->json([
            //     'status' =>400,
            //     'errors' => $data->errors()
            // ]);
        }
        else
        {
            $datas = new Portofolio();
            // $datas->inquiry_id = $request->input('inquiry_id');
            // $datas->klien_id = $request->input('klien_id');
            // $datas->perusahaan = $request->input('perusahaan');
            // $datas->tahun = $request->input('tahun');
            // $datas->jenis_id = $request->input('jenis_id');
            // $datas->kapasitas = $request->input('kapasitas');
            // $datas->teknologi_id = $request->input('teknologi_id');
            // $datas->nilai_kontrak = $request->input('nilai_kontrak');
            // $datas->status_id = $request->input('status_id');
            $gallery =array();
            if($request->file('gallery') == null){
                $datas->gallery = null;
                $datas->inquiry_id = $request->input('inquiry_id');
                $datas->klien_id = $request->input('klien_id');
                $datas->perusahaan = $request->input('perusahaan');
                $datas->tahun = $request->input('tahun');
                $datas->jenis_id = $request->input('jenis_id');
                $datas->kapasitas = $request->input('kapasitas');
                $datas->teknologi_id = $request->input('teknologi_id');
                $datas->nilai_kontrak = $request->input('nilai_kontrak');
                $datas->status_id = $request->input('status_id');

                //DATA ADMIN
                if($request->file('penawaran') == null){
                    $datas->penawaran = null;
                }
                else{
                    $datas->penawaran = $request->file('penawaran')->store('upload/data_admin/'.$request->input('perusahaan'));
                }
                if($request->file('spk_po_wo') == null){
                    $datas->spk_po_wo = null;
                }
                else{
                    $datas->spk_po_wo = $request->file('spk_po_wo')->store('upload/data_admin/'.$request->input('perusahaan'));
                }
                if($request->file('berita_acara_instal') == null){
                    $datas->berita_acara_instal = null;
                }
                else{
                    $datas->berita_acara_instal = $request->file('berita_acara_instal')->store('upload/data_admin/'.$request->input('perusahaan'));
                }
                if($request->file('berita_acara_comisioning') == null){
                    $datas->berita_acara_comisioning = null;
                }
                else{
                    $datas->berita_acara_comisioning = $request->file('berita_acara_comisioning')->store('upload/data_admin/'.$request->input('perusahaan'));
                }
                if($request->file('berita_acara_sampling') == null){
                    $datas->berita_acara_sampling = null;
                }
                else{
                    $datas->berita_acara_sampling = $request->file('berita_acara_sampling')->store('upload/data_admin/'.$request->input('perusahaan'));
                }
                if($request->file('laporan_hasil_uji') == null){
                    $datas->laporan_hasil_uji = null;
                }
                else{
                    $datas->laporan_hasil_uji = $request->file('laporan_hasil_uji')->store('upload/data_admin/'.$request->input('perusahaan'));
                }
                if($request->file('berita_acara_kerja_tambah') == null){
                    $datas->berita_acara_kerja_tambah = null;
                }
                else{
                    $datas->berita_acara_kerja_tambah = $request->file('berita_acara_kerja_tambah')->store('upload/data_admin/'.$request->input('perusahaan'));
                }
                if($request->file('berita_acara_serah_terima') == null){
                    $datas->berita_acara_serah_terima = null;
                }
                else{
                    $datas->berita_acara_serah_terima = $request->file('berita_acara_serah_terima')->store('upload/data_admin/'.$request->input('perusahaan'));
                }

                // DATA TEKNIS
                if($request->file('gambar_desain') == null){
                    $datas->gambar_desain = null;
                }
                else{
                    $datas->gambar_desain = $request->file('gambar_desain')->store('upload/data_teknis/'.$request->input('perusahaan'));
                }
                if($request->file('gambar_asbuilt') == null){
                    $datas->gambar_asbuilt = null;
                }
                else{
                    $datas->gambar_asbuilt = $request->file('gambar_asbuilt')->store('upload/data_teknis/'.$request->input('perusahaan'));
                }
                if($request->file('sop') == null){
                    $datas->sop = null;
                }
                else{
                    $datas->sop = $request->file('sop')->store('upload/data_teknis/'.$request->input('perusahaan'));
                }
                if($request->file('dokumentasi') == null){
                    $datas->dokumentasi = null;
                }
                else{
                    $datas->dokumentasi = $request->file('dokumentasi')->store('upload/data_teknis/'.$request->input('perusahaan'));
                }


                $datas->created_at = Carbon::now();
                $datas->updated_at = Carbon::now();
                $datas->save();
            }

            elseif($request->hasFile('gallery')){
                foreach($request->file('gallery') as $file){
                    $image_name = rand(1, 10000);
                    $ext = strtolower($file->getClientOriginalExtension());
                    $image_full_name = $image_name.'.'.$ext;
                    $upload_path = 'storage/upload/gallery/';
                    $image_url = $upload_path.$image_full_name;
                    $file->move($upload_path, $image_full_name);
                    $gallery[] = $image_url;
                }
                // $file = $request->file('gallery');
                // $extension = $file->getClientOriginalExtension();
                // $filename = time() . '.' . $extension;
                // $file->move('storage/upload/gallery/', $filename);
                // $datas->gallery = $filename;
                $datas->gallery = implode(",", $gallery);
                $datas->inquiry_id = $request->input('inquiry_id');
                $datas->klien_id = $request->input('klien_id');
                $datas->perusahaan = $request->input('perusahaan');
                $datas->tahun = $request->input('tahun');
                $datas->jenis_id = $request->input('jenis_id');
                $datas->kapasitas = $request->input('kapasitas');
                $datas->teknologi_id = $request->input('teknologi_id');
                $datas->nilai_kontrak = $request->input('nilai_kontrak');
                $datas->status_id = $request->input('status_id');

                //DATA ADMIN
                if($request->file('penawaran') == null){
                    $datas->penawaran = null;
                }
                else{
                    $datas->penawaran = $request->file('penawaran')->store('upload/data_admin/'.$request->input('perusahaan'));
                }
                if($request->file('spk_po_wo') == null){
                    $datas->spk_po_wo = null;
                }
                else{
                    $datas->spk_po_wo = $request->file('spk_po_wo')->store('upload/data_admin/'.$request->input('perusahaan'));
                }
                if($request->file('berita_acara_instal') == null){
                    $datas->berita_acara_instal = null;
                }
                else{
                    $datas->berita_acara_instal = $request->file('berita_acara_instal')->store('upload/data_admin/'.$request->input('perusahaan'));
                }
                if($request->file('berita_acara_comisioning') == null){
                    $datas->berita_acara_comisioning = null;
                }
                else{
                    $datas->berita_acara_comisioning = $request->file('berita_acara_comisioning')->store('upload/data_admin/'.$request->input('perusahaan'));
                }
                if($request->file('berita_acara_sampling') == null){
                    $datas->berita_acara_sampling = null;
                }
                else{
                    $datas->berita_acara_sampling = $request->file('berita_acara_sampling')->store('upload/data_admin/'.$request->input('perusahaan'));
                }
                if($request->file('laporan_hasil_uji') == null){
                    $datas->laporan_hasil_uji = null;
                }
                else{
                    $datas->laporan_hasil_uji = $request->file('laporan_hasil_uji')->store('upload/data_admin/'.$request->input('perusahaan'));
                }
                if($request->file('berita_acara_kerja_tambah') == null){
                    $datas->berita_acara_kerja_tambah = null;
                }
                else{
                    $datas->berita_acara_kerja_tambah = $request->file('berita_acara_kerja_tambah')->store('upload/data_admin/'.$request->input('perusahaan'));
                }
                if($request->file('berita_acara_serah_terima') == null){
                    $datas->berita_acara_serah_terima = null;
                }
                else{
                    $datas->berita_acara_serah_terima = $request->file('berita_acara_serah_terima')->store('upload/data_admin/'.$request->input('perusahaan'));
                }

                // DATA TEKNIS
                if($request->file('gambar_desain') == null){
                    $datas->gambar_desain = null;
                }
                else{
                    $datas->gambar_desain = $request->file('gambar_desain')->store('upload/data_teknis/'.$request->input('perusahaan'));
                }
                if($request->file('gambar_asbuilt') == null){
                    $datas->gambar_asbuilt = null;
                }
                else{
                    $datas->gambar_asbuilt = $request->file('gambar_asbuilt')->store('upload/data_teknis/'.$request->input('perusahaan'));
                }
                if($request->file('sop') == null){
                    $datas->sop = null;
                }
                else{
                    $datas->sop = $request->file('sop')->store('upload/data_teknis/'.$request->input('perusahaan'));
                }
                if($request->file('dokumentasi') == null){
                    $datas->dokumentasi = null;
                }
                else{
                    $datas->dokumentasi = $request->file('dokumentasi')->store('upload/data_teknis/'.$request->input('perusahaan'));
                }
                $datas->created_at = Carbon::now();
                $datas->updated_at = Carbon::now();
                $datas->save();
            }


            $user = User::where('role', '=', 2)->orWhere('role', '=', 1)->get();

            if($datas == true){

                $portofolio_detail = [
                    'perusahaan' => $request->input('perusahaan'),
                    'penawaran' => $request->penawaran,
                    'spk_po_wo' => $request->spk_po_wo,
                ];

                Mail::to($user)->send(new PenawaranMail($portofolio_detail));
                Mail::to($user)->send(new KontrakMail($portofolio_detail));

                Alert::success('Berhasil!', 'Data berhasil ditambahkan!');
                return redirect()->route('portofolio.index');
            }
            else{
                Alert::error('Data gagal ditambahkan!', ($datas->errors()->all()));
                return redirect()->route('portofolio.index');
            }

            // if($datas->save()){
            //     // $datas->save();
            //     Alert::success('Berhasil!', 'Data berhasil ditambahkan!');
            //     return redirect()->route('portofolio.index');
            // }
            // else{
            //     Alert::error('Gagal!', 'Data gagal ditambahkan!');
            //     return redirect()->route('portofolio.index');
            // }

            // return response()->json([
            //     'status' => 'success',
            //     'message' => 'Data berhasil disimpan'
            // ]);
        }


        // $data = new Portofolio();
        // $data->klien_id = $request->klien_id;
        // $data->perusahaan = $request->perusahaan;
        // $data->tahun = $request->tahun;
        // $data->jenis_id = $request->jenis_id;
        // $data->kapasitas = $request->kapasitas;
        // $data->teknologi_id = $request->teknologi_id;
        // $data->nilai_kontrak = $request->nilai_kontrak;
        // $data->status_id = $request->status_id;
        // $data->gallery = $request->gallery;
        // $data->save();


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
        if($data)
        {
            return response()->json(['data' => $data]);
        }
        else
        {
            return Alert::error('Error!', ($data->errors()->all()));
        }
        // return response()->json(['data' => $data]);

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
    public function update(Request $request)
    {
        // ddd($request->all());

        // $filename = '';
		// $data = Portofolio::find($request->id);
		// if($request->hasFile('gallery')){
        //     $file = $request->file('gallery');
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = time() . '.' . $extension;
        //     $file->move('storage/upload/gallery/', $filename);
        //     $data->gallery = $filename;
        //     if($data->gallery)
        //     {
        //         Storage::delete('storage/upload/gallery/'.$data->gallery);
        //     }
        //     else{
        //         $data->gallery = $filename;
        //     }
        // }


		// $Datas = [  'klien_id' => $request->klien_id,
        //             'perusahaan' => $request->perusahaan,
        //             'tahun' => $request->tahun,
        //             'jenis_id' => $request->jenis_id,
        //             'kapasitas' => $request->kapasitas,
        //             'teknologi_id' => $request->teknologi_id,
        //             'nilai_kontrak' => $request->nilai_kontrak,
        //             'status_id' => $request->status_id,
        //             'gallery' => $filename
        //         ];


        // if($data->update($Datas))
        // {
        //     // $data->update($Datas);
        //     Alert::success('Berhasil!', 'Data berhasil diperbarui!');
        //     return redirect()->route('portofolio.index');
        // }
        // else
        // {
        //     Alert::error('Data gagal diperbarui', 'Pastikan sudah mengubah data dengan benar!');
        // }




        $datas = Validator::make($request->all(), [
            'inquiry_id' => 'required|numeric|unique:portofolio,inquiry_id,'.$request->id,
            'klien_id' => 'required|max:255',
            'perusahaan' => 'required',
            'tahun' => 'required',
            'jenis_id' => 'required',
            'kapasitas' => 'required',
            'teknologi_id' => 'required',
            'nilai_kontrak' => 'required',
            'status_id' => 'required',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'penawaran' => 'mimes:pdf,doc,docx,pptx,ppt,xls,xlsx,zip,rar',
            'spk_po_wo' => 'mimes:pdf,doc,docx,pptx,ppt,xls,xlsx,zip,rar',
            'berita_acara_instal' => 'mimes:pdf,doc,docx,pptx,ppt,xls,xlsx,zip,rar',
            'berita_acara_comisioning' => 'mimes:pdf,doc,docx,pptx,ppt,xls,xlsx,zip,rar',
            'berita_acara_sampling' => 'mimes:pdf,doc,docx,pptx,ppt,xls,xlsx,zip,rar',
            'laporan_hasil_uji' => 'mimes:pdf,doc,docx,pptx,ppt,xls,xlsx,zip,rar',
            'berita_acara_kerja_tambah' => 'mimes:pdf,doc,docx,pptx,ppt,xls,xlsx,zip,rar',
            'berita_acara_serah_terima' => 'mimes:pdf,doc,docx,pptx,ppt,xls,xlsx,zip,rar',
            'gambar_desain' => 'mimes:pdf,doc,docx,pptx,ppt,xls,xlsx,zip,rar',
            'gambar_asbuilt' => 'mimes:pdf,doc,docx,pptx,ppt,xls,xlsx,zip,rar',
            'sop' => 'mimes:pdf,doc,docx,pptx,ppt,xls,xlsx,zip,rar',
            'dokumentasi' => 'mimes:pdf,doc,docx,pptx,ppt,xls,xlsx,zip,rar',
        ]);

        if($datas->fails()){
            Alert::error('Data gagal diperbarui!', ($datas->errors()->all()));
            return redirect()->route('portofolio.index');
            // return response()->json([
            //     'status' =>400,
            //     'errors' => $datas->errors()
            // ]);
        }
        else
        {
            $datas = Portofolio::find($request->id);
            if($datas){
                $datas->inquiry_id = $request->input('inquiry_id');
                $datas->klien_id = $request->input('klien_id');
                $datas->perusahaan = $request->input('perusahaan');
                $datas->tahun = $request->input('tahun');
                $datas->jenis_id = $request->input('jenis_id');
                $datas->kapasitas = $request->input('kapasitas');
                $datas->teknologi_id = $request->input('teknologi_id');
                $datas->nilai_kontrak = $request->input('nilai_kontrak');
                $datas->status_id = $request->input('status_id');


                //DATA ADMIN
                if($request->file('penawaran') != null){
                    $datas->penawaran = $request->file('penawaran')->store('upload/data_admin/'.$request->input('perusahaan'));
                }
                if($request->file('spk_po_wo') != null){
                    $datas->spk_po_wo = $request->file('spk_po_wo')->store('upload/data_admin/'.$request->input('perusahaan'));
                }
                if($request->file('berita_acara_instal') != null){
                    $datas->berita_acara_instal = $request->file('berita_acara_instal')->store('upload/data_admin/'.$request->input('perusahaan'));
                }
                if($request->file('berita_acara_comisioning') != null){
                    $datas->berita_acara_comisioning = $request->file('berita_acara_comisioning')->store('upload/data_admin/'.$request->input('perusahaan'));
                }
                if($request->file('berita_acara_sampling') != null){
                    $datas->berita_acara_sampling = $request->file('berita_acara_sampling')->store('upload/data_admin/'.$request->input('perusahaan'));
                }
                if($request->file('laporan_hasil_uji') != null){
                    $datas->laporan_hasil_uji = $request->file('laporan_hasil_uji')->store('upload/data_admin/'.$request->input('perusahaan'));
                }
                if($request->file('berita_acara_kerja_tambah') != null){
                    $datas->berita_acara_kerja_tambah = $request->file('berita_acara_kerja_tambah')->store('upload/data_admin/'.$request->input('perusahaan'));
                }
                if($request->file('berita_acara_serah_terima') != null){
                    $datas->berita_acara_serah_terima = $request->file('berita_acara_serah_terima')->store('upload/data_admin/'.$request->input('perusahaan'));
                }

                // DATA TEKNIS
                if($request->file('gambar_desain') != null){
                    $datas->gambar_desain = $request->file('gambar_desain')->store('upload/data_teknis/'.$request->input('perusahaan'));
                }
                if($request->file('gambar_asbuilt') != null){
                    $datas->gambar_asbuilt = $request->file('gambar_asbuilt')->store('upload/data_teknis/'.$request->input('perusahaan'));
                }
                if($request->file('sop') != null){
                    $datas->sop = $request->file('sop')->store('upload/data_teknis/'.$request->input('perusahaan'));
                }
                if($request->file('dokumentasi') != null){
                    $datas->dokumentasi = $request->file('dokumentasi')->store('upload/data_teknis/'.$request->input('perusahaan'));
                }


                $gallery =array();
                if($request->file('gallery') ==  null){
                    $path = explode(',',$datas->gallery);
                    foreach($path as $p){
                        $images_path = public_path($p);
                        if(File::exists($images_path)) {
                            File::delete($images_path);
                        }
                    }
                    $datas->gallery = null;
                    // if(Storage::exists($path)){
                    //     Storage::delete($path);
                    //     $datas->gallery = null;
                    // }
                    // else{
                    //     $datas->gallery = null;
                    // }
                }
                if($request->hasFile('gallery')){
                    $path = explode(',',$datas->gallery);
                    foreach($path as $p){
                        $images_path = public_path($p);
                        if(File::exists($images_path)) {
                            File::delete($images_path);
                        }
                    }
                    foreach($request->file('gallery') as $file){
                        $image_name = rand(1, 10000);
                        $ext = strtolower($file->getClientOriginalExtension());
                        $image_full_name = $image_name.'.'.$ext;
                        $upload_path = 'storage/upload/gallery/';
                        $image_url = $upload_path.$image_full_name;
                        $file->move($upload_path, $image_full_name);
                        $gallery[] = $image_url;
                        Portofolio::where('id', $datas->id)->update([
                            'gallery' => implode(',', $gallery),
                        ]);
                    }

                    //DATA ADMIN
                if($request->file('penawaran') != null){
                    $datas->penawaran = $request->file('penawaran')->store('upload/data_admin/'.$request->input('perusahaan'));
                }
                if($request->file('spk_po_wo') != null){
                    $datas->spk_po_wo = $request->file('spk_po_wo')->store('upload/data_admin/'.$request->input('perusahaan'));
                }
                if($request->file('berita_acara_instal') != null){
                    $datas->berita_acara_instal = $request->file('berita_acara_instal')->store('upload/data_admin/'.$request->input('perusahaan'));
                }
                if($request->file('berita_acara_comisioning') != null){
                    $datas->berita_acara_comisioning = $request->file('berita_acara_comisioning')->store('upload/data_admin/'.$request->input('perusahaan'));
                }
                if($request->file('berita_acara_sampling') != null){
                    $datas->berita_acara_sampling = $request->file('berita_acara_sampling')->store('upload/data_admin/'.$request->input('perusahaan'));
                }
                if($request->file('laporan_hasil_uji') != null){
                    $datas->laporan_hasil_uji = $request->file('laporan_hasil_uji')->store('upload/data_admin/'.$request->input('perusahaan'));
                }
                if($request->file('berita_acara_kerja_tambah') != null){
                    $datas->berita_acara_kerja_tambah = $request->file('berita_acara_kerja_tambah')->store('upload/data_admin/'.$request->input('perusahaan'));
                }
                if($request->file('berita_acara_serah_terima') != null){
                    $datas->berita_acara_serah_terima = $request->file('berita_acara_serah_terima')->store('upload/data_admin/'.$request->input('perusahaan'));
                }

                // DATA TEKNIS
                if($request->file('gambar_desain') != null){
                    $datas->gambar_desain = $request->file('gambar_desain')->store('upload/data_teknis/'.$request->input('perusahaan'));
                }
                if($request->file('gambar_asbuilt') != null){
                    $datas->gambar_asbuilt = $request->file('gambar_asbuilt')->store('upload/data_teknis/'.$request->input('perusahaan'));
                }
                if($request->file('sop') != null){
                    $datas->sop = $request->file('sop')->store('upload/data_teknis/'.$request->input('perusahaan'));
                }
                if($request->file('dokumentasi') != null){
                    $datas->dokumentasi = $request->file('dokumentasi')->store('upload/data_teknis/'.$request->input('perusahaan'));
                }

                    // $file = $request->file('gallery');
                    // $extension = $file->getClientOriginalExtension();
                    // $filename = time() . '.' . $extension;
                    // $file->move('storage/upload/gallery/', $filename);
                    // $datas->gallery = $filename;
                }
                $datas->save();
                Alert::success('Berhasil!', 'Data berhasil diperbarui!');
                return redirect()->route('portofolio.index');
                }
            else
            {
                Alert::error('Data gagal diperbarui!', ($datas->errors()->all()));
            }
        }

        // $id = $request->id;
        // $datas = [
        //     'klien_id' => $request->klien_id,
        //     'perusahaan' => $request->perusahaan,
        //     'tahun' => $request->tahun,
        //     'jenis_id' => $request->jenis_id,
        //     'kapasitas' => $request->kapasitas,
        //     'teknologi_id' => $request->teknologi_id,
        //     'nilai_kontrak' => $request->nilai_kontrak,
        //     'status_id' => $request->status_id,
        //     'gallery' => $request->gallery
        // ];
        // $data = Portofolio::find($id);
        // $data->update($datas);

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
        if($request->ajax())
        {
            $data = Portofolio::find($id);
            if($data->gallery != null)
            {
                $path = explode(',',$data->gallery);
                    foreach($path as $p){
                        $images_path = public_path($p);
                        if(File::exists($images_path)) {
                            File::delete($images_path);
                        }
                    }
            }
            if($data->penawaran != null)
            {
                Storage::delete($data->penawaran);
            }
            if($data->spk_po_wo != null)
            {
                Storage::delete($data->spk_po_wo);
            }
            if($data->berita_acara_instal != null)
            {
                Storage::delete($data->berita_acara_instal);
            }
            if($data->berita_acara_comisioning != null)
            {
                Storage::delete($data->berita_acara_comisioning);
            }
            if($data->berita_acara_sampling != null)
            {
                Storage::delete($data->berita_acara_sampling);
            }
            if($data->laporan_hasil_uji != null)
            {
                Storage::delete($data->laporan_hasil_uji);
            }
            if($data->berita_acara_kerja_tambah != null)
            {
                Storage::delete($data->berita_acara_kerja_tambah);
            }
            if($data->berita_acara_serah_terima != null)
            {
                Storage::delete($data->berita_acara_serah_terima);
            }
            if($data->gambar_desain != null)
            {
                Storage::delete($data->gambar_desain);
            }
            if($data->gambar_asbuilt != null)
            {
                Storage::delete($data->gambar_asbuilt);
            }
            if($data->sop != null)
            {
                Storage::delete($data->sop);
            }
            if($data->dokumentasi != null)
            {
                Storage::delete($data->dokumentasi);
            }
            $data->delete();
            return response()->json(['id' => $id]);
        }
    }

    public function details(Request $request)
    {

        // $data = DB::table('inquiry')
        // ->leftJoin('portofolio', 'inquiry.id', '=', 'portofolio.inquiry_id')
        // // ->select('portofolio.*','inquiry.inquiry_perusahaan','inquiry.inquiry_alamat','inquiry.inquiry_no_telp','inquiry.inquiry_email')
        // ->get();
        // return response()->json($data);

        $id = $request->detail_id;
        $data = Portofolio::with('inquiry')->find($id);
        if ($data)
        {
            return response()->json(['data' => $data]);
        }
        else
        {
            return response()->json([
                'status' => '404',
                'message' => 'Not Found'
            ]);
        }

        // $id = $request->detail_id;
        // $data = Portofolio::find($id);
        // if($data)
        // {
        //     return response()->json(['data' => $data]);
        // }
        // else
        // {
        //     return response()->json([
        //         'status' => '404',
        //         'message' => 'Not Found'
        //     ]);
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     $portofolio = Portofolio::find($id);
    //     $portofolio->delete();

    //     Alert::success('Berhasil!', 'Data berhasil dihapus!');

    //     return redirect()->route('portofolio.index');
    // }

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
        // $query = DB::select('SELECT k.klien, j.jenis, t.teknologi, s.status, perusahaan, tahun, kapasitas, nilai_kontrak FROM
        // klien k, jenis j, teknologi t, status s,  portofolio p WHERE
        // p.klien_id = k.id AND
        // p.teknologi_id = t.id AND
        // p.jenis_id = j.id AND
        // p.status_id = s.id');

        $query = DB::table('portofolio')
        ->join('klien', 'klien.id', '=', 'portofolio.klien_id')
        ->join('jenis', 'jenis.id', '=', 'portofolio.jenis_id')
        ->join('status', 'status.id', '=', 'portofolio.status_id')
        ->join('teknologi', 'teknologi.id', '=', 'portofolio.teknologi_id')
        ->select('portofolio.*', 'klien.klien', 'jenis.jenis', 'status.status', 'teknologi.teknologi')
        ->get();


        // $data = DB::table('klien')
        //             ->join('portofolio', 'portofolio.klien_id', '=', 'klien.klien_id')
        //             ->get();
        // $id = $request->query('klien_id');
        // $event = DB::table('portofolio')->where('id',$id)->get();
        // $pics = DB::table('pictures')->where('event_id',$id)->get();

        return Datatables::of($query)->make(true);
    }

    public function server_json(Request $request)
    {
        $query = DB::table('portofolio')
        ->join('klien', 'klien.id', '=', 'portofolio.klien_id')
        ->join('jenis', 'jenis.id', '=', 'portofolio.jenis_id')
        ->join('status', 'status.id', '=', 'portofolio.status_id')
        ->join('teknologi', 'teknologi.id', '=', 'portofolio.teknologi_id')
        ->select('portofolio.*', 'klien.klien', 'jenis.jenis', 'status.status', 'teknologi.teknologi')
        ->get();


        // if($request->input('perusahaan')){
        //     $query = $query->where('perusahaan', 'like', '%' .request('perusahaan'). '%');
        // }

        // if($request->input('tahun')){
        //     $query = $query->where('tahun', $request->tahun);
        // }

        if($request->input('klien')!= null){
            // $query = $query->where('klien.klien', 'like', '%'.$request->input('klien').'%');
            $query = $query->where('klien_id', $request-> klien);
        }
        if($request->input('jenis')!= null){
            // $query = $query->where('jenis.jenis', 'like', '%'.$request->input('jenis').'%');
            $query = $query->where('jenis_id', $request-> jenis);
        }
        if($request->input('teknologi')!= null){
            // $query = $query->where('teknologi.teknologi', 'like', '%'.$request->input('teknologi').'%');
            $query = $query->where('teknologi_id', $request-> teknologi);
        }
        if($request->input('status')!= null){
            // $query = $query->where('status.status', 'like', '%'.$request->input('status').'%');
            $query = $query->where('status_id', $request-> status);
        }

        return Datatables::of($query)->make(true);
    }


}
