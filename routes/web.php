<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/menulist', function () {
    return view('menulist');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/viewfeedback', 'Feedback\FeedbackController@index');
Route::put('/feedbackform', 'Feedback\FeedbackController@insert');
Route::get('/menulist', 'Management\MenuController@menu');

Route::middleware(['auth'])->group(function () {
    Route::get('/cashier', 'Cashier\CashierController@index');
    Route::get('/cashier/showOrder', 'Cashier\CashierController@store');
    Route::get('/feedback', 'Feedback\FeedbackController@showfeedback');
});


Route::middleware(['auth','VerifyAdmin'])->group(function () {
    Route::get('/management', function(){
        return view('management.index');
    });
    
    //routes for management
    Route::resource('management/category','Management\CategoryController');
    Route::resource('management/menu','Management\MenuController');
    Route::resource('management/user','Management\UserController');
	
	
	Route::get('management/user/{id}/editPassword','Management\UserController@editPassword');
    Route::put('/management/user/{id}/updatePassword','Management\UserController@updatePassword');
    
});

