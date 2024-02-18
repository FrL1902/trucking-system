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
                                <th>ID Model</th>
                                <th>Model</th>
                                <th>Kategori</th>
                                {{-- <th>SN</th> --}}
                                <th>Stok</th>
                                {{-- <th style="width: 11%">gambar</th> --}}
                                <th style="width: 6%">Info</th>
                                <th style="width: 6%">Edit</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID Model</th>
                                <th>Model</th>
                                <th>Kategori</th>
                                {{-- <th>SN</th> --}}
                                <th>Stok</th>
                                {{-- <th style="width: 11%">gambar</th> --}}
                                <th style="width: 6%">Info</th>
                                <th style="width: 6%">Edit</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($categoryStock as $data)
                                <tr>
                                    <td>{{ $data->model_id }}</td>
                                    <td>{{ $data->model_name }}</td>
                                    <td>{{ $data->category->kategori }}</td>
                                    <td>{{ $data->stok }}</td>
                                    {{-- <td>
                                        <a style="cursor: pointer"
                                            data-target="#imageModalCenter"
                                            data-toggle="modal"
                                            data-pic_url="{{ Storage::url($data->gambar) }}"
                                            data-item_name="{{ $data->item_name }}"
                                            data-item_date="{{ date_format(date_create($data->arrive_date), 'd-m-Y') }}">
                                            <img class="rounded mx-auto d-block"
                                                style="width: 100px; height: 50px; object-fit: cover;"
                                                src="{{ Storage::url($data->gambar) }}"
                                                alt="no picture" loading="lazy">
                                        </a>
                                    </td>
                                    <td>{{ Storage::url($data->gambar) }}</td> --}}
                                    <td>
                                        {{-- @if ($data->is_pc) --}}
                                            {{-- <i class="fa fa-info-circle" aria-hidden="true"></i> --}}
                                            <div class="d-flex justify-content-center">
                                                <a href="/barang/model/detail/{{$data->model_id}}">
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
                                                data-toggle="modal" data-brand_id="{{ $data->model_id }}"
                                                data-brand_name="{{ $data->model_name }}">
                                                <i class="fa fa-edit text-primary"
                                                    data-toggle="tooltip"
                                                    data-original-title="Edit Data"></i>
                                            </a>
                                            <a class="ml-3" style="cursor: pointer"
                                                data-target="#deleteModal" data-toggle="modal"
                                                data-brand_name="{{ $data->model_name }}"
                                                data-brand_id="{{ $data->model_id }}"
                                                data-brand_id_enc="{{ encrypt($data->model_id) }}">
                                                <i class="fa fa-times text-danger"
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
                <h3 class="modal-title" id="exampleModalLabel" style="font-weight: bold">DATA BARANG BARU</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" enctype="multipart/form-data" action="/barang/stok/newCategoryStock">
                @csrf
                <div class="modal-body">
                    <div class="form-group" style="padding:0">
                        <label for="category_name" class="col-form-label" style="font-weight: bold; padding-bottom:0">Kategori<span style="color: red">*</span></label>
                        <select class="form-control"
                            id="addNewModel" style="border-color: #aaaaaa" data-width="100%"
                            name="kategori_id" required>
                            <option></option>
                            @foreach ($category as $data)
                                <option value="{{ $data->category_id }}">
                                    {{ $data->kategori }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" style="padding:20px 0px 0px 0px">
                        <label for="model_id" class="col-form-label" style="font-weight: bold; padding-bottom:0">Model ID<span style="color: red">*</span></label>
                        <input type="text" class="form-control form-control" style="border-color: #aaaaaa"
                            placeholder="LNV01" id="model_id"
                            name="model_id">
                    </div>
                    <div class="form-group" style="padding:20px 0px 0px 0px">
                        <label for="model_name" class="col-form-label" style="font-weight: bold; padding-bottom:0">Model<span style="color: red">*</span></label>
                        <input type="text" class="form-control form-control" style="border-color: #aaaaaa"
                            placeholder="Lenovo 80SX" id="model_name"
                            name="model_name">
                    </div>
                    <div class="form-group" style="padding:20px 0px 0px 0px">
                        <label for="model_name" class="col-form-label" style="font-weight: bold; padding-bottom:0">Gambar<span style="color: red">*</span></label>
                        <input type="file"
                            class="form-control form-control" style="border-color: #aaaaaa"
                            id="itemImage" name="itemImage">
                    </div>
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
        $('#addNewModel').select2({
            dropdownParent: $('#addModalCenter'),
            placeholder: 'Pilih Kategori'
        });
    </script>
@endsection
