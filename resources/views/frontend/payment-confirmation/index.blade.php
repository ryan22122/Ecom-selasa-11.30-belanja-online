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
        .bank_list img{
            max-width: 150px;
            height: auto;
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
            <div class="home_title mb-3">Pembayaran</div>
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
                    <div class="checkout_form_container">
                        @include('include.message')
                        <div class="checkout_title">Total Biaya</div>
                        <ul class="cart_extra_total_list mb-4">
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <div class="cart_extra_total_title"></div>
                                <div class="cart_extra_total_value ml-auto" style="font-size: 30px">@rupiah($transaksi->total_harga)</div>
                            </li>
                        </ul>
                        <div class="alert alert-info mb-xl-4">
                            <h4>Cara pembayaran:</h4>
                            <ol style="padding-left: 20px">
                                <li>
                                    Silahkan melakukan pembayaran dengan transfer biaya sesuai dengan yang tertera pada total biaya.
                                </li>
                                <li>
                                    Kirim bukti transfer ke : <br>no. WA <strong>08967821451</strong> <br>atau <br>email <a href="mailto:ryanmazhar2@gmail.com">ryanmazhar2@gmail.com</a>
                                </li>
                                <li>
                                    Setelah anda membayar, CS akan segera memproses pesanan anda.
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cart Total -->
            <div class="col-lg-6 cart_col">
                <div class="cart_total">
                    <div class="cart_extra_content cart_extra_total" style="padding-top: 25px;">
                        <div class="checkout_title" style="margin-bottom: 50px;">Metode Pembayaran</div>

                        <div class="row">
                            <div class="col-6 mb-4">
                                <div class="mb-2">
                                    <img src="{{ asset('frontend/images/bca.png') }}" alt="bank logo">
                                </div>
                                <p>
                                    <strong>A.n. Riyan Muhamad Azhar</strong> <br>
                                    22122
                                </p>
                            </div>
                            <div class="col-6 mb-4">
                                <div class="mb-2">
                                    <img src="{{ asset('frontend/images/bni.png') }}" alt="bank logo">
                                </div>
                                <p>
                                    <strong>A.n. Ryan Muhamad Azhar</strong> <br>
                                    22122
                                </p>
                            </div>
                            <div class="col-6 mb-4">
                                <div class="mb-2">
                                    <img src="{{ asset('frontend/images/bri.png') }}" alt="bank logo">
                                </div>
                                <p>
                                    <strong>A.n. Ryan Mumahad azhar</strong> <br>
                                    22122
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
@endsection
