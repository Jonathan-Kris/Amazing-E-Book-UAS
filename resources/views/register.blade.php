@extends('layouts/main')

@section('content')
    @php
    $locale = App::getlocale();
    @endphp

    <div class="container  mt-5 w-25 border pt-3 pb-3 mb-5 shadow bg-light rounded" style="">
        <h1 class="text-center mb-5">{{ __('msg.Register') }}</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>

        @endif
        <form class="d-flex flex-column" action="/register/{{ $locale }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">{{ __('msg.Email_address') }} (*)</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="first_name" class="form-label">{{ __('msg.First_name') }} (*)</label>
                <input type="text" class="form-control" id="first_name" name="first_name" aria-describedby="nameHelp">
            </div>
            <div class="mb-3">
                <label for="middle_name" class="form-label">{{ __('msg.Middle_name') }}</label>
                <input type="text" class="form-control" id="middle_name" name="middle_name" aria-describedby="nameHelp">
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">{{ __('msg.Last_name') }} (*)</label>
                <input type="text" class="form-control" id="last_name" name="last_name" aria-describedby="nameHelp">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">{{ __('msg.Password') }} (*)</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <label for="gender">{{ __('msg.Gender') }} (*)</label>
            <div class="radio ">
                <label><input name="gender" type="radio" value=1 checked>{{ __('msg.Male') }}</label>
            </div>
            <div class="radio ">
                <label><input name="gender" type="radio" value=2>{{ __('msg.Female') }}</label>
            </div>

            <label for="title">{{ __('msg.Role') }} (*)</label>
            <select name="role" class="form-control">
                <option value=1>{{ __('msg.Admin') }}</option>
                <option value=2>{{ __('msg.User') }}</option>
            </select>

            <label for="display_pic">{{ __('msg.Display_Pic') }} (*)</label>
            <div class="form-group mb-3 border border-dark d-flex">
                <input type="file" class="form-control-file" id="display_pic" name="display_pic" style="border:none">
            </div>
            <button type="submit w-100" class="btn btn-primary" value="register">{{ __('msg.Register') }}</button>
            <div class="text-center">
                <br>
                <small><a href="/login/{{ $locale }}">{{ __('msg.Already_have_an_account?') }}</a></small>
            </div>
        </form>
    </div>
    <script src=""></script>

@endsection
