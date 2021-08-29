<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MonthlyController;
use App\Http\Controllers\WeeklyController;

use App\Http\Controllers\WeightController;
use App\Http\Controllers\HeightController;

// use App\Http\Livewire\Monthly;

use Illuminate\Support\Facades\Auth;

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
    //return "close";
    // return "作業中";
    if(Auth::id()===null)
    {
        return view('top');
    }else{
        return redirect('/weight');
    }    
});

/*
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
*/

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
	$authName='dashboard';

    // ヘルプ
    Route::get('/help', function () {
        return view('help/index');
    })->name($authName);

    // 今日の記録
    Route::get('/weight', [WeightController::class, 'index'])->name($authName);
    // 身長の変更
    Route::get('/height', [HeightController::class, 'index'])->name($authName);

    // 今日の記録
    Route::post('/weight', [WeightController::class, 'post'])->name($authName);
    // 身長の変更
    Route::post('/height', [HeightController::class, 'post'])->name($authName);

    // 週の記録
    Route::get('/weekly', [WeeklyController::class, 'index'])->name($authName);
    // 月間の記録
    Route::get('/monthly', [MonthlyController::class, 'index'])->name($authName);
});



