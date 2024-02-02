@extends('layout.layout')

@section('content')

@section('location', 'active')
<div class="page-header">
    <h4 class="page-title">LOKASI</h4>
    <ul class="breadcrumbs">
        <li class="nav-home">
            <i class="flaticon-home"></i>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="separator">
            <a>Data Lokasi</a>
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
                        <tbody>
                            @foreach ($location as $location)
                                <tr>
                                    <td>{{ $location->location_id }}</td>
                                    <td>{{ $location->lokasi }}</td>
                                    <td>{{ $location->alamat }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a style="cursor: pointer" data-target="#editModalCenter"
                                                data-toggle="modal" data-brand_id="{{ $location->location_id }}"
                                                data-brand_name="{{ $location->lokasi }}"
                                                data-brand_alamat="{{ $location->alamat }}">
                                                <i class="fa fa-edit mt-3 text-primary"
                                                    data-toggle="tooltip"
                                                    data-original-title="Edit Brand"></i>
                                            </a>
                                            <a class="ml-3 mb-2" style="cursor: pointer"
                                                data-target="#deleteModal" data-toggle="modal"
                                                data-brand_name="{{ $location->lokasi }}"
                                                data-brand_id="{{ $location->location_id }}"
                                                data-brand_alamat="{{ $location->alamat }}"
                                                data-brand_id_enc="{{ encrypt($location->location_id) }}">
                                                <i class="fa fa-times mt-3 text-danger"
                                                    data-toggle="tooltip"
                                                    data-original-title="Hapus Brand"></i>
                                            </a>
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
                <h3 class="modal-title" id="exampleModalLabel" style="font-weight: bold">KATEGORI BARU</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="/newLocation">
                @csrf
                <div class="modal-body">
                    <div class="form-group" style="padding:0">
                        <label for="location_id" class="col-form-label" style="font-weight: bold; padding-bottom:0">ID Lokasi<span style="color: red">*</span></label>
                        <input type="text" class="form-control form-control" style="border-color: #aaaaaa"
                            placeholder="PLC01" id="location_id"
                            name="location_id">
                    </div>
                    <div class="form-group" style="padding:20px 0px 0px 0px">
                        <label for="location_name" class="col-form-label" style="font-weight: bold; padding-bottom:0">Nama Lokasi<span style="color: red">*</span></label>
                        <input type="text" class="form-control form-control" style="border-color: #aaaaaa"
                            placeholder="INTAN PUSAT" id="location_name"
                            name="location_name">
                    </div>
                    <div class="form-group" style="padding:20px 0px 0px 0px">
                        <label for="location_address" class="col-form-label" style="font-weight: bold; padding-bottom:0">Alamat Lokasi<span style="color: red">*</span></label>
                        <textarea class="form-control" id="location_address" style="border-color: #aaaaaa" placeholder="Jl. Rawamangun Gg. Ps. Genjing No.45, RT.7/RW.3" name="location_address"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button> --}}
                    <button type="submit" class="btn btn-primary">Insert Data</button>
                </div>
            </form>
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
            {{-- <form method="post" action="/updateBrand">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Brand</label>
                        <input type="text" class="form-control brand_update_field"
                            placeholder="masukkan nama brand" aria-label=""
                            aria-describedby="basic-addon1" name="brandnameformupdate">
                        <div class="card mt-5 ">
                            <button id="" class="btn btn-primary">Update
                                Data Brand</button>
                        </div>
                    </div>
                    <input type="hidden" class="form-control brandIdHidden" name="brandIdHidden"
                        value="#">
                </div>
            </form> --}}
            <form method="post" action="/editLocation">
                @csrf
                <div class="modal-body">
                    <div class="form-group" style="padding:0">
                        <label for="location_name" class="col-form-label" style="font-weight: bold; padding-bottom:0">Lokasi<span style="color: red">*</span></label>
                        <input type="text" class="form-control form-control test-placeholder" style="border-color: #aaaaaa"
                            placeholder="Komputer Rakitan" id="location_name"
                            name="location_name">
                    </div>
                    <div class="form-group" style="padding:20px 0px 0px 0px">
                        <label for="location_address" class="col-form-label" style="font-weight: bold; padding-bottom:0">Alamat<span style="color: red">*</span></label>
                        <input type="text" class="form-control form-control alamat-holder" style="border-color: #aaaaaa"
                            placeholder="Komputer Rakitan" id="location_address"
                            name="location_address">
                        {{-- <textarea type="text" class="form-control  alamat-holder" id="category_alamat" style="border-color: #aaaaaa" placeholder="Jl. Rawamangun Gg. Ps. Genjing No.45, RT.7/RW.3" name="category_alamat" ></textarea> --}}
                        {{-- <textarea type="text" class="form-control " id="category_alamat" style="border-color: #aaaaaa" placeholder="Jl. Rawamangun Gg. Ps. Genjing No.45, RT.7/RW.3" name="category_alamat"></textarea> --}}

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                <input type="hidden" class="form-control locationIdHidden" name="locationIdHidden"
                        value="#">
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


            modal.find('.modal-title').text('HAPUS LOKASI "' + brand_id + '"')
            modal.find('.modal-text').text('Apa anda yakin untuk menghapus lokasi "' + brand_name + '" ?')
            modal.find('.deleteBrand').attr('href', '/deleteBrand/' + brand_id_enc)

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
            var brand_alamat = button.data('brand_alamat')
            var modal = $(this)

            modal.find('.modal-title').text('UPDATE LOKASI "' + brand_id + '"')
            modal.find('.locationIdHidden').attr('value', brand_id)
            modal.find('.test-placeholder').attr('value', brand_name)
            modal.find('.alamat-holder').attr('value', brand_alamat)

        })
    </script>

@endsection
