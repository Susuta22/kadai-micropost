@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="row">
            <aside class="col-sm-4">
                @include('users.card', ['user' => $user])
            </aside>
            <div class="col-sm-8">
                <ul class="nav nav-tabs nav-justified mb-3">
                    <li class="nav-item"><a href="{{ route('users.show', ['id' => $user->id]) }}" class="nav-link active">TimeLine <span class="badge badge-secondary">{{ $count_microposts }}</span></a></li>
                    <li class="nav-item"><a href="{{ route('users.followings', ['id' => $user->id]) }}" class="nav-link {{ Request::is('users/*/followings') ? 'active' : '' }}">Followings <span class="badge badge-secondary">{{ $count_followings }}</span></a></li>
                    <li class="nav-item"><a href="{{ route('users.followers', ['id' => $user->id]) }}" class="nav-link {{ Request::is('users/*/followers') ? 'active' : '' }}">Followers <span class="badge badge-secondary">{{ $count_followers }}</span></a></li>
                    <li class="nav-item"><a href="{{ route('users.favorites', ['id' => $user->id]) }}" class="nav-link {{ Request::is('users/*/favorites') ? 'active' : '' }}">Favorites <span class="badge badge-secondary">{{ $count_favorites }}</span></a></li>
                </ul>
                @include('users.post')
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