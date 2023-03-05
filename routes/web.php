<?php

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\MarqueController;
use App\Http\Controllers\ModeleController;
use App\Http\Controllers\VoitureController;

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Start Marque Routes -----------------------------------------------------------------
Route::get('/marque', [MarqueController::class, 'index'])->name('marque');

Route::get('/marque/ajouter', [MarqueController::class, 'create']);
Route::post('/marque/ajouter', [MarqueController::class, 'store']);

Route::get('/marque/{marque}/edit', [MarqueController::class, 'edit']);
Route::put('/marque/{marque}/edit', [MarqueController::class, 'update']);

Route::delete('/{marque}', [MarqueController::class, 'destroy'])->name('destroy');
// End Marque Routes -----------------------------------------------------------------

// Start Modele Routes -----------------------------------------------------------------
Route::get('/modele', [ModeleController::class, 'index'])->name('modele');

Route::get('/modele/ajouter', [ModeleController::class, 'create']);
Route::post('/modele/ajouter', [ModeleController::class, 'store']);

Route::get('/modele/{modele}/edit', [ModeleController::class, 'edit']);
Route::put('/modele/{modele}/edit', [ModeleController::class, 'update']);

Route::delete('/modele/{modele}', [ModeleController::class, 'destroy'])->name('modele.destroy');
// End Modele Routes -----------------------------------------------------------------

// Start Voitures Routes -----------------------------------------------------------------
Route::get('/voiture', [VoitureController::class, 'index'])->name('voiture');

Route::get('/voiture/ajouter', [VoitureController::class, 'create']);
Route::post('/voiture/ajouter', [VoitureController::class, 'store']);

Route::get('/voiture/{voiture}/edit', [VoitureController::class, 'edit']);
Route::put('/voiture/{voiture}/edit', [VoitureController::class, 'update']);

Route::delete('/voiture/{voiture}', [VoitureController::class, 'destroy'])->name('voiture.destroy');
// End Voitures Routes -----------------------------------------------------------------

require __DIR__.'/auth.php';
