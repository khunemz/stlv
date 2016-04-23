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
});
