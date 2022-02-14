@extends('layouts.main')
@section('content')

    @php
    $locale = App::getlocale();
    @endphp

    <div class="container shadow my-5 w-75 border bg-light p-5">
        <h1 class="mt-4">{{ __('msg.Users_List') }}</h1>
        <div class="d-flex justify-content-between mb-5">
            <table class="table table-light mt-3">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">{{ __('msg.Name') }}</th>
                        <th scope="col">{{ __('msg.Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $u)
                        <tr>
                            @if ($u->role_id == 1)
                                <td>{{ $u->first_name }} {{ $u->middle_name }} {{ $u->last_name }} -
                                    {{ __('msg.Admin') }}</td>
                            @else
                                <td>{{ $u->first_name }} {{ $u->middle_name }} {{ $u->last_name }} -
                                    {{ __('msg.User') }}</td>
                            @endif
                            <td>
                                <a href="/userDetail/{{ $u->id }}/{{ $locale }}"
                                    class="btn btn-primary">{{ __('msg.Update_Role') }}</a>

                                <a href="/userDelete/{{ $u->id }}/{{ $locale }}"
                                    class="btn btn-danger">{{ __('msg.Delete') }}</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
