<?php

use App\Http\Controllers\AboutPagesController;
use App\Http\Controllers\ContactPageController;
use App\Http\Controllers\MainPage;
use App\Http\Controllers\ServicePagesController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PortfolioController;
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
    Route::get('admin/service/list', [ServicePagesController::class, 'list'])->name('admin.service.list');
    Route::get('admin/service/edit/{id}', [ServicePagesController::class, 'edit'])->name('admin.service.edit');
    Route::post('admin/service/update/{id}', [ServicePagesController::class, 'update'])->name('admin.service.update');
    Route::delete('admin/service/destroy/{id}', [ServicePagesController::class, 'destroy'])->name('admin.service.destroy');
// Services Routs


// Portfolio route
    Route::get('admin/portfolios/create', [PortfolioController::class, 'create'])->name('admin.portfolio.create');
    Route::get('admin/portfolios/list',  [PortfolioController::class, 'list'])->name('admin.portfolio.list');
    Route::put('admin/portfolios/store',  [PortfolioController::class, 'store'])->name('admin.portfolio.store');
    Route::get('admin/portfolios/edit/{id}',  [PortfolioController::class, 'edit'])->name('admin.portfolio.edit');
    Route::put('admin/portfolios/update/{id}',  [PortfolioController::class, 'update'])->name('admin.portfolio.update');
    Route::delete('admin/portfolios/destroy/{id}', [PortfolioController::class, 'destroy'])->name('admin.portfolio.destroy');
// Portfolio route

// About route
    Route::get('admin/about/create', [AboutPagesController::class, 'create'])->name('admin.about.create');
    Route::get('admin/about/list', [AboutPagesController::class, 'list'])->name('admin.about.list');
    Route::put('admin/about/store', [AboutPagesController::class, 'store'])->name('admin.about.store');
    Route::get('admin/about/edit/{id}', [AboutPagesController::class, 'edit'])->name('admin.about.edit');
    Route::put('admin/about/update/{id}',  [AboutPagesController::class, 'update'])->name('admin.about.update');
    Route::delete('admin/about/destroy/{id}', [AboutPagesController::class, 'destroy'])->name('admin.about.destroy');
// About route

// Contact route
Route::post('admin/contact', [ContactPageController::class, 'store'])->name('contact.store');
// Contact route

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
