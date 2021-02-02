

@extends("template.index")
@section("title","Soal")
@section("konten")
    <div class="col">
        <p>Pilih Jadwal</p>
        @if($errors->any())
            <p>
            <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                  {{$errors->first()}}
            </div>
            </p>

        @endif
        <table id="table" class="table table-bordered">
            <thead>
                <tr>
                    <th>Tanggal Ujian</th>
                    <th>Kelas</th>
                    <th>Matakuliah</th>
                    <th>Waktu(Menit)</th>
                    <th>Aksi</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $key => $value):?>
                        <tr>
                            <td>{{ $value->tanggal }}</td>
                            <td>{{ $value->getMatakuliah()->nama_matkul }}</td>
                            <td>{{ $value->getKelas()->kode_kelas}}</td>
                            <td>{{ $value->waktu }}</td>
                            <td>
                                <a href="{{route('soalganda.index')}}?id={{$value->id}}" class="btn btn-primary btn-sm">
                                    Buat Soal Pilihan Ganda
                                </a>
                                <a href="{{route('soalessay.index')}}?id={{$value->id}}" class="btn btn-success btn-sm">
                                    Buat Soal Essay
                                </a>
                            </td>
                            
                        </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
@endsection

@section("js")
<script>
    $(document).ready(()=>{
        $("#table").DataTable();

    });
</script>
@endsection

