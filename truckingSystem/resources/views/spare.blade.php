@extends('layout.layout')

@section('content')

@section('categoryStock', 'active')
<div class="page-header">
    <h4 class="page-title">Spare Parts</h4>
    <ul class="breadcrumbs">
        <li class="nav-home">
            <i class="flaticon-home"></i>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="separator">
            <a>Data Spare Parts</a>
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
                        {{-- <tbody>
                            @foreach ($categoryStock as $data)
                                <tr>
                                    <td>{{ $data->model_id }}</td>
                                    <td>{{ $data->model_name }}</td>
                                    <td>{{ $data->category->kategori }}</td>
                                    <td>{{ $data->stok }}</td>
                                    <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="/barang/model/detail/{{$data->model_id}}">
                                                    <i class="fa fa-info-circle mt-1 text-primary"
                                                        data-toggle="tooltip"
                                                        data-original-title="Detail"></i>
                                                </a>
                                            </div>
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
                        </tbody> --}}
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

@endsection

