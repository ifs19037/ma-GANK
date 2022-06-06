@if(Session::get('role'))
<html>
<head>
        <style>
            body{
                background-image: url("{{ URL::asset('asset/image/gambar/gambar_prama_1.png') }}");
                background-repeat: no-repeat;
                background-position: center;
                background-size: cover;
                background-color: transparent;
            }
        </style>
        <link rel="icon" href="{{ URL::asset('asset/image/logo/logo_prama.png') }}">
        <title>@yield('title')</title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Prevent the demo from appearing in search engines (REMOVE THIS) -->
        <meta name="robots" content="noindex">

        <!-- Custom Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Oswald:400,500,700%7CRoboto:400,500%7CRoboto:400,500&amp;display=swap" rel="stylesheet">

        <!-- Perfect Scrollbar -->
        <link type="text/css" rel="stylesheet" href="{{ URL::asset('asset/LearnPlus/learnplus.demo.frontendmatter.com/assets/vendor/perfect-scrollbar.css') }}">

        <!-- Material Design Icons -->
        <link type="text/css" rel="stylesheet" href="{{ URL::asset('asset/LearnPlus/learnplus.demo.frontendmatter.com/assets/css/material-icons.css') }}">

        <!-- Font Awesome Icons -->
        <link type="text/css" rel="stylesheet" href="{{ URL::asset('asset/LearnPlus/learnplus.demo.frontendmatter.com/assets/css/fontawesome.css') }}">

        <!-- Preloader -->
        <link type="text/css" rel="stylesheet" href="{{ URL::asset('asset/LearnPlus/learnplus.demo.frontendmatter.com/assets/vendor/spinkit.css') }}">

        <!-- App CSS -->
        <link type="text/css" rel="stylesheet" href="{{ URL::asset('asset/LearnPlus/learnplus.demo.frontendmatter.com/assets/css/app.css') }}">

        <!-- Flatpickr -->
        <link type="text/css" href="{{ URL::asset('asset/LearnPlus/learnplus.demo.frontendmatter.com/assets/css/flatpickr.css') }}" rel="stylesheet">
        <link type="text/css" href="{{ URL::asset('asset/LearnPlus/learnplus.demo.frontendmatter.com/assets/css/flatpickr-airbnb.css') }}" rel="stylesheet">

        <!-- Quill Theme -->
        <link type="text/css" href="{{ URL::asset('asset/LearnPlus/learnplus.demo.frontendmatter.com/assets/css/quill.css') }}" rel="stylesheet">

        <!-- Touchspin -->
        <link type="text/css" href="{{ URL::asset('asset/LearnPlus/learnplus.demo.frontendmatter.com/assets/css/bootstrap-touchspin.css') }}" rel="stylesheet">
    </head>

    <body>
        @yield('container')

        <!-- jQuery -->
        <script src="{{ URL::asset('asset/LearnPlus/learnplus.demo.frontendmatter.com/assets/vendor/jquery.min.js') }}"></script>

        <!-- Bootstrap -->
        <script src="{{ URL::asset('asset/LearnPlus/learnplus.demo.frontendmatter.com/assets/vendor/popper.min.js') }}"></script>
        <script src="{{ URL::asset('asset/LearnPlus/learnplus.demo.frontendmatter.com/assets/vendor/bootstrap.min.js') }}"></script>

        <!-- Perfect Scrollbar -->
        <script src="{{ URL::asset('asset/LearnPlus/learnplus.demo.frontendmatter.com/assets/vendor/perfect-scrollbar.min.js') }}"></script>

        <!-- MDK -->
        <script src="{{ URL::asset('asset/LearnPlus/learnplus.demo.frontendmatter.com/assets/vendor/dom-factory.js') }}"></script>
        <script src="{{ URL::asset('asset/LearnPlus/learnplus.demo.frontendmatter.com/assets/vendor/material-design-kit.js') }}"></script>

        <!-- App JS -->
        <script src="{{ URL::asset('asset/LearnPlus/learnplus.demo.frontendmatter.com/assets/js/app.js') }}"></script>

        <!-- Highlight.js -->
        <script src="{{ URL::asset('asset/LearnPlus/learnplus.demo.frontendmatter.com/assets/js/hljs.js') }}"></script>

        <!-- App Settings (safe to remove) -->
        <script src="{{ URL::asset('asset/LearnPlus/learnplus.demo.frontendmatter.com/assets/js/app-settings.js') }}"></script>

        <!-- Touchspin -->
        <script src="{{ URL::asset('asset/LearnPlus/learnplus.demo.frontendmatter.com/assets/vendor/jquery.bootstrap-touchspin.js') }}"></script>
        <script src="assets/js/touchspin.js"></script>

        <!-- Flatpickr -->
        <script src="{{ URL::asset('asset/LearnPlus/learnplus.demo.frontendmatter.com/assets/vendor/flatpickr/flatpickr.min.js') }}"></script>
        <script src="{{ URL::asset('asset/LearnPlus/learnplus.demo.frontendmatter.com/') }}assets/js/flatpickr.js"></script>

        <!-- jQuery Mask Plugin -->
        <script src="{{ URL::asset('asset/LearnPlus/learnplus.demo.frontendmatter.com/assets/vendor/jquery.mask.min.js') }}"></script>

        <!-- Quill -->
        <script src="{{ URL::asset('asset/LearnPlus/learnplus.demo.frontendmatter.com/assets/vendor/quill.min.js') }}"></script>
        <script src="{{ URL::asset('asset/LearnPlus/learnplus.demo.frontendmatter.com/assets/js/quill.js') }}"></script>
    </body>
