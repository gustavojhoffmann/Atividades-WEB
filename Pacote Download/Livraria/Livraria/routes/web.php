<?php

use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\LivrariaController;
use App\Http\Controllers\LivrosController;
use App\Http\Controllers\ProfileController;
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
    return view('auth/register');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/fornecedor', [FornecedorController::class, 'index'])->name('fornecedor.index')->middleware('auth');
Route::get('/fornecedor/create', [FornecedorController::class, 'create'])->name('fornecedor.create')->middleware('auth');
Route::post('/fornecedor/store', [FornecedorController::class, 'store'])->name('fornecedor.store')->middleware('auth');
Route::get('/fornecedor/edit/{id}', [FornecedorController::class, 'edit'])->name('fornecedor.edit')->middleware('auth');
Route::post('/fornecedor/update/{id}', [FornecedorController::class, 'update'])->name('fornecedor.update')->middleware('auth');
Route::get('/fornecedor/destroy/{id}', [FornecedorController::class, 'destroy'])->name('fornecedor.destroy')->middleware('auth');

Route::get('/livraria', [LivrariaController::class, 'index'])->name('livraria.index')->middleware('auth');
Route::get('/livraria/create', [LivrariaController::class, 'create'])->name('livraria.create')->middleware('auth');
Route::post('/livraria/store', [LivrariaController::class, 'store'])->name('livraria.store')->middleware('auth');
Route::get('/livraria/edit/{id}', [LivrariaController::class, 'edit'])->name('livraria.edit')->middleware('auth');
Route::post('/livraria/update/{id}', [LivrariaController::class, 'update'])->name('livraria.update')->middleware('auth');
Route::get('/livraria/destroy/{id}', [LivrariaController::class, 'destroy'])->name('livraria.destroy')->middleware('auth');

Route::get('/livros', [LivrosController::class, 'index'])->name('livros.index')->middleware('auth');
Route::get('/livros/create', [LivrosController::class, 'create'])->name('livros.create')->middleware('auth');
Route::post('/livros/store', [LivrosController::class, 'store'])->name('livros.store')->middleware('auth');
Route::get('/livros/edit/{id}', [LivrosController::class, 'edit'])->name('livros.edit')->middleware('auth');
Route::post('/livros/update/{id}', [LivrosController::class, 'update'])->name('livros.update')->middleware('auth');
Route::get('/livros/destroy/{id}', [LivrosController::class, 'destroy'])->name('livros.destroy')->middleware('auth');


