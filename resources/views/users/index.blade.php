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
        <a href="{{ route('users.create') }}" class="btn btn-primary mb-2"> <i class="fas fa-plus"></i> Tambah User</a>
    </center>
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
                    <table class="table striped-table">
                        <thead>
                        <tr style="text-align: center;">
                            <th><h6>ID</h6></th>
                            <th><h6>Name</h6></th>
                            <th><h6>Email</h6></th>
                            <th><h6>Role</h6></th>
                            <th><h6>Action</h6></th>
                        </tr>
                        <!-- end table row-->
                        </thead>
                        <tbody>
                        @foreach($users as $user)
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
                        @endforeach
                        <!-- end table row -->
                        </tbody>
                    </table>
                    <!-- end table -->

                    <div class="pagination justify-content-center">
                        {{ $users->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
