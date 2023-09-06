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
                        <div class="col-xl-12 col-lg-12 col-md-12 mb-2">
                            <div class="media">
                                <div class="profile-shadow w-100">
                                    <h5 class="font-16 mb-3"><b>การติดต่อ (Contact)</b></h5>
                                    <div class="row">

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="phone">หมายเลขโทรศัพท์
                                                    <span class="text-danger"></span></label>
                                                <input type="text" class="form-control" id="phone"
                                                    placeholder="000-0000000">
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="email">Email Address
                                                            <span class="text-danger"></span></label>
                                                        <input type="email" class="form-control" id="email"
                                                            placeholder="email@example.com">
                                                    </div>
                                                </div> --}}
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="email">Facebook
                                                    <span class="text-danger"></span></label>
                                                <input type="facebook" class="form-control" id="email"
                                                    placeholder="https://www.facebook.com/kingthong/">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="email">Instagram
                                                    <span class="text-danger"></span></label>
                                                <input type="instagram" class="form-control" id="email"
                                                    placeholder="https://www.instagram.com/kingthong/">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="email">Line
                                                    <span class="text-danger"></span></label>
                                                <input type="line" class="form-control" id="email"
                                                    placeholder="@kingthong">
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-right">
                                            <button type="button" class="btn btn-info btn-rounded"><i
                                                    class="las la-save"></i> บันทึก</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="row tab-area-content">
                        <div class="col-xl-12 col-lg-12 col-md-12 mb-2">
                            <div class="media">
                                <div class="profile-shadow w-100">
                                    <h5 class="font-16"><b>กำหนดสายงานการลงทะเบียนสมาชิกใหม่ที่มาจากหน้าเว็บ</b></h5>
                                    <div class="row mt-3">
                                        <div class="col-6 ml-4">
                                            <div class="radio-inline">
                                                <label class="radio radio-outline radio-outline-2x radio-primary">
                                                    <input type="radio" name="radios16" checked="checked"อ>
                                                    <span></span>สาย A</label>
                                                <label class="radio radio-outline radio-outline-2x radio-primary">
                                                    <input type="radio" name="radios16">
                                                    <span></span>สาย B</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mt-1 mb-3">
                                            <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected"><span
                                                    class="input-group-btn input-group-prepend"><button
                                                        class="btn btn-link bootstrap-touchspin-down"
                                                        type="button"></button></span><input id="changeButtonClass"
                                                    type="text" value="http://localhost/mlm_laravel/Register/PS3647194/A"
                                                    name="changeButtonClass" class="form-control"><span
                                                    class="input-group-btn input-group-append"><button
                                                        class="btn btn-soft-success bootstrap-touchspin-up"
                                                        type="button">คัดลอกลิงก์</button></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="row tab-area-content">
                        <div class="col-xl-12 col-lg-12 col-md-12 mb-2">
                            <div class="media">
                                <div class="profile-shadow w-100">
                                    <h5 class="font-16"><b>เพจซื้อขาย (Sales Page)</b></h5>
                                    <div class="row mb-2">
                                        <div class="col-md-3 mt-3 text-center">
                                            <div class="card text-xs-center ">

                                                <div class="card-body">
                                                    <img src="{{ asset('frontend/assets/img/test1.jpg') }}"
                                                        class="img-fluid mx-auto" alt="Responsive image">
                                                </div>
                                                <b>SALES PAGE 1</b>
                                                <div class="card-footer text-dark text-center"
                                                    style="background-color: rgba(205, 205, 205, 0.088);">
                                                    <button type="button"
                                                        class="btn btn-soft-warning btn-rounded">เปิดดูลิงก์</button>
                                                    <button type="button"
                                                        class="btn btn-soft-success btn-rounded">คัดลอกลิงก์</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3 mt-3 text-center">

                                            <div class="card text-xs-center ">
                                                <div class="card-body">
                                                    <img src="{{ asset('frontend/assets/img/test1.jpg') }}"
                                                        class="img-fluid mx-auto" alt="Responsive image">
                                                </div>
                                                <b>SALES PAGE 2</b>
                                                <div class="card-footer text-dark text-center"
                                                    style="background-color: rgba(205, 205, 205, 0.088);">
                                                    <button type="button"
                                                        class="btn btn-soft-warning btn-rounded">เปิดดูลิงก์</button>
                                                    <button type="button"
                                                        class="btn btn-soft-success btn-rounded">คัดลอกลิงก์</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3 mt-3 text-center">
                                            <div class="card text-xs-center ">
                                                <div class="card-body">
                                                    <img src="{{ asset('frontend/assets/img/test1.jpg') }}"
                                                        class="img-fluid mx-auto" alt="Responsive image">
                                                </div>
                                                <b>SALES PAGE 3</b>
                                                <div class="card-footer text-dark text-center"
                                                    style="background-color: rgba(205, 205, 205, 0.088);">
                                                    <button type="button"
                                                        class="btn btn-soft-warning btn-rounded">เปิดดูลิงก์</button>
                                                    <button type="button"
                                                        class="btn btn-soft-success btn-rounded">คัดลอกลิงก์</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3 mt-3 text-center">
                                            <div class="card text-xs-center ">
                                                <div class="card-body">
                                                    <img src="{{ asset('frontend/assets/img/test1.jpg') }}"
                                                        class="img-fluid mx-auto" alt="Responsive image">
                                                </div>
                                                <b>SALES PAGE 4</b>
                                                <div class="card-footer text-dark text-center"
                                                    style="background-color: rgba(205, 205, 205, 0.088);">
                                                    <button type="button"
                                                        class="btn btn-soft-warning btn-rounded">เปิดดูลิงก์</button>
                                                    <button type="button"
                                                        class="btn btn-soft-success btn-rounded">คัดลอกลิงก์</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3 mt-3 mb-3 text-center">
                                            <div class="card text-xs-center ">
                                                <div class="card-body">
                                                    <img src="{{ asset('frontend/assets/img/test1.jpg') }}"
                                                        class="img-fluid mx-auto" alt="Responsive image">
                                                </div>
                                                <b>SALES PAGE 5</b>
                                                <div class="card-footer text-dark text-center"
                                                    style="background-color: rgba(205, 205, 205, 0.088);">
                                                    <button type="button"
                                                        class="btn btn-soft-warning btn-rounded">เปิดดูลิงก์</button>
                                                    <button type="button"
                                                        class="btn btn-soft-success btn-rounded">คัดลอกลิงก์</button>
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
        </div>
    @endsection
