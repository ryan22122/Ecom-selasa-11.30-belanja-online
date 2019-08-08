@extends('backend.layout.layout')

@push('js')
    <script type="text/javascript" src="{{ asset('backend/assets') }}/js/plugins/tables/datatables/datatables.min.js"></script>
    <script type="text/javascript" src="{{ asset('backend/assets') }}/js/plugins/forms/selects/select2.min.js"></script>
    <script>
        $.extend( $.fn.dataTable.defaults, {
            dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
            language: {
                search: '<span>Filter:</span> _INPUT_',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
            },
            drawCallback: function () {
                $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
            },
            preDrawCallback: function() {
                $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
            }
        });
        $('.datatable-basic').dataTable();

        $('.select2').select2({
            containerCssClass: 'bg-teal-400'
        });

        $('.selectStatus').on('change', function(){
            var val = $(this).val();

            $(this).parents('form').submit();
        });
    </script>
@endpush

@section('content')
    <div class="row">
        <div class="col-lg-12">

            <!-- Basic datatable -->
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Daftar Transaksi</h5>
                </div>
                <div class="panel-body">
                    @include('include.message')

                    <table class="table datatable-basic">
                        <thead>
                        <tr>
                            <th>No. Struk</th>
                            <th>User</th>
                            <th>Nama Pelanggan</th>
                            <th>Tanggal Dibuat</th>
{{--                            <th>Barang</th>--}}
                            <th>Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transaksis as $transaksi)
                            <tr>
                                <td>#{{ $transaksi->id }}</td>
                                <td>
                                    <a href="{{ url('admin/user/'.$transaksi->user_id.'/edit') }}">{{ $transaksi->user->nama }}</a>
                                </td>
                                <td>{{ $transaksi->delivery->nama }}</td>
                                <td>{{ $transaksi->created_at }}</td>
{{--                                <td>--}}
{{--                                    <ul>--}}
{{--                                        @foreach($transaksi->detail as $detail)--}}
{{--                                            <li>--}}
{{--                                                <strong>--}}
{{--                                                    <a href="{{ url('admin/barang/'.$detail->id.'/edit') }}">{{ $detail->barang->nama_barang }}</a>--}}
{{--                                                </strong>--}}
{{--                                                ({{ $detail->qty.' pcs' }})--}}
{{--                                            </li>--}}
{{--                                        @endforeach--}}
{{--                                    </ul>--}}
{{--                                </td>--}}
                                <td>
                                    <form action="{{ url('admin/transaksi/'.$transaksi->id) }}" method="post">
                                        @csrf
                                        @method('put')
                                        <select name="status" class="form-control select2 selectStatus">
                                            <option value="1" {{ $transaksi->status == 1 ? 'selected' : '' }}>Belum dibayar</option>
                                            <option value="2" {{ $transaksi->status == 2 ? 'selected' : '' }}>Sudah Bayar</option>
                                            <option value="3" {{ $transaksi->status == 3 ? 'selected' : '' }}>Dalam Pengiriman</option>
                                            <option value="4" {{ $transaksi->status == 4 ? 'selected' : '' }}>Selesai</option>
                                        </select>
                                    </form>
                                </td>
                                <td class="text-center">
                                    <a href="{{ url('/admin/transaksi/'.$transaksi->id) }}" class="btn btn-primary"><i class="icon-eye"></i></a>
                                    <a href="#" class="btn btn-danger btnDelete" data-url="{{ url('/admin/transaksi/'.$transaksi->id) }}"><i class="icon-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <form action="#" method="post" id="formDelete" class="d-none">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
