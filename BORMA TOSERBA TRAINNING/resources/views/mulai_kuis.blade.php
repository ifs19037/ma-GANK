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
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="media align-items-center">
                            <!-- <div class="media-left">
                                <h4 class="mb-0"><strong>{{$loop->iteration}}.</strong></h4>
                            </div> -->
                            <div class="media-body">
                                <h4 class="card-title">
                                    {{$soal->soal_isian}}
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <textarea name="jawaban_soal_isian" placeholder="" style="height: 250px; width:100%" required></textarea>
                    </div>
                    <div class="card-footer">
                        <!-- <a href="#"
                            class="btn btn-white">Skip</a>
                        <a href="#"
                            class="btn btn-success float-right">Submit <i class="material-icons btn__icon--right">send</i></a> -->
                            <center>{{$soal_isian->links()}}</center>
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
                    <script>
                        // Check browser support
                        if (typeof(Storage) !== "undefined") {
                        // Store
                        localStorage.setItem("waktu", "{{$kuis->durasi_pengerjaan}}");
                        // Retrieve
                        document.getElementById("waktu").innerHTML = localStorage.getItem("waktu");
                        } else {
                        document.getElementById("waktu").innerHTML = "Sorry, your browser does not support Web Storage...";
                        }
                    </script>
                        <div class="sidebar-heading">Sisa Waktu</div>
                        <div id="waktu" class="countdown sidebar-p-x"
                                data-value="{{$kuis->durasi_pengerjaan}}"
                                data-unit="hour"></div>

                        <div class="sidebar-heading">Soal</div>
                        <ul class="list-group list-group-fit">
                        @foreach($semua_soal_isian as $semua_soal)
                            <li class="list-group-item">
                                <a href="../mulai_kuis/{{$kuis->id_kuis}}?page={{$loop->iteration}}">
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
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <!-- <div class="bgimg">
  <div class="topleft">
    <p>Unknown</p>
  </div>
  <div class="middle">
    <h1>COMING SOON</h1>
    <hr>
<p id="demo"></p>
  </div>
  <div class="bottomleft">
    <p>notfound</p>
  </div>
</div>
        <script>
            date = new Date();
            detik = date.getSeconds();
menit = date.getMinutes();
jam = date.getHours();
hari = date.getDay();
tanggal = date.getDate();
bulan = date.getMonth();
tahun = date.getFullYear();
// document.write(tanggal+"-"+bulan+"-"+tahun+" "+jam+":"+menit+":"+detik);
document.write(Date("Y-m-d"));
// Set the date we're counting down to
// var countDownDate = new Date(tanggal+"-"+bulan+"-"+tahun+" "+jam+":"+menit+":"+detik).getTime();
// var countDownDate = new Date("Y-M-d h:i:sa").getTime();
var countDownDate = new Date("Dec 5, 2022 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script> -->
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
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="media align-items-center">
                            <!-- <div class="media-left">
                                <h4 class="mb-0"><strong>{{$loop->iteration}}.</strong></h4>
                            </div> -->
                            <div class="media-body">
                                <h4 class="card-title">
                                    {{$soal->soal_pilihan_berganda}}
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <input type="radio" id="pilihan" name="pilihan" value="pilihan_a">
                        <label for="pilihan">{{$soal->pilihan_a}}</label><br>
                        <input type="radio" id="pilihan" name="pilihan" value="pilihan_b">
                        <label for="pilihan">{{$soal->pilihan_b}}</label><br>
                        <input type="radio" id="pilihan" name="pilihan" value="pilihan_c">
                        <label for="pilihan">{{$soal->pilihan_c}}</label><br>
                        <input type="radio" id="pilihan" name="pilihan" value="pilihan_d">
                        <label for="pilihan">{{$soal->pilihan_d}}</label><br>
                        <input type="radio" id="pilihan" name="pilihan" value="pilihan_e">
                        <label for="pilihan">{{$soal->pilihan_e}}</label>
                    </div>
                    <div class="card-footer">
                        <!-- <a href="#"
                            class="btn btn-white">Skip</a>
                        <a href="#"
                            class="btn btn-success float-right">Submit <i class="material-icons btn__icon--right">send</i></a> -->
                            <center>{{$soal_pilihan_berganda->links()}}</center>
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
                        @foreach($semua_soal_pilihan_berganda as $semua_soal)
                            <li class="list-group-item">
                                <a href="../mulai_kuis/{{$kuis->id_kuis}}?page={{$loop->iteration}}">
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
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @endif
@endforeach

@endsection