<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\Content;
use App\Models\Note;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    Route::get('/', 'ContentController@index')->name('home');
    
    Route::get('/login', 'LoginController@show')->name('login.show');
    Route::post('/login', 'LoginController@login')->name('login.perform');

    Route::get('/register', 'RegisterController@show')->name('register.show');
    Route::post('/register', 'RegisterController@register')->name('register.perform');

    Route::get('/logout', 'LoginController@logout')->name('logout');
});


Route::group(['middleware' => ['auth']], function() {


    Route::get('courses', [App\Http\Controllers\CourseController::class,'index'])->name('courses');
    Route::get('courses/create',[App\Http\Controllers\CourseController::class,'create']);
    Route::post('courses', [App\Http\Controllers\CourseController::class,'store']);
    Route::get('courses/{id}', [App\Http\Controllers\CourseController::class,'show']);
    Route::get('courses/{id}/edit', [App\Http\Controllers\CourseController::class,'edit']);
    Route::patch('courses/{id}', [App\Http\Controllers\CourseController::class,'update']);
    Route::delete('courses/{id}', [App\Http\Controllers\CourseController::class,'destroy']);
    
    Route::get('/contents/filters',  [App\Http\Controllers\CourseController::class,'newmethod']);
    Route::resource('contents', App\Http\Controllers\ContentController::class);
    
});