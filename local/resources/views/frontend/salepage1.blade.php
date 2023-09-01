@extends('layouts.frontend.app')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/table/datatable/dt-global_style.css') }}">
    <link href="{{ asset('frontend/assets/css/ui-elements/pagination.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <!--  Main Container Starts  -->

    <!--  Content Area Starts  -->
    <div id="content" class="main-content">
        <!--  Navbar Starts / Breadcrumb Area  -->
        {{-- <div class="sub-header-container">
            <header class="header navbar navbar-expand-sm">
                <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
                    <i class="las la-bars"></i>
                </a>
                <ul class="navbar-nav flex-row">
                    <li>
                        <div class="page-header">
                            <nav class="breadcrumb-one" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active" aria-current="page">
                                        <span>เพจซื้อขาย 1</span>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </li>
                </ul>
            </header>
        </div> --}}
        <!--  Navbar Ends / Breadcrumb Area  -->
        <!-- Main Body Starts -->



        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-lg-12 layout-spacing">
                    <div class="statbox widget box box-shadow mb-4">
                        <div class="widget-content widget-content-area">

                            <div class="col-md-12 mt-2 mb-4">
                                <img src="{{ asset('frontend/assets/img/lightbox-5.jpg') }}" class="img-fluid"
                                    alt="Responsive image">
                            </div>
                            <div class="col-md-12 mt-2 mb-4">
                                <img src="{{ asset('frontend/assets/img/lightbox-6.jpg') }}" class="img-fluid"
                                    alt="Responsive image">
                            </div>
                            <div class="col-md-12 mt-2 mb-4">
                                <img src="{{ asset('frontend/assets/img/lightbox-7.jpg') }}" class="img-fluid"
                                    alt="Responsive image">
                            </div>
                            <hr>

                            <div class="col-md-12 mt-2 text-center">
                                <p>
                                <h5><b>สนใจสมัครสมาชิก!</b></h5>
                                </p>
                                <img src="{{ asset('frontend/assets/img/profile-16.jpg') }}" class="rounded-circle"
                                    style="width: 100px;" alt="Avatar">
                                <p></p>
                                <p><b>คุณ กิ่งทอง ใบหยก</b></p>
                                <p><b>เบอร์โทร: </b><span>000-0000000</span></p>
                                <p><b>EMAIL: </b><a href="mailto:kingthong@gmail.com"><span>kingthong@gmail.com</span></a></p>

                            </div>
                            <div class="col-md-12 mt-2 text-center">
                                
                                <a href="#!">
                                    <img src="{{ asset('frontend/assets/img/facebook-icon.png') }}" class="img-fluid" style="width: 35px;" alt="Responsive image">
                                </a>
                                <a href="#!">
                                    <img src="{{ asset('frontend/assets/img/instagram-icon.png') }}" class="img-fluid" style="width: 35px;" alt="Responsive image">
                                </a>   
                                <a href="#!">
                                    <img src="{{ asset('frontend/assets/img/line-icon.png') }}" class="img-fluid" style="width: 35px;" alt="Responsive image">
                                </a>                              
                            </div> 

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- Main Container Ends -->
@section('js')
@endsection
