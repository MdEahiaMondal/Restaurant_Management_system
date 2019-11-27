@extends('backend.master.master')

@section('title', 'Sliders Create')

@push('css')
@endpush

@section('mainContent')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Slider Create</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('admin.dashboard') }}">Home</a>
                </li>
                <li>
                    <span>Create</span>
                </li>
                <li class="active">
                    <strong>Slider Create</strong>
                </li>
            </ol>

        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Slider <small>Please file up this form</small></h5>
                    </div>
                    <div class="ibox-content">


                        <div class="row">

                            <div class="col-sm-6 b-r">

                                <form role="form" enctype="multipart/form-data" action="{{ route('sliders.store') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input  type="file" name="image"  accept="image/*" onchange="loadFile(event)"  placeholder="Enter email"
                                                class="form-control">
                                        @error('image')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" value="{{ old('title') }}"  name="title" id="title" placeholder="Enter Title" class="form-control">
                                            @error('title')
                                            <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>

                                    <div class="form-group">
                                        <input type="reset" class="btn btn-warning">
                                        <input type="submit"  class="btn btn-primary">
                                    </div>
                                </form>

                            </div>
                            <div class="col-sm-6"><h4>Preview Image</h4>
                                <p class="text-center">
                                    <img width="400" id="output" src="#" alt="your image" />
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('script')

    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>

@endpush
