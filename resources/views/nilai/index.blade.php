@extends('partial.master')
@push('style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
<style>
    .table-head-sticky {
        position: sticky;
        left: 0;
        z-index: 100;
    }

    tr:nth-child(odd) .table-head-sticky {
        background-color: #fff;
    }

    tr:nth-child(even) .table-head-sticky {
        background-color: #fff;
    }

</style>
<script src="{{ asset('layout/assets/js/plugin/datatables/datatables.min.js') }}"></script>
@endpush
@section('content')

<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Data Nilai Mata Kuliah</h4>

                        </div>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif
                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <h4 class="text-center">Silakan Pilih Tahun Angkatan Untuk Melihat Data Nilai</h4>
                                    <form action="{{route('nilai.index')}}" method="GET">
                                        <div class="input-group">
                                            <select name="angkatan" id="angkatan" class="form-control">
                                                <option value="">-Pilih Tahun Angkatan-</option>
                                                @foreach($angkatan as $data)
                                                <option value="{{$data->angkatan}}"
                                                    {{($old == $data->angkatan) ? 'selected' : ''}}>Angkatan
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
                        <div class="">
                            <table id="bootstrap-data-table"
                                class="table table-responsive table-striped table-bordered nowrap" width="100%">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th class="table-head-sticky"
                                            style="position: sticky; left: 0; background: white; z-index: 100">NIM</th>
                                        <th>Nama Mahasiswa</th>
                                        @foreach ($data_nilai[0]['data_nilai'] as $d)
                                        <th>{{$d->matkul}}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_nilai as $key=> $data)
                                    <tr>
                                        <td>
                                            <a class="btn btn-primary"
                                                href="{{route('nilai.edit', [$data['mahasiswa_id'], $data['angkatan']])}}">Edit</a>
                                        </td>
                                        <td class="table-head-sticky">{{ $data['nim'] }}</td>
                                        <td>{{ $data['nama'] }}</td>
                                        @foreach($data['data_nilai'] as $value)
                                        <td>{{$value->nilai}}</td>
                                        @endforeach
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        @endif
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div>
@endsection

@push('scripts')
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#bootstrap-data-table').DataTable();
    });

</script>
@endpush
