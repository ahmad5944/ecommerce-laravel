@extends('layouts.template')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body d-flex justify-content-between">
                    <h5 class="card-title">{{ 'List ' . $pageTitle }}</h5>
                    <a href="{{ route('product.create') }}"
                        class="btn btn-primary btn-sm float-right font-weight-bolder mr-1"><i class="ni ni-fat-add"></i> Tambah Data</a>
                </div>
            </div><br>
            <div class="card">
                <div class="card-body">
                    <table id="DataTable" class="table table-hover table-border"
                        style="width:100%; background-color: #fafaff ;">
                        <thead class="thead">
                            <tr>
                                <th width="1%">No</th>
                                <th width="5%">Image</th>
                                <th>Nama Produk</th>
                                <th>Stok</th>
                                <th>Harga</th>
                                <th>Status</th>
                                <th width="1%" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center"><img src="{{ '/storage/images' . $data->image }}"
                                            alt="{{ $data->image }}" width="200"></td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ number_format($data->qty, 0, ',', '.') }}</td>
                                    <td>Rp. {{ number_format($data->price, 0, ',', '.') }}</td>
                                    <td>{{ $data->status }}</td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <span class="" data-bs-toggle="dropdown">
                                                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"
                                                    data-feather='settings'></i>
                                            </span>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li><a class="dropdown-item font-small-1"
                                                        href="{{ route('product.show', $data->id) }}"><i data-feather='eye'
                                                            class="font-small-1 mr-1"></i>Show</a>
                                                </li>
                                                <li><a class="dropdown-item font-small-1"
                                                        href="{{ route('product.edit', $data->id) }}"><i data-feather='edit'
                                                            class="font-small-1 mr-1"></i>Edit</a>
                                                </li>
                                                <form action="{{ route('product.destroy', $data->id) }}" method="POST">
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
@endsection

@section('script')
    @include('components.btn-sweet')
    <script>
        $(document).ready(function() {
            $('#DataTable').DataTable({
                "columnDefs": [{
                    "orderable": false,
                    "targets": -1,
                }]
            });
        });
    </script>
@endsection
