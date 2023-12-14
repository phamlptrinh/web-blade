<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GiangVienController;
use App\Http\Controllers\ChiNhanhController;
use App\Http\Controllers\CapDoController;
use App\Http\Controllers\HocVienController;
use App\Http\Controllers\LopController;
use App\Http\Controllers\LopHocController;
use App\Models\ChiNhanh;
use App\Models\GiangVien;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


//Giang vien
Route::get('/giangvien', [GiangVienController::class, 'index'])->name('giangvien.index');
Route::get('/themgiangvien', [GiangVienController::class, 'add'])->name('giangvien.add');
Route::get('/suagiangvien/{id}', [GiangVienController::class, 'edit'])->name('giangvien.edit');//lay bien gi thi qua kia goi lai, vd o day la id
Route::post('/them-giangvien', [GiangVienController::class, 'store'])->name('giangvien.store');
Route::post('/sua-giangvien', [GiangVienController::class, 'update'])->name('giangvien.update');
Route::post('/xoa-giangvien/{gv}', [GiangVienController::class, 'delete'])->name('giangvien.delete');

//Chi nhanh
Route::get('/chinhanh', [ChiNhanhController::class, 'index'])->name('chinhanh.index');
Route::get('/themchinhanh', [ChiNhanhController::class, 'add'])->name('chinhanh.add');
Route::get('/suachinhanh/{id}', [ChiNhanhController::class, 'edit'])->name('chinhanh.edit');//lay bien gi thi qua kia goi lai, vd o day la id
Route::post('/them-chinhanh', [ChiNhanhController::class, 'store'])->name('chinhanh.store');
Route::post('/sua-chinhanh', [ChiNhanhController::class, 'update'])->name('chinhanh.update');
Route::get('/xoa-chinhanh/{id}', [ChiNhanhController::class, 'delete'])->name('chinhanh.delete');

//CapDo
Route::get('/capdo', [CapDoController::class, 'index'])->name('capdo.index');
Route::get('/themcapdo', [CapDoController::class, 'add'])->name('capdo.add');
Route::get('/suacapdo/{id}', [CapDoController::class, 'edit'])->name('capdo.edit');//lay bien gi thi qua kia goi lai, vd o day la id
Route::post('/them-capdo', [CapDoController::class, 'store'])->name('capdo.store');
Route::post('/sua-capdo', [CapDoController::class, 'update'])->name('capdo.update');
Route::post('/xoa-capdo/{id}', [CapDoController::class, 'delete'])->name('capdo.delete');


//Lop
Route::prefix('lop')->name('lop.') -> group(function(){
    Route::get('/', [LopController::class, 'index'])->name('index');
    Route::get('/them', [LopController::class, 'add'])->name('add');
    Route::get('/sua/{id}', [LopController::class, 'edit'])->name('edit');//lay bien gi thi qua kia goi lai, vd o day la id
    Route::post('/them-lop', [LopController::class, 'store'])->name('store');
    Route::post('/sua-lop', [LopController::class, 'update'])->name('update');
    Route::post('/xoa-lop/{id}', [LopController::class, 'delete'])->name('delete');
    Route::get('/ds-lop/{id}', [LopController::class, 'danh_sach_lop'])->name('danh_sach_lop');
    Route::get('/them-hoc-vien/{id}', [LopController::class, 'them_hoc_vien'])->name('them_hoc_vien');
    Route::post('/themhocvien', [LopController::class, 'store_hoc_vien'])->name('store_hoc_vien');
    Route::post('/xoahocvien/{lop_id}/{hoc_vien_id}', [LopController::class, 'remove_hoc_vien'])->name('remove_hoc_vien');

});

//Hocvien
Route::prefix('hoc-vien')->name('hoc_vien.') -> group(function(){
    Route::get('/', [HocVienController::class, 'index'])->name('index');
    Route::get('/them', [HocVienController::class, 'add'])->name('add');
    Route::get('/sua/{id}', [HocVienController::class, 'edit'])->name('edit');//lay bien gi thi qua kia goi lai, vd o day la id
    Route::post('/them-hoc-vien', [HocVienController::class, 'store'])->name('store');
    Route::post('/sua-hoc-vien', [HocVienController::class, 'update'])->name('update');
    Route::post('/xoa-hoc-vien/{id}', [HocVienController::class, 'delete'])->name('delete');
    Route::get('/ds-lop/{id}', [HocVienController::class, 'danh_sach_lop'])->name('danh_sach_lop');
    Route::get('/them-lop/{id}', [HocVienController::class, 'them_lop'])->name('them_lop');
    Route::post('/themlop', [HocVienController::class, 'store_lop'])->name('store_lop');
    Route::post('/xoalop/{hoc_vien_id}/{lop_id}', [HocVienController::class, 'remove_lop'])->name('remove_lop');
    
    Route::post('/them-hv', [HocVienController::class, 'storeHV'])->name('storeHV');
    Route::get('/sua-hv', [HocVienController::class, 'editHV'])->name('editHV');
    Route::post('/sua-hv', [HocVienController::class, 'updateHV'])->name('updateHV');
    Route::post('/xoa-hv', [HocVienController::class, 'deleteHV'])->name('deleteHV');
    Route::get('/2', [HocVienController::class, 'index2'])->name('index2');
    Route::get('/get-list-hv', [HocVienController::class, 'getListHv'])->name('getListHv');
});
