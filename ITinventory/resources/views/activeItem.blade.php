@extends('layout.layout')

@section('content')

@section('activeItem', 'active')
<div class="page-header">
    <h4 class="page-title">BARANG KELUAR</h4>
    <ul class="breadcrumbs">
        <li class="nav-home">
            <i class="flaticon-home"></i>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="separator">
            <a>Barang Keluar</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="add-row" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th style="width: 16%">ID Keluar</th>
                                <th>Kategori</th>
                                <th>Model</th>
                                <th>Pengguna</th>
                                <th>Lokasi</th>
                                <th>Keterangan</th>
                                <th style="width: 6%">Info</th>
                                <th style="width: 6%">Edit</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th style="width: 16%">ID Keluar</th>
                                <th>Kategori</th>
                                <th>Model</th>
                                <th>User PIC</th>
                                <th>Lokasi</th>
                                <th>Keterangan</th>
                                <th style="width: 6%">Info</th>
                                <th style="width: 6%">Edit</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($barangKeluar as $data)
                                <tr>
                                    <td>{{ $data->keluar_id }}</td>
                                    <td>{{ $data->model_id }}</td>
                                    <td>{{ $data->model_id }}</td>
                                    <td>{{ $data->assigned_user }}</td>
                                    <td>{{ $data->location_id }}</td>
                                    <td>{{ $data->keterangan }}</td>
                                    <td>
                                        {{-- @if ($data->is_pc) --}}
                                            {{-- <i class="fa fa-info-circle" aria-hidden="true"></i> --}}
                                            <div class="d-flex justify-content-center">
                                                <a href="/barang/keluar/detail/{{$data->keluar_id}}">
                                                    <i class="fa fa-info-circle mt-1 text-primary"
                                                        data-toggle="tooltip"
                                                        data-original-title="Detail"></i>
                                                </a>
                                            </div>
                                        {{-- @endif --}}
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a style="cursor: pointer" data-target="#editModalCenter"
                                                data-toggle="modal" data-brand_id="{{ $data->keluar_id }}"
                                                data-brand_name="{{ $data->keluar_id }}">
                                                <i class="fa fa-edit text-primary"
                                                    data-toggle="tooltip"
                                                    data-original-title="Edit Data"></i>
                                            </a>
                                            <a class="ml-3" style="cursor: pointer" data-target="#putBackModal"
                                                data-toggle="modal" data-brand_id="{{ $data->keluar_id }}"
                                                data-brand_name="{{ $data->keluar_id }}"
                                                data-is_pc="{{ $data->is_pc }}"
                                                data-stok="{{ $data->stok }}">
                                                <i class="fa fa-arrow-circle-down text-primary"
                                                    data-toggle="tooltip"
                                                    data-original-title="Simpan Barang"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- modal untuk delete brand --}}
<div class="modal fade" id="deleteModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel" style="font-weight: bold"></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="modal-text"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="close-modal"
                    data-dismiss="modal">Tidak</button>
                <a href="/deleteBrand/ttt" class="deleteBrand btn btn-danger">YAKIN
                </a>
            </div>
        </div>
    </div>
</div>

{{-- modal untuk update brand --}}
<div class="modal fade" id="editModalCenter" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLongTitle" style="font-weight: bold"></strong>
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="/updateBrand">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Brand</label>
                            <input type="text" class="form-control brand_update_field"
                                placeholder="masukkan nama brand" aria-label=""
                                aria-describedby="basic-addon1" name="brandnameformupdate">
                            <div class="card mt-5 ">
                                <button id="" class="btn btn-primary">Update
                                    Data Brand</button>
                            </div>
                        </div>
                        <input type="hidden" class="form-control brandIdHidden" name="brandIdHidden"
                            value="#">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel" style="font-weight: bold"></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="modal-text"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="close-modal"
                    data-dismiss="modal">Tidak</button>
                <a href="/deleteBrand/ttt" class="deleteBrand btn btn-danger">YAKIN
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel" style="font-weight: bold">KATEGORI BARU</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form>
                <div class="form-group" style="padding:0">
                    <label for="category_id" class="col-form-label" style="font-weight: bold; padding-bottom:0">ID Kategori<span style="color: red">*</span></label>
                    <input type="text" class="form-control form-control" style="border-color: #aaaaaa"
                        placeholder="KTG01" id="category_id"
                        name="supplier">
                </div>
                <div class="form-group" style="padding:20px 0px 0px 0px">
                    <label for="category_name" class="col-form-label" style="font-weight: bold; padding-bottom:0">Nama Kategori<span style="color: red">*</span></label>
                    <input type="text" class="form-control form-control" style="border-color: #aaaaaa"
                        placeholder="Komputer Rakitan" id="category_name"
                        name="supplier">
                </div>
                <div class="form-group" style="padding:20px 0px 0px 0px">
                    <label for="model_name" class="col-form-label" style="font-weight: bold; padding-bottom:0">Nama Model<span style="color: red">*</span></label>
                    <input type="text" class="form-control form-control" style="border-color: #aaaaaa"
                        placeholder="Lenovo 80SX" id="model_name"
                        name="supplier">
                </div>
            </form>
        </div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button> --}}
                <button type="button" class="btn btn-primary">Insert Data</button>
            </div>
        </div>
    </div>
