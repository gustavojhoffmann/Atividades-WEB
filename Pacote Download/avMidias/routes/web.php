<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MidiasController;
use App\Http\Controllers\IndexController;
 
Route::get ('/midias'             , [MidiasController::class, 'index'  ])->name('index');
Route::get ('/midias/novo'        , [MidiasController::class, 'create' ]);
Route::post('/midias/novo'        , [MidiasController::class, 'store'  ])->name('cadastro');
Route::get ('/midias/ver/{id}'    , [MidiasController::class, 'show'   ]);
Route::get ('/midias/editar/{id}' , [MidiasController::class, 'edit'   ]);
Route::post('/midias/editar/{id}' , [MidiasController::class, 'update' ])->name('alteracao');
Route::get ('/midias/deletar/{id}', [MidiasController::class, 'delete' ]);
Route::post('/midias/deletar/{id}', [MidiasController::class, 'destroy'])->name('deletar');
