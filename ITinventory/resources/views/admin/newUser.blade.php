@extends('layout.layout')

@section('content')

@section('manageuserbutton', 'active submenu')
@section('showmanageuser', 'show')
@section('newuser', 'active')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <form method="post" action="/makeUser">
                @csrf
                <div class="card-header">
                    <div class="card-title">Buat Akun User Baru</div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" placeholder="Username" aria-label=""
                            aria-describedby="basic-addon1" name="usernameform" required>
                    </div>
                    <div class="form-group">
                        <label for="email1">Email Address</label>
                        <input type="email" class="form-control" id="email1" placeholder="Enter Email"
                            name="emailform" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password"
                            name="passwordform" required>
                    </div>
                    <div class="form-check">
                        <label>Role</label><br />
                        <label class="form-radio-label">
                            <input class="form-radio-input" type="radio" name="optionsRadios"
                                value="admin">
                            <span class="form-radio-sign">Admin</span>
                        </label>
                        <label class="form-radio-label ml-3">
                            <input class="form-radio-input" type="radio" name="optionsRadios"
                                value="user">
                            <span class="form-radio-sign">User</span>
                        </label>
                    </div>
                    <div class="card mt-4">
                        <button id="" class="btn btn-success">
                            <strong>Buat Akun Baru</strong>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
