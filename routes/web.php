<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\WelcomeController;
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

Route::get('/', 'WelcomeController');

Auth::routes(['register' => false]);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    /* ---------- Start of Leads ---------- */
    Route::get('/leads', [LeadController::class, 'index']);
    Route::get('/leads/add', [LeadController::class, 'create']);
    Route::post('/leads/add', [LeadController::class, 'store']);
    Route::get('/leads/{lead}', [LeadController::class, 'show'])->name('lead.show');
    Route::put('/leads/{lead}', [LeadController::class, 'update']);
    /* ---------- End of Leads ---------- */

    /* ---------- Start of Reminders ---------- */
    Route::get('/leads/{lead}/reminders/add', [ReminderController::class, 'create']);
    Route::post('/leads/{lead}/reminders/add', [ReminderController::class, 'store']);
    Route::get('/leads/{lead}/reminders/{reminder}', [ReminderController::class, 'show'])->name('reminder.show');
    Route::put('/leads/{lead}/reminders/{reminder}', [ReminderController::class, 'update']);
    Route::get('/leads/{lead}/reminders/{reminder}/notes', [ReminderController::class, 'showNote'])->name('reminder.note');
    Route::post('/leads/{lead}/reminders/{reminder}/notes', [ReminderController::class, 'storeNote'])->name('reminder.note');
    /* ---------- End of Reminders ---------- */
});
