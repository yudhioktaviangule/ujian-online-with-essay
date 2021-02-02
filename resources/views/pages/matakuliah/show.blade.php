@extends("template.index")
@section("title",$data->nama)
@section("delaction",route('matkul.destroy',['matkul'=>$data->id]))
@section("tombol")
    <a href="{{ route('matkul.index') }}" class="btn btn-default btn-sm">Kembali</a>
    <a href="{{ route('matkul.edit',['matkul'=>$data->id]) }}" class="btn btn-primary btn-sm">Edit Matakuliah</a>
    <a href="#" onclick="hapus()" class="btn btn-danger btn-sm">Hapus</a>
@endsection
@section("konten")
    <div class="col">
        <div class="form-group">
            <label for="">Kode Matakuliah</label>
            <p>
                {{$data->kode_matkul}}
            </p>
        </div>
        <div class="form-group">
            <label for="">Matakuliah</label>
            <p>
                {{$data->nama_matkul}}
            </p>
        </div>
        
        <div class="form-group">
            <label for="">jurusan</label>
            <p>
                {{strtoupper($data->jurusan)=="MI"?"Manajemen Informasi":(strtoupper($data->jurusan)=='SI'?"Sistem Informasi":"Teknik Komputer") }}
            </p>
        </div>
        
    </div>
@endsection

