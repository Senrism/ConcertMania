@extends('layouts.app')
@section('content')
@if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            {{ __('Update Booking Person') }}
                            <a href="{{route('concert.show', $data->tickets->first()->concerts->first()->id)}}" class="btn btn-sm btn-dark" style="float:right;">Back</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    {{ Form::open(['route' => 'customer.update']) }}
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-8 col-12">
                                                <input type="hidden" name="id" value="{{$data->id}}">
                                                {{Form::label('name', 'Your Name')}}
                                                {{Form::text('name', $data->name, ['class' => 'form-control', 'autofocus' => 'true'])}}
                                                @error('name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>

                                        <div class="row mt-1">
                                            <div class="col-lg-8 col-12">
                                                {{Form::label('address', 'Your Address')}}
                                                {{Form::textarea('address', $data->address, ['class' => 'form-control', 'placeholder' => 'Address', 'rows' => 2, 'cols' => 10])}}
                                                @error('address')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>

                                        <div class="row mt-1">
                                            <div class="col-lg-2 col-12">
                                                {{Form::label('gender', 'Gender')}}
                                                {{Form::select('gender', array('M' => 'Male', 'F' => 'Female'), $data->gender ,['class' => 'form-control'])}}
                                                @error('gender')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4 col-12">
                                                {{Form::label('phone', 'Your Phone Number')}}
                                                {{Form::text('phone', $data->phone , ['class' => 'form-control', 'placeholder' => 'Your Phone Number'])}}
                                                @error('phone')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-lg-4 col-12">
                                                {{Form::submit('Update Data', ['class' => 'btn btn-success btn-md', 'id' => 'submit'])}}
                                            </div>
                                        </div>
                                    </div>
                                    {{ Form::close() }}
                                </div>
                                <div class="col-4">
                                    <iframe id="framePDF" src="{{asset('storage/ticket/'.$data->tickets->first()->number.'.pdf')}}" frameborder="0" height="500px"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

