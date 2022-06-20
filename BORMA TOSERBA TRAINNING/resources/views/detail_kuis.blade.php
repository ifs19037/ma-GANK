@extends('layout/main_detail_kuis')

@section('title', 'Detail Kuis')

@section('container')
<div class="mdk-drawer-layout__content page ">
    <div class="container-fluid page__container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">Manajemen Pelatihan</a></li><li class="breadcrumb-item"><a href="../manajemen_kuis">Manajemen Kuis</a></li>
            <li class="breadcrumb-item active">Detail Kuis</li>
        </ol>
        <h1 class="h2">Detail Kuis</h1>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Kuis</h4>
            </div>
            
            @foreach($kuis as $kuis)
            <div class="card-body">
                <form action="../PostEditKuis" method="post">
                @csrf
                    <div class="form-group row" hidden>
                        <div class="col-sm-9">
                            <input name="id_kuis" type="text" class="form-control" value="{{$kuis->id_kuis}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label form-label">Judul Kuis</label>
                        <div class="col-sm-9">
                            <input name="judul_kuis" type="text" class="form-control" value="{{$kuis->judul_kuis}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label form-label">Keterangan Singkat</label>
                        <div class="col-sm-9">
                            <input name="keterangan_singkat" type="text" class="form-control" value="{{$kuis->keterangan_singkat}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label form-label">Foto Kuis</label>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <!--Foto Lama-->
                                <input type="text" name="foto_kuis_lama" class="form-control" value="{{$kuis->foto_kuis}}" required hidden>
                                <!--Foto Baru-->
                                <input name="foto_kuis" type="file" id="foto_kuis" class="custom-file-input" accept="image/*">
                                <label for="foto_kuis" class="custom-file-label">{{$kuis->foto_kuis}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label form-label">Tanggal Kuis</label>
                        <div class="col-sm-9">
                            <input name="tanggal_kuis" type="date" class="form-control" value="{{$kuis->tanggal_kuis}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label form-label">Durasi Pengerjaan</label>
                        <div class="col-sm-9">
                            <input name="durasi_pengerjaan" type="text" class="form-control" maxlength="3" style="max-width:50px" onkeypress="return hanyaAngka(event)" value="{{$kuis->durasi_pengerjaan}}" required>
                        </div>
                    </div>
                    <script>
                        function hanyaAngka(event) {
                            var angka = (event.which) ? event.which : event.keyCode
                            if ((angka < 46 || angka > 57) )
                                return false;
                            return true;
                        }
                    </script>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label form-label">Divisi</label>
                        <div class="col-sm-9">
                            <select  name="divisi" class="custom-select form-control" required>
                                <option selected value="{{$kuis->divisi}}" hidden>{{$kuis->divisi}}</option>
                                @foreach($divisi as $divisi)
                                    <option value="{{$divisi->nama_divisi}}">{{$divisi->nama_divisi}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-sm-9 offset-sm-3">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
            @endforeach
        </div>

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Soal</h4>
            </div>
            <div class="card-body">
                    
            </div>
        </div>

    </div>
</div>
@endsection