@extends('layouts.main')
@section('content')
    @php
    $locale = App::getlocale();
    @endphp

    <div class="container mt-3">
        <div class="row">
            <div class="col-2">
            </div>
            <div class="col-sm-9 p-3">
                <div class="container my-5 w-100 border p-5 shadow bg-light" style="">
                    <h1 class="text-center ">{{ __('msg.Book_Detail') }}</h1>
                </div>
                @php
                    $id = Auth::user()->id;
                @endphp

                <div class="mt-6 mb-6">
                    <p>{{ __('msg.Title') }} : {{ $book->title }}</p>
                    <p>{{ __('msg.Author') }} : {{ $book->author }}</p>
                    <p>{{ __('msg.Description') }} :</p>
                    <p class="text-justify">{{ $book->description }}</p>
                    <a href="/rentBook/{{ $id }}/{{ $book->ebook_id }}/{{ $locale }}"
                        class="btn btn-primary w-100"> <strong>{{ __('msg.Rent') }}</strong></a>
                </div>
            </div>
            <div class="col-2">
            </div>
        </div>

    </div>

@endsection
