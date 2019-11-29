@extends('backend.master.master')

@section('title', 'Reservation Create')

@push('css')
@endpush

@section('mainContent')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Category Create</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('admin.dashboard') }}">Home</a>
                </li>
                <li>
                    <span>Create</span>
                </li>
                <li class="active">
                    <strong>Category Create</strong>
                </li>
            </ol>

        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Category <small>Please file up this form</small></h5>
                    </div>
                    <div class="ibox-content">


                        <div class="row">

                            <div class="col-sm-12 b-r">

                                <form role="form" action="{{ route('categories.store') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" value="{{ old('name') }}"  name="name" id="name" placeholder="Enter Name" class="form-control">
                                            @error('name')
                                            <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>

                                    <div class="form-group">
                                        <input type="submit"  class="btn btn-primary">
                                        <input type="reset" class="btn btn-warning">
                                        <a href="{{ route('categories.index') }}" class="btn btn-primary">Back</a>

                                    </div>
                                </form>

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
