@extends('admin.admin-index')
@section('content')
        <!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Сайт создания объявлений</title>


    <!-- Fonts -->
    <!--<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <!-- <style>
         html, body {
             background-color: #fff;
             color: #636b6f;
             font-family: 'Raleway', sans-serif;
             font-weight: 100;
             height: 100vh;
             margin: 0;
         }

         .full-height {
             height: 100vh;
         }

         .flex-center {
             align-items: center;
             display: flex;
             justify-content: center;
         }

         .position-ref {
             position: relative;
         }

         .top-right {
             position: absolute;
             right: 10px;
             top: 18px;
         }

         .content {
             text-align: center;
         }

         .title {
             font-size: 84px;
         }

         .links > a {
             color: #636b6f;
             padding: 0 25px;
             font-size: 12px;
             font-weight: 600;
             letter-spacing: .1rem;
             text-decoration: none;
             text-transform: uppercase;
         }

         .m-b-md {
             margin-bottom: 30px;
         }
     </style>-->
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Вход</a>
                <a href="{{ route('register') }}">Регистрация</a>
            @endauth
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            Сайт создания объявлений
        </div>
        <a href="{{ URL::to('create') }}">Create Ad</a>
    </div>
</div>
<table class="table table-striped">
    <thead>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Author_name</th>
    </tr>
    </thead>
    <tbody>
    @foreach($posts as $p)
        <tr>
            <th scope=row>{{$p->id}}</th>
            <td>{{$p->title}}</td>
            <td>{!!$p->description!!}</td>
            <td>{{$p->author_name}}</td>
            <td>
                {!! Form::open(['method' => 'DELETE','route' => ['destroy', $p->id]]) !!}
                {!! Form::submit('Delete', ['class'=>'btn btn-danger' ]) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
{{ $posts->links() }}
@endsection