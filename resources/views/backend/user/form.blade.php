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
            <a href="{{ url('admin/user') }}" class="btn btn-danger btn-sm mb-25"><i class="icon-circle-left2"></i>&nbsp;&nbsp;Kembali</a>
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">{{ $title }} User</h5>
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
                                <label class="control-label col-lg-2">Nama User</label>
                                <div class="col-lg-10">
                                    <input type="text" name="nama" value="{{ @old('nama') ?? @$user->nama }}" class="form-control" placeholder="Masukan nama user">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Email</label>
                                <div class="col-lg-10">
                                    <input type="email" name="email" value="{{ @old('email') ?? @$user->email }}" class="form-control" placeholder="Masukan email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Level</label>
                                <div class="col-lg-10">
                                    <select class="select2" name="level">
                                        @foreach(app('user_level')['name'] as $key => $status)
                                            @if($key == 0)
                                                @continue
                                            @endif
                                            <option value="{{ $key }}" {{ (@old('level') && old('level') == $key) ? 'selected' : ((@$user->level && $user->level == $key) ? 'selected' : '') }}>{{ $status }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Password</label>
                                <div class="col-lg-10">
                                    <input type="password" name="password" value="{{ @old('password') ?? @$user->password }}" class="form-control" placeholder="Masukan Password">
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
