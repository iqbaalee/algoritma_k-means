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
                            <h4 class="card-title">Data Mahasiswa</h4>

                            <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary btn-round ml-auto">
                                Tambah Data
                            </a>

                        </div>

                    </div>
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
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width=25%>NIM</th>
                                    <th width=35%>Nama</th>
                                    <th width=20%>Angkatan</th>
                                    <th width=5%>Status</th>
                                    <th width=20%>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mahasiswa as $key=>$data)
                                <tr>
                                    <td>{{ $data->nim }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->angkatan }}</td>
                                    <td><span
                                            class="badge badge-{{$data->isAnalyze == 0 ? 'danger' : 'success'}}">{{$data->isAnalyze == 0 ? 'Belum' : 'Sudah'}}
                                            Dianalisa</span>
                                    </td>
                                    <td>
                                        <form action="{{route('mahasiswa.destroy', $data->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('mahasiswa.show', $data->id)}}"
                                                class="btn btn-info btn-sm"><i class="fa fa-info"
                                                    aria-hidden="true"></i></a>
                                            <a href="{{ route('mahasiswa.edit', $data->id)}}"
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
        $('#bootstrap-data-table').DataTable();
    });

</script>
@endpush
