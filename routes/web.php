<?php

use App\Http\Controllers\FileTemplateController;
// use Illuminate\Routing\Route;

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');
Route::get('speaker/{speaker}', 'HomeController@view')->name('speaker');
Route::get('honorary/{honorary}', 'HomeController@view')->name('honorary');
Route::get('ispeaker/{ispeaker}', 'HomeController@view')->name('ispeaker');
Route::redirect('/home', '/admin');
Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Settings
    Route::delete('settings/destroy', 'SettingsController@massDestroy')->name('settings.massDestroy');
    Route::resource('settings', 'SettingsController');

    // Speakers
    Route::delete('speakers/destroy', 'SpeakersController@massDestroy')->name('speakers.massDestroy');
    Route::post('speakers/media', 'HonoraryController@storeMedia')->name('speakers.storeMedia');
    Route::resource('speakers', 'SpeakersController');

    // Honorary
    Route::delete('honorary/destroy', 'HonoraryController@massDestroy')->name('honorary.massDestroy');
    Route::post('honorary/media', 'HonoraryController@storeMedia')->name('honorary.storeMedia');
    Route::resource('honorary', 'HonoraryController');

    // Invited Speaker
    Route::delete('ispeaker/destroy', 'InvitedSpeakerController@massDestroy')->name('ispeaker.massDestroy');
    Route::post('ispeaker/media', 'InvitedSpeakerController@storeMedia')->name('ispeaker.storeMedia');
    Route::resource('ispeaker', 'InvitedSpeakerController');

    // commite
    Route::delete('commite/destroy', 'CommiteController@massDestroy')->name('commite.massDestroy');
    Route::post('commite/media', 'CommiteController@storeMedia')->name('commite.storeMedia');
    Route::resource('commite', 'CommiteController');

    // Schedules
    Route::delete('schedules/destroy', 'ScheduleController@massDestroy')->name('schedules.massDestroy');
    Route::resource('schedules', 'ScheduleController');

    // Venues
    Route::delete('venues/destroy', 'VenuesController@massDestroy')->name('venues.massDestroy');
    Route::post('venues/media', 'VenuesController@storeMedia')->name('venues.storeMedia');
    Route::resource('venues', 'VenuesController');

    // Hotels
    Route::delete('hotels/destroy', 'HotelsController@massDestroy')->name('hotels.massDestroy');
    Route::post('hotels/media', 'HotelsController@storeMedia')->name('hotels.storeMedia');
    Route::resource('hotels', 'HotelsController');

    // Galleries
    Route::delete('galleries/destroy', 'GalleriesController@massDestroy')->name('galleries.massDestroy');
    Route::post('galleries/media', 'GalleriesController@storeMedia')->name('galleries.storeMedia');
    Route::resource('galleries', 'GalleriesController');

    // Sponsors
    Route::delete('sponsors/destroy', 'SponsorsController@massDestroy')->name('sponsors.massDestroy');
    Route::post('sponsors/media', 'SponsorsController@storeMedia')->name('sponsors.storeMedia');
    Route::resource('sponsors', 'SponsorsController');

    // Faqs
    Route::delete('faqs/destroy', 'FaqsController@massDestroy')->name('faqs.massDestroy');
    Route::resource('faqs', 'FaqsController');

    // FileTemplate
    Route::delete('filetemplate/destroy', 'FileTemplateController@massDestroy')->name('filetemplate.massDestroy');
    Route::resource('filetemplate', 'FileTemplateController');

    // Amenities
    Route::delete('amenities/destroy', 'AmenitiesController@massDestroy')->name('amenities.massDestroy');
    Route::resource('amenities', 'AmenitiesController');

    // Prices
    Route::delete('prices/destroy', 'PricesController@massDestroy')->name('prices.massDestroy');
    Route::resource('prices', 'PricesController');
});
