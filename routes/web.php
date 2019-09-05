<?php

Auth::routes();
// Auth::routes(['register' => false]);

$this->group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {
    $this->any('users/search', 'UserController@search')->name('users.search');
    $this->resource('users', 'UserController');

    $this->any('products/search', 'ProductController@search')->name('products.search');
    $this->resource('products', 'ProductController');

    $this->any('categories/search', 'CategoryController@search')->name('categories.search');
    $this->resource('categories', 'CategoryController');

    $this->get('/', 'DashboardController@index')->name('admin');
});

Route::get('/', 'SiteController@index');
