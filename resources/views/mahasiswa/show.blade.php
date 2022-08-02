@extends('partial.master')

@section('content')
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center"></div>
                            <h1 class="h3 mb-2 text-gray-800">Detail Mahasiswa</h1>
                        </div>
                        <div class="card-body">
                            <p>NIP : {{ $mahasiswa->nim }}</p>
                            <p>Nama : {{ $mahasiswa->nama }}</p>
                            <p>Angkatan : {{ $mahasiswa->angkatan }}</p>
                            <p>Alamat : {{ $mahasiswa->alamat }}</p>
                            <p>Nomor HP : {{ $mahasiswa->nohp }}</p>

                            <a class="btn btn-primary" href="{{ route('mahasiswa.index') }}">Kembali</a>
                        </div>
                    </div>            
                </div>
            </div>
        </div>
    </div>
</div>   
@endsection