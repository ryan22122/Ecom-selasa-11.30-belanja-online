@extends('frontend.layout.layout')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles') }}/checkout.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles') }}/checkout_responsive.css">

    <style>
        .product_price{
            font-size: 20px;
        }
        .product_info{
            padding-bottom: 20px;
            height: 125px;
        }
        .product_buttons > div > div{
            width: 100%;
            border: 1px solid #ededed;
        }
    </style>
@endpush

@push('js')
    <script>
        $('.qty_sub').on('click', function(){
            var parent = $(this).parent();
            var count = parent.find('.product_num');
            count.text(count.text()*1-1);
            parent.find('.product_qty').val(count.text()*1-1);
        });
        $('.qty_add').on('click', function(){
            var parent = $(this).parent();
            var count = parent.find('.product_num');
            count.text(count.text()*1+1);
            parent.find('.product_qty').val(count.text()*1+1);
        });
        $('.btnCheckout').on('click', function(){
            var form = $(this).parents('form');
            form.submit();
        });
    </script>
@endpush

@section('content')
<div class="super_overlay"></div>

<!-- Home -->
<div class="home">
    <div class="home_container d-flex flex-column align-items-center justify-content-end">
        <div class="home_content text-center">
            <div class="home_title mb-3">Checkout</div>
        </div>
    </div>
</div>

<!-- Checkout -->

<div class="checkout">
    <div class="container">
        <form action="{{ url('/checkout') }}" method="post">
        @csrf
        <div class="row">
            <!-- Billing -->
            <div class="col-lg-6">
                <div class="billing">
                    <div class="checkout_title">Billing</div>
                    <div class="checkout_form_container">
                        @include('include.message')
                        <div class="mb-xl-3 mt-xl-2">
                            <!-- Name -->
                            <input type="text" id="checkout_name" class="checkout_input" name="nama" placeholder="Masukan Nama" required="required" value="{{ @$delivery->nama ? @$delivery->nama : auth()->user()->nama }}">
                        </div>
                        <div class="mb-xl-3">
                            <!-- Address -->
                            <input type="text" id="checkout_address" class="checkout_input" name="alamat" placeholder="Masukan Alamat" required="required" value="{{ @$delivery->alamat }}">
                        </div>
                        <div class="mb-xl-3">
                            <!-- Zipcode -->
                            <input type="text" id="checkout_zipcode" class="checkout_input" name="kode_pos" placeholder="Masukan Kode Pos" required="required" value="{{ @$delivery->kode_pos }}">
                        </div>
                        <div class="mb-xl-3">
                            <!-- Phone no -->
                            <input type="text" id="checkout_phone" class="checkout_input" name="no_telp" placeholder="Masukan No. Telp" required="required" value="{{ @$delivery->no_telp }}">
                        </div>
                        <div class="mb-xl-3">
                            <!-- Email -->
                            <input type="email" id="checkout_email" class="checkout_input" name="email" placeholder="Masukan Alamat Email" required="required" value="{{ @$delivery->email ? @$delivery->email : auth()->user()->email }}">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cart Total -->
            <div class="col-lg-6 cart_col">
                <div class="cart_total">
                    <div class="cart_extra_content cart_extra_total">
                        <div class="checkout_title">Cart Total</div>
                        <ul class="cart_extra_total_list">
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <div class="cart_extra_total_title">Subtotal</div>
                                <div class="cart_extra_total_value ml-auto">@rupiah($totalPayment)</div>
                            </li>
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <div class="cart_extra_total_title">Shipping</div>
                                <div class="cart_extra_total_value ml-auto">Free</div>
                            </li>
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <div class="cart_extra_total_title">Total</div>
                                <div class="cart_extra_total_value ml-auto">@rupiah($totalPayment)</div>
                            </li>
                        </ul>
                        <div class="checkout_button trans_200"><a href="#" class="btnSubmit">Lanjutkan</a></div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
@endsection
