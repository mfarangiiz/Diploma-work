<?php

use App\Http\Controllers\AbakusController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MotorikaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('darslik/abakus', [HomeController::class, 'abakus'])->name('abakus')->middleware(['auth', 'verified']);
Route::get('darslik/motorika', [HomeController::class, 'motorika'])->name('motorika')->middleware(['auth', 'verified']);
Route::get('/bizhaqimizda', [HomeController::class, 'about'])->name('about');

Route::post('message/send', [ChatController::class, 'send'])->middleware(['auth', 'verified'])->name('message.send');
Route::put('admin/send/{id}', [ChatController::class, 'receive'])->middleware(['auth', 'verified'])->name('admin.message.send');

Route::get('/dashboard', [HomeController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');


//admin
Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::resource('/users', UserController::class);
    Route::resource('/abakus', AbakusController::class);
    Route::resource('/motorika', MotorikaController::class);
    Route::get('/homepage', [AdminController::class, 'homepage'])->name('homepage');
    Route::post('/homepageUpdate', [AdminController::class, 'honePageSetting'])->name('homepage.update');
    Route::get('/search/lesson', [AdminController::class, 'searchLesson'])->name('search.lesson');



});
Route::resource('/test', TestController::class);
Route::get('student/test/{name}/{id}', [TestController::class, 'startTest'])->name('client.test.show');
Route::post('/submit-test', [TestController::class, 'submitTest'])->name('submit.test');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit')->middleware(['role:admin']);
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy')->middleware(['role:admin']);
});



//sms json

Route::put('/admin/chat/read/{user}', [ChatController::class, 'markAsRead'])->name('admin.chat.read');
Route::put('/admin/chat/read/{id}', [AdminController::class, 'markMessagesAsRead']);
// web.php
Route::post('/chat/mark-as-answered', [ChatController::class, 'markAsAnswered'])->name('chat.markAsAnswered');



require __DIR__ . '/auth.php';
