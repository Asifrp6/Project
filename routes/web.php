<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\Backend\ProductController;

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
    return view('frontend.index');
});

// Route::get('/dash', function () {
//     return view('backend.dash');
// });


// Route::get('/homepage',[ProductController::class,'homepage'])->name("homepage");

Route::get('/product',[ProductController::class,'index'])->name("product");
Route::post('/addproduct',[ProductController::class,'store'])->name("addproduct");
Route::get('/showproduct',[ProductController::class,'show'])->name("showproduct");
Route::get('/delete/{id}',[ProductController::class,'delete'])->name("delete");
Route::get('/edit/{id}',[ProductController::class,'edit'])->name("edit");
Route::post('/update/{id}',[ProductController::class,'update'])->name("update");

Route::get('/active/{id}',[ProductController::class,'active'])->name("active");
Route::get('/inactive/{id}',[ProductController::class,'inactive'])->name("inactive");

Route::get('/',[ProductController::class,'view'])->name("view");
Route::get('singleproduct/{id}',[ProductController::class,'singleproduct'])->name("singleproduct");

Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
