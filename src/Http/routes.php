<?php
/**
 * Created by PhpStorm.
 * User:    vadiasov.volodymyr@gmail.com
 * Project: pack.com
 * Date:    15.02.18
 * Time:    0:52
 */

// src/Http/routes.php
Route::group(['middleware' => ['web']], function () {
    Route::get('admin/roles', 'Vadiasov\RolesAdmin\Http\RolesController@index')->name('admin/roles');
    Route::get('admin/roles/create', 'Vadiasov\RolesAdmin\Http\RolesController@create')->name('admin/roles/create');
    Route::post('admin/roles/create', 'Vadiasov\RolesAdmin\Http\RolesController@store');
    Route::get('admin/roles/{id}/edit', 'Vadiasov\RolesAdmin\Http\RolesController@edit');
    Route::post('admin/roles/{id}/edit', 'Vadiasov\RolesAdmin\Http\RolesController@update');
    Route::get('admin/roles/{id}/delete', 'Vadiasov\RolesAdmin\Http\RolesController@destroy');
    
    Route::get('admin/get-user', 'Vadiasov\RolesAdmin\Http\RolesController@showUser');
});

