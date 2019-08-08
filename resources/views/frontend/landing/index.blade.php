@extends('frontend.layout.layout')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles') }}/category.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles') }}/category_responsive.css">
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
        }
    </style>
@endpush

@push('js')
    <script>
        $(document).ready(function(){
            $('.btnAddCart').on('click', function(){
                var url = $(this).data('url');
                window.location.replace(url);
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
            <div class="home_title mb-3">Daftar Produk</div>
        </div>
    </div>
</div>

<!-- Products -->

<div class="products">
    <div class="container">
        <div class="row products_bar_row">
            <div class="col">
                <div class="products_bar d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-start justify-content-center">
                    <div class="products_bar_links">
                        <ul class="d-flex flex-row align-items-start justify-content-start">
                            <li class="{{ empty(request()->kategori) ? 'active' : '' }}"><a href="{{ url('/produk') }}">All</a></li>
                            @foreach($kategoris as $kategori)
                            <li class="{{ request()->kategori == $kategori->id ? 'active' : '' }}"><a href="{{ url('/produk?kategori='.$kategori->id) }}">{{ $kategori->nama_kategori }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @if(@request()->search)
        <div class="row" style="margin-bottom: 50px;">
            <div class="col">
                <div class="alert alert-info">
                    Menampilkan hasil pencarian <strong>"{{ request()->search }}"</strong>
                </div>
            </div>
        </div>
        @endif
        <div class="row products_row products_container grid">

            @foreach($produks as $produk)
            <!-- Product -->
            <div class="col-xl-4 col-md-6 grid-item new">
                <div class="product">
                    <div class="product_image"><img src="{{ asset('uploads/barang/'.$produk->gambar) }}" alt=""></div>
                    <div class="product_content">
                        <div class="product_info">
                            <div class="ml-auto text-right">
                                <div class="product_price text-right">@rupiah($produk->harga)</div>
                            </div>
                            <div class="mb-3">
                                <div>
                                    <div class="product_name"><a href="{{ url('produk/'.$produk->id) }}">{{ $produk->nama_barang }}</a></div>
                                    @php
                                        $id = explode(',', $produk->kategori_id);
                                        $produkKategori = \App\Kategori::whereIn('id', $id)->get();
                                    @endphp
                                    <div class="product_category">In
                                        @foreach($produkKategori as $pk)
                                            <a href="{{ url('/produk?kategori='.$pk->id) }}">{{ $pk->nama_kategori }}</a>,
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product_buttons">
                            <div>
                                <div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center btnAddCart"
                                     data-url="{{ url('/produk/'.$produk->id) }}">
                                    <div><div><img src="{{ asset('frontend/images') }}/cart.svg" class="svg" alt=""><div>+</div></div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row page_nav_row">
            <div class="col">
                <div class="page_nav">
                    {{ $produks->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
