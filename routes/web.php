<?php

use App\Models\Paket;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminAkunController;
use App\Http\Controllers\AturPaketController;
use App\Http\Controllers\AdminVideoController;
use App\Http\Controllers\FreeTryoutController;
use App\Http\Controllers\AdminMateriController;
use App\Http\Controllers\AdminTryoutController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\DiscountFromBuyingController;

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
   /*  $mandiri = Paket::where('kategori', 'mandiri')->get(); */
    $bimbel = Paket::all();
    return view('welcome', compact(/* 'mandiri', */ 'bimbel'));
});

Route::get('change-theme/{theme}', [HomeController::class, 'changeTheme']);

Route::get('beli-paket/{id}', [OrderController::class, 'beliLanding']);

Route::middleware('auth')->get('/admin', [HomeController::class, 'admin']);

Route::middleware(['auth', 'checkrole:admin'])->group(function () {
    //Atur Paket
    Route::get('admin-atur/kategori/{kategori}', [AturPaketController::class, 'indexKategori']);
    Route::get('admin-atur/buat/{kategori}', [AturPaketController::class, 'createKategori']);
    Route::get('admin-atur/atur/{id}', [AturPaketController::class, 'atur']);
    Route::resource('admin-atur', AturPaketController::class);

    //Admin Tryout
    Route::post('edit-pembahasan/{id}', [AdminTryoutController::class, 'storePembahasan']);
    Route::post('edit-pembahasan-sesi/{id}', [AdminTryoutController::class, 'storePembahasanSesi']);
    Route::get('edit-pembahasan/{id}', [AdminTryoutController::class, 'editPembahasan']);
    Route::get('edit-pembahasan-sesi/{id}', [AdminTryoutController::class, 'editPembahasanSesi']);
    Route::post('remove-pg/{id}', [AdminTryoutController::class, 'removePG']);
    Route::post('admin-tryout/store-soal', [AdminTryoutController::class, 'storeSoal']);
    Route::post('admin-tryout/store-soal-sesi', [AdminTryoutController::class, 'storeSoalSesi']);
    Route::post('admin-tryout/store-sesi/{id}', [AdminTryoutController::class, 'storeSesi']);
    Route::get('admin-tryout/tambah-soal/{id}', [AdminTryoutController::class, 'tambahSoal']);
    Route::get('admin-tryout/tambah-soal-sesi/{id}', [AdminTryoutController::class, 'tambahSoalSesi']);
    Route::put('admin-tryout/update-soal/{id}', [AdminTryoutController::class, 'updateSoal']);
    Route::put('admin-tryout/update-soal-sesi/{id}', [AdminTryoutController::class, 'updateSoalSesi']);
    Route::put('admin-tryout/update-sesi/{id}', [AdminTryoutController::class, 'updateSesi']);
    Route::delete('admin-tryout/hapus-soal/{id}', [AdminTryoutController::class, 'hapusSoal']);
    Route::delete('admin-tryout/hapus-soal-sesi/{id}', [AdminTryoutController::class, 'hapusSoalSesi']);
    Route::get('admin-tryout/list-hasil/{id}', [AdminTryoutController::class, 'listHasil']);
    Route::get('admin-tryout/edit-soal/{id}', [AdminTryoutController::class, 'editSoal']);
    Route::get('admin-tryout/edit-soal-sesi/{id}', [AdminTryoutController::class, 'editSoalSesi']);
    Route::get('admin-tryout/creates/{id}', [AdminTryoutController::class, 'creates']);
    Route::get('admin-tryout/mini-creates/{id}', [AdminTryoutController::class, 'miniCreates']);
    Route::get('admin-free-tryout/creates-free/', [FreeTryoutController::class, 'freeCreates']);

    //Admin Free Tryout
    Route::post('free-edit-pembahasan/{id}', [FreeTryoutController::class, 'storePembahasan']);
    Route::get('admin-free-tryout-edit-pembahasan/{id}', [FreeTryoutController::class, 'editPembahasan']);
    Route::post('remove-pg/{id}', [AdminTryoutController::class, 'removePG']);
    Route::post('admin-free-tryout/store-soal', [FreeTryoutController::class, 'storeSoal']);
    Route::get('admin-free-tryout/tambah-soal/{id}', [FreeTryoutController::class, 'tambahSoal']);
    Route::put('admin-free-tryout/update-soal/{id}', [FreeTryoutController::class, 'updateSoal']);
    Route::delete('admin-free-tryout/hapus-soal/{id}', [FreeTryoutController::class, 'hapusSoal']);
    Route::get('admin-tryout/list-hasil/{id}', [AdminTryoutController::class, 'listHasil']);
    Route::get('admin-free-tryout/edit-soal/{id}', [FreeTryoutController::class, 'editSoal']);
    Route::get('admin-tryout/creates/{id}', [AdminTryoutController::class, 'creates']);
    Route::get('admin-tryout/mini-creates/{id}', [AdminTryoutController::class, 'miniCreates']);
    Route::get('admin-free-tryout/creates-free/', [FreeTryoutController::class, 'freeCreates']);

    //Admin Materi
    Route::post('remove-file', [AdminMateriController::class, 'removeFile']);
    Route::get('admin-materi/{id}', [AdminMateriController::class, 'show'])->middleware('checkmateri');
    Route::get('admin-materi/creates/{id}', [AdminMateriController::class, 'creates']);

    //Admin Video
    Route::get('admin-video/{id}', [AdminVideoController::class, 'show'])->middleware('checkvideo');
    Route::get('admin-video/creates/{id}', [AdminVideoController::class, 'creates']);

    Route::resource('admin-diskon', DiscountController::class);
    Route::delete('admin-diskon-semua-user/{id}', [DiscountController::class, 'destroyDiscountAllUser']);
    Route::resource('admin-diskon-setelah-pembelian', DiscountFromBuyingController::class);
});

