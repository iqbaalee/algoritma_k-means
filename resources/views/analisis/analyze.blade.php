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
                            @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                            @endif
                            <input type="hidden" name="angkatan" value="{{$angkatan}}">
                            <input type="hidden" name="nim_c1" value="{{$nim_c1}}">
                            <input type="hidden" name="nim_c2" value="{{$nim_c2}}">
                            <input type="hidden" name="nim_c3" value="{{$nim_c3}}">
                            <h1 align="center">Hasil Analisis</h1>
                            <div class="card">
                                <h4 align="center" class="mt-4">Titik Cluster</h4>
                                <div class="card-body">
                                    <table id="cluster1"
                                        class="table table-responsive table-striped table-bordered nowrap"
                                        style="width:100%">
                                        <thead>
                                            <tr>

                                                </th>
                                                <th width="10%">No</th>
                                                <th width=25%>NIM</th>
                                                <th width=75%>Nama</th>
                                                <th width=25%>Cluster</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data->titik_cluster as $key => $v)
                                            <tr>

                                                <td>{{$key + 1}}</td>
                                                <td>{{$v->nim}}</td>
                                                <td>{{$v->nama}}</td>
                                                <td>{{$v->cluster}}</td>

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card">
                                <h4 align="center" class="mt-4">Hasil Cluster</h4>
                                <div class="card-body">
                                    <table id="cluster2"
                                        class="table table-responsive table-striped table-bordered nowrap"
                                        style="width:100%">
                                        <thead>
                                            <tr>

                                                <th width="10%">No.</th>
                                                <th width="10%">NIM</th>
                                                <th width="75%">Nama Mahasiswa</th>
                                                <th width="75%">C1</th>
                                                <th width="75%">C2</th>
                                                <th width="75%">C3</th>
                                                <th width="75%">Prediksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data->data as $key => $v)
                                            <tr>
                                                <td>{{$key + 1}}</td>
                                                <td>{{$v->nim}}</td>
                                                <td>{{$v->nama}}</td>
                                                <td>{{$v->cluster1}}</td>
                                                <td>{{$v->cluster2}}</td>
                                                <td>{{$v->cluster3}}</td>
                                                <td>{{ 'C' . $v->cluster}}</td>
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
