<?php

namespace App\Http\Controllers;

use App\Models\matkul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MatkulController extends Controller
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
        $angkatan = DB::select(DB::raw('SELECT distinct(angkatan) FROM matkul'));
        $old = $request->angkatan;
        !empty($request->angkatan) ? $matkul = matkul::where('angkatan',  $request->angkatan)->get() : $matkul = matkul::all();

        return view('matkul.index', compact(
            'matkul',
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
        $model = new matkul;
        return view('matkul.create', compact(
            'model'
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
        try {
            $request->validate(
                [
                    'kode' => 'required|unique:matkul',
                    'nama' => 'required',
                    'sks' => 'required|max:1',
                    'deskripsi' => 'required|max:150',
                    'angkatan' => 'required',
                ],
                [
                    'kode.required' => 'Kode Mata Kuliah tidak boleh kosong',
                    'kode.unique' => 'Kode Mata Kuliah sudah digunakan',
                    'nama.required' => 'Nama Mata Kuliah tidak boleh kosong',
                    'sks.required' => 'SKS tidak boleh kosong',
                    'sks.max' => 'Maximal 1 karakter',
                    'deskripsi.required' => 'Deskripsi tidak boleh kosong',
                    'deskripsi.max' => 'Maximal 150 karakter',
                    'angkatan.required' => 'Angkatan tidak boleh kosong',
                ]
            );

            DB::table('matkul')->insert([
                "kode" => $request['kode'],
                "nama" => $request['nama'],
                "sks" => $request['sks'],
                "deskripsi" => $request['deskripsi'],
                'angkatan' => $request['angkatan'],
            ]);

            return redirect('matkul')->with('success', 'Data berhasil ditambahkan');
        } catch (\Throwable $th) {
            return $th->getMessage();
            return redirect('matkul')->with('error', 'Terjadi Kesalahan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\matkul  $matkul
     * @return \Illuminate\Http\Response
     */
    public function show(matkul $matkul)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\matkul  $matkul
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $matkul = matkul::where('id', $id)->first();
        return view('matkul.edit', compact('matkul'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\matkul  $matkul
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            $request->validate(
                [
                    'kode' => 'required|unique:matkul,kode,' . $id,
                    'nama' => 'required',
                    'sks' => 'required|max:1',
                    'deskripsi' => 'required|max:150',
                ],
                [

                    'nama.required' => 'Nama Mata Kuliah tidak boleh kosong',
                    'sks.required' => 'SKS tidak boleh kosong',
                    'sks.max' => 'Maximal 1 karakter',
                    'deskripsi.required' => 'Deskripsi tidak boleh kosong',
                    'deskripsi.max' => 'Maximal 150 karakter',
                ]
            );

            DB::table('matkul')->where('id', $id)->update([
                "kode" => $request['kode'],
                "nama" => $request['nama'],
                "sks" => $request['sks'],
                "deskripsi" => $request['deskripsi'],
                'angkatan' => $request['angkatan'],
            ]);

            return redirect('matkul')->with('success', 'Data berhasil diubah');
        } catch (\Throwable $th) {
            return $th->getMessage();
            return redirect('matkul')->with('error', 'Terjadi Kesalahan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\matkul  $matkul
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $query = matkul::where('id', $id)->delete();
        return redirect('matkul')->with('success', 'Data berhasil dihapus');
    }
}
