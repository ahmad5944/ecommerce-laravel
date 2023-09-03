@extends('layouts.front.template')

@section('content')
    <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-start">
        <div class="col-first">
            <h1 class="text-dark">Edit profile</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    @foreach ($pageBreadcrumbs as $k => $item)
                        <li class="breadcrumb-item text-sm text-dark bold"><a class="text-dark"
                                href="{{ url($item['page']) }}">{{ $item['title'] }}</a></li>
                    @endforeach
                </ol>
            </nav>
        </div>
    </div>
    <form class="row tracking_form" action="{{ route('front.user.update', $data->id) }}" method="POST" role="form"
        enctype="multipart/form-data">
        {{ method_field('PATCH') }}

        @csrf
        <div class="col-md-12 form-group">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                placeholder="Nama Lengkap" value="{{ $data->name }}">
            @error('name')
                <small class="text-danger"><b>{{ $message }}</b></small>
            @enderror
        </div>
        <div class="col-md-12 form-group">
            <label class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                placeholder="Email" value="{{ $data->email }}">
            @error('email')
                <small class="text-danger"><b>{{ $message }}</b></small>
            @enderror
        </div>
        <div class="col-md-12 form-group">
            <label class="form-label">No HP</label>
            <input type="number" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp"
                placeholder="No HP" value="{{ $data->no_telp }}">
            @error('no_telp')
                <small class="text-danger"><b>{{ $message }}</b></small>
            @enderror
        </div>
        <div class="col-md-12 form-group">
            <label class="form-label">Foto Profile</label><br>
            <img class="mb-2" src="{{ '/storage/images/' . $data->image }}" alt="{{ $data->image }}" width="300">
            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                placeholder="Nama Lengkap" value="{{ $data->image }}">
            @error('image')
                <small class="text-danger"><b>{{ $message }}</b></small>
            @enderror
        </div>
        <div class="col-md-12 form-group">
            <label class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                placeholder="***********">
            <small class="text-danger">Jika tidak ingin mengganti password harap kosongkan data</small>
        </div>
        <div class="col-md-12 form-group">
            <button type="submit" value="submit" class="primary-btn">Submit</button>
        </div>
    </form>
@endsection
