@extends('layouts.app')

@section('content')
<br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Buat Portofolio') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('portofolio.store') }}">

                        <div class="row mb-3">
                            <label for="klien" class="col-md-4 col-form-label text-md-end">{{ __('Klien') }}</label>
                            <div class="col-md-6">
                                <select required name="klien_id" id="klien_id" class="form-control select2">
                                    <option disabled value selected>Pilih Klien</option>
                                    @foreach ($klien_create as $item)
                                            <option value="{{ $item->id }}">{{ $item->klien }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="perusahaan" class="col-md-4 col-form-label text-md-end">{{ __('Perusahaan') }}</label>

                            <div class="col-md-6">
                                <input required id="perusahaan" type="text" class="form-control @error('perusahaan') is-invalid @enderror" name="perusahaan" value="{{ old('perusahaan') }}" required autocomplete="perusahaan" autofocus>

                                @error('perusahaan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tahun" class="col-md-4 col-form-label text-md-end">{{ __('Tahun') }}</label>

                            <div class="col-md-6">
                                <input required id="tahun" type="text" class="form-control @error('tahun') is-invalid @enderror" name="tahun" value="{{ old('tahun') }}" required autocomplete="tahun">

                                @error('tahun')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="jenis" class="col-md-4 col-form-label text-md-end">{{ __('Jenis (Project)') }}</label>
                            <div class="col-md-6">
                                <select required name="jenis_id" id="jenis_id" class="form-control select2">
                                    <option disabled value selected>Pilih Jenis</option>
                                    @foreach ($jenis_create as $item)
                                            <option value="{{ $item->id }}">{{ $item->jenis }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="kapasitas" class="col-md-4 col-form-label text-md-end">{{ __('Kapasitas (m3/hari)') }}</label>
                            <div class="col-md-6">
                                <input required id="kapasitas" type="text" class="form-control @error('kapasitas') is-invalid @enderror" name="kapasitas" required autocomplete="kapasitas">
                                @error('kapasitas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="teknologi" class="col-md-4 col-form-label text-md-end">{{ __('Teknologi') }}</label>
                            <div class="col-md-6">
                                <select required name="teknologi_id" id="teknologi_id" class="form-control select2">
                                    <option disabled value selected>Pilih Teknologi</option>
                                    @foreach ($teknologi_create as $item)
                                            <option value="{{ $item->id }}">{{ $item->teknologi }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nilai_kontrak" class="col-md-4 col-form-label text-md-end">{{ __('Nilai Kontrak') }}</label>
                            <div class="col-md-6">
                                <input required id="nilai_kontrak" type="text" class="form-control" name="nilai_kontrak" required autocomplete="nilai_kontrak">
                                @error('nilai_kontrak')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="status" class="col-md-4 col-form-label text-md-end">{{ __('Status') }}</label>
                            <div class="col-md-6">
                                <select required name="status_id" id="status_id" class="form-control select2">
                                    <option disabled value selected>Pilih Status</option>
                                    @foreach ($status_create as $item)
                                            <option value="{{ $item->id }}">{{ $item->status }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
