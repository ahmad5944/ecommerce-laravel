@extends('layouts.template')

@section('content')
    <style>
        .btn-outline-secondary {
            border-color: #ced4da !important;
        }
    </style>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header ">
                    <span id="card_title">
                        <h4 class="card-title">{{ 'List ' . $pageTitle }}</h4>
                    </span>
                    <div class="float-right">
                        {{-- @can('user-create') --}}
                        <a href="{{ route($routePath . '.create') }}"
                            class="btn btn-primary btn-sm float-right font-weight-bolder mr-1"><i
                                data-feather='plus-circle'></i> Tambah Data</a>
                        {{-- @endcan --}}
                    </div>
                </div>
                <hr>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="DataTable" class="table table-striped table-bordered table-hover w-100">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Guard</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->description }}</td>
                                        <td>{{ $data->guard_name }}</td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <button class="btn btn-primary" type="button" data-bs-toggle="dropdown">
                                                    <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"
                                                        data-feather='settings'></i>
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                    <li><a class="dropdown-item font-small-1"
                                                            href="{{ route('permission.show', $data->id) }}"><i
                                                                data-feather='eye' class="font-small-1 mr-1"></i>Show</a>
                                                    </li>
                                                    <li><a class="dropdown-item font-small-1"
                                                            href="{{ route('permission.edit', $data->id) }}"><i
                                                                data-feather='edit' class="font-small-1 mr-1"></i>Edit</a>
                                                    </li>
                                                    <form action="{{ route('permission.destroy', $data->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <li><button type="submit"
                                                                class="dropdown-item font-small-1 btn-delete"><i
                                                                    data-feather='trash-2'
                                                                    class="font-small-1 mr-1"></i>Delete</button></li>
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

        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });

        $('#datepicker2').datepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>
@endsection
