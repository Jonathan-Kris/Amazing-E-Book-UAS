@extends('layouts.main')
@section('content')
    @php
    $locale = App::getlocale();
    @endphp

    @if (session()->has('sukses'))
        <div class="alert alert-success">
            {{ session()->get('sukses') }}
        </div>
    @endif

    <div class="container">
        <div class="row text-center">
            <div class="col-2">

            </div>
            <div class="col-8 d-flex  text-center justify-content-center align-items-center mt-5">
                <div class="d-flex  mt-5 align-items-center card border-info mb-2 align-item-center bg-white text-center">
                    <div class=" card-body  align-items-center d-flex  flex-column  justify-content-center">
                        <h5 class="card-title">{{ __('msg.Success') }}!</h5>
                        <p></p>
                        <a href="/index/{{ $locale }}"><u>{{ __('msg.Click_here_to_go_to_HomePage') }}</u></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
