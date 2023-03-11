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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/classes', function() {
    return "My classes";
});

//parameters with dependency injections
// http://localhost:8000/class/33282?sort=asc&search=all
// Route::get('/class/{id}', function(Request $request, $id) {
//     return response($request->all());
// });

Route::get('/class/{id}/activity/{activity_id}', function($code, $activity) {
    return 'Class Code: ' .$code .' Activity #: ' .$activity;; 
})->name('studentWorks')->middleware('auth');


Route::prefix('/class')->group(function() {
//optional parameters include ? 
    Route::get('/{id}', function($id) {
        return 'Class Code: ' .$id;
    })->where('id', '[0-9]+');
    Route::get('/{id}/students', function() {
        return 'Student';
    });
});



Route::get('/news', function() {
    return "News";
});

Route::get('/forums', function() {
    return "Forums";
});

// Route::match(['get', 'post'], '/contacts', function() {
//     return 'Contacts';
// });

Route::get('/contacts', function() {
    $route = Route::currentRouteName();
    return response($route);
})->name('contacts');

Route::middleware('auth')->get('/login', function() {
    return 'login';
});


Route::post('contacts', function(Request $request){

});

Route::redirect('/contact-us', '/contacts', 301);

//foldername.filename
Route::view('/about-us','home.about', ['name' => 'John Doe']);

//sample
// Route::get('/faq', SampleController@index)->name('faq');


//model binding
Route::get('admin/users/{user}', function(User $user) {
    return $user;
});


Route::fallback(function() {
    Route::view('404');
});


Route::get('/login', function() {
    return 'login';
})->name('login'); 



//Eloquent Model
//fetch all record
Route::get('courses', function() {
    //select * from course left join content on course.id =  content.course_id where is_draft = 0;
    // $courses = Course::all();  // all records
    $courses = Course::select('id','name')->with('contents')->where('is_draft', 0)->get(); // where constraints and related table

    return $courses;

});

//single record
Route::get('course/{id}', function($id) {

    $course = Course::find($id);

    return $course;
});

//queries 

Route::get('course', function() {
    $course = Course::where('is_free', 1)->first();

    $course = Course::where('is_free', 1)->get();

    return $course;
});


 //demo purposes
Route::get('course/create', function() {

    $course = Course::firstOrCreate([
        'name' => 'Static Value'
    ]);

    $course = Course::firstOrNew([
        'name' => 'Static Value'

    ])->save();


    $course = new Course;
    $course->name = 'Static Value';
    $course->save();

    return $course;
});

Route::get('contents', function() {
    
    $contents = Content::with('notes')->get();

    return $contents;
});