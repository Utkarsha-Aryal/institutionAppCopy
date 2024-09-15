<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backpanel\UserController;
use App\Http\Controllers\Backpanel\DashbordController;
use App\Http\Controllers\Backpanel\HomepageController;
use App\Http\Controllers\BackPanel\ForgotPasswordController;
use App\Http\Controllers\Backpanel\OtpController;
use App\Http\Controllers\Backpanel\SiteSettingController;
use App\Http\Controllers\Backpanel\AboutUsController;
use App\Http\Controllers\Backpanel\TeamCategoryController;
use App\Http\Controllers\Backpanel\TeamMemberController;



use \App\Http\Controllers\Backpanel\AuthManagerController;

Route::get('/login',[AuthManagerController::class,'login'])->name('login');
Route::post('/login',[AuthManagerController::class,'loginPost'])->name('login.post');
Route::get('/registration',[AuthManagerController::class,'registration'])->name('registration');
Route::post('/registration',[AuthManagerController::class,'registrationPost'])->name('registration.post');
Route::get('/logout',[AuthManagerController::class,'logout'])->name('logout');
Route::post('/changepassword', [AuthManagerController::class, 'changepassword'])->name('changepassword');
Route::get('/forgotpassword',[ForgotPasswordController::class, 'index'])->name('forgotpassword');
Route::post('/checkuser',[ForgotPasswordController::class,'isRegisteredUser'])->name('checkuser');
Route::post('validotp',[OtpController::class,"isValidOtp"])->name('validotp');
Route::get('/otp', [OtpController::class, 'index'])->name('otp');
Route::get('/resetpassword',[OtpController::class,'indexResetPassword'])->name('resetpassword');
Route::post('updatepassword', [ForgotPasswordController::class, 'updatePassword'])->name('updatepassword');




Route::view('/main','layout.main');



Route::group(['middleware'=> 'auth'],function(){
    Route::get('/profile',function(){
        return 'Hi';
    });
    Route::get('/index',[AuthManagerController::class,'index'])->name('home');




    Route::prefix('admin')->name('admin.')->group(function() {
        Route::get('/account', function () {
            if (auth()->check() && (auth()->user()->role_id == 1 || auth()->user()->role_id == 2)) {
                return app(UserController::class)->index();
            }
            abort(403, 'Unauthorized action.');
        })->name("index");
        Route::post('/save', [UserController::class, 'save'])->name('save');
        Route::get('/data', [UserController::class, 'data'])->name('data');
        Route::get('/form', [UserController::class, 'form'])->name('form');
        Route::post('/delete', [UserController::class, 'delete'])->name('delete');
        Route::get('/dashboard',[HomepageController::class, 'index'])->name('dashboard');

        Route::group(['prefix'=>'sitesetting'],function(){
            Route::get('/',[SiteSettingController::class,'siteSetting'])->name('sitesetting');
            Route::post('/update', [SiteSettingController::class, 'updateSiteSetting'])->name('sitesetting.update');


        });

        Route::group(['prefix' => 'aboutus'], function () {
            Route::get('/', [AboutUsController::class, 'aboutUs'])->name('aboutus');
            Route::post('/update', [AboutUsController::class, 'updateAboutUs'])->name('aboutus.update');
        });


        Route::group(['prefix'=>'teamcategory'],function(){
            Route::get('/', [TeamCategoryController::class, 'index'])->name('teamcategory');
            Route::post('/save', [TeamCategoryController::class, 'save'])->name('teamcategory.save');
            Route::post('/list', [TeamCategoryController::class, 'list'])->name('teamcategory.list');
            Route::post('/delete', [TeamCategoryController::class, 'delete'])->name('teamcategory.delete');
        });


        Route::group(['prefix' => 'member'], function () {
            Route::get('/', [TeamMemberController::class, 'index'])->name('member');
            Route::post('/save', [TeamMemberController::class, 'save'])->name('member.save');
            Route::any('/form', [TeamMemberController::class, 'form'])->name('member.form');
            Route::post('/list', [TeamMemberController::class, 'list'])->name('member.list');
            Route::post('/delete', [TeamMemberController::class, 'delete'])->name('member.delete');
        });


        
    });
    

});




