@extends('layout.layout')

@section('content')

<div class="page-header">
    <h4 class="page-title">UPDATE DETAIL BARANG KELUAR</h4>
    <ul class="breadcrumbs">
        <li class="nav-home">
            <i class="flaticon-home"></i>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="separator">
            <a>Update Detail Barang Keluar</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <form method="post" enctype="multipart/form-data" action="/barang/keluar/update">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="largeInput">ID Barang Keluar</label>
                        <input class="form-control" type="text" placeholder="{{ $detail->keluar_id }}"
                            aria-label="Disabled input example" disabled>
                    </div>
                    <input type="hidden" name="masuk_id" value={{ $detail->keluar_id}}>
                    <div class="form-group">
                        <label for="largeInput">Model</label>
                        <input class="form-control" type="text" placeholder="{{ $detail->model_id }}"
                            aria-label="Disabled input example" disabled>
                    </div>
                    <div class="form-group">
                        <label for="largeInput">Lokasi</label>
                        <input class="form-control" type="text" placeholder="{{ $detail->location_id }}"
                            aria-label="Disabled input example" disabled>
                    </div>
                    <div class="form-group">
                        <label for="largeInput">User-PIC</label>
                        <input class="form-control" type="text" value="{{ $detail->assigned_user }}" name="assigned_user"
                            aria-label="Disabled input example" >
                    </div>
                    @if ($detail->is_pc)
                        <div class="form-group">
                            <label for="largeInput">Processor</label>
                            <input class="form-control" type="text" value="{{ $detail->Processor }}" name="processor"
                                aria-label="Disabled input example" required>
                        </div>
                        <div class="form-group">
                            <label for="largeInput">RAM</label>
                            <input class="form-control" type="text" value="{{ $detail->RAM }}" name="ram"
                                aria-label="Disabled input example" required>
                        </div>
                        <div class="form-group">
                            <label for="largeInput">GPU</label>
                            <input class="form-control" type="text" value="{{ $detail->GPU }}" name="gpu"
                                aria-label="Disabled input example" required>
                        </div>
                        <div class="form-group">
                            <label for="largeInput">Storage</label>
                            <input class="form-control" type="text" value="{{ $detail->Storage }}" name="storage"
                                aria-label="Disabled input example" required>
                        </div>
                        <div class="form-group">
                            <label for="largeInput">Operating System</label>
                            <input class="form-control" type="text" value="{{ $detail->OS }}" name="operating_system"
                                aria-label="Disabled input example" required>
                        </div>
                        <div class="form-group">
                            <label for="largeInput">License</label>
                            <input class="form-control" type="text" value="{{ $detail->License }}" name="license"
                                aria-label="Disabled input example" required>
                        </div>
                        <div class="form-group">
                            <label for="largeInput">Monitor</label>
                            <input class="form-control" type="text" value="{{ $detail->Monitor }}" name="monitor"
                                aria-label="Disabled input example" required>
                        </div>
                        <div class="form-group">
                            <label for="largeInput">Keyboard</label>
                            <input class="form-control" type="text" value="{{ $detail->Keyboard }}" name="keyboard"
                                aria-label="Disabled input example" required>
                        </div>
                        <div class="form-group">
                            <label for="largeInput">Mouse</label>
                            <input class="form-control" type="text" value="{{ $detail->Mouse }}" name="mouse"
                                aria-label="Disabled input example" required>
                        </div>
                    @endif

                    @if (($detail->is_pc))
                        <div class="form-group">
                            <label for="largeInput">Stok</label>
                            <input class="form-control" type="text" placeholder="{{ $detail->stok }}"
                                aria-label="Disabled input example" disabled>
                        </div>
                    @else
                        <div class="form-group">
                            <label for="largeInput">Stok</label>
                            <input class="form-control" type="text" value="{{ $detail->stok }}" name="stok"
                                aria-label="Disabled input example">
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="largeInput">Keterangan</label>
                        <input class="form-control" type="text" value="{{ $detail->keterangan }}" name="keterangan"
                            aria-label="Disabled input example" required>
                    </div>
                    <div class="form-group">
                        <label for="largeInput">SN</label>
                        <input class="form-control" type="text" name="SN" value="{{ $detail->SN }}"
                            aria-label="Disabled input example" required>
                    </div>
                    <div class="form-group">
                        <label for="largeInput">Tanggal Dimasukkan Sistem</label>
                        <input class="form-control" type="text" placeholder="{{ $detail->created_at }}"
                            aria-label="Disabled input example" disabled>
                    </div>
                    <div class="modal-body modal-img">
                        <label for="largeInput"><strong>GAMBAR BARANG KELUAR (sekarang)</strong></label>
                        <img class="img-place rounded mx-auto d-block" style=""
                            src="{{ Storage::url($detail->gambar1) }}" alt="no picture" loading="lazy">
                    </div>
                    <div class="modal-body modal-img">
                        <label for="largeInput"><strong>GAMBAR SERAH TERIMA (sekarang)</strong></label>
                        <img class="img-place rounded mx-auto d-block" style=""
                            src="{{ Storage::url($detail->gambar2) }}" alt="no picture" loading="lazy">
                    </div>
                    <div class="d-flex justify-content-center">
                        <div style="width:100%">
                            <div class="form-group" style="padding:0 6px 0 0">
                                <label for="exampleFormControlFile1" class="col-form-label" style="font-weight: bold; padding-bottom:0">GAMBAR BARANG BARU (jika ada)<span style="color: red">*</span></label>
                                <input type="file" class="form-control-file" style="height:40px" id="exampleFormControlFile1" name="gambar1">
                            </div>
                        </div>
                        <div style="width:100%">
                            <div class="form-group" style="padding:0 0 0 6px">
                                <label for="exampleFormControlFile2" class="col-form-label" style="font-weight: bold; padding-bottom:0">GAMBAR SERAH TERIMA BARU (jika ada)<span style="color: red">*</span></label>
                                <input type="file" class="form-control-file" style="height:40px" id="exampleFormControlFile2" name="gambar2">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
