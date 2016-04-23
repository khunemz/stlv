@extends('layout.master')
@section('content')
    <h4>Hello Laravel</h4>

    @if(Auth::check() && $user->subscribed('main'))
        <p>You are subscribed!! Thanks!!</p>
        <p>{{ link_to_route('subscription.cancel', 'Cancel') }}</p>
        @if($user->subscription('main')->onGracePeriod())
            <p>You subscription will end on {{ $user->subscription->ends_at }}</p>
        @endif

        @if($user->subscription('main')->cancelled())
            <p>To resume click here {{ link_to('#', 'Resume') }}</p>
        @endif

    @else
        <p>You are not subscribed!! {{ link_to('/join', 'Join now') }} </p>
    @endif


@endsection