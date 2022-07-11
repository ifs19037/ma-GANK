@extends('layout/main_mulai_kuis')

@section('title', 'Mulai Kuis')

@section('container')

@foreach($mulai_kuis as $mulai_kuis)
    <?php
        $waktu_selesai = $mulai_kuis->waktu_selesai
        // $sisa_waktu = $mulai_kuis->waktu_selesai - date("Y-m-d H:i:s");
    ?>
@endforeach

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
                    @foreach($mulai_kuis as $mulai_kuis)
                        <?php
                            $waktu_selesai = $mulai_kuis->waktu_selesai
                            // $sisa_waktu = $mulai_kuis->waktu_selesai - date("Y-m-d H:i:s");
                        ?>
                    @endforeach
                    <script>
                        <?php date_default_timezone_set('Asia/Jakarta'); ?>
                        // Update the count down every 1 second
                        var x = setInterval(function() {
                            // Get today's date and time
                            var now = new Date().getTime();
                            var waktu_mulai_kuis = sessionStorage.getItem("waktu_mulai_kuis");

                            var waktu_mulai_kuis = new Date().getTime();
                            var countDownDate = new Date(new Date("<?php echo $waktu_selesai ?>")).getTime();

                            // Find the distance between now and the count down date
                            var distance = countDownDate - now;

                            // Time calculations for days, hours, minutes and seconds
                            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                            // Display the result in the element with id="demo"
                            document.getElementById("durasi_pengerjaan").innerHTML = hours + " Jam &nbsp;&nbsp;"
                            + minutes + " Menit &nbsp;&nbsp;" + seconds + " Detik &nbsp;&nbsp;";

                            // If the count down is finished, write some text
                            if (distance < 0) {
                                    clearInterval(x);
                                    document.getElementById("durasi_pengerjaan").innerHTML = "EXPIRED";
                                }
                        }, 1000);
                    </script>
                    <div class="card">
                        <div class="card-body text-center">
                            <h4 class="mb-0" id="durasi_pengerjaan"></h4>
                            <small class="text-muted-light">SISA WAKTU</small>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body text-center">
                            @foreach($jumlah_soal_isian as $jumlah_soal_isian)
                                <h4 class="mb-0"><strong>{{$jumlah_soal_isian->jumlah_soal}}</strong></h4>
                            @endforeach
                            <small class="text-muted-light">TOTAL SOAL</small>
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
                        // if (typeof(Storage) !== "undefined") {
                        // // Store
                        // localStorage.setItem("waktu", "{{$kuis->durasi_pengerjaan}}");
                        // // Retrieve
                        // document.getElementById("waktu").innerHTML = localStorage.getItem("waktu");
                        // } else {
                        // document.getElementById("waktu").innerHTML = "Sorry, your browser does not support Web Storage...";
                        // }
                    </script>
                        <!-- <div class="sidebar-heading">Sisa Waktu</div>x` -->
                        
                        <!-- <div id="waktu" class="countdown sidebar-p-x"
                                data-value="{{$kuis->durasi_pengerjaan}}"
                                data-unit="hour"></div> -->
                                

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
                    <script>
                        <?php date_default_timezone_set('Asia/Jakarta'); ?>
                        // Update the count down every 1 second
                        var x = setInterval(function() {
                            // Get today's date and time
                            var now = new Date().getTime();
                            var waktu_mulai_kuis = sessionStorage.getItem("waktu_mulai_kuis");

                            var waktu_mulai_kuis = new Date().getTime();
                            var countDownDate = new Date(new Date("<?php echo $waktu_selesai ?>")).getTime();

                            // Find the distance between now and the count down date
                            var distance = countDownDate - now;

                            // Time calculations for days, hours, minutes and seconds
                            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                            // Display the result in the element with id="demo"
                            document.getElementById("durasi_pengerjaan").innerHTML = hours + " Jam &nbsp;&nbsp;"
                            + minutes + " Menit &nbsp;&nbsp;" + seconds + " Detik &nbsp;&nbsp;";

                            // If the count down is finished, write some text
                            if (distance < 0) {
                                    clearInterval(x);
                                    document.getElementById("durasi_pengerjaan").innerHTML = "EXPIRED";
                                }
                        }, 1000);
                    </script>
                    <div class="card">
                        <div class="card-body text-center">
                            <h4 class="mb-0" id="durasi_pengerjaan"></h4>
                            <small class="text-muted-light">SISA WAKTU</small>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body text-center">
                            @foreach($jumlah_soal_pilihan_berganda as $jumlah_soal_pilihan_berganda)
                                <h4 class="mb-0"><strong>{{$jumlah_soal_pilihan_berganda->jumlah_soal}}</strong></h4>
                            @endforeach
                            <small class="text-muted-light">TOTAL SOAL</small>
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
                        <form action="../jawab_pilihan_berganda/{{$soal->id_soal_pilihan_berganda}}" id="FormJawab" method="get" enctype="multipart/form-data">
                        <input type="text" name="id_mulai_kuis" value="{{$mulai_kuis->id_mulai_kuis}}" hidden></input>
                        @foreach($jawab_id_soal_pilihan_berganda as $jawab_id_soal_pilihan_berganda)
                        @endforeach
                        @foreach($jawaban as $jawaban)
                        @endforeach
                        
                        @if(!$jawab_kuis_pilihan_berganda)
                                <input type="radio" id="pilihan_a" name="pilihan" value="A" onclick="jawab()">
                                <label for="pilihan_a">{{$soal->pilihan_a}}</label><br>
                                <input type="radio" id="pilihan_b" name="pilihan" value="B" onclick="jawab()">
                                <label for="pilihan_b">{{$soal->pilihan_b}}</label><br>
                                <input type="radio" id="pilihan_c" name="pilihan" value="C" onclick="jawab()">
                                <label for="pilihan_c">{{$soal->pilihan_c}}</label><br>
                                <input type="radio" id="pilihan_d" name="pilihan" value="D" onclick="jawab()">
                                <label for="pilihan_d">{{$soal->pilihan_d}}</label><br>
                                <input type="radio" id="pilihan_e" name="pilihan" value="E" onclick="jawab()">
                                <label for="pilihan_e">{{$soal->pilihan_e}}</label>
                        @elseif($jawab_kuis_pilihan_berganda)
                            @if($soal->id_soal_pilihan_berganda == $jawab_id_soal_pilihan_berganda->id_soal_pilihan_berganda)
                                @if($jawaban->jawaban == "A")
                                <input type="radio" id="pilihan_a" name="pilihan" value="A" onclick="jawab()" checked="checked">
                                <label for="pilihan_a">{{$soal->pilihan_a}}</label><br>
                                @else
                                <input type="radio" id="pilihan_a" name="pilihan" value="A" onclick="jawab()">
                                <label for="pilihan_a">{{$soal->pilihan_a}}</label><br>
                                @endif

                                @if($jawaban->jawaban == "B")
                                <input type="radio" id="pilihan_b" name="pilihan" value="B" onclick="jawab()" checked="checked">
                                <label for="pilihan_b">{{$soal->pilihan_b}}</label><br>                            
                                @else
                                <input type="radio" id="pilihan_b" name="pilihan" value="B" onclick="jawab()">
                                <label for="pilihan_b">{{$soal->pilihan_b}}</label><br>      
                                @endif

                                @if($jawaban->jawaban == "C")
                                <input type="radio" id="pilihan_c" name="pilihan" value="C" onclick="jawab()" checked="checked">
                                <label for="pilihan_c">{{$soal->pilihan_c}}</label><br>
                                @else
                                <input type="radio" id="pilihan_c" name="pilihan" value="C" onclick="jawab()">
                                <label for="pilihan_c">{{$soal->pilihan_c}}</label><br>
                                @endif

                                @if($jawaban->jawaban == "D")
                                <input type="radio" id="pilihan_d" name="pilihan" value="D" onclick="jawab()" checked="checked">
                                <label for="pilihan_d">{{$soal->pilihan_d}}</label><br>
                                @else
                                <input type="radio" id="pilihan_d" name="pilihan" value="D" onclick="jawab()">
                                <label for="pilihan_d">{{$soal->pilihan_d}}</label><br>
                                @endif

                                @if($jawaban->jawaban == "E")
                                <input type="radio" id="pilihan_e" name="pilihan" value="E" onclick="jawab()" checked="checked">
                                <label for="pilihan_e">{{$soal->pilihan_e}}</label>
                                @else
                                <input type="radio" id="pilihan_e" name="pilihan" value="E" onclick="jawab()">
                                <label for="pilihan_e">{{$soal->pilihan_e}}</label>
                                @endif
                                
                                
                                
                            @elseif($soal->id_soal_pilihan_berganda != $jawab_id_soal_pilihan_berganda->id_soal_pilihan_berganda)
                                <input type="radio" id="pilihan_a" name="pilihan" value="A" onclick="jawab()">
                                <label for="pilihan_a">{{$soal->pilihan_a}}</label><br>
                                <input type="radio" id="pilihan_b" name="pilihan" value="B" onclick="jawab()">
                                <label for="pilihan_b">{{$soal->pilihan_b}}</label><br>
                                <input type="radio" id="pilihan_c" name="pilihan" value="C" onclick="jawab()">
                                <label for="pilihan_c">{{$soal->pilihan_c}}</label><br>
                                <input type="radio" id="pilihan_d" name="pilihan" value="D" onclick="jawab()">
                                <label for="pilihan_d">{{$soal->pilihan_d}}</label><br>
                                <input type="radio" id="pilihan_e" name="pilihan" value="E" onclick="jawab()">
                                <label for="pilihan_e">{{$soal->pilihan_e}}</label>
                            @endif
                        @endif
                        </form>
                    </div>
                    <script>		
                        function jawab(){
                            // window.location.href = "../jawab_pilihan_berganda/{{$soal->id_soal_pilihan_berganda}}";
                            document.getElementById("FormJawab").submit();
                        }
                        
                    </script>
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
                        <!-- <div class="sidebar-heading">Sisa Waktu</div>
                        <div class="countdown sidebar-p-x"
                                data-value="{{$kuis->durasi_pengerjaan}}"
                                data-unit="hour"></div> -->

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