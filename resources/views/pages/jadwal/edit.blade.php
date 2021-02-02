@extends("template.index")
@section("title",$data->nama)
@section("tombol")
    <a href="{{ route('kelas.index') }}" class="btn btn-default btn-sm">Kembali</a>
@endsection
@section("konten")
<form action="{{route('kelas.update',['kela'=>$data->id])}}" method="post">
    <auth></auth>
    <put></put>
    <div class="col">
        <div class='form-group'>
            <label for=kode_kelas>Kode Kelas</label>
            <input readonly value="{{$data->kode_kelas}}" class='form-control form-control-sm' name='kode_kelas' id='kode_kelas'>
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

