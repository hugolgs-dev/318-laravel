<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'firewall.all'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });



    Route::get('membres', 'App\Http\Controllers\ControleurMembres@index');
    Route::get('membre/{numero}', 'App\Http\Controllers\ControleurMembres@afficher');
    Route::get('creer', 'App\Http\Controllers\ControleurMembres@creer');
    Route::post('creer', 'App\Http\Controllers\ControleurMembres@enregistrer');
    Route::get('modifier/{id}', 'App\Http\Controllers\ControleurMembres@editer');
    Route::patch('miseAJour/{id}', 'App\Http\Controllers\ControleurMembres@miseAJour');
    Route::get('/identite','App\Http\Controllers\ControleurMembres@identite');
    Route::get('/protege','App\Http\Controllers\ControleurMembres@acces_protege')
        ->middleware('auth');
    Route::get('/admin/pending_users',
        'App\Http\Controllers\ControleurMembres@pendingUsers');
    Route::post('/admin/approve_user/{id}',
        'App\Http\Controllers\ControleurMembres@approveUser');

});


Route::group(['middleware' => 'firewall.all'], function () {
    // les routes
});
