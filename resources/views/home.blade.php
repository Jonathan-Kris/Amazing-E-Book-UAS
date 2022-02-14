@extends('layouts/main')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@section('content')
    @php
    $locale = App::getlocale();
    @endphp

    @if (session()->has('sukses'))
        <div class="alert alert-success">
            {{ session()->get('sukses') }}
        </div>
    @endif

    <div class="container my-5 w-50">
        <div class="d-flex justify-content-between align-items-center flex-wrap content w-100 my-5 mb-5 mt-5">
            @foreach ($books as $b)
            <div class="card product-card">
                <div class="card-body">
                <h5 class="card-title font-weight-bold">{{ $b->title }}</h5>
                <p class="card-text">{{ $b->author }}</p>
                <p class="card-text">{{ Str::limit($b->description , 30)}} </p>
                <a href="/bookDetail/{{ $b->ebook_id }}/{{ $locale }}" class="btn btn-primary">{{ __('msg.View_Book') }}</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

@endsection
