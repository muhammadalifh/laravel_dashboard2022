<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/cetak.css') }}" rel="stylesheet">
    <title>{{ config('app.name', 'Sistem Informasi Manajemen Penawaran Mitra Prima Enviro') }}</title>
    <title>Laporan Portofolio</title>
</head>
<body class="landscape">
    <section class="sheet padding-10mm">
        <h1>LAPORAN PORTOFOLIO</h1>

        <table class="table">
            <thead>
                <tr>
                    <th style="text-align: center">Klien</th>
                                    <th style="text-align: center">Perusahaan</th>
                                    <th style="text-align: center">Tahun</th>
                                    <th  style="text-align: center">Jenis <br>(Project)</th>
                                    <th  style="text-align: center">Kapasitas <br> (m3/hari)</th>
                                    <th  style="text-align: center">Teknologi</th>
                                    <th  style="text-align: center">Nilai Kontrak</th>
                                    <th  style="text-align: center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <tr>
                        @foreach ($portofoliocetak as $item)
                        <td style="text-align: center">{{ $item->klien->klien }}</td>
                        <td style="text-align: center">{{ $item->perusahaan }}</td>
                        <td style="text-align: center">{{ $item->tahun }}</td>
                        <td style="text-align: center">{{ $item->jenis->jenis }}</td>
                        <td style="text-align: center">{{ $item->kapasitas }}</td>
                        <td style="text-align: center">{{ $item->teknologi->teknologi }}</td>
                        <td style="text-align: center">{{ $item->nilai_kontrak }}</td>
                        <td style="text-align: center">{{ $item->status->status }}</td>
                    </tr>
                        @endforeach
                </tr>
            </tbody>
        </table>
    </section>
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>
