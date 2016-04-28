<?php

Route::group(['middleware' => ['web']], function () {
    Route::get('/', [
        'uses' => 'SubscriptionController@getIndex',
        'as' => 'subscription.getindex'
    ]);
    Route::get('/join', [
        'uses' => 'SubscriptionController@getJoin',
        'as' => 'subscription.getJoin'
    ]);
    Route::post('/join', [
        'uses' => 'SubscriptionController@postJoin',
        'as' => 'subscription.postJoin',
        'middleware' => 'notSubscribed'
    ]);
    Route::get('cancel', [
        'uses' => 'SubscriptionController@cancel',
        'as' => 'subscription.cancel',
        'middleware' => 'notSubscribed'
    ]);
    Route::get('resume', [
        'uses' => 'SubscriptionController@resume',
        'as' => 'subscription.resume',
        'middleware' => 'notSubscribed'
    ]);
    Route::get('card', [
        'uses' => 'SubscriptionController@card',
        'as' => 'subscription.card',
        'middleware' => 'notSubscribed'
    ]);

});
