<?php

use Illuminate\Support\Facades\Route;

Route::name('user')->get('/', 'App\Http\Controllers\User\DashboardController@index');

Route::name('profile')->get('/profile', 'App\Http\Controllers\User\ProfileController@profile');
Route::name('profile.update')->post('/profile/update', 'App\Http\Controllers\User\ProfileController@profileUpdate');
Route::name('profile.update.email')->post('/profile/update/email', 'App\Http\Controllers\User\ProfileController@updateEmail');
Route::name('profile.update.password')->post('/profile/update/password', 'App\Http\Controllers\User\ProfileController@updatePassword');
?>