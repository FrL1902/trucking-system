@extends('layout.layout')

@section('content')

@section('inactiveItem', 'active')
<div class="page-header">
    <h4 class="page-title">About</h4>
    <ul class="breadcrumbs">
        <li class="nav-home">
            <i class="flaticon-home"></i>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="separator">
            <a>About This Project</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1>Hey</h1>
                <p>Please refer to the documentations here</p>
                <br>
                <a href="https://drive.google.com/file/d/1TWbi6QvsHg4XByjyy50Wp3c48EOdbm1o/view?usp=sharing"  target="_blank">My personal CV</a>
                <br>
                <a href="https://drive.google.com/file/d/12aHB56rO_0M1-fg5Y-KY49EHgGCSKdA-/view?usp=sharing"  target="_blank">The Proposal</a>
                <br>
                <a href="https://drive.google.com/file/d/1zJr1HrsgKVPvW654tFgUFdST30_i5ACm/view?usp=sharing"  target="_blank">System Planning and Design</a>
                <br>
                <a href="https://github.com/FrL1902/trucking-system"  target="_blank">The GitHub Repository for this project</a>
            </div>
        </div>
    </div>
</div>

@endsection
