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
            <a href="{{ url('admin/transaksi') }}" class="btn btn-danger btn-sm mb-25"><i class="icon-circle-left2"></i>&nbsp;&nbsp;Kembali</a>

            <!-- Invoice template -->
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title">Detail Transaksi</h6>
                </div>

                <div class="panel-body no-padding-bottom">
                    <div class="row">
                        <div class="col-sm-6 content-group">
                            <span class="text-muted">Pelanggan:</span>
                            <ul class="list-condensed list-unstyled">
                                <li><h5 class="no-margin">{{ $transaksi->delivery->nama }}</h5></li>
                                <li><strong>{{ $transaksi->delivery->alamat }}</strong></li>
                                <li>{{ $transaksi->delivery->kode_pos }}</li>
                                <li>{{ $transaksi->delivery->no_telp }}</li>
                                <li><a href="mailto:{{ $transaksi->delivery->email }}">{{ $transaksi->delivery->email }}</a></li>
                            </ul>
                        </div>

                        <div class="col-sm-6 content-group">
                            <div class="invoice-details">
                                <h5 class="text-uppercase text-semibold">Invoice #{{ $transaksi->id }}</h5>
                                <ul class="list-condensed list-unstyled">
                                    <li>Date: <span class="text-semibold">@datetime($transaksi->created_at)</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-lg">
                        <thead>
                        <tr>
                            <th class="col-sm-1">ID</th>
                            <th>Produk</th>
                            <th class="col-sm-1">Qty</th>
                            <th class="col-sm-2">Harga</th>
                            <th class="col-sm-2">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transaksi->detail as $detail)
                        <tr>
                            <td>{{ $detail->barang->id }}</td>
                            <td>{{ $detail->barang->nama_barang }}</td>
                            <td>{{ $detail->qty }}</td>
                            <td>@rupiah($detail->barang->harga)</td>
                            <td><span class="text-semibold">@rupiah($detail->qty * $detail->barang->harga)</span></td>
                        </tr>
                        @endforeach
                        </tbody>
                        <tfooter>
                            <tr>
                                <th colspan="4">Total Harga</th>
                                <th>@rupiah($transaksi->total_harga)</th>
                            </tr>
                        </tfooter>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
