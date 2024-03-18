<?php

use App\Http\Controllers\HomeController;
use App\Livewire\Actie;
use App\Livewire\Admin\AdminActions;
use App\Livewire\Admin\AdminCategories;
use App\Livewire\Admin\AdminProducts;
use App\Livewire\Admin\AdminSubtypes;
use App\Livewire\Admin\AdminTypes;
use Illuminate\Support\Facades\Route;
use App\Livewire\Categories;
use App\Livewire\Category\Types;
use App\Livewire\Contact;
use App\Livewire\MainCategory;

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

Route::get('/', [HomeController::class, 'showHome'])->name('home');

Route::get('/Categorie', MainCategory::class)->name('Categorie');

Route::get('/Categorie/{slug?}', Categories::class)->name('Categorie');

Route::get('/Categorie/{slug?}/{name?}', Types::class)->name('Types');

Route::get('/Contact', Contact::class)->name('Contact');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->prefix('dashboard')->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/admincategories', AdminCategories::class)->name('dashboard.admincategories');

    Route::get('/admintypes', AdminTypes::class)->name('dashboard.admintypes');

    Route::get('/adminsubtypes', AdminSubtypes::class)->name('dashboard.adminsubtypes');

    Route::get('/adminproducts', AdminProducts::class)->name('dashboard.adminproducts');
});