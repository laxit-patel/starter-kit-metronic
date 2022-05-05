<?php

use App\Http\Controllers\CountryStateCityController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Permission;

Auth::routes(); // Auth routes

Route::get('/', function () {
    return view('welcome');
}); //  Landing page route

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
}); //  Role based separation upon login

Route::middleware(['auth'])->group(function () {
    Route::group([ 'middleware' => 'is_admin', 'prefix' => 'admin','as' => 'admin.'], function () {
        include 'admin.routes.php'; // separated admin routes
    });
    Route::group([ 'middleware' => 'is_user', 'prefix' => 'user','as' => 'user.'], function () {
        include 'user.routes.php'; // separated user routes
    });
});

Route::get('state/fetch', [CountryStateCityController::class, 'fetchState'])->name('state.fetch');
Route::get('city/fetch', [CountryStateCityController::class, 'fetchCity'])->name('city.fetch');

Route::get('/permission/create', function () {
    $permission = request()->query('name');
    Permission::create(['name' => $permission]);
    dd('created');
});//  permission creation route ( remove from production application )