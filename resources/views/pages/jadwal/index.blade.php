

@extends("template.index")
@section("title","Jadwal")
@section("tombol")
    <a href="{{ route('jadwal.create') }}" class="btn btn-primary btn-sm">Buat Jadwal</a>
@endsection
@section("konten")
    <div class="col">
        <table id="table" class="table table-bordered">
            <thead>
                <tr>
                    <th>Tanggal Ujian</th>
                    <th>Kelas</th>
                    <th>Matakuliah</th>
                    <th>Jenis Ujian</th>
                    <th>Waktu(Menit)</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $key => $value):?>
                        <tr>
                            <td>{{ $value->tanggal }}</td>
                            <td>{{ $value->getMatakuliah()->nama_matkul }}</td>
                            <td>{{ $value->getKelas()->kode_kelas}}</td>
                            <td>{{ $value->jenis_ujian}}</td>
                            <td>{{ $value->waktu }}</td>
                            
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

