<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
});

route::get('/', [AdminController::class, 'home']);

route::get('/home', [AdminController::class, 'index'])->middleware(['auth', 'admin']);

route::get('/create_room', [AdminController::class, 'create_room'])->middleware(['auth', 'admin'])->middleware(['auth', 'admin']);

route::post('/add_room', [AdminController::class, 'add_room'])->middleware(['auth', 'admin']);

route::get('/view_room', [AdminController::class, 'view_room']);

route::get('/delete_room/{id}', [AdminController::class, 'delete_room'])->middleware(['auth', 'admin']);

route::get('/update_room/{id}', [AdminController::class, 'update_room'])->middleware(['auth', 'admin']);

route::post('/edit_room/{id}', [AdminController::class, 'edit_room'])->middleware(['auth', 'admin']);

route::get('/room_details/{id}', [HomeController::class, 'room_details']);

route::post('/add_booking/{id}', [HomeController::class, 'add_booking']);

route::get('bookings', [AdminController::class, 'bookings'])->middleware(['auth', 'admin']);

route::get('delete_booking/{id}', [AdminController::class, 'delete_booking'])->middleware(['auth', 'admin']);

route::get('approve_book/{id}', [AdminController::class, 'approve_book'])->middleware(['auth', 'admin']);

route::get('decline_book/{id}', [AdminController::class, 'decline_book'])->middleware(['auth', 'admin']);

route::get('view_gallery', [AdminController::class, 'view_gallery'])->middleware(['auth', 'admin']);

route::post('upload_gallery', [AdminController::class, 'upload_gallery'])->middleware(['auth', 'admin']);

route::get('delete_gallery/{id}', [AdminController::class, 'delete_gallery']);

route::post('contact', [HomeController::class, 'contact']);

route::get('all_messages', [AdminController::class, 'all_messages'])->middleware(['auth', 'admin']);

route::get('send_mail/{id}', [AdminController::class, 'send_mail'])->middleware(['auth', 'admin']);

route::post('mail/{id}', [AdminController::class, 'mail'])->middleware(['auth', 'admin']);

