<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;


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

        $movies = DB::table('movies')->get();
   // echo $movies;
     return view('film', ['movies' => $movies]);
 });
   // return  view('film');
 

Route::get('/add', function () {

    return  view('addmovie');
});

Route::post('/movie/save',[MoviesController::class, 'store']);

Route::get('/movie/delete',[MoviesController::class, 'delete']);

Route::get('/movie/edit',[MoviesController::class, 'edit']);
Route::post('/movie/update',[MoviesController::class, 'update']);



Route::get('hello/{nama}', function ($nama) {
    return view('latihan',['nama'=>$nama]);
});