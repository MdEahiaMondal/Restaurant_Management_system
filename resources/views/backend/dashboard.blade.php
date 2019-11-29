@extends('backend.master.master')

@section('title','Dashboard')

    @push('css')

    @endpush

@section('mainContent')


    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
{{--                        <span class="label label-success pull-right">Monthly</span>--}}
                        <h5>Items</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">{{ $items }}</h1>
                        <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
                        <small>Total Items</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
{{--                        <span class="label label-info pull-right">Annual</span>--}}
                        <h5>Sliders</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">{{ $sliders }}</h1>
                        <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>
                        <small>Total Sliders</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
{{--                        <span class="label label-primary pull-right">Today</span>--}}
                        <h5>Categories</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">{{ $categories }}</h1>
                        <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div>
                        <small>Total Categories</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
{{--                        <span class="label label-danger pull-right">Low value</span>--}}
                        <h5>Reservations</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">{{ $reservations }}</h1>
                        <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i></div>
                        <small>Total reservation</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
{{--                        <span class="label label-danger pull-right">Low value</span>--}}
                        <h5>Contact Us</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">{{ $contacu_us }}</h1>
                        <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i></div>
                        <small>Total Contact Us</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('script')

@endpush
