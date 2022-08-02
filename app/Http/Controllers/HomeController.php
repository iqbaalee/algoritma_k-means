<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nilai;
use App\Models\mahasiswa;
use App\Models\matkul;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
        $mahasiswa = mahasiswa::all();
        $matkul = matkul::all();

        return view('home', compact(
            'mahasiswa',
            'matkul'
        ));
    }
}
