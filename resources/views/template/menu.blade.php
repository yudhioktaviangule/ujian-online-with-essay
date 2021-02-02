<li class="nav-item">
    <a href="{{url('/')}}" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
            Beranda
            
        </p>
    </a>
</li>
<li class="nav-item menu-open">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-cog"></i>
        <p>
            Master
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('user.index') }}" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p>User</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('kelas.index') }}" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p>Kelas</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('matkul.index') }}" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p>Matakuliah</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('mhs.index') }}" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p>Mahasiswa</p>
            </a>
        </li>        
 
        
        
    </ul>
</li>
<li class="nav-item menu-open">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-cog"></i>
        <p>
            Ujian
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('jadwal.index') }}" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p>Jadwal</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('soal.index') }}" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p>Soal</p>
            </a>
        </li>
    </ul>
</li>
