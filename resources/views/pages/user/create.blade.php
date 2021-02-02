@extends("template.index")
@section("title","Tambah User")
@section("tombol")
    <a href="{{ route('user.index') }}" class="btn btn-default btn-sm">Kembali</a>
   
@endsection
@section("konten")
    <form action="{{ route('user.store') }}" method="post">
        <auth></auth>
        <input type="hidden" name='mahasiswa_id' value=0>
        <div class="row justify-content-center">
            <div class="col-6">
                <div class='form-group'>
                    <label for=name>Nama</label>
                    <input maxlength=40 class='form-control form-control-sm' name='name' id='name'>
                </div>
                <div class='form-group'>
                    <label for=email>Email</label>
                    <input maxlength=40 class='form-control form-control-sm' type='email' name='email' id='email'>
                </div>

                <div class='form-group'>
                    <label for=level>Level</label>
                    <select class='form-control form-control-sm' name='level' id='level'>
                        <option value="admin">Admin</option>
                        <option value="dosen">Dosen</option>
                        
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
