@extends('backend.master.master')

@section('title', 'Items')

    @push('css')
    @endpush

@section('mainContent')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Items Tables</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('admin.dashboard') }}">Home</a>
                </li>
                <li>
                    <span>Tables</span>
                </li>
                <li class="active">
                    <strong>Items Tables</strong>
                </li>
            </ol>

        </div>

        <div class="col-lg-2">
            <a class="btn btn-primary m-t-lg" href="{{ route('items.create') }}">
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
                        <h5>Items  <strong class="badge badge-danger">{{$items->count()}}</strong> </h5>
                    </div>
                    <div class="ibox-content">

                        <table class="table">
                            <thead>
                            <tr>
                                <th>SI</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $key =>  $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><img style="width: 400px; height: 200px" src="{{ asset('uploads/items/'.$item->image) }}" alt=""> </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->category->name }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('items.edit', $item->id) }}" class="btn btn-primary">Edit</a>


                                        <form style="display: none" action="{{ route('items.destroy', $item->id) }}"
                                              method="post" id="form-delete-{{ $item->id }}">
                                            @csrf
                                            @method('DELETE')
                                        </form>


                                        <button type="button" onclick="if (confirm('Are you sure to delete this item ?'))
                                        {
                                            event.preventDefault();
                                            document.getElementById('form-delete-{{ $item->id }}').submit();
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
