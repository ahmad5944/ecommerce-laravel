@extends('layouts.template')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header ">
                    <span id="card_title">
                        <h4 class="card-title">{{ 'List ' . $pageTitle }}</h4>
                    </span>
                    <div class="float-right">
                    <a href="{{ route('role.create') }}" class="btn btn-primary btn-sm float-right font-weight-bolder mr-1 font-small-2"><i class="font-small-2" data-feather='plus-circle'></i> Tambah Data</a>
                    </div>
                </div><hr>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="DataTable" class="table table-striped table-bordered table-hover w-100">
                            <thead class="thead">
                                <tr>
                                    <th width='1%'>No</th>
                                    <th>Name</th>
                                    <th width='1%' class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $data)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <button class="btn btn-primary" type="button" data-bs-toggle="dropdown">
                                                    <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer" data-feather='settings'></i>
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                    <li><a class="dropdown-item font-small-1" href="{{ route('role.edit', $data->id) }}">Configuration</a></li>
                                                    <form action="{{ route('role.destroy', $data->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <li><button type="submit" class="dropdown-item font-small-1 btn-delete"><i data-feather='trash-2' class="font-small-1 mr-1"></i>Delete</button></li>
                                                    </form>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@include('components.btn-sweet')
    <script>
        $(document).ready(function() {
            $('#DataTable').DataTable({
                "columnDefs": [{
                    "orderable": false,
                    "targets": -1
                }]
            });
        });
    </script>
@endsection
