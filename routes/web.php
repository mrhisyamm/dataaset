<?php
use Illuminate\Support\Facades\Storage;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('home', 'HomeController@index');

Route::get('download', function(){

    $filePath = 'petunjuk.pdf';

    if (Storage::exists("public/{$filePath}")) {
        return response()->download(storage_path("app/public/${filePath}"));
    }else{
        abort(404,'File Not Found');
    }
});

Route::get('about',[App\Http\Controllers\AboutController::class,'index'])->name('about.index');
Route::group(['middleware' => ['auth','ceklevel:admin']], function () {

    // Route::get('home', 'HomeController@index');
    
    
    Route::resource('barangs', 'BarangController');

    Route::resource('pembelians', 'PembelianController');

    Route::resource('detailPenghapusan', 'Detail_penghapusanController');

    Route::resource('penghapusan', 'PenghapusanController');

    Route::resource('detailPembelians', 'Detail_pembelianController');

    Route::resource('supliers', 'SuplierController');

    Route::resource('users', 'UserController');

    Route::get('laporan','LaporanController@index');
    Route::get('laporan-tanggal','LaporanController@tanggal');
    Route::get('chart');


    Route::get('laporanp','Laporan_PembelianController@index');
    Route::get('laporan-tanggal1','Laporan_PembelianController@tanggal');
    Route::get('chart');



    Route::get('laporanp','Laporan_PembelianController@index');
    Route::get('laporan-bulanp','LaporanBulanPembelianController@Bulan');
    Route::get('chart');


    Route::get('/nota/{id}', 'PenghapusanController@pdf');

    Route::get('laporan_penyusutan',[App\Http\Controllers\Laporan_PenyusutanController::class,'index'])->name('laporan_penyusutan.index');
    Route::post('laporan_penyusutan/penyusutan/cari',[App\Http\Controllers\Laporan_PenyusutanController::class,'penyusutan_cari'])->name('laporan_penyusutan.penyusutan_cari');
    Route::get('/cetak', [App\Http\Controllers\Laporan_PenyusutanController::class,'cetak'])->name('laporan_penyusutan.cetak');
    });

   


    Route::group(['middleware' => ['auth','ceklevel:admin,user']], function () {

        Route::resource('pembelians', 'PembelianController');

        Route::resource('supliers', 'SuplierController');

    });




// Route::get('/home', 'HomeController@index');

// Auth::routes();

// Route::get('/home', 'HomeController@index');

// Route::resource('barangs', 'BarangController');

// Route::resource('pembelians', 'PembelianController');



Route::resource('lelangs', 'LelangController');

Route::resource('barangLelangs', 'BarangLelangController');

Route::get('/penawarandetail/{id}', 'PenawaranController@indexDetail')->name('penawaran.detail');
Route::get('/penawarancreate/{id}', 'PenawaranController@create2')->name('penawarans.create2');
// Route::get('penawarandetail/$id',[App\Http\Controllers\PenawaranController::class,'indexDetail']);
Route::resource('penawarans', 'PenawaranController');