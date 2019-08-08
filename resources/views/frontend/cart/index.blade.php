@extends('frontend.layout.layout')

@push('css')

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles') }}/cart.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles') }}/cart_responsive.css">

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
        $('.btnCheckout').on('click', function(e){
            e.preventDefault();
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
                <div class="home_title mb-3">Cart</div>
            </div>
        </div>
    </div>

    <div class="cart_section">
        <div class="container">
            <div class="row">
                <div class="col">
                    @include('include.message')
                </div>
            </div>
            <form action="{{ url('/cart/checkout') }}" method="post" style="">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="cart_container">

                            <!-- Cart Bar -->
                            <div class="cart_bar">
                                <ul class="cart_bar_list item_list d-flex flex-row align-items-center justify-content-end">
                                    <li class="mr-auto">Product</li>
                                    <li class="col-2">Price</li>
                                    <li>Quantity</li>
                                    <li class="col-2">Total</li>
                                </ul>
                            </div>

                            <!-- Cart Items -->
                            <div class="cart_items">
                                <ul class="cart_items_list">
                                    @php
                                        $total_harga = 0;
                                    @endphp
                                    @foreach($carts as $key => $cart)
                                    <!-- Cart Item -->
                                    <li class="cart_item item_list d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-end justify-content-start">
                                        <div class="product d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start mr-auto">
                                            <div><div class="product_number">{{ $key+1 }}</div></div>
                                            <div><div class="product_image"><img src="{{ asset('uploads/barang/'.$cart->barang->gambar) }}" alt=""></div></div>
                                            <div class="product_name_container">
                                                <div class="product_name"><a href="{{ url('produk/'.$cart->barang_id) }}">{{ $cart->barang->nama_barang }}</a></div>
                                            </div>
                                        </div>
                                        <div class="col-2 product_price product_text"><span>Price: </span> @rupiah($cart->barang->harga) </div>
                                        <div class="product_quantity_container">
                                            <div class="product_quantity ml-lg-auto mr-lg-auto text-center">
                                                <span class="product_text product_num">{{ $cart->qty }}</span>
                                                <input type="hidden" name="qty[{{ $cart->id }}]" class="product_qty" value="{{ $cart->qty }}">
                                                <div class="qty_sub qty_button trans_200 text-center"><span>-</span></div>
                                                <div class="qty_add qty_button trans_200 text-center"><span>+</span></div>
                                            </div>
                                        </div>
                                        <div class="col-2 product_total product_text"><span>Total: </span>@rupiah($cart->qty*$cart->barang->harga)</div>
                                        @php
                                            $total_harga += $cart->qty * $cart->barang->harga;
                                        @endphp
                                    </li>
                                    @endforeach
                                    @if($carts->count() == 0)
                                    <li class="cart_item item_list d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-end justify-content-start">
                                        <div class="product_name product d-flex flex-lg-row flex-column align-items-lg-center mr-auto">
                                            Cart empty
                                        </div>
                                    </li>
                                    @endif
                                    <li class="cart_item item_list d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-end justify-content-start">
                                        <div class="product_name product d-flex flex-lg-row flex-column align-items-lg-center mr-auto">
                                            <strong>Cart Total</strong>
                                        </div>
                                        <div class="col-2 product_total product_text">
                                            @rupiah($total_harga)
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <!-- Cart Buttons -->
                            <div class="cart_buttons d-flex flex-row align-items-start justify-content-start">
                                <div class="cart_buttons_inner ml-sm-auto d-flex flex-row align-items-start justify-content-start flex-wrap">
                                    <div class="button button_clear trans_200"><a href="#" class="btnDelete">clear cart</a></div>
                                    <div class="button button_shopping trans_200"><a href="{{ url('/produk') }}">continue shopping</a></div>
                                    @if($carts->count() != 0)
                                    <div class="button button_continue trans_200"><a href="#" class="btnCheckout">Checkout</a></div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <form action="{{ url('/cart/'.auth()->user()->id) }}" method="post" id="formDelete">
                @csrf
                @method('delete')
            </form>
        </div>
    </div>
@endsection
