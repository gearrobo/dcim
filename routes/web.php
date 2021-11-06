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

Route::get('/', 'DashboardController@index');
Route::get('/export','RoomController@export_excel');

Route::as('page.')->prefix('page')->group(function () {
    Route::as('room')->get('/room', 'RoomController@index');
    Route::as('room.sensor')->get('/room/sensor/{link}', 'RoomController@sensor');
    Route::as('room.sensor.detail')->get('/room/detail/{link}/{id}', 'RoomController@detail');
});


Route::get('/rackserver', 'RackController@index');
Route::get('/rackserver/detail/{id}', 'RackController@detail');

Route::get('/electric', 'ElectricController@index');
Route::get('/electric/detail/{id}', 'ElectricController@detail');

Route::as('generator.')->prefix('generator')->group(function () {
    Route::as('page')->get('/page', 'GeneratorController@index');
    Route::as('page.store')->post('/page/store', 'GeneratorController@store');
});

Route::as('lamp.')->prefix('lamp')->group(function(){
    Route::as('index')->get('/index','LampController@index');
    Route::as('update')->post('/update/{id}','LampController@update');
});

Route::as('ups.')->prefix('ups')->group(function () {
    Route::as('page')->get('/page', 'UpsController@index');
    Route::as('page.detail')->get('/page/detail/{id}', 'UpsController@detail');
});

Route::get('/hvac', 'HvacController@index');
Route::get('/hvac/detail/{id}', 'HvacController@detail');

Route::as('security.')->prefix('security')->group(function () {
    Route::as('page')->get('/page', 'SecurityController@index');
    Route::as('list')->get('/page/list', 'SecurityController@list');
    Route::as('book')->get('/page/book', 'SecurityController@book');
    Route::as('book.store')->post('/security/store', 'SecurityController@store');
});


Route::as('setting.')->prefix('setting')->group(function () {
    Route::as('page')->get('/page', 'SettingController@index');

    Route::as('ipupdate')->post('/ipupdate/{id}','SettingController@update');

    Route::as('page.sensor')->get('/page/sensor', 'SettingController@sensor');
    Route::as('page.sensor.store')->post('/page/sensor/store', 'SettingController@storesensor');
    Route::as('page.sensor.update')->patch('/setting/sensor/update', 'SettingController@updatesensor');
    Route::as('page.sensor.destroy')->get('/setting/sensor/destroy/{id}', 'SettingController@destroysensor');

    Route::as('page.sensortypes')->get('/page/sensortypes', 'SettingController@sensortypes');
    Route::as('page.sensortypes.store')->post('/setting/sensortypes/store', 'SettingController@storesensortypes');
    Route::as('page.sensortypes.update')->patch('/setting/sensortype/update', 'SettingController@updatesensortypes');
    Route::as('page.sensortypes.destroy')->get('/setting/sensortype/destroy/{id}', 'SettingController@destroysensortypes');

    Route::as('page.devices')->get('/page/devices', 'SettingController@devices');
    Route::as('page.devices.detail')->get('/page/devices/detail/{id}', 'SettingController@devicesdetail');
    Route::as('page.devices.store')->post('/page/devices/store', 'SettingController@storedevices');
    Route::as('page.devices.sensor.store')->post('/page/devices/sensor/store', 'SettingController@sensordevices');
    Route::as('page.devices.update')->patch('/page/devices/update', 'SettingController@updatedevices');
    Route::as('page.devices.destroy')->get('/page/devices/destroy/{id}/{type_id}', 'SettingController@destroydevices');

    Route::as('page.rack')->get('/page/rack', 'SettingController@racks');
    Route::as('page.rack.store')->post('/page/rack/store', 'SettingController@storerack');
    Route::as('page.rack.destroy')->get('/page/rack/destroy/{id}', 'SettingController@destroyrack');
});
