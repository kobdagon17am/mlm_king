@extends('layouts.backend.app')
@section('css')
@endsection
@section('page-header')
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            {{-- <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboards</a></li> --}}
            <li class="breadcrumb-item active" aria-current="page"><span>หน้าหลัก</span></li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="row layout-top-spacing">
        <div class="col-lg-12 layout-spacing">
            <div class="statbox widget box box-shadow mb-4">
                {{-- <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Picker</h4>
                    </div>
                </div>
            </div> --}}
                <div class="layout-px-spacing">
                    <div class="row layout-top-spacing">
                        {{-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget top-welcome">
                            <div class="f-100">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="media">
                                            <div class="mr-3">
                                                <img src="{{ asset('backend/assets/img/profile-16.jpg') }}" alt="" class="avatar-md rounded-circle img-thumbnail">
                                            </div>
                                            <div class="align-self-center media-body">
                                                <div class="text-muted">                                                    
                                                    <h5 class="mb-1">กิ่งทองใบหยก</h5>
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
                        <!-- 4 Columns -->
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 layout-spacing">
                            <div class="widget bg-gradient-danger">
                                <div class="f-100">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="text-white">
                                                <h5 class="text-white">รายการรอดำเนินการ !</h5>
                                                <p class="blink_me text-white mt-1">หมดเขตพรุ่งนี้</p>
                                                <ul class="pl-3 mb-0">
                                                    <li class="py-1">ตรวจสอบเอกสารการสมัคร</li>
                                                    <li class="py-1">ตรวจสอบการชำระเงิน</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="align-self-end col-md-5">
                                            <img src="{{ asset('backend/assets/img/dashboard-image-uw.png') }}"
                                                alt="" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 layout-spacing">
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 mb-2">
                                    <div class="widget">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="mr-3">
                                                <span class="quick-category-icon qc-primary rounded-circle">
                                                    <i class="las la-shopping-cart"></i>
                                                </span>
                                            </div>
                                            <h5 class="font-size-14 mb-0">รายการสั่งซื้อ</h5>
                                        </div>
                                        <div class="text-muted mt-3">
                                            <h5 class="mb-2">1,452 รายการ
                                                <i class="las la-angle-up text-success-teal"></i>
                                            </h5>
                                            <div class="d-flex">
                                                <span class="badge badge-success-teal font-size-12"> + 0.2% </span>
                                                <span class="ml-2 text-truncate">เทียบจากเดือนที่แล้ว</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 mb-2">
                                    <div class="widget">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="mr-3">
                                                <span class="quick-category-icon qc-primary rounded-circle">
                                                    <i class="las la-hand-holding-usd"></i>
                                                </span>
                                            </div>
                                            <h5 class="font-size-14 mb-0">ยอดขายสุทธิ</h5>
                                        </div>
                                        <div class="text-muted mt-3">
                                            <h5 class="mb-2">฿ 20K
                                                <i class="las la-angle-down text-danger"></i>
                                            </h5>
                                            <div class="d-flex">
                                                <span class="badge badge-danger font-size-12"> - 5.4% </span>
                                                <span class="ml-2 text-truncate">เทียบจากเดือนที่แล้ว</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 mb-2">
                                    <div class="widget">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="mr-3">
                                                <span class="quick-category-icon qc-primary rounded-circle">
                                                    <i class="las la-user"></i>
                                                </span>
                                            </div>
                                            <h5 class="font-size-14 mb-0">จำนวนลูกค้า</h5>
                                        </div>
                                        <div class="text-muted mt-3">
                                            <h5 class="mb-2">9,887 คน
                                                <i class="las la-angle-up text-success-teal"></i>
                                            </h5>
                                            <div class="d-flex">
                                                <span class="badge badge-success-teal font-size-12"> + 25% </span>
                                                <span class="ml-2 text-truncate">เทียบจากเดือนที่แล้ว</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <div class="widget widget-chart-one">
                                        <div class="widget-heading">
                                            <h5 class="">รายละเอียดการขายสินค้าทั้งหมด</h5>
                                        </div>
                                        <div class="widget-content">
                                            <div class="d-flex justify-content-between">
                                                <p class="font-35 text-primary">฿ 74,989</p>
                                                <i class="lar la-chart-bar font-45 text-primary"></i>
                                            </div>
                                            <p>จำนวนสินค้า 175 รายการ</p>
                                            <a class="btn btn-sm btn-primary">รายละเอียด</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="widget widget-chart-one">
                                        <div class="widget-heading">
                                            <h5 class="">อยู่ระหว่างตรวจสอบเอกสาร</h5>
                                        </div>
                                        <div class="widget-content">
                                            <div class="d-flex justify-content-between">
                                                <p class="font-35 text-success">5</p>
                                                <i class="lar la-chart-bar font-45 text-success"></i>
                                            </div>
                                            <p>จำนวนสมาชิก 5 คน</p>
                                            <a class="btn btn-sm btn-success">รายละเอียด</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="widget widget-chart-one">
                                        <div class="widget-heading">
                                            <h5 class="">อยู่ระหว่างตรวจสอบการชำระเงิน</h5>
                                        </div>
                                        <div class="widget-content">
                                            <div class="d-flex justify-content-between">
                                                <p class="font-35 text-warning">฿ 24,989</p>
                                                <i class="lar la-chart-bar font-45 text-warning"></i>
                                            </div>
                                            <p>จำนวนลูกค้า 98 คน</p>
                                            <a class="btn btn-sm btn-warning">รายละเอียด</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>





                        {{-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget-chart-one">
                            <div class="widget-content overflow-hidden">
                                <div class="ticker-wrap">
                                    <div class="ticker-heading bg-gradient-info">
                                        <p>Overview</p>
                                    </div>
                                    <div class="ticker">
                                        <div class="ticker-item">Letterpress chambray brunch.</div>
                                        <div class="ticker-item">Vice mlkshk crucifix beard chillwave meditation hoodie asymmetrical Helvetica.</div>
                                        <div class="ticker-item">Ugh PBR&B kale chips Echo Park.</div>
                                        <div class="ticker-item">Gluten-free mumblecore chambray mixtape food truck. </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  --}}
                    </div>
                </div>
                {{-- <div class="widget-footer text-right">
                <button type="reset" class="btn btn-primary mr-2">Submit</button>
                <button type="reset" class="btn btn-outline-primary">Cancel</button>
            </div> --}}
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
