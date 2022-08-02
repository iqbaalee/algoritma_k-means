<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use App\Models\nilai;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
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
    
    public function index()
    {
        $mahasiswa = mahasiswa::all();
        return view('mahasiswa.index', compact(
            'mahasiswa'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new mahasiswa;
        return view('mahasiswa.create', compact(
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
            $request->validate([
                'nim' => 'required|unique:mahasiswa',
                'nama' => 'required',
                'angkatan' => 'required|min:2|max:4',
                'alamat' => 'required',
                'nohp' => 'required|min:11|max:13',
            ],
            [
                'nim.required' => 'NIM tidak boleh kosong',
                'nim.unique' => 'NIM sudah digunakan',
                'nama.required' => 'Nama tidak boleh kosong',
                'angkatan.required' => 'Angkatan tidak boleh kosong',
                'angkatan.min' => 'Minimal 2 karakter',
                'angkatan.max' => 'Maximal 4 karakter',
                'alamat.required' => 'Alamat tidak boleh kosong',
                'nohp.required' => 'No HP tidak boleh kosong',
                'nohp.min' => 'Minimal 11 karakter',
                'nohp.max' => 'Maximal 13 karakter',
            ]);

            mahasiswa::create([
                "nim" => $request['nim'],
                "nama" => $request['nama'],
                "angkatan" => $request['angkatan'],
                "alamat" => $request['alamat'],
                "nohp" => $request['nohp']
            ]);

            return redirect('mahasiswa')->with('success', 'Data berhasil ditambahkan');
        }catch (\Throwable $th) {
            return $th->getMessage();
            return redirect('mahasiswa')->with('error', 'Terjadi Kesalahan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mahasiswa = mahasiswa::where('id', $id)->first();
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mahasiswa = mahasiswa::where('id', $id)->first();
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                
                'nama' => 'required',
                'angkatan' => 'required|min:2|max:4',
                'alamat' => 'required',
                'nohp' => 'required|min:11|max:13',
            ],
            [
                
                'nama.required' => 'Nama tidak boleh kosong',
                'angkatan.required' => 'Angkatan tidak boleh kosong',
                'angkatan.min' => 'Minimal 2 karakter',
                'angkatan.max' => 'Maximal 4 karakter',
                'alamat.required' => 'Alamat tidak boleh kosong',
                'nohp.required' => 'No HP tidak boleh kosong',
                'nohp.min' => 'Minimal 11 karakter',
                'nohp.max' => 'Maximal 13 karakter',
            ]);

            $mahasiswa = mahasiswa::where('id', $id)->update([
                
                "nama" => $request['nama'],
                "angkatan" => $request['angkatan'],
                "alamat" => $request['alamat'],
                "nohp" => $request['nohp']
            ]);

            return redirect('mahasiswa')->with('success', 'Data berhasil diubah');
        }catch (\Throwable $th) {
            return $th->getMessage();
            return redirect('mahasiswa')->with('error', 'Terjadi Kesalahan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $query = mahasiswa::where('id', $id)->delete();
        return redirect('mahasiswa')->with('success', 'Data berhasil dihapus');
    }
}
