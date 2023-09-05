@extends('layouts.front.template')

@section('content')
    <div class="breadcrumb-banner align-items-center">
        <div class="col-first">
            <div class="row d-flex justify-content-between">
                <h1 class="text-dark">Order</h1>
                <div class="d-flex align-items-center">
                    <form action="{{ route('front.report-excel', auth()->user()->id) }}" target="_blank">
                        <div class="form-group row">
                            <label class="col-4 col-form-label" for="report">Export</label>
                            <select class="form-control col-8" name="report" id="report" onchange="this.form.submit();">
                                <option value="" hidden>Pilih export</option>
                                <option value="excel">Excel</option>
                                <option value="csv">Csv</option>
                            </select>
                        </div>
                    </form>
                    {{-- <a href="{{ route('front.report-excel', auth()->user()->id) }}" target="_blank" type="button"
                        class="btn btn-success btn-sm"><i data-feather='download-cloud' class="font-small-2"></i></a> --}}
                </div>
            </div>
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
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No Invoice</th>
                                <th scope="col">Product</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalPrice = 0;
                            @endphp
                            @foreach ($data as $value)
                                <tr>
                                    <td>
                                        <h5>{{ $value['no_invoice'] }}</h5>
                                    </td>
                                    <td>
                                        <h5>{{ $value['product']['name'] }}</h5>
                                    </td>
                                    <td>
                                        <div class="product_count">
                                            <h5>1</h5>
                                            {{-- <input type="text" name="qty" min="1" id="sst" maxlength="12"
                                                value="1" title="Quantity:" class="input-text qty"> --}}
                                            {{-- <button
                                                onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                                                class="increase items-count" type="button"><i
                                                    class="lnr lnr-chevron-up"></i></button>
                                            <button
                                                onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                                                class="reduced items-count" type="button"><i
                                                    class="lnr lnr-chevron-down"></i></button> --}}
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ route('front.cancel-order', $value->id) }}" type="button"
                                            onclick="return confirm('Anda yakin ingin cancel orderan?')"
                                            class="btn btn-danger btn-sm btn-delete">Cancel Order</a>
                                    </td>
                                </tr>
                            @endforeach
                            {{-- <tr class="out_button_area">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <div class="checkout_btn_inner d-flex align-items-center">
                                        <a class="gray_btn" href="#">Lanjut Belanja</a>
                                        <a class="primary-btn" href="#">Proses Pesanan</a>
                                    </div>
                                </td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
