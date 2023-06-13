@extends('layouts.frontend.app')
@section('css')
    <link href="{{ asset('assets/css/pages/profile.css') }}" rel="stylesheet" type="text/css" />
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
                <div class="col-md-6">
                    <div class="widget-content widget-content-area">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7744.859479081935!2d100.654722!3d13.932999!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311d7d90032a63c7%3A0x5a75d1c29639b2b9!2z4Lia4Lij4Li04Lip4Lix4LiXIOC4nuC4teC4ouC4uSDguYDguJnguYfguJXguYDguKfguLTguKPguYzguIQg4LiI4Liz4LiB4Lix4LiU!5e0!3m2!1sth!2sth!4v1686674084364!5m2!1sth!2sth"
                                    width="100%" height="300px" frameborder="0" style="border:0;" allowfullscreen=""
                                    aria-hidden="false" tabindex="0"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="layout-px-spacing">
                        <div class="col-md-12 ">
                            <div class="widget">
                                <div class="widget-heading p-2">
                                    <h6><b>บริษัท พียู เน็ตเวิร์ค จำกัด</b></h6>
                                    <p style="font-size: 13px">เลขประจำตัวผู้เสียภาษี 0105556048753</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>



                {{-- <div class="card">
                        <div class="card-body">
                            <h5><b>บริษัท พียู เน็ตเวิร์ค จำกัด</b></h5>
                            <p class="product-category-price"><span>เลขประจำตัวผู้เสียภาษี 0105556048753</span></p>
                            <p class="product-category-price"><span>169/97-98 หมู่ 3 ตำบลคูคต อำเภอลำลูกกา
                                    จังหวัดปทุมธานี 12130</span></p>
                            <p class="product-category-price"><span>วันอังคาร-วันอาทิตย์
                                    10.30-19.30 น.</span></p>
                            <div class="image-area">
                                    <img class="avatar-md sale_qrcode" src="{{ asset('assets/img/qrcode.png') }}">
               
                                </div>
                        </div>
                      </div> --}}



            </div>
        </div>

        <!-- Main Body Ends -->
    </div>
@endsection
@section('js')
@endsection
