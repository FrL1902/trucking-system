@extends('layout.layout')

@section('content')

@section('inactiveItem', 'active')
<div class="page-header">
    <h4 class="page-title">BARANG MASUK</h4>
    <ul class="breadcrumbs">
        <li class="nav-home">
            <i class="flaticon-home"></i>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="separator">
            <a>Barang Masuk</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">


            <div class="card-header">
                <div class="d-flex align-items-center">
                    {{-- <h4 class="card-title">Barang Masuk</h4> --}}
                    {{-- <button type="button" class="btn btn-primary ml-3 mr-3" data-target="#addModalCenter" data-toggle="modal"><strong>ADD</strong></button> --}}
                    <div class="dropdown">
                        <button class="btn btn-primary ml-3 mr-3 dropdown-toggle" type="button"
                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <strong>ADD</strong>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" data-target="#addModalCenterPC"
                                data-toggle="modal">PC & Laptop</a>
                            <a class="dropdown-item" data-target="#addModalCenterOther"
                                data-toggle="modal">Aset Lain</a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card-body">
                <div class="table-responsive">
                    <table id="add-row" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th style="width: 16%">ID Masuk</th>
                                <th>Lokasi</th>
                                <th>Model</th>
                                <th>Stok</th>
                                <th>Keterangan</th>
                                <th style="width: 6%">Info</th>
                                <th style="width: 9%">Edit</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th style="width: 16%">ID Masuk</th>
                                <th>Lokasi</th>
                                <th>Model</th>
                                <th>Stok</th>
                                <th>Keterangan</th>
                                <th style="width: 6%">Info</th>
                                <th style="width: 9%">Edit</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($barangMasuk as $data)
                                <tr>
                                    <td>{{ $data->masuk_id }}</td>
                                    <td>{{ $data->location_id }}</td>
                                    <td>{{ $data->model_id }}</td>
                                    <td>{{ $data->stok }}</td>
                                    <td>{{ $data->keterangan }}</td>
                                    <td>
                                        {{-- @if ($data->is_pc) --}}
                                            {{-- <i class="fa fa-info-circle" aria-hidden="true"></i> --}}
                                            <div class="d-flex justify-content-center">
                                                <a href="/barang/masuk/detail/{{$data->masuk_id}}">
                                                    <i class="fa fa-info-circle mt-1 text-primary"
                                                        data-toggle="tooltip"
                                                        data-original-title="Detail"></i>
                                                </a>
                                            </div>
                                        {{-- @endif --}}
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a style="cursor: pointer" data-target="#assignUserModal"
                                                data-toggle="modal" data-brand_id="{{ $data->masuk_id }}"
                                                data-brand_name="{{ $data->masuk_id }}"
                                                data-is_pc="{{ $data->is_pc }}"
                                                data-stok="{{ $data->stok }}">
                                                <i class="fa fa-user mt-3 text-primary"
                                                    data-toggle="tooltip"
                                                    data-original-title="Assign Barang"></i>
                                            </a>
                                            <a class="ml-3 mb-2" style="cursor: pointer" data-target="#editModalCenter"
                                                data-toggle="modal" data-brand_id="{{ $data->masuk_id }}"
                                                data-brand_name="{{ $data->masuk_id }}">
                                                <i class="fa fa-edit mt-3 text-primary"
                                                    data-toggle="tooltip"
                                                    data-original-title="Edit Data"></i>
                                            </a>
                                            <a class="ml-3 mb-2" style="cursor: pointer"
                                                data-target="#deleteModalMasuk" data-toggle="modal"
                                                data-brand_name="{{ $data->masuk_id }}"
                                                data-model_name="{{ $data->model_id }}">
                                                <i class="fa fa-times mt-3 text-danger"
                                                    data-toggle="tooltip"
                                                    data-original-title="Hapus Data"></i>
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
<div class="modal fade" id="deleteModalMasuk">
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

