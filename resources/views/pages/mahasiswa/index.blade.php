@extends("template.index")
@section("title","Mahasiswa")
@section("tombol")
    <a href="{{ route('mhs.create') }}" class="btn btn-primary btn-sm">Tambah Baru Mahasiswa</a>
@endsection
@section("konten")
    <div class="col">
        <table id="table" class="table table-bordered">
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>E-mail</th>
                    <th>Jurusan</th>
                    <th></th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $key => $value):?>
                        <tr>
                            <td>{{ $value->nim }}</td>
                            <td>{{ $value->nama }}</td>
                            <td>{{ $value->email }}</td>
                            <td>{{ $value->jurusan }}</td>
                            <td>
                                <div class="text-right">
                                    <a href="{{ route('mhs.show',['mh'=>$value->id]) }}" class="btn btn-sm btn-success">
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
        var pesan = "{{$pesan}}";
        if(pesan!=false){

            let m = JSON.parse(pesan.replace(/&quot;/g,'"'));
            console.log(m);
            $.ajax({
                url:`{{ route('api.mail') }}`,
                data:{...m},
                type:'GET',
                success:()=>{

                }
            })
        }
    });
</script>
@endsection

