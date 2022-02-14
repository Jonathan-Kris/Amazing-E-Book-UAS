@extends('layouts.main')
@section('content')

    @php
    $locale = App::getlocale();
    @endphp

    <div class="container my-5 w-50 border p-5 shadow bg-light" style="">
        <h1 class="text-center mb-5">{{ __('msg.User_Detail') }}</h1>
        <form class="d-flex flex-column" enctype="multipart/form-data"
            action="/userUpdate/{{ $user->id }}/{{ $locale }}" method="post">
            @csrf
            <div>{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</div>
            @if ($user->role_id != 1)
                <div class="form-group">
                    <label for="title">{{ __('msg.Role') }}</label>
                    <select name="role" class="form-control">
                        <option value="2">{{ __('msg.User') }}</option>
                        <option value="1">{{ __('msg.Admin') }}</option>

                    </select>
                </div>
            @else
                <div class="form-group">
                    <label for="title">{{ __('msg.Role') }}</label>
                    <select name="role" class="form-control">

                        <option value="1">{{ __('msg.Admin') }}</option>
                        <option value="2">{{ __('msg.User') }}</option>

                    </select>
                </div>
            @endif

            <button type="submit w-100" class="btn btn-primary" value="insert">{{ __('msg.Update') }}</button>
        </form>
    </div>

@endsection
