

@extends("template.index")
@section("title","Kelas")
@section("tombol")
    <a href="{{ route('kelas.create') }}" class="btn btn-primary btn-sm">Tambah Kelas</a>
@endsection
@section("konten")
    <div class="col">
        <table id="table" class="table table-bordered">
            <thead>
                <tr>
                    <th>Kode Kelas</th>
                    <th>Jurusan</th>
                    <th>Aksi</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $key => $value):?>
                        <tr>
                            <td>{{ $value->kode_kelas }}</td>
                            <td>{{ $value->jurusan=="SI"?"Sistem Informasi":($value->jurusan=='MI'?"Manajemen Informatika":"Teknik Komputer") }}</td>
                            
                            <td>
                                <div class="text-right">
                                    <a href="{{ route('kelas.show',['kela'=>$value->id]) }}" class="btn btn-sm btn-success">
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

