@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            {{ __('Check in Ticket') }}
                            <a href="{{route('home')}}" class="btn btn-sm btn-dark" style="float:right;">Back</a>
                        </div>
                        <div class="card-body" style="height: 50vh;">
                            {{ Form::open(['route' => 'ticket.checkin']) }}
                                <div class="container">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="row">
                                                <div class="col-lg-12 col-12">
                                                    {{Form::label('number', 'Check Ticket Number')}}
                                                    {{Form::text('number', '', ['class' => 'form-control', 'placeholder' => 'Input Ticket Number', 'autofocus' => 'true'])}}
                                                    @error('number')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-lg-12 col-12">
                                                    {{Form::submit('Checkin', ['class' => 'btn btn-success btn-md', 'id' => 'submit'])}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 mt-4">
                                            <div class="card" style="height: 40vh;">
                                                <div class="card-body">
                                                    @if (\Session::has('data'))
                                                        @php
                                                            $data = session()->get( 'data' );
                                                        @endphp
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-lg-8 col-12">
                                                                    {{Form::label('name', 'Name')}}
                                                                    <p> <b>{{$data->name}}</b> </p>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-lg-8 col-12">
                                                                    {{Form::label('phone', 'Phone Number')}}
                                                                    <p> <b>{{$data->phone}}</b> </p>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-lg-8 col-12">
                                                                    {{Form::label('ticket_number', 'Ticket Number')}}
                                                                    <p> <b>{{$data->tickets->number}}</b> </p>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-lg-8 col-12">
                                                                    {{Form::label('status', 'Status')}}
                                                                    <br>
                                                                    <span class="badge badge-success" style="font-size: 15px;">Checked-in</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
