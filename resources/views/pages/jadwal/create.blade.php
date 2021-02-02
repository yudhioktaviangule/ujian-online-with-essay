@extends("template.index")
@section("title","Jadwal")
@section("tombol")
    <a href="{{ route('jadwal.index') }}" class="btn btn-default btn-sm">Kembali</a>
   
@endsection
@section("konten")
    <form action="{{ route('jadwal.store') }}" method="post">
        <auth></auth>
        <div class="row justify-content-center">
            <div class="col-6">
                <div class='form-group'>
                    <label for=waktu>Waktu Ujian(Menit)</label>
                    <input required type='number' max=120 class='form-control form-control-sm' name='waktu' id='waktu'>
                </div>
                <div class='form-group'>
                    <label for=tanggal>Tanggal</label>
                    <input required type='date' max=120 class='form-control form-control-sm' name='tanggal' id='tanggal'>
                </div>
                <div class='form-group'>
                    <label for=matkul_id>Matakuliah</label>
                    <select required name="matkul_id" id="matkul_id" class="form-control form-control-sm">
                        @foreach($matkul as $key => $value)
                            <option value="{{ $value->id }}">{{ $value->nama_matkul }}</option>
                        @endforeach;
                    </select>
                </div>
                <div class='form-group'>
                    <label for=dosen_id>Dosen</label>
                    <select required name="dosen_id" id="dosen_id" class="form-control form-control-sm">
                        @foreach($dosen as $key => $value)
                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                        @endforeach;
                    </select>
                </div>
                <div class='form-group'>
                    <label for=jenis_ujian>Jenis Ujian</label>
                    <select required name="jenis_ujian" id="jenis_ujian" class="form-control form-control-sm">
                        <option value="UTS">UTS</option>
                        <option value="UAS">UAS</option>
                    </select>
                </div>
                <div class='form-group'>
                    <label for=kelas_id>Kelas</label>
                    <select required name="kelas_id" id="kelas_id" class="form-control form-control-sm">
                        @foreach($kelas as $key => $value)
                            <option value="{{ $value->id }}">{{ $value->kode_kelas }}</option>
                        @endforeach;
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">
                        Buat Jadwal
                    </button>
                </div>
            </div>
        </div>
    </form>   
    

@endsection
