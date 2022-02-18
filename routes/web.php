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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/categoryList', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.list');
Route::post('/saveCategory', [App\Http\Controllers\CategoryController::class, 'store'])->name('category.save');
Route::get('/getCategoryById/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit');
Route::post('/updateCategory/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
Route::get('/deleteCategory/{id}', [App\Http\Controllers\CategoryController::class, 'delete'])->name('category.remove');


Route::get('/subCategoryList', [App\Http\Controllers\SubCategoryController::class, 'index'])->name('subCategory.list');
Route::post('/saveSubCategory', [App\Http\Controllers\SubCategoryController::class, 'store'])->name('subCategory.save');
Route::get('/getSubCategoryById/{id}', [App\Http\Controllers\SubCategoryController::class, 'edit'])->name('subCategory.edit');
Route::post('/updateSubCategory/{id}', [App\Http\Controllers\SubCategoryController::class, 'update'])->name('subCategory.update');
Route::get('/deleteSubCategory/{id}', [App\Http\Controllers\SubCategoryController::class, 'delete'])->name('subCategory.remove');

Route::get('/getSubCategoryByCategoryId/{id}', [App\Http\Controllers\ContentController::class, 'getSubCategoryByCatId'])->name('subCategory.remove');
Route::post('/saveContent', [App\Http\Controllers\ContentController::class, 'store'])->name('content.save');


