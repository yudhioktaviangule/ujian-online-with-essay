@extends("template.index")
@section("title",$data->nama)
@section("tombol")
    <a href="{{ route('mhs.index') }}" class="btn btn-default btn-sm">Kembali</a>
@endsection
@section("konten")
<form action="{{route('mhs.update',['mh'=>$data->id])}}" method="post">
    <auth></auth>
    <put></put>
    <div class="col">
        <div class='form-group'>
            <label for=nim>NIM</label>
            <input readonly value="{{$data->nim}}" class='form-control form-control-sm' name='nim' id='nim'>
        </div>
        <div class='form-group'>
            <label for=nama>nama</label>
            <input value="{{$data->nama}}" class='form-control form-control-sm' name='nama' id='nama'>
        </div>
        <div class='form-group'>
            <label for=email>email</label>
            <input value="{{$data->email}}" class='form-control form-control-sm' name='email' id='email'>
        </div>
        <div class='form-group'>
            <label for=jurusan>Jurusan</label>
            <select class='form-control form-control-sm' name='jurusan' id='jurusan'>
                <option {{strtoupper($data->jurusan)=='SI'?'selected':''}} value="SI">Sistem Informasi</option>
                <option {{strtoupper($data->jurusan)=='MI'?'selected':''}} value="MI">Manajemen Informatika</option>
                <option {{strtoupper($data->jurusan)=='TK'?'selected':''}} value="TK">Teknik Komputer</option>
            </select>
        </div>
        <div class='form-group'>
            <label for=jurusan>Jurusan</label>
            <select class='form-control form-control-sm' name='jurusan' id='jurusan'>
                <?php foreach($kelas as $key => $value):?>
                    <option {{$data->kelas_id==$value->id?'selected':''}} value="{{$value->id}}">{{ $value->kode_kelas }}</option>    
                <?php endforeach;?>
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

