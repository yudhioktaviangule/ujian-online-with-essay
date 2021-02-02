@extends("template.index")
@section("title",$data->nama)
@section("delaction",route('mhs.destroy',['mh'=>$data->id]))
@section("tombol")
    <a href="{{ route('mhs.index') }}" class="btn btn-default btn-sm">Kembali</a>
    <a href="{{ route('mhs.edit',['mh'=>$data->id]) }}" class="btn btn-primary btn-sm">Edit Mahasiswa</a>
    <a href="#" onclick="hapus()" class="btn btn-danger btn-sm">Hapus</a>
@endsection
@section("konten")
    <div class="col">
        <div class="form-group">
            <label for="">NIM</label>
            <p>
                {{$data->nim}}
            </p>
        </div>
        <div class="form-group">
            <label for="">Nama</label>
            <p>
                {{$data->nama}}
            </p>
        </div>
        <div class="form-group">
            <label for="">email</label>
            <p>
                {{$data->email}}
            </p>
        </div>
        <div class="form-group">
            <label for="">jurusan</label>
            <p>
                {{strtoupper($data->jurusan)=="MI"?"Manajemen Informasi":(strtoupper($data->jurusan)=='SI'?"Sistem Informasi":"Teknik Komputer") }}
            </p>
        </div>
        <div class="form-group">
            <label for="">Kelas</label>
            <p>
                {{ $data->getKelas()->kode_kelas }}
            </p>
        </div>
    </div>
@endsection

