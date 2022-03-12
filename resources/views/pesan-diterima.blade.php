<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <link rel="icon" href="{{ asset('images/logo/prima2.png') }}">
        <title>Sistem Informasi Pelanggan Mitra Prima Enviro</title>
        <link rel="stylesheet" href="{{ asset('css/verify.css') }}">

    </head>

    <body>
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
    </body>


    <script src="{{ asset('js/primarev.js') }}"></script>
