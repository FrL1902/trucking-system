@extends('layout.layout')

@section('content')

@section('location', 'active')
<div class="page-header">
    <h4 class="page-title">Driver</h4>
    <ul class="breadcrumbs">
        <li class="nav-home">
            <i class="flaticon-home"></i>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="separator">
            <a>Data Driver</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">


            <div class="card-header">
                <div class="d-flex align-items-center">
                    {{-- <h4 class="card-title">Data Lokasi</h4> --}}
                    <button type="button" class="btn btn-primary ml-3 mr-3" data-target="#addModalCenter" data-toggle="modal"><strong>ADD</strong></button>
                </div>
            </div>


            <div class="card-body">
                <div class="table-responsive">
                    <table id="add-row" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th style="width: 16%">ID Lokasi</th>
                                <th style="width: 20%">Lokasi</th>
                                <th>Alamat</th>
                                <th style="width: 6%">Edit</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID Lokasi</th>
                                <th>Lokasi</th>
                                <th>Alamat</th>
                                <th>Edit</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
