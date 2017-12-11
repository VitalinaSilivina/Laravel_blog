@extends('admin.admin-index')

@section('title', 'Просмотр поста')

@section('content')
    <h1>{{$post->title}}</h1>
    <p>{{$post->created_at}}</p>
    <p>{!!$post->description!!}</p>

    {!! Form::open(['method'=>'DELETE','route'=>['destroy', $post->id]]) !!}
    {{method_field('DELETE')}}
    {{ csrf_field() }}
    {!! Form::submit('Delete', ['class'=>'btn btn-danger' ]) !!}
    {!! Form::close() !!}
@endsection