{{-- add pc and laptops --}}
<div class="modal fade" id="addModalCenterPC" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel" style="font-weight: bold">BARANG MASUK</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" enctype="multipart/form-data" action="/barang/masuk/newMasuk">
                @csrf
                <div class="modal-body">
                    <div class="d-flex justify-content-center">
                        <div style="width:100%">
                            <div class="form-group" style="padding:0 6px 0 0">
                                <label for="addLocation" class="col-form-label" style="font-weight: bold; padding-bottom:0">Lokasi<span style="color: red">*</span></label>
                                <select class="form-control"
                                    id="addLocation" style="border-color: #aaaaaa" data-width="100%"
                                    name="lokasi_id" required>
                                    <option></option>
                                    @foreach ($location as $data)
                                        <option value="{{ $data->location_id }}">
                                            {{ $data->lokasi }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group" style="padding:0; width:100%; padding:0 6px 0 0">
                                <label for="masuk_barang" class="col-form-label" style="font-weight: bold; padding-bottom:0">ID Barang Masuk<span style="color: red">*</span></label>
                                <input type="text" class="form-control form-control-sm" style="border-color: #aaaaaa;height:31px"
                                    placeholder="LTP01" id="masuk_barang"
                                    name="barang_masuk_id">
                            </div>
                            <div class="form-group" style="padding:0 6px 0 0">
                                <label for="processor" class="col-form-label" style="font-weight: bold; padding-bottom:0">Processor<span style="color: red">*</span></label>
                                <input type="text" class="form-control form-control-sm" style="border-color: #aaaaaa"
                                    placeholder="Intel Core i3-9100 CPU @ 3.60GHz (4 CPUs), ~3.6GHz" id="processor"
                                    name="processor">
                            </div>
                            <div class="form-group" style="padding:0 6px 0 0">
                                <label for="ram" class="col-form-label" style="font-weight: bold; padding-bottom:0">RAM<span style="color: red">*</span></label>
                                <input type="text" class="form-control form-control-sm" style="border-color: #aaaaaa"
                                    placeholder="2 GB" id="ram"
                                    name="ram">
                            </div>
                            <div class="form-group" style="padding:0 6px 0 0">
                                <label for="gpu" class="col-form-label" style="font-weight: bold; padding-bottom:0">GPU<span style="color: red">*</span></label>
                                <input type="text" class="form-control form-control-sm" style="border-color: #aaaaaa"
                                    placeholder="Intel HD Graphics" id="gpu"
                                    name="gpu">
                            </div>
                            <div class="form-group" style="padding:0 6px 0 0">
                                <label for="storage" class="col-form-label" style="font-weight: bold; padding-bottom:0">Storage<span style="color: red">*</span></label>
                                <input type="text" class="form-control form-control-sm" style="border-color: #aaaaaa"
                                    placeholder="SSD 120 GB" id="storage"
                                    name="storage">
                            </div>
                            <div class="form-group" style="padding:0 6px 0 0">
                                <label for="SN" class="col-form-label" style="font-weight: bold; padding-bottom:0">SN<span style="color: red">*</span></label>
                                <input type="text" class="form-control form-control-sm" style="border-color: #aaaaaa"
                                    placeholder="XRXXXX8R6X" id="SN"
                                    name="SN">
                            </div>
                        </div>
                        <div style="width:100%">
                            <div class="form-group" style="padding:0 0 0 6px">
                                <label for="model_id" class="col-form-label" style="font-weight: bold; padding-bottom:0">Model<span style="color: red">*</span></label>
                                <select class="form-control"
                                    id="addModel" style="border-color: #aaaaaa" data-width="100%"
                                    name="model_id" required>
                                    <option></option>
                                    @foreach ($model as $data)
                                        <option value="{{ $data->model_id }}">
                                            {{ $data->model_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group" style="padding:0 0 0 6px">
                                <label for="operating_system" class="col-form-label" style="font-weight: bold; padding-bottom:0">OS<span style="color: red">*</span></label>
                                <input type="text" class="form-control form-control-sm" style="border-color: #aaaaaa"
                                    placeholder="Windows 10 Pro 64Bit" id="category_name"
                                    name="operating_system">
                            </div>
                            <div class="form-group" style="padding:0 0 0 6px">
                                <label for="license" class="col-form-label" style="font-weight: bold; padding-bottom:0">License<span style="color: red">*</span></label>
                                <input type="text" class="form-control form-control-sm" style="border-color: #aaaaaa"
                                    placeholder="00334-10000-101001-AA350" id="license"
                                    name="license">
                            </div>
                            <div class="form-group" style="padding:0 0 0 6px">
                                <label for="monitor" class="col-form-label" style="font-weight: bold; padding-bottom:0">Monitor<span style="color: red">*</span></label>
                                <input type="text" class="form-control form-control-sm" style="border-color: #aaaaaa"
                                    placeholder="LG Flatron W1953SE" id="monitor"
                                    name="monitor">
                            </div>
                            <div class="form-group" style="padding:0 0 0 6px">
                                <label for="keyboard" class="col-form-label" style="font-weight: bold; padding-bottom:0">Keyboard<span style="color: red">*</span></label>
                                <input type="text" class="form-control form-control-sm" style="border-color: #aaaaaa"
                                    placeholder="Xploner m550" id="keyboard"
                                    name="keyboard">
                            </div>
                            <div class="form-group" style="padding:0 0 0 6px">
                                <label for="mouse" class="col-form-label" style="font-weight: bold; padding-bottom:0">Mouse<span style="color: red">*</span></label>
                                <input type="text" class="form-control form-control-sm" style="border-color: #aaaaaa"
                                    placeholder="Logitech B100" id="mouse"
                                    name="mouse">
                            </div>
                            <div class="form-group" style="padding:0 0 0 6px">
                                <label for="stok" class="col-form-label" style="font-weight: bold; padding-bottom:0">Stok Masuk<span style="color: red">*</span></label>
                                <input type="text" class="form-control form-control-sm" style="border-color: #aaaaaa"
                                    placeholder="1" id="stok"
                                    name="stok" readonly value=1>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div style="width:100%">
                            <label for="keterangan" class="col-form-label" style="font-weight: bold; padding-bottom:0">Keterangan<span style="color: red">*</span></label>
                            <input type="text" class="form-control form-control-sm" style="border-color: #aaaaaa"
                                placeholder="Baik" id="keterangan"
                                name="keterangan">
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
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
                </div>
                <input type="hidden" name="is_pc" value={{true}}>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button> --}}
                    <button type="submit" class="btn btn-primary">Insert Data</button>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- add other asset --}}
