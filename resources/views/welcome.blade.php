<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="{{ asset('images/logo/prima2.png') }}">
        <title>Sistem Informasi Pelanggan Mitra Prima Enviro</title>

        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/boxicons.min.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <link rel="stylesheet" href="{{ asset('css/primarev.css') }}"/>
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
                            <a href="{{ url('/home') }}" class="btn btn-outline-dark btn-sm" style="border-radius: 10px">Home</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm" style="border-radius: 10px">Log In</a>
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
                    <a href="#" class="btn me-2 btn-primary">Inquiry</a>
                    <a href="#" class="btn btn-outline-light">Portfolio</a>
                </div>
            </div>
        </div>
    </div><!-- //HERO -->


        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        {{-- <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/primarev.js') }}"></script> --}}
    </body>
</html>
