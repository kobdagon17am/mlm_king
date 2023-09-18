@extends('layouts.frontend.app')
@section('css')
    <link href="{{ asset('frontend/assets/css/pages/profile.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/dropify/dropify.min.css') }}">
    <link href="{{ asset('frontend/assets/css/pages/profile_edit.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/select2/select2.min.css') }}">
    <link href="{{ asset('frontend/assets/css/forms/form-widgets.css') }}" rel="stylesheet" type="text/css">
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
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="upline_id">ภายใต้
                                                                <span class="text-danger">*</span>
                                                            </label>

                                                            <input type="text"
                                                                class="form-control @error('upline_id') is-invalid @enderror"
                                                                placeholder="ภายใต้"
                                                                value="{{ @$data['data']->business_name }} ( {{ $data['data']->username }} )"
                                                                disabled>
                                                            @error('upline_id')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                            <input type="hidden" name="upline_id"
                                                                value="{{ $data['data']->username }}">

                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="sponsor">ผู้แนะนำ
                                                                <span class="text-danger">* </span></label>
                                                            <input type="text"
                                                                class="form-control @error('sponsor') is-invalid @enderror"
                                                                name="sponsor" placeholder="ผู้แนะนำ"
                                                                value="{{ Auth::guard('c_user')->user()->first_name }} {{ Auth::guard('c_user')->user()->last_name }} ( {{ Auth::guard('c_user')->user()->username }} )"
                                                                disabled>
                                                            <input type="hidden" name="sponsor"
                                                                value="{{ Auth::guard('c_user')->user()->username }}">
                                                            @error('sponsor')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror

                                                            <input type="hidden" name="sponsor"
                                                                value="{{ Auth::guard('c_user')->user()->username }}">

                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="side">สาย
                                                                <span class="text-danger">* </span></label>
                                                            <input type="text"
                                                                class="form-control @error('side') is-invalid @enderror"
                                                                placeholder="สาย" value="{{ $data['line_type_back'] }}"
                                                                disabled>

                                                            <input type="hidden" name="side" placeholder="สาย"
                                                                value="{{ $data['line_type_back'] }}">
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
                                                                <span class="text-danger">*</span></label>
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
                                                                <span class="text-danger">*</span></label>
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
                                                            <label for="country">ประเทศ
                                                                <span class="text-danger">*</span></label>
                                                            <select name="country" class="form-control basic"
                                                                id="country" required>
                                                                @foreach ($data['country'] as $c_value)
                                                                    <option value="{{ $c_value->txt_desc }}"
                                                                        @if ($c_value->id == $data['data']->business_location_id) selected="" @endif>
                                                                        {{ $c_value->name }}</option>
                                                                @endforeach


                                                            </select>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="national">สัญชาติ
                                                                <span class="text-danger"></span></label>

                                                            <select name="national" class="form-control basic"
                                                                id="national">

                                                                <option value="ไทย">ไทย</option>
                                                                <option value="ไทย(พิเศษ)">ไทย(พิเศษ)</option>
                                                                <option value="ลาว">ลาว</option>
                                                                <option value="กัมพูชา">กัมพูชา</option>
                                                                <option value="เวียดนาม">เวียดนาม</option>


                                                            </select>


                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="id_card">หมายเลขบัตรประชาชน
                                                                <span class="text-danger">*</span></label>
                                                            <input type="text" maxlength="13" unique="customers"
                                                                class="form-control @error('id_card') is-invalid @enderror"
                                                                name="id_card" id="id_card"
                                                                placeholder="หมายเลขบัตรประชาชน"
                                                                value="{{ old('id_card') }}">
                                                            @error('id_card')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                            <span class="error text-danger"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="phone">หมายเลขโทรศัพท์
                                                                <span class="text-danger">*</span></label>
                                                            <input type="text"
                                                                class="form-control @error('phone') is-invalid @enderror"
                                                                name="phone" placeholder="หมายเลขโทรศัพท์"
                                                                value="{{ old('phone') }}" maxlength="10"
                                                                minlength="10">
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
                                                            <label for="card_changwat">จังหวัด
                                                                <span class="text-danger">*</span></label>

                                                            <select name="card_changwat" class="form-control basic"
                                                                id="card_changwat" required>
                                                                <option value="">เลือกจังหวัด</option>
                                                                @foreach ($data['provinces'] as $value_provinces)
                                                                    <option value="{{ $value_provinces->id }}"
                                                                        @if ($value_provinces->id == old('card_province')) selected @endif>
                                                                        {{ $value_provinces->name_th }}</option>
                                                                @endforeach
                                                            </select>

                                                        </div>
                                                    </div>


                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="card_amphur">เขต/อำเภอ
                                                                <span class="text-danger">*</span></label>
                                                            <select name="card_amphur" class="form-control"
                                                                id="card_amphur" disabled required>
                                                                <option value="">เลือกเขต/อำเภอ</option>

                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="card_tambon">แขวง/ตำบล
                                                                <span class="text-danger">*</span></label>
                                                            <select name="card_tambon" class="form-control"
                                                                id="card_tambon" disabled required>
                                                                <option value="">เลือกแขวง/ตำบล</option>

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
                                                                id="card_zipcode" value="{{ old('card_zipcode') }}"
                                                                required disabled>
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
                                                                <span class="text-danger">*</span></label>
                                                            <select name="sent_changwat" class="form-control"
                                                                id="sent_changwat">
                                                                <option>จังหวัด</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="sent_amphur">เขต/อำเภอ
                                                                <span class="text-danger">*</span></label>
                                                            <select name="sent_amphur" class="form-control"
                                                                id="sent_amphur">
                                                                <option>เขต/อำเภอ</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="sent_changwat">ตำบล
                                                                <span class="text-danger">*</span></label>
                                                            <select name="sent_tambon" class="form-control"
                                                                id="sent_tambon">
                                                                <option>แขวง/ตำบล</option>
                                                                <option>1</option>
                                                                <option>2</option>
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
                                                                    <span class="text-danger bank_err _err"></span></label>
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

    <script src="{{ asset('frontend/plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/forms/custom-select2.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#id_card').on('change', function() {
                national = $('#national').val();

                if (national == 'ไทย') {
                    if ($.trim($(this).val()) != '' && $(this).val().length == 13) {
                        id = $(this).val().replace(/-/g, "");
                        var result = Script_checkID(id);
                        id_card = $('#id_card').val();
                        if (result === false) {
                            $('span.error').addClass('text-danger');
                            $('span.error').removeClass('text-success').text('เลขบัตร ' + id_card +
                                ' ไม่ถูกต้อง');
                            $('#id_card').val('');
                        } else {


                            $.ajax({
                                    url: '{{ route('check_id_card') }}',
                                    type: 'GET',
                                    data: {
                                        id_card: id_card
                                    },
                                })
                                .done(function(data) {
                                    if (data['status'] == 'success') {
                                        $('span.error').removeClass('text-danger');
                                        $('span.error').addClass('text-success').text('เลขบัตรถูกต้อง');
                                    } else {
                                        $('span.error').addClass('text-danger');
                                        $('span.error').removeClass('text-success').text(
                                            'มีเลขบัตรประชาชนในระบบแล้วไม่สามารถสมัครซ้ำได้');
                                        $('#id_card').val('');
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'เลขบัตรประชาชนซ้ำ',
                                        })
                                    }
                                })
                        }
                    } else {
                        $('span.error').addClass('text-danger');
                        $('span.error').removeClass('text-success').text('เลขบัตรไม่ครบ 13 หลัก');
                        $('#id_card').val('');

                    }

                } else {
                    id_card = $('#id_card').val();
                    $.ajax({
                            url: '{{ route('check_id_card') }}',
                            type: 'GET',
                            data: {
                                id_card: id_card
                            },
                        })
                        .done(function(data) {
                            if (data['status'] == 'success') {
                                $('span.error').removeClass('text-danger');
                                $('span.error').addClass('text-success').text('เลขบัตรถูกต้อง');
                            } else {
                                $('span.error').addClass('text-danger');
                                $('span.error').removeClass('text-success').text(
                                    'มีเลขบัตรประชาชนในระบบแล้วไม่สามารถสมัครซ้ำได้');
                                $('#id_card').val('');
                                Swal.fire({
                                    icon: 'error',
                                    title: 'เลขบัตรประชาชนซ้ำ',
                                })
                            }
                        })

                }

            })
        });

        function Script_checkID(id) {
            if (!IsNumeric(id)) return false;
            if (id.substring(0, 1) == 0) return false;
            if (id.length != 13) return false;
            for (i = 0, sum = 0; i < 12; i++)
                sum += parseFloat(id.charAt(i)) * (13 - i);
            if ((11 - sum % 11) % 10 != parseFloat(id.charAt(12))) return false;
            return true;
        }

        function IsNumeric(input) {
            var RE = /^-?(0|INF|(0[1-7][0-7]*)|(0x[0-9a-fA-F]+)|((0|[1-9][0-9]*|(?=[\.,]))([\.,][0-9]+)?([eE]-?\d+)?))$/;
            return (RE.test(input));
        }


        $("#card_changwat").change(function() {
            let province_id = $(this).val();
            $.ajax({
                url: '{{ route('getDistrict') }}',
                type: 'GET',
                dataType: 'json',
                data: {
                    province_id: province_id,
                },
                success: function(data) {
                    $("#card_amphur").children().remove();
                    $("#card_tambon").children().remove();
                    $("#card_amphur").append(` <option value=""> เลือกอำเภอ </option>`);
                    $("#card_tambon").append(` <option value=""> เลือกตำบล </option>`);
                    $("#card_zipcode").val("");
                    data.forEach((item) => {
                        $("#card_amphur").append(
                            `<option value="${item.id}">${item.name_th}</option>`
                        );

                    });
                    $("#card_amphur").attr('disabled', false);
                    $("#card_tambon").attr('disabled', true);
                },
                error: function() {}
            })
        });


        $("#card_amphur").change(function() {
            let district_id = $(this).val();
            $.ajax({
                url: '{{ route('getTambon') }}',
                type: 'GET',
                dataType: 'json',
                data: {
                    district_id: district_id,
                },
                success: function(data) {
                    $("#card_tambon").children().remove();
                    $("#card_tambon").append(` <option value=""> เลือกตำบล </option>`);
                    $("#card_zipcode").val("");
                    data.forEach((item) => {
                        $("#card_tambon").append(
                            `<option value="${item.id}">${item.name_th}</option>`
                        );
                    });
                    $("#card_tambon").attr('disabled', false);
                },
                error: function() {}
            })
        });
        // BEGIN district

        $("#card_tambon").change(function() {
            let tambon_id = $('#card_tambon').val();
            console.log(tambon_id);
            $.ajax({
                url: '{{ route('getZipcode') }}',
                type: 'GET',
                dataType: 'json',
                data: {
                    tambon_id: tambon_id,
                },
                success: function(data) {
                    // console.log(data);
                    $("#card_zipcode").attr('disabled', false);
                    $("#card_zipcode").val(data.zip_code);
                },
                error: function() {}
            })
        });
        //  END tambon

        $('#idcard_image').change(function() {
            var fileExtension = ['jpg', 'png', 'pdf', 'jpeg'];
            if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                alert("อัพโหลดเป็นภาพถ่ายเท่านั้น jpg,png,pdf,jpeg");
                this.value = '';
                return false;
            }
        });
        $('#user_idcard_image').change(function() {
            var fileExtension = ['jpg', 'png', 'pdf', 'jpeg'];
            if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                alert("อัพโหลดเป็นภาพถ่ายเท่านั้น jpg,png,pdf,jpeg");
                this.value = '';
                return false;
            }
        });

        $('#user_image').change(function() {
            var fileExtension = ['jpg', 'png', 'pdf', 'jpeg'];
            if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                alert("อัพโหลดเป็นภาพถ่ายเท่านั้น jpg,png,pdf,jpeg");
                this.value = '';
                return false;
            }
        });

        $('#bookbank_image').change(function() {
            var fileExtension = ['jpg', 'png', 'jpeg'];
            if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                alert("อัพโหลดเป็นภาพถ่ายเท่านั้น jpg,png,pdf,jpeg");
                this.value = '';
                return false;
            } else {
                var reader = new FileReader();
                reader.onload = function(e) {
                    // get loaded data and render thumbnail.
                    document.getElementById("preview").src = e.target.result;
                };
                // read the image file as a data URL.
                reader.readAsDataURL(this.files[0]);
            }

        });


        function copyCardAddress() {
            const isChecked = $(this).is(':checked')
            const card_house_no = $('#card_house_no');
            const card_house_name = $('#card_house_name');
            const card_moo = $('#card_moo');
            const card_soi = $('#card_soi');
            const card_road = $('#card_road');

            const card_changwat = $("#card_changwat").val();
            const card_amphur = $("#card_amphur").val();
            const card_tambon =  $("#card_tambon")..val();
            const card_zipcode =  $("#card_zipcode").val();

            if (isChecked) {
                house_no.val(card_house_no.val())
                house_name.val(card_house_name.val())
                moo.val(card_moo.val())
                soi.val(card_soi.val())
                road.val(card_road.val())

                $(`${province}`).val($(`${card_province}`).val()).trigger('change')
                $(`${zipcode}`).val($(`${card_zipcode}`).val())
            } else {
                house_no.val('')
                house_name.val('')
                moo.val('')
                soi.val('')
                road.val('')
                $(`${zipcode}`).val('')
                $(`${province}, ${amphures}`).val('').trigger('change')
            }
        }
    </script>
@endsection
