@extends('layouts/main')
@section('content')
    @php
    $locale = App::getlocale();
    $user = Auth::user();
    @endphp

    <div class="container my-5 w-75 border p-5 shadow bg-light" style="">
        <h1 class="text-center mb-5">{{ __('msg.Your_Profile') }}</h1>

        @auth
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="d-flex flex-column" enctype="multipart/form-data"
                action="/updateProfile/{{ Auth::user()->id }}/{{ $locale }}" method="post">
                @csrf
                {{ method_field('PUT') }}
                <div class="d-flex justify-content-center">
                    <img class="d-flex justify-content-center align-items-center" width="300px" height="300px"
                        src={{ Storage::url($user->display_picture_link) }}>
                </div>
                <div class="d-flex flex-column">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('msg.Email_address') }}</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                            value={{ $user->email }}>
                    </div>
                    <div class="mb-3">
                        <label for="first_name" class="form-label">{{ __('msg.First_name') }}</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" aria-describedby="nameHelp"
                            value={{ $user->first_name }}>
                    </div>
                    <div class="mb-3">
                        <label for="middle_name" class="form-label">{{ __('msg.Middle_name') }}</label>
                        <input type="text" class="form-control" id="middle_name" name="middle_name"
                            aria-describedby="nameHelp" value={{ $user->middle_name }}>
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">{{ __('msg.Last_name') }}</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" aria-describedby="nameHelp"
                            value={{ $user->last_name }}>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('msg.Password') }}</label>
                        <input type="password" class="form-control" id="password" name="password"
                        value={{ Cookie::get('PASSWORD_COOKIE') !== null ? Cookie::get('PASSWORD_COOKIE') : "" }}>
                    </div>
                    @if ($user->gender_id == 1)
                        <label for="gender">{{ __('msg.Gender') }}</label>
                        <div class="radio ">
                            <label><input name="gender" type="radio" value=1 checked>{{ __('msg.Male') }}</label>
                        </div>
                        <div class="radio ">
                            <label><input name="gender" type="radio" value=2>{{ __('msg.Female') }}</label>
                        </div>
                    @else
                        <label for="gender">{{ __('msg.Gender') }}</label>
                        <div class="radio ">
                            <label><input name="gender" type="radio" value=1>{{ __('msg.Male') }}</label>
                        </div>
                        <div class="radio ">
                            <label><input name="gender" type="radio" value=2 checked>{{ __('msg.Female') }}</label>
                        </div>
                    @endif

                    <label for="title">{{ __('msg.Role') }}:</label>
                    <select name="role" class="form-control" disabled>
                        @if ($user->role_id == 1)
                            <option value=1>{{ __('msg.Admin') }}</option>
                        @else
                            <option value=2>{{ __('msg.User') }}</option>
                        @endif


                    </select>

                    <label for="berkas">{{ __('msg.Cover') }}</label>
                </div>


                <div class="form-group mb-3 border border-dark d-flex">
                    <input type="file" class="form-control-file" id="berkas" name="berkas" style="border:none">
                </div>
                <button type="submit w-100" class="btn btn-primary" value="Save">{{ __('msg.Save') }}</button>
            </form>
        @endauth

    </div>
@endsection
