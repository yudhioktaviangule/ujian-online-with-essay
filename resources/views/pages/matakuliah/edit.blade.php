@extends("template.index")
@section("title",$data->nama_matkul)
@section("tombol")
    <a href="{{ route('matkul.index') }}" class="btn btn-default btn-sm">Kembali</a>
@endsection
@section("konten")
<form action="{{route('matkul.update',['matkul'=>$data->id])}}" method="post">
    <auth></auth>
    <put></put>
    <div class="col">
        <div class='form-group'>
            <label for=kode_matkul>Kode Matakuliah</label>
            <input readonly value="{{$data->kode_matkul}}" class='form-control form-control-sm' name='kode_matkul' id='kode_matkul'>
        </div>
        <div class='form-group'>
            <label for=nama_matkul>Matakuliah</label>
            <input  value="{{$data->nama_matkul}}" class='form-control form-control-sm' name='nama_matkul' id='nama_matkul'>
        </div>
        
        <div class='form-group'>
            <label for=jurusan>Jurusan</label>
            <select class='form-control form-control-sm' name='jurusan' id='jurusan'>
                <option {{strtoupper($data->jurusan)=='SI'?'selected':''}} value="SI">Sistem Informasi</option>
                <option {{strtoupper($data->jurusan)=='MI'?'selected':''}} value="MI">Manajemen Informatika</option>
                <option {{strtoupper($data->jurusan)=='TK'?'selected':''}} value="TK">Teknik Komputer</option>
            </select>
        </div>
        
        <div class="form-group">
            <button class="btn btn-primary">
                Save
            </button>
        </div>
    </div>
</form>
@endsection

