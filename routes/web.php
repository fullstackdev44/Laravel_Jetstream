<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\addproductController;
use App\Http\Controllers\showprojectsController;
use App\Http\Controllers\ArticleGeneratorController;

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
Route::get('addproduct', [addproductController::class, 'addproduct']);
Route::post('addproduct2', [addproductController::class, 'addproduct2'])->name('addproduct2');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
     Route::get('/dashboard',[showprojectsController::class, 'show'])->name('dashboard');
});
Route::post('/write/generate', [ArticleGeneratorController::class, 'index'])->name('write.generate');
Route::get('/write', function () {
    $title = '';
    $content = '';
    return view('write', compact('title', 'content'));
});

require_once __DIR__ . '/jetstream.php';
