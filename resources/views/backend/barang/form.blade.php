@extends('backend.layout.layout')

@push('css')
    <style>
        .img-preview{
            max-height: 100px;
        }
    </style>
@endpush

@push('js')
    <script type="text/javascript" src="{{ asset('backend/assets') }}/js/plugins/forms/selects/select2.min.js"></script>
    <script>
        $('.select2').select2();

        $('.gambar').on('change', function(){
            var input = this;
            var url = $(this).val();
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.img-preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        });
    </script>
@endpush
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <!-- Basic datatable -->
            <a href="{{ url('admin/barang') }}" class="btn btn-danger btn-sm mb-25"><i class="icon-circle-left2"></i>&nbsp;&nbsp;Kembali</a>
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">{{ $title }} Barang</h5>
                </div>
                <div class="panel-body">
                    @include('include.message')
                    <form class="form-horizontal" action="{{ $url }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if($title != 'Tambah')
                            @method('put')
                        @endif
                        <fieldset class="content-group">
                            <div class="form-group">
                                <label class="control-label col-lg-2">Gambar Barang</label>
                                <div class="col-lg-10">
                                    <img class="img-preview mb-10" src="{{ @$barang->gambar ? asset('uploads/barang/'.$barang->gambar) : '' }}" alt="" onerror="this.src='{{ asset('backend/assets/images/placeholder.jpg') }}'">
                                    <input type="file" name="gambar" class="gambar" accept="image/jpeg;images/png">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Nama Barang</label>
                                <div class="col-lg-10">
                                    <input type="text" name="nama_barang" value="{{ @old('nama_barang') ?? @$barang->nama_barang }}" class="form-control" placeholder="Masukan nama barang">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Kategori</label>
                                <div class="col-lg-10">
                                    <select class="select2" name="kategori_id[]" multiple="multiple" data-placeholder="Masukan 1 atau lebih karakter untuk mencari..">
                                        @foreach($kategoris as $kategori)
                                            <option value="{{ $kategori->id }}" {{ (@old('kategori_id') && in_array($kategori->id, explode(',', old('kategori_id')))) ? 'selected' : ((@$barang->kategori_id && in_array($kategori->id, explode(',', @$barang->kategori_id))) ? 'selected' : '') }}>{{ $kategori->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Stok</label>
                                <div class="col-lg-10">
                                    <input type="number" name="stok" value="{{ @old('stok') ?? @$barang->stok }}" class="form-control" placeholder="Masukan jumlah stok">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Harga satuan</label>
                                <div class="col-lg-10">
                                    <input type="number" name="harga" value="{{ @old('harga') ?? @$barang->harga }}" class="form-control" placeholder="Masukan harga barang">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Deskripsi</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" name="deskripsi" cols="20" rows="5" placeholder="Masukan deskripsi barang">{{ @old('deskripsi') ?? @$barang->deskripsi }}</textarea>
                                </div>
                            </div>
                        </fieldset>
                        <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
