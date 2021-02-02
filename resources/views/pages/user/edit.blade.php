@extends("template.index")
@section("title",$data->name)
@section("tombol")
    <a href="{{ route('user.index') }}" class="btn btn-default btn-sm">Kembali</a>
@endsection
@section("konten")
<form action="{{route('user.update',['user'=>$data->id])}}" method="post">
    <auth></auth>
    <put></put>
    <div class="col">
        <div class='form-group'>
            <label for=name>Nama</label>
            <input value="{{$data->name}}" class='form-control form-control-sm' name='name' id='name'>
        </div>
        
        <div class='form-group'>
            <label for=email>E-Mail</label>
            <input value="{{$data->email}}" class='form-control form-control-sm' type=email name='email' id='email'>
        </div>
        
        
        <div class="form-group">
            <button class="btn btn-primary">
                Save
            </button>
        </div>
    </div>
</form>
@endsection

