<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Guru\TugasController;
use App\Http\Controllers\Siswa\PengumpulanController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\Siswa\SiswaDashboardController;
use App\Http\Controllers\Guru\GuruDashboardController;
use App\Http\Controllers\Guru\GuruNilaiController;
use App\Http\Controllers\Guru\GuruRekapController;

// ========================
// Root redirect sesuai role
// ========================
Route::get('/', function () {
    if (auth()->check()) {
        $role = auth()->user()->role;
        if ($role === 'admin') return redirect('/admin/dashboard');
        if ($role === 'guru') return redirect('/guru/dashboard');
        return redirect('/siswa/dashboard');
    }
    return redirect('/login');
});

// ========================
// Auth
// ========================
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'loginView')->name('login.view');
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout');

    Route::get('/register', 'registerView')->name('register.view');
    Route::post('/register', 'register')->name('register');
});

// ========================
// Admin
// ========================
Route::middleware(['auth', RoleMiddleware::class.':admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/rekap', [AdminController::class, 'rekap'])->name('admin.rekap');
    Route::get('/admin/export-excel', [AdminController::class, 'exportExcel'])->name('admin.export');
   

      // Kelola akun admin
    Route::get('/admin/kelola-akun', [AdminController::class, 'kelolaAkun'])->name('admin.kelola-akun');
    Route::get('/admin/kelola-akun/{id}/edit', [AdminController::class, 'editAkun'])->name('admin.edit_akun');
    Route::put('/admin/kelola-akun/{id}', [AdminController::class, 'updateAkun'])->name('admin.update_akun');
    Route::delete('/admin/kelola-akun/{id}', [AdminController::class, 'deleteAkun'])->name('admin.delete_akun');
});

// ========================
// Guru
// ========================
Route::middleware(['auth', RoleMiddleware::class.':guru'])->group(function () {

    // Dashboard
    Route::get('/guru/dashboard', [GuruDashboardController::class, 'index'])
        ->name('guru.dashboard');

    // Kelola Tugas (CRUD) - otomatis semua route CRUD
    Route::resource('/guru/tugas', TugasController::class)
    ->parameters(['tugas' => 'tugas'])
    ->names([
        'index'   => 'tugas.index',
        'create'  => 'tugas.create',
        'store'   => 'tugas.store',
        'show'    => 'tugas.show',
        'edit'    => 'tugas.edit',
        'update'  => 'tugas.update',
        'destroy' => 'tugas.destroy',
    ]);


    // Nilai Tugas
    Route::get('/guru/nilai', [GuruNilaiController::class, 'index'])
        ->name('guru.nilai.index');
    Route::post('/guru/nilai', [GuruNilaiController::class, 'store'])
        ->name('guru.nilai.store');

    // Rekap Nilai
    Route::get('/guru/rekap', [GuruRekapController::class, 'index'])
        ->name('guru.rekap.index');
    Route::get('/guru/rekap/export', [GuruRekapController::class, 'exportExcel'])
        ->name('guru.rekap.export');
});

// ========================
// Siswa
// ========================
Route::middleware(['auth', RoleMiddleware::class.':siswa'])->group(function () {

     // Dashboard siswa
    Route::get('/siswa/dashboard', [SiswaDashboardController::class, 'index'])
        ->name('siswa.dashboard');

    // Form pengumpulan tugas
    Route::get('/siswa/pengumpulan/{tugas}/create', [SiswaDashboardController::class, 'create'])
        ->name('siswa.pengumpulan.create');

    // Simpan pengumpulan tugas
    Route::post('/siswa/pengumpulan/{tugas}', [SiswaDashboardController::class, 'store'])
        ->name('siswa.pengumpulan.store');

    // List pengumpulan
    Route::get('/siswa/pengumpulan', [SiswaDashboardController::class, 'indexPengumpulan'])
        ->name('siswa.pengumpulan.index');

    // Edit, update, delete
    Route::get('/siswa/pengumpulan/{pengumpulan}/edit', [SiswaDashboardController::class, 'edit'])
        ->name('siswa.pengumpulan.edit');
    Route::put('/siswa/pengumpulan/{pengumpulan}', [SiswaDashboardController::class, 'update'])
        ->name('siswa.pengumpulan.update');
    Route::delete('/siswa/pengumpulan/{pengumpulan}', [SiswaDashboardController::class, 'destroy'])
        ->name('siswa.pengumpulan.destroy');
});