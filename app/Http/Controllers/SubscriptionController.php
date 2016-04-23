<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class SubscriptionController extends Controller
{
    public function getIndex()
    {
        return view('subscriptions.index')->with('user', User::find(1));
    }

    public function getJoin()
    {
        return view('subscriptions.join');
    }

    public function postJoin(Request $request)
    {
        $user = User::find(1);
        $token = $request->stripeToken;
        $plan = $request->plan;

        if($user->newSubscription('primary', $plan)
            ->trialDays(10)->create($token))
        {
            return redirect()->route('subscription.getindex')
                ->with(['message' => 'Thank you for subscription!!']);
        }
        return redirect()->back();

    }

    public function cancel($id)
    {
        $user = User::find(id);
        $user->subscription()->cancel();
        return redirect()->route('subscription.getindex')
            ->with(['message' => 'Sorry to here that.']);
    }
}
