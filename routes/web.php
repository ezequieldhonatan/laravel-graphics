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

    ## REPORTS LARAVEL
    // $this->get('reports/months', 'ReportsController@months')->name('reports.months'); ## REPORTS MONTHS
    $this->get('reports/months', 'ReportsController@months2')->name('reports.months'); ## REPORTS MONTHS 2
    $this->get('reports/years', 'ReportsController@year')->name('reports.year'); ## REPORTS YEAR

    ## REPORTS VUE
    $this->get('reports/vue', 'ReportsController@vue')->name('reports.vue'); ## REPORTS MONTHS
    
});

Route::get('/', 'SiteController@index');
