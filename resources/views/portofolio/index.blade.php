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
    {{-- <a target="_blank" href="{{ route('exportportofolio') }}" class="btn btn-success mb-2"> <i
            class="fas fa-file-export"></i> Export Excel</a> &nbsp;&nbsp;&nbsp; --}}
    <a target="_blank" href="{{ route('portofolio.cetak') }}" class="btn btn-info mb-2"> <i
            class="fas fa-print"></i></i></i> Cetak Laporan</a> &nbsp;&nbsp;&nbsp;
    @if(auth()->user()->role == "1" || auth()->user()->role == "2")
    <a href="{{ route('portofolio.create') }}" class="btn btn-primary mb-2"> <i class="fas fa-plus"></i> Tambah
        Portofolio</a>
    @endif
</center>
<div class="card-styles">
    <div class="card-style-3 mb-30">
        <div class="col-md-12">
            <h4 class="text-center">Portofolio Database Pekerjaan</h4>
        </div>
        <br><br>
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
                                <h6>Teknologi</h6>
                            </th>
                            <th>
                                <h6>Nilai <br> Kontrak</h6>
                            </th>
                            <th>
                                <h6> </h6>
                            </th>
                            <th>
                                <h6>Status</h6>
                            </th>
                            @if(auth()->user()->role == "1" || auth()->user()->role == "2")
                                <th>
                                    <h6>Action</h6>
                                </th>
                            @endif
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
                                <p>{{ $item->nilai_kontrak }}</p>
                            </td>

<td>
                            @if(auth()->user()->role == "1" || auth()->user()->role == "2")
                                @if($item->status->id == "1")
                                <td>
                                    {{-- <p style="color:white;" class="btn btn-warning pe-none"tabindex="-1" aria-disabled="true">{{ $item->status->status }}
                                    </p> --}}
                                    <span style="height: 25px;
                                        width: 25px;
                                        background-color: #f44c44;
                                        border-radius: 50%;
                                        color: white;
                                        display: inline-block;" title='Penawaran'> P </span>
                                </td>
                                @endif
                            @endif

                                @if(auth()->user()->role == "0")
                                    @if($item->status->id == "1")
                                    <td>
                                        <p style="color:white;" class="btn btn-danger pe-none" tabindex="-1"
                                            aria-disabled="true">{{ $item->status->status }}</p>
                                        {{-- <span style="height: 25px;
                                                            width: 25px;
                                                            background-color: #f44c44;
                                                            border-radius: 50%;
                                                            color: white;
                                                            display: inline-block;">
                                                P </span> --}}
                                    </td>
                                    @endif
                                @endif
</td>

                            @if(auth()->user()->role == "1" || auth()->user()->role == "2")
                                @if($item->status->id == "2")
                                <td>
                                    {{-- <p style="color:white;" class="btn btn-warning pe-none"tabindex="-1" aria-disabled="true">{{ $item->status->status }}
                                    </p> --}}
                                    <span style="height: 25px;
                                        width: 25px;
                                        background-color: #ffc404;
                                        border-radius: 50%;
                                        color: white;
                                        display: inline-block;" title='Running'> R </span>
                                </td>
                                @endif
                            @endif

                            @if(auth()->user()->role == "0")
                                    @if($item->status->id == "2")
                                    <td>
                                        <p style="color:white;" class="btn btn-warning pe-none" tabindex="-1"
                                            aria-disabled="true">{{ $item->status->status }}</p>
                                        {{-- <span style="height: 25px;
                                                            width: 25px;
                                                            background-color: #ffc404;
                                                            border-radius: 50%;
                                                            color: white;
                                                            display: inline-block;">
                                                P </span> --}}
                                    </td>
                                    @endif
                                @endif

                            @if(auth()->user()->role == "1" || auth()->user()->role == "2")
                                @if($item->status->id == "3")
                                <td>
                                    {{-- <p style="color:white;" class="btn btn-success pe-none"tabindex="-1" aria-disabled="true">{{ $item->status->status }}
                                    </p> --}}
                                    <span style="height: 25px;
                                        width: 25px;
                                        background-color: #147c4c;
                                        color: white;
                                        border-radius: 50%;
                                        display: inline-block;" title='Finish'> F </span>
                                </td>
                                @endif
                            @endif

                            @if(auth()->user()->role == "0")
                                    @if($item->status->id == "3")
                                    <td>
                                        <p style="color:white;" class="btn btn-success pe-none" tabindex="-1"
                                            aria-disabled="true">{{ $item->status->status }}</p>
                                        {{-- <span style="height: 25px;
                                                            width: 25px;
                                                            background-color: #147c4c;
                                                            border-radius: 50%;
                                                            color: white;
                                                            display: inline-block;">
                                                P </span> --}}
                                    </td>
                                    @endif
                                @endif




                            {{-- <td>
                                    <p>{{ $item->status->status }}</p>
                            </td> --}}
                                <td>
                                    @if(auth()->user()->role == "1" || auth()->user()->role == "2")
                                    <a href="{{ route('portofolio.edit', $item->id) }}" class="btn btn-warning btn-xs btn-flat" data-toggle="tooltip" title='Edit'> <i
                                            class="fas fa-edit"></i></a> <br> &nbsp;
                                    @endif
                            @if(auth()->user()->role == "2")
                                    <form action="{{ route('portofolio.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        {{-- <button class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button> --}}

                                        <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                        @endforeach
                        <!-- end table row -->
                    </tbody>
                </table>
                <!-- end table -->

                <div class="pagination justify-content-center">
                    {{ $portofolio->links() }}
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
