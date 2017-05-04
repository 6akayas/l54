@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Edit your link</h1>
            <form action="update" method="post" id="edit-form">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                </div>
                <div class="form-group">
                    <label for="url">Url</label>
                    <input type="text" class="form-control" id="url" name="url" placeholder="URL">
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="description" name="description" placeholder="Description"></textarea>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
@endsection
