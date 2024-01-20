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

use App\Facility;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Rutas Facility
Route::get('/facilities', 'FacilityController@index')->name('facilities.listar')->middleware('auth');

Route::delete('/facility/{id}', 'FacilityController@delete')->name('facilities.eliminar')->middleware('auth','admin');

Route::get('/createFacility', 'FacilityController@create')->name('facilities.nuevo')->middleware('auth','admin');

Route::post('/facility', 'FacilityController@save')->name('facilities.crear')->middleware('auth','admin');

Route::get('/updateFacility/{id}', 'FacilityController@edit')->name('facilities.editar')->middleware('auth','admin');

Route::put('/facility/{id}', 'FacilityController@update')->name('facilities.actualizar')->middleware('auth','admin');

Route::get('/facility/{id}', function($id){
    $facility = Facility::findOrFail($id);
    return view('facilities.detalle',compact('facility'));

})->name('facilities.detalle')->middleware('auth');

Route::post('/facilityBookingsSearch/{id}','FacilityController@searchBookings')
->name('filtrarPorHora')->middleware('auth');

//Route::get('/facilitiesDesc', 'FacilityController@indexDescripcion')->name('facilities.sort');

//Rutas Instructor
Route::get('/instructors', 'InstructorController@index')->name('instructors.listar')->middleware('auth','admin');

Route::delete('/instructor/{id}', 'InstructorController@delete')->name('intructors.eliminar')->middleware('auth','admin');

Route::get('/createInstructor', 'InstructorController@create')->name('instructors.nuevo')->middleware('auth','admin');

Route::post('/instructor', 'InstructorController@save')->name('instructors.crear')->middleware('auth','admin');

Route::get('/updateInstructor/{id}', 'InstructorController@edit')->name('instructors.editar')->middleware('auth','admin');

Route::put('/instructor/{id}', 'InstructorController@update')->name('instructors.actualizar')->middleware('auth','admin');


//Rutas User
Route::get('/users', 'UserController@index')->name('users.listar')->middleware('auth','admin');

Route::delete('/user/{id}', 'UserController@delete')->name('users.eliminar')->middleware('auth','admin');

Route::get('/createUser', 'UserController@create')->name('users.nuevo')->middleware('auth','admin');

Route::post('/user', 'UserController@save')->name('users.crear')->middleware('auth','admin');

Route::get('/updateUser/{id}', 'UserController@edit')->name('users.editar')->middleware('auth','admin');

Route::put('/user/{id}', 'UserController@update')->name('users.actualizar')->middleware('auth','admin');



//Rutas Actividad
Route::get('/activities', 'ActivityController@index')->name('activities.listar')->middleware('auth');

Route::delete('/activity/{id}', 'ActivityController@delete')->name('activities.eliminar')->middleware('auth','admin');

Route::get('/myactivities', 'ActivityController@getUserActivities')->name('activities.user')->middleware('auth');

Route::post('/regActivity/{id}', 'ActivityController@inscribe')->name('activities.inscribirse')->middleware('auth');

Route::get('/createActivity', 'ActivityController@create')->name('activities.crear')->middleware('auth','admin');

Route::post('/activity', 'ActivityController@save')->name('activities.guardar')->middleware('auth','admin');

Route::get('/updateActivity/{id}', 'ActivityController@edit')->name('activities.editar')->middleware('auth','admin');

Route::put('/activity/{id}', 'ActivityController@update')->name('activities.actualizar')->middleware('auth','admin');



//Rutas Reserva
Route::get('/bookings', 'BookingController@index')->name('bookings.listar')->middleware('auth');

Route::delete('/booking/{id}', 'BookingController@delete')->name('bookings.eliminar')->middleware('auth','admin');

//Route::get('/createBooking', 'BookingController@create')->middleware('auth')->name('bookings.crear');

Route::post('/booking', 'BookingController@save')->name('bookings.reservar')->middleware('auth');

Route::get('/user/{id}', 'BookingController@recogerUsuario'); //??? 

Route::put('/booking/{id}', 'BookingController@update')->name('bookings.actualizar')->middleware('auth','admin');

//Route::get('/searchBooking', 'BookingController@search')->name('bookings.buscar'); //esta creo que no se usa

Route::delete('/booking/cancelation/{id}', 'BookingController@cancel')->name('bookings.cancelar')->middleware('auth');

Route::post('/reservaMultipleBooking','BookingController@multiple')->name('bookings.multiple')->middleware('auth');



//Rutas vistas parte pública
Route::get('/', function () {
    return view('inicio');
})->name('inicio');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');
