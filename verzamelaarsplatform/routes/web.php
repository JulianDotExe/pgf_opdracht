<?php

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\OverviewAdminController;
use App\Http\Controllers\Admin\InrichtingAdminController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OverviewController;
use App\Http\Controllers\InrichtingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsController;
use App\livewire\EventCalendar;
use App\Mail\NewUserRegistered;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Livewire\Livewire;


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
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{event}', [EventController::class,'update'])->name('events.update');
    
    Route::get('/news', [NewsController::class,'index'])->name('news.index');
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news', [NewsController::class, 'store'])->name('news.store');
    Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');
    Route::delete('/news/{news}', [NewsController::class, 'destroy'])->name('news.destroy');
    Route::get('/news/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('/news/{news}', [NewsController::class,'update'])->name('news.update');

    Route::resource("/overviews", OverviewAdminController::class);
    Route::resource("/inrichtings", InrichtingAdminController::class);

    Route::post('/create-color', [InrichtingAdminController::class, 'createColor'])->name('inrichtings.createColor');
    Route::post('/create-epoche', [InrichtingAdminController::class, 'createEpoche'])->name('inrichtings.createEpoche');
    Route::post('/create-owner', [InrichtingAdminController::class, 'createOwner'])->name('inrichtings.createOwner');
    Route::post('/create-brand', [InrichtingAdminController::class, 'createBrand'])->name('inrichtings.createBrand');
    Route::post('/create-sort', [InrichtingAdminController::class, 'createSort'])->name('inrichtings.createSort');
    Route::post('/create-categorie', [InrichtingAdminController::class, 'createCategorie'])->name('inrichtings.createCategorie');

    Route::delete('/sort/{sort}', [InrichtingAdminController::class, 'destroySort'])->name('inrichtings.destroySort');
    Route::delete('/brand/{brand}', [InrichtingAdminController::class, 'destroyBrand'])->name('inrichtings.destroyBrand');
    Route::delete('/epoche/{epoche}', [InrichtingAdminController::class, 'destroyEpoche'])->name('inrichtings.destroyEpoche');
    Route::delete('/owner/{owner}', [InrichtingAdminController::class, 'destroyOwner'])->name('inrichtings.destroyOwner');
    Route::delete('/color/{color}', [InrichtingAdminController::class, 'destroyColor'])->name('inrichtings.destroyColor');
    Route::delete('/category/{category}', [InrichtingAdminController::class, 'destroyCategory'])->name('inrichtings.destroyCategory');

});

Route::middleware(['auth', 'role:user'])->name('users.')->prefix('user')->group(function () {
    Route::resource("/overviews", OverviewController::class);
    Route::resource("/inrichtings", InrichtingController::class);

    Route::post('/create-color', [InrichtingController::class, 'createColor'])->name('inrichtings.createColor');
    Route::post('/create-epoche', [InrichtingController::class, 'createEpoche'])->name('inrichtings.createEpoche');
    Route::post('/create-owner', [InrichtingController::class, 'createOwner'])->name('inrichtings.createOwner');
    Route::post('/create-brand', [InrichtingController::class, 'createBrand'])->name('inrichtings.createBrand');
    Route::post('/create-sort', [InrichtingController::class, 'createSort'])->name('inrichtings.createSort');

    Route::delete('/sort/{sort}', [InrichtingController::class, 'destroySort'])->name('inrichtings.destroySort');
    Route::delete('/brand/{brand}', [InrichtingController::class, 'destroyBrand'])->name('inrichtings.destroyBrand');
    Route::delete('/epoche/{epoche}', [InrichtingController::class, 'destroyEpoche'])->name('inrichtings.destroyEpoche');
    Route::delete('/owner/{owner}', [InrichtingController::class, 'destroyOwner'])->name('inrichtings.destroyOwner');
    Route::delete('/color/{color}', [InrichtingController::class, 'destroyColor'])->name('inrichtings.destroyColor');
}); 

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

    // Calendar
    Route::get('/event-calendar', EventCalendar::class);


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

    $events = \App\Models\Event::paginate(2);
    return view('events', ['events' => $events]);
});

Route::get('/news', function () {
    // Check if the user is logged in and should be logged out
    if (auth()->check()) {
        Auth::logout();
        return redirect('/news'); // Redirect to the login page or any other page
    }

    $news = \App\Models\News::paginate(2);
    return view('news', ['news' => $news]);
});



require __DIR__.'/auth.php';
