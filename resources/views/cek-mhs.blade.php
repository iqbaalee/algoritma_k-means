<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Skripsi TI UCIC</title>
    <meta name="description" content="Skripsi TI UCIC">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{ asset('layout/assets/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('layout/assets/css/style.css') }}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body class="bg-info">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="{{ asset('layout/assets/img/cic2.png') }}" alt="">
                    </a>
                </div>
                <div class="login-logo">
                    <h6 class="text-white pb-2 fw-bold">BIDANG SKRIPSI MAHASISWA TEKNIK INFORMATIKA</h6>
                </div>

                @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif

                <div class="card">
                    <div class="card-body">
                        <form action="{{route('mhscek')}}" method="GET">
                            <div class="form-group">
                                <label>NIM</label>
                                <input type="nim" name="nim" value="{{session('nim') ? session('nim') : ''}}"
                                    class="form-control @error('nim') is-invalid @enderror" required placeholder="NIM">
                                @error('nim')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-block btn-info btn-sm">TAMPILKAN HASIL</button>
                        </form>
                    </div>
                </div>
                @if(session('success'))
                <div class="card mt-3 ">
                    <div class="card-body">
                        <h4 align="center" class="font-weight-bold text-uppercase">Saran Bidang Skripsi</h4>
                        <table class="mt-2">
                            <tr>
                                <td>NIM</td>
                                <td>:</td>
                                <td>{{session('data')['nim']}}</td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td>{{session('data')['nama']}}</td>
                            </tr>
                            <tr>
                                <td>Angkatan</td>
                                <td>:</td>
                                <td>{{session('data')['angkatan']}}</td>
                            </tr>
                            <tr>
                                <td>Bidang Skripsi</td>
                                <td>:</td>
                                <td>{{session('data')['bidang_skripsi']['kelompok']}}</td>
                            </tr>
                            <tr>
                                <td>Topik Skripsi</td>
                                <td>:</td>

                            </tr>
                            @foreach(session('data')['bidang_skripsi']['topik'] as $key=> $value)
                            <tr>
                                <td></td>
                                <td>{{$key + 1}}.</td>
                                <td> {{$value}}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                @endif
            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="{{ asset('layout/assets/js/main.js') }}"></script>

</body>

</html>
