<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});
Route::get('/admin', function () {
    return view('admin');
})->middleware('admin');
Route::get('/supervisor', function () {
    return view('supervisor');
})->middleware('supervisor')->name('supervisor');
Route::get('download', 'StudentController@generatePDF')->name('download')->middleware('student');
Route::get('downloadDefense/{id}', 'SupervisorController@downloadDefense')->name('downloadDefense')->middleware('supervisor');
Route::get('accepted', 'SupervisorController@acceptedDefense')->name('acceptedDefense')->middleware('supervisor');
Route::get('refused', 'SupervisorController@refusedDefense')->name('refusedDefense')->middleware('supervisor');
Route::get('mail/{id}', 'AdminController@mail')->name('mail');
Route::get('download/juryInvitations/{id}', 'AdminController@juryInvitations')->name('juryInvitations');
Route::put('accept/{id}', 'SupervisorController@accept')->name('accept')->middleware('supervisor');
Route::put('refused/{id}', 'SupervisorController@refused')->name('refused')->middleware('supervisor');
Route::post('Soutenance/jury/{id}', 'SupervisorController@store')->name('jury')->middleware('supervisor');
Route::post('Soutenance/information', 'SupervisorController@storeSupervisor')->name('information')->middleware('supervisor');
Route::resource('formulaire', 'StudentController')->except(['show'])->middleware('student');
Route::resource('Soutenance', 'SupervisorController')->except(['store', 'show', 'edit'])->middleware('supervisor');
Route::resource('admin', 'AdminController')->middleware('admin');
Auth::routes([
    "register" => false,
    ]);
