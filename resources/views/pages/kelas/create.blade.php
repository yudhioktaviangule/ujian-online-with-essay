@extends("template.index")
@section("title","Tambah Kelas")
@section("tombol")
    <a href="{{ route('kelas.index') }}" class="btn btn-default btn-sm">Kembali</a>
   
@endsection
@section("konten")
    <form action="{{ route('kelas.store') }}" method="post">
        <auth></auth>
        <div class="row justify-content-center">
            <div class="col-6">
                <div class='form-group'>
                    <label for=kode_kelas>Kode Kelas</label>
                    <input maxlength=8 class='form-control form-control-sm' name='kode_kelas' id='kode_kelas'>
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
