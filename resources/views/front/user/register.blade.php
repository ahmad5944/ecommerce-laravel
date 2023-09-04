@extends('layouts.front.template')

@section('content')
    <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-start">
        <div class="col-first">
            <h1 class="text-dark">Register</h1>
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
    <form class="row tracking_form" action="{{ route('front.store') }}" method="POST" role="form"
        enctype="multipart/form-data">
        @csrf
        <div class="col-md-12 form-group">
            @if ($errors->count() > 0)
                {{-- @dd($errors) --}}
                <div class="alert alert-danger p-2" role="alert">
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br />
                    @endforeach
                </div>
            @endif
        </div>

        <div class="col-md-12 form-group">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control @error('name') is-invalid text-danger @enderror" name="name"
                placeholder="Nama Lengkap">
            @error('name')
                <small class="text-danger"><b>{{ $message }}</b></small>
            @enderror
        </div>
        <div class="col-md-12 form-group">
            <label class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid text-danger @enderror" name="email"
                placeholder="Email">
            @error('email')
                <small class="text-danger"><b>{{ $message }}</b></small>
            @enderror
        </div>
        <div class="col-md-12 form-group">
            <label class="form-label">No HP</label>
            <input type="number" class="form-control @error('no_telp') is-invalid text-danger @enderror" name="no_telp"
                placeholder="No HP">
            @error('no_telp')
                <small class="text-danger"><b>{{ $message }}</b></small>
            @enderror
        </div>
        <div class="col-md-12 form-group">
            <label class="form-label">Foto Profile</label><br>
            <img class="mb-2" src="{{ '/storage/images/' . $data->image }}" alt="{{ $data->image }}" width="300">
            <input type="file" class="form-control @error('image') is-invalid text-danger @enderror" name="image"
                placeholder="Nama Lengkap">
            @error('image')
                <small class="text-danger"><b>{{ $message }}</b></small>
            @enderror
        </div>
        <div class="col-md-12 form-group">
            <label class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid text-danger @enderror" name="password"
                placeholder="***********">
            <input type="hidden" name="role">
        </div>
        <div class="col-md-12 form-group" style="margin-bottom: 100px;">
            <button type="submit" value="submit" class="primary-btn">Submit</button>
        </div>
    </form>
@endsection
