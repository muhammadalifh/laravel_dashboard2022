<link rel="stylesheet" href="{{ asset('css/verify.css') }}">

<div class="pesan-check">
    <div class="pesan-container">
        <h2>
            Form Anda Berhasil Terkirim !
        </h2>
        <img class="img-fluid align-items-center w-75" src="{{ asset('images/complete.gif') }}"
            style="width: 250px; height: 250px;">
        <p>
            TERIMAKASIH ATAS INFORMASI YANG TELAH DISAMPAIKAN. TIM KAMI AKAN SEGERA MENINDAKLANJUTI DENGAN PENAWARAN
            HARGA.
        </p>
    </div>
    <div>
        <a type="button" class="btn btn-primary" href="{{ route('welcome') }}">Kembali Ke Halaman Awal</a>
    </div>
</div>
