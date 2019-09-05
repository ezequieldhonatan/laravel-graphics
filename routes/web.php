<?php

// Auth::routes(['register' => false]);
Auth::routes();

$this->group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {

    $this->get('/', 'DashboardController@index')->name('admin'); ## DASHBOARD

    $this->resource('categories', 'CategoryController'); ## CATEGORY
    $this->any('categories/search', 'CategoryController@search')->name('categories.search'); ## CATEGORY SEARCH

    $this->resource('products', 'ProductController'); ## PRODUCT
    $this->any('products/search', 'ProductController@search')->name('products.search'); ## PRODUCT SEARCH

    $this->resource('users', 'UserController'); ## USER
    $this->any('users/search', 'UserController@search')->name('users.search'); ## USERS

    $this->get('reports/months', 'ReportsController@months')->name('reports.months'); ## REPORTS MONTHS
    
});

Route::get('/', 'SiteController@index');
