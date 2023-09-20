<?php

use App\Models\Category;
use App\Models\Item;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReportController;
use App\Mail\DailyReport;
use Illuminate\Support\Facades\Mail;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/sell', function () {
        $items = Item::all(
            'id',
            'name',
            'price',
            'stock',
        );
        return view('sell', compact('items'));
    })->name('sell');

    Route::get('/inventory', function () {
        $itemCount = Item::count();
        $categoryCount = Category::count();
        return view('inventory/index', compact('itemCount', 'categoryCount'));
    })->name('inventory');

    Route::get('/settings', function () {
        return view('settings');
    })->name('settings');

    Route::get('sendmail', function () {
        $recipient = 'arielferaguirre.2001@gmail.com';
        Mail::to($recipient)->send(new DailyReport());
    })->name('mails.dailyreport');

    # Items
    Route::get('/items', [ItemController::class, 'index'])->name('items.index');
    Route::get('/items/{item}', [ItemController::class, 'show'])->name('items.show');
    Route::delete('/items/{item}', [ItemController::class, 'destroy'])->name('items.destroy');
    # Categories
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
    # Reports
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    # Sales
    Route::post('/sales', [SaleController::class, 'store'])->name('sales.store');
});
