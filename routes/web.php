<?php

use Illuminate\Support\Facades\Route;
use App\Models\Letter;

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

Route::get('/', function() {
    return view('index');
});

Route::get('/pdf/{letter}', function(Letter $letter) {
	$bulan = array (
	1 => 'Januari',
	'Februari',
	'Maret',
	'April',
	'Mei',
	'Juni',
	'Juli',
	'Agustus',
	'September',
	'Oktober',
	'November',
	'Desember'
);

$split = explode('-', $letter->tanggal_surat);
$letter->tanggal_surat = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

	$pdf = PDF::loadView('printPDF', compact('letter'));

	return $pdf->stream('Surat Izin - '. $letter->nama_pengirim. '.pdf');
});