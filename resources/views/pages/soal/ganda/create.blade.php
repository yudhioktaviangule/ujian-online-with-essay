@extends("template.index")
@section("title","Tambah Soal Pilihan Ganda")
@section("tombol")
    <a href="{{ route('soalganda.index') }}?id={{ $jadwal }}" class="btn btn-default btn-sm">Kembali</a>
@endsection
@section("konten")
    <form action="{{ route('soalganda.store') }}?id={{ $jadwal }}" method="post">
        <auth></auth>
        <div class="row justify-content-center">
            <div class="col-8">
                <div class='form-group'>
                    <label for=soal>Soal</label>
                    <textarea rows=10  class='form-control form-control-sm' name='soal' id='soal'></textarea>
                </div>
                
                <div class='form-group'>
                    <label for=soal_a>Jawaban A</label>
                    <input class='form-control form-control-sm' name='soal_a' id='soal_a'>
                </div>
                <div class='form-group'>
                    <label for=soal_b>Jawaban B</label>
                    <input class='form-control form-control-sm' name='soal_b' id='soal_b'>
                </div>
                <div class='form-group'>
                    <label for=soal_c>Jawaban C</label>
                    <input class='form-control form-control-sm' name='soal_c' id='soal_c'>
                </div>
                <div class='form-group'>
                    <label for=soal_d>Jawaban D</label>
                    <input class='form-control form-control-sm' name='soal_d' id='soal_d'>
                </div>
                <div class='form-group'>
                    <label for=kunci>Kunci Jawaban</label>
                    <select class='form-control form-control-sm' name='kunci' id='kunci'>
                        <option value="a">A</option>
                        <option value="b">B</option>
                        <option value="c">C</option>
                        <option value="d">D</option>
                    </select>
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