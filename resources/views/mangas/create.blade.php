@extends('layouts.homelayout')



@section('content2')
    <br>
    <br>
    <h2>Create Manga</h2>
    @include('inc.message')
    {!! Form::open(['action' => 'MangasController@store','method' => 'POST','enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::label('manga_name', 'Manga name: ') !!}
        {!! Form::text('manga_name', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('category', 'Category id: ') !!}
        {!! Form::text('category_id', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('author', 'Author id: ') !!}
        {!! Form::text('author_id', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('chapter', 'Chapter id: ') !!}
        {!! Form::text('chap_id', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('detail', 'Detail: ') !!}
        {!! Form::textarea('detail', null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('image', 'Image: ') !!}
        {!! Form::file('image', null,
        ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('tag_list', 'Tags: ') !!}
        {!! Form::select('tag_list[]', $tag_list, null,
        ['multiple', 'class' => 'form-control']) !!}
    </div>

        {{--{!! Form::label('tags', 'Tags: ') !!}--}}
       {{--<select class="form-control select2-multi" name="tags[]" multiple="multiple">--}}
           {{--@foreach($tags as $tag)--}}
               {{--<option value='{{$tag->id}}'>{{$tag->name}}</option>--}}
           {{--@endforeach--}}
       {{--</select>--}}



    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}


    {{--<script type="text/javascript">--}}
        {{--$('.select2-multi').select2();--}}
    {{--</script>--}}
@endsection