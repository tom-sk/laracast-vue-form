<?php

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

Route::get('/', ['middleware' => 'sub', function () {
    return view('welcome');
}]);

Route::get('skills', function(){
    return ['js', 'html', 'php'];
});

Route::get('/projects/create', 'ProjectsController@create');
Route::post('projects', 'ProjectsController@store');
