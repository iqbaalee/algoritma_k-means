@extends('partial.master')
@push('style')
<link rel="stylesheet" href="{{ asset('layout/assets/css/lib/datatable/dataTables.bootstrap.min.css') }}">
@endpush
@section('content')
<form action="{{route('analisis.store')}}" method="POST">
    @csrf
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">ANALISIS <i>K-MEANS CLUSTERING</i></h4>

                                <button type="submit" class="btn btn-primary btn-round ml-auto">Simpan</button>

                            </div>
                        </div>
                        <div class="card-body">

                            <div class="card">
                                <h1 align="center" class="mt-4">CLUSTER 1</h1>
                                <div class="card-body">
                                    <table id="cluster1"
                                        class="table table-responsive table-striped table-bordered nowrap" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="position-sticky" style="position: sticky; left: 0">Action
                                                </th>
                                                <th>NIM</th>
                                                <th>Nama Mahasiswa</th>
                                                @foreach ($matkul as $d)
                                                <th>{{$d->nama}}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data_nilai as $key=> $data)
                                            <tr>
                                                <th class="position-sticky" style="position: sticky; left: 0">

                                                    <!-- <select name="cluster" id="cluster" class="form-control">
                                            <option value="">-Pilih Cluster-</option>
                                            <option value="cluster1">Cluster-1</option>
                                            <option value="cluster2">Cluster-2</option>
                                            <option value="cluster3">Cluster-3</option>
                                        </select> -->
                                                    <input type="text" name="cluster1" value="{{$d->nim}}">
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
                                                <th class="position-sticky" style="position: sticky; left: 0">Action
                                                </th>
                                                <th>NIM</th>
                                                <th>Nama Mahasiswa</th>
                                                @foreach ($matkul as $d)
                                                <th>{{$d->nama}}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data_nilai as $key=> $data)
                                            <tr>
                                                <th class="position-sticky" style="position: sticky; left: 0">

                                                    <!-- <select name="cluster" id="cluster" class="form-control">
                                            <option value="">-Pilih Cluster-</option>
                                            <option value="cluster1">Cluster-1</option>
                                            <option value="cluster2">Cluster-2</option>
                                            <option value="cluster3">Cluster-3</option>
                                        </select> -->
                                                    <input type="text" name="cluster2" value="{{$d->nim}}">
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
                                                <th class="position-sticky" style="position: sticky; left: 0">Action
                                                </th>
                                                <th>NIM</th>
                                                <th>Nama Mahasiswa</th>
                                                @foreach ($matkul as $d)
                                                <th>{{$d->nama}}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data_nilai as $key=> $data)
                                            <tr>
                                                <th class="position-sticky" style="position: sticky; left: 0">

                                                    <!-- <select name="cluster" id="cluster" class="form-control">
                                            <option value="">-Pilih Cluster-</option>
                                            <option value="cluster1">Cluster-1</option>
                                            <option value="cluster2">Cluster-2</option>
                                            <option value="cluster3">Cluster-3</option>
                                        </select> -->
                                                    <input type="text" name="cluster3" value="{{$d->nim}}">
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

                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div>
</form>
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
