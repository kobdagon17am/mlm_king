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
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d196281.12936705156!2d-104.99519763365042!3d39.76451867460239!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x876b80aa231f17cf%3A0x118ef4f8278a36d6!2sDenver%2C%20CO%2C%20USA!5e0!3m2!1sen!2sin!4v1595073603352!5m2!1sen!2sin"
                                    width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""
                                    aria-hidden="false" tabindex="0"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h5><b>ติดต่อฝ่ายขาย</b></h5>
                        <p class="product-category-price"><span>โทรศัพท์:</span> 09xxxxxxxx</p>
                        <p class="product-category-price"><span>Line:</span></p>
                        <div class="image-area">
                            <img class="avatar-md sale_qrcode" src="{{ asset('assets/img/qrcode.png') }}">
       
                        </div>

                </div>
            </div>
        </div>

        <!-- Main Body Ends -->
    </div>
@endsection
@section('js')
@endsection