<div class="modal fade" id="addModalCenterOther" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel" style="font-weight: bold">BARANG MASUK</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" enctype="multipart/form-data" action="/barang/masuk/newMasuk">
                @csrf
                <div class="modal-body">
                    <div class="form-group" style="padding:0">
                        {{-- <label for="category_name" class="col-form-label" style="font-weight: bold; padding-bottom:0">Model<span style="color: red">*</span></label>
                        <input type="text" class="form-control form-control" style="border-color: #aaaaaa"
                            placeholder="Komputer Rakitan" id="category_name"
                            name="supplier"> --}}
                        <label for="model_id" class="col-form-label" style="font-weight: bold; padding-bottom:0">Model<span style="color: red">*</span></label>
                        <select class="form-control"
                            id="addModel2" style="border-color: #aaaaaa" data-width="100%"
                            name="model_id" required>
                            <option></option>
                            @foreach ($model as $data)
                                <option value="{{ $data->model_id }}">
                                    {{ $data->model_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" style="padding:20px 0px 0px 0px">
                        <label for="addLocation" class="col-form-label" style="font-weight: bold; padding-bottom:0">Lokasi<span style="color: red">*</span></label>
                        <select class="form-control"
                            id="addLocation2" style="border-color: #aaaaaa" data-width="100%"
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
                        <label for="barang_masuk_id" class="col-form-label" style="font-weight: bold; padding-bottom:0">ID Barang Masuk<span style="color: red">*</span></label>
                        <input type="text" class="form-control form-control" style="border-color: #aaaaaa"
                            placeholder="KTG01" id="barang_masuk_id"
                            name="barang_masuk_id">
                    </div>
                    <div class="form-group" style="padding:20px 0px 0px 0px">
                        <label for="stok" class="col-form-label" style="font-weight: bold; padding-bottom:0">Stok Masuk<span style="color: red">*</span></label>
                        <input type="number" class="form-control form-control" style="border-color: #aaaaaa"
                            placeholder="Lenovo 80SX" id="stok"
                            name="stok">
                    </div>
                    <div class="form-group" style="padding:20px 0px 0px 0px">
                        <label for="SN" class="col-form-label" style="font-weight: bold; padding-bottom:0">SN<span style="color: red">*</span></label>
                        <input type="text" class="form-control form-control" style="border-color: #aaaaaa"
                            placeholder="XRXXXX8R6X" id="SN"
                            name="SN">
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
                </div>
                <input type="hidden" name="is_pc" value={{false}}>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Insert Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- assign asset --}}
