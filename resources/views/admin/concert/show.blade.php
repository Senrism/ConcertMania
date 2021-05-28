@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                             Booking Ticket <b>{{$data->band}}</b> Concert
                            <a href="{{route('concert.index')}}" class="btn btn-sm btn-dark" style="float:right;">back</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <label for="">
                                        Performing Band : {{$data->band}}
                                    </label>
                                    <br>
                                    <label for="">
                                        Date : {{$data->date}}
                                    </label>
                                </div>
                                <div class="col-lg-4">
                                    <label for="">
                                        Total Ticket : {{$data->ticket_total}}
                                    </label>
                                    <br>
                                    <label for="">
                                        Ticket Sold : {{$data->tickets->count()}}
                                    </label>
                                </div>
                                <div class="col-lg-2">
                                    <label for="">
                                        Ticket Remaining : {{$data->ticket_total - $data->tickets->count()}}
                                    </label>
                                </div>
                            </div>

                            <hr>
                            <table class="datatable table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Ticket Number</th>
                                        <th>Ticket Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data->tickets as $d)
                                    <tr>
                                        <td style="width:10%;">{{$loop->iteration}}</td>
                                        <td>{{$d->customers->first()->name}}</td>
                                        <td>{{$d->customers->first()->phone}}</td>
                                        <td>{{$d->number}}</td>
                                        <td>{!!$d->status ? '<span class="badge badge-success">Checked-in</span>' : '<span class="badge badge-danger">Pending</span>'!!}</td>
                                        <td style="width:20%;">
                                            <a href="{{route('ticket.delete', $d->id)}}" class="btn btn-sm btn-danger mt-1">Cancel Booking</a>
                                            <a href="{{route('customer.edit', $d->customers->first()->id)}}" class="btn btn-sm btn-info mt-1">Update Data</a>
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
