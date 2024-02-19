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
                                <th style="width: 6%">Action</th>
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
                                                data-target="#newPassModal"
                                                data-toggle="modal"
                                                data-brand_name="{{ $data->name }}"
                                                data-brand_id="{{ $data->email }}">
                                                <i class="fa fa-key text-warning"
                                                    data-toggle="tooltip"
                                                    data-original-title="Change Password">
                                                </i>
                                            </a>

                                            @if (auth()->user()->email == $data->email)
                                                <a class="ml-3" style="cursor: pointer">
                                                    <i class="fas fa-user text-danger"
                                                        data-toggle="tooltip"
                                                        data-original-title="Cannot delete yourself">
                                                    </i>
                                                </a>
                                                @else
                                                <a class="ml-3" style="cursor: pointer"
                                                    data-target="#deleteModalMasuk"
                                                    data-toggle="modal"
                                                    data-brand_name="{{ $data->name }}"
                                                    data-brand_id="{{ encrypt($data->email) }}"><i
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

{{-- add new user --}}
<div class="modal fade" id="addModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel" style="font-weight: bold">USER BARU</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="/user/new">
                @csrf
                <div class="modal-body">
                    <div class="form-group" style="padding:0">
                        <label for="model_id" class="col-form-label" style="font-weight: bold; padding-bottom:0">Email<span style="color: red">*</span></label>
                        <input type="email" class="form-control form-control" style="border-color: #aaaaaa"
                            placeholder="LNV01" id="model_id"
                            name="email">
                    </div>
                    <div class="form-group" style="padding:20px 0px 0px 0px">
                        <label for="model_name" class="col-form-label" style="font-weight: bold; padding-bottom:0">Nama<span style="color: red">*</span></label>
                        <input type="text" class="form-control form-control" style="border-color: #aaaaaa"
                            placeholder="Lenovo 80SX" id="model_name"
                            name="name">
                    </div>
                    <div class="form-group" style="padding:20px 0px 0px 0px">
                        <label for="model_name" class="col-form-label" style="font-weight: bold; padding-bottom:0">Password<span style="color: red">*</span></label>
                        <input type="text" class="form-control form-control" style="border-color: #aaaaaa"
                            placeholder="Lenovo 80SX" id="model_name"
                            name="password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Insert Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- modal untuk update password --}}
<div class="modal fade" id="newPassModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLongTitle" style="font-weight: bold">
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="/newPasswordFromAdmin">
                @csrf
                <div class="modal-body">
                    <div class="form-group" style="padding:0">
                        <label for="password" class="col-form-label" style="font-weight: bold; padding-bottom:0">New Password<span style="color: red">*</span></label>
                        <div class="position-relative">
                            <input id="password"
                                name="changePassword"
                                type="password"
                                style="border-color: #aaaaaa"
                                class="form-control"
                                required >
                            <div class="show-password">
                                <i
                                    class="flaticon-interface">
                                    show password</i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" style="padding:20px 0px 0px 0px">
                        <label for="password2" class="col-form-label" style="font-weight: bold; padding-bottom:0">Confirm Password<span style="color: red">*</span></label>
                        <div class="position-relative">
                            <input id="password"
                                name="changePassword2"
                                type="password"
                                style="border-color: #aaaaaa"
                                class="form-control"
                                required>
                            <div class="show-password">
                                <i
                                    class="flaticon-interface">
                                    show password</i>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <input type="hidden" class="form-control email_Hidden" name="email_Hidden"
                        value="#"> --}}
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                <input type="hidden" class="form-control locationIdHidden" name="email_Hidden"
                        value="#">
            </form>
        </div>
    </div>
</div>

{{-- modal untuk delete user --}}
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
                <a href="#" class="deleteBrand btn btn-danger">YAKIN
                </a>
            </div>
        </div>
    </div>
</div>

@endsection


@section('script')
    <script>
        // delete modal
        $('#deleteModalMasuk').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var brand_id = button.data('brand_id')
            var brand_name = button.data('brand_name')
            var modal = $(this)


            modal.find('.modal-title').text('HAPUS USER ' + '"' + brand_name + '"' )
            modal.find('.modal-text').text('Apa anda yakin untuk menghapus akun USER "' + brand_name + '" ?')
            modal.find('.deleteBrand').attr('href', '/deleteUser/' + brand_id)

        })


        $('#newPassModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var brand_id = button.data('brand_id')
            var brand_name = button.data('brand_name')
            var modal = $(this)

            modal.find('.modal-title').text('UPDATE PASSWORD "' + brand_name + '"')
            // modal.find('.email_hidden').attr('value', brand_id)
            modal.find('.locationIdHidden').attr('value', brand_id)
        })
    </script>
@endsection
