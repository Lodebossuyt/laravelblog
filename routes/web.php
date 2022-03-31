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

Route::get('/', function () {
   return view('index');
});

Route::get('/contactformulier', 'App\Http\Controllers\ContactController@create');
Route::post('/contactformulier', 'App\Http\Controllers\ContactController@store');
Route::get('/post/{post:slug}','App\Http\Controllers\AdminPostController@post')->name('home.post');
Route::get('/category/{category:slug}','App\Http\Controllers\CategoriesController@category')->name('home.category');
//Route::Resource('/categories','App\Http\Controllers\CategoriesController');
/*Route::get('/contact', function(){
   return view('contactformulier');
});*/

//verify zorgt ervoor dat enkel een geverifieerde user wordt toegelaten aan de ge-auntentiseerde routes
Auth::routes(['verify'=>true]);



/**backend routes*/



//beveiliging van meerdere routes via middleware
/*Route::middleware(['auth'])->group(function(){
    Route::resource('admin/users', App\Http\Controllers\AdminUsersController::class);
});*/

Route::group(['prefix'=>'admin', 'middleware' => 'admin'], function(){
    Route::resource('users',App\Http\Controllers\AdminUsersController::class);

    Route::get('users/restore/{user}', 'App\Http\Controllers\AdminUsersController@restore')->name('users.restore');
    Route::get('posts/restore/{post}', 'App\Http\Controllers\AdminPostController@restore')->name('posts.restore');
    Route::get('categories/restore/{category}', 'App\Http\Controllers\AdminCategoriesController@restore')->name('categories.restore');
    Route::resource('comments',App\Http\Controllers\AdminPostCommentsController::class);
    Route::resource('replies',App\Http\Controllers\AdminPostCommentsRepliesController::class);
    Route::resource('tags',App\Http\Controllers\AdminPostsTagsController::class);
});

// 2 soorten middleware via Route::group(['prefix'=> 'admin', 'middleware' => ['auth', 'admin'], function(){})

Route::group(['prefix'=>'admin', 'middleware' => ['auth', 'verified']], function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->middleware('verified')->name('homebackend');
    Route::resource('photos',App\Http\Controllers\AdminPhotosController::class);
    Route::resource('media',App\Http\Controllers\AdminMediasController::class);
    Route::resource('posts',App\Http\Controllers\AdminPostController::class);
    Route::resource('categories',App\Http\Controllers\AdminCategoriesController::class);
    Route::resource('products',App\Http\Controllers\AdminProductsController::class);
    Route::resource('brands',App\Http\Controllers\AdminBrandsController::class);
    Route::resource('productcategories',App\Http\Controllers\AdminProductCategoryController::class);

});
