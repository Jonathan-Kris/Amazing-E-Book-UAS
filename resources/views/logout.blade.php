@extends('layouts/main')
@section('content')
@php
    $locale =App::getlocale();
@endphp

<div class="container">
    <div class="row text-center">
        <div class="col-2">
        </div>
        <div class="col-8 d-flex text-center justify-content-center align-items-center mt-4">
            <div class="d-flex align-items-center card border-info mb-2 rounded-circle align-item-center bg-white text-center" style="width: 600px ; border:5px solid; height: 600px">
                <div class=" card-body  align-items-center d-flex  flex-column  justify-content-center">
                  <h5 class="card-title">{{ __('msg.Log_Out_Success!') }}</h5> <p></p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
