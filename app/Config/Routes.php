<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Landing Page
$routes->get('/', 'Home::index');
$routes->post('/getAllAjax', 'LahanController::getAllLahanAjax');
$routes->get('/home', 'Home::specificIndex');

// Login Page
// $routes->get('/login', 'Auth::login');
// $routes->post('auth/login_process', 'Auth::login_process');
$routes->get('/logout', 'Auth::logout');

$routes->group('komoditas', ['filter' => 'session'], static function ($routes) {

    // Komoditas module
    $routes->get('/', 'KomoditasController::index');
    $routes->get('tambah', 'KomoditasController::tambah');
    $routes->post('simpan', 'KomoditasController::simpan');
    $routes->get('edit/(:segment)', 'KomoditasController::edit/$1');
    $routes->post('update/(:segment)', 'KomoditasController::update/$1');
    $routes->delete('hapus/(:segment)', 'KomoditasController::hapus/$1');
});

// Dashboard Page
$routes->get('/dashboard', 'DashboardController::index');
// $routes->get('/coba', 'DashboardController::coba');

// Petani Module
$routes->get('/petani', 'PetaniController::index');
$routes->get('/petani/tambah', 'PetaniController::tambah');
$routes->get('/petani/tambah/shield', 'PetaniController::tambahShield');
$routes->get('/petani/edit/(:segment)', 'PetaniController::edit/$1');
// $routes->post('/petani/simpan', 'PetaniController::simpan');
$routes->post('/petani/simpan', 'PetaniController::simpanShield');
$routes->post('/petani/update/(:segment)', 'PetaniController::update/$1');
$routes->delete('/petani/hapus/(:segment)', 'PetaniController::delete/$1');
$routes->get('/petani/persetujuan', 'PetaniController::indexUpApproved');
$routes->get('/petani/setujui/(:segment)', 'PetaniController::setujui/$1');
$routes->get('/petani/decline/(:segment)', 'PetaniController::tolak/$1');

// Ketua Kelompok Tani
$routes->get('/ketuaKelompokTani', 'KetuaKelompokTaniController::index');
$routes->get('/ketuaKelompokTani/tambah', 'KetuaKelompokTaniController::tambah');
$routes->post('/ketuaKelompokTani/simpan', 'KetuaKelompokTaniController::simpan');
$routes->get('/ketuaKelompokTani/edit/(:segment)', 'KetuaKelompokTaniController::edit/$1');
$routes->post('/ketuaKelompokTani/update/(:segment)', 'KetuaKelompokTaniController::update/$1');
$routes->delete('/ketuaKelompokTani/hapus/(:segment)', 'KetuaKelompokTaniController::delete/$1');

// Penyuluh
$routes->get('/penyuluh', 'PenyuluhController::index');
$routes->get('/penyuluh/tambah', 'PenyuluhController::tambah');
$routes->post('/penyuluh/simpan', 'PenyuluhController::simpan');
$routes->get('/penyuluh/edit/(:segment)', 'PenyuluhController::edit/$1');
$routes->post('/penyuluh/update/(:segment)', 'PenyuluhController::update/$1');
$routes->delete('/penyuluh/hapus/(:segment)', 'PenyuluhController::delete/$1');

// Lahan Module
$routes->get('/lahan', 'LahanController::index');
$routes->get('/lahan/tambah', 'LahanController::tambah');
$routes->get('/lahan/edit/(:segment)', 'LahanController::edit/$1');
$routes->post('/lahan/simpan', 'LahanController::simpan');
$routes->post('/lahan/update/(:segment)', 'LahanController::update/$1');
$routes->delete('/lahan/hapus/(:segment)', 'LahanController::delete/$1');
$routes->get('/lahan/detail/(:segment)', 'LahanController::detail/$1');
$routes->post('lahan/getAllAjax', 'LahanController::getAllLahanAjax');

// Koordinat Module
$routes->get('/koordinat/getKoordinatLahan', 'KoordinatController::dashboard');
$routes->post('/koordinat/saveAjax', 'KoordinatController::saveAjax');
$routes->get('/koordinat/edit/(:segment)', 'KoordinatController::edit/$1');
$routes->post('/koordinat/update/(:segment)/(:segment)', 'KoordinatController::update/$1/$2');
$routes->delete('/koordinat/hapus/(:segment)', 'KoordinatController::deleteByIdLahan/$1');
$routes->post('/koordinat/getKoordinatLahan', 'KoordinatController::getKoordinatLahanAjax');

