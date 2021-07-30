<?php


use App\Http\Controllers\MainPage;
use App\Http\Controllers\ServicePagesController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [PageController::class, 'index'])->name('home');


Route::get('admin/dashbord', [PageController::class, 'dashbord'])->name('admin.dashbord');
Route::get('admin', [PageController::class, 'dashbord']);
Route::get('admin/service', [PageController::class, 'service'])->name('admin.service');
Route::get('admin/portfolio', [PageController::class, 'portfolio'])->name('admin.portfolio');
Route::get('admin/about', [PageController::class, 'about'])->name('admin.about');
Route::get('admin/contact', [PageController::class, 'contact'])->name('admin.contact');

// Main Routs
Route::get('admin/main', [MainPage::class, 'index'])->name('admin.main');
Route::put('admin/main', [MainPage::class, 'update'])->name('admin.main.update');
// Main Routs

// Services Routs
Route::get('admin/service/create', [ServicePagesController::class, 'create'])->name('admin.service.create');
Route::post('admin/service/create', [ServicePagesController::class, 'store'])->name('admin.service.store');
// Services Routs

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
