@extends('partial.master')

@section('content')
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center"></div>
                            <h1 class="h3 mb-2 text-gray-800">Detail Admin</h1>
                        </div>
                        <div class="card-body">
                            <p>Nama : {{ Auth::user()->nama }}</p>
                            <p>Email : {{ Auth::user()->email }}</p>
                        </div>
                    </div>            
                </div>
            </div>
        </div>
    </div>
</div>   
@endsection