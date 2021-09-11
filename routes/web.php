<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SitePagesController;
use App\Http\Controllers\AdminPagesController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\postController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;
use PharIo\Manifest\AuthorCollection;

    //site
    Route::get('/',[SitePagesController::class,'homePage'])->name('site.index');
    Route::get('posts/{categoryTitle}',[SitePagesController::class,'categoryPosts'])->name('site.categoryPosts');
    Route::get('posts/{categoryTitle}/{id}',[SitePagesController::class,'postPage'])->name('site.postPage');

    Route::group(['prefix' => '',  'middleware' => 'user'], function()
    {    
        Route::post('posts/sendComment',[SitePagesController::class,'sendComment'])->name('site.sendComment');

        Route::get('/profile/{logedUser}',[UserProfileController::class,'userProfile'])->name('site.userProfile');
        Route::post('/profile/edit/{logedUser}',[UserProfileController::class,'userProfileEdit'])->name('site.userProfileEdit');
        Route::post('/profile/passwordEdit/{logedUser}',[UserProfileController::class,'userPasswordEdit'])->name('site.userPasswordEdit');

    });
    //admin
    Route::get('/login',[AuthController::class,'loginPage'])->name('admin.login');
    Route::get('/register',[AuthController::class,'registerPage'])->name('admin.signup');
    Route::post('/createAccount',[AuthController::class,'createAccount'])->name('admin.createAccount');
    Route::post('/loginAccount',[AuthController::class,'loginAccount'])->name('admin.loginAccount');
    Route::get('/logoutAccount',[AuthController::class,'logoutAccount'])->name('admin.logoutAccount');
    Route::post('/userPasswordRecovery',[AuthController::class,'userPasswordRecovery'])->name('admin.userPasswordRecovery');
    Route::get('/passwordReset/{code}',[AuthController::class,'passwordReset'])->name('admin.passwordReset');
    Route::post('/passwordResetSubmit/{code}',[AuthController::class,'passwordResetSubmit'])->name('admin.passwordResetSubmit');


Route::group(['prefix' => 'admin',  'middleware' => 'admin'], function()
{
    Route::get('/dashboard',[AdminPagesController::class,'dashboard'])->name('admin.dashboard');
    
    Route::get('/categories',[CategoryController::class,'index'])->name('admin.categories');
    Route::post('/addCategory',[CategoryController::class,'add'])->name('admin.addCategory');
    Route::post('/editCategory/{id}',[CategoryController::class,'edit'])->name('admin.editCategory');
    Route::get('/deleteCategory/{id}',[CategoryController::class,'delete'])->name('admin.deleteCategory');
    
    Route::get('/posts',[PostController::class,'index'])->name('admin.posts');
    Route::post('/addPost',[PostController::class,'add'])->name('admin.addPost');
    Route::post('/editPost/{id}',[PostController::class,'edit'])->name('admin.editPost');
    Route::get('/deletePost/{id}',[PostController::class,'delete'])->name('admin.deletePost');

    Route::get('/users',[UserController::class,'index'])->name('admin.users');
    Route::get('/deleteUser/{id}',[UserController::class,'delete'])->name('admin.deleteUser');
    
});

