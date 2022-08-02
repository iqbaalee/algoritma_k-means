@extends('partial.master')
@push('style')
<link rel="stylesheet" href="{{ asset('layout/assets/css/lib/datatable/dataTables.bootstrap.min.css') }}">
@endpush
@section('content')
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Data Mata Kuliah</h4>

                            <a href="{{ route('matkul.create') }}" class="btn btn-primary btn-round ml-auto">
                                Tambah Data
                            </a>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card">
                            <div class="card-body">
                                @if(session('success'))
                                <div class="alert alert-success">
                                    {{@session('success')}}
                                </div>
                                @endif
                                @if(session('error'))
                                <div class="alert alert-danger">
                                    {{@session('error')}}
                                </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">

                                            <div class="mx-3 mb-3 col-md-3">
                                                <h6>Filter : </h6>
                                                <form action="{{route('matkul.index')}}" method="GET">
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
                                                            <button class="btn btn-sm btn-primary"
                                                                type="submit">Filter</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th width=5%>No</th>
                                                    <th width=15%>Kode</th>
                                                    <th width=25%>Nama Matkul</th>
                                                    <th width=10%>SKS</th>
                                                    <th width=10%>Angkatan</th>
                                                    <th width=30%>Deskripsi</th>
                                                    <th width=15%>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($matkul as $key=>$data)
                                                <tr>
                                                    <td>{{ $data->id }}</td>
                                                    <td>{{ $data->kode }}</td>
                                                    <td>{{ $data->nama }}</td>
                                                    <td>{{ $data->sks }}</td>
                                                    <td>{{ $data->angkatan }}</td>
                                                    <td>{{ $data->deskripsi }}</td>
                                                    <td>
                                                        <form action="{{route('matkul.destroy', $data->id)}}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a href="{{ route('matkul.edit', $data->id)}}"
                                                                class="btn btn-primary btn-sm"><i class="fa fa-pencil"
                                                                    aria-hidden="true"></i></a>
                                                            <button type="submit"
                                                                class="btn btn-danger my-1 btn-sm fa fa-trash"></button>
                                                        </form>
                                                    </td>
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
        $('#bootstrap-data-table-export').DataTable();
    });

</script>
@endpush
