<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogDetailController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Dashboard\AdminGalleryController;
use App\Http\Controllers\Dashboard\ChildController;
use App\Http\Controllers\Dashboard\DonationController as DonationDashboardController;
use App\Http\Controllers\Dashboard\HomeController as HomeDashboardController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\FeedbackController;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;

/*
|-------------------------------------------------------------------------- 
| Web Routes
|-------------------------------------------------------------------------- 
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::prefix('dashboard')->name('dashboard.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', [HomeDashboardController::class, 'index'])->name('index');
    Route::get('/donation/barang', [DonationDashboardController::class, 'viewBarang'])->name('donation.barang.index');
    Route::get('/donation/barang/create', [DonationDashboardController::class, 'create'])->name('donation.barang.create');
    Route::get('/donation/barang/edit/{id}', [DonationDashboardController::class, 'edit'])->name('donation.barang.edit');
    Route::put('/donation/barang/update/{id}', [DonationDashboardController::class, 'update'])->name('donation.barang.update');
    Route::delete('/donation/barang/destroy/{id}', [DonationDashboardController::class, 'destroy'])->name('donation.barang.destroy');
    Route::post('/donation/store', [DonationDashboardController::class, 'store'])->name('donation.barang.store');
    Route::get('/donation/uang', [DonationDashboardController::class, 'viewUang'])->name('donation.uang');
    Route::get('/donation/printMoneyDonation', [DonationDashboardController::class, 'printMoneyDonation'])->name('printMoneyDonation');

    Route::resources([
        'events' => \App\Http\Controllers\Dashboard\EventController::class,
        'galeries' => AdminGalleryController::class,
        'profile' => ProfileController::class,
        'child' => ChildController::class,
        'feedback' => FeedbackController::class,
        'contact' => ContactController::class,
    ]);
});

Route::middleware('auth')->group(function () {
    Route::post('/donation-form', [DonasiController::class, 'store'])->name('donasi.store');
    Route::get('/donation-form', [DonasiController::class, 'index'])->name('donasi');
    Route::get('/donation-form', [HomeController::class, 'donation'])->name('donation');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
    Route::get('/event-donation/{event}', [HomeController::class, 'eventDonation'])->name('event-donation');
    Route::post('/donate-action', [HomeController::class, 'donate'])->name('donate-action');
});

Route::get('/event-donation/{event}/detail', [EventController::class, 'show'])->name('event-detail');
Route::post('/payment-notification-handling', [HomeController::class, 'handleAfterPayment'])->name('paymentHandling');

// Halaman publik
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/donate', [DonationDashboardController::class, 'index'])->name('donate');
Route::get('/event', [EventController::class, 'index'])->name('event');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

// Admin Feedback
Route::middleware('auth')->group(function () {
    Route::get('/admin/feedback', [FeedbackController::class, 'index'])->name('admin.feedback.index');
});

Route::post('/donasi-uang', [DonationDashboardController::class, 'storeMoney'])->name('donasi.storeMoney');
Route::get('/donasi-uang', [DonationDashboardController::class, 'viewUang'])->name('dashboard.donation.uang.index');