Route::middleware(['auth'])->group(function () {
    //Paket Saya
    Route::get('admin-mypaket/{id}', [OrderController::class, 'showPaket'])->middleware('checkpaket');
    Route::get('admin-mypaket/kategori/{kategori}', [OrderController::class, 'chooseKategori']);
    Route::get('admin-mypaket', [OrderController::class, 'myPaket']);
    
    //Beli Paket
    Route::get('payment/{id}', [OrderController::class, 'payment']);
    Route::get('admin-beli', [OrderController::class, 'history']);
    Route::resource('admin-paket', OrderController::class);
 
    
    //Admin Materi
    Route::post('admin-materi', [AdminMateriController::class, 'store'])->middleware('checkrole:admin')->name('admin-materi.store');
    Route::get('admin-materi/{id}/edit', [AdminMateriController::class, 'edit'])->middleware('checkrole:admin')->name('admin-materi.edit');
    Route::put('admin-materi/{id}', [AdminMateriController::class, 'update'])->middleware('checkrole:admin')->name('admin-materi.update');
    Route::delete('admin-materi/{id}', [AdminMateriController::class, 'destroy'])->middleware('checkrole')->name('admin-materi.destroy');
    Route::get('admin-basic-materi/{id}', [AdminMateriController::class, 'show'])->middleware('checkmateri')->name('admin-materi.show');
    Route::resource('admin-materi', AdminMateriController::class)->except(['store', 'edit', 'update', 'destroy', 'show']);
    
    //Admin Free Tryout
    Route::get('admin-free-tryout', [AdminTryoutController::class, 'indexFree']);
    
    //Admin Tryout
    Route::get('pembahasan/{id}', [AdminTryoutController::class, 'pembahasan']);
    Route::post('upload-jawaban/', [AdminTryoutController::class, 'uploadJawaban']);
    Route::post('upload-jawaban-sesi/', [AdminTryoutController::class, 'uploadJawabanSesi']);
    Route::post('stop-session/{id}', [AdminTryoutController::class, 'stopSession']);
    Route::post('stop-session-sesi/{id}', [AdminTryoutController::class, 'stopSessionSesi']);
    Route::post('upload-image', [AdminTryoutController::class, 'uploadImage']);
    Route::get('admin-tryouts/{id}/{token}', [AdminTryoutController::class, 'mulai']);
    Route::get('admin-basic-tryout/list-hasil/{id}', [AdminTryoutController::class, 'listHasil']);
    Route::get('admin-tryout/hasil-test/{id}', [AdminTryoutController::class, 'hasilTest']);
    Route::get('admin-tryout/hasil-test-admin/{id}', [AdminTryoutController::class, 'hasilTestAdmin']);
    Route::get('admin-tryout/hasil-test-sesi/{id}', [AdminTryoutController::class, 'hasilTestSesi']);
    Route::post('admin-tryout', [AdminTryoutController::class, 'store'])->middleware('checkrole:admin')->name('admin-tryout.store');
    Route::get('admin-tryout/{id}/edit', [AdminTryoutController::class, 'edit'])->middleware('checkrole:admin')->name('admin-tryout.edit');
    Route::put('admin-tryout/{id}', [AdminTryoutController::class, 'update'])->middleware('checkrole:admin')->name('admin-tryout.update');
    Route::get('admin-tryout/{id}', [AdminTryoutController::class, 'show'])->middleware('checktryout')->name('admin-tryout.show');
    Route::resource('admin-tryout', AdminTryoutController::class)->except(['store', 'edit', 'update', 'show']);

    //Admin Tryout Gratis
    Route::get('admin-free-tryout-pembahasan/{id}', [FreeTryoutController::class, 'pembahasan']);
    Route::post('upload-jawaban/', [AdminTryoutController::class, 'uploadJawaban']);
    Route::post('stop-session/{id}', [AdminTryoutController::class, 'stopSession']);
    Route::post('upload-image', [AdminTryoutController::class, 'uploadImage']);
    Route::get('admin-tryouts/{id}/{token}', [AdminTryoutController::class, 'mulai']);
    Route::get('admin-free-tryout/list-hasil/{id}', [FreeTryoutController::class, 'listHasil']);
    Route::get('admin-free-tryout/hasil-test/{id}', [FreeTryoutController::class, 'hasilTest']);
    Route::post('admin-tryout', [AdminTryoutController::class, 'store'])->middleware('checkrole:admin')->name('admin-tryout.store');
    Route::get('admin-free-tryout/{id}/edit', [FreeTryoutController::class, 'edit'])->middleware('checkrole:admin')->name('admin-free-tryout.edit');
    Route::get('admin-tryout/{id}', [AdminTryoutController::class, 'show'])->middleware('checktryout')->name('admin-tryout.show');
    Route::resource('admin-tryout', AdminTryoutController::class)->except(['store', 'edit', 'update', 'show']);
    
    //Admin Video
    Route::post('admin-video', [AdminVideoController::class, 'store'])->middleware('checkrole:admin')->name('admin-video.store');
    Route::get('admin-video/{id}/edit', [AdminVideoController::class, 'edit'])->middleware('checkrole:admin')->name('admin-video.edit');
    Route::put('admin-video/{id}', [AdminVideoController::class, 'update'])->middleware('checkrole:admin')->name('admin-video.update');
    Route::delete('admin-video/{id}', [AdminVideoController::class, 'destroy'])->middleware('checkrole')->name('admin-video.destroy');
    Route::get('admin-basic-video/{id}', [AdminVideoController::class, 'show'])->middleware('checkvideo')->name('admin-video.show');
    Route::resource('admin-video', AdminVideoController::class)->except(['store', 'edit', 'update', 'destroy', 'show']);
    
    //Admin Akun
    Route::put('ganti-password/{id}', [AdminAkunController::class, 'gantiPassword']);
    Route::resource('admin-akun', AdminAkunController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'admin'])->name('home');

use Carbon\Carbon;

Route::get('/remaining-time', function (Illuminate\Http\Request $request) {
    // Get start time and max duration from the request parameters
    $startTime = Carbon::parse($request->query('start_time'))->getTimestampMs();
    $maxDuration = $request->query('max_duration') * 60 * 1000; // Convert minutes to milliseconds
    
    // Get current time in milliseconds
    $currentTime = Carbon::now('Asia/Jakarta')->getTimestampMs();
    
    // Calculate remaining time in milliseconds
    $remainingTime = $maxDuration - ($currentTime - $startTime);
    
    return response()->json(['remaining_time' => $remainingTime])
        ->header('Cache-Control', 'no-cache, no-store, must-revalidate')
        ->header('Pragma', 'no-cache')
        ->header('Expires', '0');
});


