<?php

use App\Http\Controllers\RuleController;
use App\Models\Category;
use App\Models\Rule;
use Illuminate\Support\Facades\Route;

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

// Route::get('/rules', [RuleController::class, 'index'])->name('rules.index');
// Route::get('/rules/create', [RuleController::class, 'create'])->name('rules.create');
// Route::post('/rules', [RuleController::class, 'store'])->name('rules.store');
// Route::get('/rules/{rule}', [RuleController::class, 'show'])->name('rules.show');
// Route::get('/rules/{rule}/edit', [RuleController::class, 'edit'])->name('rules.edit');
// Route::post('/rules/{rule}', [RuleController::class, 'update'])->name('rules.update');
Route::resource('rules', RuleController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
