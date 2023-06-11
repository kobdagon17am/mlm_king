@extends('layouts.frontend.app')
@section('css')
    <link rel="stylesheet" type="text/css" href="plugins/dropify/dropify.min.css">
    <link href="{{ asset('assets/css/pages/profile_edit.css') }}" rel="stylesheet" type="text/css" />
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
                                    <li class="breadcrumb-item active" aria-current="page"> <span>เอกสารการลงทะเบียน</span>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </li>
                </ul>
            </header>
        </div>
        <div class="layout-px-spacing">
            <div class="row layout-spacing pt-4">
                {{-- <div class="col-xl-3 col-lg-4 col-md-4  mb-4">
                    <div class="profile-left">
                        <div class="image-area">
                            <img class="user-image" src="{{ asset('assets/img/user.png') }}">
                            <a href="{{ asset('profile_edit.blade.php') }}" class="follow-area">
                                <i class="las la-pen"></i>
                            </a>
                        </div>
                        <div class="info-area">
                            <h5><b>กิ่งทองใบหยก (A001)</b></h5>
                            <p>GOLD</p>
                        </div>
                        <div class="profile-tabs">
                            <div class="nav flex-column nav-pills mb-sm-0 mb-3 mx-auto" id="v-border-pills-tab"
                                role="tablist" aria-orientation="vertical">
                                <a class="nav-link active" id="v-border-pills-home-tab" data-toggle="pill"
                                    href="#v-border-pills-home" role="tab" aria-controls="v-border-pills-home"
                                    aria-selected="true"><i class="las la-info"></i> ข้อมูลพื้นฐาน</a>
                                <a class="nav-link" id="v-border-pills-team-tab" data-toggle="pill"
                                    href="#v-border-pills-team" role="tab" aria-controls="v-border-pills-team"
                                    aria-selected="false"><i class="las la-sitemap"></i> ข้อมูลสายงาน</a>
                                <a class="nav-link" id="v-border-pills-work-tab" data-toggle="pill"
                                    href="#v-border-pills-work" role="tab" aria-controls="v-border-pills-work"
                                    aria-selected="false"><i class="las la-home"></i> ที่อยู่อาศัย</a>
                                <a class="nav-link" id="v-border-pills-products-tab" data-toggle="pill"
                                    href="#v-border-pills-products" role="tab" aria-controls="v-border-pills-products"
                                    aria-selected="false"><i class="las la-shipping-fast"></i> ที่อยู่จัดส่ง</a>
                                <a class="nav-link" id="v-border-pills-orders-tab" data-toggle="pill"
                                    href="#v-border-pills-orders" role="tab" aria-controls="v-border-pills-orders"
                                    aria-selected="false"><i class="las la-donate"></i> ข้อมูลบัญชี</a>
                                <a class="nav-link" id="v-border-pills-settings-tab" data-toggle="pill"
                                    href="#v-border-pills-settings" role="tab" aria-controls="v-border-pills-settings"
                                    aria-selected="false">อื่น ๆ</a>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="row tab-area-content">
                        <div class="col-xl-12 col-lg-12 col-md-12 mb-4">
                            <div class="tab-content" id="v-border-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-border-pills-home" role="tabpanel"
                                    aria-labelledby="v-border-pills-home-tab">
                                    <div class="media">
                                        <div class="profile-shadow w-100">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="widget-header">
                                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                            <label for="idcard_image">อัพโหลดภาพถ่ายบัตรประชาชน
                                                                <span class="text-danger">* </span></label>
                                                        </div>
                                                    </div>
                                                    <div class="upload text-center img-thumbnail">
                                                        <input type="file" id="idcard_image" class="dropify"
                                                            data-default-file="{{ asset('assets/img/idcard.png') }}"
                                                            data-max-file-size="2M" />
                                                        {{-- <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i>
                                                            อัปโหลดรูปภาพ</p> --}}
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="widget-header">

                                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                            <label for="user_idcard_image">อัพโหลดภาพหน้าตรงพร้อมบัตรประชาชน
                                                                <span class="text-danger">* </span></label>
                                                        </div>

                                                    </div>
                                                    <div class="upload text-center img-thumbnail">
                                                        <input type="file" id="user_idcard_image" class="dropify"
                                                            data-default-file="{{ asset('assets/img/user_card.jpg') }}"
                                                            data-max-file-size="2M" />
                                                        {{-- <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i>
                                                            อัปโหลดรูปภาพ</p> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <p></p>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="widget-header">
                                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                            <label for="user_image">อัพโหลดภาพถ่ายหน้าตรง
                                                                <span class="text-danger">* </span></label>
                                                        </div>
                                                    </div>
                                                    <div class="upload text-center img-thumbnail">
                                                        <input type="file" id="user_image" class="dropify"
                                                            data-default-file="{{ asset('assets/img/user.png') }}"
                                                            data-max-file-size="2M" />
                                                        {{-- <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i>
                                                            อัปโหลดรูปภาพ</p> --}}
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="widget-header">
                                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                            <label for="bookbank_image">อัพโหลดภาพถ่ายหน้าบัญชีธนาคาร
                                                                <span class="text-danger">* </span></label>
                                                        </div>
                                                    </div>
                                                    <div class="upload text-center img-thumbnail">
                                                        <input type="file" id="bookbank_image" class="dropify"
                                                            data-default-file="{{ asset('assets/img/BookBank.png') }}"
                                                            data-max-file-size="2M" />
                                                        {{-- <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i>
                                                            อัปโหลดรูปภาพ</p> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <p></p>
                                            <div class="info-area col-md-12 text-center">
                                                <button type="submit" class="btn btn-info ">
                                                    <i class="las la-save"></i> ยืนยันข้อมูลการสมัคร</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Body Ends -->
    </div>
@endsection
@section('js')
    <script src="{{ asset('plugins/dropify/dropify.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/profile_edit.js') }}"></script>
@endsection
