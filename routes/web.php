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

Route::any('customers/index', 'CustomersController@index')->name('customers.index');
Route::get('customers/add', 'CustomersController@add')->name('customers.add');
    Route::get('customers/edit/{id}', 'CustomersController@edit')->name('customers.edit');
    Route::get('customers/view/{id}', 'CustomersController@view')->name('customers.view');
    Route::post('customers/store', 'CustomersController@store')->name('customers.store');
    Route::post('customers/update/{id}', 'CustomersController@update')->name('customers.update');
    Route::get('customers/delete/{id}', 'CustomersController@delete')->name('customers.delete');
    Route::post('customers/updateStatus', 'CustomersController@updateStatus')->name('customers.updateStatus');


// Route::any('users/index', 'UsersController@index')->name('users.index');
//   Route::post('users/updateStatus', 'UsersController@updateStatus')->name('users.updateStatus');

Route::any('payments/index', 'PaymentsController@index')->name('payments.index');
Route::get('payments/add', 'PaymentsController@add')->name('payments.add');
 Route::post('payments/store', 'PaymentsController@store')->name('payments.store');
   Route::get('payments/edit/{id}', 'PaymentsController@edit')->name('payments.edit');
  Route::post('payments/update/{id}', 'PaymentsController@update')->name('payments.update');
 Route::get('payments/delete/{id}', 'PaymentsController@delete')->name('payments.delete');
  Route::get('payments/delete/{id}', 'PaymentsController@delete')->name('payments.delete');
    Route::post('payments/updateStatus', 'PaymentsController@updateStatus')->name('payments.updateStatus');
 
//   Route::any('discounts/index', 'DiscountsController@index')->name('discounts.index');
// Route::get('discounts/add', 'DiscountsController@add')->name('discounts.add');
//  Route::post('discounts/store', 'DiscountsController@store')->name('discounts.store');
//   Route::get('discounts/edit/{id}', 'DiscountsController@edit')->name('discounts.edit');
//   Route::post('discounts/update/{id}', 'DiscountsController@update')->name('discounts.update');
//  Route::get('discounts/delete/{id}', 'DiscountsController@delete')->name('discounts.delete');
//    Route::post('discounts/updateStatus', 'DiscountsController@updateStatus')->name('discounts.updateStatus');
 
//  Route::any('templates/index', 'TemplatesController@index')->name('templates.index');
// Route::get('templates/add', 'TemplatesController@add')->name('templates.add');
// Route::post('templates/store', 'TemplatesController@store')->name('templates.store');

// Route::any('cards/index', 'CardsController@index')->name('cards.index');
// Route::get('cards/add', 'CardsController@add')->name('cards.add');

// Route::any('activities/index', 'ActivitiesController@index')->name('activities.index');
// Route::get('activities/add', 'ActivitiesController@add')->name('activities.add');
// Route::post('activities/store', 'ActivitiesController@store')->name('activities.store');
//   Route::get('activities/edit/{id}', 'ActivitiesController@edit')->name('activities.edit');
//   Route::post('activities/update/{id}', 'ActivitiesController@update')->name('activities.update');
//  Route::get('activities/delete/{id}', 'ActivitiesController@delete')->name('activities.delete');

// Route::any('targetedareas/index', 'TargetedareasController@index')->name('targetedareas.index');
// Route::get('targetedareas/add', 'TargetedareasController@add')->name('targetedareas.add');
//  Route::post('targetedareas/store', 'TargetedareasController@store')->name('targetedareas.store');
//   Route::get('targetedareas/edit/{id}', 'TargetedareasController@edit')->name('targetedareas.edit');
//   Route::post('targetedareas/update/{id}', 'TargetedareasController@update')->name('targetedareas.update');
//  Route::get('targetedareas/delete/{id}', 'TargetedareasController@delete')->name('targetedareas.delete');

// Route::any('pushnotifications/index', 'PushnotificationsController@index')->name('pushnotifications.index');
// Route::get('pushnotifications/add', 'PushnotificationsController@add')->name('pushnotifications.add');

// Route::any('modifiers/index', 'ModifiersController@index')->name('modifiers.index');
// Route::get('modifiers/add', 'ModifiersController@add')->name('modifiers.add');
// Route::post('modifiers/store', 'ModifiersController@store')->name('modifiers.store');
//   Route::get('modifiers/edit/{id}', 'ModifiersController@edit')->name('modifiers.edit');
//   Route::post('modifiers/update/{id}', 'ModifiersController@update')->name('modifiers.update');
//  Route::get('modifiers/delete/{id}', 'ModifiersController@delete')->name('modifiers.delete');

// Route::any('settings/index', 'SettingsController@index')->name('settings.index');


// Route::any('posts/index', 'PostsController@index')->name('posts.index');
// Route::get('posts/add', 'PostsController@add')->name('posts.add');

// Route::any('payments/index', 'PaymentsController@index')->name('payments.index');
// Route::get('payments/add', 'PaymentsController@add')->name('payments.add');
