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
                <form method="POST" action="{{ route('product.update', $data->id) }}" role="form"
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
                                    <label class="form-label">Nama Produk</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Nama Produk" name="name" value="{{ $data->name }}">
                                    @error('name')
                                        <small class="text-danger"><b>{{ $message }}</b></small>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label">Jumlah</label>
                                    <input type="number" class="form-control @error('qty') is-invalid @enderror"
                                        placeholder="0812xxx" name="qty" value="{{ $data->qty }}">
                                    @error('qty')
                                        <small class="text-danger"><b>{{ $message }}</b></small>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label">Foto Produk</label>
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
                                    <label class="form-label">Harga</label>
                                    <input type="text" class="form-control @error('price') is-invalid @enderror"
                                        name="price" value="{{ $data->price }}">
                                    @error('price')
                                        <small class="text-danger"><b>{{ $message }}</b></small>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label">Deskripsi</label>
                                    <input type="text" class="form-control @error('description') is-invalid @enderror"
                                        name="description" value="{{ $data->description }}">
                                </div>
                                <div class="mb-1">
                                    <label class="form-label">Alamat</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                                        name="address" value="{{ $data->address }}">
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