// Jenis Kepemilikan Module
$routes->get('/jenisKepemilikan', 'JenisKepemilikanController::index');
$routes->get('/jenisKepemilikan/tambah', 'JenisKepemilikanController::tambah');
$routes->post('/jenisKepemilikan/simpan', 'JenisKepemilikanController::simpan');
$routes->get('/jenisKepemilikan/edit/(:segment)', 'JenisKepemilikanController::edit/$1');
$routes->post('/jenisKepemilikan/update/(:segment)', 'JenisKepemilikanController::update/$1');
$routes->delete('/jenisKepemilikan/hapus/(:segment)', 'JenisKepemilikanController::hapus/$1');

// Kecamatan Module
$routes->get('/kecamatan', 'KecamatanController::index');
$routes->get('/kecamatan/tambah', 'KecamatanController::tambah');
$routes->get('/kecamatan/edit/(:segment)', 'KecamatanController::edit/$1');
$routes->post('/kecamatan/simpan', 'KecamatanController::simpan');
$routes->post('/kecamatan/update/(:segment)', 'KecamatanController::update/$1');
$routes->delete('/kecamatan/hapus/(:segment)', 'KecamatanController::delete/$1');
$routes->get('/kecamatan/detail/(:segment)', 'KecamatanController::detail/$1');
$routes->post('kecamatan/getAllAjax', 'KecamatanController::getAllKecamatanAjax');

// Koordinat Kecamatan Module
$routes->post('/koordinat_kecamatan/saveAjax', 'KoordinatKecamatanController::saveAjax');
$routes->get('/koordinat_kecamatan/edit/(:segment)', 'KoordinatKecamatanController::edit/$1');
$routes->post('/koordinat_kecamatan/update/(:segment)/(:segment)', 'KoordinatKecamatanController::update/$1/$2');
$routes->delete('/koordinat_kecamatan/hapus/(:segment)', 'KoordinatKecamatanController::deleteByIdLahan/$1');
$routes->post('/koordinat_kecamatan/getKoordinatKecamatan', 'KoordinatKecamatanController::getKoordinatKecamatanAjax');

// Kelompok Tani Module
$routes->get('/kelompokTani', 'KelompokTaniController::index');
$routes->get('/kelompokTani/tambah', 'KelompokTaniController::tambah');
$routes->post('/kelompokTani/simpan', 'KelompokTaniController::simpan');
$routes->get('/kelompokTani/edit/(:segment)', 'KelompokTaniController::edit/$1');
$routes->post('/kelompokTani/update/(:segment)', 'KelompokTaniController::update/$1');
$routes->delete('/kelompokTani/hapus/(:segment)', 'KelompokTaniController::delete/$1');
$routes->get('/kelompokTani/detail/(:segment)', 'KelompokTaniController::detail/$1');

// Jenis Komoditas Module
$routes->get('/jenisKomoditas', 'JenisKomoditasController::index');
$routes->get('/jenisKomoditas/tambah', 'JenisKomoditasController::tambah');
$routes->post('/jenisKomoditas/simpan', 'JenisKomoditasController::simpan');
$routes->get('/jenisKomoditas/edit/(:segment)', 'JenisKomoditasController::edit/$1');
$routes->post('/jenisKomoditas/update/(:segment)', 'JenisKomoditasController::update/$1');
$routes->delete('/jenisKomoditas/hapus/(:segment)', 'JenisKomoditasController::hapus/$1');

// Transaksi Tanam Module
$routes->get('/transaksiTanam', 'TransaksiTanamController::index');
$routes->get('/transaksiTanam/tambah', 'TransaksiTanamController::tambah');
$routes->post('/transaksiTanam/simpan', 'TransaksiTanamController::simpan');
$routes->get('/transaksiTanam/edit/(:segment)', 'TransaksiTanamController::edit/$1');
$routes->post('/transaksiTanam/update/(:segment)', 'TransaksiTanamController::update/$1');
$routes->delete('/transaksiTanam/hapus/(:segment)', 'TransaksiTanamController::delete/$1');

// Transaksi Panen Module
$routes->get('/transaksiPanen', 'TransaksiPanenController::index');
$routes->get('/transaksiPanen/tambah', 'TransaksiPanenController::tambah');
$routes->post('/transaksiPanen/simpan', 'TransaksiPanenController::simpan');
$routes->get('/transaksiPanen/edit/(:segment)', 'TransaksiPanenController::edit/$1');
$routes->post('/transaksiPanen/update/(:segment)', 'TransaksiPanenController::update/$1');
$routes->delete('/transaksiPanen/hapus/(:segment)', 'TransaksiPanenController::delete/$1');

// Report Module
$routes->get('/report', 'ReportController::index');
$routes->post('/report/getData', 'ReportController::report');

service('auth')->routes($routes);
