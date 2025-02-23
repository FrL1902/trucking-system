@extends('layout.layout')

@section('content')

@section('inactiveItem', 'active')
<div class="page-header">
    <h4 class="page-title">About</h4>
    <ul class="breadcrumbs">
        <li class="nav-home">
            <i class="flaticon-home"></i>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="separator">
            <a>About This Project</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">


            <div class="card-header">
                <div class="d-flex align-items-center">
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

@endsection
