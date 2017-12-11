@extends('admin.admin-index')

@section('title', 'Добавить пост')

@section('content')
    <div class="col-md-7">
        {!! Form::open(['route' => 'store']) !!}
        <div class="form-group">
            <div class="col-md-3">
                {{Form::label('title', 'Title')}}
            </div>
            <div class="col-md-9">
                {{Form::text('title', null, ['class'=>'form-control'])}}
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-3">
                {{Form::label('description', 'Description')}}
            </div>
            <div class="col-md-9">
                {{Form::textarea('description', null, ['class'=>'form-control'])}}
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-3">
                {{Form::submit('Create Ad')}}
            </div>
        </div>

        {!! Form::close() !!}
    </div>

@endsection

