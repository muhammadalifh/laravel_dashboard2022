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
    </body>


    <script src="{{ asset('js/primarev.js') }}"></script>
