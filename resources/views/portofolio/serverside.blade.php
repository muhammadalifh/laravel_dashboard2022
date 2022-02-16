@extends('layouts.app')

@section('content')
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
    .divider{
        width: 100%;
        height: 1px;
        background-color: #BBB;
        margin: 1rem 0;
    }
    </style>
<!-- ========== title-wrapper start ========== -->
<script type="text/javascript" src="{{ asset('js/server.js') }}"></script>
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
<div class="card-style-3 mb-30">
<div class="card-body">
    <div class="row">
        <div class="col-md-12">
            <h4 class="text-center">Filter Database Pekerjaan</h4>
        </div>
        <br><br>



        {{-- <div class="col-md-6">
            <label for="">Perusahaan</label>
                <input required id="perusahaan" type="text" onchange="filter()" class=" form-control @error('perusahaan') is-invalid @enderror" name="perusahaan" value="{{ old('perusahaan') }}" required autocomplete="perusahaan" autofocus>

                @error('perusahaan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="col-md-6">
            <label for="">Tahun</label>
                <input required id="tahun" onchange="filter()" type="text" class=" form-control @error('tahun') is-invalid @enderror" name="tahun" value="{{ old('tahun') }}" required autocomplete="tahun">

                @error('tahun')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>


        <div class="col-md-6">
            <label for="">Klien</label>
            <select required name="klien_id" id="klien_id" class="form-control select2" onchange="filter()">
                <option disabled value selected>Pilih Klien</option>
                @foreach ($klien_create as $item)
                        <option value="{{ $item->id }}">{{ $item->klien }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6">
            <label for="">Jenis</label>
            <select required name="jenis_id" id="jenis_id" class="form-control select2" onchange="filter()">
                <option disabled value selected>Pilih Jenis</option>
                @foreach ($jenis_create as $item)
                        <option value="{{ $item->id }}">{{ $item->jenis }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-12">
            <label for="">Status</label>
            <select required name="status_id" id="status_id" class="form-control select2" onchange="filter()">
                <option disabled value selected>Pilih Status</option>
                @foreach ($status_create as $item)
                        <option value="{{ $item->id }}">{{ $item->status }}</option>
                @endforeach
            </select>
        </div> --}}



    </div>
    <br>
    {{-- <div class="dropdown-divider"></div> --}}
    <div class="card-styles">

            <div class="card-content">

                {{-- <div class="alert-box primary-alert">
                        <div class="alert">
                            <p class="text-medium">
                                Sample table page
                            </p>
                        </div>
                    </div> --}}

                <div class="table-wrapper table-responsive">
                    <table class="table table-striped" id="table-server">
                        <div class="row" id="row-server">
                            <div class="col-md-3">
                                <label for="klien">Klien</label>
                                    <select id="filter-klien" class="form-control">
                                        <option disabled value selected>Pilih Klien</option>
                                        <option value="1">SWASTA</option>
                                        <option value="2">PEMERINTAH</option>
                                    </select>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="jenis">Jenis</label>
                                    <select id="filter-jenis" class="form-control">
                                        <option disabled value selected>Pilih Jenis</option>
                                        <option value="1">IPAL DOMESTIK</option>
                                        <option value="2">IPAL INDUSTRI</option>
                                        <option value="3">IPAL KLINIK/RS</option>
                                        <option value="4">IPAL LABORATORIUM</option>
                                    </select>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="teknologi">Teknologi</label>
                                    <select id="filter-teknologi" class="form-control">
                                        <option disabled value selected>Pilih Teknologi</option>
                                        <option value="1">ANAEROB</option>
                                        <option value="2">AEROB</option>
                                        <option value="3">ANAEROB+AEROB</option>
                                        <option value="4">WETLAND</option>
                                    </select>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="status">Status</label>
                                    <select id="filter-status" class="form-control">
                                        <option disabled value selected>Pilih Status</option>
                                        <option value="1">PENAWARAN</option>
                                        <option value="2">RUNNING</option>
                                        <option value="3">FINISH</option>
                                    </select>
                                </select>
                            </div>

                            {{-- <div class="col-md-6">
                                <label for="perusahaan">Perusahaan</label>
                                <input type="text" class="form-control" id="filter-perusahaan"  name="perusahaan" placeholder="Masukkan Nama Perusahaan">
                            </div>

                            <div class="col-md-6">
                                <label for="tahun">Tahun</label>
                                <input type="text" class="form-control" id="filter-tahun"  name="tahun" placeholder="Masukkan tahun">
                            </div> --}}

                            <br><br><br><br>
                            <center>
                                <button type="button" name="reset" id="reset" class="btn btn-primary btn-sm">Reset</button>
                            </center>


                        </div>

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
                                    <h6>Teknologi</h6>
                                </th>
                                <th>
                                    <h6>Nilai <br> Kontrak</h6>
                                </th>
                                <th>
                                    <h6>Status</h6>
                                </th>

                            </tr>
                            <!-- end table row-->
                        </thead>
                        <tbody>

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
</div>

@endsection
