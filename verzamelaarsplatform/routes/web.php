<?php

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OverviewController;
use App\Http\Controllers\InrichtingController;
use App\Http\Controllers\ProfileController;
use App\Mail\NewUserRegistered;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;


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

Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function() {
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::resource('/roles', RoleController::class);
    Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions');
    Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('roles.permissions.revoke');
    Route::resource('/permissions', PermissionController::class);
    Route::post('/permissions/{permission}/roles', [PermissionController::class, 'assignRole'])->name('permissions.roles');
    Route::delete('/permissions/{permission}/roles/{role}', [PermissionController::class, 'removeRole'])->name('permissions.roles.remove');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::post('/users/{user}/roles', [UserController::class, 'assignRole'])->name('users.roles');
    Route::delete('/users/{user}/roles/{role}', [UserController::class, 'removeRole'])->name('users.roles.remove');
    Route::post('/users/{user}/permissions', [UserController::class, 'givePermission'])->name('users.permissions');
    Route::delete('/users/{user}/permissions/{permission}', [UserController::class, 'revokePermission'])->name('users.permissions.revoke');

    // Route::get('/approve-user/{userId}', [ApprovalController::class, 'approveUser'])->name('approve.user'); // nog ff aan werken
    Route::get('/events', [EventController::class,'index'])->name('events.index');
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/welcome', function () {
    // Check if the user is logged in and should be logged out
    if (auth()->check()) {
        Auth::logout();
        return redirect('/'); // Redirect to the login page or any other page
    }
    return view('welcome');
});

Route::get('/home', function () {
    // Check if the user is logged in and should be logged out
    if (auth()->check()) {
        Auth::logout();
        return redirect('/'); // Redirect to the login page or any other page
    }
    return view('welcome');
});

Route::get('/', function () {
    // Check if the user is logged in and should be logged out
    if (auth()->check()) {
        Auth::logout();
        return redirect('/'); // Redirect to the login page or any other page
    }
    return view('welcome');
});


Route::get('/about', function () {
    // Check if the user is logged in and should be logged out
    if (auth()->check()) {
        Auth::logout();
        return redirect('/about'); // Redirect to the login page or any other page
    }
    return view('about');
});

Route::get('/events', function () {
    // Check if the user is logged in and should be logged out
    if (auth()->check()) {
        Auth::logout();
        return redirect('/events'); // Redirect to the login page or any other page
    }
    return view('events');
});

Route::get('/news', function () {
    // Check if the user is logged in and should be logged out
    if (auth()->check()) {
        Auth::logout();
        return redirect('/news'); // Redirect to the login page or any other page
    }
    return view('news');
});

Route::resource("overviews", OverviewController::class);
Route::resource("inrichtings", InrichtingController::class);
Route::post('/create-sort', [InrichtingController::class, 'createSort']);
Route::post('/create-brand', [InrichtingController::class, 'createBrand']);
Route::post('/create-epoche', [InrichtingController::class, 'createEpoche']);
Route::post('/create-owner', [InrichtingController::class, 'createOwner']);
Route::post('/create-color1', [InrichtingController::class, 'createColor1']);
Route::post('/create-color2', [InrichtingController::class, 'createColor2']);
require __DIR__.'/auth.php';
