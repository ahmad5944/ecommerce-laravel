@extends('layouts.front.template')

@section('content')
<style>
    .order{
        border-radius: 0;
    }
</style>
    <div class="breadcrumb-banner align-items-center">
        <div class="col-first">
            <div class="row d-flex justify-content-between">
                <h1 class="text-dark">Cart</h1>
                <div class="checkout_btn_inner d-flex align-items-center">
                    <a class="primary-btn order" href="{{ route('front.order') }}">Lihat Pesanan</a>
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
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
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
                                        <div class="media">
                                            <div class="d-flex">
                                                <img width="200"
                                                    src="{{ '/storage/images' . $value['product']['image'] }}"
                                                    alt="image">
                                            </div>
                                            <div class="media-body">
                                                <p>{{ $value['product']['name'] }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h5>Rp.{{ number_format($value['product']['price'], 0, ',', '.') }}</h5>
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
                                        <h5>Rp.{{ number_format($value['product']['price'], 0, ',', '.') }}</h5>
                                    </td>
                                    <td>
                                        <a href="{{ route('front.remove-cart', $value->id) }}" type="button"
                                            onclick="return confirm('Anda yakin Ingin menghapus data?')"
                                            class="btn btn-danger btn-sm btn-delete"><i class="fa fa-times fa-2"></i></a>
                                    </td>
                                </tr>
                                @php
                                    $totalPrice = $totalPrice + $value['product']['price'];
                                @endphp
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <h5>Subtotal</h5>
                                </td>
                                <td>
                                    <h5>Rp.{{ number_format($totalPrice, 0, ',', '.') }}</h5>
                                </td>
                            </tr>
                            <tr class="out_button_area">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <div class="checkout_btn_inner d-flex align-items-center">
                                        <a class="gray_btn" href="{{ route('front.index') }}">Lanjut Belanja</a>
                                        <a class="primary-btn" href="{{ route('front.order.store') }}">Proses Pesanan</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
