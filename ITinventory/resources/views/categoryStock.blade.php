@extends('layout.layout')

@section('content')

@section('categoryStock', 'active')
<div class="page-header">
    <h4 class="page-title">DATA BARANG</h4>
    <ul class="breadcrumbs">
        <li class="nav-home">
            <i class="flaticon-home"></i>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="separator">
            <a>Data Barang</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">


            <div class="card-header">
                <div class="d-flex align-items-center">
                    {{-- <h4 class="card-title">Barang Keluar</h4> --}}
                    <button type="button" class="btn btn-primary ml-3 mr-3" data-target="#addModalCenter" data-toggle="modal"><strong>ADD</strong></button>
                </div>
            </div>


            <div class="card-body">
                <div class="table-responsive">
                    <table id="add-row" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Kategori</th>
                                <th>Model</th>
                                <th>SN</th>
                                <th>Stok</th>
                                <th style="width: 6%">Info</th>
                                <th style="width: 6%">Edit</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Kategori</th>
                                <th>Model</th>
                                <th>SN</th>
                                <th>Stok</th>
                                <th style="width: 6%">Info</th>
                                <th style="width: 6%">Edit</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            {{-- @foreach ($brand as $brand)
                                <tr>
                                    <td>{{ $brand->customer_name }}</td>
                                    <td>{{ $brand->brand_id }}</td>
                                    <td>{{ $brand->brand_name }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a style="cursor: pointer" data-target="#editModalCenter"
                                                data-toggle="modal" data-brand_id="{{ $brand->brand_id }}"
                                                data-brand_name="{{ $brand->brand_name }}">
                                                <i class="fa fa-edit mt-3 text-primary"
                                                    data-toggle="tooltip"
                                                    data-original-title="Edit Brand"></i>
                                            </a>
                                            @if ($brand->item_exists == true)
                                                <a class="ml-3 mb-2" style="cursor: pointer">
                                                    <i class="fa fa-ban mt-3 text-danger"
                                                        data-toggle="tooltip"
                                                        data-original-title="Tidak bisa menghapus Brand karena sudah mempunyai Barang"></i>
                                                </a>
                                            @else
                                                <a class="ml-3 mb-2" style="cursor: pointer"
                                                    data-target="#deleteModal" data-toggle="modal"
                                                    data-brand_name="{{ $brand->brand_name }}"
                                                    data-brand_id="{{ $brand->brand_id }}"
                                                    data-brand_id_enc="{{ encrypt($brand->brand_id) }}">
                                                    <i class="fa fa-times mt-3 text-danger"
                                                        data-toggle="tooltip"
                                                        data-original-title="Hapus Brand"></i>
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach --}}
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
                <div class="form-group" style="padding:20px 0px 0px 0px">
                    <label for="category_name" class="col-form-label" style="font-weight: bold; padding-bottom:0">Kategori<span style="color: red">*</span></label>
                    <input type="text" class="form-control form-control" style="border-color: #aaaaaa"
                        placeholder="Komputer Rakitan" id="category_name"
                        name="supplier">
                </div>
                <div class="form-group" style="padding:20px 0px 0px 0px">
                    <label for="model_name" class="col-form-label" style="font-weight: bold; padding-bottom:0">Model<span style="color: red">*</span></label>
                    <input type="text" class="form-control form-control" style="border-color: #aaaaaa"
                        placeholder="Lenovo 80SX" id="model_name"
                        name="supplier">
                </div>
                <div class="form-group" style="padding:20px 0px 0px 0px">
                    <label for="sn" class="col-form-label" style="font-weight: bold; padding-bottom:0">SN<span style="color: red">*</span></label>
                    <input type="text" class="form-control form-control" style="border-color: #aaaaaa"
                        placeholder="5XABCDEF" id="sn"
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
