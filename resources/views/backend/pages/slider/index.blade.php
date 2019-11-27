@extends('backend.master.master')

@section('title', 'Sliders')

    @push('css')
    @endpush

@section('mainContent')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Slider Tables</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('admin.dashboard') }}">Home</a>
                </li>
                <li>
                    <span>Tables</span>
                </li>
                <li class="active">
                    <strong>Slider Tables</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Sliders</h5>
                    </div>
                    <div class="ibox-content">

                        <table class="table">
                            <thead>
                            <tr>
                                <th>SI</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sliders as $key =>  $slider)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td> {{ $slider->image }} </td>
                                    <td>{{ $slider->title }}</td>
                                    <td>
                                        <a href="#0" class="btn btn-primary">Edit</a>
                                        <a href="#0" class="btn btn-danger">Delete</a>
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


@push('script')
@endpush
