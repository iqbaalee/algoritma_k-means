@extends('partial.master')

@section('content')
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Tambah Data Nilai</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Form Tambah Data</div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('nilai.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label>Mahasiswa</label>
                                <select class="form-control @error('mahasiswa_id') is-invalid @enderror"
                                    name="mahasiswa_id">
                                    <option value="0" selected disabled>-- Pilih Mahasiswa --</option>
                                    @foreach ($mahasiswa as $data)
                                    @if (old('mahasiswa_id') == $data->id)
                                    <option value="{{ $data->id }}"> {{ $data->nim }} - {{$data->nama}} </option>
                                    @else
                                    <option value="{{ $data->id }}"> {{ $data->nim }} - {{$data->nama}} </option>
                                    @endif
                                    @endforeach
                                </select>
                                @error('mahasiswa_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </select>
                            </div>
                            <br>
                            <h3><b>DATA NILAI MAHASISWA</b> </h3>
                            @foreach ($matkul as $key=>$data)
                            <div class="form-group">
                                <label>{{$data->nama}}</label>
                                <input type="number" min="0" max="4" name="na_matkul{{$data->id}}"
                                    class="form-control @error('na_matkul{{$data->id}}') is-invalid @enderror"
                                    placeholder="Masukan Nilai">
                                @error('na_matkul{{$data->id}}')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            @endforeach
                            <div class="card-action">
                                <button type="submit" class="btn btn-success">Submit</button>
                                <a href="{{route('nilai.index')}}"><button type="button"
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
