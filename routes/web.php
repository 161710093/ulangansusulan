<?php
use App\mahasiswa;
use App\wali;
use App\dosen;
use App\matkul;
use App\jurusan;

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

Route::get('/soal1',function(){

	$dosen = dosen::all();
	$mahasiswa = mahasiswa::all();

	echo '<center>'.'Soal 1 One to Many'.'</center>';

	
    foreach ($dosen as $get1)
    	echo '<li> Nama Dosen : '.' <strong>' . $get1->nama . '</strong></li>';

    foreach ($mahasiswa as $get2)
    	echo '<li> Nama Mahasiswa : '.' <strong>' . $get2->nama . '</strong></li>';
    	
});

Route::get('/soal2', function() {

	$wali = wali::where('nama', '=', 'Achmad S')->first();
	$mahasiswa = mahasiswa::where('nis', '=', '27022002')->first();


	echo '<center>'.'Soal 2 One to One'.'</center>';

	
    	echo '<li> Nama Wali : '.' <strong>' . $mahasiswa->wali->nama . '</strong></li>';
    	echo '<li> Nama Mahasiswa : '.' <strong>' . $wali->mahasiswa->nama . '</strong></li>';
    
});
Route::get('/soal3', function() {

		# Temukan dosen dengan yang bernama Dede
		$dosen = dosen::where('nama', '=', 'Dede Koswara')->first();

		# Tampilkan seluruh data mahasiswa didikannya
		foreach ($dosen->mahasiswa as $temp)
			echo '<li> Nama : ' . $temp->nama . ' <strong>' . $temp->nis . '</strong></li>';
});

Route::get('soal11', function() {
 		$dosen = dosen::with('mahasiswa')->get();
 		return View::make('soal1', compact('dosen'));
});
Route::get('soal2', function() {
 		$wali = wali::with('mahasiswa')->get();
 		return View::make('soal2', compact('wali'));
});
Route::get('soal13', function() {
 		$jurusan = jurusan::with('mahasiswa')->get();
 		return View::make('soal3', compact('jurusan'));
});
Route::get('bonus', function() {
 		$mahasiswa = mahasiswa::with('dosen', 'jurusan' ,'wali')->get();
 		return View::make('bonus', compact('mahasiswa'));
});

Route::get('soal13', function() {

		# Temukan dosen dengan yang bernama Yulianto
		$dosen = dosen::where('nama', '=', 'Dede Koswara')->first();

		# Tampilkan seluruh data mahasiswa didikannya
		foreach ($dosen->mahasiswa as $temp)
			echo '<li> Nama : ' . $temp->nama . ' <strong>' . $temp->nis. '</strong></li>';
	});

Route::get('table', 'LatihanController@tabel');


