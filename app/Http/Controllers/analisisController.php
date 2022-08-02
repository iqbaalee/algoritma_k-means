<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\matkul;
use App\Models\nilai;
use App\Models\mahasiswa;
use App\Models\NilaiMhs;
use Illuminate\Support\Facades\DB;
use Laravel\Ui\Presets\React;
use Illuminate\Support\Facades\Http;

class analisisController extends Controller
{
    public function index(Request $request)
    {

        if (!empty($request->angkatan)) {

            $nilai = DB::table("view_data_nilai")->where('angkatan', $request->angkatan)->get();
        } else {

            $nilai = DB::table("view_data_nilai")->get();
        }

        if (count($nilai) < 1) {
            return redirect()->route('mahasiswa.index')->with('error', 'Silakan input mahasiswa dan matkul terlebih dahulu');
        }
        $old = $request->angkatan;
        $angkatan = DB::select(DB::raw('SELECT DISTINCT(angkatan) FROM matkul'));

        $angkatan_new = [];
        foreach ($angkatan as $value) {
            $angkatan_new[] = $value->angkatan;
        }

        $data_nilai = [];
        foreach ($nilai as $value) {
            $data_nilai[] = [
                'nim' => $value->nim,
                'mahasiswa_id' => $value->id,
                'nama' => $value->nama,
                'data_nilai' => json_decode($value->data_nilai)
            ];
        };



        return view('analisis.index', compact('data_nilai', 'angkatan', 'old'));
    }

    public function analyze(Request $request)
    {

        $nim_c1 = $request->cluster1;
        $nim_c2 = $request->cluster2;
        $nim_c3 = $request->cluster3;

        if (empty($nim_c1) || empty($nim_c2) || empty($nim_c3)) {
            return redirect()->route('analisis.index', ['angkatan' => $request->angkatan])->with('error', 'Anda belum memilih cluster');
        }
        if ($nim_c1 == $nim_c2 || $nim_c1 == $nim_c3 || $nim_c2 == $nim_c3) {
            return redirect()->route('analisis.index', ['angkatan' => $request->angkatan])->with('error', 'Cluster tidak boleh sama');
        }
        $response = Http::get(env('REST_API_URL') . 'analisis', ['nim_c1' => $nim_c1, 'nim_c2' => $nim_c2, 'nim_c3' => $nim_c3, 'angkatan' => $request->angkatan]);
        $data = json_decode($response)->data;
        $angkatan = $request->angkatan;
        // return $data->titik_cluster;
        return view('analisis.analyze', compact('data', 'nim_c1', 'nim_c2', 'nim_c3', 'angkatan'));
    }

    public function result_analysis()
    {
        return view('analisis.result_analysis');
    }

    public function hasil(Request $request)
    {
        $angkatan = DB::select(DB::raw('SELECT DISTINCT(angkatan) FROM hasil'));

        $angkatan_new = [];
        foreach ($angkatan as $value) {
            $angkatan_new[] = $value->angkatan;
        }

        if (!empty($request->filter_cluster) && empty($request->filter_angkatan)) {
            $response = json_decode(Http::get(env('REST_API_URL') . 'analisis/laporan-bidang-skripsi', ['bidang' => $request->filter_cluster]));
        } else if (!empty($request->filter_angkatan) && empty($request->filter_cluster)) {
            $response = json_decode(Http::get(env('REST_API_URL') . 'analisis/laporan-bidang-skripsi', ['angkatan' => $request->filter_angkatan]));
        } else if (!empty($request->filter_cluster) && !empty($request->filter_angkatan)) {
            $response = json_decode(Http::get(env('REST_API_URL') . 'analisis/laporan-bidang-skripsi', ['bidang' => $request->filter_cluster, 'angkatan' => $request->filter_angkatan]));
        } else {
            $response = json_decode(Http::get(env('REST_API_URL') . 'analisis/laporan-bidang-skripsi'));
        }
        if (count($response->data) < 1) {
            return redirect()->route('analisis.index')->with('error', 'Belum ada hasil yang bisa ditampilkan');
        }
        if (empty($response->data)) {
            return redirect()->route('analisis.hasil')->with('error', 'Data tidak ditemukan');
        }
        return view('analisis.hasil', compact('response', 'angkatan_new'));
    }
    public function show()
    {
    }

    public function store(Request $request)
    {
        try {

            $nim_c1 = $request->nim_c1;
            $nim_c2 = $request->nim_c2;
            $nim_c3 = $request->nim_c3;

            $response = json_decode(Http::get(env('REST_API_URL') . 'analisis', ['nim_c1' => $nim_c1, 'nim_c2' => $nim_c2, 'nim_c3' => $nim_c3, 'angkatan' => $request->angkatan]))->data;

            $data_post = [];
            foreach ($response->data as $data) {
                $data_post[] = [
                    'nim' => $data->nim,
                    'nama' => $data->nama,
                    'cluster' => 'C' . $data->cluster,
                    'angkatan' => $data->angkatan,
                ];
            }

            Http::post(env('REST_API_URL') . 'analisis/save-result', $data_post);

            return redirect()->route('analisis.hasil');
        } catch (\Throwable $th) {
            return redirect()->route('analisis.index')->with('error', $th->getMessage());
        }
    }

    public function chart_result()
    {
        $response = Http::get(env('REST_API_URL') . 'analisis/tren-bidang-skripsi');
        foreach ($response['data'] as $value) {
            $data[] = $value;
        }
        $v = json_encode($data);
        return view('analisis.chart_result', compact('v'));
    }

    public function get_chart_data()
    {
        $response = Http::get(env('REST_API_URL') . 'analisis/tren-bidang-skripsi');
        return response()->json($response['data']);
    }

    public function print_result(Request $request)
    {

        if (!empty($request->filter_cluster) && empty($request->filter_angkatan)) {
            $response = json_decode(Http::get(env('REST_API_URL') . 'analisis/laporan-bidang-skripsi', ['bidang' => $request->filter_cluster]));
        } else if (!empty($request->filter_angkatan) && empty($request->filter_cluster)) {
            $response = json_decode(Http::get(env('REST_API_URL') . 'analisis/laporan-bidang-skripsi', ['angkatan' => $request->filter_angkatan]));
        } else if (!empty($request->filter_cluster) && !empty($request->filter_angkatan)) {
            $response = json_decode(Http::get(env('REST_API_URL') . 'analisis/laporan-bidang-skripsi', ['bidang' => $request->filter_cluster, 'angkatan' => $request->filter_angkatan]));
        } else {
            $response = json_decode(Http::get(env('REST_API_URL') . 'analisis/laporan-bidang-skripsi'));
        }

        if (empty($response->data)) {
            return redirect()->route('analisis.hasil')->with('error', 'Data tidak ditemukan');
        }

        return view('analisis.print_result', compact('response'));
    }
}