</html>
@else
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <style>
            body{
                background-image: url("{{ URL::asset('asset/image/gambar/gambar_prama_1.png') }}");
                background-repeat: no-repeat;
                background-position: center;
                background-size: cover;
                background-color: transparent;
            }
        </style>
        <link rel="icon" href="{{ URL::asset('asset/image/logo/logo_prama.png') }}">
        <title>@yield('title')</title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Prevent the demo from appearing in search engines (REMOVE THIS) -->
        <meta name="robots" content="noindex">

        <!-- Custom Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Oswald:400,500,700%7CRoboto:400,500%7CRoboto:400,500&amp;display=swap" rel="stylesheet">

        <!-- Perfect Scrollbar -->
        <link type="text/css" rel="stylesheet" href="{{ URL::asset('asset/LearnPlus/learnplus.demo.frontendmatter.com/assets/vendor/perfect-scrollbar.css') }}">

        <!-- Material Design Icons -->
        <link type="text/css" rel="stylesheet" href="{{ URL::asset('asset/LearnPlus/learnplus.demo.frontendmatter.com/assets/css/material-icons.css') }}">

        <!-- Font Awesome Icons -->
        <link type="text/css" rel="stylesheet" href="{{ URL::asset('asset/LearnPlus/learnplus.demo.frontendmatter.com/assets/css/fontawesome.css') }}">

        <!-- Preloader -->
        <link type="text/css" rel="stylesheet" href="{{ URL::asset('asset/LearnPlus/learnplus.demo.frontendmatter.com/assets/vendor/spinkit.css') }}">

        <!-- App CSS -->
        <link type="text/css" rel="stylesheet" href="{{ URL::asset('asset/LearnPlus/learnplus.demo.frontendmatter.com/assets/css/app.css') }}">

        <!-- Flatpickr -->
        <link type="text/css" href="{{ URL::asset('asset/LearnPlus/learnplus.demo.frontendmatter.com/assets/css/flatpickr.css') }}" rel="stylesheet">
        <link type="text/css" href="{{ URL::asset('asset/LearnPlus/learnplus.demo.frontendmatter.com/assets/css/flatpickr-airbnb.css') }}" rel="stylesheet">

        <!-- Quill Theme -->
        <link type="text/css" href="{{ URL::asset('asset/LearnPlus/learnplus.demo.frontendmatter.com/assets/css/quill.css') }}" rel="stylesheet">

        <!-- Touchspin -->
        <link type="text/css" href="{{ URL::asset('asset/LearnPlus/learnplus.demo.frontendmatter.com/assets/css/bootstrap-touchspin.css') }}" rel="stylesheet">
    </head>

    <body>
    <div class="d-flex align-items-center" style="min-height: 100vh; background-color:rgba(255, 255, 255, 0.5)">
            <div class="col-sm-8 col-md-6 col-lg-4 mx-auto" style="min-width: 300px;">
                <div class="card navbar-shadow" style="background-color:rgba(255, 255, 255, 0.5)">
                    <div class="card-header text-center" style="background-color:rgba(255, 255, 255, 0.5)">
                        <img src="{{ URL::asset('asset/image/logo/logo_prama.png') }}" width="80%">
                    </div>
                    <div class="card-body" style="background-color:rgba(255, 255, 255, 0.5)">
                        <form action="./PostLogin" method="post">
                        @csrf
                            <div class="form-group">
                                <label class="form-label" for="maskSample01">Nomor Pegawai</label>
                                <div class="input-group input-group-merge">
                                    <input id="maskSample01" type="text" required="" class="form-control form-control-prepended" data-mask="#.##0,00" data-mask-reverse="true">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <span class="far fa-key"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="password">Password:</label>
                                <div class="input-group input-group-merge">
                                    <input id="password" type="password" required="" class="form-control form-control-prepended">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <span class="far fa-key"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <button type="submit"
                                        class="btn btn-primary btn-block">MASUK</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="{{ URL::asset('asset/LearnPlus/learnplus.demo.frontendmatter.com/assets/vendor/jquery.min.js') }}"></script>

        <!-- Bootstrap -->
        <script src="{{ URL::asset('asset/LearnPlus/learnplus.demo.frontendmatter.com/assets/vendor/popper.min.js') }}"></script>
        <script src="{{ URL::asset('asset/LearnPlus/learnplus.demo.frontendmatter.com/assets/vendor/bootstrap.min.js') }}"></script>

        <!-- Perfect Scrollbar -->
        <script src="{{ URL::asset('asset/LearnPlus/learnplus.demo.frontendmatter.com/assets/vendor/perfect-scrollbar.min.js') }}"></script>

        <!-- MDK -->
        <script src="{{ URL::asset('asset/LearnPlus/learnplus.demo.frontendmatter.com/assets/vendor/dom-factory.js') }}"></script>
        <script src="{{ URL::asset('asset/LearnPlus/learnplus.demo.frontendmatter.com/assets/vendor/material-design-kit.js') }}"></script>

        <!-- App JS -->
        <script src="{{ URL::asset('asset/LearnPlus/learnplus.demo.frontendmatter.com/assets/js/app.js') }}"></script>

        <!-- Highlight.js -->
        <script src="{{ URL::asset('asset/LearnPlus/learnplus.demo.frontendmatter.com/assets/js/hljs.js') }}"></script>

        <!-- App Settings (safe to remove) -->
        <script src="{{ URL::asset('asset/LearnPlus/learnplus.demo.frontendmatter.com/assets/js/app-settings.js') }}"></script>

        <!-- Touchspin -->
        <script src="{{ URL::asset('asset/LearnPlus/learnplus.demo.frontendmatter.com/assets/vendor/jquery.bootstrap-touchspin.js') }}"></script>
        <script src="assets/js/touchspin.js"></script>

        <!-- Flatpickr -->
        <script src="{{ URL::asset('asset/LearnPlus/learnplus.demo.frontendmatter.com/assets/vendor/flatpickr/flatpickr.min.js') }}"></script>
        <script src="{{ URL::asset('asset/LearnPlus/learnplus.demo.frontendmatter.com/') }}assets/js/flatpickr.js"></script>

        <!-- jQuery Mask Plugin -->
        <script src="{{ URL::asset('asset/LearnPlus/learnplus.demo.frontendmatter.com/assets/vendor/jquery.mask.min.js') }}"></script>

        <!-- Quill -->
        <script src="{{ URL::asset('asset/LearnPlus/learnplus.demo.frontendmatter.com/assets/vendor/quill.min.js') }}"></script>
        <script src="{{ URL::asset('asset/LearnPlus/learnplus.demo.frontendmatter.com/assets/js/quill.js') }}"></script>
    </body>
</html>
@endif