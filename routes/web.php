<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AbakusController,
    AdminController,
    CommentController,
    ChatController,
    HomeController,
    MotorikaController,
    ProfileController,
    TeacherController,
    TestController,
    UserController
};

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/bizhaqimizda', [HomeController::class, 'about'])->name('about');
Route::resource('/comments', CommentController::class);

// Authenticated routes
Route::middleware(['auth', 'verified'])->group(function () {

    // Lessons
    Route::get('darslik/abakus', [HomeController::class, 'abakus'])->name('abakus');
    Route::get('darslik/motorika', [HomeController::class, 'motorika'])->name('motorika');

    // Dashboard
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    // Messaging
    Route::post('message/send', [ChatController::class, 'send'])->name('message.send');
    Route::put('admin/send/{id}', [ChatController::class, 'receive'])->name('admin.message.send');
    Route::post('/chat/mark-as-answered', [ChatController::class, 'markAsAnswered'])->name('chat.markAsAnswered');

    // Chat reading
    Route::put('/admin/chat/read/{user}', [ChatController::class, 'markAsRead'])->name('admin.chat.read');
    Route::put('/admin/chat/read/{id}', [AdminController::class, 'markMessagesAsRead']);

    // Profile (admin only)
    Route::middleware(['role:admin|teacher|user'])->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });


    // Admin and teacher routes

    Route::middleware(['role:admin|teacher'])->group(function () {

        // Admin-only resources
        Route::middleware(['role:admin'])->group(function () {
            Route::resource('/teachers', TeacherController::class);
        });

        // Shared access

        Route::resource('/users', UserController::class);
        Route::resource('/abakus', AbakusController::class);
        Route::resource('/motorika', MotorikaController::class);

        // Admin homepage settings

        Route::get('/homepage', [AdminController::class, 'homepage'])->name('homepage');
        Route::post('/homepageUpdate', [AdminController::class, 'honePageSetting'])->name('homepage.update');
        Route::get('/search/lesson', [AdminController::class, 'searchLesson'])->name('search.lesson');
        Route::get('/filter', [AdminController::class, 'filterUser'])->name('filter.student');
        Route::get('/test/filter', [AdminController::class, 'testFilter'])->name('filter.test');
        Route::get('/test/filter/byage', [AdminController::class, 'testFilterAge'])->name('filter.age.test');

        //new test


    });

    Route::get('/math-test', [TestController::class, 'showForm']);
    Route::post('/generate-question', [TestController::class, 'generate']);
    Route::post('/submit-answer', [TestController::class, 'submit']);

    // Tests
    Route::resource('/test', TestController::class);
    Route::get('student/test/{name}/{id}', [TestController::class, 'startTest'])->name('client.test.show');
    Route::post('/submit-test', [TestController::class, 'submitTest'])->name('submit.test');
});

// Auth scaffolding
require __DIR__ . '/auth.php';
