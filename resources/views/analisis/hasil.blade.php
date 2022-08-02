@extends('partial.master')
@push('style')
<link rel="stylesheet" href="{{ asset('layout/assets/css/lib/datatable/dataTables.bootstrap.min.css') }}">
@endpush
@section('content')
<!-- <form action="" method=""> -->
@csrf
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">ANALISIS <i>K-MEANS CLUSTERING</i></h4>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif

                        <h1 align="center">Hasil Analisis</h1>
                        <div class="card">


                            <div class="card-body">

                                <div class="table-responsive">

                                    <div class="row ml-1 mr-1 mb-3 d-flex justify-content-between">
                                        <div class="col-md-4">
                                            <form action="{{route('analisis.hasil')}}" method="GET">

                                                <div class="input-group">
                                                    <select class="custom-select" id="filter_cluster"
                                                        name="filter_cluster">
                                                        <option value="">-Pilih Cluster-</option>
                                                        <option value="C1">Cluster 1</option>
                                                        <option value="C2">Cluster 2</option>
                                                        <option value="C3">Cluster 3</option>
                                                    </select>
                                                    <select class="custom-select" id="filter_angkatan"
                                                        name="filter_angkatan">
                                                        <option value="">-Pilih Angkatan-</option>
                                                        @foreach($angkatan_new as $v)
                                                        <option value="{{$v}}">Angkatan {{$v}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-sm btn-primary"
                                                            type="submit">Filter</button>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-4 d-flex justify-content-end">
                                            <form id="formCetak">
                                                <button type="submit" class="btn btn-sm btn-primary">Cetak</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <table id="cluster1" class="table table-striped table-bordered nowrap"
                                    style="width:100%">
                                    <thead>
                                        <tr>

                                            </th>
                                            <th width=25%>NIM</th>
                                            <th width=75%>Nama</th>
                                            <th width=75%>Angkatan</th>
                                            <th width=25%>Cluster</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($response->data as $data)
                                        <tr>
                                            <td>{{$data->nim}}</td>
                                            <td>{{$data->nama}}</td>
                                            <td>{{$data->angkatan}}</td>
                                            <td>{{$data->cluster}}</td>
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
    </div>
</div><!-- .animated -->
</div>
<!-- </form> -->
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
        $('#cluster1').DataTable({
            bSearch: false
        });

    });

    cluster1 = (e) => {
        console.log(e);
    }

    document.getElementById('formCetak').addEventListener('submit', (e) => {
        e.preventDefault()
        console.log(document.getElementById('filter_cluster').value)
        console.log(document.getElementById('filter_angkatan').value)
        window.open('{{route("analisis.print_result")}}' + '?filter_cluster=' +
            document.getElementById('filter_cluster').value + '&filter_angkatan=' +
            document.getElementById('filter_angkatan').value, '_blank');
    })

</script>
@endpush
