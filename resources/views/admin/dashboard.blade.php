@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <div class="row">
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
                                  <h5 class="card-title">Customer Data</h5>
                                  <p class="card-text">Show Customer who have ticket</p>
                                  <a href="#" class="btn btn-primary">Click To Go</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="card">
                                <div class="card-body">
                                  <h5 class="card-title">Ticket</h5>
                                  <p class="card-text">Log Ticket with it status</p>
                                  <a href="#" class="btn btn-primary">Click To Go</a>
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
