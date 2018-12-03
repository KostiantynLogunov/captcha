@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create New Post</h2>
        <form action="{{route('posts.store')}}" method="post" class="mx-auto col-sm-6 text-center">
            {{csrf_field()}}
            <div class="form-group">
                <label>Post title:</label>
                <input type="text" name="title" class="form-control">
            </div>

            <div class="form-group">
                <input type="submit" value="Submit" class="btn btn-default">
            </div>

            <div class="g-recaptcha" data-sitekey="{{ config('captcha.captcha.key') }}"></div>
        </form>
    </div>
@endsection
