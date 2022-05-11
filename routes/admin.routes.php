<?php

use Illuminate\Support\Facades\Route;

//Dashboard
Route::name('admin')->get('/', 'App\Http\Controllers\Admin\DashboardController@index');

//User Management
Route::name('user')->get('/user', 'App\Http\Controllers\Admin\UserController@index')->middleware(['permission:user-view']);
Route::name('user.create')->get('/user/create', 'App\Http\Controllers\Admin\UserController@create')->middleware(['permission:user-create']);
Route::name('user.store')->post('/user/store', 'App\Http\Controllers\Admin\UserController@store')->middleware(['permission:user-create']);
Route::name('user.profile')->get('/user/profile/{id}', 'App\Http\Controllers\Admin\UserController@profile')->middleware(['permission:user-profile']);
Route::name('user.update.email')->post('/user/update/email', 'App\Http\Controllers\Admin\UserController@updateEmail')->middleware(['permission:user-update']);
Route::name('user.check.email')->get('/user/check/email', 'App\Http\Controllers\Admin\UserController@checkEmail');
Route::name('user.delete')->get('/user/delete/{id}', 'App\Http\Controllers\Admin\UserController@destroy');

//Roles
Route::name('role')->get('/role', 'App\Http\Controllers\Admin\RoleController@index');
Route::name('role.create')->get('/role/create', 'App\Http\Controllers\Admin\RoleController@create');
Route::name('role.store')->post('/role/store', 'App\Http\Controllers\Admin\RoleController@store');
Route::name('role.edit')->get('/role/edit/{id}', 'App\Http\Controllers\Admin\RoleController@edit');
Route::name('role.view')->get('/role/view/{id}', 'App\Http\Controllers\Admin\RoleController@view');
Route::name('role.update')->post('/role/update', 'App\Http\Controllers\Admin\RoleController@update');
Route::name('role.delete')->get('/role/delete/{id}', 'App\Http\Controllers\Admin\RoleController@delete');

//Permission
Route::name('permission')->get('/permission', 'App\Http\Controllers\Admin\PermissionController@index');
Route::name('permission.check')->get('/permission/check', 'App\Http\Controllers\Admin\PermissionController@check');
Route::name('permission.store')->post('/permission/store', 'App\Http\Controllers\Admin\PermissionController@store');
Route::name('permission.delete')->get('/permission/store/delete/{id}', 'App\Http\Controllers\Admin\PermissionController@delete');

//Student Manager
Route::name('student')->get('/student', 'App\Http\Controllers\Admin\StudentController@index')->middleware(['permission:student-view']);
Route::name('student.create')->get('/student/create', 'App\Http\Controllers\Admin\StudentController@create')->middleware(['permission:student-create']);
Route::name('student.store')->post('/student/store', 'App\Http\Controllers\Admin\StudentController@store')->middleware(['permission:student-create']);
Route::name('student.profile')->get('/student/profile/{id}', 'App\Http\Controllers\Admin\StudentController@profile')->middleware(['permission:student-profile']);
Route::name('student.update')->post('/student/update', 'App\Http\Controllers\Admin\StudentController@update')->middleware(['permission:student-update']);
Route::name('student.update.email')->post('/student/update/email', 'App\Http\Controllers\Admin\StudentController@updateEmail')->middleware(['permission:student-update-email']);
Route::name('student.update.name')->post('/student/update/name', 'App\Http\Controllers\Admin\StudentController@updateName')->middleware(['permission:student-update-name']);
Route::name('student.delete')->get('/student/delete/{id}', 'App\Http\Controllers\Admin\StudentController@delete')->middleware(['permission:student-delete']);

// Course
Route::name('course')->get('/course', 'App\Http\Controllers\Admin\CourseController@index')->middleware(['permission:course-view']);
Route::name('course.fetch.batch')->get('/course/fetch/batch', 'App\Http\Controllers\Admin\CourseController@fetchCourse');

// Batch
Route::name('batch')->get('/batch', 'App\Http\Controllers\Admin\BatchController@index')->middleware(['permission:batch-view']);

// Group
Route::name('group')->get('/group', 'App\Http\Controllers\Admin\GroupController@index')->middleware(['permission:group-view']);

//Subject 
Route::name('subject')->get('/subject', 'App\Http\Controllers\Admin\SubjectController@index')->middleware(['permission:subject-view']);

//Lesson
Route::name('lesson')->get('/lesson', 'App\Http\Controllers\Admin\LessonController@index')->middleware(['permission:lesson-view']);
Route::name('lesson.fetch')->get('/lesson/fetch', 'App\Http\Controllers\Admin\LessonController@fetch');

//Question
Route::name('question')->get('/question', 'App\Http\Controllers\Admin\QuestionController@index')->middleware(['permission:question-view']);

//Question Type
Route::name('question.type')->get('/question/type', 'App\Http\Controllers\Admin\QuestionTypeController@index')->middleware(['permission:question-type-view']);

//Option
Route::name('option.fetch')->get('/option/fetch', 'App\Http\Controllers\Admin\OptionController@fetch');

//Test
Route::name('test')->get('/test', 'App\Http\Controllers\Admin\TestController@index')->middleware(['permission:test-view']);
Route::name('test.create')->get('/test/create', 'App\Http\Controllers\Admin\TestController@create')->middleware(['permission:test-create']);

?>