<?php

use App\Filament\Pages\User\ListUser;
use App\Http\Livewire\ShowMethods;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Livewire\ListUsers;

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
// Route::get('/',[ ShowMethods::class, 'home']);
//Route::get('/{module}', ['ShowMethods@modules']);
 Route::get('/{module?}', ShowMethods::class);

 Route::get('admin/list-users', ListUsers::class);


// Route::get('/', [ImageController::class, 'create']);
// Route::post('/', [ImageController::class, 'store']);
// Route::get('/{image}', [ImageController::class, 'show']);



// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
