@extends('layouts/main')
@section('content')
    @php
    $locale = App::getlocale();
    // dd($locale)
    @endphp

    @if (session()->has('sukses'))
        <div class="alert alert-success">
            {{ session()->get('sukses') }}
        </div>

    @endif

    <div class="container shadow my-5 w-75 border bg-light">

        <div class="d-flex justify-content-between mt-5 mb-5 flex-wrap">
            @foreach ($books as $b)
                <div class=" mx-1 d-flex p-3 flex-columns shadow " style="">
                    <div class="p-3">
                        <span class="d-block"><strong>{{ $b->title }}</strong></span>
                        <span class="d-block">By : {{ $b->author }}</span>
                        <a href="/bookDetail/{{ $b->ebook_id }}/{{ $locale }}"
                            class="btn btn-primary d-block">{{ __('msg.View_Book') }}</a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
        </div>
    </div>
@endsection
