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
    <!-- Button trigger modal -->
    <center>
        <a target="_blank" href="{{ route('exportpegawai') }}" class="btn btn-success mb-2"> <i class="fas fa-file-export"></i> Export Excel</a> &nbsp;&nbsp;&nbsp;
        {{-- <a href="#" class="btn btn-info mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i class="fas fa-upload"></i> Import Excel</a> &nbsp;&nbsp;&nbsp; --}}
        <a href="{{ route('users.pegawai.create') }}" class="btn btn-primary mb-2"> <i class="fas fa-plus"></i> Tambah Pegawai</a>
    </center>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Import File Excel</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('importpegawai') }}" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="file" name="file" required="required">
                    </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Import</button>
            </div>
        </div>
    </form>
        </div>
    </div>


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
                            <th><h6>Nama</h6></th>
                            <th><h6>Alamat</h6></th>
                            <th><h6>Tanggal Lahir</h6></th>
                            <th><h6>No. Telepon</h6></th>
                            <th><h6>Action</h6></th>
                        </tr>
                        <!-- end table row-->
                        </thead>
                        <tbody>
                        @foreach($pegawai as $item)
                            <tr style="text-align: center;">
                                <td>
                                    <p>{{ $item->nama }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->alamat }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->tgl_lahir }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->no_telp }}</p>
                                </td>
                                <td>
                                    <a href="{{ route('users.pegawai.edit', $item->id) }}" class="btn btn-warning btn-sm"> <i class="fas fa-edit"></i> Edit</a>
                                <form class="d-inline" action="{{ route('users.pegawai.destroy', $item->id) }}" method="POST">
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

                    {{ $pegawai->links() }}
                </div>

            </div>
        </div>
    </div>

@endsection
