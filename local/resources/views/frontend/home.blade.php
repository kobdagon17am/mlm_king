@extends('layouts.frontend.app')
@section('css')

<link href="{{ asset('assets/css/pages/profile.css')}}" rel="stylesheet" type="text/css" />
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
                                    <li class="breadcrumb-item active" aria-current="page"> <span>Profile</span></li>
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
                <div class="col-xl-3 col-lg-4 col-md-4 mb-4">
                    <div class="profile-left">
                        <div class="image-area">
                            <img class="user-image" src="{{ asset('assets/img/profile-16.jpg') }}">
                            <a href="{{ asset('profile_edit.blade.php') }}" class="follow-area">
                                <i class="las la-pen"></i>
                            </a>
                        </div>
                        <div class="info-area">
                            <h6>กิ่งทองใบหยก (A001)</h6>
                            <p>GOLD</p>
                        </div>
                        <div class="profile-tabs">
                            <div class="nav flex-column nav-pills mb-sm-0 mb-3 mx-auto" id="v-border-pills-tab"
                                role="tablist" aria-orientation="vertical">
                                <a class="nav-link active" id="v-border-pills-home-tab" data-toggle="pill"
                                    href="#v-border-pills-home" role="tab" aria-controls="v-border-pills-home"
                                    aria-selected="true">ข้อมูลพื้นฐาน</a>
                                <a class="nav-link" id="v-border-pills-team-tab" data-toggle="pill"
                                    href="#v-border-pills-team" role="tab" aria-controls="v-border-pills-team"
                                    aria-selected="false">ข้อมูลสายงาน</a>
                                <a class="nav-link" id="v-border-pills-work-tab" data-toggle="pill"
                                    href="#v-border-pills-work" role="tab" aria-controls="v-border-pills-work"
                                    aria-selected="false">ที่อยู่ปัจจุบัน</a>
                                <a class="nav-link" id="v-border-pills-products-tab" data-toggle="pill"
                                    href="#v-border-pills-products" role="tab" aria-controls="v-border-pills-products"
                                    aria-selected="false">ที่อยู่จัดส่ง</a>
                                <a class="nav-link" id="v-border-pills-orders-tab" data-toggle="pill"
                                    href="#v-border-pills-orders" role="tab" aria-controls="v-border-pills-orders"
                                    aria-selected="false">ข้อมูลบัญชี</a>
                                {{-- <a class="nav-link" id="v-border-pills-settings-tab" data-toggle="pill"
                                    href="#v-border-pills-settings" role="tab" aria-controls="v-border-pills-settings"
                                    aria-selected="false">อื่น ๆ</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8 col-md-8">
                    <div class="row tab-area-content">
                        <div class="col-xl-12 col-lg-12 col-md-12 mb-4">
                            <div class="tab-content" id="v-border-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-border-pills-home" role="tabpanel"
                                    aria-labelledby="v-border-pills-home-tab">
                                    <div class="media">
                                        <div class="profile-shadow w-100">
                                            <h6 class="font-16 mb-3"><b>ข้อมูลพื้นฐาน (General Information)</b></h6>
                                            <div class="row">
                                                <div class="col-md-6"><b>ชื่อ-นามสกุล :</b> คุณกิ่งทอง ใบหยก</div>
                                                <div class="col-md-6"><b>ชื่อในทางธุรกิจ :</b> กิ่งทอง</div>
                                                <div class="col-md-6"><b>รหัสสมาชิก :</b> A001</div>
                                                <div class="col-md-6"><b>เพศ :</b> </div>
                                                <div class="col-md-6"><b>วัน/เดือน/ปี เกิด :</b> </div>
                                                <div class="col-md-6"><b>หมายเลขบัตรประชาชน :</b> </div>
                                                <div class="col-md-6"><b>หมายเลขโทรศัพท์ :</b> </div>
                                                <div class="col-md-6"><b>อีเมล์ :</b> </div>
                                                <div class="info-area col-md-12 text-right">
                                                    <button><i class="las la-edit"></i> แก้ไข</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-border-pills-team" role="tabpanel"
                                    aria-labelledby="v-border-pills-team-tab">
                                    <div class="media">
                                        <div class="profile-shadow w-100">
                                            <h6 class="font-16 mb-3"><b>ข้อมูลสายงาน (Sponsor/Upline)</b></h6>
                                            <div class="row">
                                                <div class="col-md-12"><b>Sponsor :</b> </div>
                                                <div class="col-md-12"><b>Upline :</b> </div>
                                                <div class="col-md-12"><b>Side :</b> </div>
                                                <div class="info-area col-md-12 text-right">
                                                    <button><i class="las la-edit"></i> แก้ไข</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-border-pills-work" role="tabpanel"
                                    aria-labelledby="v-border-pills-work-tab">
                                    <div class="media">
                                        <div class="profile-shadow w-100">
                                            <h6 class="font-16 mb-3"><b>ที่อยู่ปัจจุบัน (Current Address)</b></h6>
                                            <div class="row">
                                                <div class="col-md-6"><b>บ้านเลขที่ :</b> </div>
                                                <div class="col-md-6"><b>หมู่ที่ :</b> </div>
                                                <div class="col-md-6"><b>ชือ หมู่บ้าน/อาคาร :</b> </div>
                                                <div class="col-md-6"><b>ตรอก/ซอย :</b> </div>
                                                <div class="col-md-6"><b>ถนน :</b> </div>
                                                <div class="col-md-6"><b>แขวง/ตำบล :</b> </div>
                                                <div class="col-md-6"><b>เขต/อำเภอ :</b> </div>
                                                <div class="col-md-6"><b>จังหวัด :</b> </div>
                                                <div class="col-md-6"><b>รหัสไปรษณีย์ :</b> </div>
                                                <div class="info-area col-md-12 text-right">
                                                    <button><i class="las la-edit"></i> แก้ไข</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-border-pills-products" role="tabpanel"
                                    aria-labelledby="v-border-pills-work-tab">
                                    <div class="media">
                                        <div class="profile-shadow w-100">
                                            <h6 class="font-16 mb-3"><b>ที่อยู่จัดส่งเอกสาร/สินค้า (Delivery Address)</b>
                                            </h6>
                                            <div class="row">
                                                <div class="col-md-6"><b>บ้านเลขที่ :</b> </div>
                                                <div class="col-md-6"><b>หมู่ที่ :</b> </div>
                                                <div class="col-md-6"><b>ชือ หมู่บ้าน/อาคาร :</b> </div>
                                                <div class="col-md-6"><b>ตรอก/ซอย :</b> </div>
                                                <div class="col-md-6"><b>ถนน :</b> </div>
                                                <div class="col-md-6"><b>แขวง/ตำบล :</b> </div>
                                                <div class="col-md-6"><b>เขต/อำเภอ :</b> </div>
                                                <div class="col-md-6"><b>จังหวัด :</b> </div>
                                                <div class="col-md-6"><b>รหัสไปรษณีย์ :</b> </div>
                                                <div class="info-area col-md-12 text-right">
                                                    <button><i class="las la-edit"></i> แก้ไข</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-border-pills-orders" role="tabpanel"
                                    aria-labelledby="v-border-pills-work-tab">
                                    <div class="media">
                                        <div class="profile-shadow w-100">
                                            <h6 class="font-16 mb-3"><b>ข้อมูลบัญชี (Account Data)</b></h6>
                                            <div class="row">
                                                <div class="col-md-6"><b>ธนาคาร :</b> </div>
                                                <div class="col-md-6"><b>สาขา :</b> </div>
                                                <div class="col-md-6"><b>ชื่อบัญชี :</b> </div>
                                                <div class="col-md-6"><b>เลขที่บัญชี :</b> </div>
                                                <div class="col-md-6"><b>ผู้รับประโยชน์ :</b> </div>
                                                <div class="col-md-6"><b>ความสัมพันธ์ :</b> </div>
                                                <div class="info-area col-md-12 text-right">
                                                    <button><i class="las la-edit"></i> แก้ไข</button>
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
    </div>
@endsection
