@extends('partial.master')
@push('style')
<link rel="stylesheet" href="{{ asset('layout/assets/css/lib/datatable/dataTables.bootstrap.min.css') }}">
<style>
    .table-head-sticky {
        position: sticky;
        left: 0;
        z-index: 100;
    }

    tr:nth-child(odd) .table-head-sticky {
        background-color: #f5f5f5;
    }

    tr:nth-child(even) .table-head-sticky {
        background-color: #fff;
    }

</style>
@endpush
@section('content')

<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">ANALISIS <i>K-MEANS CLUSTERING</i></h4>

                            <!-- <button type="submit" class="btn btn-primary btn-round ml-auto">Analisis</button> -->

                        </div>
                    </div>
                    <div class="card-body">
                        @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif
                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <h4 class="text-center">Silakan Pilih Tahun Angkatan Untuk Melihat Data Nilai
                                    </h4>
                                    <form action="{{route('analisis.index')}}" method="GET">
                                        <div class="input-group">
                                            <select name="angkatan" id="angkatan" class="form-control">
                                                <option value="">-Pilih Tahun Angkatan-</option>
                                                @foreach($angkatan as $data)
                                                <option value="{{$data->angkatan}}">Angkatan
                                                    {{$data->angkatan}}
                                                </option>
                                                @endforeach
                                            </select>

                                            <div class="input-group-append">
                                                <button class="btn btn-sm btn-primary" type="submit">Filter</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @if(!empty($old))
                        <form action="{{route('analisis.analyze')}}" method="POST">
                            <input type="hidden" name="angkatan" value="{{Request::get('angkatan')}}">
                            <button type="submit" class="btn-block btn-primary btn mb-2">ANALISIS</button>
                            @csrf
                            <div class="card">
                                <h1 align="center" class="mt-4">CLUSTER 1</h1>
                                <div class="card-body">
                                    <table id="cluster1"
                                        class="table table-responsive table-striped table-bordered nowrap" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="table-head-sticky"
                                                    style="position: sticky; left: 0; background: white; z-index: 100">
                                                    Action
                                                </th>
                                                <th>NIM</th>
                                                <th>Nama Mahasiswa</th>
                                                @foreach ($data_nilai[0]['data_nilai'] as $d)
                                                <th>{{$d->matkul}}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data_nilai as $key=> $data)
                                            <tr>
                                                <th class="table-head-sticky">
                                                    <input type="radio" value="{{$data['nim']}}" name="cluster1">
                                                </th>
                                                <td>{{ $data['nim'] }}</td>
                                                <td>{{ $data['nama'] }}</td>
                                                @foreach($data['data_nilai'] as $value)
                                                <td>{{$value->nilai}}</td>
                                                @endforeach
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card">
                                <h1 align="center" class="mt-4">CLUSTER 2</h1>
                                <div class="card-body">
                                    <table id="cluster2"
                                        class="table table-responsive table-striped table-bordered nowrap" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="table-head-sticky"
                                                    style="position: sticky; left: 0; background: white; z-index: 100">
                                                    Action
                                                </th>
                                                <th>NIM</th>
                                                <th>Nama Mahasiswa</th>
                                                @foreach ($data_nilai[0]['data_nilai'] as $d)
                                                <th>{{$d->matkul}}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data_nilai as $key=> $data)
                                            <tr>
                                                <th class="table-head-sticky">
                                                    <input type="radio" value="{{$data['nim']}}" name="cluster2">
                                                </th>
                                                <td>{{ $data['nim'] }}</td>
                                                <td>{{ $data['nama'] }}</td>
                                                @foreach($data['data_nilai'] as $value)
                                                <td>{{$value->nilai}}</td>
                                                @endforeach
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="card">
                                <h1 align="center" class="mt-4">CLUSTER 3</h1>
                                <div class="card-body">
                                    <table id="cluster3"
                                        class="table table-responsive table-striped table-bordered nowrap" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="table-head-sticky"
                                                    style="position: sticky; left: 0; background: white; z-index: 100">
                                                    Action
                                                </th>
                                                <th>NIM</th>
                                                <th>Nama Mahasiswa</th>
                                                @foreach ($data_nilai[0]['data_nilai'] as $d)
                                                <th>{{$d->matkul}}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data_nilai as $key=> $data)
                                            <tr>
                                                <th class="table-head-sticky">
                                                    <input type="radio" value="{{$data['nim']}}" name="cluster3">
                                                </th>
                                                <td>{{ $data['nim'] }}</td>
                                                <td>{{ $data['nama'] }}</td>
                                                @foreach($data['data_nilai'] as $value)
                                                <td>{{$value->nilai}}</td>
                                                @endforeach
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div>

@endsection

@push('scripts')
<script src="{{ asset('layout/assets/js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('layout/assets/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('layout/assets/js/lib/data-table/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('layout/assets/js/lib/data-table/jszip.min.js') }}"></script>
<script src="{{ asset('layout/assets/js/lib/data-table/vfs_fonts.js') }}"></script>
<script src="{{ asset('layout/assets/js/lib/data-table/buttons.html5.min.js') }}"></script>
<script src="{{ asset('layout/assets/js/lib/data-table/buttons.print.min.js') }}"></script>
<script src="{{ asset('layout/assets/js/lib/data-table/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('layout/assets/js/init/datatables-init.js') }}"></script>


<script type="text/javascript">
    $(document).ready(function () {
        $('#cluster1').DataTable();
        $('#cluster2').DataTable();
        $('#cluster3').DataTable();
    });

    cluster1 = (e) => {
        console.log(e);
    }

</script>
@endpush
