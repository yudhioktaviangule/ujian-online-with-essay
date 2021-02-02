@extends("template.index")
@section("title","Tambah Matakuliah")
@section("tombol")
    <a href="{{ route('matkul.index') }}" class="btn btn-default btn-sm">Kembali</a>
   
@endsection
@section("konten")
    <form action="{{ route('matkul.store') }}" method="post">
        <auth></auth>
        <div class="row justify-content-center">
            <div class="col-6">
                <div class='form-group'>
                    <label for=kode_matkul>Kode Matakuliah</label>
                    <input maxlength=8 class='form-control form-control-sm' name='kode_matkul' id='kode_matkul'>
                </div>
                <div class='form-group'>
                    <label for=nama_matkul>Nama Matakuliah</label>
                    <input class='form-control form-control-sm' name='nama_matkul' id='nama_matkul'>
                </div>
                <div class='form-group'>
                    <label for=jurusan>Jurusan</label>
                    <select class='form-control form-control-sm' name='jurusan' id='jurusan'>
                        <option value="SI">Sistem Informasi</option>
                        <option value="MI">Manajemen Informatika</option>
                        <option value="TK">Teknik Komputer</option>
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
