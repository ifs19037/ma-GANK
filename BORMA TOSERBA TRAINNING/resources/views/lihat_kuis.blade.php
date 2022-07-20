@extends('layout/main_lihat_kuis')

@section('title', 'Lihat Kuis')

@section('container')

@if(!$id_mulai_kuis)
<div class="mdk-drawer-layout__content page ">
    <div class="container-fluid page__container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="../kuis">Kuis</a></li>
            <li class="breadcrumb-item active">Lihat Kuis</li>
        </ol>
        
        <h1 class="h2">Lihat Kuis</h1>
        
        <div class="card">
            @foreach($kuis as $kuis)
            <div class="card-header">
                <h4 class="card-title">Kuis</h4>
            </div>
            
            <div class="card-body">
                <div class="form-group row" hidden>
                    <div class="col-sm-9">
                        <input name="id_kuis" type="text" class="form-control" value="{{$kuis->id_kuis}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label form-label">Judul Kuis</label>
                    <div class="col-sm-9">
                        {{$kuis->judul_kuis}}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label form-label">Keterangan Singkat</label>
                    <div class="col-sm-9">
                        {{$kuis->keterangan_singkat}}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="course_title" class="col-sm-3 col-form-label form-label">Tipe Kuis</label>
                    <div class="col-sm-9">
                        {{$kuis->tipe_kuis}}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label form-label">Tanggal Kuis</label>
                    <div class="col-sm-9">
                        {{$kuis->tanggal_kuis}}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label form-label">Durasi Pengerjaan</label>
                    <div class="col-sm-9">
                        {{$kuis->durasi_pengerjaan}} Jam
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-sm-9 offset-sm-3">
                        <button type="submit" class="btn btn-success" onclick="MulaiKuis()">Mulai</button>
                    </div>
                    <script>
                        function MulaiKuis() {
                            var txt;
                            if (confirm("Mulai Kuis?")){
                                <?php
                                    // session_start();

                                    // $_SESSION["waktu_mulai"] = date("Y-m-D h:i:sa");
                                ?>

                                // sessionStorage.setItem("waktu_mulai_kuis", new Date().getTime());
                                // Session["waktu_mulai"] = new Date().getTime();
                                // var waktu_mulai_kuis = new Date().getTime();
                                // var countDownDate = new Date(waktu_mulai_kuis + {{$kuis->durasi_pengerjaan}} * 60 * 60 * 1000).getTime();
                                window.location.href = "../memulai_kuis/{{$kuis->id_kuis}}";
                            }
                            else{
                                
                            }
                        }
                    </script>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>

@elseif($id_mulai_kuis)
<div class="mdk-drawer-layout__content page ">
    <div class="container-fluid page__container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="../kuis">Kuis</a></li>
            <li class="breadcrumb-item active">Lihat Kuis</li>
        </ol>
        
        <h1 class="h2">Lihat Kuis</h1>
        
        <div class="card">
            @foreach($kuis as $kuis)
            <div class="card-header">
                <h4 class="card-title">Kuis</h4>
            </div>
            
            <div class="card-body">
                <div class="form-group row" hidden>
                    <div class="col-sm-9">
                        <input name="id_kuis" type="text" class="form-control" value="{{$kuis->id_kuis}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label form-label">Judul Kuis</label>
                    <div class="col-sm-9">
                        {{$kuis->judul_kuis}}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label form-label">Keterangan Singkat</label>
                    <div class="col-sm-9">
                        {{$kuis->keterangan_singkat}}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="course_title" class="col-sm-3 col-form-label form-label">Tipe Kuis</label>
                    <div class="col-sm-9">
                        {{$kuis->tipe_kuis}}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label form-label">Tanggal Kuis</label>
                    <div class="col-sm-9">
                        {{$kuis->tanggal_kuis}}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label form-label">Durasi Pengerjaan</label>
                    <div class="col-sm-9">
                        {{$kuis->durasi_pengerjaan}} Jam
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label form-label">Nilai</label>
                    <div class="col-sm-9">
                        @foreach($hasil_kuis as $hasil_kuis)
                            {{$hasil_kuis->nilai}}
                        @endforeach
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-sm-9 offset-sm-3">
                        <a href="../review/{{$kuis->id_kuis}}"><i>Review</i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>
@endif

@endsection