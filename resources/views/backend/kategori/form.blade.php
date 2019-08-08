@extends('backend.layout.layout')

@push('css')
    <style>
        .img-preview{
            max-height: 100px;
        }
    </style>
@endpush
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <!-- Basic datatable -->
            <a href="{{ url('admin/kategori') }}" class="btn btn-danger btn-sm mb-25"><i class="icon-circle-left2"></i>&nbsp;&nbsp;Kembali</a>
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">{{ $title }} Kategori</h5>
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
                                <label class="control-label col-lg-2">Nama Kategori</label>
                                <div class="col-lg-10">
                                    <input type="text" name="nama_kategori" value="{{ @old('nama_kategori') ?? @$kategori->nama_kategori }}" class="form-control" placeholder="Masukan nama kategori">
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
