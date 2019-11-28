@extends('backend.master.master')

@section('title', 'Items Create')

@push('css')
@endpush

@section('mainContent')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Item Create</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('admin.dashboard') }}">Home</a>
                </li>
                <li>
                    <span>Create</span>
                </li>
                <li class="active">
                    <strong>Item Create</strong>
                </li>
            </ol>

        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Item <small>Please file up this form</small></h5>
                    </div>
                    <div class="ibox-content">


                        <div class="row">

                            <div class="col-sm-6 b-r">

                                <form role="form" enctype="multipart/form-data" action="{{ route('items.store') }}" method="post">
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
                                        <label for="name">Name</label>
                                        <input type="text" value="{{ old('name') }}"  name="name" id="name" placeholder="Enter name" class="form-control">
                                        @error('name')
                                        <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="text" value="{{ old('price') }}"  name="price" id="price" placeholder="Enter Price" class="form-control">
                                        @error('price')
                                        <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Select</label>
                                            <select  class="form-control " name="category_id">
                                                <option>>>>>Choose Category >>>></option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" class="form-control" cols="" rows="5">{{ old('description') }}</textarea>
                                        @error('description')
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
