@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-8  col-md-offset-4">
            <div class="row">
                <h2>Links:</h2>
            </div>
            <div class="row">
                <div class="content">
                    @foreach ($links as $link)
                        <li>{{ $link->title }}</li>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
