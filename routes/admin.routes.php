<?php

use Illuminate\Support\Facades\Route;

Route::name('admin')->get('/', 'App\Http\Controllers\Admin\DashboardController@index');

?>