<?php

use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

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

Route::get('/broadcast', function () {
    broadcast(new App\Events\Example(User::find(1),Message::find(1)));
  //broadcast(new App\Events\Chat\ExampleTwo());
    //
});

require __DIR__.'/auth.php';
