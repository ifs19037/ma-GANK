@extends('layout/main_manajemen_data')

@section('title', 'Manajemen Data Karyawan')

@section('container')
<div class="mdk-drawer-layout__content page ">
    <div class="container-fluid page__container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
            <li class="breadcrumb-item active">Manajemen Karyawan</li><li class="breadcrumb-item active">Manajemen Data</li>
        </ol>
        <div class="d-flex flex-column flex-sm-row flex-wrap mb-headings align-items-start align-items-sm-center">
            <div class="flex mb-2 mb-sm-0">
                <h1 class="h2">Manajemen Data</h1>
            </div>
            <div class="mb-2 mb-sm-0">
                <div class="flex mb-2 mb-sm-0">
                    <a href="./manajemen_data/export_excel" target="_blank" class="btn btn-success" data-target="">Export Data</a>
                    <a class="btn btn-success" data-toggle="modal" data-target="#ImportExcel" class="btn btn-outline-secondary">Import Data</a> 
                    <a style="color:white">|</a>
                    <a href="./tambah_data" class="btn btn-success">Tambah Data</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid page__container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    
                    <div class="col-lg-12">
                        <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values='["js-lists-values-nama-karyawan",
                        "js-lists-values-nik", "js-lists-values-jabatan", "js-lists-values-divisi", "js-lists-values-lokasi"]'>
                            <form action="#" method="GET">
                                <div class="search-form search-form--light mb-3">
                                    <input type="text" class="form-control search" placeholder="Search">
                                    <!-- <button class="btn" type="button" role="button"><i class="material-icons">search</i></button> -->
                                </div>
                            </form>

                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th style="text-transform: uppercase; font-size:16px">NO</th>
                                        <th>
                                            <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-nama-karyawan" style="text-transform: uppercase; font-size:16px">NAMA KARYAWAN</a>
                                        </th>
                                        <th style="width: 25px;">
                                            <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-nik" style="text-transform: uppercase; font-size:16px">NIP</a>
                                        </th>
                                        <th>
                                            <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-jabatan" style="text-transform: uppercase; font-size:16px">JABATAN</a>
                                        </th>
                                        <th>
                                            <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-divisi" style="text-transform: uppercase; font-size:16px">DIVISI</a>
                                        </th>
                                        <th>
                                            <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-lokasi" style="text-transform: uppercase; font-size:16px">LOKASI</a>
                                        </th>
                                        <th></th>
                                    </tr>
                                </thead>
                                
                                <tbody class="list" id="search">
                                @foreach($data_karyawan as $karyawan)
                                    <tr style="text-transform: uppercase; font-size:14px">
                                        <td>{{$loop->iteration }}</td>
                                        <td>
                                            <span class="js-lists-values-nama-karyawan">{{$karyawan->nama_karyawan}}</span>
                                        </td>
                                        <td style="width: 25px;">
                                            <span class="js-lists-values-nik">{{$karyawan->nik_karyawan}}</span>
                                        </td>
                                        <td>
                                            <span class="js-lists-values-jabatan">{{$karyawan->jabatan}}</span>
                                        </td>
                                        <td>
                                            <span class="js-lists-values-divisi">{{$karyawan->divisi}}</span>
                                        </td>
                                        <td>
                                            <span class="js-lists-values-lokasi">{{$karyawan->lokasi}}</span>
                                        </td>
                                        <td style="width: 10px;">
                                            <a href="#" class="dropdown-toggle text-muted" data-caret="false" data-toggle="dropdown">
                                                <i class="material-icons">more_vert</i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="./detail_karyawan/{{$karyawan->nik_karyawan  }}">Detail</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item text-danger" href="./hapus_data_karyawan/{{$karyawan->nik_karyawan}}">Hapus Data</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection