<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\HomeController;

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

//Route::get('/', 'LocalizationController@index');
//Route::get('change/lang', 'LocalizationController@lang_change')->name('LangChange');

Route::get('/', 'PagesController@index');


Route::get('/inner', function () {
    return view('inner');
});


//auth for dashboard
Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::resource('/dashboard/messages', MessagesController::class);
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

 


//admenu

Route::get('/advantages','PagesController@advantages')->name('advantages');
Route::get('/program', 'PagesController@program')->name('program');
Route::get('/about', 'PagesController@about')->name('about');
Route::get('/partners', 'PagesController@partners')->name('partners');
Route::get('/suppliers', 'PagesController@suppliers')->name('suppliers');
Route::get('/history', 'PagesController@history')->name('history');
Route::get('/eduplan', 'PagesController@eduplan')->name('eduplan');
Route::get('/extras', 'PagesController@history')->name('extras');
Route::get('/calendar', 'PagesController@calendar')->name('calendar');
Route::get('/toparents', 'PagesController@toParents')->name('toparents');
Route::get('/tostudents', 'PagesController@toStudents')->name('tostudents');
Route::get('/aboutm', 'PagesController@aboutMoodle')->name('aboutm');
Route::get('/comitee', 'PagesController@comitee')->name('comitee');
Route::get('/eduplan', 'PagesController@eduplan')->name('eduplan');
Route::get('/primary', 'ClassesController@primarySchool')->name('primary');
Route::get('/mid', 'ClassesController@midSchool')->name('mid');
Route::get('/secondary', 'ClassesController@secondarySchool')->name('secondary');
Route::get('/state', 'PagesController@state')->name('state');
Route::get('/finance', 'PagesController@finance')->name('finance');
Route::get('/alumni', 'PagesController@alumni')->name('alumni');
Route::get('/graduation', 'PagesController@graduation')->name('graduation');
Route::get('/equipment', 'PagesController@equipment')->name('equipment');

Route::post('/mlogin', 'PagesController@moodleLogin')->name('mlogin');
Route::get('/nlike', 'NovitasController@like')->name('nlike');
Route::get('/elike', 'EventsController@like')->name('elike');
Route::get('/alike', 'ActivitiesController@like')->name('alike');



Route::resource('/novitas', 'NovitasController');
Route::resource('/emails', 'EmailsController');
Route::resource('/candidates', 'CandidatesController');
Route::resource('/students', 'StudentsController');
Route::resource('/teachers', 'TeachersController');
Route::resource('/infos', 'InfosController');
Route::resource('/timetables', 'TimetablesController');
Route::resource('/activities', 'ActivitiesController');
Route::resource('/concours', 'ConcoursController');
Route::resource('/fees', 'FeesController');
Route::resource('/services', 'ServicesController');
Route::resource('/events', 'EventsController');
Route::resource('/photos', 'PhotosController');
Route::resource('/classes', 'ClassesController');
Route::resource('/parachas', 'ParachasController');
Route::resource('/parents', 'ParentisController');
Route::resource('/meals', 'MealsController');
Route::resource('/materials', 'MaterialsController');
Route::resource('/projects', 'ProjectsController');
Route::resource('/reviews', 'ReviewsController');
Route::resource('/jobs', 'JobsController');

Route::fallback(function () {return view('layouts.default.404');}
);
