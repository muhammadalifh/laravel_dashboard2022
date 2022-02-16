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
    <center>
        <button type="button" data-bs-toggle="modal" id="tambah" data-bs-target="#exampleModal" class="btn btn-outline-info"> <i class="fas fa-user-plus"></i> Tambah
            User</button>
    </center> &nbsp;
        <div class="card-styles">
        <div class="card-style-3 mb-30">
            <div class="col-md-12">
                <h4 class="text-center">Database User</h4>
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
                    <table class="table table-striped" id="table-index-user">
                        <thead>
                        <tr style="text-align: center;">
                            <th><h6>Name</h6></th>
                            <th><h6>Email</h6></th>
                            <th><h6>Role</h6></th>
                            <th><h6>Action</h6></th>
                        </tr>
                        <!-- end table row-->
                        </thead>
                        <tbody>


                            <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Form Tambah User Baru</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Nama Lengkap</label>
                                        <input required type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Lengkap" autocomplete="off" >
                                        <input type="hidden" id="id" name="id">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" autocomplete="off" >
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Role</label>
                                        <input required
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            maxlength = "1" autocomplete="off"  type="number" name="role" class="form-control" id="role" cols="30" rows="5" list="role-user">
                                    </div>
                                    <datalist id="role-user">
                                            <option value="0"></option>
                                            <option value="1"></option>
                                            <option value="2"></option>
                                    </datalist>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Password</label>
                                        <input required type="password" name="password" class="form-control" id="password" cols="30" rows="5" autocomplete="off" >
                                    </div>
                                    {{-- <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Password Confirmation</label>
                                        <input required type="password" name="password_conf" class="form-control" id="password_conf" cols="30" rows="5"></input>
                                    </div> --}}

                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="tutup" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" id="simpan" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>








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
