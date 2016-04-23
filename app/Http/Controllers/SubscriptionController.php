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
        return 'get join';
    }

    public function postJoin()
    {
        return 'post join';
    }
}
