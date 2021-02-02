@extends("template.index")
@section("title","Penilaian Peserta")
@section("tombol")
    <a href="{{ route('peserta.index') }}?jadwal={{$jadwal->id}}" class="btn btn-default btn-sm">Kembali</a>
   
@endsection
@section("konten")
    <p>
        <table>
            
        </table>
    </p>
    <form action="{{ route('peserta.store') }}" method="post">
        <input type="hidden" value="{{$regUjian->id}}" name='reg_ujian_id'>
        <input type="hidden" value="{{$nganda}}" name='nilai_ganda'>
        <auth></auth>
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="form-group">
                    <table style='width:100%'>
                        <tr>
                            <td style='width:150px'>NIM</td>
                            <td>: {{ $regUjian->getMahasiswa()->nim }}</td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>: {{ $regUjian->getMahasiswa()->nama }}</td>
                            
                        </tr>
                        <tr>
                            <td>Matakuliah</td>
                            <td>: {{ $jadwal->getMatakuliah()->nama_matkul }}</td>
                            
                        </tr>
                        
                    </table>
                </div>
                

            </div>

        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>No.</th>
                    <th>Soal dan jawaban</th>
                    
                    <th>Penilaian</th>
                    
                </tr>
                @foreach($data as $key => $value)
                    <tr>
                        <td>{{$key+1}}.</td>
                        <td>
                            <p><strong>Soal:</strong></p>
                            {!!$value->getSoal()->soal!!}
                            <br>
                            <p><strong>Jawaban:</strong></p>
                            <pre>
    {!!$value->jawaban!!}
                            </pre>
                        </td>
                        
                        <td>
                            <div class="form-group">
                                <select fi='o' onchange="cekJumlah({{$value->id}})" name="nilai[{{$value->id}}]" id="sel{{$value->id}}" class="form-control">
                                    <option value="">Masukkan Bobot Nilai</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </td>
                        
                    </tr>
                @endforeach
                <tr>
                    <td colspan="2">Nilai Ujian Pilihan Ganda</td>
                    <td>
                        <div class="text-right">
                            {{ $nganda }}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">Nilai Ujian Essay</td>
                    <td>
                        <div class="text-right" id='essNilai'>
                            
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">Nilai Keseluruhan</td>
                    <td>
                        <div class="text-right" id='sNilai'>
                            
                        </div>
                    </td>
                </tr>
            </table>    
            <div class="form-group text-right">
                <button class="btn btn-primary">Kirim</button>
            </div>                    
        </div>
    </form>   
    

@endsection
@section("js")
    <script>
        $(document).ready(()=>{
            let soal_count={{$soal_count}};
            soal_count*=5;
            window.cekJumlah = ()=>{
                let jumlah = 0;
                $.each($("select[fi='o']"),(i,v)=>{
                    let nkecil = $(v).val();
                    jumlah+=nkecil;
                })
                let nilai = (jumlah/soal_count)*100;
                let snilai = ({{$nganda}}+nilai)/2;
                $("#essNilai").html(nilai);
                $("#sNilai").html(snilai);
            }

        });
    </script>
@endsection