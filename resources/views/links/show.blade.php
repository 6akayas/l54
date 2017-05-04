@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-8 col-md-offset-4">
            <h2>Link:</h2>
        </div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Title</th>
                <th>URL</th>
                <th>Description</th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ $link->title }}</td>
                <td>{{ $link->url }}</td>
                <td>{{$link->description}}</td>
                <td><a href="{{ action('LinksController@edit', ['id' => $link->id]) }}"><button type="submit" class="btn-default btn-md"> Edit</button></a>
                    </td>
            </tr>
            </tbody>
        </table>
    </div>

@endsection

