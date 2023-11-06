<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AuthOtpController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

Route::middleware(['2fa'])->group(function () {   

   // Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::post('/2fa', function () {

        return redirect(route('dashboard'));

    })->name('2fa');

});

Route::get('/verify', [HomeController::class, 'verify'])->name('verify');
Route::get('/complete-registration', [RegisterController::class, 'completeRegistration'])->name('complete.registration');

//echo $_SERVER['HTTP_REFERER'];
Route::get('/otp/login',[AuthOtpController::class, 'login'])->name('otp.login');
Route::post('/otp/generate',[AuthOtpController::class, 'generate'])->name('otp.generate');
Route::get('/otp/verification/{user_id}',[AuthOtpController::class, 'verification'])->name('otp.verification');
Route::post('/otp/login',[AuthOtpController::class, 'loginWithOtp'])->name('otp.getlogin');

if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], 'verification') !== false) {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
}