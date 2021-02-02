@extends("template.index")
@section("title","Tambah Soal Essay")
@section("tombol")
    <a href="{{ route('soalessay.index') }}?id={{ $jadwal }}" class="btn btn-default btn-sm">Kembali</a>
@endsection
@section("konten")
    <form action="{{ route('soalessay.store') }}?id={{ $jadwal }}" method="post">
        <auth></auth>
        <div class="row justify-content-center">
            <div class="col-8">
                <div class='form-group'>
                    <label for=soal>Soal</label>
                    <textarea rows=10  class='form-control form-control-sm' name='soal' id='soal'></textarea>
                </div>
                
                <input type="hidden" name="_filename" value='' id="fileName">
                <div class="form-group">
                    <button class="btn btn-primary">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </form>   
@endsection
@section("js")
    <script>
        $(document).ready(()=>{
            window.uploadURL = `{{route('api.upload')}}`;
            window.CKE.InitializeEditor('#soal',uploadURL,`{{csrf_token()}}`);
            
        });
    </script>
@endsection