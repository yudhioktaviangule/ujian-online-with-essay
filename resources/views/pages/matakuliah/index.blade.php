@extends("template.index")
@section("title","Matakuliah")
@section("tombol")
    <a href="{{ route('matkul.create') }}" class="btn btn-primary btn-sm">Tambah</a>
@endsection
@section("konten")
    <div class="col">
        <table id="table" class="table table-bordered">
            <thead>
                <tr>
                    <th>Kode Matakuliah</th>
                    <th>Matakuliah</th>
                    <th>Jurusan</th>
                    <th>Aksi</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $key => $value):?>
                        <tr>
                            <td>{{ $value->kode_matkul }}</td>
                            <td>{{ $value->nama_matkul }}</td>
                            <td>{{ $value->jurusan=="SI"?"Sistem Informasi":($value->jurusan=='MI'?"Manajemen Informatika":"Teknik Komputer") }}</td>
                            
                            <td>
                                <div class="text-right">
                                    <a href="{{ route('matkul.show',['matkul'=>$value->id]) }}" class="btn btn-sm btn-success">
                                        <i class="fas fa-eye"></i> Lihat
                                    </a>
                                </div>
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


