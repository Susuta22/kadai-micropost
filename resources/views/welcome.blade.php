@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class='row'>
            <aside class='col-sm-4'>
                <div class='card'>
                    <div class='card-header'>
                        <h3 class='card-title'>{{ Auth::user()->name }}</h3>
                    </div>
                    <div class='card-body'>
                        <img class='rounded img-fluid' src='{{ Gravatar::src(Auth::user()->email, 500) }}' alt=''>
                    </div>
                </div>
            </aside>
            <div class='col-sm-8'>
                
                @if (Auth::id() == $user->id)
                    {!! Form::open(['route' => 'microposts.store']) !!}
                        <div class="form-group">
                            {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
                            {!! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!}
                        </div>
                    {!! Form::close() !!}
                @endif
                
                @if (count($microposts) > 0)
                    @include('microposts.microposts', ['microposts' => $microposts])
                @endif
                
            </div>
        </div>
    @else
        <div class='center jumbotron'>
            <div class='text-center'>
                <h1>Welcome to the Micropost</h1>
                {!! link_to_route('signup.get', 'Sign up', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection