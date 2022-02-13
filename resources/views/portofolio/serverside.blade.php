@extends('layouts.app')

@section('content')
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
                    <table class="table table-striped" id="table-striped">
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
