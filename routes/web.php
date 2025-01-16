<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TMController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';




// Route::get('admin/dashboard', [AdminController::class, 'index'])->middleware(['auth','TM:admin'])->name('AdminIndex');
// Route::get('tm/dashboard', [TMController::class, 'TMIndex'])->middleware(['auth','TM:TM'])->name('TMIndex');




// Admin routes
Route::middleware(['auth', 'TM:admin'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('AdminIndex');


    Route::get('admin/dashboard/matchPageAdmin', [AdminController::class, 'matchPageAdmin'])->name('matchPageAdmin');
    Route::post('/matchPageAdmin', [AdminController::class, 'matchPageAdminPost'])->name('matchPageAdminPost');

    // Route::get('admin/dashboard/playerPageAdmin', [AdminController::class, 'playerPageAdmin'])->name('playerPageAdmin');
    // Route::post('admin/dashboard/playerPageAdmin', [AdminController::class, 'playerPageAdminPost'])->name('playerPageAdmin');

    Route::get('admin/dashboard/playerPageAdmin', [AdminController::class, 'playerPageAdmin'])->name('playerPageAdmin');
    Route::post('/playerPageAdmin', [AdminController::class, 'playerPageAdminPost'])->name('playerPageAdminPost');


    Route::get('admin/dashboard/teamPageAdmin', [AdminController::class, 'teamPageAdmin'])->name('teamPageAdmin');
    Route::post('/teamPageAdmin', [AdminController::class, 'teamPageAdminPost'])->name('teamPageAdminPost');

       
    Route::get('admin/dashboard/gallariesAdmin', [AdminController::class, 'gallariesAdmin'])->name('gallariesAdmin');
    Route::post('/gallariesAdmin', [AdminController::class, 'gallariesAdminPost'])->name('gallariesAdminPost');

    Route::get('admin/dashboard/scorePageAdmin', [AdminController::class, 'scorePageAdmin'])->name('scorePageAdmin');
    Route::post('/scorePageAdmin', [AdminController::class, 'scorePageAdminPost'])->name('scorePageAdminPost');

    Route::get('/editMatch', [AdminController::class, 'editMatch'])->name('editMatch');
    Route::get('/editPlayer', [AdminController::class, 'editPlayer'])->name('editPlayer');
});




// Team Manager routes
Route::middleware(['auth', 'TM:TM'])->group(function () {
    Route::get('tm/dashboard', [TMController::class, 'TMIndex'])->name('TMIndex');
});


//User routes
Route::middleware(['auth', 'TM:user'])->group(function () {
    // Route::get('tm/dashboard', [TMController::class, 'TMIndex'])->name('TMIndex');

});


// Routes for unauthenticated users

Route::get('/playerPage', [UserController::class, 'playerPage'])->name('playerPage');
Route::get('/messi', [UserController::class, 'messi'])->name('messi');



Route::get('/matchPage', [UserController::class, 'matchPage'])->name('matchPage');
Route::get('/matches/{id}', [UserController::class, 'show'])->name('matches.show');

Route::get('/topScorer', [UserController::class, 'topScorer'])->name('topScorer');
Route::get('/teamStanding', [UserController::class, 'teamStanding'])->name('teamStanding');


Route::get('/gallaries', [UserController::class, 'gallaries'])->name('gallaries');
Route::get('/gallaries/match={id}', [UserController::class, 'gallariesShow'])->name('gallariesShow');

Route::get('/teamIndex', [UserController::class, 'teamIndex'])->name('teamIndex');
Route::get('/teamDetails/id={id}', [UserController::class, 'teamDetails'])->name('teamDetails');


Route::get('/player/{id}', [UserController::class, 'player'])->name('player');
