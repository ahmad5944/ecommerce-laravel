@extends('layouts.front.template')

@section('content')
    <section class="features-area section_gap">
        <div class="container">
            <div class="row features-inner">
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="{{ asset('assets/front-asset/img/features/f-icon1.png') }}" alt="">
                        </div>
                        <h6>Free Delivery</h6>
                        <p>Free Shipping on all order</p>
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="{{ asset('assets/front-asset/img/features/f-icon2.png') }}" alt="">
                        </div>
                        <h6>Return Policy</h6>
                        <p>Free Shipping on all order</p>
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="{{ asset('assets/front-asset/img/features/f-icon3.png') }}" alt="">
                        </div>
                        <h6>24/7 Support</h6>
                        <p>Free Shipping on all order</p>
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="{{ asset('assets/front-asset/img/features/f-icon4.png') }}" alt="">
                        </div>
                        <h6>Secure Payment</h6>
                        <p>Free Shipping on all order</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="row justify-content-center">
        <div class="col-lg-6 text-center">
            <div class="section-title">
                <h1>Our Products</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                    incididunt ut labore et
                    dolore
                    magna aliqua.</p>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- single product -->
        @foreach ($datas as $data)
            <div class="col-lg-3 col-md-6">
                <div class="single-product">
                    <img class="img-fluid" style="width: 250px; height: 250px;" src="{{ '/storage/images' . $data->image }}"
                        alt="{{ $data->image }}">
                    <div class="product-details">
                        <h6>{{ $data->name }}</h6>
                        <div class="price">
                            <h6>RP. {{ number_format($data->price, 0, ',', '.') }}</h6>
                        </div>
                        @if(auth()->user() != null)
                            <div class="">
                                <form action="{{ route('front.add-to-cart', $data->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $data->id }}">
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                    <button type="submit" class="btn btn-sm" title="add to cart"><i
                                            class="ti-bag"></i></button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
