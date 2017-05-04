@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="col-md-10 col-md-offset-2">
            <div class="row">
                <h2>Links:</h2>
            </div>
            <div class="row">
                <div class="link-content">
                    @foreach ($links as $link)
                        <li><a href="/links/{{ $link->id }}">{{ $link->title }}</a></li>
                        <i>{{ $link->url }}</i>
                    @endforeach
                </div>
            </div>
        </div>
    </div>



@endsection
