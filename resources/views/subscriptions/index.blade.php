@extends('layout.master')
@section('content')
    <h4>Hello Laravel</h4>

    @if(Auth::check() && !$user->subscribed())
        <p>You are subscribed!! Thanks!!</p>
    @else
        <p>You are not subscribed!! {{ link_to('#', 'Join now') }} </p>
    @endif

@endsection