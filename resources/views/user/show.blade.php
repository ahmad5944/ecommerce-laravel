@extends('layouts.template')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('View User') }}</h4>
                <div class="float-right">
                    <a href="{{ route('user.index') }}" class="btn btn-secondary btn-sm float-right font-weight-bolder font-small-2">
                        <i data-feather='corner-down-left' class="font-small-2"></i> Back
                    </a>
                </div>
            </div>
            <hr>
            <div class="card-body">
                <table class="table table-bordered table-hover w-100">
                    <tr>
                        <td width="20%">Nama Depan</td>
                        <td>{{ $data->nama_depan ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td width="20%">Nama Belakang</td>
                        <td>{{ $data->nama_belakang ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td width="20%">Email</td>
                        <td>{{ $data->email ?? '-' }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
