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
                                <th style="width: 16%; text-align: center;">Nama Barang</th>
                                <th style="text-align: center;">Quantity</th>
                                <th style="text-align: center;">Deskripsi</th>
                                <th style="width: 6%; text-align: center;">Edit</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th style="width: 16%; text-align: center;">Nama Barang</th>
                                <th style="text-align: center;">Quantity</th>
                                <th style="text-align: center;">Deskripsi</th>
                                <th style="width: 6%; text-align: center;">Edit</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>Oli Hino Shell</td>
                                <td>200</td>
                                <td>200 Pint Oli Hino</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a style="cursor: pointer" data-target="#editModalCenter"
                                            data-toggle="modal" data-brand_id="1"
                                            data-brand_name="2">
                                            <i class="fa fa-edit text-primary"
                                                data-toggle="tooltip"
                                                data-original-title="Edit Data"></i>
                                        </a>
                                        <a class="ml-3" style="cursor: pointer"
                                            data-target="#deleteModal" data-toggle="modal"
                                            data-brand_name="2"
                                            data-brand_id="1"
                                            data-brand_id_enc="{{ encrypt(3) }}">
                                            <i class="fa fa-times text-danger"
                                                data-toggle="tooltip"
                                                data-original-title="Hapus Data"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Velg truk 1100 10 lubang 20 inch untuk hino 500</td>
                                <td>11</td>
                                <td>Velg truk 1100 10 lubang 20 inch untuk hino 500</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a style="cursor: pointer" data-target="#editModalCenter"
                                            data-toggle="modal" data-brand_id="1"
                                            data-brand_name="2">
                                            <i class="fa fa-edit text-primary"
                                                data-toggle="tooltip"
                                                data-original-title="Edit Data"></i>
                                        </a>
                                        <a class="ml-3" style="cursor: pointer"
                                            data-target="#deleteModal" data-toggle="modal"
                                            data-brand_name="2"
                                            data-brand_id="1"
                                            data-brand_id_enc="{{ encrypt(3) }}">
                                            <i class="fa fa-times text-danger"
                                                data-toggle="tooltip"
                                                data-original-title="Hapus Data"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Fuel Pump Hino</td>
                                <td>3</td>
                                <td>Brand new fuel pump Hino Dutro Dump 110 HD</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a style="cursor: pointer" data-target="#editModalCenter"
                                            data-toggle="modal" data-brand_id="1"
                                            data-brand_name="2">
                                            <i class="fa fa-edit text-primary"
                                                data-toggle="tooltip"
                                                data-original-title="Edit Data"></i>
                                        </a>
                                        <a class="ml-3" style="cursor: pointer"
                                            data-target="#deleteModal" data-toggle="modal"
                                            data-brand_name="2"
                                            data-brand_id="1"
                                            data-brand_id_enc="{{ encrypt(3) }}">
                                            <i class="fa fa-times text-danger"
                                                data-toggle="tooltip"
                                                data-original-title="Hapus Data"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
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

{{-- <div class="modal fade" id="addModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                                <option value="asdfasdf">
                                    1
                                </option>

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
@endsection --}}

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
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLongTitle" style="font-weight: bold">
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="/editCategory">
                @csrf
                <div class="modal-body">
                    <div class="form-group" style="padding:0">
                        <label for="category_id" class="col-form-label" style="font-weight: bold; padding-bottom:0">NAMA SPARE PART<span style="color: red">*</span></label>
                        <input type="text" class="form-control form-control" style="border-color: #aaaaaa"
                            placeholder="Oli shell" id="category_id"
                            name="category_id" required>
                    </div>
                    <div class="form-group" style="padding:20px 0px 0px 0px">
                        <label for="category_name" class="col-form-label" style="font-weight: bold; padding-bottom:0">Quantity<span style="color: red">*</span></label>
                        <input type="text" class="form-control form-control" style="border-color: #aaaaaa"
                            placeholder="100" id="category_name"
                            name="category_name" required>
                    </div>
                    <div class="form-group" style="padding:20px 0px 0px 0px">
                        <label for="category_name" class="col-form-label" style="font-weight: bold; padding-bottom:0">Deskripsi<span style="color: red">*</span></label>
                        <input type="text" class="form-control form-control" style="border-color: #aaaaaa"
                            placeholder="Oli truk shell" id="category_name"
                            name="category_name" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                <input type="hidden" class="form-control brandIdHidden" name="category_id"
                        value="#">
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="addModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel" style="font-weight: bold">SPARE PART BARU</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="/newCategory">
                @csrf
                <div class="modal-body">
                    <div class="form-group" style="padding:0">
                        <label for="category_id" class="col-form-label" style="font-weight: bold; padding-bottom:0">NAMA SPARE PART<span style="color: red">*</span></label>
                        <input type="text" class="form-control form-control" style="border-color: #aaaaaa"
                            placeholder="Oli shell" id="category_id"
                            name="category_id" required>
                    </div>
                    <div class="form-group" style="padding:20px 0px 0px 0px">
                        <label for="category_name" class="col-form-label" style="font-weight: bold; padding-bottom:0">Quantity<span style="color: red">*</span></label>
                        <input type="text" class="form-control form-control" style="border-color: #aaaaaa"
                            placeholder="100" id="category_name"
                            name="category_name" required>
                    </div>
                    <div class="form-group" style="padding:20px 0px 0px 0px">
                        <label for="category_name" class="col-form-label" style="font-weight: bold; padding-bottom:0">Deskripsi<span style="color: red">*</span></label>
                        <input type="text" class="form-control form-control" style="border-color: #aaaaaa"
                            placeholder="Oli truk shell" id="category_name"
                            name="category_name" required>
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
    <script type="text/javascript">
        $('#deleteModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var brand_name = button.data('brand_name')
            var brand_id = button.data('brand_id')
            var brand_id_enc = button.data('brand_id_enc')
            var modal = $(this)


            modal.find('.modal-title').text('HAPUS SPARE PART')
            modal.find('.modal-text').text('Apa anda yakin untuk menghapus data Spare Part?')
            modal.find('.deleteBrand').attr('href', '/deleteCategory/' + brand_id_enc)

        })

        // empty inputs after clicking on the 'a' that opens the modal for update brand name. i think this can be used for other things, ye bisa ternyata
        $(document).ready(function() {
            $("a").on("click", function() {
                $(".brand_update_field").val("");
            })
        });


        $('#editModalCenter').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var brand_id = button.data('brand_id')
            var brand_name = button.data('brand_name')
            var modal = $(this)

            modal.find('.modal-title').text('UPDATE DATA SPARE PART')
            modal.find('.brandIdHidden').attr('value', brand_id)
            modal.find('.test-placeholder').attr('value', brand_name)

        })
    </script>

@endsection
