@extends('layouts.app')

@section('content')
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        {{-- <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ __('Dashboard') }}</h2>
                </div>
            </div>
            <!-- end col -->
        </div> --}}
        <!-- end row -->
    </div>
    <!-- ========== title-wrapper end ========== -->

    <div class="card-styles">
        <div class="card-style-3 mb-30">
            <div class="card-content">
                <p>
                    @if(auth()->user()->role == "2")
                    <p>Selamat Datang Kembali {{ Auth::user()->name }}, Anda Login sebagai Super Admin!</p>
                    <p>
                        <br>
                        <b>PT Mitra Prima Enviro </b> merupakan salah satu layanan <b> Achmad & Assosiates Group </b> yang bergerak dibidang Enviromental Service meliputi Layanan WWTP Desain and Build, WWTP Equipment Supply, dan WWTP Operational and Maintenance Service.
                        <br>
                        <br>
                        <b>PT Mitra Prima Enviro </b> telah berpengalaman mengerjakan berbagai jenis Instalasi Pengolahan Air Limbah (IPAL) baik Domestik maupun Non-Domestik seperti Industri dan Medis dengan jangkuan pekerjaan seluruh Indonesia. Kami siap menjadi mitra kerja yang senantiasa memberikan hasil terbaik untuk setiap pekerjaan yang telah dipercayakan kepada kami.
                    </p>
                    @endif
                    @if(auth()->user()->role == "1")
                    <p>Selamat Datang Kembali {{ Auth::user()->name }}, Anda Login sebagai Admin!</p>
                    <p>
                        <br>
                        <b>PT Mitra Prima Enviro </b> merupakan salah satu layanan <b> Achmad & Assosiates Group </b> yang bergerak dibidang Enviromental Service meliputi Layanan WWTP Desain and Build, WWTP Equipment Supply, dan WWTP Operational and Maintenance Service.
                        <br>
                        <br>
                        <b>PT Mitra Prima Enviro </b> telah berpengalaman mengerjakan berbagai jenis Instalasi Pengolahan Air Limbah (IPAL) baik Domestik maupun Non-Domestik seperti Industri dan Medis dengan jangkuan pekerjaan seluruh Indonesia. Kami siap menjadi mitra kerja yang senantiasa memberikan hasil terbaik untuk setiap pekerjaan yang telah dipercayakan kepada kami.
                    </p>
                    @endif
                    @if(auth()->user()->role == "0")
                    <p>Selamat Datang Kembali {{ Auth::user()->name }}, Anda Login sebagai Owner!</p>
                    <p>
                        <br>
                        <b>PT Mitra Prima Enviro </b> merupakan salah satu layanan <b> Achmad & Assosiates Group </b> yang bergerak dibidang Enviromental Service meliputi Layanan WWTP Desain and Build, WWTP Equipment Supply, dan WWTP Operational and Maintenance Service.
                        <br>
                        <br>
                        <b>PT Mitra Prima Enviro </b> telah berpengalaman mengerjakan berbagai jenis Instalasi Pengolahan Air Limbah (IPAL) baik Domestik maupun Non-Domestik seperti Industri dan Medis dengan jangkuan pekerjaan seluruh Indonesia. Kami siap menjadi mitra kerja yang senantiasa memberikan hasil terbaik untuk setiap pekerjaan yang telah dipercayakan kepada kami.
                    </p>
                    @endif
                </p>
            </div>
        </div>
    </div>
@endsection
