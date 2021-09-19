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
Route::get('proposals', 'ProposalController@index')->name('proposals');
Route::get('proposals/show/{id}', 'ProposalController@show')->name('proposals.show');
Route::get('proposals/category/{id}', 'ProposalCategoryController@index')->name('proposals.category');

Route::get('analitics', 'ProposalController@analitics')->name('analitics');

// Routes search 
Route::get('/search', 'ProposalController@search');

// Routes Monnths analitics
Route::get('proposals/date/', 'ProposalController@month')->name('proposals.month');
// Routes Filters
Route::get('filter', 'ProposalController@filter')->name('filter');

// Authentication routes
Auth::routes();


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

// Include Wave Routes
Wave::routes();
