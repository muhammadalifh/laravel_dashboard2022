@extends('layouts.app')

@section('content')
<!-- ========== title-wrapper start ========== -->
<style>
    .link {
        color: blue;
        cursor: pointer;
    }

    .link:hover {
        text-decoration: underline;
    }

    .hidden {
        display: none;
    }

    .dataTables_length {
        padding-left: 10px;
        padding-top: 15px;
    }

    .dataTables_filter {
        padding-right: 10px;
        padding-top: 15px;
    }

    .dataTables_info {
        padding-left: 10px;
        padding-bottom: 15px;
    }

    .dataTables_paginate {
        padding-right: 10px;
        padding-bottom: 15px;
    }

    .table tbody tr:first-child>* {
        font-size: 13px;
    }
    .table.dataTable td, table.dataTable th {
        font-size: 13px;
    }
    .table > :not(:first-child) {
        text-align: center;
    }
    </style>
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
    <a target="_blank" href="{{ route('portofolio.cetak') }}" class="btn btn-outline-dark mb-2"> <i
            class="fas fa-print"></i></i></i> Cetak Laporan</a> &nbsp;&nbsp;&nbsp;
    @if(auth()->user()->role == "1" || auth()->user()->role == "2")
    <button type="button" data-bs-toggle="modal" id="tambah" data-bs-target="#exampleModal" class="btn btn-outline-primary mb-2"> <i class="fas fa-plus"></i> Tambah
        Portofolio</button>
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
                <table class="table table-striped" id="table-index-portofolio">
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
                    <tbody style="text-align: center;">

                        <!-- Modal -->
                        {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Portofolio</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="card-body">
                                <div class="row">
                                    <div class="modal-body">
                                    @csrf
                                    <div class="col-md-12">
                                        <label for="exampleFormControlInput1" class="form-label">{{ __('Klien') }}</label>
                                        <select required name="klien_id" id="klien_id" class="form-control select2">
                                            <option disabled value selected>Pilih Klien</option>
                                            <option value="1">SWASTA</option>
                                            <option value="2">PEMERINTAH</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="exampleFormControlInput1" class="form-label">Perusahaan</label>
                                        <input required type="text" class="form-control" id="perusahaan"  name="perusahaan" placeholder="Masukkan Nama Perusahaan">
                                        <input type="hidden" id="id" name="id">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="exampleFormControlInput1" class="form-label">Tahun</label>
                                        <input required
                                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                type = "number" maxlength = "4" class="form-control" id="tahun"  name="tahun" placeholder="Masukkan Tahun"
                                                list="tahun-list" autocomplete="off">
                                        <datalist id="tahun-list">
                                            <option value="1990"></option>
                                            <option value="1991"></option>
                                            <option value="1992"></option>
                                            <option value="1993"></option>
                                            <option value="1994"></option>
                                            <option value="1995"></option>
                                            <option value="1996"></option>
                                            <option value="1997"></option>
                                            <option value="1998"></option>
                                            <option value="1999"></option>
                                            <option value="2000"></option>
                                            <option value="2001"></option>
                                            <option value="2002"></option>
                                            <option value="2003"></option>
                                            <option value="2004"></option>
                                            <option value="2005"></option>
                                            <option value="2006"></option>
                                            <option value="2007"></option>
                                            <option value="2008"></option>
                                            <option value="2009"></option>
                                            <option value="2010"></option>
                                            <option value="2011"></option>
                                            <option value="2012"></option>
                                            <option value="2013"></option>
                                            <option value="2014"></option>
                                            <option value="2015"></option>
                                            <option value="2016"></option>
                                            <option value="2017"></option>
                                            <option value="2018"></option>
                                            <option value="2019"></option>
                                            <option value="2020"></option>
                                            <option value="2021"></option>
                                            <option value="2022"></option>
                                            <option value="2023"></option>
                                            <option value="2024"></option>
                                            <option value="2025"></option>
                                            <option value="2026"></option>
                                            <option value="2027"></option>
                                            <option value="2028"></option>
                                            <option value="2029"></option>
                                            <option value="2030"></option>
                                            <option value="2031"></option>
                                            <option value="2032"></option>
                                            <option value="2033"></option>
                                            <option value="2034"></option>
                                            <option value="2035"></option>
                                            <option value="2036"></option>
                                            <option value="2037"></option>
                                            <option value="2038"></option>
                                            <option value="2039"></option>
                                            <option value="2040"></option>
                                            <option value="2041"></option>
                                            <option value="2042"></option>
                                            <option value="2043"></option>
                                            <option value="2044"></option>
                                            <option value="2045"></option>
                                            <option value="2046"></option>
                                            <option value="2047"></option>
                                            <option value="2048"></option>
                                            <option value="2049"></option>
                                            <option value="2050"></option>
                                        </datalist>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="exampleFormControlInput1" class="form-label">{{ __('Jenis') }}</label>
                                        <select required name="jenis_id" id="jenis_id" class="form-control select2">
                                            <option disabled value selected>Pilih Jenis</option>
                                            <option value="1">IPAL DOMESTIK</option>
                                            <option value="2">IPAL INDUSTRI</option>
                                            <option value="3">IPAL KLINIK/RS</option>
                                            <option value="4">IPAL LABORATORIUM</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="exampleFormControlInput1" class="form-label">Kapasitas</label>
                                        <input required type = "number" class="form-control" id="kapasitas" autocomplete="off" name="kapasitas" placeholder="Jika ada koma gunakan titik misal (1.5)">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="exampleFormControlInput1" class="form-label">{{ __('Teknologi') }}</label>
                                        <select required name="teknologi_id" id="teknologi_id" class="form-control select2">
                                            <option disabled value selected>Pilih Teknologi</option>
                                            <option value="1">ANAEROB</option>
                                            <option value="2">AEROB</option>
                                            <option value="3">ANAEROB+AEROB</option>
                                            <option value="4">WETLAND</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="exampleFormControlInput1" class="form-label">Nilai Kontrak</label>
                                        <input required type = "text" class="form-control" id="nilai_kontrak"  name="nilai_kontrak" placeholder="Masukkan Nilai Kontrak">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="exampleFormControlInput1" class="form-label">{{ __('Status') }}</label>
                                        <select required name="status_id" id="status_id" class="form-control select2">
                                            <option disabled value selected>Pilih Status</option>
                                            <option value="1">PENAWARAN</option>
                                            <option value="2">RUNNING</option>
                                            <option value="3">FINISH</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                                <div class="modal-footer">
                                <button type="button" name="tutup" id="tutup" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="button" name="simpan" id="simpan" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                            </div>
                        </div>



                        {{-- @foreach($portofolio as $item)
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
                            </td> --}}

                            {{-- @if(auth()->user()->role == "1" || auth()->user()->role == "2")
                                @if($item->status->id == "1")
                                <td> --}}
                                    {{-- <p style="color:white;" class="btn btn-warning pe-none"tabindex="-1" aria-disabled="true">{{ $item->status->status }}
                                    </p> --}}
                                    {{-- <span style="height: 25px;
                                        width: 25px;
                                        background-color: #f44c44;
                                        border-radius: 50%;
                                        color: white;
                                        display: inline-block;" title='Penawaran'> P </span> --}}
                                {{-- </td>
                                @endif
                            @endif --}}

                                {{-- @if(auth()->user()->role == "0")
                                    @if($item->status->id == "1")
                                    <td>
                                        <p style="color:white;" class="btn btn-danger pe-none" tabindex="-1"
                                            aria-disabled="true">{{ $item->status->status }}</p> --}}
                                        {{-- <span style="height: 25px;
                                                            width: 25px;
                                                            background-color: #f44c44;
                                                            border-radius: 50%;
                                                            color: white;
                                                            display: inline-block;">
                                                P </span> --}}
                                    {{-- </td>
                                    @endif
                                @endif --}}

                            {{-- @if(auth()->user()->role == "1" || auth()->user()->role == "2")
                                @if($item->status->id == "2")
                                <td> --}}
                                    {{-- <p style="color:white;" class="btn btn-warning pe-none"tabindex="-1" aria-disabled="true">{{ $item->status->status }}
                                    </p> --}}
                                    {{-- <span style="height: 25px;
                                        width: 25px;
                                        background-color: #ffc404;
                                        border-radius: 50%;
                                        color: white;
                                        display: inline-block;" title='Running'> R </span> --}}
                                {{-- </td>
                                @endif
                            @endif --}}

                            {{-- @if(auth()->user()->role == "0")
                                    @if($item->status->id == "2")
                                    <td>
                                        <p style="color:white;" class="btn btn-warning pe-none" tabindex="-1"
                                            aria-disabled="true">{{ $item->status->status }}</p> --}}
                                        {{-- <span style="height: 25px;
                                                            width: 25px;
                                                            background-color: #ffc404;
                                                            border-radius: 50%;
                                                            color: white;
                                                            display: inline-block;">
                                                P </span> --}}
                                    {{-- </td>
                                    @endif
                                @endif --}}
{{--
                            @if(auth()->user()->role == "1" || auth()->user()->role == "2")
                                @if($item->status->id == "3")
                                <td> --}}
                                    {{-- <p style="color:white;" class="btn btn-success pe-none"tabindex="-1" aria-disabled="true">{{ $item->status->status }}
                                    </p> --}}
                                    {{-- <span style="height: 25px;
                                        width: 25px;
                                        background-color: #147c4c;
                                        color: white;
                                        border-radius: 50%;
                                        display: inline-block;" title='Finish'> F </span> --}}
                                {{-- </td>
                                @endif
                            @endif --}}

                            {{-- @if(auth()->user()->role == "0")
                                    @if($item->status->id == "3") --}}
                                    {{-- <td>
                                        <p style="color:white;" class="btn btn-success pe-none" tabindex="-1"
                                            aria-disabled="true">{{ $item->status->status }}</p>
                                        {{-- <span style="height: 25px;
                                                            width: 25px;
                                                            background-color: #147c4c;
                                                            border-radius: 50%;
                                                            color: white;
                                                            display: inline-block;">
                                                P </span> --}}
                                    {{-- </td> --}}
                                    {{-- @endif
                                @endif --}}




                            {{-- <td>
                                    <p>{{ $item->status->status }}</p>
                            </td> --}}
                                {{-- <td>
                                    @if(auth()->user()->role == "1" || auth()->user()->role == "2")
                                    <a href="{{ route('portofolio.edit', $item->id) }}" class="btn btn-warning btn-xs btn-flat" data-toggle="tooltip" title='Edit'> <i
                                            class="fas fa-edit"></i></a> <br> &nbsp;
                                    @endif --}}
                            {{-- @if(auth()->user()->role == "2")
                                    <form action="{{ route('portofolio.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE') --}}
                                        {{-- <button class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button> --}}

                                        {{-- <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'><i class="fas fa-trash"></i></button> --}}
                                    </form>
                                </td>
                            {{-- @endif --}}
                        </tr>
                        {{-- @endforeach --}}
                        <!-- end table row -->
                    </tbody>
                </table>
                <!-- end table -->

                {{-- <div class="pagination justify-content-center">
                    {{ $portofolio->links() }}
                </div> --}}

            </div>

        </div>
    </div>
</div>
@endsection
