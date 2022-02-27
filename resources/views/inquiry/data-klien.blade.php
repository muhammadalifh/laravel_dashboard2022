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
            font-size: 14px;
        }
        .table.dataTable td, table.dataTable th {
            font-size: 14px;
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
        <div class="card-styles">
        <div class="card-style-3 mb-30">
            <div class="col-md-12">
                <h4 class="text-center">Database Klien Inquiry</h4>
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
                    <table class="table table-sm table-striped" id="table-inquiry">
                        <thead>
                        <tr style="text-align: center;">
                            <th><h6>Perusahaan/<br> Instansi</h6></th>
                            <th><h6>Alamat</h6></th>
                            <th><h6>Nama</h6></th>
                            <th><h6>No. Telp/HP</h6></th>
                            <th><h6>Email</h6></th>
                            <th><h6>Jenis Kegiatan</h6></th>
                            <th><h6>Lokasi Kegiatan</h6></th>
                            <th><h6>Sumber Air Limbah</h6></th>
                            <th><h6>Debit Air Limbah <br> (m3/hari)</h6></th>
                            <th><h6>Luas Lahan Rencana IPAL (m2)</h6></th>
                            <th><h6>Penggunaan Air Bersih <br> (m3/bulan)</h6></th>
                            <th><h6>Jumlah Karyawan</h6></th>
                            <th><h6>Jumlah Tamu/ <br> Pengunjung/Bed</h6></th>
                            <th><h6>Upload Data</h6></th>
                            <th><h6>Ketrangan Tambahan</h6></th>
                        </tr>
                        <!-- end table row-->
                        </thead>
                        <tbody style="text-align: center;">








                        {{-- @foreach($users as $user)
                            <tr style="text-align: center;">
                                <td>
                                    <p>{{ $user->id }}</p>
                                </td>
                                <td>
                                    <p>{{ $user->name }}</p>
                                </td>
                                <td>
                                    <p>{{ $user->email }}</p>
                                </td>
                                <td>
                                    <p>{{ $user->role }}</p>
                                </td>
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-xs btn-flat" data-toggle="tooltip" title='Edit'> <i
                                        class="fas fa-edit"></i></a>
                                <form class="d-inline" action="{{ route('users.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'><i class="fas fa-trash"></i></button>
                                </form>
                                </td>
                            </tr>
                        @endforeach --}}
                        <!-- end table row -->
                        </tbody>
                    </table>
                    <!-- end table -->

                    {{-- <div class="pagination justify-content-center">
                        {{ $users->links() }}
                    </div> --}}
                </div>

            </div>
        </div>
    </div>

@endsection
