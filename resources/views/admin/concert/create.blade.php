@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            {{ __('Add Concert') }}
                            <a href="{{route('concert.index')}}" class="btn btn-sm btn-dark" style="float:right;">Back</a>
                        </div>
                        <div class="card-body">
                            {{ Form::open(['id' => 'formConcert','enctype' => 'multipart/form-data']) }}
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-4 col-12">
                                            {{Form::label('band', 'Performing Band')}}
                                            {{Form::text('band', '', ['class' => 'form-control', 'placeholder' => 'Band', 'autofocus' => 'true'])}}
                                            @error('band')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                        </div>

                                        <div class="col-lg-4 col-12">
                                            {{Form::label('image', 'Image or Poster')}}
                                            {{Form::file('image')}}
                                            @error('image')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-lg-2 col-12">
                                            {{Form::label('date', 'Date')}}
                                            {{Form::date('date','',['class' => 'form-control'])}}
                                            @error('date')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-lg-2 col-12">
                                            {{Form::label('ticket_total', 'Ticket Total')}}
                                            {{Form::number('ticket_total', '', ['class' => 'form-control', 'placeholder' => 'Ticket Total'])}}
                                            @error('band')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-4 col-12">
                                            {{Form::submit('Add Concert Event', ['class' => 'btn btn-success btn-md', 'id' => 'submit'])}}
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

@push('after_js')
<script>
    $(document).on('click', '#submit', function(e){
        e.preventDefault();
        var form =  $('#formConcert');
        var formData = new FormData(form[0]);
        console.log(form);

        $.ajax({
            type:'POST',
            url :'{{route("concert.store")}}',
            data:formData,
            processData: false,
            contentType: false,
        success:function(data){
            console.log(data)
            swal.fire({
                icon: "success",
                title: "SAVED",
                text: "New Concert Added",
                showConfirmButton: false,
                timer: 1000
            });
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