</div>

{{-- ADD STOCK MODAL --}}
<div class="modal fade" id="addModalCentera" tabindex="-1" role="dialog"
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLongTitle">
                    <strong>
                        TAMBAHKAN KATEGORI BARU
                    </strong>
                </h3>
                <button id="addIncomingClose" style="display:inline-block" type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form enctype="multipart/form-data" method="post" action="/addItemStock">
                @csrf
                <div class="modal-body" style="padding:0">

                    <div class="card-body">
                        <div class="form-group">
                            <label for="supplier" style="font-weight: bold">ID<span style="color: red">
                                    *
                                </span></label>
                            <input type="text" class="form-control form-control-sm" style="border-color: #aaaaaa"
                                placeholder="supplier barang" id="supplier"
                                name="supplier">
                        </div>

                        <div class="form-group">
                            <label for="supplier" style="font-weight: bold">Nama Kategori<span style="color: red">
                                    *
                                </span></label>
                            <input type="text" class="form-control form-control-sm" style="border-color: #aaaaaa"
                                placeholder="supplier barang" id="supplier"
                                name="supplier">
                        </div>
                        <div class="form-group">
                            <div class="modal-footer">
                                <button class="btn btn-primary">Export
                                    Data</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="putBackModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel" style="font-weight: bold">SIMPAN BARANG</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" enctype="multipart/form-data" action="/barang/keluar/simpan">
                @csrf
                <div class="modal-body">
                    <div class="form-group" style="padding:0">
                        <label for="addLocation" class="col-form-label" style="font-weight: bold; padding-bottom:0">Lokasi<span style="color: red">*</span></label>
                        <select class="form-control"
                            id="addLocation4" style="border-color: #aaaaaa" data-width="100%"
                            name="lokasi_id" required>
                            <option></option>
                            @foreach ($location as $data)
                                <option value="{{ $data->location_id }}">
                                    {{ $data->lokasi }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" style="padding:20px 0px 0px 0px">
                        <label for="masuk_id" class="col-form-label" style="font-weight: bold; padding-bottom:0">ID Barang Masuk<span style="color: red">*</span></label>
                        <input type="text" class="form-control form-control" style="border-color: #aaaaaa"
                            placeholder="Budi" id="masuk_id"
                            name="masuk_id">
                    </div>
                    <div class="form-group" style="padding:20px 0px 0px 0px">
                        <label for="stok" class="col-form-label" style="font-weight: bold; padding-bottom:0">Stok<span style="color: red">*</span></label>
                        <input type="number" class="form-control form-control assign-stok" style="border-color: #aaaaaa"
                            placeholder="1-brp" id="stok"
                            name="stok">
                    </div>
                    <div class="form-group" style="padding:20px 0px 0px 0px">
                        <label for="keterangan" class="col-form-label" style="font-weight: bold; padding-bottom:0">Keterangan<span style="color: red">*</span></label>
                        <input type="text" class="form-control form-control" style="border-color: #aaaaaa"
                            placeholder="Baik" id="keterangan"
                            name="keterangan">
                    </div>
                    <div class="d-flex justify-content-center mt-2">
                        <div style="width:100%">
                            <div class="form-group" style="padding:0 6px 0 0">
                                <label for="exampleFormControlFile1" class="col-form-label" style="font-weight: bold; padding-bottom:0">Gambar Barang<span style="color: red">*</span></label>
                                <input type="file" class="form-control-file" style="height:40px" id="exampleFormControlFile1" name="gambar1">
                            </div>
                        </div>
                        <div style="width:100%">
                            <div class="form-group" style="padding:0 0 0 6px">
                                <label for="exampleFormControlFile2" class="col-form-label" style="font-weight: bold; padding-bottom:0">Gambar Serah Terima<span style="color: red">*</span></label>
                                <input type="file" class="form-control-file" style="height:40px" id="exampleFormControlFile2" name="gambar2">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" class="form-control id_hidden" name="barang_id" value="#">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Insert Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        // buat assign barang
        $('#addLocation4').select2({
            dropdownParent: $('#putBackModal'),
            placeholder: 'Pilih Lokasi'
        });

        $('#putBackModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var brand_id = button.data('brand_id')
            var brand_name = button.data('brand_name')
            let is_pc = button.data('is_pc')
            let stok = button.data('stok')
            var modal = $(this)

            modal.find('.modal-title').text('SIMPAN BARANG "' + brand_id + '"')
            modal.find('.id_hidden').attr('value', brand_id)
            if(is_pc)
            {
                modal.find('.assign-stok').attr('min', 1)
                modal.find('.assign-stok').attr('max', 1)
            } else {
                modal.find('.assign-stok').attr('min', 1)
                modal.find('.assign-stok').attr('max', stok)
            }
        })
    </script>
@endsection
