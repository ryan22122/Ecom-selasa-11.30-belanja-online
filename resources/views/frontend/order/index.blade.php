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
                <div class="home_title mb-3">Pesanan Saya</div>
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
            <div class="row">
                <div class="col">
                    <div class="cart_container">

                        <!-- Cart Bar -->
                        <div class="cart_bar">
                            <ul class="cart_bar_list item_list d-flex flex-row align-items-center justify-content-end">
                                <li class="col-2">No. Struk</li>
                                <li class="mr-auto col-2 no-padding">Atas nama</li>
                                <li class="mr-auto col-2 no-padding ">Alamat</li>
                                <li class="col-2">Detail Pesanan</li>
                                <li class="col-2">Status</li>
                                <li class="col-2">Total Biaya</li>
                            </ul>
                        </div>

                        <!-- Cart Items -->
                        <div class="cart_items">
                            <ul class="cart_items_list">
                                @foreach($orders as $key => $order)
                                <!-- Cart Item -->
                                <li class="cart_item item_list d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-end justify-content-start">
                                    <div class="col-2">
                                        <div><div class="product_number">#{{ $order->id }}</div></div>
                                    </div>
                                    <div class="mr-auto col-2 no-padding product_total product_price product_text">{{ $order->delivery->nama }}</div>
                                    <div class="mr-auto col-2 no-padding product_text">{{ $order->delivery->alamat }}</div>
                                    <div class="col-2 product_text">
                                        <ul>
                                        @foreach($order->detail as $detail)
                                            <li>{{ $detail->barang->nama_barang }} ({{ $detail->qty }} pcs)</li>
                                        @endforeach
                                        </ul>
                                    </div>
                                    <div class="col-2 product_text text-{{ app('order_status')['color'][$order->status] }}">
                                        <span class="d-block">
                                        {{ app('order_status')['name'][$order->status] }}
                                        </span>
                                        @if($order->status == 1)
                                        <a href="{{ url('/payment-confirmation/'.$order->id) }}" class="btn btn-primary btn-sm mt-2">Bayar</a>
                                        @endif
                                    </div>
                                    <div class="col-2 product_text product_total">
                                        @rupiah($order->total_harga)
                                    </div>
                                </li>
                                @endforeach
                                @if($orders->count() == 0)
                                <li class="cart_item item_list d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-end justify-content-start">
                                    <div class="product_name product d-flex flex-lg-row flex-column align-items-lg-center mr-auto">
                                        Order empty
                                    </div>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
