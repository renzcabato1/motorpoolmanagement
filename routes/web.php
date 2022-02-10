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


Auth::routes();
Route::group( ['middleware' => 'auth'], function()
{
    
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index')->name('home');

    //acounts
     Route::get('users','UserController@users');
     Route::post('new-account','UserController@new_account');
     Route::post('delete-account','UserController@delete_account');
     Route::post('change-password/{id}','UserController@changepassword');
     Route::post('deactivate-user','UserController@deactivate_user');
     Route::post('activate-user','UserController@activate_user');
     Route::post('edit-user/{id}','UserController@edit_user');

     //companies
     Route::get('companies','CompanyController@company');
     Route::post('new-company','CompanyController@new_company');
     Route::post('deactivate-company','CompanyController@deactivate_company');
     Route::post('activate-company','CompanyController@activate_company');
     Route::post('edit-company/{id}','CompanyController@edit_company');

     //Brand
     Route::get('brands','BrandController@brands');
     Route::post('deactivate-brand','BrandController@deactivate_brand');
     Route::post('activate-brand','BrandController@activate_brand');
     Route::post('new-brand','BrandController@new_brand');
     Route::post('edit-brand/{id}','BrandController@edit_brand');

     //Class
     Route::get('class-equipment','ClassController@class_equipment');
     Route::post('new-class','ClassController@new_class');
     Route::post('deactivate-class','ClassController@deactivate_class');
     Route::post('activate-class','ClassController@activate_class');
     Route::post('edit-class/{id}','ClassController@edit_class');

     //Category
     Route::post('new-category','CategoryController@new_category');
     Route::post('deactivate-category','CategoryController@deactivate_category');
     Route::post('activate-category','CategoryController@activate_category');
     Route::post('edit-category/{id}','CategoryController@edit_category');

     //Insurance
     Route::post('new-insurance','InsuranceController@new_insurance');
     Route::post('deactivate-insurance','InsuranceController@deactivate_insurance');
     Route::post('activate-insurance','InsuranceController@activate_insurance');
     Route::post('edit-insurance/{id}','InsuranceController@edit_insurance');

     //Equipments
     Route::get('equipments','EquipmentController@equipments');
     Route::post('new-equipment','EquipmentController@new_equipment');

     //Request
     Route::get('requests','RequestController@requests');

});


