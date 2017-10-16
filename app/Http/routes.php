<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
TYPE LESS, DO MORE  ^_^ 
HOW HIGH you go STAY LOW.
Love beutiful code, we to do.
Code is Poetry.
'Simplicity is the ultimate sophistication. - Leonardo da Vinci',
'Simplicity is the essence of happiness. - Cedric Bledsoe',
'Simplicity is an acquired taste. - Katharine Gerould',
*/

//route ke home
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('welcome');
});
//route ke about
Route::get('/tentang', function () {
    return view('about');
});

//route autentikasi
//Route::auth();
$this->get('login', 'Auth\AuthController@showLoginForm');
$this->post('login', 'Auth\AuthController@login');
$this->get('logout', 'Auth\AuthController@logout');

Route::get('register', function(){
	return redirect('/');
});

$this->get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
$this->post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
$this->post('password/reset', 'Auth\PasswordController@reset');

//Pengguna Master CRUD dengan  RESTful resource Controller
Route::resource('/pengguna', 'HomeController');
Route::get('/pengguna/{pengguna}/delete', 'HomeController@delete');
//Route::method('URL/path', 'NameController'@action)

//Institusi Master CRUD dengan  RESTful resource Controller
Route::resource('/instansi', 'InstitusiController');
Route::get('/instansi/{instansi}/delete', 'InstitusiController@delete');

//Jurusan Master CRUD dengan  RESTful resource Controller
Route::resource('/jurusan', 'JurusanController');
Route::get('/jurusan/{jurusan}/delete', 'JurusanController@delete');

//BagianMagang Master CRUD dengan  RESTful resource Controller
Route::resource('/bagian', 'BagianMagangController');
Route::get('/bagian/{bagian}/delete', 'BagianMagangController@delete');

//Profilku Master CRUD 
Route::get('/profilku', 'PenggunaController@index');
Route::get('/profilku/{profilku}/edit', 'PenggunaController@edit');
Route::patch('/profilku/{profilku}', 'PenggunaController@update');

//print Detail Profil
Route::get('/profil/{profil}/print', 'ProfilController@show2');
//Profil Magang CRUD dengan  RESTful resource Controller
Route::get('/profil/cari', 'ProfilController@cari');
Route::resource('/profil', 'ProfilController');
Route::get('/profil/{profil}/delete', 'ProfilController@delete');
//print List Profil
Route::get('/print', 'ProfilController@index2');

//print Detail Jadwal Magang
Route::get('/jadwalmagang/{jadwalmagang}/print', 'JadwalMagangController@show2');
//JadwalMagang  CRUD dengan  RESTful resource Controller
Route::get('/jadwalmagang/cari', 'JadwalMagangController@cari');
Route::get('/jadwalmagang/search', 'JadwalMagangController@search');
Route::get('/laporan', 'JadwalMagangController@search');
Route::get('/laporan/search', 'JadwalMagangController@searchaction');
Route::resource('/jadwalmagang', 'JadwalMagangController');
Route::get('/jadwalmagang/{jadwalmagang}/delete', 'JadwalMagangController@delete');
//print List Jadwal Magang
Route::get('/print/jadwalmagang', 'JadwalMagangController@index2');

//Grafik Jadwal dan Profil Magang CRUD dengan  RESTful resource Controller
Route::resource('/grafik', 'GrafikController');

//tugas magang per user
Route::get('/tugasku', 'TugaskuController@index');
Route::get('/tugasku/{tugasku}', 'TugaskuController@show');
Route::get('/tugasku/{tugasku}/edit', 'TugaskuController@edit');
Route::patch('/tugasku/{tugasku}', 'TugaskuController@update');

//Tugas Magang CRUD dengan  RESTful resource Controller
Route::get('/tugas/cari', 'TugasMagangController@cari');
Route::resource('/tugas', 'TugasMagangController');
Route::get('/tugas/{tugas}/delete', 'TugasMagangController@delete');

//Nilai magang dengan RESTful resource Controller
Route::resource('/nilai', 'NilaiController');
Route::get('/nilai/{nilai}/delete', 'NilaiController@delete');

//testing filter percarian data per periode jadwalmagang collection Eloquent Model
Route::get('/tes-collection', 'JadwalMagangController@test');
//testing filter percarian data per jurusan collection Eloquent Model
Route::get('/profil/cari/{id_jurusan}', 'ProfilController@jurusanAjax');
//testing Not Found 404

