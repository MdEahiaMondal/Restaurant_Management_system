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
            <a class="btn btn-primary m-t-lg" href="{{ route('sliders.create') }}">
                <i class="fa fa-plus"></i> Add New
            </a>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">

        @include('backend.message.msg')

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Sliders  <strong class="badge badge-danger">{{$sliders->count()}}</strong> </h5>
                    </div>
                    <div class="ibox-content">

                        <table class="table">
                            <thead>
                            <tr>
                                <th>SI</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sliders as $key =>  $slider)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><img style="width: 400px; height: 200px" src="{{ asset('uploads/sliders/'.$slider->image) }}" alt=""> </td>
                                    <td>{{ $slider->title }}</td>
                                    <td>{{ $slider->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('sliders.edit', $slider->id) }}" class="btn btn-primary">Edit</a>


                                        <form style="display: none" action="{{ route('sliders.destroy', $slider->id) }}"
                                              method="post" id="form-delete-{{ $slider->id }}">
                                            @csrf
                                            @method('DELETE')
                                        </form>


                                        <button type="button" onclick="if (confirm('Are you sure to delete this item ?'))
                                        {
                                            event.preventDefault();
                                            document.getElementById('form-delete-{{ $slider->id }}').submit();
                                        }else{
                                            event.preventDefault()
                                            }" class="btn btn-danger">Delete</button>
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
