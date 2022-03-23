<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Inquiry</title>
</head>

<body>

    <body
        style="background-color:#e2e1e0;font-family: Open Sans, sans-serif;font-size:100%;font-weight:400;line-height:1.4;color:#000;">
        <table
            style="max-width:670px;margin:50px auto 10px;background-color:#fff;padding:50px;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-webkit-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);-moz-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24); border-top: solid 10px #0d6efd;">
            <thead>
                <tr>
                    <th style="text-align:left;"><img src="data:image/png;base64, {{ base64_encode(file_get_contents(resource_path('views/emails/logo-mpe.png'))) }}"></th>
                    @php
                    $date = Illuminate\Support\Carbon::now()->isoFormat('dddd, D MMMM Y');

                    @endphp
                    <th style="text-align:right;font-weight:400;">{{ $date }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="height:35px;"></td>
                </tr>

                <tr>
                    <td colspan="2" style="border: solid 1px #ddd; padding:10px 20px;">
                        <center>
                            <b style="color:#0d6efd;font-weight:15px;margin:0">INQUIRY</b>
                            <p style="font-size:14px;margin:0 0 6px 0;"><span
                                style="font-weight:bold;display:inline-block;min-width:150px">Form Permintaan Penawaran</span></p>
                        </center>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" style="border: solid 1px #ddd; padding:10px 20px;">
                        <p style="font-size:14px;margin:0 0 6px 0;"><span
                                style="font-weight:bold;display:inline-block;min-width:150px">Pendaftaran Klien Baru</span><b
                                style="color:green;font-weight:normal;margin:0">Success</b></p>
                        <p style="font-size:14px;margin:0 0 0 0;">Pendaftaran Klien Baru dengan Nama Pelanggan <span style="font-weight:bold;display:inline-block;"> {{ $detail['inquiry_nama'] }} </span> dari Perusahaan/PT <span style="font-weight:bold;display:inline-block;"> {{ $detail['inquiry_perusahaan'] }} </span> telah berhasil dilakukan. Detail sebagai berikut :</p>
                    </td>
                </tr>
                <tr>
                    <td style="height:35px;"></td>
                </tr>
                <tr>
                    <td style="width:50%;padding:20px;vertical-align:top">
                        <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span
                                style="display:block;font-weight:bold;font-size:13px">Nama Perusahaan</span> {{ $detail['inquiry_perusahaan'] }}</p>
                        <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span
                                style="display:block;font-weight:bold;font-size:13px;">Nama Pelanggan</span> {{ $detail['inquiry_nama'] }} </p>
                        <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span
                                style="display:block;font-weight:bold;font-size:13px;">Email</span> {{ $detail['inquiry_email'] }} </p>
                    </td>
                    <td style="width:50%;padding:20px;vertical-align:top">
                        <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span
                                style="display:block;font-weight:bold;font-size:13px;">Alamat Perusahaan</span> {{ $detail['inquiry_alamat'] }} </p>
                        <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span
                                style="display:block;font-weight:bold;font-size:13px;">Nomor. Kontak/Telepon</span> {{ $detail['inquiry_no_telp'] }} </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="font-size:20px;padding:30px 15px 0 15px; text-align:center;">Data Teknis</td>
                </tr>
                <tr>
                    <td colspan="2" style="padding:15px;">
                        <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;">
                            <span style="display:block;font-size:13px;font-weight:normal;">Sumber Air Limbah</span> {{ $detail['inquiry_sumber_air_limbah_id'] }} <b style="font-size:12px;font-weight:300;">
                                <br>
                                <br>
                                Catatan: Kode Sumber Air Limbah :
                                <br>
                                1 = Domestik <br>
                                2 = Medis <br>
                                3 = Industri
                            </b>
                        </p>
                        <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;"><span style="display:block;font-size:13px;font-weight:normal;">Debit Air Limbah (m3/hari)</span> {{ $detail['inquiry_debit_air_limbah'] }} <b style="font-size:12px;font-weight:300;"></b></p>
                        <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;"><span style="display:block;font-size:13px;font-weight:normal;">Penggunaan Air Bersih (m3/bulan)</span> {{ $detail['inquiry_penggunaan_air_bersih'] }} <b style="font-size:12px;font-weight:300;"></b></p>
                        <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;"><span style="display:block;font-size:13px;font-weight:normal;">Jumlah Karyawan</span> {{ $detail['inquiry_jumlah_karyawan'] }} <b style="font-size:12px;font-weight:300;"></b></p>
                        <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;"><span style="display:block;font-size:13px;font-weight:normal;">Jumlah Penghuni</span> {{ $detail['inquiry_jumlah_penghuni'] }} <b style="font-size:12px;font-weight:300;"></b></p>
                        <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;"><span style="display:block;font-size:13px;font-weight:normal;">Jumlah Kamar</span> {{ $detail['inquiry_jumlah_kamar'] }} <b style="font-size:12px;font-weight:300;"></b></p>
                        <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;"><span style="display:block;font-size:13px;font-weight:normal;">Jumlah Bed</span> {{ $detail['inquiry_jumlah_bed'] }} <b style="font-size:12px;font-weight:300;"></b></p>
                        <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;"><span style="display:block;font-size:13px;font-weight:normal;">Kapasitas Produksi (ton/tahun)</span> {{ $detail['inquiry_kapasitas_produksi'] }} <b style="font-size:12px;font-weight:300;"></b></p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="font-size:20px;padding:30px 15px 0 15px; text-align:center;">Data Pendukung</td>
                </tr>
                <td colspan="2" style="padding:15px;">
                    <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;"><span style="display:block;font-size:13px;font-weight:normal;">Luas Lahan Rencana (m2)</span> {{ $detail['inquiry_luas_lahan_rencana'] }} <b style="font-size:12px;font-weight:300;"></b></p>
                    <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;"><span style="display:block;font-size:13px;font-weight:normal;">Upload Data</span> Jika ada upload data dari klien, bagian paling bawah dari email ini akan ada file dengan ekstensi rar/zip <b style="font-size:12px;font-weight:300;"></b></p>
                    <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;"><span style="display:block;font-size:13px;font-weight:normal;">Keterangan Tambahan</span> {{ $detail['inquiry_keterangan_tambahan'] }} <b style="font-size:12px;font-weight:300;"></b></p>
                </td>
            </tbody>
            <tfooter>
                <tr>
                    <td colspan="2" style="font-size:14px;padding:50px 15px 0 15px;">
                        <strong style="display:block;margin:0 0 10px 0;">Regards</strong> Mitra Prima Enviro<br> Jl. Kertajaya Indah Timur VI/2, Kota Surabaya, Jawa Timur<br><br>
                        <b>Phone:</b> +62 31 5924526<br>
                        <b>Email:</b> marketingmpesby@gmail.com
                    </td>
                </tr>
            </tfooter>
        </table>
    </body>
</body>

</html>
