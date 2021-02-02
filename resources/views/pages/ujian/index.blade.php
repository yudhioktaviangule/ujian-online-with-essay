
@extends("template.index")
@section("title","Ujian")
@section("tombol")
    <span title='Waktu yang tersisa'>
        <i class="fas fa-clock"></i>
        <span id="menit"></span>:<span id="detik"></span>
    </span>
@endsection
@section("konten")
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-5">
            <table style='width:100%'>
                <tr>
                    <td>Matakuliah</td>
                    <td>: {{ $jadwal->getMatakuliah()->nama_matkul }}</td>
                </tr>
                <tr>
                    <td>Tanggal Pelaksanaan Ujian</td>
                    <td>: {{$jadwal->tanggal}}</td>
                </tr>
                <tr>
                    <td>Nama Dosen</td>
                    <td>: {{ $jadwal->getDosen()->name }}</td>
                </tr>
                <tr>
                    <td>Waktu</td>
                    <td>: {{ $jadwal->waktu }} Menit</td>
                </tr>
            </table>
        </div>
        
    </div>
    <br>
    <form id='actd' action="{{route('ujian.store')}}?reg={{$regid}}" method='post' >
        <auth></auth>
        @if(count($ganda)>0)
            <p>Pilihan Ganda:</p>
            
            <ol>
                @foreach($ganda as $key => $value)
                    <li>
                        
                        {!!$value->soal!!}
                        <input type="radio" name='jawaban["ganda"][{{ $value->id }}]' value='a' > {{$value->soal_a}}<br>
                        <input type="radio" name='jawaban["ganda"][{{ $value->id }}]' value='b' > {{$value->soal_b}}<br>
                        <input type="radio" name='jawaban["ganda"][{{ $value->id }}]' value='c' > {{$value->soal_c}}<br>
                        <input type="radio" name='jawaban["ganda"][{{ $value->id }}]' value='d' > {{$value->soal_d}}<br>
                    </li>
                @endforeach
            </ol>
        @endif
        @if(count($essay)>0)
            <p>Essay:</p>
            
            <ol>
                @foreach($essay as $key => $value)
                    <li>
                        {!!$value->soal!!}
                        <div class='form-group'>
                            <label for=jawaban>Jawaban:</label>
                            <textarea row=10 class='form-control form-control-sm' name='jawaban["essay"][{{$value->id}}]'  id='jawaban'></textarea>
                        </div>
                    </li>
                @endforeach
            </ol>
        @endif
        <div class="form-group">
            <button class="btn btn-primary">Selesai</button>
        </div>
    </form>
</div>
@endsection
@section("js")
    <script>
        $(document).ready(()=>{
            let waktu = parseInt("{{$selisih}}");
            let interv = setInterval(() => {
                let menit = Math.floor(waktu/60);
                let detik = waktu%60;
                $("#menit").html(menit<10?`0${menit}`:menit)
                $("#detik").html(detik<10?`0${detik}`:detik)
                waktu--;
                if(waktu==0){
                    clearInterval(interv);
                    $("#actd").submit();
                }
            }, 1000);


        });
    </script>
@endsection