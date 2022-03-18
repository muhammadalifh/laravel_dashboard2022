<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Models\User;
use App\Notifications\EmailNotification;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification as FacadesNotification;
use Yajra\DataTables\Facades\DataTables;
use App\Mail\ContactMail;
use Carbon\Carbon;

class WelcomeController extends Controller
{
    public function welcome_index()
    {
        $sumberairlimbah = DB::table('sumberairlimbah')->get();
        return view('welcome', ['sumberairlimbah' => $sumberairlimbah]);
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
        return view('pesan-diterima');
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
            // 'inquiry_jenis_kegiatan' => 'required|max:255',
            // 'inquiry_lokasi_kegiatan' => 'required|max:255',
            'inquiry_sumber_air_limbah_id' => 'required',
            'inquiry_debit_air_limbah' => 'required|numeric',
            'inquiry_penggunaan_air_bersih' => 'required|numeric',
            'inquiry_jumlah_karyawan' => 'required|numeric',
            'inquiry_jumlah_penghuni' => 'nullable|numeric',
            'inquiry_jumlah_kamar' => 'nullable|numeric',
            'inquiry_jumlah_bed' => 'nullable|numeric',
            'inquiry_kapasitas_produksi' => 'nullable|numeric',
            // 'inquiry_jumlah_tamu' => 'required|numeric',
            'inquiry_luas_lahan_rencana' => 'required|numeric',
            'inquiry_upload_data' => 'file|mimes:rar,zip|max:102400|nullable',
            'inquiry_keterangan_tambahan' => 'max:255|nullable',
        ]);

        if($request->file('inquiry_upload_data') != null){
            $data['inquiry_upload_data'] = $request->file('inquiry_upload_data')->store('upload/inquiry/'.$request->input('inquiry_perusahaan'));
        }

        // Email Notification
        $user = User::where('role', '=', 2)->orWhere('role', '=', 1)->get();
        // $details = [
        //     'greeting' => 'Halo, Ada Klien Baru!',
        //     'body' => 'Klien Baru dengan nama '.$request->inquiry_nama.' dari perusahaan '.$request->inquiry_perusahaan.' telah mendaftar di website kami. Rincian sebaga berikut.',
        //     'inquiry_perusahaan' => 'Perusahaan/Instansi : '.$request->inquiry_perusahaan,
        //     'inquiry_alamat' => 'Alamat Perusahaan : '.$request->inquiry_alamat,
        //     'inquiry_nama' => 'Nama : '.$request->inquiry_nama,
        //     'inquiry_no_telp' => 'No.Kontak : '.$request->inquiry_no_telp,
        //     'inquiry_email' => 'Email : '.$request->inquiry_email,
        //     'inquiry_sumber_air_limbah_id' => 'Sumber Air Limbah : '.$request->inquiry_sumber_air_limbah_id,
        //     'inquiry_debit_air_limbah' => 'Debit Air Limbah (m3/hari) : '.$request->inquiry_debit_air_limbah,
        //     'inquiry_penggunaan_air_bersih' => 'Penggunaan Air Bersih (m3/bulan) : '.$request->inquiry_penggunaan_air_bersih,
        //     'inquiry_jumlah_karyawan' => 'Jumlah Karyawan : '.$request->inquiry_jumlah_karyawan,
        //     'inquiry_jumlah_penghuni' => 'Jumlah Penghuni : '.$request->inquiry_jumlah_penghuni,
        //     'inquiry_jumlah_kamar' => 'Jumlah Kamar : '.$request->inquiry_jumlah_kamar,
        //     'inquiry_jumlah_bed' => 'Jumlah Bed : '.$request->inquiry_jumlah_bed,
        //     'inquiry_kapasitas_produksi' => 'Kapasitas Produksi (ton/tahun) : '.$request->inquiry_kapasitas_produksi,
        //     'inquiry_luas_lahan_rencana' => 'Luas Lahan Rencana IPAL (m2) : '.$request->inquiry_luas_lahan_rencana,
        //     'inquiry_upload_data' => 'Upload Data : Untuk Melihat Data Pendukung Klien, Silahkan Login Ke Website Kami.',
        //     'inquiry_keterangan_tambahan' => 'Keterangan Tambahan : '.$request->inquiry_keterangan_tambahan,
        //     'catatan' => 'Catatan :',
        //     'kode' => 'Kode Sumber Air Limbah Sebagai Berikut :',
        //     'kode1' => '1 = Domestik',
        //     'kode2' => '2 = Medis',
        //     'kode3' => '3 = Industri',
        //     'lastline' => 'Terimakasih'
        // ];

        // // Notification::send($user, new EmailNotification($details));
        // FacadesNotification::send($user, new EmailNotification($details));




        $detail = [
            'inquiry_perusahaan' => $request->inquiry_perusahaan,
            'inquiry_alamat' => $request->inquiry_alamat,
            'inquiry_nama' => $request->inquiry_nama,
            'inquiry_no_telp' => $request->inquiry_no_telp,
            'inquiry_email' => $request->inquiry_email,
            // Data Teknis
            'inquiry_sumber_air_limbah_id' => $request->inquiry_sumber_air_limbah_id,
            'inquiry_debit_air_limbah' => $request->inquiry_debit_air_limbah,
            'inquiry_penggunaan_air_bersih' => $request->inquiry_penggunaan_air_bersih,
            'inquiry_jumlah_karyawan' => $request->inquiry_jumlah_karyawan,
            'inquiry_jumlah_penghuni' => $request->inquiry_jumlah_penghuni,
            'inquiry_jumlah_kamar' => $request->inquiry_jumlah_kamar,
            'inquiry_jumlah_bed' => $request->inquiry_jumlah_bed,
            'inquiry_kapasitas_produksi' => $request->inquiry_kapasitas_produksi,
            // Data Pendukung
            'inquiry_luas_lahan_rencana' => $request->inquiry_luas_lahan_rencana,
            'inquiry_upload_data' => $request->inquiry_upload_data,
            'inquiry_keterangan_tambahan' => $request->inquiry_keterangan_tambahan,
        ];


        Mail::to($user)->send(new ContactMail($detail));

        Inquiry::create($data);
        return redirect()->route('pesan-diterima')->with('success', 'Pesan anda berhasil dikirim');
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
