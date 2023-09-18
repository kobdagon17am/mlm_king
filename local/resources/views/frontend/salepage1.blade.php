<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>kingthong Baiyok</title>
    <link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <link href="{{ asset('frontend/assets/css/loader.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('frontend/assets/js/loader.js') }}"></script>
    <!-- Common Styles Starts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="{{ asset('frontend/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend/assets/css/main.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet"
        type="text/css" />
    
    <!-- Common Styles Ends -->
    <!-- Common Icon Starts -->
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!-- Common Icon Ends -->
    <!-- Page Level Plugin/Style Starts -->
    <link href="{{ asset('frontend/assets/css/pages/helpdesk.css') }}" rel="stylesheet" type="text/css" />
    <!-- Page Level Plugin/Style Ends -->
</head>

<body>
    <!-- Main Body Starts -->
    <div class="row" style="position: fixed; top: 0; width: 100%; background-color: #fffffff1; z-index: 999;">
        <div class="col-6 text-center">
            <a class="navbar-brand"><img src="{{ asset('frontend/assets/img/logo/Kingthong-Baiyok-Logo.png') }}"
                    class="img-fluid" style="width: 100px;" alt="Responsive image"></a>
        </div>
        <div class="col-6 mt-4 text-center">
            <a href="!#">
                <span class="badge badge-rounded badge-success" style="font-size: 17px;">สมัครสมาชิก!</span>
            </a>
        </div>
    </div>


    <div class="row mt-5 mb-5">
        <div class="col-md-12 text-center">
            <div class="card-body">
                <div class="col-md-12 mt-4 mb-2">
                    <div class="card text-xs-center">
                        <div class="card-body">
                            <img src="{{ asset('frontend/assets/img/test1.jpg') }}" class="img-fluid mx-auto"
                                alt="Responsive image">
                        </div>
                        <div class="card-footer text-white" style="background-color: rgba(29, 146, 29, 0.519);">
                            TEST
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mt-2 mb-2">
                    <div class="card text-xs-center">
                        <div class="card-body">
                            <img src="{{ asset('frontend/assets/img/test1.jpg') }}" class="img-fluid mx-auto"
                                alt="Responsive image">
                        </div>
                    </div>
                    <div class="card-footer text-white" style="background-color: rgba(29, 146, 29, 0.519);">
                        TEST
                    </div>
                </div>

                <div class="col-md-12 mt-2 mb-2">
                    <div class="card text-xs-center">
                        <div class="card-body">
                            <img src="{{ asset('frontend/assets/img/test1.jpg') }}" class="img-fluid mx-auto"
                                alt="Responsive image">
                        </div>
                    </div>
                    <div class="card-footer text-white" style="background-color: rgba(29, 146, 29, 0.519);">
                        TEST
                    </div>
                </div>

                <div class="col-md-12 mt-2 mb-5">
                    <div class="card text-xs-center">
                        <div class="card-body">
                            <img src="{{ asset('frontend/assets/img/test1.jpg') }}" class="img-fluid mx-auto"
                                alt="Responsive image">
                        </div>
                    </div>
                    <div class="card-footer text-white" style="background-color: rgba(29, 146, 29, 0.519);">
                        TEST
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="row fixed-bottom" style="background-color: #fffffff1; z-index: 999;">
        <div class="col-md-12 mt-2 text-center">
            <div class="d-flex align-items-center justify-content-center">
                <div class="row">
                    <div class="single-user mt-2 mr-3 ml-3">
                        <img src="{{ asset('frontend/assets/img/profile-16.jpg') }}" class="rounded-circle"
                            style="width: 60px;" alt="Avatar">
                        <h6>คุณ {{ $get_customer->first_name }} {{ $get_customer->last_name }}</h6>
                        <p><i class="las la-phone-volume" style="font-size: 25px;"></i><a href="tel:{{ $get_customer->phone }}"> :
                            {{ $get_customer->phone }}</a></p>


                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-2 mb-3 text-center">
                <a href="{{ $get_customer->facebook }}">
                    <img src="{{ asset('frontend/assets/img/facebook-icon.png') }}" class="img-fluid"
                        style="width: 25px;" alt="Responsive image">
                </a>
                <a href="{{ $get_customer->instagram }}">
                    <img src="{{ asset('frontend/assets/img/instagram-icon.png') }}" class="img-fluid"
                        style="width: 25px;" alt="Responsive image">
                </a>
                <a href="{{ $get_customer->id_line }}">
                    <img src="{{ asset('frontend/assets/img/line-icon.png') }}" class="img-fluid"
                        style="width: 25px;" alt="Responsive image">
                </a>
            </div>
        </div>



        <!-- Main Body Ends -->
        <!-- Footer Starts -->
        {{-- <div class="helpdesk-footer">
        <div class="d-flex align-items-center justify-content-between">
            <p class="">Copyright © 2021 <a target="_blank"
                    href="http://localhost/mlm_laravel/CartGeneral/general">Kingthong</a> | All
                rights reserved.</p>
            <p class="">Crafted with extra <i class="las la-heart text-danger"></i></p>
        </div>
    </div> --}}
        <!-- Footer Ends -->
        <!-- Arrow Starts -->
        <div class="arrow" style="display: none;">
            <i class="las la-angle-up"></i>
            </p>
            <!-- Arrow Ends -->
            <!-- Common Script Starts -->
            <script src="{{ asset('frontend/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
            <script src="{{ asset('frontend/bootstrap/js/popper.min.js') }}"></script>
            <script src="{{ asset('frontend/bootstrap/js/bootstrap.min.js') }}"></script>
            <!-- Common Script Starts -->
            <!-- Page Level Plugin/Script Starts -->
            <script src="{{ asset('frontend/assets/js/pages/helpdesk.js') }}"></script>
            <!-- Page Level Plugin/Script Starts -->
</body>

</html>
