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
                            <td width="20%">Nama</td>
                            <td>{{ $data->name ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="20%">No Hp</td>
                            <td>{{ $data->no_telp ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="20%">Email</td>
                            <td>{{ $data->email ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="20%">Status</td>
                            <td>{{ $data->status == '1' ? 'Aktif' : 'Tidak Aktif' }}</td>
                        </tr>
                        <tr>
                            <td width="20%">Role</td>
                            <td>{{ $data->role ?? '-' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
