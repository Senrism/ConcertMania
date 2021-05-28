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
                            {{ Form::open(['id' => 'formCheckin']) }}
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
                            {{ Form::close() }}

                                        <div class="col-lg-8 mt-4">
                                            <div class="card" style="height: 40vh;">
                                                <div class="card-body">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-lg-8 col-12">
                                                                {{Form::label('name', 'Name')}}
                                                                <p class="name"> <b></b> </p>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-8 col-12">
                                                                {{Form::label('phone', 'Phone Number')}}
                                                                <p class="phone"> <b></b> </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
@push('after_js')
<script>
    $(document).on('click', '#submit', function(e){
        e.preventDefault();
        var form =  $('#formCheckin');
        var formData = new FormData(form[0]);

        $.ajax({
            type:'POST',
            url :'{{route("ticket.checkin")}}',
            data:formData,
            processData: false,
            contentType: false,
        success:function(data){
            if(data.data == null){
                swal.fire({
                    icon: "error",
                    title: "Oops",
                    text: "This ticket number is not registered",
                    showConfirmButton: false,
                    timer: 1000
                });
            }
            if(data.data == 'checked'){
                swal.fire({
                    icon: "error",
                    title: "Oops",
                    text: "This ticket number is already check-in",
                    showConfirmButton: false,
                    timer: 1000
                });
            }else{

                $('.name').empty().append(data.data[0].name);
                $('.phone').empty().append(data.data[0].phone);

                swal.fire({
                    icon: "success",
                    title: "Yes",
                    text: "check-in success",
                    showConfirmButton: false,
                    timer: 1000
                });

            }

        },
        error: function(errors){
            $.each(errors.responseJSON.errors, function (key, val) {
               alert(val);
            });
        }
        });
    });
</script>
@endpush
