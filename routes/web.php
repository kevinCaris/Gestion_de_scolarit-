 <?php

use App\Http\Controllers\levelController;
use App\Http\Controllers\NiveauController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SchoolYearController;
use Illuminate\Routing\RouteAction;
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

    Route::prefix('niveaux')->group(function(){
        Route::get('/',[levelController::class,'index'])->name('niveaux');
    });
    Route::prefix('setting')->group(function(){
     Route::get('/',[SchoolYearController::class,'index'])->name('setting');
     Route::get('/create_school_year',[SchoolYearController::class,'create'])->name('setting.create_school_year');
     Route::get('/create_niveau',[levelController::class,'create'])->name('setting.create_level');
      Route::get('/edit_niveau/{level}',[levelController::class,'edit'])->name('setting.edite');

    });
});

require __DIR__.'/auth.php';
