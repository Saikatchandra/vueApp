<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

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
Route::get('/contentList', [App\Http\Controllers\ContentController::class, 'index'])->name('content.list');

Route::get('/getContentById/{id}', [App\Http\Controllers\ContentController::class, 'edit'])->name('content.edit');
Route::post('/updateContent/{id}', [App\Http\Controllers\ContentController::class, 'update'])->name('content.update');
Route::get('/deleteContent/{id}', [App\Http\Controllers\ContentController::class, 'delete'])->name('content.remove');

// Route::resource('roles', RoleController::class);
// Route::resource('users', UserController::class);
// Route::resource('products', ProductController::class);
Route::get('/userList', [App\Http\Controllers\UserController::class, 'index'])->name('user.list');
Route::post('/saveUser', [App\Http\Controllers\UserController::class, 'store'])->name('user.save');
Route::get('/getUserById/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::post('/updateUser/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
Route::get('/deleteUser/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.remove');

Route::get('/roleList', [App\Http\Controllers\RoleController::class, 'index'])->name('role.list');
Route::get('/deleteRole/{id}', [App\Http\Controllers\RoleController::class, 'delete'])->name('role.remove');
Route::get('/getRoleById/{id}', [App\Http\Controllers\RoleController::class, 'edit'])->name('role.edit');
// Route::post('/saveUser', [App\Http\Controllers\UserController::class, 'store'])->name('user.save');

Route::get('/permissionList', [App\Http\Controllers\RoleController::class, 'getPermission'])->name('role.getPermission');
Route::post('/saveRole', [App\Http\Controllers\RoleController::class, 'store'])->name('role.save');
