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
// frontend
Route::get('/','PageController@mainfun')->name('mainpage');

Route::get('brand/{id}','PageController@brandfun')->name('brandpage');

Route::get('loginform','PageController@loginfun')->name('loginpage');

Route::get('detail/{id}','PageController@detailfun')->name('detailpage');

Route::get('promotion','PageController@promotionfun')->name('promotionpage');

Route::get('registerform','PageController@registerfun')->name('registerpage');

Route::get('cart','PageController@cartfun')->name('cartpage');

Route::get('category/{id}','PageController@categoryfun')->name('categorypage');




/*backend*/



/*end backend*/

Route::resource('orders','OrderController');

Route::middleware('role:Admin')->group(function ()
{
	Route::get('dashboard','BackendController@dashboardfun')->name('dashboardpage');

	Route::resource('items','ItemController');
	Route::resource('brands','BrandController');

	Route::resource('categories','CategoryController');

	Route::resource('subcategories','SubcategoryController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
