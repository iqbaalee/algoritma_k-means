<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div>
                    <li class="active">
                        <a href="{{route('home')}}"><img src="{{ asset('layout/assets/img/cic3.png') }}" alt="Logo"></a>
                    </li>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item">
                    <a href="{{route('home')}}">
                        <i class="fa fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">DATA</h4>
                </li>
                <li class="nav-item">
                    <a href="{{ route('mahasiswa.index')}}">
                        <i class="fa fa-desktop"></i>
                        <p>Mahasiswa</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#submenu">
                        <i class="menu-icon fa fa-book"></i>
                        <p>Mata Kuliah</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="submenu">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('matkul.index') }}">
                                    <span class="sub-item">Data Mata Kuliah</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('nilai.index') }}">
                                    <span class="sub-item">Data Nilai</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">PERHITUNGAN</h4>
                </li>
                <li class="nav-item">
                    <a href="{{ route('analisis.index')}}">
                        <i class="menu-icon fa fa-cogs"></i>
                        <p>Analisis</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('analisis.hasil')}}">
                        <i class="menu-icon ti-email"></i>
                        <p>Hasil</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
