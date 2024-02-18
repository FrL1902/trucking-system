@extends('layout.layout')

@section('content')

<div class="page-header">
    <h4 class="page-title">DETAIL MODEL BARANG</h4>
    <ul class="breadcrumbs">
        <li class="nav-home">
            <i class="flaticon-home"></i>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="separator">
            <a>Detail Model Barang</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title"><strong>ID : {{$data->model_id}}</strong></h4>
                </div>
            </div>
            {{-- @foreach ($data as $data)
                <p>{{$data->model_id}}</p>
            @endforeach --}}
            <div class="card-body">
                <div class="form-group">
                    <label for="largeInput">ID</label>
                    <input class="form-control" type="text" placeholder="{{ $data->model_id }}"
                        aria-label="Disabled input example" disabled>
                </div>
                <div class="form-group">
                    <label for="largeInput">Model</label>
                    <input class="form-control" type="text" placeholder="{{ $data->model_name }}"
                        aria-label="Disabled input example" disabled>
                </div>
                <div class="form-group">
                    <label for="largeInput">Kategori</label>
                    <input class="form-control" type="text" placeholder="{{ $data->category->kategori }}"
                        aria-label="Disabled input example" disabled>
                </div>
                <div class="modal-body modal-img">
                    <label for="largeInput"><strong>Gambar Model</strong></label>
                    <img class="img-place rounded mx-auto d-block" style=""
                        src="{{ Storage::url($data->gambar) }}" alt="no picture" loading="lazy">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title"><strong>Barang Masuk</strong></h4>
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
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title"><strong>Barang Keluar</strong></h4>
                </div>
            </div>
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
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('table.display').DataTable();
    } );
</script>
@endsection
