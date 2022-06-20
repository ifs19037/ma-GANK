@extends('layout/main_manajemen_kuis')

@section('title', 'Manajemen Kuis')

@section('container')


<div class="mdk-drawer-layout__content page ">
    <div class="container-fluid page__container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
            <li class="breadcrumb-item active">Manajemen Pelatihan</li><li class="breadcrumb-item active">Manajemen Kuis</li>
        </ol>
        <div class="d-flex flex-column flex-sm-row flex-wrap mb-headings align-items-start align-items-sm-center">
            <div class="flex mb-2 mb-sm-0">
                <h1 class="h2">Manajemen Kuis</h1>
            </div>
            <div class="mb-2 mb-sm-0">
                <div class="flex mb-2 mb-sm-0">
                    <a class="btn btn-success" data-toggle="modal" data-target="#TambahKuis" class="btn btn-outline-secondary">Tambah Kuis</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid page__container">
        <div class="card">
            <div class="card-body">
                <form action="#" method="GET">
                    <div class="search-form search-form--light mb-3">
                        <input type="text" class="form-control search" placeholder="Search">
                        <button class="btn" type="button" role="button"><i class="material-icons">search</i></button>
                    </div>
                </form>
                <div class="row">
                    @foreach($kuis as $kuis)
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column flex-sm-row">
                                    <a href="./detail_kuis/{{$kuis->id_kuis}}" class="avatar avatar-lg avatar-4by3 mb-3 w-xs-plus-down-100 mr-sm-3">
                                        <img src="../asset/u_file/foto_kuis/{{$kuis->foto_kuis}}" alt="Card image cap" class="avatar-img rounded">
                                    </a>
                                    <div class="flex" style="min-width: 200px;">
                                        <!-- <h5 class="card-title text-base m-0"><a href="instructor-course-edit.html"><strong>Learn Vue.js</strong></a></h5> -->
                                        <h4 class="card-title mb-1"><a href="./detail_kuis/{{$kuis->id_kuis}}">{{$kuis->judul_kuis}}</a></h4>
                                        <p class="text-black-70">{{$kuis->keterangan_singkat}}</p>
                                        <div class="d-flex align-items-end">
                                            <div class="d-flex flex flex-column mr-3">
                                                <div class="d-flex align-items-center py-1 border-bottom">
                                                    <small class="text-black-70 mr-2">{{$kuis->tanggal_kuis}}</small>
                                                    <small class="text-muted mr-2"> | </small>
                                                    <small class="text-black-50"> {{$kuis->durasi_pengerjaan}} JAM</small>
                                                </div>
                                                <div class="d-flex align-items-center py-1">
                                                    <!-- <small class="text-muted mr-2">{{$kuis->durasi_pengerjaan}} JAM</small> -->
                                                    <span class="badge badge-dark ml-2">{{$kuis->divisi}}</span>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card__options dropdown right-0 pr-2">
                                <a href="#" class="dropdown-toggle text-muted" data-caret="false" data-toggle="dropdown">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <!-- <a class="dropdown-item" href="./detail_kuis/{{$kuis->id_kuis}}">Edit course</a>
                                    <div class="dropdown-divider"></div> -->
                                    <a class="dropdown-item text-danger" href="./hapus_kuis/{{$kuis->id_kuis}}">Hapus Kuis</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection