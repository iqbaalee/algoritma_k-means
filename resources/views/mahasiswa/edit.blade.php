@extends('partial.master')

@section('content')
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Edit Data Mahasiswa</h4>
            
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Form Edit Data</div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="post">
                            @csrf
                            @method('PUT')
                                <div class="form-group">
                                    <label>NIM</label>
                                    <input type="text" name="nim" class="form-control @error('nim') is-invalid @enderror" placeholder="NIM" value="{{old('nim', $mahasiswa->nim) }}" disabled>
                                    @error('nim')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"  placeholder="Nama" value="{{old('nama', $mahasiswa->nama)}}">
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Angkatan</label>
                                    <input type="text" name="angkatan" class="form-control @error('angkatan') is-invalid @enderror" placeholder="Angkatan" value="{{old('angkatan', $mahasiswa->angkatan)}}">
                                    @error('angkatan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" name="alamat" class="form-control  @error('alamat') is-invalid @enderror" placeholder="Alamat" value="{{old('alamat', $mahasiswa->alamat)}}">
                                    @error('alamat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Nomor Handphone</label>
                                    <input type="text" name="nohp" class="form-control @error('nohp') is-invalid @enderror"  placeholder="No HP" value="{{old('nohp', $mahasiswa->nohp)}}">
                                    @error('nohp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="card-action">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <a href="{{route('mahasiswa.index')}}"><button type="button" class="btn btn-danger">Cancel</button></a>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection