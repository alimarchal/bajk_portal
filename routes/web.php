<?php

use App\Http\Controllers\HrdController;
use App\Http\Controllers\ManualController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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

Route::get('/', function () { return to_route('login'); });
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        $startDate = now()->subMonths(6);
        $total_circular = DB::table('circulars')
            ->select(DB::raw("DATE_FORMAT(created_at, '%b') AS month"), DB::raw("COUNT(*) AS total_count"))
            ->where('created_at', '>=', $startDate)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->get();

        $total_group_by_division = DB::table('circulars')
            ->select('divisions.short_name', DB::raw("COUNT(*) as total"))
            ->join('divisions','circulars.division_id','=','divisions.id')
            ->groupBy('division_id')
            ->get();

        return view('dashboard', compact('total_circular','total_group_by_division'));

    })->name('dashboard');
    Route::get('/president-message', function () { return view('message'); })->name('president.message');
    Route::resource('circular', \App\Http\Controllers\CircularController::class);
    Route::get('circular/division/{division}', [\App\Http\Controllers\CircularController::class, 'divisionId'])->name('circular.division');
    Route::resource('division', \App\Http\Controllers\DivisionController::class);
    Route::resource('manual', ManualController::class);
    Route::get('manual/category/{categoryId}', [\App\Http\Controllers\ManualController::class, 'categoryId'])->name('manual.categoryId');
    Route::resource('hrd', HrdController::class);
    Route::get('hrd/category/{categoryId}', [\App\Http\Controllers\HrdController::class, 'categoryId'])->name('hrd.categoryId');
    Route::resource('download', \App\Http\Controllers\DownloadController::class);
    Route::get('download/category/{categoryId}', [\App\Http\Controllers\DownloadController::class, 'categoryId'])->name('download.categoryId');

    Route::resource('noticeBoard', \App\Http\Controllers\NoticeBoardController::class);
    Route::resource('event', \App\Http\Controllers\EventController::class);
    Route::post('event/media', [\App\Http\Controllers\EventController::class, 'storeMedia'])->name('event.storeMedia');
    Route::delete('event/{media}/{event}', [\App\Http\Controllers\EventController::class, 'destroy'])->name('event.destroy');

    Route::resource('roles',\App\Http\Controllers\RoleController::class);
    Route::resource('permissions',\App\Http\Controllers\PermissionController::class);
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
});
