@extends('layouts.frontend.app')
@section('css')
    <link href="{{ asset('frontend/assets/css/pages/profile.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/dropify/dropify.min.css') }}">
    <link href="{{ asset('frontend/assets/css/pages/profile_edit.css') }}" rel="stylesheet" type="text/css" />
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
                            <img class="user-image" src="{{ asset('frontend/assets/img/user.png') }}">
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
                                        <form method="post" id="form_register" action="{{ route('Register_member') }}">
                                            @csrf

                                            <div class="profile-shadow w-100">
                                                <h5 class="font-16 mb-3"><b>กรอกข้อมูลลงทะเบียนสมาชิกใหม่</b></h5>
                                                <hr>
                                                {{-- <h6 class="font-16 mb-3"><b>ข้อมูลสายงาน (SPONSOR/UPLINE)</b></h6> --}}
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="upline_id">ภายใต้
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="text"
                                                                class="form-control @error('upline_id') is-invalid @enderror"
                                                                name="upline_id" placeholder="ภายใต้"
                                                                value="{{ old('upline_id') }}">
                                                            @error('upline_id')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="sponsor">ผู้แนะนำ
                                                                <span class="text-danger">* </span></label>
                                                                <input type="text"
                                                                class="form-control @error('sponsor') is-invalid @enderror"
                                                                name="sponsor" placeholder="ผู้แนะนำ"
                                                                value="{{ old('sponsor') }}">
                                                            @error('sponsor')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="side">สาย
                                                                <span class="text-danger">* </span></label>
                                                                <input type="text"
                                                                class="form-control @error('side') is-invalid @enderror"
                                                                name="side" placeholder="สาย"
                                                                value="{{ old('side') }}">
                                                            @error('side')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="number_of_member">จองรหัส
                                                                <span class="text-danger">
                                                                </span></label>
                                                            <select name="number_of_member" class="form-control "
                                                                id="number_of_member">
                                                                <option>ทั่วไป</option>
                                                                <option>จอง 3 รหัส</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="business_location">ประเทศ
                                                                <span class="text-danger">
                                                                </span></label>
                                                            <select name="business_location" class="form-control"
                                                                id="business_location">
                                                                <option>Thailand</option>
                                                                <option>Cambodia</option>
                                                                <option>Laos</option>
                                                                <option>Myanmar</option>
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
                                                            <label for="prefix">คำนำหน้าชื่อ
                                                                <span class="text-danger"> </span></label>
                                                            <select name="prefix" class="form-control" id="prefix">
                                                                <option>นาย</option>
                                                                <option>นาง</option>
                                                                <option>นางสาว</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label for="firstname">ชื่อ
                                                                <span
                                                                    class="text-danger">*</span></label>
                                                                    <input type="text"
                                                                    class="form-control @error('firstname') is-invalid @enderror"
                                                                    name="firstname" placeholder="ชื่อ"
                                                                    value="{{ old('firstname') }}">
                                                                @error('firstname')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                                    
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label for="lastname">นามสุกล
                                                                <span
                                                                    class="text-danger">*</span></label>
                                                                    <input type="text"
                                                                    class="form-control @error('lastname') is-invalid @enderror"
                                                                    name="lastname" placeholder="นามสุกล"
                                                                    value="{{ old('lastname') }}">
                                                                @error('lastname')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="marital_status">สถานภาพ
                                                                <span
                                                                    class="text-danger marital_status_err _err"></span></label>
                                                            <select name="marital_status" class="form-control"
                                                                id="marital_status">
                                                                <option>โสด</option>
                                                                <option>สมรส</option>
                                                                <option>หย่าร้าง</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label for="businessname">ชื่อในทางธุรกิจ
                                                                <span class="text-danger">*
                                                                    กรณีที่ไม่มีให้ใส่
                                                                    (-)</span></label>
                                                                    <input type="text"
                                                                    class="form-control @error('businessname') is-invalid @enderror"
                                                                    name="businessname" placeholder="ชื่อในทางธุรกิจ"
                                                                    value="{{ old('businessname') }}">
                                                                @error('businessname')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label for="birthdate">วัน/เดือน/ปี เกิด
                                                                <span class="text-danger"></span>*</label>
                                                            <div>
                                                                <input type="date"
                                                                class="form-control @error('birthdate') is-invalid @enderror"
                                                                name="birthdate" placeholder="yyyy-mm-dd"
                                                                value="{{ old('birthdate') }}">
                                                            @error('birthdate')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="idcard">หมายเลขบัตรประชาชน
                                                                <span class="text-danger">*</span></label>
                                                                <input type="number" minlength="13" unique="customers"
                                                                class="form-control @error('idcard') is-invalid @enderror"
                                                                name="idcard" placeholder="หมายเลขบัตรประชาชน"
                                                                value="{{ old('idcard') }}">
                                                            @error('idcard')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="country">ประเทศ
                                                                <span class="text-danger"></span></label>
                                                            <select name="country" class="form-control" id="country">
                                                                <option>ไทย</option>
                                                                <option>ไทย (ไม่มีสัญชาติ)</option>
                                                                <option>ลาว</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="national">สัญชาติ
                                                                <span
                                                                    class="text-danger"></span></label>
                                                            <select name="national" class="form-control" id="national">
                                                                <option>ไทย</option>
                                                                <option>ลาว</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="phone">หมายเลขโทรศัพท์
                                                                <span class="text-danger">*</span></label>
                                                                <input type="number"
                                                                class="form-control @error('phone') is-invalid @enderror"
                                                                name="phone" placeholder="หมายเลขโทรศัพท์"
                                                                value="{{ old('phone') }}">
                                                            @error('phone')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="email">Email Address
                                                                <span class="text-danger">*</span></label>

                                                                <input type="email"
                                                                class="form-control @error('email') is-invalid @enderror"
                                                                name="email" placeholder="email@example.com"
                                                                value="{{ old('email') }}">
                                                            @error('email')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
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
                                                            <label for="card_no">บ้านเลขที่
                                                                <span class="text-danger">*
                                                                </span></label>
                                                                <input type="text"
                                                                class="form-control @error('card_no') is-invalid @enderror"
                                                                name="card_no" placeholder="บ้านเลขที่"
                                                                value="{{ old('card_no') }}">
                                                            @error('card_no')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="card_moo">หมู่ที่
                                                                <span class="text-danger">*
                                                                </span></label>
                                                                <input type="text"
                                                                class="form-control @error('card_moo') is-invalid @enderror"
                                                                name="card_moo" placeholder="หมู่ที่"
                                                                value="{{ old('card_moo') }}">
                                                            @error('card_moo')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="card_home_name">หมู่บ้าน/อาคาร
                                                                <span class="text-danger">*
                                                                </span></label>
                                                                <input type="text"
                                                                class="form-control @error('card_home_name') is-invalid @enderror"
                                                                name="card_home_name" placeholder="หมู่บ้าน/อาคาร"
                                                                value="{{ old('card_home_name') }}">
                                                            @error('card_home_name')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="card_soi">ตรอก/ซอย
                                                                <span class="text-danger">*
                                                                </span></label>
                                                                <input type="text"
                                                                class="form-control @error('card_soi') is-invalid @enderror"
                                                                name="card_soi" placeholder="ตรอก/ซอย"
                                                                value="{{ old('card_soi') }}">
                                                            @error('card_soi')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="card_road">ถนน
                                                                <span class="text-danger">*
                                                                </span></label>
                                                                <input type="text"
                                                                class="form-control @error('card_road') is-invalid @enderror"
                                                                name="card_road" placeholder="ถนน"
                                                                value="{{ old('card_road') }}">
                                                            @error('card_road')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="card_tambon">แขวง/ตำบล
                                                                <span
                                                                    class="text-danger">*</span></label>
                                                            <select name="card_tambon" class="form-control"
                                                                id="card_tambon">
                                                                <option>แขวง/ตำบล</option>
                                                                <option> </option>
                                                                <option> </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="card_amphur">เขต/อำเภอ
                                                                <span
                                                                    class="text-danger">*</span></label>
                                                            <select name="card_amphur" class="form-control"
                                                                id="card_amphur">
                                                                <option>เขต/อำเภอ</option>
                                                                <option> </option>
                                                                <option> </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="card_changwat">จังหวัด
                                                                <span
                                                                    class="text-danger">*</span></label>
                                                            <select name="card_changwat" class="form-control"
                                                                id="card_changwat">
                                                                <option>จังหวัด</option>
                                                                <option> </option>
                                                                <option> </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="card_zipcode">รหัสไปรษณีย์
                                                                <span class="text-danger card_zipcode_err _err">*
                                                                </span></label>
                                                                <input type="text"
                                                                class="form-control @error('card_zipcode') is-invalid @enderror"
                                                                name="card_zipcode" placeholder="รหัสไปรษณีย์"
                                                                value="{{ old('card_zipcode') }}">
                                                            @error('card_zipcode')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
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
                                                            <label for="sent_no">บ้านเลขที่
                                                                <span class="text-danger">*
                                                                </span></label>
                                                                <input type="text"
                                                                class="form-control @error('sent_no') is-invalid @enderror"
                                                                name="sent_no" placeholder="บ้านเลขที่"
                                                                value="{{ old('sent_no') }}">
                                                            @error('sent_no')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="sent_moo">หมู่ที่
                                                                <span class="text-danger">*
                                                                </span></label>
                                                                <input type="text"
                                                                class="form-control @error('sent_moo') is-invalid @enderror"
                                                                name="sent_moo" placeholder="หมู่ที่"
                                                                value="{{ old('sent_moo') }}">
                                                            @error('sent_moo')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="sent_home_name">หมู่บ้าน/อาคาร
                                                                <span class="text-danger">*
                                                                </span></label>
                                                                <input type="text"
                                                                class="form-control @error('sent_home_name') is-invalid @enderror"
                                                                name="sent_home_name" placeholder="หมู่บ้าน/อาคาร"
                                                                value="{{ old('sent_home_name') }}">
                                                            @error('sent_home_name')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="sent_soi">ตรอก/ซอย
                                                                <span class="text-danger">
                                                                </span></label>
                                                                <input type="text"
                                                                class="form-control @error('sent_soi') is-invalid @enderror"
                                                                name="sent_soi" placeholder="ตรอก/ซอย"
                                                                value="{{ old('sent_soi') }}">
                                                            @error('sent_soi')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="sent_road">ถนน
                                                                <span class="text-danger">
                                                                </span></label>
                                                                <input type="text"
                                                                class="form-control @error('sent_road') is-invalid @enderror"
                                                                name="sent_road" placeholder="ถนน"
                                                                value="{{ old('sent_road') }}">
                                                            @error('sent_road')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="sent_tambon">แขวง/ตำบล
                                                                <span
                                                                    class="text-danger">*</span></label>
                                                            <select name="sent_tambon" class="form-control"
                                                                id="sent_tambon">
                                                                <option>แขวง/ตำบล</option>
                                                                <option> </option>
                                                                <option> </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="sent_amphur">เขต/อำเภอ
                                                                <span
                                                                    class="text-danger">*</span></label>
                                                            <select name="sent_amphur" class="form-control"
                                                                id="sent_amphur">
                                                                <option>เขต/อำเภอ</option>
                                                                <option> </option>
                                                                <option> </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="sent_changwat">จังหวัด
                                                                <span
                                                                    class="text-danger">*</span></label>
                                                            <select name="sent_changwat" class="form-control"
                                                                id="sent_changwat">
                                                                <option>จังหวัด</option>
                                                                <option> </option>
                                                                <option> </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="sent_zipcode">รหัสไปรษณีย์
                                                                <span class="text-danger">*
                                                                </span></label>
                                                                <input type="text"
                                                                class="form-control @error('sent_zipcode') is-invalid @enderror"
                                                                name="sent_zipcode" placeholder="รหัสไปรษณีย์"
                                                                value="{{ old('sent_zipcode') }}">
                                                            @error('sent_zipcode')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
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
                                                            <label for="acc_name">ชื่อบัญชี
                                                                <span class="text-danger">*
                                                                </span></label>
                                                                <input type="text"
                                                                class="form-control @error('acc_name') is-invalid @enderror"
                                                                name="acc_name" placeholder="ชื่อบัญชี"
                                                                value="{{ old('acc_name') }}">
                                                            @error('acc_name')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="acc_no">เลขที่บัญชี
                                                                <span class="text-danger">* </span></label>
                                                                <input type="text"
                                                                class="form-control @error('acc_no') is-invalid @enderror"
                                                                name="acc_no" placeholder="เลขที่บัญชี"
                                                                value="{{ old('acc_no') }}">
                                                            @error('acc_no')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <div class="form-group">
                                                                <label for="bank_name">ธนาคาร
                                                                    <span
                                                                        class="text-danger bank_err _err"></span></label>
                                                                <select name="bank_name" class="form-control"
                                                                    id="bank_name">
                                                                    <option>ธนาคารกรุงเทพ</option>
                                                                    <option>ธนาคารกสิกรไทย</option>
                                                                    <option>ธนาคารกรุงไทย</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="bank_branch">สาขา
                                                                <span class="text-danger">*
                                                                </span></label>
                                                                <input type="text"
                                                                class="form-control @error('bank_branch') is-invalid @enderror"
                                                                name="bank_branch" placeholder="สาขา"
                                                                value="{{ old('bank_branch') }}">
                                                            @error('bank_branch')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="col-form-label">
                                                            <label for="bank_type">ประเภทบัญชี
                                                                <span class="text-danger banktype_err _err">
                                                                </span></label>
                                                            <div class="radio-inline">
                                                                <label class="radio radio-success">
                                                                    <input type="radio" name="bank_type"
                                                                        value="กระแสรายวัน">
                                                                    <span></span>กระแสรายวัน</label>
                                                                <label class="radio radio-success">
                                                                    <input type="radio" name="bank_type"
                                                                        value="ออมทรัพย์" checked="checked">
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
                                                            </label>
                                                            <input type="text" class="form-control" id="benefitname"
                                                                placeholder="ชื่อ-นามสกุล ผู้รับผลประโยชน์">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="reletionship">ความสัมพันธ์
                                                            </label>
                                                            <input type="text" class="form-control" id="reletionship"
                                                                placeholder="ความสัมพันธ์">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="id1">หมายเลขบัตรประชาชน
                                                            </label>
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
                                                                data-default-file="{{ asset('frontend/assets/img/idcard.png') }}"
                                                                data-max-file-size="2M" />
                                                            {{-- <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i>
                                                            อัปโหลดรูปภาพ</p> --}}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="widget-header">

                                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                                <label
                                                                    for="user_idcard_image">อัพโหลดภาพหน้าตรงพร้อมบัตรประชาชน
                                                                    <span class="text-danger">* </span></label>
                                                            </div>

                                                        </div>
                                                        <div class="upload text-center img-thumbnail">
                                                            <input type="file" id="user_idcard_image" class="dropify"
                                                                data-default-file="{{ asset('frontend/assets/img/user_card.jpg') }}"
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
                                                                data-default-file="{{ asset('frontend/assets/img/user.png') }}"
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
                                                                data-default-file="{{ asset('frontend/assets/img/BookBank.png') }}"
                                                                data-max-file-size="2M" />
                                                            {{-- <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i>
                                                            อัปโหลดรูปภาพ</p> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="info-area col-md-12 text-center">
                                                    <button type="submit" class="btn btn-success rounded-pill">
                                                        <i class="las la-save"></i>บันทึกข้อมูล
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
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
    <script src="{{ asset('frontend/plugins/dropify/dropify.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/pages/profile_edit.js') }}"></script>
@endsection
