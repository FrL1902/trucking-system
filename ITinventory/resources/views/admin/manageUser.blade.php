@extends('layout.layout')

@section('content')

{{-- @section('manageuserbutton', 'active submenu')
@section('showmanageuser', 'show')
@section('manageuser', 'active') --}}

<style>
    #alerts {
        position: relative;
        animation-name: example;
        animation-duration: 0.7s;
        animation-iteration-count: 1;
        /* animation-delay: 2s; */
    }

    @keyframes example {
        0% {
            left: 200px;
            top: 0px;
        }

        100% {
            left: 0px;
            top: 0px;
        }
    }
</style>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Mengelola Akun</h4>
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
                                            <a style="cursor: pointer" class="ml-3"
                                                data-target="#editPasswordCenter{{ $data->id }}"
                                                data-toggle="modal"><i class="fa fa-key mt-3 text-warning"
                                                    data-toggle="tooltip"
                                                    data-original-title="Change Password">
                                                </i></a>
                                            <a class="ml-3" style="cursor: pointer"
                                                data-target="#editModalCenter{{ $data->id }}"
                                                data-toggle="modal"><i class="fa fa-edit mt-3 text-primary"
                                                    data-toggle="tooltip" data-original-title="edit user">
                                                </i></a>

                                            @if (auth()->user()->id == $data->id)
                                                <a class="ml-3" style="cursor: pointer">
                                                    <i class="fas fa-user mt-3 text-danger"
                                                        data-toggle="tooltip"
                                                        data-original-title="Cannot delete yourself">
                                                    </i>
                                                </a>
                                                @else
                                                {{-- <a href="/deleteUser/{{ $data->id }}">
                                            <i class="fa fa-times mt-3 text-danger"
                                                data-toggle="tooltip" data-original-title="Delete User">
                                            </i>
                                        </a> --}}

                                                {{-- ini -pake style cursor pake pointer buat efek hover. knp gak pake href kyk diatas? soalnya href bisa ngasihtau linknya dibawah gt, linknya tuh bisa berisi data penting, jadinya jgn pake itu kalo buttons
                                            https://www.w3schools.com/cssref/tryit.php?filename=trycss_cursor
                                            tapi yg tombol delete aslinya yg di modal masih apke href, gak tau gmn caranya biar delete ga pake href dan method "get" 5 --}}
                                                <a class="ml-3" style="cursor: pointer"
                                                    data-target="#deleteModal{{ $data->id }}"
                                                    data-toggle="modal"><i
                                                        class="fa fa-times mt-3 text-danger"
                                                        data-toggle="tooltip"
                                                        data-original-title="Delete User">
                                                    </i></a>
                                            @endif
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
                                                            {{-- <button type="button"
                                                                class="btn btn-danger">Yakin</button> --}}

                                                            {{-- jadi kalo mau delete pake ini aja deh, jadi tombol href didalem modalnya, nah skrg yg aku mau itu gmn caranya tombol icon yang dari manage usernya bisa ngaktifin modal, tombol icon, bukan tombol kotaknya, terus yg href delete di modalnya baru tombol kotak  3 --}}

                                                            <a href="/deleteUser/{{ encrypt($data->id) }}"
                                                                class="btn btn-danger">
                                                                {{-- <i class="btn btn-danger"
                                                                    data-original-title="Delete User"> SETUJU
                                                                </i> --}}YAKIN
                                                            </a>

                                                            {{-- UDAH BISA, DESAIN DALEM MODAL UDAH KYK GITU, BENER. tp yg iconnya yg diluar modal belom, sama tambahin delete notificationnya, kyk diatas gt, "user apalah telah berhasil didelete" 4 --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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

@endsection
