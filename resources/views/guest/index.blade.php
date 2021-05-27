@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            {{ __('Registering for ticket') }}
                            <a href="{{route('landing')}}" class="btn btn-sm btn-dark" style="float:right;">Back</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    {{ Form::open(['route' => 'booked']) }}
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-8 col-12">
                                                <input type="hidden" name="id" value="{{$id}}">
                                                {{Form::label('name', 'Your Name')}}
                                                {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Your Name', 'autofocus' => 'true'])}}
                                                @error('name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>

                                        <div class="row mt-1">
                                            <div class="col-lg-8 col-12">
                                                {{Form::label('address', 'Your Address')}}
                                                {{Form::textarea('address', '', ['class' => 'form-control', 'placeholder' => 'Address', 'rows' => 2, 'cols' => 10])}}
                                                @error('address')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>

                                        <div class="row mt-1">
                                            <div class="col-lg-2 col-12">
                                                {{Form::label('gender', 'Gender')}}
                                                {{Form::select('gender', array('M' => 'Male', 'F' => 'Female'), '',['class' => 'form-control'])}}
                                                @error('gender')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4 col-12">
                                                {{Form::label('phone', 'Your Phone Number')}}
                                                {{Form::text('phone', '', ['class' => 'form-control', 'placeholder' => 'Your Phone Number'])}}
                                                @error('phone')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>


                                        <div class="row mt-3">
                                            <div class="col-lg-4 col-12">
                                                {{Form::submit('Booking Ticket For This Concert', ['class' => 'btn btn-success btn-md', 'id' => 'submit'])}}
                                            </div>
                                        </div>
                                    </div>
                                    {{ Form::close() }}
                                </div>
                                @if (\Session::has('ticket'))
                                    <div class="col-4">
                                        <iframe id="framePDF" src="{{asset('storage/ticket/'.\Session::get('ticket').'.pdf')}}" frameborder="0" height="500px"></iframe>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

