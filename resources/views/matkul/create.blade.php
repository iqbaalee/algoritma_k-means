@extends('partial.master')

@section('content')
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Tambah Data Mata Kuliah</h4>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Form Tambah Data</div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('matkul.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Kode</label>
                                <input type="text" name="kode" class="form-control @error('kode') is-invalid @enderror"
                                    placeholder="Kode">
                                @error('kode')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                    placeholder="Nama Mata Kuliah">
                                @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>SKS</label>
                                <input type="number" name="sks" class="form-control @error('sks') is-invalid @enderror"
                                    placeholder="SKS">
                                @error('sks')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tahun Angkatan</label>
                                <input type="number" name="angkatan"
                                    class="form-control @error('angkatan') is-invalid @enderror" placeholder="Angkatan">
                                @error('angkatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Deskripsi </label>
                                <i> ( Maksimal 150 Karakter )</i>
                                <input type="text" name="deskripsi"
                                    class="form-control @error('deskripsi') is-invalid @enderror"
                                    placeholder="Deskripsi dari Mata Kuliah tersebut">
                                @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="card-action">
                                <button type="submit" class="btn btn-success">Submit</button>
                                <a href="{{route('matkul.index')}}"><button type="button"
                                        class="btn btn-danger">Cancel</button></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
