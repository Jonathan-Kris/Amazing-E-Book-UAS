@extends('layouts/main')
@section('content')
    @php
    $locale = App::getlocale();
    @endphp

    <div class="container-md   my-5 w-25 border p-5 shadow bg-light rounded" style="">
        <h1 class="text-center">{{ __('msg.Login') }}</h1>
        @if (session()->has('sukses'))
            <div class="alert alert-success">
                {{ session()->get('sukses') }}
            </div>
        @endif

        <form action="/login/{{ $locale }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">{{ __('msg.Email_address') }}</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email"
                    aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">{{ __('msg.Password') }}</label>
                <input type="password" class="form-control" id="password" name="password"
                    placeholder="Enter Your Password">
            </div>

            <button type="submit" class="btn btn-primary w-100">{{ __('msg.Submit') }}</button>

            <div class="align-self-end">
                <div class="text-center">
                    <a href="/register/{{ $locale }}"><u>{{ __('msg.Dont_have_an_account?') }}</u></a>
                </div>
            </div>
        </form>

    </div>
@endsection
