<?php

use App\Task;
use Illuminate\Http\Request;

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */
Route::resource('my', 'MyController');
Route::any('/', 'AdminusersController@login');
Route::any('/admin', 'AdminusersController@login');
Route::any('adminusers/logout', 'AdminusersController@logout');
Route::any('adminusers/profile', 'AdminusersController@profile');
Route::any('adminusers/changepassword', 'AdminusersController@changepassword');

//Customer Details

Route::any('customers/personal/index', 'CustomersController@personal_index')->name('customers.personal_index');
Route::get('customers/personal/add', 'CustomersController@personal_add')->name('customers.personal_add');
Route::get('customers/personal/edit/{id}', 'CustomersController@personal_edit')->name('customers.personal_edit');
Route::get('customers/personal/view/{id}', 'CustomersController@personal_view')->name('customers.personal_view');
Route::post('customers/personal/store', 'CustomersController@personal_store')->name('customers.personal_store');
Route::post('customers/personal/update/{id}', 'CustomersController@personal_update')->name('customers.personal_update');
Route::get('customers/personal/delete/{id}', 'CustomersController@personal_delete')->name('customers.personal_delete');

Route::any('customers/official/index', 'CustomersController@official_index')->name('customers.official_index');
Route::get('customers/official/add', 'CustomersController@official_add')->name('customers.official_add');
Route::get('customers/official/edit/{id}', 'CustomersController@official_edit')->name('customers.official_edit');
Route::get('customers/official/view/{id}', 'CustomersController@official_view')->name('customers.official_view');
Route::post('customers/official/store', 'CustomersController@official_store')->name('customers.official_store');
Route::post('customers/official/update/{id}', 'CustomersController@official_update')->name('customers.official_update');
Route::get('customers/official/delete/{id}', 'CustomersController@official_delete')->name('customers.official_delete');

Route::any('payments/index', 'PaymentsController@index')->name('payments.index');
Route::get('payments/add', 'PaymentsController@add')->name('payments.add');
Route::post('payments/store', 'PaymentsController@store')->name('payments.store');
Route::get('payments/edit/{id}', 'PaymentsController@edit')->name('payments.edit');
Route::post('payments/update/{id}', 'PaymentsController@update')->name('payments.update');
Route::get('payments/delete/{id}', 'PaymentsController@delete')->name('payments.delete');
Route::get('payments/view/{id}', 'PaymentsController@view')->name('payments.view');
 
Route::any('blocks/index', 'BlocksController@index')->name('blocks.index');
Route::get('blocks/add', 'BlocksController@add')->name('blocks.add');
Route::post('blocks/store', 'BlocksController@store')->name('blocks.store');
Route::get('blocks/edit/{id}', 'BlocksController@edit')->name('blocks.edit');
Route::post('blocks/update/{id}', 'BlocksController@update')->name('blocks.update');
Route::get('blocks/delete/{id}', 'BlocksController@delete')->name('blocks.delete');
   
Route::any('masters/phase/index', 'MastersController@phase_index')->name('masters.phase_index');
Route::get('masters/phase/add', 'MastersController@phase_add')->name('masters.phase_add');
Route::get('masters/phase/edit/{id}', 'MastersController@phase_edit')->name('masters.phase_edit');
Route::get('masters/phase/view/{id}', 'MastersController@phase_view')->name('masters.phase_view');
Route::post('masters/phase/store', 'MastersController@phase_store')->name('masters.phase_store');
Route::post('masters/phase/update/{id}', 'MastersController@phase_update')->name('masters.phase_update');
Route::get('masters/phase/delete/{id}', 'MastersController@phase_delete')->name('masters.phase_delete');








// Route::any('posts/index', 'PostsController@index')->name('posts.index');
// Route::get('posts/add', 'PostsController@add')->name('posts.add');

// Route::any('payments/index', 'PaymentsController@index')->name('payments.index');
// Route::get('payments/add', 'PaymentsController@add')->name('payments.add');
