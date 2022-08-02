@extends('partial.master')

@section('content')
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Edit Data Mata Kuliah</h4>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Form Edit Data</div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('matkul.update', $matkul->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label>Kode</label>
                                <input type="text" name="kode" class="form-control @error('kode') is-invalid @enderror"
                                    placeholder="Kode" value="{{old('kode', $matkul->kode)}}">
                                @error('kode')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                    placeholder="Nama Mata Kuliah" value="{{old('nama', $matkul->nama)}}">
                                @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>SKS</label>
                                <input type="text" name="sks" class="form-control @error('sks') is-invalid @enderror"
                                    placeholder="SKS" value="{{old('sks', $matkul->sks)}}">
                                @error('sks')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Angkatan</label>
                                <input type="text" name="angkatan"
                                    class="form-control @error('angkatan') is-invalid @enderror" placeholder="Angkatan"
                                    value="{{old('angkatan', $matkul->angkatan)}}">
                                @error('angkatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <input type="text" name="deskripsi"
                                    class="form-control @error('deskripsi') is-invalid @enderror"
                                    placeholder="Deskripsi dari Mata Kuliah tersebut"
                                    value="{{old('deskripsi', $matkul->deskripsi)}}">
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
