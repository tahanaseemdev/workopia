<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\JobController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookmarkController;

Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::resource('jobs', JobController::class);

Route::resource('jobs', JobController::class)->middleware('auth')->only(['create', 'edit', 'update', 'destroy']);

Route::resource('jobs', JobController::class)->except(['create', 'edit', 'update', 'destroy']);

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'register'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
});
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/bookmarks', [BookmarkController::class, 'index'])->name('bookmarks.index');
    Route::post('/bookmarks{job}', [BookmarkController::class, 'store'])->name('bookmarks.store');
    Route::delete('/bookmarks{job}', [BookmarkController::class, 'destroy'])->name('bookmarks.destroy');
});









Route::match(['get', 'post'], '/submit', function () {
    return 'Submitted';
});

Route::any('/submit', function () {
    return 'Submitted';
});

Route::get('/tester', function () {
    $url = route('jobs');
    return "<a href='$url'>Click Here</a>";
});

Route::get('/api/users', function () {
    return [
        'name' => 'John Doe',
        'email' => 'john@gmail.com'
    ];
});

Route::get('/posts/{id}', function (string $id) {
    return 'Post ' . $id;
});
// })->whereAlphaNumeric('id');
// })->where('id', '[a-zA-Z]+');

Route::get('/posts/{id}/{commentId}', function (string $id, string $commentId) {
    return 'Post ' . $id . ' Comment ' . $commentId;
});

Route::get('/test', function (Request $request) {
    return [
        'method' => $request->method(),
        'url' => $request->url(),
        'path' => $request->path(),
        'fullUrl' => $request->fullUrl(),
        'ip' => $request->ip(),
        'userAgent' => $request->userAgent(),
        'header' => $request->header(),
    ];
});

Route::get('/users', function (Request $request) {
    return $request->except('name');
    // return $request->input('name', 'default name');
    // return $request->has('name');
    // return $request->all();
    // return $request->only(['name', 'age']);
    // return $request->query('name');
});

// Route::get('/notfound', function () {
//     return new Response('Page Not Found', 404);
// });

Route::get('/notfound', function () {
    return response('Page Not Found', 404);
});

Route::get('/response', function () {
    return response('<h1>Hello World</h1>', 200)->header('Content-Type', 'text/plain');
});

Route::get('/response-json', function () {
    return response()->json(['name' => 'John Doe', 'age' => 12])->cookie('name', 'John Doe');
});

Route::get('/read-cookie', function (Request $request) {
    $cookieValue = $request->cookie('name');
    return response()->json(['cookie' => $cookieValue]);
});

Route::get('/download', function () {
    return response()->download(public_path('favicon.ico'));
});
