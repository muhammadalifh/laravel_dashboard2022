@extends('layouts.app')

@section('content')
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        {{-- <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ __('Users') }}</h2>
                </div>
            </div>
            <!-- end col -->
        </div> --}}
        <!-- end row -->
    </div>
    <!-- ========== title-wrapper end ========== -->
    <center>
        <a target="_blank" href="{{ route('exportportofolio') }}" class="btn btn-success mb-2"> <i class="fas fa-file-export"></i> Export Excel</a> &nbsp;&nbsp;&nbsp;
        <a target="_blank" href="{{ route('portofolio.cetak') }}" class="btn btn-info mb-2"> <i class="fas fa-print"></i></i></i> Cetak Laporan</a> &nbsp;&nbsp;&nbsp;
        @if(auth()->user()->role == "1" || auth()->user()->role == "2")
            <a href="{{ route('portofolio.create') }}" class="btn btn-primary mb-2"> <i class="fas fa-plus"></i> Tambah Portofolio</a>
        @endif
    </center>
    <div class="card-styles">
        <div class="card-style-3 mb-30">
            <div class="card-content">

                {{-- <div class="alert-box primary-alert">
                    <div class="alert">
                        <p class="text-medium">
                            Sample table page
                        </p>
                    </div>
                </div> --}}

                <div class="table-wrapper table-responsive">
                    <table class="table striped-table">
                        <thead>
                        <tr style="text-align: center;">
                            <th><h6>Klien</h6></th>
                            <th><h6>Perusahaan</h6></th>
                            <th><h6>Tahun</h6></th>
                            <th><h6>Jenis <br>(Project)</h6></th>
                            <th><h6>Kapasitas <br> (m3/hari)</h6></th>
                            <th><h6>Teknologi</h6></th>
                            <th><h6>Nilai Kontrak</h6></th>
                            <th><h6>Status</h6></th>
                            <th><h6>Action</h6></th>
                        </tr>
                        <!-- end table row-->
                        </thead>
                        <tbody>
                        @foreach($portofolio as $item)
                            <tr style="text-align: center;">
                                <td>
                                    <p>{{ $item->klien->klien }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->perusahaan }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->tahun }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->jenis->jenis }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->kapasitas }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->teknologi->teknologi }}</p>
                                </td>
                                <td>
                                    <p>Rp. {{ $item->nilai_kontrak }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->status->status }}</p>
                                </td>
                                <td>
                                    <a href="{{ route('portofolio.edit', $item->id) }}" class="btn btn-warning btn-sm"> <i class="fas fa-edit"></i> Edit</a> <br> &nbsp;
                                <form action="{{ route('portofolio.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                </form>
                                </td>
                            </tr>
                        @endforeach
                        <!-- end table row -->
                        </tbody>
                    </table>
                    <!-- end table -->

                    {{ $portofolio->links() }}
                </div>

            </div>
        </div>
    </div>

@endsection
