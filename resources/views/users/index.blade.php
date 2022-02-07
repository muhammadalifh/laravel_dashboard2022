@extends('layouts.app')

@section('content')
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ __('Users') }}</h2>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- ========== title-wrapper end ========== -->
    <a href="{{ route('users.create') }}" class="btn btn-primary mb-2"> <i class="fas fa-plus"></i> Create User</a>
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
                        <tr>
                            <th><h6>ID</h6></th>
                            <th><h6>Name</h6></th>
                            <th><h6>Email</h6></th>
                            <th><h6>Action</h6></th>
                        </tr>
                        <!-- end table row-->
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
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
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm"> <i class="fas fa-edit"></i> Edit</a>
                                <form class="d-inline" action="{{ route('users.destroy', $user->id) }}" method="POST">
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

                    {{ $users->links() }}
                </div>

            </div>
        </div>
    </div>

@endsection
