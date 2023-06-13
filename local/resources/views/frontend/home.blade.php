@extends('layouts.frontend.app')
@section('css')
    <link href="{{ asset('plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/dashboard/dashboard_2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('plugins/flatpickr/custom-flatpickr.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/elements/tooltip.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/basic-ui/custom_countdown.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/basic-ui/custom-carousel.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div id="content" class="main-content">
        <!--  Navbar Starts / Breadcrumb Area  -->
        <div class="sub-header-container">
            <header class="header navbar navbar-expand-sm">
                <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
                    <i class="las la-bars"></i>
                </a>
                <ul class="navbar-nav flex-row">
                    <li>
                        <div class="page-header">
                            <nav class="breadcrumb-one" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active" aria-current="page"> <span>ข่าวสารและกิจกรรม</span>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </li>
                </ul>

            </header>
        </div>
        <!--  Navbar Ends / Breadcrumb Area  -->
        <!-- Main Body Starts -->
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                {{-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget top-welcome">
                    <div class="f-100">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="media">
                                    <div class="mr-3">
                                        <img src="assets/img/profile-16.jpg')}}" alt="" class="avatar-md rounded-circle img-thumbnail">
                                    </div>
                                    <div class="align-self-center media-body">
                                        <div class="text-muted">
                                            <p class="mb-2 text-primary">Welcome to dashboard</p>
                                            <h5 class="mb-1">Sara</h5>
                                            <p class="mb-0">System Admin</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="align-self-center col-lg-5">
                                <div class="text-lg-center mt-4 mt-lg-0">
                                    <div class="row">
                                        <div class="col-3">
                                            <div>
                                                <p class="text-muted text-truncate mb-2">Projects</p>
                                                <h5 class="mb-0">48</h5>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div>
                                                <p class="text-muted text-truncate mb-2">Team</p>
                                                <h5 class="mb-0">40</h5>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div>
                                                <p class="text-muted text-truncate mb-2">Clients</p>
                                                <h5 class="mb-0">18</h5>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div>
                                                <p class="text-muted text-truncate mb-2">Sellers</p>
                                                <h5 class="mb-0">98</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-none d-lg-flex col-lg-3 align-items-end justify-content-center flex-column">
                                <button class="btn btn-primary">
                                   Settings
                                </button>
                                <button class="btn btn-info mt-2">
                                    My Chat
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div class="widget-chart-one">
                        <div class="widget-content overflow-hidden">
                            <div class="ticker-wrap">
                                {{-- <div class="ticker-heading bg-gradient-info">
                                <p>ประกาศ</p>
                            </div> --}}
                                <div class="ticker">
                                    <div class="ticker-item"><span class="text-danger"><b>ประชาสัมพันธ์ :</b></span></div>
                                    <div class="ticker-item"><b>โปรโมชั่นรักษาสิทธิ์</b></div>
                                    <div class="ticker-item"><span class="text-danger">เฉพาะวันที่ 1 มิถุนายน 2566 นี้
                                            เท่านั้น!!</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h2 class="text-center"><b>โปรโมชั่นสินค้า</b></h2>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div id="promotionpic" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="pic1" data-slide-to="0" class="active"></li>
                                            <li data-target="pic2" data-slide-to="1"></li>
                                            <li data-target="pic3" data-slide-to="2"></li>
                                        </ol>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img class="d-block w-100" src="assets/img/1.jpg" alt="First slide">
                                                {{-- <div class="carousel-caption d-none d-sm-block">
                                                    <h3>First label</h3>
                                                    <h5>Nulla vitae elit libero, a pharetra augue mollis.</h5>
                                                </div> --}}
                                            </div>
                                            <div class="carousel-item">
                                                <img class="d-block w-100" src="assets/img/3.jpg" alt="Second slide">
                                                {{-- <div class="carousel-caption d-none d-sm-block">
                                                    <h3>Second label</h3>
                                                    <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h5>
                                                </div> --}}
                                            </div>
                                            <div class="carousel-item">
                                                <img class="d-block w-100" src="assets/img/2.jpg" alt="Third slide">
                                                {{-- <div class="carousel-caption d-none d-sm-block">
                                                    <h3>Third label</h3>
                                                    <h5>Praesent commodo cursus magna, vel scelerisque nisl.</h5>
                                                </div> --}}
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#promotionpic" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#promotionpic" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <h6 class="text-center"><span class="text-danger">รีบซื้อด่วน!
                                โปรโมชั่นเหลือเวลาแค่</span></h6>
                            <div id="timer" class="square-countdown no-color">
                                <div class="days"><span class="count">00</span> <span class="text">วัน</span></div>
                                <div class="hours"><span class="count">00</span> <span class="text">ชม.</span></div>
                                <div class="min"><span class="count">00</span> <span class="text">นาที</span></div>
                                <div class="sec"><span class="count">00</span> <span class="text">วินาที</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h2 class="text-center"><b>โปรโมชั่นเปิดคลังใบหยก</b></h2>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div id="promotionpic1" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="pic1" data-slide-to="0" class="active"></li>
                                            <li data-target="pic2" data-slide-to="1"></li>
                                            <li data-target="pic3" data-slide-to="2"></li>
                                        </ol>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img class="d-block w-100" src="{{asset('assets/img/1.jpg')}}" alt="First slide">
                                                {{-- <div class="carousel-caption d-none d-sm-block">
                                                    <h3>First label</h3>
                                                    <h5>Nulla vitae elit libero, a pharetra augue mollis.</h5>
                                                </div> --}}
                                            </div>
                                            <div class="carousel-item">
                                                <img class="d-block w-100" src="{{ asset('assets/img/3.jpg')}}" alt="Second slide">
                                                {{-- <div class="carousel-caption d-none d-sm-block">
                                                    <h3>Second label</h3>
                                                    <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h5>
                                                </div> --}}
                                            </div>
                                            <div class="carousel-item">
                                                <img class="d-block w-100" src="{{ asset('assets/img/2.jpg')}}" alt="Third slide">
                                                {{-- <div class="carousel-caption d-none d-sm-block">
                                                    <h3>Third label</h3>
                                                    <h5>Praesent commodo cursus magna, vel scelerisque nisl.</h5>
                                                </div> --}}
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#promotionpic1" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#promotionpic1" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <h6 class="text-center"><span class="text-danger">รีบซื้อด่วน!
                                โปรโมชั่นเหลือเวลาแค่</span></h6>
                            <div id="timersquare" class="square-countdown no-color">                              
                                <div class="days"><span class="count">00</span> <span class="text">วัน</span></div>
                                <div class="hours"><span class="count">00</span> <span class="text">ชม.</span></div>
                                <div class="min"><span class="count">00</span> <span class="text">นาที</span></div>
                                <div class="sec"><span class="count">00</span> <span class="text">วินาที</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top img-fluid" src="{{ asset('assets/img/lightbox-7.jpg')}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a
                                natural lead-in to additional content. This content is a little bit
                                longer.</p>
                            <p class="card-text">
                                <small class="text-muted">Last updated 3 mins ago</small>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top img-fluid" src="{{ asset('assets/img/lightbox-6.jpg')}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a
                                natural lead-in to additional content. This content is a little bit
                                longer.</p>
                            <p class="card-text">
                                <small class="text-muted">Last updated 3 mins ago</small>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top img-fluid" src="{{ asset('assets/img/lightbox-5.jpg')}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a
                                natural lead-in to additional content. This content is a little bit
                                longer.</p>
                            <p class="card-text">
                                <small class="text-muted">Last updated 3 mins ago</small>
                            </p>
                        </div>
                    </div>
                </div>



            </div>

 
        </div>


        <!-- Copyright Footer Ends -->
        <!-- Arrow Starts -->
        <div class="scroll-top-arrow" style="display: none;">
            <i class="las la-angle-up"></i>
        </div>
        <!-- Arrow Ends -->
        
    </div>
@endsection
@section('js')
    <script src="{{ asset('plugins/apex/apexcharts.min.js')}}"></script>
    <script src="{{ asset('plugins/flatpickr/flatpickr.js')}}"></script>
    <script src="{{ asset('assets/js/dashboard/dashboard_2.js')}}"></script>
    <script src="{{ asset('plugins/countdown/jquery.countdown.min.js')}}"></script>
    <script src="{{ asset('assets/js/basicui/custom-countdown.js')}}"></script>
@endsection
