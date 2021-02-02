

@extends("template.index")
@section("title","Soal Essay")
@section("tombol")
    <a href="{{ route('soalessay.create') }}?id={{$jadwal->id}}" class="btn btn-primary btn-sm">Tambah</a>
@endsection

@section("konten")
    <div class="col">
        <p>
            <div class="row justify-content-center">
                <div class="col-6">
                    <table style='width:100%'>
                        <tr>
                            <td>Tanggal</td>
                            <td>: {{ \Carbon\Carbon::createFromFormat('Y-m-d',$jadwal->tanggal)->format("d M Y") }}</td>
                        </tr>
                        <tr>
                            <td>Matakuliah</td>
                            <td>: {{ $jadwal->getMatakuliah()->nama_matkul }}</td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td>: {{ $jadwal->getKelas()->kode_kelas }}</td>
                        </tr>
                        <tr>
                            <td>Dosen</td>
                            <td>: {{ $jadwal->getDosen()->name }}</td>
                        </tr>
                        <tr>
                            <td>Waktu</td>
                            <td>: {{ $jadwal->waktu }} Menit</td>
                        </tr>
                        
                        
                    </table>
                </div>
                
            </div>
        </p>
        <table id="table" class="table table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Soal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($soal as $key => $value):?>
                        <tr>
                            <td>{{ $value->nomor }}</td>
                            <td>{!! $value->soal !!}</td>
                            
                            <td>
                                <a href="#" onclick='hapusNio(`{{route("soalessay.destroy",["soalessay"=>$value->id])}}`)' class="btn btn-danger">
                                    Hapus Soal
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

