<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    if(Auth::check()) {
        if(auth()->user()->is_admin){
            return redirect('/admin/');
        }else{
            return redirect('/user/');
        }
    }else{
        return Redirect::to('login');
    }
});//bifurcate users based on the type

Route::middleware(['auth'])->group(function () {
    //After Login the routes are accept by the loginUsers...

    Route::group([ 'middleware' => 'is_admin', 'prefix' => 'admin','as' => 'admin.'], function () {
        include 'admin.routes.php'; // separated admin routes
    });

    Route::group([ 'middleware' => 'is_user', 'prefix' => 'user','as' => 'user.'], function () {
        include 'user.routes.php'; // separated user routes
    });

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
