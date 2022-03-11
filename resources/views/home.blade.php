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
                    @endif
                    @if(auth()->user()->role == "1")
                    <p>Selamat Datang Kembali {{ Auth::user()->name }}, Anda Login sebagai Admin!</p>
                    @endif
                    @if(auth()->user()->role == "0")
                    <p>Selamat Datang Kembali {{ Auth::user()->name }}, Anda Login sebagai Owner!</p>
                    @endif
                </p>
            </div>
        </div>
    </div>
@endsection
