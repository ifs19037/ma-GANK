@extends('layout/main_mulai_kuis')

@section('title', 'Mulai Kuis')

@section('container')

@foreach($kuis as $kuis)
    @if($kuis->tipe_kuis=="isian")
        @foreach($soal_isian as $soal)

<div class="mdk-drawer-layout__content page ">

    <div class="container-fluid page__container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="../kuis">Kuis</a></li>
            <li class="breadcrumb-item active"><a href="../lihat_kuis/{{$kuis->id_kuis}}">Lihat Kuis</a></li>
            <li class="breadcrumb-item active">{{$kuis->judul_kuis}}</li>
        </ol>
        <div class="card-group">
            <div class="card">
                <div class="card-body text-center">
                    @foreach($jumlah_soal_isian as $jumlah_soal_isian)
                        <h4 class="mb-0"><strong>{{$jumlah_soal_isian->jumlah_soal}}</strong></h4>
                    @endforeach
                    <small class="text-muted-light">TOTAL</small>
                </div>
            </div>
            <!-- <div class="card">
                <div class="card-body text-center">
                    <h4 class="text-success mb-0"><strong>3</strong></h4>
                    <small class="text-muted-light">CORECT</small>
                </div>
            </div>
            <div class="card">
                <div class="card-body text-center">
                    <h4 class="text-danger mb-0"><strong>5</strong></h4>
                    <small class="text-muted-light">WRONG</small>
                </div>
            </div>
            <div class="card">
                <div class="card-body text-center">
                    <h4 class="text-primary mb-0"><strong>17</strong></h4>
                    <small class="text-muted-light">LEFT</small>
                </div>
            </div> -->
        </div>

        <div class="card">
            <div class="card-header">
                <div class="media align-items-center">
                    <div class="media-left">
                        <h4 class="mb-0"><strong>{{$loop->iteration}}.</strong></h4>
                    </div>
                    <div class="media-body">
                        <h4 class="card-title">
                            {{$soal->soal_isian}}
                        </h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <!-- <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input id="customCheck01"
                                type="checkbox"
                                class="custom-control-input">
                        <label for="customCheck01"
                                class="custom-control-label">git push</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input id="customCheck02"
                                type="checkbox"
                                class="custom-control-input">
                        <label for="customCheck02"
                                class="custom-control-label">git commit -m "message"</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input id="customCheck03"
                                type="checkbox"
                                class="custom-control-input">
                        <label for="customCheck03"
                                class="custom-control-label">git pull</label>
                    </div>
                </div> -->
                <textarea name="jawaban_soal_isian" placeholder="" style="height: 250px; width:100%" required></textarea>
            </div>
            <div class="card-footer">
                <a href="#"
                    class="btn btn-white">Skip</a>
                <a href="#"
                    class="btn btn-success float-right">Submit <i class="material-icons btn__icon--right">send</i></a>
            </div>
        </div>
    </div>

</div>

<div class="mdk-drawer js-mdk-drawer"
        data-align="end">
    <div class="mdk-drawer__content ">
        <div class="sidebar sidebar-right sidebar-light bg-white o-hidden"
                data-perfect-scrollbar>
            <div class="sidebar-p-y">
                <div class="sidebar-heading">Sisa Waktu</div>
                <div class="countdown sidebar-p-x"
                        data-value="{{$kuis->durasi_pengerjaan}}"
                        data-unit="hour"></div>

                <div class="sidebar-heading">Soal</div>
                <ul class="list-group list-group-fit">
                    <!-- <li class="list-group-item active">
                        <a href="#">
                            <span class="media align-items-center">
                                <span class="media-left">
                                    <span class="btn btn-white btn-circle">#9</span>
                                </span>
                                <span class="media-body">
                                    Github command to deploy comits?
                                </span>
                            </span>
                        </a>
                    </li> -->
                @foreach($semua_soal_isian as $semua_soal)
                    <li class="list-group-item">
                        <a href="#">
                            <span class="media align-items-center">
                                <span class="media-left">
                                    <span class="btn btn-white btn-circle">{{$loop->iteration}}</span>
                                </span>
                                <span class="media-body">
                                    {{$semua_soal->soal_isian}}
                                </span>
                            </span>
                        </a>
                    </li>
                @endforeach
                    <!-- <li class="list-group-item">
                        <a href="#">
                            <span class="media align-items-center">
                                <span class="media-left">
                                    <span class="btn btn-white btn-circle">#11</span>
                                </span>
                                <span class="media-body">
                                    What is the purpose of a branch?
                                </span>
                            </span>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="#">
                            <span class="media align-items-center">
                                <span class="media-left">
                                    <span class="btn btn-white btn-circle">#12</span>
                                </span>
                                <span class="media-body">
                                    Final Question?
                                </span>
                            </span>
                        </a>
                    </li> -->
                </ul>
            </div>
        </div>
    </div>
