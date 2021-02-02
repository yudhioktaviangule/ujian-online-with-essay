

@extends("template.index")
@section("title","User")
@section("tombol")
    <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm">Tambah user</a>
@endsection
@section("konten")
    <div class="col">
        <table id="table" class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>E-Mail</th>
                    <th>Level</th>
                    <th>Aksi</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $key => $value):?>
                        <tr>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->email }}</td>
                            <td>{{ strtoupper($value->level) }}</td>
                            <td>
                                <div class="text-right">
                                    @if($value->level==='admin')
                                        Tidak membutuhkan aksi
                                    @else
                                        <a href="{{ route('user.show',['user'=>$value->id]) }}" class="btn btn-sm btn-success">
                                            <i class="fas fa-eye"></i> Lihat
                                        </a>
                                    @endif
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

