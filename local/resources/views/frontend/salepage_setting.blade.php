@extends('layouts.frontend.app')
@section('css')
    <link href="{{ asset('frontend/assets/css/pages/profile.css') }}" rel="stylesheet" type="text/css" />
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
                                    <li class="breadcrumb-item active" aria-current="page">
                                        <span>ตั้งค่าหน้าเพจซื้อขาย</span>
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
            <div class="row layout-spacing pt-4">

                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="row tab-area-content">
                        <div class="col-xl-12 col-lg-12 col-md-12 mb-4">
                                    <div class="media">
                                        <div class="profile-shadow w-100">
                                            <h5 class="font-16 mb-3"><b>การติดต่อ (Contact)</b></h5>
                                            <div class="row">

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="phone">หมายเลขโทรศัพท์
                                                            <span class="text-danger"></span></label>
                                                        <input type="text" class="form-control" id="phone"
                                                            placeholder="หมายเลขโทรศัพท์">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="email">Email Address
                                                            <span class="text-danger"></span></label>
                                                        <input type="email" class="form-control" id="email"
                                                            placeholder="email@example.com">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="email">Facebook
                                                            <span class="text-danger"></span></label>
                                                        <input type="facebook" class="form-control" id="email"
                                                            placeholder="https://www.facebook.com/kingthong/">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="email">Instagram
                                                            <span class="text-danger"></span></label>
                                                        <input type="instagram" class="form-control" id="email"
                                                            placeholder="https://www.instagram.com/kingthong/">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="email">Line
                                                            <span class="text-danger"></span></label>
                                                        <input type="line" class="form-control" id="email"
                                                            placeholder="Line ID">
                                                    </div>
                                                </div>
                                                <div class="info-area col-md-12 text-right">
                                                    <button type="reset" class="btn btn-info mr-2">
                                                        <i class="las la-save"></i> บันทึก</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="row tab-area-content">
                        <div class="col-xl-12 col-lg-12 col-md-12 mb-4">
                                    <div class="media">
                                        <div class="profile-shadow w-100">
                                            <h5 class="font-16 mb-3"><b>ชื่อเพจซื้อขาย (Sale Page Name)</b></h5>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="email">ตัวอย่างเพจซื้อขาย
                                                            <span class="text-danger">*</span></label>
                                                        <input type="facebook" class="form-control" id="email"
                                                            placeholder="https://www.facebook.com/kingthong/">
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
    @endsection
