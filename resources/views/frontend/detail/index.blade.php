@extends('frontend.layout.layout')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles') }}/product.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles') }}/product_responsive.css">

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
        .form-qty{
            width: 100px;
        }
    </style>
@endpush

@push('js')
    <script>
        $(document).ready(function(){
            $('.btnSubmit').on('click', function(){
                $(this).parents('form').submit();
            });
        });
    </script>
@endpush

@section('content')
    <div class="super_overlay"></div>

    <!-- Home -->
    <div class="home">
        <div class="home_container d-flex flex-column align-items-center justify-content-end">
            <div class="home_content text-center">
                <div class="home_title mb-3">Detail Produk</div>
            </div>
        </div>
    </div>

    <!-- Products -->
    <div class="product">
        <div class="container">
            <div class="row">

                <!-- Product Image -->
                <div class="col-lg-6">
                    <div class="product_image_slider_container">
                        <div id="slider" class="flexslider">
                            <ul class="slides">
                                <li>
                                    <img src="{{ asset('uploads/barang/'.$barang->gambar) }}" />
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Product Info -->
                <div class="col-lg-6 product_col">
                    <div class="product_info">
                        @include('include.message')

                        <div class="product_name">{{ $barang->nama_barang }}</div>
                        @php
                            $id = explode(',', $barang->kategori_id);
                            $produkKategori = \App\Kategori::whereIn('id', $id)->get();
                        @endphp
                        <div class="product_category">In
                            @foreach($produkKategori as $pk)
                                <a href="{{ url('/produk?kategori='.$pk->id) }}">{{ $pk->nama_kategori }}</a>,
                            @endforeach
                        </div>
                        <div class="product_price">@rupiah($barang->harga)</div>
                        <div class="product_text mb-4">
                            <p>{{ $barang->deskripsi }}</p>
                        </div>
                        <form action="{{ url('/cart/'.$barang->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="">Jumlah</label>
                                <input type="number" class="form-control form-qty" name="qty" value="1">
                            </div>
                            <div class="product_buttons">
                                <div class="text-right d-flex flex-row align-items-start justify-content-start btnSubmit">
                                    <div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
                                        <div><div><img src="{{ asset('frontend/images') }}/cart.svg" class="svg" alt=""><div>+</div></div></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
