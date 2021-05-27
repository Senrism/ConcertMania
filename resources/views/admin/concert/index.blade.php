@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            {{ __('Concert Events') }}
                            <a href="{{route('concert.add')}}" class="btn btn-sm btn-success" style="float:right;">Held New Concert</a>
                        </div>
                        <div class="card-body">
                            <table class="datatable table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Band</th>
                                        <th>Date</th>
                                        <th>Ticket Total</th>
                                        <th>Ticket Sold</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $d)
                                    <tr>
                                        <td style="width:10%;">{{$loop->iteration}}</td>
                                        <td>{{$d->band}}</td>
                                        <td>{{$d->date}}</td>
                                        <td>{{$d->ticket_total - $d->tickets->count()}}</td>
                                        <td>{{$d->tickets->count()}}</td>
                                        <td style="width:20%;">
                                            <a href="{{route('concert.delete', $d->id)}}" class="btn btn-sm btn-danger mt-1">Cancel Concert</a>
                                            <a href="" class="btn btn-sm btn-info mt-1">Update Concet</a>
                                            <a href="" class="btn btn-sm btn-primary mt-1">Show Detail</a>
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
