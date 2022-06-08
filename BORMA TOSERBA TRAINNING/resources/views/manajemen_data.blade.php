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
                                        <a href="./manajemen_data/export_excel" class="btn btn-success" data-toggle="modal" data-target="">Export Data</a>
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
                                            <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]'>
                                                <div class="search-form search-form--light mb-3">
                                                    <input type="text" class="form-control search" placeholder="Search">
                                                    <button class="btn" type="button" role="button"><i class="material-icons">search</i></button>
                                                </div>

                                                <table class="table mb-0">
                                                    <thead>
                                                        <tr>
                                                        <th>NO</th>
                                                            <th>
                                                                <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-employee-name">Nama</a>
                                                            </th>
                                                            <th style="width: 25px;">NIK</th>
                                                            <th>Jabatan</th>
                                                            <th>Divisi</th>
                                                            <th>Lokasi</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    
                                                    <tbody class="list" id="search">
                                                    @foreach($data_karyawan as $karyawan)
                                                        <tr>
                                                            <td>{{$loop->iteration }}</td>
                                                            <td>
                                                                <span class="js-lists-values-employee-name">{{$karyawan->nama_karyawan}}</span>
                                                            </td>
                                                            <td style="width: 25px;">{{$karyawan->nik}}</td>
                                                            <td>{{$karyawan->jabatan}}</td>
                                                            <td>{{$karyawan->divisi}}</td>
                                                            <td>{{$karyawan->lokasi}}</td>
                                                            <td>
                                                                <a href="#" class="dropdown-toggle text-muted" data-caret="false" data-toggle="dropdown">
                                                                    <i class="material-icons">more_vert</i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="./detail_karyawan/{{$karyawan->id_data_karyawan  }}">Detail</a>
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