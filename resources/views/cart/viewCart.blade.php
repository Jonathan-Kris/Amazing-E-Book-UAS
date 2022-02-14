@extends('layouts/main')
@section('content')

    @php
    $locale = App::getlocale();
    @endphp

    @php
    $userId = Auth::user()->id;
    $user = Auth::user();
    @endphp

    <div class="container shadow my-5 w-75 border bg-light p-5 rounded ">
        <div class="d-flex justify-content-between h-50 mb-5 flex-wrap">
            <h1><u>{{ __('msg.Your_Cart') }}</u></h1>
            @if ($item != null)
                <table class="table table-light mt-3">
                    <thead class="thead-light">
                        <tr>
                            <th scope="1">{{ __('msg.Book_title') }}</th>
                            <th scope="1">{{ __('msg.Book_Author') }}</th>
                            <th scope="1">{{ __('msg.Description') }}</th>
                            <th scope="1">{{ __('msg.Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($item as $i)
                            <tr>
                                <td>{{ $i->title }}</td>
                                <td>{{ $i->author }}</td>
                                <td>{{ $i->description }}</td>
                                <td>
                                    <a class="btn btn-danger"
                                        href="{{ url("/cartDelete/$userId/$i->ebook_id") }}/{{ $locale }}">{{ __('msg.Delete') }}</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
        <div class="d-flex align-items-end flex-column mr-2">
            <a class="btn btn-warning d-flex align-items-end flex-column"
                href="{{ url("/cartSubmit/$userId") }}/{{ $locale }}">{{ __('msg.Submit') }}</a>
        </div>
    @else
        <div class="container">
            <div class="row">
                <h2>{{ __('msg.CART_IS_EMPTY') }}</h2>
            </div>
        </div>
    @endif

    </div>
@endsection
