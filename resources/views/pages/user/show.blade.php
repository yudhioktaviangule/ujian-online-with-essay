@extends("template.index")
@section("title",$data->nama)
@section("delaction",route('user.destroy',['user'=>$data->id]))
@section("tombol")
    <a href="{{ route('user.index') }}" class="btn btn-default btn-sm">Kembali</a>
    <a href="{{ route('user.edit',['user'=>$data->id]) }}" class="btn btn-primary btn-sm">Edit user</a>
    <a href="#" onclick="hapus()" class="btn btn-danger btn-sm">Hapus</a>
@endsection
@section("konten")
    <div class="col">
        <div class="form-group">
            <label for="">Nama</label>
            <p>
                {{$data->name}}
            </p>
        </div>
        <div class="form-group">
            <label for="">E-Mail</label>
            <p>
                {{$data->email}}
            </p>
        </div>
        <div class="form-group">
            <label for="">Level</label>
            <p>
                {{$data->level}}
            </p>
        </div>
        
    </div>
@endsection

