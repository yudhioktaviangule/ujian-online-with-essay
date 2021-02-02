

@extends("template.index")
@section("title","Penilaian")
@section("tombol")
    <a target='_blank' href="{{route('peserta.show',['pesertum'=>$jadwal])}}" class="btn btn-sm btn-success">
        Cetak Rekap Nilai
    </a>
@endsection
@section("konten")
    <div class="col">
        <p>List Peserta Ujian</p>
        <table id="table" class="table table-bordered">
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Nilai</th>
                    <th>Aksi</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $key => $value):?>
                        <tr>
                            <td>{{ $value->getMahasiswa()->nim }}</td>
                            <td>{{ $value->getMahasiswa()->nama }}</td>
                            <td>{{ $value->getNilaiEssay() == NULL ? 0 : $value->getNilaiEssay()->nilai }}</td>
                            <td>
                                
                                <a href="{{route('peserta.create')}}?jadwal={{ $jadwal }}&ujian_reg={{ $value->id }}" class="btn btn-sm bg-purple">
                                    Penilaian
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

