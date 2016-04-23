<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SubscriptionController extends Controller
{
    protected $user;
    public function __contruct()
    {
        $this->user = \Auth::user();
    }
    public function getIndex()
    {
        return view('subscriptions.index')->with('user', $this->user);
    }

    public function getJoin()
    {
        return view('subscriptions.join');
    }

    public function postJoin(Request $request)
    {
        $token = $request->stripeToken;
        $plan = $request->plan;
        if($this->user->newSubscription('main', $plan)
            ->trialDay(10)->create($token)):
            return redirect()->route('subscription.getindex')
                ->with(['message' => 'Thank you for subscription!!']);
        endif;


    }
}
