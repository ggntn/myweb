@extends('layouts.homelayout')

@section('content2')
    <br>
    <br>
    <form action="{{ url('/manga') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label>Manga chapter/ Manga: </label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="form-group">
            <label>Image: </label>
            <textarea class="form-control" name="body" cols="50" rows="10"></textarea>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary form-control" value="Add new chap/Manga">
        </div>
    </form>
@endsection