@extends('layouts.frontend.app')
@section('css')
    <link href="{{ asset('assets/css/pages/profile.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="plugins/dropify/dropify.min.css">
    <link href="{{ asset('assets/css/pages/profile_edit.css') }}" rel="stylesheet" type="text/css" />
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
                                    <li class="breadcrumb-item active" aria-current="page"> <span>สมัครสมาชิก</span></li>
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
                                            <h5 class="font-16 mb-3"><b>กรอกข้อมูลลงทะเบียนสมาชิกใหม่</b></h5>
                                            <hr>
                                            {{-- <h6 class="font-16 mb-3"><b>ข้อมูลสายงาน (SPONSOR/UPLINE)</b></h6> --}}
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="sponsor">Sponsor
                                                            <span class="text-danger">* </span></label>
                                                        <input type="text" class="form-control" id="sponsor"
                                                            placeholder="Sponsor">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="upline_id">Upline
                                                            <span class="text-danger">* </span></label>
                                                        <input type="text" class="form-control" id="upline_id"
                                                            placeholder="Upline">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="side">Side
                                                            <span class="text-danger">* </span></label>
                                                        <input type="text" class="form-control" id="side"
                                                            placeholder="Side">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="Prefix">Business Location
                                                            <span class="text-danger">* </span></label>
                                                        <select class="form-control" id="business_location">
                                                            <option>Cambodia</option>
                                                            <option>Laos</option>
                                                            <option>Myanmar</option>
                                                            <option>Thailand</option>
                                                            <option>Vietnam</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="info-area col-md-12 text-right">
                                                    {{-- <button type="submit" class="btn btn-info mr-2">
                                                        <i class="las la-save"></i></i> ยืนยันข้อมูลการสมัคร</button> --}}
                                                </div>
                                            </div>
                                            {{-- <h5 class="font-16 mb-3">ข้อมูลพื้นฐาน (GENERAL INFORMATION)</h5> --}}
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="Prefix">คำนำหน้าชื่อ
                                                            <span class="text-danger">* </span></label>
                                                        <select class="form-control" id="Prefix">
                                                            <option>นาย</option>
                                                            <option>นาง</option>
                                                            <option>นางสาว</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="firstname">ชื่อ
                                                            <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="firstname"
                                                            placeholder="ชื่อ">
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="lastname">นามสุกล
                                                            <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="lastname"
                                                            placeholder="นามสุกล">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="maritalstatus">สถานภาพ
                                                            <span class="text-danger">*</span></label>
                                                        <select class="form-control" id="maritalstatus">
                                                            <option>โสด</option>
                                                            <option>สมรส</option>
                                                            <option>หย่าร้าง</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="businessname">ชื่อในทางธุรกิจ
                                                            <span class="text-danger">* กรณีที่ไม่มีให้ใส่
                                                                (-)</span></label>
                                                        <input type="text" class="form-control" id="businessname"
                                                            placeholder="ชื่อในทางธุรกิจ">
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="birthdate">วัน/เดือน/ปี เกิด
                                                            <span class="text-danger"></span>*</label>
                                                        <div>
                                                            <input class="form-control" type="date" value="yyyy-mm-dd"
                                                                id="birthdate">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="idcard">หมายเลขบัตรประชาชน
                                                            <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="idcard"
                                                            placeholder="หมายเลขบัตรประชาชน">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="country">ประเทศ
                                                            <span class="text-danger">*</span></label>
                                                        <select class="form-control" id="country">
                                                            <option>ไทย</option>
                                                            <option>ไทย (ไม่มีสัญชาติ)</option>
                                                            <option>ลาว</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="national">สัญชาติ
                                                            <span class="text-danger">*</span></label>
                                                        <select class="form-control" id="national">
                                                            <option>ไทย</option>
                                                            <option>ลาว</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="phone">หมายเลขโทรศัพท์
                                                            <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="phone"
                                                            placeholder="หมายเลขโทรศัพท์">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="email">Email Address
                                                            <span class="text-danger">*</span></label>
                                                        <input type="email" class="form-control" id="email"
                                                            placeholder="email@example.com">
                                                    </div>
                                                </div>
                                                <div class="info-area col-md-12 text-right">
                                                    {{-- <button type="submit" class="btn btn-info mr-2">
                                                        <i class="las la-save"></i> ยืนยันข้อมูลการสมัคร</button> --}}
                                                </div>
                                            </div>
                                            <h6 class="font-16 mb-3"><b>ที่อยู่ตามบัตรประชาชน (ADDRESS)</b></h6>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="no">บ้านเลขที่
                                                            <span class="text-danger">* </span></label>
                                                        <input type="text" class="form-control" id="no"
                                                            placeholder="บ้านเลขที่">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="moo">หมู่ที่
                                                            <span class="text-danger">* </span></label>
                                                        <input type="text" class="form-control" id="moo"
                                                            placeholder="หมู่ที่">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="homename">หมู่บ้าน/อาคาร
                                                            <span class="text-danger">* </span></label>
                                                        <input type="text" class="form-control" id="homename"
                                                            placeholder="หมู่บ้าน/อาคาร">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="soi">ตรอก/ซอย
                                                            <span class="text-danger"> </span></label>
                                                        <input type="text" class="form-control" id="soi"
                                                            placeholder="ตรอก/ซอย">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="road">ถนน
                                                            <span class="text-danger"> </span></label>
                                                        <input type="text" class="form-control" id="road"
                                                            placeholder="ถนน">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="tambon">แขวง/ตำบล
                                                            <span class="text-danger">*</span></label>
                                                        <select class="form-control" id="tambon">
                                                            <option>แขวง/ตำบล</option>
                                                            <option> </option>
                                                            <option> </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="amphur">เขต/อำเภอ
                                                            <span class="text-danger">*</span></label>
                                                        <select class="form-control" id="amphur">
                                                            <option>เขต/อำเภอ</option>
                                                            <option> </option>
                                                            <option> </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="changwat">จังหวัด
                                                            <span class="text-danger">*</span></label>
                                                        <select class="form-control" id="changwat">
                                                            <option>จังหวัด</option>
                                                            <option> </option>
                                                            <option> </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="zipcode">รหัสไปรษณีย์
                                                            <span class="text-danger">* </span></label>
                                                        <input type="text" class="form-control" id="zipcode"
                                                            placeholder="รหัสไปรษณีย์">
                                                    </div>
                                                </div>
                                                <div class="info-area col-md-12 text-right">
                                                    {{-- <button type="submit" class="btn btn-info mr-2">
                                                        <i class="las la-save"></i></i> ยืนยันข้อมูลการสมัคร</button> --}}
                                                </div>
                                            </div>
                                            <h6 class="font-16 mb-3"><b>ที่อยู่สำหรับการติดต่อและจัดส่งผลิตภัณฑ์ถึงบ้าน
                                                    (DELIVERY ADDRESS)</b>
                                            </h6>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <div class="col-12 col-form-label">
                                                            <div class="checkbox-inline">
                                                                <label class="checkbox checkbox-success ">
                                                                    <input type="checkbox" class="p-2"
                                                                        name="copy_card_address">
                                                                    <span class="ml-2">
                                                                        ที่อยู่ตามบัตรประชาชน</span></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="no1">บ้านเลขที่
                                                            <span class="text-danger">* </span></label>
                                                        <input type="text" class="form-control" id="no1"
                                                            placeholder="บ้านเลขที่">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="moo1">หมู่ที่
                                                            <span class="text-danger">* </span></label>
                                                        <input type="text" class="form-control" id="moo1"
                                                            placeholder="หมู่ที่">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="homename1">หมู่บ้าน/อาคาร
                                                            <span class="text-danger">* </span></label>
                                                        <input type="text" class="form-control" id="homename1"
                                                            placeholder="หมู่บ้าน/อาคาร">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="soi1">ตรอก/ซอย
                                                            <span class="text-danger"> </span></label>
                                                        <input type="text" class="form-control" id="soi1"
                                                            placeholder="ตรอก/ซอย">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="road1">ถนน
                                                            <span class="text-danger"> </span></label>
                                                        <input type="text" class="form-control" id="road1"
                                                            placeholder="ถนน">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="tambon1">แขวง/ตำบล
                                                            <span class="text-danger">*</span></label>
                                                        <select class="form-control" id="tambon1">
                                                            <option>แขวง/ตำบล</option>
                                                            <option> </option>
                                                            <option> </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="amphur1">เขต/อำเภอ
                                                            <span class="text-danger">*</span></label>
                                                        <select class="form-control" id="amphur1">
                                                            <option>เขต/อำเภอ</option>
                                                            <option> </option>
                                                            <option> </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="changwat1">จังหวัด
                                                            <span class="text-danger">*</span></label>
                                                        <select class="form-control" id="changwat1">
                                                            <option>จังหวัด</option>
                                                            <option> </option>
                                                            <option> </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="zipcode1">รหัสไปรษณีย์
                                                            <span class="text-danger">* </span></label>
                                                        <input type="text" class="form-control" id="zipcode1"
                                                            placeholder="รหัสไปรษณีย์">
                                                    </div>
                                                </div>
                                                <div class="info-area col-md-12 text-right">
                                                    {{-- <button type="submit" class="btn btn-info mr-2">
                                                        <i class="las la-save"></i></i> ยืนยันข้อมูลการสมัคร</button> --}}
                                                </div>
                                            </div>
                                            <h6 class="font-16 mb-4"><b>ข้อมูลบัญชี (ACCOUNT DATA)</b></h6>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="accname">ชื่อบัญชี
                                                            <span class="text-danger">* </span></label>
                                                        <input type="text" class="form-control" id="accname"
                                                            placeholder="ชื่อบัญชี">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="accno">เลขที่บัญชี
                                                            <span class="text-danger">* </span></label>
                                                        <input type="text" class="form-control" id="accno"
                                                            placeholder="เลขที่บัญชี">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label for="bank">ธนาคาร
                                                                <span class="text-danger">*</span></label>
                                                            <select class="form-control" id="bank">
                                                                <option>ธนาคารกรุงเทพ</option>
                                                                <option>ธนาคารกสิกรไทย</option>
                                                                <option>ธนาคารกรุงไทย</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="bankbranch">สาขา
                                                            <span class="text-danger">* </span></label>
                                                        <input type="text" class="form-control" id="bankbranch"
                                                            placeholder="สาขา">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="col-form-label">
                                                        <label for="banktype">ประเภทบัญชี
                                                            <span class="text-danger">* </span></label>
                                                        <div class="radio-inline">
                                                            <label class="radio radio-success">
                                                                <input type="radio" name="radios5">
                                                                <span></span>กระแสรายวัน</label>
                                                            <label class="radio radio-success">
                                                                <input type="radio" name="radios5" checked="checked">
                                                                <span></span>ออมทรัพย์</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="info-area col-md-12 text-right">
                                                    {{-- <button type="submit" class="btn btn-info mr-2">
                                                        <i class="las la-save"></i></i> ยืนยันข้อมูลการสมัคร</button> --}}
                                                </div>
                                            </div>
                                            <h6 class="font-16 mb-4"><b>ผู้สืบทอดผลประโยชน์</b></h6>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="benefitname">ชื่อ-นามสกุล ผู้รับผลประโยชน์
                                                            <span class="text-danger">* </span></label>
                                                        <input type="text" class="form-control" id="benefitname"
                                                            placeholder="ชื่อ-นามสกุล ผู้รับผลประโยชน์">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="reletionship">ความสัมพันธ์
                                                            <span class="text-danger">* </span></label>
                                                        <input type="text" class="form-control" id="reletionship"
                                                            placeholder="ความสัมพันธ์">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="id1">หมายเลขบัตรประชาชน
                                                            <span class="text-danger">* </span></label>
                                                        <input type="text" class="form-control" id="id1"
                                                            placeholder="หมายเลขบัตรประชาชน">
                                                    </div>
                                                </div>
                                                <div class="info-area col-md-12 text-right">
                                                    {{-- <button type="submit" class="btn btn-info mr-2">
                                                        <i class="las la-save"></i></i> ยืนยันข้อมูลการสมัคร</button> --}}
                                                </div>
                                            </div>
                                            <h6 class="font-16 mb-4"><b>เอกสารสำหรับการสมัคร</b></h6>
                                            <hr>
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
    </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('plugins/dropify/dropify.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/profile_edit.js') }}"></script>
@endsection
