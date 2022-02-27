<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class WelcomeController extends Controller
{
    public function welcome_index()
    {
        return view('welcome');
    }
    public function welcome_json()
    {
        $data = DB::table('portofolio')
        ->join('klien', 'klien.id', '=', 'portofolio.klien_id')
        ->join('jenis', 'jenis.id', '=', 'portofolio.jenis_id')
        ->join('status', 'status.id', '=', 'portofolio.status_id')
        ->join('teknologi', 'teknologi.id', '=', 'portofolio.teknologi_id')
        ->select('portofolio.*', 'klien.klien', 'jenis.jenis', 'status.status', 'teknologi.teknologi')
        ->get();
        return DataTables::of($data)->make(true);
    }

    public function pesan_diterima()
    {
        return view('pesan_diterima');
    }

    public function welcome_store(Request $request)
    {

        // ddd($request);
        // dd($request->all());

        // return $request->file('inquiry_upload_data')->store('upload');

        $data  = new Inquiry();

        $data = $request->validate([
            'inquiry_perusahaan' => 'required|max:255',
            'inquiry_alamat' => 'required|max:255',
            'inquiry_nama' => 'required|max:255',
            'inquiry_no_telp' => 'required|numeric',
            'inquiry_email' => 'required|max:255|email',
            'inquiry_jenis_kegiatan' => 'required|max:255',
            'inquiry_lokasi_kegiatan' => 'required|max:255',
            'inquiry_sumber_air_limbah_id' => 'required',
            'inquiry_debit_air_limbah' => 'required|numeric',
            'inquiry_luas_lahan_rencana' => 'required|numeric',
            'inquiry_penggunaan_air_bersih' => 'required|numeric',
            'inquiry_jumlah_karyawan' => 'required|numeric',
            'inquiry_jumlah_tamu' => 'required|numeric',
            'inquiry_upload_data' => 'file|mimes:pdf,doc,docx,xls,xlsx|max:2048|nullable',
            'inquiry_keterangan_tambahan' => 'max:255|nullable',
        ]);

        if($request->file('inquiry_upload_data') != null){
            $data['inquiry_upload_data'] = $request->file('inquiry_upload_data')->store('upload');
        }
        Inquiry::create($data);
        return redirect()->route('pesan_diterima')->with('success', 'Pesan anda berhasil dikirim');
        // $this->validate($request, [
        //     'dokumen' => 'mimes:doc,docx,pdf,xls,xlsx,ppt,pptx',
        // ]);

        // $inquiry_upload_data = $request->file('upload');
        // $nama_dokumen = 'MPE'.date('Ymdhis').'.'.$request->file('upload')->getClientOriginalExtension();
        // $inquiry_upload_data->move(public_path('/upload'), $nama_dokumen);



        // $data->inquiry_perusahaan = $request->inquiry_perusahaan;
        // $data->inquiry_alamat = $request->inquiry_alamat;
        // $data->inquiry_nama = $request->inquiry_nama;
        // $data->inquiry_no_telp = $request->inquiry_no_telp;
        // $data->inquiry_email = $request->inquiry_email;
        // $data->inquiry_jenis_kegiatan = $request->inquiry_jenis_kegiatan;
        // $data->inquiry_lokasi_kegiatan = $request->inquiry_lokasi_kegiatan;
        // $data->inquiry_sumber_air_limbah_id = $request->inquiry_sumber_air_limbah_id;
        // $data->inquiry_debit_air_limbah = $request->inquiry_debit_air_limbah;
        // $data->inquiry_luas_lahan_rencana = $request->inquiry_luas_lahan_rencana;
        // $data->inquiry_penggunaan_air_bersih = $request->inquiry_penggunaan_air_bersih;
        // $data->inquiry_jumlah_karyawan = $request->inquiry_jumlah_karyawan;
        // $data->inquiry_jumlah_tamu = $request->inquiry_jumlah_tamu;
        // // $data->$inquiry_upload_data = $nama_dokumen;
        // $data->inquiry_upload_data = $request->inquiry_upload_data;
        // $data->inquiry_keterangan_tambahan = $request->inquiry_keterangan_tambahan;
        // $data->save();
    }
}
