<?php

namespace App\Http\Controllers;

use App\Models\nilai;
use App\Models\mahasiswa;
use App\Models\matkul;
use App\Models\NilaiMhs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Laravel\Ui\Presets\React;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        if (!empty($request->angkatan)) {


            $nilai = DB::table("view_data_nilai")->where('angkatan', $request->angkatan)->get();
        } else {

            $nilai = DB::table("view_data_nilai")->get();
        }

        if (count($nilai) < 1 && empty($request->angkatan)) {
            return redirect()->route('mahasiswa.index')->with('error', 'Silakan input mahasiswa terlebih dahulu');
        } else if (count($nilai) < 1 && !empty($request->angkatan)) {
            return redirect()->route('nilai.index')->with('error', 'Data sudah dianalisis, silakan input data baru');
        }

        $angkatan = DB::select(DB::raw('SELECT distinct(angkatan) FROM matkul'));

        $old = $request->angkatan;
        $data_nilai = [];
        foreach ($nilai as $value) {
            $data_nilai[] = [
                'nim' => $value->nim,
                'angkatan' => $value->angkatan,
                'mahasiswa_id' => $value->id,
                'nama' => $value->nama,
                'data_nilai' => json_decode($value->data_nilai)
            ];
        };

        return view('nilai.index', compact(
            'data_nilai',
            'angkatan',
            'old'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nilai_mhs_id = NilaiMhs::pluck('mahasiswa_id')->all();
        $mahasiswa = mahasiswa::whereNotIn('id', $nilai_mhs_id)->get();
        return $mahasiswa;
        $matkul = matkul::all();
        return view('nilai.create', compact(
            'mahasiswa',
            'matkul'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(
            [

                'mahasiswa_id' => 'required',
                'na_matkul1' => 'required',
                'na_matkul2' => 'required',
                'na_matkul3' => 'required',
                'na_matkul4' => 'required',
                'na_matkul5' => 'required',
                'na_matkul6' => 'required',
                'na_matkul7' => 'required',
                'na_matkul8' => 'required',
                'na_matkul9' => 'required',
                'na_matkul10' => 'required',
                'na_matkul11' => 'required',
                'na_matkul12' => 'required',
                'na_matkul13' => 'required',
                'na_matkul14' => 'required',
                'na_matkul15' => 'required',
                'na_matkul16' => 'required',
                'na_matkul17' => 'required',
                'na_matkul18' => 'required',
                'na_matkul19' => 'required',
                'na_matkul20' => 'required',
                'na_matkul21' => 'required',
                'na_matkul22' => 'required',
                'na_matkul23' => 'required',
                'na_matkul24' => 'required'
            ],
            [
                'mahasiswa_id.required' => 'Mahasiswa tidak boleh kosong',
                'na_matkul1.required' => 'Nilai tidak boleh kosong',
                'na_matkul2.required' => 'Nilai tidak boleh kosong',
                'na_matkul3.required' => 'Nilai tidak boleh kosong',
                'na_matkul4.required' => 'Nilai tidak boleh kosong',
                'na_matkul5.required' => 'Nilai tidak boleh kosong',
                'na_matkul6.required' => 'Nilai tidak boleh kosong',
                'na_matkul7.required' => 'Nilai tidak boleh kosong',
                'na_matkul8.required' => 'Nilai tidak boleh kosong',
                'na_matkul9.required' => 'Nilai tidak boleh kosong',
                'na_matkul10.required' => 'Nilai tidak boleh kosong',
                'na_matkul11.required' => 'Nilai tidak boleh kosong',
                'na_matkul12.required' => 'Nilai tidak boleh kosong',
                'na_matkul13.required' => 'Nilai tidak boleh kosong',
                'na_matkul14.required' => 'Nilai tidak boleh kosong',
                'na_matkul15.required' => 'Nilai tidak boleh kosong',
                'na_matkul16.required' => 'Nilai tidak boleh kosong',
                'na_matkul17.required' => 'Nilai tidak boleh kosong',
                'na_matkul18.required' => 'Nilai tidak boleh kosong',
                'na_matkul19.required' => 'Nilai tidak boleh kosong',
                'na_matkul20.required' => 'Nilai tidak boleh kosong',
                'na_matkul21.required' => 'Nilai tidak boleh kosong',
                'na_matkul22.required' => 'Nilai tidak boleh kosong',
                'na_matkul23.required' => 'Nilai tidak boleh kosong',
                'na_matkul24.required' => 'Nilai tidak boleh kosong'
            ]
        );

        $data = [];
        for ($i = 1; $i <= 24; $i++) {
            $data[] = [
                "mahasiswa_id" => (int)$request['mahasiswa_id'],
                "matkul_id" => $i,
                "nilai" =>  (int)$request['na_matkul' . $i],
            ];
        }

        $save = NilaiMhs::insert($data);
        if ($save) {
            return redirect()->route('nilai.index')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->route('nilai.index')->with('error', 'Data gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function ajax_get_nilai_by_id($id, Request $request)
    {
    }

    public function edit($nim, Request $request)
    {

        $nilai_mhs = DB::select(DB::raw("
        select * from view_data_nilai_matkul
        where id = '$nim'"))[0];
        $mahasiswa = [
            'id' => $nilai_mhs->id,
            'nim' => $nilai_mhs->nim,
            'nama' => $nilai_mhs->nama,
            'data_nilai' => json_decode($nilai_mhs->data_nilai)
        ];

        return view('nilai.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\nilai  $nilai
     * @return \Illuminate\Http\Response
     */

    public function update($id, Request $request)
    {
        try {

            $array_key_nilai = array_keys($request->toArray());

            $array_nilai = array_filter($array_key_nilai, function ($item) {
                return str_contains($item, 'na_matkul');
            });
            $count_nilai =  count(array_keys($array_nilai));
            foreach ($array_nilai as $key => $value) {
                $id_matkul[] = explode('na_matkul', $value)[1];
            }

            $data_for_insert = [];
            for ($i = 1; $i <= $count_nilai; $i++) {
                $data_for_insert[] = [
                    'id' => (int)$request['input_id' . $id_matkul[$i - 1]],
                    'mahasiswa_id' => (int)$id,
                    'matkul_id' => $id_matkul[$i - 1],
                    'nilai' => (int)$request['na_matkul' . $id_matkul[$i - 1]],
                ];
            }

            NilaiMhs::upsert(
                $data_for_insert,
                ['mahasiswa_id', 'matkul_id', 'id'],
                ['nilai']
            );

            return redirect()->route('nilai.index', ['angkatan' => $request->angkatan])->with('success', 'Data berhasil diubah');
            return redirect('nilai');
        } catch (\Throwable $th) {

            return redirect()->route('nilai.index')->with('error', $th->getMessage());
            return redirect('nilai');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
