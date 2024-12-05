<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\TwoFAController;
use App\Http\Middleware\Check2fa;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/email/verify', function () {
   return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');
})->name('verification.verify');


Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


Route::controller(TwoFAController::class)->group(function(){
    Route::get('two-factor-authentication', 'index')->name('2fa.index')->middleware(['auth','Check2Fa']);
    Route::post('two-factor-authentication/store', 'store')->name('2fa.store')->middleware(['auth','Check2Fa']);
    Route::get('two-factor-authentication/resend', 'resend')->name('2fa.resend')->middleware(['auth','Check2Fa']);
});

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/user', function(){
    return view('auth.user');
})->middleware(['auth'])->name('user');

Route::get('/review', function(){
    return view('auth.review');
})->middleware(['auth'])->name('review');

Route::get('/admin', function(){
    return view('auth.admin');
})->middleware(['auth'])->name('admin');


?>