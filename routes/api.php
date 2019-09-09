<?php

Route::group(['prefix' => 'reports', 'namespace' => 'Api'], function () {
    Route::get('months', 'reportsApiController@months');
    // Route::get('years', 'reportsApiController@years');
});