@extends('template.index')
@section("title","Beranda")

@section("konten")
    <div class="row">
        
            <div class="col-4">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$mahasiswa}}</h3>
                        <p>Mahasiswa</p>
                    </div>
                    <div class="icon">
                        
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-4">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{$dosen}}</h3>
                        <p>Dosen</p>
                    </div>
                    <div class="icon">
                        
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-4">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$kelas}}</h3>
                        <p>Kelas</p>
                    </div>
                    <div class="icon">
                        
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        
    </div>
@endsection