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
                <div class="card-body d-flex justify-content-start mb-3">
                    <table style="width:20%;">
                        <tr>
                            <th>No Invoice</th>
                            <td>: {{ $invoice->no_invoice }}</td>
                        </tr>
                        <tr>
                            <th>User / Customer</th>
                            <td>: {{ $invoice['user']['name'] }}</td>
                        </tr>
                    </table>
                </div>
                <div class="card-body d-flex justify-content-center">
                    <table class="table" style="width:100%;">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th width="30%">Nama Produk</th>
                                <th>Foto Produk</th>
                                <th>Qty</th>
                                <th width="30%">Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalPrice = 0;
                            @endphp
                            @foreach ($datas as $data)
                                @php
                                    $totalPrice += $data['product']['price'];
                                @endphp
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $data['product']['name'] }}</td>
                                    <td><img src="{{ '/storage/images' . $data['product']['image'] }}"
                                            alt="{{ $data['product']['image'] }}" width="150"></td>
                                    <td>{{ 1 }}</td>
                                    <td>Rp. {{ number_format($data['product']['price'], 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4">Total</td>
                                <td colspan="2">Rp. {{ number_format($totalPrice, 0, ',', '.') }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
