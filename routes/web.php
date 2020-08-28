<?php

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

Route::get('/', 'PagesController@index');

Route::get('/status', 'PagesController@status');

// Status (Client)
Route::get('/status/filter','PagesController@filter')->name('filter.barang');

Auth::routes();

Route::post('/pesan','PesanController@store')->name('store.pesan');

Route::match(["GET", "POST"], "/register", function(){ return redirect("/login"); })->name("register");

Route::middleware('auth')->group(function() {
        
  // Database Barang
  Route::get('/barang','BarangController@index');
  Route::get('/barang/create','BarangController@create');
  Route::post('/barang','BarangController@store');
  Route::get('/barang/{barang}/edit','BarangController@edit');
  Route::patch('/barang/{barang}','BarangController@update');
  Route::delete('/barang/{barang}','BarangController@destroy');
  Route::post('/laporanpdf','BarangController@generatePDF');

  // Database Pelanggan
  Route::get('/pelanggan','PelangganController@index');
  Route::get('/pelanggan/create','PelangganController@create');
  Route::post('/pelanggan','PelangganController@store');
  Route::get('/pelanggan/{pelanggan}/edit','PelangganController@edit');
  Route::patch('/pelanggan/{pelanggan}','PelangganController@update');
  Route::delete('/pelanggan/{pelanggan}','PelangganController@destroy');

  // Database Karyawan
  Route::get('/karyawan','KaryawanController@index');
  Route::get('/karyawan/create','KaryawanController@create');
  Route::post('/karyawan','KaryawanController@store');
  Route::get('/karyawan/{karyawan}/edit','KaryawanController@edit');
  Route::patch('/karyawan/{karyawan}','KaryawanController@update');
  Route::delete('/karyawan/{karyawan}','KaryawanController@destroy');

  // Database Pesan
  Route::resource('pesan','PesanController')->except(['store']);

  Route::get('/home', 'HomeController@index')->name('home');

  Route::get('/addadmin','AdminController@create')->name('admin.register');
  Route::post('/admin','AdminController@store');
});