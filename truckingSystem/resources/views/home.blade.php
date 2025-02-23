@extends('layout.layout')

@section('content')

@section('home', 'active')

{{-- <div class="page-header">
    <h4 class="page-title">Dashboard</h4>
</div>
<div class="row">
</div> --}}


<div class="page-header">
    <h4 class="page-title">Home</h4>
</div>
<div class="row">
    <div class="col-sm">
        <div class="card card-stats card-round">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-icon">
                        <div class="icon-big text-center icon-secondary bubble-shadow-small">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                    <div class="col col-stats ml-3 ml-sm-0">
                        <div class="numbers">
                            <p class="card-category">Drivers Available</p>
                            <h4 class="card-title">7/10</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm">
        <div class="card card-stats card-round">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-icon">
                        <div class="icon-big text-center icon-success bubble-shadow-small">
                            <i class="fa fa-truck"></i>
                        </div>
                    </div>
                    <div class="col col-stats ml-3 ml-sm-0">
                        <div class="numbers">
                            <p class="card-category">Trucks Available</p>
                            <h4 class="card-title">12/20</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
