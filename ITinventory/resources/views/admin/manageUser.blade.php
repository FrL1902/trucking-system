@extends('layout.layout')

@section('content')

@section('user', 'active')

<div class="page-header">
    <h4 class="page-title">KELOLA USER</h4>
    <ul class="breadcrumbs">
        <li class="nav-home">
            <i class="flaticon-home"></i>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="separator">
            <a>Kelola User</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <button type="button" class="btn btn-primary ml-3 mr-3" data-target="#addModalCenter" data-toggle="modal"><strong>ADD</strong></button>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="add-row" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            @foreach ($user as $data)
                                <tr>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a style="cursor: pointer"
                                                data-target="#editPasswordCenter{{ $data->id }}"
                                                data-toggle="modal"><i class="fa fa-key text-warning"
                                                    data-toggle="tooltip"
                                                    data-original-title="Change Password">
                                                </i></a>
                                            <a class="ml-3" style="cursor: pointer"
                                                data-target="#editModalCenter{{ $data->id }}"
                                                data-toggle="modal"><i class="fa fa-edit text-primary"
                                                    data-toggle="tooltip" data-original-title="edit user">
                                                </i></a>

                                            @if (auth()->user()->id == $data->id)
                                                <a class="ml-3" style="cursor: pointer">
                                                    <i class="fas fa-user text-danger"
                                                        data-toggle="tooltip"
                                                        data-original-title="Cannot delete yourself">
                                                    </i>
                                                </a>
                                                @else
                                                <a class="ml-3" style="cursor: pointer"
                                                    data-target="#deleteModal{{ $data->id }}"
                                                    data-toggle="modal"><i
                                                        class="fa fa-times text-danger"
                                                        data-toggle="tooltip"
                                                        data-original-title="Delete User">
                                                    </i></a>
                                            @endif
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

<div class="modal fade" id="addModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel" style="font-weight: bold">TAMBAH USER BARU</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="/user/new">
                @csrf
                <div class="modal-body">
                    <div class="form-group" style="padding:20px 0px 0px 0px">
                        <label for="model_id" class="col-form-label" style="font-weight: bold; padding-bottom:0">Email<span style="color: red">*</span></label>
                        <input type="text" class="form-control form-control" style="border-color: #aaaaaa"
                            placeholder="LNV01" id="model_id"
                            name="model_id">
                    </div>
                    <div class="form-group" style="padding:20px 0px 0px 0px">
                        <label for="model_name" class="col-form-label" style="font-weight: bold; padding-bottom:0">Nama<span style="color: red">*</span></label>
                        <input type="text" class="form-control form-control" style="border-color: #aaaaaa"
                            placeholder="Lenovo 80SX" id="model_name"
                            name="model_name">
                    </div>
                    <div class="form-group" style="padding:20px 0px 0px 0px">
                        <label for="model_name" class="col-form-label" style="font-weight: bold; padding-bottom:0">Password<span style="color: red">*</span></label>
                        <input type="text" class="form-control form-control" style="border-color: #aaaaaa"
                            placeholder="Lenovo 80SX" id="model_name"
                            name="model_name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Insert Data</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="form-button-action">

    <!-- Modal update username -->
    <div class="modal fade"
        id="editModalCenter{{ $data->id }}" tabindex="-1"
        role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered"
            role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title"
                        id="exampleModalLongTitle">
                        <strong>Update data for
                            "{{ $data->name }}"</strong>
                    </h3>
                    <button type="button" class="close"
                        data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="/tex">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text"
                                    class="form-control"
                                    placeholder="enter new username"
                                    aria-label=""
                                    aria-describedby="basic-addon1"
                                    name="usernameformupdate"
                                    required>
                                <div class="card mt-5 ">
                                    <button id=""
                                        class="btn btn-primary">Update
                                        Data</button>
                                </div>
                            </div>

                            <input type="hidden"
                                class="form-control"
                                name="userIdHidden"
                                value="{{ $data->id }}">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Change Password Modal -->
    <div class="modal fade"
        id="editPasswordCenter{{ $data->id }}" tabindex="-1"
        role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered"
            role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title"
                        id="exampleModalLongTitle">
                        <strong>Update password for
                            "{{ $data->name }}"</strong>
                    </h3>
                    <button type="button" class="close"
                        data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post"
                        action="/newPasswordFromAdmin">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="password"
                                    class="placeholder"><b>New
                                        Password</b></label>
                                <div class="position-relative">
                                    <input id="password"
                                        name="changePassword"
                                        type="password"
                                        class="form-control"
                                        required>
                                    <div class="show-password">
                                        <i
                                            class="flaticon-interface">
                                            show password</i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password"
                                    class="placeholder"><b>Confirm
                                        Password</b></label>
                                <div class="position-relative">
                                    <input id="password"
                                        name="changePassword2"
                                        type="password"
                                        class="form-control"
                                        required>
                                    <div class="show-password">
                                        <i
                                            class="flaticon-interface">
                                            show password</i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="card mt-5 ">
                                    <button id=""
                                        class="btn btn-primary">Update
                                        Data</button>
                                </div>
                            </div>

                            <input type="hidden"
                                class="form-control"
                                name="userIdHidden"
                                value="{{ $data->id }}">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal{{ $data->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"
                        id="exampleModalLabel">
                        <strong>PENGHAPUSAN USER</strong>
                    </h5>
                    <button type="button" class="close"
                        data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin untuk menghapus user
                        "{{ $data->name }}"?</p>
                    <p>Data yang berhubungan dengan user ini akan
                        tidak bisa diakses / akan terhapus</p>
                </div>
                <div class="modal-footer">
                    <button type="button"
                        class="btn btn-secondary" id="close-modal"
                        data-dismiss="modal">Tidak</button>
                    <a href="/deleteUser/{{ encrypt($data->id) }}"
                        class="btn btn-danger">YAKIN
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
