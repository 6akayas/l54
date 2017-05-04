@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-8">
            <div class="row">
                <h2>{{ $user->name }}'s Profile:</h2>
                <img src="/uploads/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                <form enctype="multipart/form-data" action="update_avatar" method="POST">
                    <label>Update Profile Image</label>
                    <input type="file" name="avatar">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="pull-right btn btn-sm btn-primary">
                </form>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="content">
                        <br>
                        <li>{{ $user->name }}</li>
                        <li>{{ $user->email }}</li>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
