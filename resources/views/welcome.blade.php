<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <link rel="icon" href="{{ asset('images/logo/prima2.png') }}">
        <title>Sistem Informasi Pelanggan Mitra Prima Enviro</title>

        <script src="https://kit.fontawesome.com/a420508792.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/boxicons.min.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <link rel="stylesheet" href="{{ asset('css/primarev.css') }}"/>
        {{-- Data Tables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
    </head>
    <body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg py-3 sticky-top navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img class="logo" src="{{ asset('images/logo/logo-mpe.png') }}" alt="logo" style="width: 100%;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        {{-- <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#portfolio">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#pricing">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#team">Team</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#blog">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li> --}}
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/home') }}" class="btn btn-outline-dark btn-sm" style="border-radius: 5px">HOME</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm" style="border-radius: 5px">LOGIN</a>
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav><!-- //NAVBAR -->

    <!-- HERO -->
    <div class="hero vh-100 d-flex align-items-center" id="home">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 mx-auto text-center">
                    <h1 class="display-4 text-white">Sistem Informasi Pelanggan Mitra Prima Enviro</h1>
                    <p class="text-white my-3">PT. Mitra Prima Enviro merupakan salah satu layanan dari Achmad & Associates Group.
                        Dengan lingkup layanan Design, atau Design & Build serta Jasa Operasional IPAL,
                        MPE siap menjadi mitra kerja yang senantiasa memberikan hasil terbaik bagi setiap
                        project pengolahan air limbah yang telah dipercayakan kepada kami.</p>
                    <a href="#portofolio" class="btn btn-outline-light" style="border-radius: 4px;">Portfolio</a>
                    <a href="#inquiry" class="btn me-2 btn-primary" style="border-radius: 4px;">Inquiry</a>
                </div>
            </div>
        </div>
        <div id='chat-box'>
            <div id='chat-top'>Butuh Bantuan? <span id='chat-top-right'><svg id='close-box' xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 48 48"><path d="M38 12.83L35.17 10 24 21.17 12.83 10 10 12.83 21.17 24 10 35.17 12.83 38 24 26.83 35.17 38 38 35.17 26.83 24z" fill='#fff'/></svg></span><div class='clear'></div></div>
            <div id='chat-msg'><p>Ada Yang bisa Kami Bantu?</p>
            <div id='chat-form'>
            <div class='chat-in'>
            <input type='text' id='whats-in' Placeholder='Ketik pesan disini...'/></div><div id='send-btn'><svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 48 48"><path d="M4.02 42L46 24 4.02 6 4 20l30 4-30 4z" fill='rgb(18, 140, 126)'/></svg></div></div>
            </div>
            </div>
            <div id='whats-chat'>

            <svg xmlns="http://www.w3.org/2000/svg" version="1" width="35" height="35" viewBox="0 0 90 90"><path d="M90 44a44 44 0 0 1-66 38L0 90l8-24A44 44 0 0 1 46 0c24 0 44 20 44 44zM46 7C25 7 9 24 9 44c0 8 2 15 7 21l-5 14 14-4a37 37 0 0 0 58-31C83 24 66 7 46 7zm22 47l-2-1-7-4-3 1-3 4h-3c-1 0-4-1-8-5-3-3-6-6-6-8v-2l2-2 1-1v-2l-4-8c0-2-1-2-2-2h-2l-3 1c-1 1-4 4-4 9s4 11 5 11c0 1 7 12 18 16 11 5 11 3 13 3s7-2 7-5l1-5z" fill="#FFF"/></svg>
            </div>
    </div>
    <!-- //HERO -->

    <!-- PORTOFOLIO -->
    <section id="portofolio" class="bg-light">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 mx-auto text-center">
                    <h6 class="text-primary">PORTOFOLIO</h6>
                    <h3>Database PT. Mitra Prima Enviro</h3>
                </div>
            </div>
            <div class="row g-4">
                <div class="table-wrapper table-responsive">
                    <table class="table table-striped" id="table-welcome">
                        <div class="row" id="row-welcome">
                        <div class="divider"></div>
                        <thead>
                            <tr style="text-align: center;">
                                <th>
                                    <h6>Klien</h6>
                                </th>
                                <th>
                                    <h6>Perusahaan</h6>
                                </th>
                                <th>
                                    <h6>Tahun</h6>
                                </th>
                                <th>
                                    <h6>Jenis <br>(Project)</h6>
                                </th>
                                <th>
                                    <h6>Kapasitas <br> (m3/hari)</h6>
                                </th>
                                <th>
                                    <h6>Nilai <br> Kontrak</h6>
                                </th>
                                {{-- <th>
                                    <h6>Gallery Foto (MASIH BELUM ADA)</h6>
                                </th> --}}

                            </tr>
                            <!-- end table row-->
                        </thead>
                        <tbody style="text-align: center;">

                            <!-- end table row -->
                        </tbody>
                    </table>
                    <!-- end table -->
            </div>
        </div>
    </section><!-- PORTOFOLIO -->

    <!-- INQUIRY -->
    <section id="inquiry" class="bg-light">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 mx-auto text-center">
                    <h6 class="text-primary">INQUIRY</h6>
                    <h3>Submit Form</h3>
                </div>
            </div>
            <center>
                <button style="border-radius: 5px;" class="btn btn-outline-dark btn-sm" onClick="window.location.reload();">Hapus Input Form <i class="fas fa-sync"></i></button>
            </center>
            <br>
            <div class="row g-4">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="/store_inquiry" method="POST" enctype="multipart/form-data">
                                    @csrf
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="inquiry_perusahaan">Perusahaan/Instansi :</label>
                                                    <input autocomplete="off" id="inquiry_perusahaan" type="text" name="inquiry_perusahaan" class="form-control @error ('inquiry_perusahaan') is-invalid @enderror" placeholder="Masukkan Nama Perusahaan" >
                                                    @error('inquiry_perusahaan')
                                                        <div class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="inquiry_alamat">Alamat :</label>
                                                    <input autocomplete="off" id="inquiry_alamat" type="text" name="inquiry_alamat" class="form-control @error ('inquiry_alamat') is-invalid @enderror" placeholder="Masukkan Alamat" >
                                                    @error('inquiry_alamat')
                                                        <div class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="inquiry_nama">Nama :</label>
                                                    <input autocomplete="off" id="inquiry_nama" type="text" name="inquiry_nama" class="form-control @error ('inquiry_nama') is-invalid @enderror" placeholder="Masukkan nama" >
                                                    @error('inquiry_nama')
                                                        <div class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="inquiry_no_telp">No.Telp/HP :</label>
                                                    <input autocomplete="off" id="inquiry_no_telp" type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        maxlength = "12" name="inquiry_no_telp" class="form-control @error ('inquiry_no_telp') is-invalid @enderror" placeholder="Masukkan No. Telepon/HP" >
                                                        @error('inquiry_no_telp')
                                                        <div class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                    </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="inquiry_email">Email :</label>
                                                    <input autocomplete="off" id="inquiry_email" type="email" name="inquiry_email" class="form-control @error ('inquiry_email') is-invalid @enderror" placeholder="Masukkan Email" >
                                                    @error('inquiry_email')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="inquiry_jenis_kegiatan">Jenis Kegiatan :</label>
                                                    <input autocomplete="off" id="inquiry_jenis_kegiatan" type="text" name="inquiry_jenis_kegiatan" class="form-control @error ('inquiry_jenis_kegiatan') is-invalid @enderror" placeholder="Masukkan Jenis Kegiatan" >
                                                    @error('inquiry_jenis_kegiatan')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="inquiry_lokasi_kegiatan">Lokasi Kegiatan :</label>
                                                    <input autocomplete="off"  id="inquiry_lokasi_kegiatan" type="text" name="inquiry_lokasi_kegiatan" class="form-control @error ('inquiry_lokasi_kegiatan') is-invalid @enderror" placeholder="Masukkan Lokasi Kegiatan" >
                                                    @error('inquiry_lokasi_kegiatan')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="inquiry_sumber_air_limbah_id">Sumber Air Limbah:</label>
                                                    <select  class="form-control @error ('inquiry_sumber_air_limbah_id') is-invalid @enderror" id="inquiry_sumber_air_limbah_id" name="inquiry_sumber_air_limbah_id">
                                                        <option disabled value selected>Pilih Sumber Air Limbah</option>
                                                        <option value="1">Domestik</option>
                                                        <option value="2">Medis</option>
                                                        <option value="3">Industri</option>
                                                    </select>
                                                    @error('inquiry_sumber_air_limbah_id')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="inquiry_debit_air_limbah">Debit Air Limbah :</label>
                                                    <input autocomplete="off" id="inquiry_debit_air_limbah" type="number" name="inquiry_debit_air_limbah" class="form-control @error ('inquiry_debit_air_limbah') is-invalid @enderror" placeholder="Debit (m3/hari)" >
                                                    @error('inquiry_debit_air_limbah')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="inquiry_luas_lahan_rencana">Luas Lahan Rencana IPAL :</label>
                                                    <input autocomplete="off" id="inquiry_luas_lahan_rencana" type="number" name="inquiry_luas_lahan_rencana" class="form-control @error ('inquiry_luas_lahan_rencana') is-invalid @enderror" placeholder="Luas Lahan (m2)" >
                                                    @error('inquiry_luas_lahan_rencana')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="inquiry_penggunaan_air_bersih">Penggunaan Air Bersih :</label>
                                                    <input autocomplete="off" id="inquiry_penggunaan_air_bersih" type="number" name="inquiry_penggunaan_air_bersih" class="form-control @error ('inquiry_penggunaan_air_bersih') is-invalid @enderror" placeholder="Air Bersih (m3/bulan)" >
                                                    @error('inquiry_penggunaan_air_bersih')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="inquiry_jumlah_karyawan">Jumlah Karyawan :</label>
                                                    <input autocomplete="off" id="inquiry_jumlah_karyawan" type="number" name="inquiry_jumlah_karyawan" class="form-control @error ('inquiry_jumlah_karyawan') is-invalid @enderror" placeholder="Masukkan Jumlah Karyawan" >
                                                    @error('inquiry_jumlah_karyawan')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="inquiry_jumlah_tamu">Jumlah Tamu/Pengunjung/Bed :</label>
                                                    <input autocomplete="off" id="inquiry_jumlah_tamu" type="number" name="inquiry_jumlah_tamu" class="form-control @error ('inquiry_jumlah_tamu') is-invalid @enderror" placeholder="Masukkan Jumlah Tamu/Pengunjung/Bed" >
                                                        @error('inquiry_jumlah_tamu')
                                                        <div class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="inquiry_upload_data">Upload Data Lain (Jika Ada):</label>
                                                    <input autocomplete="off" id="inquiry_upload_data" name="inquiry_upload_data" type="file" class="custom-file-input form-control @error ('inquiry_upload_data') is-invalid @enderror">
                                                    <span>  Ekstensi file upload: rar/zip <br>
                                                            Max ukuran file: 5MB
                                                    </span>
                                                    @error('inquiry_upload_data')
                                                        <div class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                </div>
                                            </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inquiry_keterangan_tambahan">Keterangan Tambahan (Jika Ada) :</label>
                                                    <textarea id="inquiry_keterangan_tambahan" name="inquiry_keterangan_tambahan" class="form-control @error ('inquiry_keterangan_tambahan') is-invalid @enderror" placeholder="Keterangan tambahan jika ada ....."  rows="5"></textarea>
                                                        @error('inquiry_keterangan_tambahan')
                                                        <div class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 text-center">
                                                <br>
                                                <button style="border-radius: 5px;" type="submit" class="btn btn-outline-success btn-send" name="inquiry_kirim" id="inquiry_kirim">Kirim <i class="far fa-paper-plane"></i></button>
                                            </div>
                                        </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section><!-- INQUIRY -->



        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="{{ asset('js/datatables_eksternal.js') }}"></script>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        {{-- <script src="{{ asset('js/bootstrap.min.js') }}"></script> --}}
        <script src="{{ asset('js/primarev.js') }}"></script>

                {{-- Data Tables --}}
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
        <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready( function () {
        // $('#table-eksternal').DataTable();
        isi()
        } )

        function isi() {
        $('#table-welcome').DataTable({
            scrollX:true,
            processing:true,
            serverSide:true,
            paginate: true,
            bDeferRender: true,
            bLengthChange: true,
            bFilter: true,
            bInfo: true,
            responsive: true,
            autoWidth: false,
            pageLength: 5,
            lengthMenu: [[5, 10, 25, 50, 100], [5, 10, 25, 50, 100]],
            ajax : {
                url : "/json",
            },
            columns:[
            {data:'klien', name:'klien'},
            {data:'perusahaan', name:'perusahaan'},
            {data:'tahun', name:'tahun'},
            {data:'jenis', name:'jenis'},
            {data:'kapasitas', name:'kapasitas'},
            {data:'nilai_kontrak', name:'nilai_kontrak'}
        ]
        })
    }
        </script>

        {{-- <script>
            $('#inquiry_kirim').on('click', function(){
                $.ajax({
                    url: "/store_inquiry",
                    type: 'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {
                        inquiry_perusahaan : $('#inquiry_perusahaan').val(),
                        inquiry_alamat : $('#inquiry_alamat').val(),
                        inquiry_nama : $('#inquiry_nama').val(),
                        inquiry_no_telp : $('#inquiry_no_telp').val(),
                        inquiry_email : $('#inquiry_email').val(),
                        inquiry_jenis_kegiatan: $('#inquiry_jenis_kegiatan').val(),
                        inquiry_lokasi_kegiatan: $('#inquiry_lokasi_kegiatan').val(),
                        inquiry_sumber_air_limbah_id: $('#inquiry_sumber_air_limbah_id').val(),
                        inquiry_debit_air_limbah: $('#inquiry_debit_air_limbah').val(),
                        inquiry_luas_lahan_rencana: $('#inquiry_luas_lahan_rencana').val(),
                        inquiry_penggunaan_air_bersih: $('#inquiry_penggunaan_air_bersih').val(),
                        inquiry_jumlah_karyawan: $('#inquiry_jumlah_karyawan').val(),
                        inquiry_jumlah_tamu: $('#inquiry_jumlah_tamu').val(),
                        inquiry_upload_data: $('#inquiry_upload_data').val(),
                        inquiry_keterangan_tambahan: $('#inquiry_keterangan_tambahan').val(),
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (res){
                        console.log(res.data);
                        window.location.href = "/pesan_diterima";
                        $('#inquiry_perusahaan').val('');
                        $('#inquiry_alamat').val('');
                        $('#inquiry_nama').val('');
                        $('#inquiry_no_telp').val('');
                        $('#inquiry_email').val('');
                        $('#inquiry_jenis_kegiatan').val('');
                        $('#inquiry_lokasi_kegiatan').val('');
                        $('#inquiry_sumber_air_limbah_id').val('');
                        $('#inquiry_debit_air_limbah').val('');
                        $('#inquiry_luas_lahan_rencana').val('');
                        $('#inquiry_penggunaan_air_bersih').val('');
                        $('#inquiry_jumlah_karyawan').val('');
                        $('#inquiry_jumlah_tamu').val('');
                        $('#inquiry_upload_data').val('');
                        $('#inquiry_keterangan_tambahan').val('');
                        // swal({
                        //     title: "Sukses",
                        //     text: "Pesan anda telah terkirim",
                        //     icon: "success",
                        //     button: "OK",
                        // });
                    },
                    error :function (xhr){
                        swal({
                            title: "Pesan anda gagal terkirim...",
                            text: "Pastikan Anda Sudah Mengisi Form Dengan Benar",
                            icon: "error",
                            button: "OK",
                        });
                    }
                })
            })
        </script> --}}
    </body>
</html>
