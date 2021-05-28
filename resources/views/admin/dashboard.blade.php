@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="height:50vh;">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                        <h4> Welcome, Admin ! </h4>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-4 col-12">
                            <div class="card">
                                <div class="card-body">
                                  <h5 class="card-title">Concert</h5>
                                  <p class="card-text">Show Concert List With Ticket Sold</p>
                                  <a href="{{route('concert.index')}}" class="btn btn-primary">Click To Go</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="card">
                                <div class="card-body">
                                  <h5 class="card-title">Check In</h5>
                                  <p class="card-text">Check in Number Ticket For Concert</p>
                                  <a href="{{route('ticket.index')}}" class="btn btn-primary">Click To Go</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
