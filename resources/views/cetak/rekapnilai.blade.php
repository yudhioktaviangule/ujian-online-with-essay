<table style='width:50%'>
    <tr>
        <td colspan="2">
            <strong>
                Rekap Nilai Mahasiswa
            </strong>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <strong>
                STMIK PROFESIONAL
            </strong>
        </td>
    </tr>
    <tr>
        <th style='text-align:left'>Matakuliah</th>
        <th style='text-align:left'>: {{$jadwal->getMatakuliah()->nama_matkul}}</th>
    </tr>
    <tr>
        <th style='text-align:left'>Kelas`</th>
        <th style='text-align:left'>: {{$jadwal->getKelas()->kode_kelas}}</th>
    </tr>
    <tr>
        <th style='text-align:left'>Tanggal Ujian</th>
        <th style='text-align:left'>: {{\Carbon\Carbon::parse($jadwal->tanggal)->format('d-m-Y')}}</th>
    </tr>
    <tr>
        <th style='text-align:left'>Dosen</th>
        <th style='text-align:left'>: {{$jadwal->getDosen()->name}}</th>
    </tr>
</table>
<table style = "width:100%" border=1 cellspacing=0 cellpadding=0>
    <tr>
        <th>NIM</th>
        <th>Nama</th>
        <th>Nilai</th>
    </tr>
    @foreach($nilai as $key => $value)
        <tr>
            <td>{{$value->getMahasiswa()->nim}}</td>
            <td>{{$value->getMahasiswa()->nama}}</td>
            <td>{{$value->getNilaiEssay()->nilai}}</td>
        </tr>
    @endforeach
</table>
<table style='width:100%;margin-top:10px'>
    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th style='width:20em'>Makassar,{{ date('d-M-Y') }}</th>
    </tr>
    <tr>
        <th>&nbsp;</th>
        <th></th>
        <th></th>
        <th>Dosen</th>
    </tr>
    <tr>
        <th>&nbsp;</th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    <tr>
        <th>&nbsp;</th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th style='width:20em'>{{$jadwal->getDosen()->name}}</th>
    </tr>
</table>

<script>
    window.print();
</script>