@extends('layouts.template')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span id="card_title">
                        <h4 class="m-0">{{ __('View Permission') }}</h4>
                    </span>
                    <div class="float-right">
                        <a href="{{ route('permission.index') }}" class="btn btn-warning btn-sm float-right font-weight-bolder">
                            <i data-feather='corner-down-left'></i> Back
                        </a>
                    </div>
                </div>
                <hr>
                <div class="card-body">
                    <table class="table table-bordered table-hover w-100">
                        <tr>
                            <td width="20%">Nama</td>
                            <td>{{ $data->name ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="20%">Deskripsi</td>
                            <td>{{ $data->description ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="20%">Guard</td>
                            <td>{{ $data->guard ?? '-' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
