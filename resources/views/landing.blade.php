@extends('layouts.main')
@section('content')

@php
    $locale =App::getlocale();
@endphp

<div class="container">
    <div class="row text-center">
        <div class="col-2">

        </div>
        <div class="col-8 d-flex text-center justify-content-center align-items-center mt-5 " >
            <div class="d-flex  mt-5 align-items-center card border-info mb-3 align-item-center bg-white text-center">

                <div class=" card-body  align-items-center d-flex  flex-column  justify-content-center">
                  <a href="/login/{{ $locale }}"><h5 class="card-title">{{ __('msg.Find_and_Rent_Your_E_book_Here!') }}</h5></a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
