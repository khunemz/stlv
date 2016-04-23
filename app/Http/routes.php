<?php

Route::group(['middleware' => ['web']], function () {
    Route::get('/', [
        'uses' => 'SubscriptionController@getIndex',
        'as' => 'subscription'
    ]);
});

//Route::group(['middleware' => ['web' , 'notSubscribed']], function(){
//
//});
