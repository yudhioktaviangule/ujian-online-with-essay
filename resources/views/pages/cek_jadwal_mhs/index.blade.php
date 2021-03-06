

@extends("template.index")
@section("title","Jadwal Ujian")
@section("konten")
    <div class="col">
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
                    <th>UTS/UAS</th>
                    <th>Waktu(Menit)</th>
                    <th>Aksi</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $key => $value):?>
                        <tr>
                            <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d',$value->tanggal)->format('d M Y') }}</td>
                            <td>{{ $value->getKelas()->kode_kelas}}</td>
                            <td>{{ $value->getMatakuliah()->nama_matkul }}</td>
                            <td>{{ $value->getMatakuliah()->jenis_ujian }}</td>
                            <td>{{ $value->waktu }}</td>
                            <td>
                                <a href="{{ route('checkin',['mahasiswa_id'=>Auth::user()->mahasiswa_id,'jadwal_id'=>$value->id]) }}" class="btn btn-info btn-sm">Mulai Ujian</a>
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

