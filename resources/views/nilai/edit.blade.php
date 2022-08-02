@extends('partial.master')

@section('content')
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Edit Data Nilai</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Form Edit Data</div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('nilai.update', $mahasiswa['id']) }}" method="POST">
                            <!-- @method('PUT') -->
                            @csrf
                            <input type="hidden" name="angkatan" value="{{Request::segment(4)}}">
                            <br>
                            <h3> <b>DATA NILAI MAHASISWA : {{strtoupper($mahasiswa['nama'])}}</b> </h3>

                            @foreach ($mahasiswa['data_nilai'] as $key=>$data)

                            <div class="form-group">
                                <label>{{$data->matkul}}</label>
                                <select name="na_matkul{{$data->matkul_id}}" id="" class="form-control">
                                    <option value="">-Pilih Nilai-</option>
                                    <option value="4" {{$data->nilai == 4 ? 'selected' : ''}}>A</option>
                                    <option value="3" {{$data->nilai == 3 ? 'selected' : ''}}>B</option>
                                    <option value="2" {{$data->nilai == 2 ? 'selected' : ''}}>C</option>
                                    <option value="1" {{$data->nilai == 1 ? 'selected' : ''}}>D</option>
                                    <option value="0" {{$data->nilai == 0 ? 'selected' : ''}}>E</option>

                                </select>
                                <!-- <input type="number" min="0" max="4" name="na_matkul{{$data->matkul_id}}"
                                    class="form-control" placeholder="Masukan Nilai" value="{{$data->nilai}}" required> -->
                                <input type="hidden" min="0" max="4" name="input_id{{$data->matkul_id}}"
                                    class="form-control" placeholder="Masukan Nilai" value="{{$data->id_nilai}}"
                                    required>
                                <div class="invalid-feedback"></div>

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
