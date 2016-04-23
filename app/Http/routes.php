<?php

Route::group(['middleware' => ['web']], function () {
    Route::get('/', [
        'uses' => 'SubscriptionController@getIndex',
        'as' => 'subscription'
    ]);
});

Route::group(['middleware' => ['web' , 'notSubscribed']], function(){
    Route::get('/join', [
        'uses' => 'SubscriptionController@getJoin',
        'as' => 'subscription.getJoin'
    ]);
    Route::post('/join', [
        'uses' => 'SubscriptionController@postJoin',
        'as' => 'subscription.postJoin'
    ]);
});
