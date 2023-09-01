@extends('layouts.template')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body d-flex justify-content-between">
                    <h5 class="card-title">{{ 'Edit ' . $pageTitle }}</h5>
                    <a href="{{ url()->previous() }}" type="button" class="btn btn-warning btn-sm"><i
                            class="ni ni-bold-left"></i> Back</a>
                </div>
            </div><br>
            <div class="card">
                <form method="POST" action="{{ route('user.update', $data->id) }}" role="form"
                    enctype="multipart/form-data">
                    {{ method_field('PATCH') }}
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
                            <div class="col-md-6 col-6">
                                <div class="mb-1">
                                    <label class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Nama Lengkap" name="name" value="{{ $data->name }}">
                                    @error('name')
                                        <small class="text-danger"><b>{{ $message }}</b></small>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label">No HP</label>
                                    <input type="number" class="form-control @error('no_telp') is-invalid @enderror"
                                        placeholder="0812xxx" name="no_telp" value="{{ $data->no_telp }}">
                                    @error('no_telp')
                                        <small class="text-danger"><b>{{ $message }}</b></small>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label">Role</label>
                                    <select class="form-select" name="role" id="">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}"
                                                {{ $role->name == $data->role ? 'selected' : '' }}>{{ $role->name }}
                                            </option>
                                            {{-- <input type="text" class="form-control" placeholder="Role" name="role" value="{{ $data->role }}"> --}}
                                        @endforeach
                                    </select>
                                    @error('role')
                                        <small class="text-danger"><b>{{ $message }}</b></small>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label">Foto</label>
                                    <div>
                                        <img src="{{ '/storage/images/' . $data->image }}" alt="{{ $data->image }}"
                                            width="300">
                                        <input type="file" class="form-control mt-1" placeholder="Image" name="image"
                                            value="{{ $data->image }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-6">
                                <div class="mb-1">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        placeholder="test@gmail.com" name="email" value="{{ $data->email }}">
                                    @error('email')
                                        <small class="text-danger"><b>{{ $message }}</b></small>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        name="password" placeholder="******" autocomplete="current-password">
                                    <small class="text-primary">Jika tidak ingin mengganti password harap kosongkan
                                        data</small>
                                </div>
                                <div class="mb-1">
                                    <label class="form-label">Status</label>
                                    <div class="demo-inline-spacing">
                                        <div class="form-check form-check-danger small">
                                            <input class="form-check-input" type="radio" name="status" id="inlineRadio1"
                                                value="1" {{ $data->status == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="inlineRadio1">Aktif</label>
                                        </div>
                                        <div class="form-check form-check-danger small">
                                            <input class="form-check-input" type="radio" name="status" id="inlineRadio2"
                                                value="0" {{ $data->status == 0 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="inlineRadio2">Tidak Aktif</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="col-12">
                            <button type="submit"
                                class="btn btn-primary me-1 waves-effect waves-float waves-light btn-sm font-small-2">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
