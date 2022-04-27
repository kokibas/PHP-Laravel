<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublishController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

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
route::get('/',[AuthorsController::class,'index'])->name('index')->middleware('auth');
route::prefix('Authors')->group(function() {
    route::post('/create',[AuthorsController::class,'create'])->name('create');
    route::post('/update',[AuthorsController::class,'update'])->name('update');
    route::get('/delete/{id}',[AuthorsController::class,'delete'])->name('delete');
    route::get('/create',[AuthorsController::class,'createPage'])->name('create_page');
    route::get('/update/{id}',[AuthorsController::class,'updatePage'])->name('update_page');
    
});

route::prefix('Books')->group(function() {
    route::get('/books/{id}',[BooksController::class,'books'])->name('book_page');
    route::get('/create/{id}',[BooksController::class,'createPage'])->name('create_book');
    route::post('/create',[BooksController::class,'create'])->name('create_bookname');
    route::get('/update/{id}',[BooksController::class,'updatePage'])->name('update_book');
    route::post('/update',[BooksController::class,'update'])->name('update_bookname');
    route::get('/delete/{id}',[BooksController::class,'delete'])->name('delete_bookname');
});
route::prefix('Publication')->group(function() {
    route::get('/publish/{id}',[PublishController::class,'publishPage'])->name('publish_Page');
    route::get('/create/{id}',[PublishController::class,'createPage'])->name('create_publish');
    route::post('/create',[PublishController::class,'create'])->name('create_publishpage');
    route::get('/update/{id}',[PublishController::class,'updatePage'])->name('update_publish');
    route::post('/update',[PublishController::class,'update'])->name('update_publishpage');
    route::get('/delete/{id}',[PublishController::class,'delete'])->name('delete_publish');
});

Route::post('/login', [LoginController::class, 'login'])->name('log');
route::get('/login',[LoginController::class,'loginPage'])->name('login_page');
route::get('/logout',[LoginController::class,'logout'])->name('logout')->middleware('auth');
Route::get('/register', [RegistrationController::class,'registerPage'])->name('register_page');
Route::post('/register', [RegistrationController::class,'register'])->name('register');
route::get('/profile',[ProfileController::class,'profilePage'])->name('profile_page');
route::post('/profile',[ProfileController::class,'profile'])->name('profile');
route::get('/edit/{id}',[ProfileController::class,'profileEdit'])->name('edit_profile');
route::get('/password',[ProfileController::class,'passwordPage'])->name('edit_password');
route::post('/password',[ProfileController::class,'password'])->name('password');
    

route::prefix('Users')->group(function(){
    route::get('/users',[UserController::class,'users'])->name('user_page')->middleware('auth');
    route::get('/delete/{id}',[UserController::class,'delete'])->name('delete_user');
    route::get('/createUser',[UserController::class,'createPage'])->name('create_user');
    route::post('/createUser',[UserController::class,'create'])->name('new_user');
    route::get('/editUser/{id}',[UserController::class,'editPage'])->name('edit_user');
    route::post('/editUser',[UserController::class,'edit'])->name('admin_edit');
    route::get('/change/{id}',[UserController::class,'changePage'])->name('change_password');
    route::post('/change',[UserController::class,'change'])->name('change');
});