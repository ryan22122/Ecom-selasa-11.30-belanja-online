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

        // External table additions
        // ------------------------------

        // Add placeholder to the datatable filter option
        $('.dataTables_filter input[type=search]').attr('placeholder','Type to filter...');


        // Enable Select2 select for the length option
        $('.dataTables_length select').select2({
            minimumResultsForSearch: Infinity,
            width: 'auto'
        });
    </script>
@endpush

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <a href="{{ url('admin/barang/create') }}" class="btn btn-success btn-sm mb-25"><i class="icon-plus2"></i> Tambah barang</a>

            <!-- Basic datatable -->
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Daftar Barang</h5>
                </div>
                <div class="panel-body">
                    @include('include.message')

                    <table class="table datatable-basic">
                        <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Deskripsi</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($barangs as $barang)
                            <tr>
                                <td>
                                    <img class="img-preview mr-10" src="{{ $barang->gambar ? asset('uploads/barang/'.$barang->gambar) : '' }}" alt="gambar barang" onerror="this.src='{{ asset('backend/assets/images/placeholder.jpg') }}'">
                                    <strong>{{ $barang->nama_barang }}</strong>
                                </td>
                                <td>{{ $barang->deskripsi ?? '-' }}</td>
                                <td>
                                    @php
                                        $id = explode(',', $barang->kategori_id);
                                        $produkKategori = \App\Kategori::whereIn('id', $id)->get();
                                    @endphp
                                    @foreach($produkKategori as $key => $pk)
                                        {{ $pk->nama_kategori.($key == sizeof($produkKategori) ? '' : ',') }}
                                    @endforeach
                                </td>
                                <td>{{ $barang->stok }} pcs</td>
                                <td class="text-center">
                                    <a href="{{ url('admin/barang/'.$barang->id.'/edit') }}" class="btn btn-warning"><i class="icon-pencil3"></i></a>
                                    <a href="#" class="btn btn-danger btnDelete" data-url="{{ url('/admin/barang/'.$barang->id) }}"><i class="icon-trash"></i></a>
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
