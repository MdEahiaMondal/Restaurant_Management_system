@extends('backend.master.master')

@section('title', 'Contact')

    @push('css')
        <link href="{{ asset('backend/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
    @endpush

@section('mainContent')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Contact Tables</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('admin.dashboard') }}">Home</a>
                </li>
                <li>
                    <span>Tables</span>
                </li>
                <li class="active">
                    <strong>Contact Tables</strong>
                </li>
            </ol>

        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">

        @include('backend.message.msg')

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Contact  <strong class="badge badge-danger">{{$contacts->count()}}</strong> </h5>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                            <tr>
                                <th>SI</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>subject</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contacts as $key =>  $contact)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->message }}</td>
                                    <td>
                                        <form style="display: none" action="{{ route('contacts.destroy', $contact->id) }}"
                                              method="post" id="form-delete-{{ $contact->id }}">
                                            @csrf
                                            @method('DELETE')
                                        </form>


                                        <button type="button" onclick="if (confirm('Are you sure to delete this item ?'))
                                        {
                                            event.preventDefault();
                                            document.getElementById('form-delete-{{ $contact->id }}').submit();
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
    </div>
@endsection


@push('script')
    <script src="{{ asset('backend/js/jquery-2.1.1.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/dataTables/datatables.min.js') }}"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                        customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    }
                ]

            });

            /* Init DataTables */
            var oTable = $('#editable').DataTable();

            /* Apply the jEditable handlers to the table */
            oTable.$('td').editable( '../example_ajax.php', {
                "callback": function( sValue, y ) {
                    var aPos = oTable.fnGetPosition( this );
                    oTable.fnUpdate( sValue, aPos[0], aPos[1] );
                },
                "submitdata": function ( value, settings ) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition( this )[2]
                    };
                },

                "width": "90%",
                "height": "100%"
            } );


        });

    </script>


@endpush
