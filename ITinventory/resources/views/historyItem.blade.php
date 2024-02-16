@extends('layout.layout')

@section('content')

@section('historyItem', 'active')
<div class="page-header">
    <h4 class="page-title">SEJARAH BARANG</h4>
    <ul class="breadcrumbs">
        <li class="nav-home">
            <i class="flaticon-home"></i>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="separator">
            <a>Sejarah Barang</a>
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
                                <th style="width: 6%">No.</th>
                                <th>ID Barang</th>
                                <th style="width: 8%">Barang</th>
                                <th>User-PIC</th>
                                <th>Lokasi</th>
                                <th>Oleh User</th>
                                <th>Status</th>
                                <th style="width: 6%">Info</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nomor</th>
                                <th>ID Barang</th>
                                <th>Barang</th>
                                <th>User-PIC</th>
                                <th>Lokasi</th>
                                <th>Oleh User</th>
                                <th>Status</th>
                                <th style="width: 6%">Info</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($history as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->barang_id }}</td>
                                    <td>{{ $data->barang }}</td>
                                    <td>{{ $data->assigned_user }}</td>
                                    <td>{{ $data->lokasi }}</td>
                                    <td>{{ $data->by_user }}</td>
                                    @if ($data->status == 'MASUK')
                                        <td style="display: block; min-width:70px; text-align: center;">
                                            <strong>
                                                <p
                                                    style="margin: auto; color: white; background-color: rgb(59, 206, 91);border-radius: 25px">
                                                    {{ $data->status }}</p>
                                            </strong>
                                        </td>
                                    @elseif ($data->status == 'KELUAR SEMUA')
                                        <td style="display: block; text-align: center; min-width:70px;">
                                            <strong>
                                                <p
                                                    style="margin: auto; color: white; background-color: rgb(130, 48, 177);border-radius: 25px">
                                                    {{ $data->status }}</p>
                                            </strong>
                                        </td>
                                    @elseif ($data->status == 'KELUAR SEBAGIAN')
                                        <td style="display: block; text-align: center; min-width:70px;">
                                            <strong>
                                                <p
                                                    style="margin: auto; color: white; background-color: rgb(226, 179, 69);border-radius: 25px">
                                                    {{ $data->status }}</p>
                                            </strong>
                                        </td>
                                    @elseif ($data->status == 'UPDATE')
                                        <td style="display: block; text-align: center; min-width:70px;">
                                            <strong>
                                                <p
                                                    style="margin: auto; color: white; background-color: rgb(55, 111, 189);border-radius: 25px">
                                                    {{ $data->status }}</p>
                                            </strong>
                                        </td>
                                    @elseif ($data->status == 'DELETE')
                                        <td style="display: block; text-align: center; min-width:70px;">
                                            <strong>
                                                <p
                                                    style="margin: auto; color: white; background-color: rgb(255, 69, 28);border-radius: 25px">
                                                    {{ $data->status }}</p>
                                            </strong>
                                        </td>
                                    @endif
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="/barang/history/detail/{{$data->id}}">
                                                <i class="fa fa-info-circle mt-1 text-primary"
                                                    data-toggle="tooltip"
                                                    data-original-title="Detail"></i>
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



@endsection
