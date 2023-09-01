@extends('layouts.template')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body d-flex justify-content-between">
                    <h5 class="card-title">{{ 'View ' . $pageTitle }}</h5>
                    <a href="{{ url()->previous() }}" type="button" class="btn btn-warning btn-sm"><i
                            class="ni ni-bold-left"></i> Back</a>
                </div>
            </div><br>
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-hover w-100">
                        <tr>
                            <td width="20%">Foto Produk</td>
                            <td><img src="{{ '/storage/images' . $data->image }}"
                                alt="{{ $data->image }}" width="400"></td>
                        </tr>
                        <tr>
                            <td width="20%">Nama Produk</td>
                            <td>{{ $data->name ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="20%">Jumlah</td>
                            <td>{{ number_format($data->qty, 0, ',', '.') ?? '0' }}</td>
                        </tr>
                        <tr>
                            <td width="20%">Harga</td>
                            <td>Rp. {{ number_format($data->price, 0, ',', '.') ?? '0' }}</td>
                        </tr>
                        <tr>
                            <td width="20%">Deskripsi</td>
                            <td>{{ $data->description ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="20%">Alamat</td>
                            <td>{{ $data->address ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="20%">Status</td>
                            <td>{{ $data->status == '1' ? 'Aktif' : 'Tidak Aktif' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
