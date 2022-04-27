<?php

use Illuminate\Support\Facades\Route;

Route::name('user')->get('/', 'App\Http\Controllers\User\DashboardController@index');

?>