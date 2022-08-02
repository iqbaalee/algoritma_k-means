<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class mhscekController extends Controller
{
    public function index(Request $request)
    {
        if (!empty($request->nim)) {
            $response = Http::get(env('REST_API_URL') . 'analisis/bidang-skripsi', ['mahasiswa' => $request->nim]);
            if ($response['data'] == null) {
                return redirect()->route('mhscek')->with('error', 'NIM tidak ditemukan');
            } else {
                $data = $response['data'];
                // return $data;
                return redirect()->route('mhscek')->with(['success' => 'NIM ditemukan', 'data' => $data, 'nim' => $request->nim]);
            }
        } else {
            return view('cek-mhs');
        }
    }

    // public function cari(Request $request)
    // {
    // 	// menangkap data pencarian
    // 	$cari = $request->cari;

    // 	// mengambil data dari table mahasiswa sesuai pencarian data
    // 	$mahasiswa = DB::table('mahasiswa')
    // 	->where('nim','like',"%".$cari."%");

    // 	// mengirim data mahasiswa ke view index
    // 	return view('index',['hasil-mhs' => $mahasiswa]);

    // }

    public function show(Request $request)
    {
    }
}