<div class="modal fade" id="assignUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel" style="font-weight: bold">ASSIGN BARANG</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" enctype="multipart/form-data" action="/barang/masuk/assign">
                @csrf
                <div class="modal-body">
                    <div class="form-group" style="padding:0">
                        <label for="addLocation" class="col-form-label" style="font-weight: bold; padding-bottom:0">Lokasi<span style="color: red">*</span></label>
                        <select class="form-control"
                            id="addLocation3" style="border-color: #aaaaaa" data-width="100%"
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
                        <label for="keluar_id" class="col-form-label" style="font-weight: bold; padding-bottom:0">ID Barang Keluar<span style="color: red">*</span></label>
                        <input type="text" class="form-control form-control" style="border-color: #aaaaaa"
                            placeholder="Budi" id="keluar_id"
                            name="keluar_id">
                    </div>
                    <div class="form-group" style="padding:20px 0px 0px 0px">
                        <label for="user" class="col-form-label" style="font-weight: bold; padding-bottom:0">Nama User-PIC<span style="color: red">*</span></label>
                        <input type="text" class="form-control form-control" style="border-color: #aaaaaa"
                            placeholder="Budi" id="user"
                            name="user">
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
        // delete modal
        $('#deleteModalMasuk').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var brand_name = button.data('brand_name')
            var model_name = button.data('model_name')
            var modal = $(this)


            modal.find('.modal-title').text('HAPUS BARANG ' + '"' + brand_name + '"' )
            modal.find('.modal-text').text('Apa anda yakin untuk menghapus data barang masuk "' + model_name + '" ?')
            modal.find('.deleteBrand').attr('href', '/barang/masuk/delete/' + brand_name)

        })

        // buat add pc
        $('#addModel').select2({
            dropdownParent: $('#addModalCenterPC'),
            placeholder: 'Pilih Model'
        });
        $('#addLocation').select2({
            dropdownParent: $('#addModalCenterPC'),
            placeholder: 'Pilih Lokasi'
        });

        //  buat add aset lain
        $('#addModel2').select2({
            dropdownParent: $('#addModalCenterOther'),
            placeholder: 'Pilih Model'
        });
        $('#addLocation2').select2({
            dropdownParent: $('#addModalCenterOther'),
            placeholder: 'Pilih Lokasi'
        });

        // buat assign barang
        $('#addLocation3').select2({
            dropdownParent: $('#assignUserModal'),
            placeholder: 'Pilih Lokasi'
        });

        $('#assignUserModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var brand_id = button.data('brand_id')
            var brand_name = button.data('brand_name')
            let is_pc = button.data('is_pc')
            let stok = button.data('stok')
            var modal = $(this)

            modal.find('.modal-title').text('ASSIGN BARANG "' + brand_id + '"')
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
