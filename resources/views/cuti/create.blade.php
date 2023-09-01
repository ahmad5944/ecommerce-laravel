@extends('layouts.template')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ 'Tambah ' . $pageTitle }}</h4>
                </div>
                <hr>
                <form method="POST" action="{{ route('cuti.store') }}" role="form" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        @if ($errors->count() > 0)
                            {{-- @dd($errors) --}}
                            <div class="alert alert-danger p-2" role="alert">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}<br />
                                @endforeach
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="form-label">Pegawai</label>
                                    <select class="form-select" id="select2" data-select2-id="select2-basic" name="pegawai_id">
                                        <option value="">--Pilih karyawan--</option>
                                        @foreach ($karyawan as $key => $value)
                                            <option value="{{ $value->id }}">{{ $value->nama_depan  }} {{ $value->nama_depan }} - {{ $value->email }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-1">
                                    <label class="form-label">Alasan</label>
                                    <input type="text" class="form-control @error('alasan') is-invalid @enderror"
                                        placeholder="Alasan cuti" name="alasan">
                                    @error('alasan')
                                        <small class="text-danger"><b>{{ $message }}</b></small>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label">Tanggal Cuti</label>
                                    <input type="date" class="form-control @error('tanggal_cuti') is-invalid @enderror" name="tanggal_cuti">
                                    @error('tanggal_cuti')
                                        <small class="text-danger"><b>{{ $message }}</b></small>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label">Selesai Cuti</label>
                                    <input type="date" class="form-control @error('selesai_cuti') is-invalid @enderror" name="selesai_cuti">
                                    @error('selesai_cuti')
                                        <small class="text-danger"><b>{{ $message }}</b></small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit"
                                class="btn btn-dark me-1 waves-effect waves-float waves-light btn-sm font-small-2">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
