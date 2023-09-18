@extends('layouts.frontend.app')
@section('css')
    <link href="{{ asset('frontend/assets/css/pages/profile.css') }}" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages/contact_us_2.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div id="content" class="main-content">
        <!-- Main Body Starts -->
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
                                    <li class="breadcrumb-item active" aria-current="page"> <span>Contact Us</span>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </li>
                </ul>
            </header>
        </div>
        <p></p>
        <div class="layout-px-spacing text">
            <div class="row layout-spacing pt-4">
                <div class="col-md-12 ml-4 mb-2">
                        <div class="col-md-12">
                            <div class="media align-center">
                                <div class="media-content ml-3">
                                    <u>
                                        <h5 class="font-16 mb-0 strong">ติดต่อเจ้าหน้าที่</h5>
                                    </u>
                                </div>
                                <hr>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="media align-center">
                                <div class="icon-wrap">
                                    <i class="las la-bullhorn font-20"></i>
                                </div>
                                <div class="media-content ml-3">
                                    <h3 class="text-muted font-13 mb-0">บริษัท พียู เน็ตเวิร์ค จำกัด</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="media align-center">
                                <div class="icon-wrap">
                                    <i class="las la-route font-20"></i>
                                </div>
                                <div class="media-content ml-3">
                                    <h3 class="text-muted font-13 mb-0">169/97-98 หมู่ 3 ตำบลคูคต อำเภอลำลูกกา
                                        จังหวัดปทุมธานี 12130

                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="media align-center">
                                <div class="icon-wrap">
                                    <i class="las la-calendar-check font-20"></i>
                                </div>
                                <div class="media-content ml-3">
                                    <h3 class="text-muted font-13 mb-0">วันอังคาร-วันอาทิตย์
                                        (10.30-19.30 น.)

                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="media align-center">
                                <div class="icon-wrap">
                                    <i class="las la-phone-volume font-20"></i>
                                </div>
                                <div class="media-content ml-3">
                                    <h3 class="text-muted font-13 mb-0">โทรศัพท์ :
                                        <span class="text-info">08XXXXXXXX</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="media align-center">
                                <div class="icon-wrap">
                                    <i class="lab la-line font-20"></i>
                                </div>
                                <div class="media-content ml-3">
                                    <h3 class="text-muted font-13 mb-0">Line :
                                        <span class="text-info">@KINGTHONG</span>
                                    </h3>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-12 mt-2">
                                    <div class="image-area text-left" style="margin-left: 30px">
                                        <img class="avatar-xl" src="{{ asset('frontend/assets/img/qrcode1.png') }} ">
                                    </div>
                                    <a href="https://line.me/R/ti/p/%40190evelx" target="_blank" class="btn btn-success mt-2" style="margin-left: 18px">
                                        <i class="lab la-line font-15"></i>
                                        แอดไลน์</a>
                        </div>
                </div>
                <div class="col-md-12 ml-2">
                    <div class="widget-content widget-content-area">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7744.859479081935!2d100.654722!3d13.932999!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311d7d90032a63c7%3A0x5a75d1c29639b2b9!2z4Lia4Lij4Li04Lip4Lix4LiXIOC4nuC4teC4ouC4uSDguYDguJnguYfguJXguYDguKfguLTguKPguYzguIQg4LiI4Liz4LiB4Lix4LiU!5e0!3m2!1sth!2sth!4v1686674084364!5m2!1sth!2sth"
                                    width="100%" height="350px" frameborder="0" style="border:0;" allowfullscreen=""
                                    aria-hidden="false" tabindex="0"></iframe>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>



    </div>
@endsection
@section('js')
@endsection
