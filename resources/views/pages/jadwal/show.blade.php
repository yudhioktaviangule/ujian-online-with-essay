@extends("template.index")
@section("title",$data->nama)
@section("delaction",route('kelas.destroy',['kela'=>$data->id]))
@section("tombol")
    <a href="{{ route('kelas.index') }}" class="btn btn-default btn-sm">Kembali</a>
    <a href="{{ route('kelas.edit',['kela'=>$data->id]) }}" class="btn btn-primary btn-sm">Edit Kelas</a>
    <a href="#" onclick="hapus()" class="btn btn-danger btn-sm">Hapus</a>
@endsection
@section("konten")
    <div class="col">
        <div class="form-group">
            <label for="">Kode Kelas</label>
            <p>
                {{$data->kode_kelas}}
            </p>
        </div>
        
        <div class="form-group">
            <label for="">jurusan</label>
            <p>
                {{strtoupper($data->jurusan)=="MI"?"Manajemen Informasi":(strtoupper($data->jurusan)=='SI'?"Sistem Informasi":"Teknik Komputer") }}
            </p>
        </div>
        <div class="form-group">
            <label for="">Jenis Ujian</label>
            <p>
                {{$data->jenis_ujian}}
            </p>
        </div>
        
    </div>
@endsection

