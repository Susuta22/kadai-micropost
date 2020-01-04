@extends('layouts.app')
@section('content')
    <div class='text-center'>
        <h1>{{ $user->name }}のプロフィール編集</h1>
    </div>
        <div class='row'>
            <div class='col-sm-6 offset-3'>
                {!! Form::model($user, ['route' => ['users.update', 'id' => Auth::id()], 'method' => 'put']) !!}
                    <div class='form-group'>
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                    <div class='form-group'>
                        {!! Form::label('email', 'Email') !!}
                        {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                    </div>
                    <div class='form-group'>
                        {!! Form::label('password', 'Password') !!}
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                    </div>
                    <div class='form-group'>
                        {!! Form::label('password_confirmation', 'Confirmation') !!}                            
                        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                    </div>
                    {!! Form::submit('Update', ['class' => 'btn btn-primary btn-block']) !!}
                {!! Form::close() !!}
            </div>
        </div>
@endsection