</div>
@endforeach

    @elseif($kuis->tipe_kuis=="pilihan berganda")
        @foreach($soal_pilihan_berganda as $soal)
        <div class="mdk-drawer-layout__content page ">

    <div class="container-fluid page__container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="../kuis">Kuis</a></li>
            <li class="breadcrumb-item active"><a href="../lihat_kuis/{{$kuis->id_kuis}}">Lihat Kuis</a></li>
            <li class="breadcrumb-item active">{{$kuis->judul_kuis}}</li>
        </ol>
        <div class="card-group">
            <div class="card">
                <div class="card-body text-center">
                    @foreach($jumlah_soal_pilihan_berganda as $jumlah_soal_pilihan_berganda)
                        <h4 class="mb-0"><strong>{{$jumlah_soal_pilihan_berganda->jumlah_soal}}</strong></h4>
                    @endforeach
                    <small class="text-muted-light">TOTAL</small>
                </div>
            </div>
            <!-- <div class="card">
                <div class="card-body text-center">
                    <h4 class="text-success mb-0"><strong>3</strong></h4>
                    <small class="text-muted-light">CORECT</small>
                </div>
            </div>
            <div class="card">
                <div class="card-body text-center">
                    <h4 class="text-danger mb-0"><strong>5</strong></h4>
                    <small class="text-muted-light">WRONG</small>
                </div>
            </div>
            <div class="card">
                <div class="card-body text-center">
                    <h4 class="text-primary mb-0"><strong>17</strong></h4>
                    <small class="text-muted-light">LEFT</small>
                </div>
            </div> -->
        </div>

        <div class="card">
            <div class="card-header">
                <div class="media align-items-center">
                    <div class="media-left">
                        <h4 class="mb-0"><strong>{{$loop->iteration}}.</strong></h4>
                    </div>
                    <div class="media-body">
                        <h4 class="card-title">
                            {{$soal->soal_pilihan_berganda}}
                        </h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <!-- <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input id="customCheck01"
                                type="checkbox"
                                class="custom-control-input">
                        <label for="customCheck01"
                                class="custom-control-label">git push</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input id="customCheck02"
                                type="checkbox"
                                class="custom-control-input">
                        <label for="customCheck02"
                                class="custom-control-label">git commit -m "message"</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input id="customCheck03"
                                type="checkbox"
                                class="custom-control-input">
                        <label for="customCheck03"
                                class="custom-control-label">git pull</label>
                    </div>
                </div> -->
                <!-- <textarea name="jawaban_soal_isian" placeholder="" style="height: 250px; width:100%" required></textarea> -->
                <input type="radio" id="pilihan_a" name="pilihan_a" value="pilihan_a">
                <label for="pilihan_a">{{$soal->pilihan_a}}</label><br>
                <input type="radio" id="pilihan_b" name="pilihan_b" value="pilihan_b">
                <label for="pilihan_b">{{$soal->pilihan_b}}</label><br>
                <input type="radio" id="pilihan_c" name="pilihan_c" value="pilihan_c">
                <label for="pilihan_c">{{$soal->pilihan_c}}</label><br>
                <input type="radio" id="pilihan_d" name="pilihan_d" value="pilihan_d">
                <label for="pilihan_d">{{$soal->pilihan_d}}</label><br>
                <input type="radio" id="pilihan_e" name="pilihan_e" value="pilihan_e">
                <label for="pilihan_e">{{$soal->pilihan_e}}</label>
            </div>
            <div class="card-footer">
                <a href="#"
                    class="btn btn-white">Skip</a>
                <a href="#"
                    class="btn btn-success float-right">Submit <i class="material-icons btn__icon--right">send</i></a>
            </div>
        </div>
    </div>

</div>
        
<div class="mdk-drawer js-mdk-drawer"
        data-align="end">
    <div class="mdk-drawer__content ">
        <div class="sidebar sidebar-right sidebar-light bg-white o-hidden"
                data-perfect-scrollbar>
            <div class="sidebar-p-y">
                <div class="sidebar-heading">Sisa Waktu</div>
                <div class="countdown sidebar-p-x"
                        data-value="{{$kuis->durasi_pengerjaan}}"
                        data-unit="hour"></div>

                <div class="sidebar-heading">Soal</div>
                <ul class="list-group list-group-fit">
                    <!-- <li class="list-group-item active">
                        <a href="#">
                            <span class="media align-items-center">
                                <span class="media-left">
                                    <span class="btn btn-white btn-circle">#9</span>
                                </span>
                                <span class="media-body">
                                    Github command to deploy comits?
                                </span>
                            </span>
                        </a>
                    </li> -->
                @foreach($semua_soal_pilihan_berganda as $semua_soal)
                    <li class="list-group-item">
                        <a href="#">
                            <span class="media align-items-center">
                                <span class="media-left">
                                    <span class="btn btn-white btn-circle">{{$loop->iteration}}</span>
                                </span>
                                <span class="media-body">
                                    {{$semua_soal->soal_pilihan_berganda}}
                                </span>
                            </span>
                        </a>
                    </li>
                @endforeach
                    <!-- <li class="list-group-item">
                        <a href="#">
                            <span class="media align-items-center">
                                <span class="media-left">
                                    <span class="btn btn-white btn-circle">#11</span>
                                </span>
                                <span class="media-body">
                                    What is the purpose of a branch?
                                </span>
                            </span>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="#">
                            <span class="media align-items-center">
                                <span class="media-left">
                                    <span class="btn btn-white btn-circle">#12</span>
                                </span>
                                <span class="media-body">
                                    Final Question?
                                </span>
                            </span>
                        </a>
                    </li> -->
                </ul>
            </div>
        </div>
    </div>
</div>
        @endforeach
    @endif
@endforeach

@endsection