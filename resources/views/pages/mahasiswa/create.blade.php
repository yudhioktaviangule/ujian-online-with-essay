@extends("template.index")
@section("title","Tambah Mahasiswa")
@section("tombol")
    <a href="{{ route('mhs.index') }}" class="btn btn-default btn-sm">Kembali</a>
   
@endsection
@section("konten")
    <form action="{{ route('mhs.store') }}" method="post">
        <auth></auth>
        <div class="row justify-content-center">
            <div class="col-6">
                <div class='form-group'>
                    <label for=nim>NIM</label>
                    <input maxlength=8 class='form-control form-control-sm' name='nim' id='nim'>
                </div>
                <div class='form-group'>
                    <label for=nama>Nama</label>
                    <input class='form-control form-control-sm' name='nama' id='nama'>
                </div>    
                <div class='form-group'>
                    <label for=email>email</label>
                    <input type='email' class='form-control form-control-sm' name='email' id='email'>
                </div>
                <div class='form-group'>
                    <label for=jurusan>Jurusan</label>
                    <select class='form-control form-control-sm' name='jurusan' id='jurusan'>
                        <option value="SI">Sistem Informasi</option>
                        <option value="MI">Manajemen Informatika</option>
                        <option value="TK">Teknik Komputer</option>
                    </select>
                </div>
                <div class='form-group'>
                    <label for=kelas_id>Kelas</label>
                    <select class='form-control form-control-sm' name='kelas_id' id='kelas_id'>
                        <?php foreach($kelas as $key => $value):?>
                                <option value="{{$value->id}}">{{$value->kode_kelas}}</option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </form>   
    

@endsection
