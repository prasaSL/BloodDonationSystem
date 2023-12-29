<?php

use App\Http\Controllers\BloodBankController;
use App\Http\Controllers\donorController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [userController::class, 'index'])->name('home');
Route::get('/logout', [userController::class, 'logout'])->name( 'logout');

route::match(['get', 'post'],'/schedule/{user_id} ', [donorController::class, 'schedule'])->name('schedule');
Route::match(['get', 'post'], '/schedule', [donorController::class, 'scheduleDonation'])->name('schedule.post');

route::get('/login', [userController::class, 'login'])->name('login');

route::get('/d_register', [userController::class, 'D_register'])->name('D_register');

route::post('/d_register', [userController::class, 'DRegistration'])->name('D_register.post');

route::post('/login', [userController::class, 'loginTo'])->name('login.post');

route::post('/update-location', [donorController::class, 'updateLocation'])->name('update.location');

route::get('/blood-banks', [BloodBankController::class, 'getBloodBanks'])->name('blood.banks');


route::get('/schedule_list',[donorController::class, 'lordshedule'])->name('schedule_list');

route::post('/delate-schedule',[donorController::class, 'delateSchedule'])->name('delate-schedule');

route::get('/staff_registration', [UserController::class, 'getRegisterForm'])->name('staff_registration');

route::post('/staff_registration_post', [UserController::class, 'registerAll'])->name('staff_registration.post');

route::get('/SBBank',[donorController::class, 'autocomplete'])->name('SBBank');

route::post('/PostNotification',[userController::class, 'PostNotification'])->name('PostNotification');

route::get('/getNotification',[userController::class, 'getNotification'])->name('CreateNotification');

route::get('/Notification',[userController::class, 'getNotificationById'])->name('getNotificationById');

route::get('/Notifications',[userController::class, 'showNotification'])->name('ShowNotification');

Route::delete('/deleteNotification/{id}', [UserController::class, 'delateNotification'])->name('deleteNotification');

Route::get('/profile', [ProfileController::class, 'get_profile'])->name('profile');

route::get('/profileEdit', [ProfileController::class, 'viewUpdateProfile'])->name('profileEdit');

Route::get('/get-location', [ProfileController::class, 'getLocation'])->name('getLocation');

route::get('/SHospital',[ProfileController::class, 'HAutocomplete'])->name('SHospital');

Route::get('/get-Hlocation', [ProfileController::class, 'getHLocation'])->name('getHLocation');

Route::post('/update-profile', [ProfileController::class, 'updateProfile'])->name('update.profile');


