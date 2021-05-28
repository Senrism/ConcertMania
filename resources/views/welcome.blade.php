@extends('layouts.landing')

@section('content')
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5">
        <div class="col-lg-12 text-gray">
            <p class="mt-5" style="font-size: 80px;">Concert Mania</p>
            <p  style="font-size: 30px;">Booking your ticket, enjoy your concerts, Trusted online booking portal</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <a href="{{route('landing.concert')}}" class="btn btn-lg btn-dark">Start Booking Now</a>
        </div>
    </div>
</div>
@endsection
