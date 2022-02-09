<!doctype html>
<html lang="en">

<head>
    <title>Laporan Data Portofolio</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{-- <meta name="csrf-token" content="{{ csrf_token }}"> --}}

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('css/cetak/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cetak/bootstrap.min.css') }}">

</head>

<body>
    <style type="text/css" media="print">
        .page
        {
         -webkit-transform: rotate(-90deg);
         -moz-transform:rotate(-90deg);
         filter:progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
        }
    </style>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Laporan Data Portofolio</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-wrap">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <center>
                                    <th style="text-align: center">Klien</th>
                                    <th style="text-align: center">Perusahaan</th>
                                    <th style="text-align: center">Tahun</th>
                                    <th  style="text-align: center">Jenis <br>(Project)</th>
                                    <th  style="text-align: center">Kapasitas <br> (m3/hari)</th>
                                    <th  style="text-align: center">Teknologi</th>
                                    <th  style="text-align: center">Nilai Kontrak</th>
                                    <th  style="text-align: center">Status</th>
                                    </center>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($portofoliocetak as $item)
                                    <td style="text-align: center">{{ $item->klien->klien }}</td>
                                    <td style="text-align: center">{{ $item->perusahaan }}</td>
                                    <td style="text-align: center">{{ $item->tahun }}</td>
                                    <td style="text-align: center">{{ $item->jenis->jenis }}</td>
                                    <td style="text-align: center">{{ $item->kapasitas }}</td>
                                    <td style="text-align: center">{{ $item->teknologi->teknologi }}</td>
                                    <td style="text-align: center">Rp.{{ $item->nilai_kontrak }}</td>
                                    <td style="text-align: center">{{ $item->status->status }}</td>
                                </tr>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript" src="{{ asset('js/cetak/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/cetak/popper.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/cetak/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/cetak/main.js') }}"></script>

<script type="text/javascript">
    window.print();
</script>

</body>

</html>
