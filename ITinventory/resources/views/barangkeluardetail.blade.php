@extends('layout.layout')

@section('content')

<div class="page-header">
    <h4 class="page-title">DETAIL BARANG KELUAR</h4>
    <ul class="breadcrumbs">
        <li class="nav-home">
            <i class="flaticon-home"></i>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="separator">
            <a>Detail Barang Keluar</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            {{-- <form method="post" action="/updateUser">
                @csrf --}}
                {{-- <div class="card-header">
                    <div class="card-title">Change Password</div>
                </div> --}}
                <div class="card-body">
                    <div class="form-group">
                        <label for="largeInput">ID Barang Keluar</label>
                        <input class="form-control" type="text" placeholder="{{ $detail->keluar_id }}"
                            aria-label="Disabled input example" disabled>
                    </div>
                    <div class="form-group">
                        <label for="largeInput">User-PIC</label>
                        <input class="form-control" type="text" placeholder="{{ $detail->assigned_user }}"
                            aria-label="Disabled input example" disabled>
                    </div>
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
                    @if ($detail->is_pc)
                        <div class="form-group">
                            <label for="largeInput">Processor</label>
                            <input class="form-control" type="text" placeholder="{{ $detail->Processor }}"
                                aria-label="Disabled input example" disabled>
                        </div>
                        <div class="form-group">
                            <label for="largeInput">RAM</label>
                            <input class="form-control" type="text" placeholder="{{ $detail->RAM }}"
                                aria-label="Disabled input example" disabled>
                        </div>
                        <div class="form-group">
                            <label for="largeInput">GPU</label>
                            <input class="form-control" type="text" placeholder="{{ $detail->GPU }}"
                                aria-label="Disabled input example" disabled>
                        </div>
                        <div class="form-group">
                            <label for="largeInput">Storage</label>
                            <input class="form-control" type="text" placeholder="{{ $detail->Storage }}"
                                aria-label="Disabled input example" disabled>
                        </div>
                        <div class="form-group">
                            <label for="largeInput">Operating System</label>
                            <input class="form-control" type="text" placeholder="{{ $detail->OS }}"
                                aria-label="Disabled input example" disabled>
                        </div>
                        <div class="form-group">
                            <label for="largeInput">License</label>
                            <input class="form-control" type="text" placeholder="{{ $detail->License }}"
                                aria-label="Disabled input example" disabled>
                        </div>
                        <div class="form-group">
                            <label for="largeInput">Monitor</label>
                            <input class="form-control" type="text" placeholder="{{ $detail->Monitor }}"
                                aria-label="Disabled input example" disabled>
                        </div>
                        <div class="form-group">
                            <label for="largeInput">Keyboard</label>
                            <input class="form-control" type="text" placeholder="{{ $detail->Keyboard }}"
                                aria-label="Disabled input example" disabled>
                        </div>
                        <div class="form-group">
                            <label for="largeInput">Mouse</label>
                            <input class="form-control" type="text" placeholder="{{ $detail->Mouse }}"
                                aria-label="Disabled input example" disabled>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="largeInput">Stok</label>
                        <input class="form-control" type="text" placeholder="{{ $detail->stok }}"
                            aria-label="Disabled input example" disabled>
                    </div>
                    <div class="form-group">
                        <label for="largeInput">SN</label>
                        <input class="form-control" type="text" placeholder="{{ $detail->SN }}"
                            aria-label="Disabled input example" disabled>
                    </div>
                    <div class="form-group">
                        <label for="largeInput">Tanggal Dimasukkan Sistem</label>
                        <input class="form-control" type="text" placeholder="{{ $detail->created_at }}"
                            aria-label="Disabled input example" disabled>
                    </div>
                    <div class="modal-body modal-img">
                        <label for="largeInput"><strong>GAMBAR BARANG MASUK</strong></label>
                        <img class="img-place rounded mx-auto d-block" style=""
                            src="{{ Storage::url($detail->gambar1) }}" alt="no picture" loading="lazy">
                    </div>
                    <div class="modal-body modal-img">
                        <label for="largeInput"><strong>GAMBAR SERAH TERIMA</strong></label>
                        <img class="img-place rounded mx-auto d-block" style=""
                            src="{{ Storage::url($detail->gambar2) }}" alt="no picture" loading="lazy">
                    </div>
                    {{-- <div class="form-group">
                        <label for="password" class="placeholder"><b>New Password</b></label>
                        <div class="position-relative">
                            <input id="password" name="changePassword" type="password" class="form-control"
                                required>
                            <div class="show-password">
                                <i class="flaticon-interface"> show password</i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="placeholder"><b>Confirm Password</b></label>
                        <div class="position-relative">
                            <input id="password" name="changePassword2" type="password"
                                class="form-control" required>
                            <div class="show-password">
                                <i class="flaticon-interface"> show password</i>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-4">
                        <button class="btn btn-success">Change Password</button>
                    </div> --}}
                </div>
            {{-- </form> --}}
        </div>
    </div>
</div>

@endsection
