<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 
Route::middleware(['auth','isAdmin'])->group(function(){
    Route::get('/dashboard', function () {
        return view('admin.index');
     });
});

Route::get('add/Category',[CategoryController::class,'createCategory'])->name('add.category');
Route::get('add/UerCategory',[CategoryController::class,'createUserCategory'])->name('add.usercategory');
Route::post('save/UserCategory',[CategoryController::class,'SaveUserCategory'])->name('UserCategory.save');
Route::get('manage/UserCategory',[CategoryController::class,'manageUserCategory'])->name('manage.usercategory');
Route::get('add/UserProduct',[ProductController::class,'createUSerProduct'])->name('add.userproduct');
Route::get('manage/UserProduct',[ProductController::class,'manageUserProduct'])->name('manage.userproduct');
Route::post('save/UserProduct',[ProductController::class,'SaveUSerProduct'])->name('USerProduct.save');

Route::get('manage/Category',[CategoryController::class,'manageCategory'])->name('manage.category');
Route::post('save/Category',[CategoryController::class,'SaveCategory'])->name('Category.save');
Route::get('Edit/Category/{id}',[CategoryController::class,'EditCategory'])->name('Category.edit');
Route::post('update/Category',[CategoryController::class,'updateCategory'])->name('update.Category');
Route::post('delet/Category',[CategoryController::class,'deletCategory'])->name('delete.Category');
Route::get('add/Product',[ProductController::class,'createProduct'])->name('add.product');
Route::get('manage/Product',[ProductController::class,'manageProduct'])->name('manage.product');
Route::post('save/Product',[ProductController::class,'SaveProduct'])->name('Product.save');
Route::get('Edit/Product/{id}',[ProductController::class,'EditProduct'])->name('Product.edit');
Route::post('update/Product',[ProductController::class,'updateProduct'])->name('update.Product');
Route::post('delet/Product',[ProductController::class,'deletProduct'])->name('delete.Product');



