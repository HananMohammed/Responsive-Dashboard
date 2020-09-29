<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Admin Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::middleware(['auth:sanctum', 'verified'])->get('/Admin', function () {
//    return Inertia\Inertia::render('Dashboard');
//})->name('Admin');
Route::middleware(['auth:sanctum', 'verified'])->group(function (){

Route::get('/dashboard', function () {
                    return Inertia\Inertia::render('Dashboard');
              })->name('dashboard');
Route::prefix('admin')->group(function(){
   Route::get('/home', 'DashboardController@index')->name('home');
   Route::resource('/blog', 'BlogController');
   Route::resource('/projects', 'ProjectsController')->except('show');
   Route::get('projects/imageDelete/{id}', 'ProjectsController@deleteImage')->name('imageDelete');
   Route::resource('/projects-category', 'ProjectsCategoryController')->except('show');
   Route::resource('/seo', 'SeoController')->only(['index' , 'store', 'update']);
   Route::resource('/new-services', 'NewServicesController')->except('show');
   Route::resource('creative_service', 'CreativeServiceController');
   Route::resource('/blog-category', 'BlogCategoryController');
   Route::resource('/blog-image', 'BlogImageController');
   Route::resource('creative_service', 'CreativeServiceController')->except('show');
   Route::resource('/sub_service', 'SubServiceController')->except('show');
   Route::resource('/offers', 'OfferController')->except('show');
   Route::get('/offers/offersStatus', 'OfferStatusController@offerStatus')->name('offerStatus');
   Route::resource('/challenges', 'ChallengeController')->except('show');
   Route::resource('/skills', 'SkillsController')->except('show');
   Route::get('/check-slug' ,'SlugController@checkOffersSlug')->name('check-slug');
   Route::resource('/permissions','PermissionController');
   Route::resource('/roles','RoleController')->except('show');
   Route::resource('/employees', 'EmployeeController')->except('show') ;

});
});
