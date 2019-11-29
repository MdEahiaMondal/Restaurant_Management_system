@extends('backend.master.master')

@section('title', 'Contact Show')

    @push('css')
    @endpush

@section('mainContent')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Contacts</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    View
                </li>
                <li class="active">
                    <strong>Contacts</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact-box">
                    <a href='#0'>
                        <div class="col-sm-4">
                            <div class="">
                                <img alt="image" class="img-circle m-t-xs img-responsive" src="{{ asset('backend/img/a2.jpg') }}">
                                <h3><strong>{{ $contact->name }}</strong></h3>
                                <p> {{ $contact->email }}  </p>

                            </div>
                        </div>
                        <div class="col-sm-8">

                            <address>
                                <strong> Subject </strong><br>
                                {{ $contact->subject }}
                            </address>

                            <address>
                                <strong> Message </strong><br>
                                    {{ $contact->message }}
                            </address>
                        </div>
                        <div class="clearfix"><a href="#0">Replay</a></div>
                    </a>
                </div>
            </div>

        </div>
    </div>

@endsection


@push('script')
@endpush
