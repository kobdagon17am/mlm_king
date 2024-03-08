@extends('layouts.frontend.app')
@section('css')
    <link href="{{ asset('frontend/assets/css/pages/profile.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/dropify/dropify.min.css') }}">
    <link href="{{ asset('frontend/assets/css/pages/profile_edit.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/select2/select2.min.css') }}">
    <link href="{{ asset('frontend/assets/css/forms/form-widgets.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('frontend/assets/css/forms/multiple-step.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('frontend/assets/css/forms/radio-theme.css') }}" rel="stylesheet" type="text/css">
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
            <div class="row layout-top-spacing">
                <div class="col-lg-12 layout-spacing">
                    <div class="statbox widget box box-shadow mb-4">

                        <div class="widget-content widget-content-area">
                            <div class="form-group row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="card multiple-form-one px-0 pb-0 mb-3">
                                        {{-- <h5 class="text-center"><strong>Sign Up Your User Account</strong></h5>
                                        <p class="text-center">Fill all form field to go to next step</p>
                                        <div class="row"> --}}
                                        <div class="col-md-12 mx-0">

                                            <form id="msform" method="post" action="{{ route('Register_member') }}" enctype="multipart/form-data" >
                                                @csrf
                                                <input type="hidden" name="pay_type_id" id="pay_type_id">

                                                <ul id="progressbar">
                                                    <li class="active" id="account"><strong>ข้อมูลผู้มัคร</strong></li>
                                                    <li id="personal"><strong>ที่อยู่</strong></li>
                                                    <li id="payment"><strong>เอกสารและบัญชี</strong></li>
                                                    <li id="confirm"><strong>เลือกแพคเกจ/ซื้อสินค้า</strong></li>
                                                </ul>
                                                <fieldset>
                                                    <div class="form-card">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="upline_id">ภายใต้
                                                                        {{-- <span class="text-danger">*</span> --}}
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
                                                                    <label for="sponsor">ผู้แนะนำ</label>
                                                                    {{-- <span class="text-danger">* </span></label> --}}
                                                                    <input type="text"
                                                                        class="form-control @error('sponsor') is-invalid @enderror"
                                                                        name="sponsor" placeholder="ผู้แนะนำ"
                                                                        value="{{ $data['sponser_data']->first_name }} {{ $data['sponser_data']->last_name }} ( {{ $data['sponser_data']->username }} )"
                                                                        disabled>
                                                                    <input type="hidden" name="sponsor"
                                                                        value="{{ $data['sponser_data']->username }}">
                                                                    @error('sponsor')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror

                                                                    <input type="hidden" name="sponsor"
                                                                        value="{{ $data['sponser_data']->username }}">

                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="side">ฝั่งขา</label>
                                                                    {{-- <span class="text-danger">* </span></label> --}}
                                                                    @if($data['line_type_back']  == 'A')
                                                                    <?php
                                                                     $linetext = 'ซ้าย';
                                                                    ?>

                                                                    @else
                                                                    <?php
                                                                    $linetext = 'ขวา';
                                                                   ?>
                                                                    @endif
                                                                    <input type="text"
                                                                        class="form-control @error('side') is-invalid @enderror"
                                                                        placeholder="สาย"
                                                                        value="{{ $linetext }}" disabled>

                                                                    <input type="hidden" name="side" placeholder="สาย"
                                                                        value="{{ $data['line_type_back'] }}">
                                                                    @error('side')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="prefix">คำนำหน้าชื่อ
                                                                        <span class="text-danger"> </span></label>
                                                                    <select name="prefix" class="form-control"
                                                                        id="prefix">
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
                                                                        value="{{ old('firstname') }}" required>
                                                                    @error('firstname')
                                                                        <div class="invalid-feedback">{{ $message }}
                                                                        </div>
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
                                                                        value="{{ old('lastname') }}" required>
                                                                    @error('lastname')
                                                                        <div class="invalid-feedback">{{ $message }}
                                                                        </div>
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
                                                                        value="{{ old('businessname') }}" required>
                                                                    @error('businessname')
                                                                        <div class="invalid-feedback">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <div class="form-group">
                                                                    <label for="birthdate">วัน/เดือน/ปี เกิด
                                                                        <span class="text-danger">*</span></label>
                                                                    <div>
                                                                        <input type="date"
                                                                            class="form-control @error('birthdate') is-invalid @enderror"
                                                                            name="birthdate" placeholder="yyyy-mm-dd"
                                                                            value="{{ old('birthdate') }}" required>
                                                                        @error('birthdate')
                                                                            <div class="invalid-feedback">{{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="business_location"
                                                                value="1">
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
                                                                    <input type="text" maxlength="13"
                                                                        unique="customers"
                                                                        class="form-control @error('id_card') is-invalid @enderror"
                                                                        name="id_card" id="id_card"
                                                                        placeholder="หมายเลขบัตรประชาชน"
                                                                        value="{{ old('id_card') }}" required>
                                                                    @error('id_card')
                                                                        <div class="invalid-feedback">{{ $message }}
                                                                        </div>
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
                                                                        minlength="10" required>
                                                                    @error('phone')
                                                                        <div class="invalid-feedback">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="email">Email Address
                                                                        <span class="text-danger"></span></label>

                                                                    <input type="email"
                                                                        class="form-control @error('email') is-invalid @enderror"
                                                                        name="email" placeholder="email@example.com"
                                                                        value="{{ old('email') }}">
                                                                    @error('email')
                                                                        <div class="invalid-feedback">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="info-area col-md-12 text-right">
                                                                {{-- <button type="submit" class="btn btn-info mr-2">
                                                                    <i class="las la-save"></i> ยืนยันข้อมูลการสมัคร</button> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input type="button" name="next"
                                                        class="next action-button btn btn-primary" value="Next Step" />
                                                </fieldset>
                                                <fieldset>
                                                    <div class="form-card">

                                                        <h5 class="fs-title mb-4">
                                                            ที่อยู่สำหรับการติดต่อและจัดส่งผลิตภัณฑ์ถึงบ้าน
                                                            (DELIVERY ADDRESS)</h5>

                                                        </h6>
                                                        <hr>
                                                        <div class="row">
                                                            {{-- <div class="col-md-12">
                                                                <div class="form-group row">
                                                                    <div class="col-12 col-form-label">
                                                                        <div class="checkbox-inline">
                                                                            <label class="checkbox checkbox-success ">
                                                                                <input type="checkbox" class="p-2"
                                                                                    name="copy_card_address" id="copy_card_address"  >
                                                                                <span class="ml-2">
                                                                                    ที่อยู่ตามบัตรประชาชน</span></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div> --}}
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="sent_no">บ้านเลขที่
                                                                        <span class="text-danger">*
                                                                        </span></label>
                                                                    <input type="text"
                                                                        class="form-control @error('sent_no') is-invalid @enderror"
                                                                        name="sent_no" id="sent_no"
                                                                        placeholder="บ้านเลขที่"
                                                                        value="{{ old('sent_no') }}">
                                                                    @error('sent_no')
                                                                        <div class="invalid-feedback">{{ $message }}
                                                                        </div>
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
                                                                        name="sent_moo" id="sent_moo"
                                                                        placeholder="หมู่ที่"
                                                                        value="{{ old('sent_moo') }}" required>
                                                                    @error('sent_moo')
                                                                        <div class="invalid-feedback">{{ $message }}
                                                                        </div>
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
                                                                        name="sent_home_name" id="sent_home_name"
                                                                        placeholder="หมู่บ้าน/อาคาร"
                                                                        value="{{ old('sent_home_name') }}" required>
                                                                    @error('sent_home_name')
                                                                        <div class="invalid-feedback">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="sent_soi">ตรอก/ซอย
                                                                    </label>
                                                                    <input type="text"
                                                                        class="form-control @error('sent_soi') is-invalid @enderror"
                                                                        name="sent_soi" id="sent_soi"
                                                                        placeholder="ตรอก/ซอย"
                                                                        value="{{ old('sent_soi') }}">
                                                                    @error('sent_soi')
                                                                        <div class="invalid-feedback">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="sent_road">ถนน
                                                                    </label>
                                                                    <input type="text"
                                                                        class="form-control @error('sent_road') is-invalid @enderror"
                                                                        name="sent_road" id="sent_road" placeholder="ถนน"
                                                                        value="{{ old('sent_road') }}">
                                                                    @error('sent_road')
                                                                        <div class="invalid-feedback">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>



                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="sent_changwat">จังหวัด
                                                                        <span class="text-danger">*</span></label>

                                                                    <select name="sent_changwat"
                                                                        class="form-control basic" id="sent_changwat"
                                                                        required>
                                                                        <option value="">เลือกจังหวัด</option>
                                                                        @foreach ($data['provinces'] as $value_provinces)
                                                                            <option value="{{ $value_provinces->id }}"
                                                                                @if ($value_provinces->id == old('sent_province')) selected @endif>
                                                                                {{ $value_provinces->name_th }}</option>
                                                                        @endforeach
                                                                    </select>

                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="sent_amphur">เขต/อำเภอ
                                                                        <span class="text-danger">*</span></label>
                                                                    <select name="sent_amphur" class="form-control"
                                                                        id="sent_amphur" disabled required>
                                                                        <option value="">เลือกเขต/อำเภอ</option>

                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="sent_tambon">แขวง/ตำบล
                                                                        <span class="text-danger">*</span></label>
                                                                    <select name="sent_tambon" class="form-control"
                                                                        id="sent_tambon" disabled required>
                                                                        <option value="">เลือกแขวง/ตำบล</option>

                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="sent_zipcode">รหัสไปรษณีย์
                                                                        <span class="text-danger sent_zipcode_err _err">*
                                                                        </span></label>
                                                                    <input type="text"
                                                                        class="form-control @error('sent_zipcode') is-invalid @enderror"
                                                                        name="sent_zipcode" placeholder="รหัสไปรษณีย์"
                                                                        id="sent_zipcode"
                                                                        value="{{ old('sent_zipcode') }}" required
                                                                        disabled>
                                                                    @error('sent_zipcode')
                                                                        <div class="invalid-feedback">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="info-area col-md-12 text-right">
                                                                {{-- <button type="submit" class="btn btn-info mr-2">
                                                                <i class="las la-save"></i></i> ยืนยันข้อมูลการสมัคร</button> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input type="button" name="previous"
                                                        class="previous action-button-previous btn btn-outline-primary"
                                                        value="Previous" />
                                                    <input type="button" name="next"
                                                        class="next action-button btn btn-primary" value="Next Step" />
                                                </fieldset>
                                                <fieldset>
                                                    <div class="form-card">


                                                        <h6 class="font-16 mb-4"><b>ข้อมูลบัญชี (ACCOUNT DATA)</b></h6>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="acc_name">ชื่อบัญชี
                                                                    </label>
                                                                    <input type="text"
                                                                        class="form-control @error('acc_name') is-invalid @enderror"
                                                                        name="acc_name" placeholder="ชื่อบัญชี"
                                                                        value="{{ old('acc_name') }}">
                                                                    @error('acc_name')
                                                                        <div class="invalid-feedback">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="acc_no">เลขที่บัญชี
                                                                    </label>
                                                                    <input type="text"
                                                                        class="form-control @error('acc_no') is-invalid @enderror"
                                                                        name="acc_no" placeholder="เลขที่บัญชี"
                                                                        value="">
                                                                    @error('acc_no')
                                                                        <div class="invalid-feedback">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <div class="form-group">
                                                                        <label for="bank_name">ธนาคาร
                                                                            <span
                                                                                class="text-danger bank_err _err"></span></label>
                                                                        <select name="bank_name" class="form-control"
                                                                            id="bank_name">
                                                                            <option value="">เลือกธนาคาร</option>
                                                                            @foreach ($data['dataset_bank'] as $value_bank)
                                                                                <option
                                                                                    value="{{ $value_bank->bank_name }}">
                                                                                    {{ $value_bank->bank_name }}</option>
                                                                            @endforeach

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="bank_branch">สาขา
                                                                    </label>
                                                                    <input type="text"
                                                                        class="form-control @error('bank_branch') is-invalid @enderror"
                                                                        name="bank_branch" placeholder="สาขา"
                                                                        value="{{ old('bank_branch') }}">
                                                                    @error('bank_branch')
                                                                        <div class="invalid-feedback">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <div class="form-group">
                                                                        <label for="bank_type">ประเภท
                                                                            <span
                                                                                class="text-danger bank_err _err"></span></label>
                                                                        <select name="bank_type" class="form-control"
                                                                            id="bank_type">
                                                                            <option value="ออมทรัพย์" selected="">
                                                                                ออมทรัพย์</option>
                                                                            <option value="กระแสรายวัน">กระแสรายวัน
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>



                                                        </div>
                                                        <h6 class="font-16 mb-4"><b>ผู้สืบทอดผลประโยชน์</b></h6>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="benefitname">ชื่อ-นามสกุล ผู้รับผลประโยชน์
                                                                    </label>
                                                                    <input type="text" class="form-control"
                                                                        id="benefitname"
                                                                        placeholder="ชื่อ-นามสกุล ผู้รับผลประโยชน์">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="reletionship">ความสัมพันธ์
                                                                    </label>
                                                                    <input type="text" class="form-control"
                                                                        id="reletionship" placeholder="ความสัมพันธ์">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="id1">หมายเลขบัตรประชาชน
                                                                    </label>
                                                                    <input type="text" class="form-control"
                                                                        id="id1" placeholder="หมายเลขบัตรประชาชน">
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
                                                                    <input type="file" id="idcard_image"
                                                                        class="dropify"
                                                                        data-default-file="{{ asset('frontend/assets/img/idcard.png') }}"
                                                                        data-max-file-size="2M" required />
                                                                    {{-- <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i>
                                                                        อัปโหลดรูปภาพ</p> --}}
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="widget-header">
                                                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                                        <label
                                                                            for="bookbank_image">อัพโหลดภาพถ่ายหน้าบัญชีธนาคาร
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="upload text-center img-thumbnail">
                                                                    <input type="file" id="bookbank_image"
                                                                        class="dropify"
                                                                        data-default-file="{{ asset('frontend/assets/img/BookBank.png') }}"
                                                                        data-max-file-size="2M" />
                                                                    {{-- <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i>
                                                                        อัปโหลดรูปภาพ</p> --}}
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <input type="button" name="previous"
                                                        class="previous action-button-previous btn btn-outline-primary"
                                                        value="Previous" />
                                                    <input type="button" name="next"
                                                        class="next action-button btn btn-primary" value="Next Step" />



                                                </fieldset>
                                                <fieldset>
                                                    <div class="form-card">
                                                        <div class="row">

                                                            <div class="col-md-6">

                                                                <div class="alert alert-danger mb-4" role="alert">
                                                                    <div class="form-group">
                                                                        <label for="number_of_member"><b>จองรหัส</b>
                                                                            <span class="text-danger">*</span></label>
                                                                        <select name="number_of_member"
                                                                            class="form-control "id="number_of_member" >

                                                                            <option value="1">ทั่วไป (400 PV)</option>
                                                                            <option value="3">จอง 3 รหัส (1200 PV)
                                                                            </option>

                                                                        </select>
                                                                    </div>
                                                                </div>


                                                            </div>

                                                        </div>




                                                        <div class="statbox widget box box-shadow">
                                                            <div class="widget-header">
                                                                <div class="row">
                                                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                                        <h4>ซื้อสินค้า</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="widget-content widget-content-area">
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered mb-4">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="w-20">สินค้า</th>
                                                                                <th class="w-20">รายละเอียดสินค้า</th>
                                                                                <th class="w-20">ราคา (บาท)</th>
                                                                                <th class="w-20">PV</th>
                                                                                <th class="w-20">รวมราคา (บาท)</th>
                                                                                <th class="w-20">รวม PV</th>
                                                                                <th class="text-center w-5"
                                                                                    style="width: 250px">ACTION</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                            $product = \App\Http\Controllers\Frontend\CartGeneralController::product_detail_register('1');

                                                                            ?>
                                                                            @foreach ($product as $value)
                                                                                <?php
                                                                                $product = Cart::session('register')->get($value->id);
                                                                                if ($product) {
                                                                                    $quantity = $product->quantity;
                                                                                } else {
                                                                                    $quantity = 0;
                                                                                }
                                                                                ?>
                                                                                <tr>
                                                                                    <td>
                                                                                        <img src="{{ asset($value->product_image_url . '' . $value->product_image_name) }}"
                                                                                            alt="contact-img"
                                                                                            title="contact-img"
                                                                                            class="rounded-circle mr-3"
                                                                                            height="100" width="100"
                                                                                            style="object-fit: cover;">
                                                                                    </td>

                                                                                    <td><b>{{ $value->product_name }}</b>
                                                                                    </td>
                                                                                    <td
                                                                                        data-field="price_{{ $value->id }}">
                                                                                        {{ $value->product_price_member }}
                                                                                    </td>

                                                                                    <td
                                                                                        data-field="pv_{{ $value->id }}">
                                                                                        {{ $value->product_pv }} </td>

                                                                                    <td
                                                                                        data-field="price_total_{{ $value->id }}">
                                                                                    </td>
                                                                                    <td
                                                                                        data-field="pv_total_{{ $value->id }}">
                                                                                    </td>


                                                                                    <td>



                                                                                        <div class="p-l-0 m-b-30">
                                                                                            <div class="input-group">
                                                                                                <span
                                                                                                    class="input-group-btn">
                                                                                                    <button type="button"
                                                                                                        class="btn btn-default btn-number shadow-none btn-sm btn-block"
                                                                                                        data-type="minus"
                                                                                                        data-field="{{ $value->id }}">
                                                                                                        <i
                                                                                                            class="las la-minus-circle font-20"></i>
                                                                                                    </button>
                                                                                                </span>

                                                                                                <input type="text"
                                                                                                    id="quantity_{{ $value->id }}"
                                                                                                    name="{{ $value->id }}"
                                                                                                    class="form-control input-number text-center font-10"
                                                                                                    value="{{ $quantity }}"
                                                                                                    min="0"
                                                                                                    max="1000"
                                                                                                    onchange="quantity_change('{{ $value->id }}')">
                                                                                                <span
                                                                                                    class="input-group-btn">
                                                                                                    <button type="button"
                                                                                                        class="btn btn-default btn-number shadow-none btn-sm"
                                                                                                        data-type="plus"
                                                                                                        data-field="{{ $value->id }}">
                                                                                                        <i
                                                                                                            class="las la-plus-circle font-20"></i>
                                                                                                    </button>
                                                                                                </span>
                                                                                            </div>
                                                                                        </div>

                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="row">
                                                            <div class="col-lg-7 col-md-7 col-sm-12 col-12">

                                                                <div class="profile-shadow w-100 mt-4">
                                                                    <h5 class="font-16"><b>ที่อยู่ผู้รับสินค้า</b></h5>


                                                                    <div class="row">
                                                                        <div class="col-12 ml-4">
                                                                            <div class="form-group mb-4">
                                                                                <div class="radio-inline">
                                                                                    <label class="radio"
                                                                                        style="box-shadow: none;">
                                                                                        <input type="radio"
                                                                                            name="address_type_order"
                                                                                            onclick="sent_order(1)"
                                                                                            checked="checked"
                                                                                            value="1">
                                                                                        <span></span>จัดส่งตามที่อยู่ลงทะเบียน</label>
                                                                                    <label class="radio"
                                                                                        style="box-shadow: none;">
                                                                                        <input type="radio"
                                                                                            name="address_type_order"
                                                                                            onclick="sent_order(2)"
                                                                                            value="2">
                                                                                        <span></span>รับที่สาขา</label>
                                                                                    <label class="radio"
                                                                                        style="box-shadow: none;">
                                                                                        <input type="radio"
                                                                                            name="address_type_order"
                                                                                            onclick="sent_order(3)"
                                                                                            value="3">
                                                                                        <span></span>ที่อยู่อื่นๆ</label>
                                                                                </div>
                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                    <div class="row mt-3" id="address_check">

                                                                        <div class="col-md-12 mt-3">
                                                                            <div class="row" id="address_delivery">
                                                                                <div class="col-md-12">
                                                                                    <h4>ที่อยู่ตามที่ลงทะเบียนสมัครสมาชิก
                                                                                    </h4>
                                                                                </div>
                                                                            </div>


                                                                            <div class="row" id="address_branch"
                                                                                style="display: none">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="no_order">ชื่อผู้รับ
                                                                                            <span class="text-danger">*
                                                                                            </span></label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="sent_name_order"
                                                                                            id="sent_name_order"
                                                                                            placeholder="ชื่อผู้รับ"
                                                                                            required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="no_order">เบอร์โทรศัพท์
                                                                                            <span class="text-danger">*
                                                                                            </span></label>
                                                                                        <input type="text"
                                                                                            maxlength="10"
                                                                                            class="form-control"
                                                                                            name="sent_phone_order"
                                                                                            id="sent_phone_order"
                                                                                            placeholder="เบอร์โทรศัพท์"
                                                                                            required>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="no_order">เลือกสาขา
                                                                                            <span class="text-danger">*
                                                                                            </span></label>

                                                                                        <select class="form-control"
                                                                                            name="sent_branch_order"
                                                                                            required>
                                                                                            <option value="">
                                                                                                เลือกสาขา</option>

                                                                                            @foreach ($data['get_branch'] as $value)
                                                                                                <option
                                                                                                    value="{{ $value->id }}">
                                                                                                    {{ $value->branch_name }}
                                                                                                </option>
                                                                                            @endforeach


                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row" id="address_others"
                                                                                style="display: none">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="no_order">ชื่อผู้รับ
                                                                                            <span class="text-danger">*
                                                                                            </span></label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="sent_name_order"
                                                                                            id="sent_name_order"
                                                                                            placeholder="ชื่อผู้รับ"
                                                                                            required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="no_order">เบอร์โทรศัพท์
                                                                                            <span class="text-danger">*
                                                                                            </span></label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            maxlength="10"
                                                                                            name="sent_phone_order"
                                                                                            id="sent_phone_order"
                                                                                            placeholder="เบอร์โทรศัพท์"
                                                                                            required>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="no_order">บ้านเลขที่
                                                                                            <span class="text-danger">*
                                                                                            </span></label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="sent_no_order"
                                                                                            id="sent_no_order"
                                                                                            placeholder="บ้านเลขที่"
                                                                                            required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="moo_order">หมู่ที่
                                                                                            <span class="text-danger">*
                                                                                            </span></label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="sent_moo_order"
                                                                                            id="sent_moo_order"
                                                                                            placeholder="หมู่ที่" required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="homename_order">หมู่บ้าน/อาคาร
                                                                                            <span class="text-danger">*
                                                                                            </span></label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="sent_homename_order"
                                                                                            placeholder="หมู่บ้าน/อาคาร"
                                                                                            required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="soi_order">ตรอก/ซอย
                                                                                            <span class="text-danger">
                                                                                            </span></label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="sent_soi_order"
                                                                                            id="sent_soi_order"
                                                                                            placeholder="ตรอก/ซอย"
                                                                                            required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="road_order">ถนน
                                                                                            <span class="text-danger">
                                                                                            </span></label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="sent_road_order"
                                                                                            id="sent_road_order"
                                                                                            placeholder="ถนน">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="changwat_order">จังหวัด
                                                                                            <span
                                                                                                class="text-danger">*</span></label>
                                                                                        <select class="form-control"
                                                                                            name="sent_changwat_order"
                                                                                            id="sent_changwat_order"
                                                                                            required>
                                                                                            @foreach ($data['provinces'] as $value_provinces_order)
                                                                                                <option
                                                                                                    value="{{ $value_provinces_order->id }}"
                                                                                                    @if ($value_provinces_order->id == old('sent_province')) selected @endif>
                                                                                                    {{ $value_provinces_order->name_th }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="amphur_order">เขต/อำเภอ
                                                                                            <span
                                                                                                class="text-danger">*</span></label>
                                                                                        <select class="form-control"
                                                                                            name="sent_amphur_order"
                                                                                            id="sent_amphur_order"
                                                                                            required>
                                                                                            <option>เขต/อำเภอ</option>

                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="tambon_order">แขวง/ตำบล
                                                                                            <span
                                                                                                class="text-danger">*</span></label>
                                                                                        <select class="form-control"
                                                                                            name="sent_tambon_order"
                                                                                            id="sent_tambon_order"
                                                                                            required>
                                                                                            <option>แขวง/ตำบล</option>

                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="zipcode_order">รหัสไปรษณีย์
                                                                                            <span class="text-danger">*
                                                                                            </span></label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="sent_zipcode_order"
                                                                                            id="sent_zipcode_order"
                                                                                            placeholder="รหัสไปรษณีย์"
                                                                                            required>
                                                                                    </div>
                                                                                </div>

                                                                            </div>





                                                                        </div>


                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="col-lg-5 col-md-5 col-sm-12 col-12">
                                                                <div class="profile-shadow w-100 mt-4">
                                                                    <div class="border border-light p-3  rounded mb-3">
                                                                        <h5 class="mb-3"><b>สรุปยอดการสั่งซื้อสินค้า</b>
                                                                        </h5>
                                                                        <div class="table-responsive">
                                                                            <table class="table mb-0" id="ordertable"
                                                                                style="width:100%">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <h6>จำนวนสินค้า :</h6>
                                                                                        </td>
                                                                                        <td>
                                                                                            <strong id="quantity_bill">
                                                                                                ({{ $data['bill']['quantity'] }})
                                                                                                ชิ้น</strong>
                                                                                        </td>
                                                                                    </tr>

                                                                                    {{-- <tr>
                                                                                            <td>
                                                                                                <h6>Vat (7.00%) :</h6>
                                                                                            </td>
                                                                                            <td>
                                                                                                <h6>฿200</h6>
                                                                                            </td>
                                                                                        </tr> --}}

                                                                                        <tr>
                                                                                            <td>
                                                                                                <h6>ราคาสินค้า :</h6>
                                                                                            </td>
                                                                                            <td>
                                                                                                <strong class=""
                                                                                                    id="price_total">
                                                                                                    {{ $data['bill']['price_total'] }}
                                                                                                    บาท</strong>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <h6>ค่าจัดส่ง :</h6>
                                                                                            </td>
                                                                                            <td>
                                                                                                <strong class="" id="shipping">
                                                                                                {{ $data['bill']['shipping'] }}
                                                                                                บาท</strong>
                                                                                                <h6 ></h6>
                                                                                            </td>
                                                                                        </tr>

                                                                                    <tr>
                                                                                        <th>คะแนนที่ได้รับ :</th>
                                                                                        <th><strong class="text-success"
                                                                                                id="pv">
                                                                                                {{ $data['bill']['pv_total'] }}
                                                                                                PV</th>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>ยอดชำระทั้งหมด :</th>
                                                                                        <th id="price_total_tax_ship">
                                                                                            {{ $data['bill']['price_total'] }}
                                                                                            บาท</th>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>


                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                                                                <div class="profile-shadow w-100 mt-4">
                                                                    <h5 class="font-16"><b>การชำระเงิน</b></h5>
                                                                    <hr>
                                                                    <h6 class="font-16 ml-4"><b>รูปแบบการชำระ</b></h6>
                                                                    <div class="widget-content widget-content-area tab-horizontal-line">
                                                                        <ul class="nav nav-tabs mb-3" id="animateLine"
                                                                            role="tablist">

                                                                            <li class="nav-item">
                                                                                <a class="nav-link active"
                                                                                    id="animated-underline-about-tab"
                                                                                    data-toggle="tab"
                                                                                    href="#animated-underline-about"
                                                                                    role="tab"
                                                                                    aria-controls="animated-underline-about"
                                                                                    aria-selected="true">
                                                                                    ชำระเงินออนไลน์</a>
                                                                            </li>


                                                                            <li class="nav-item">
                                                                                <a class="nav-link"
                                                                                    id="animated-underline-home-tab"
                                                                                    data-toggle="tab"
                                                                                    href="#animated-underline-kasad"
                                                                                    role="tab"
                                                                                    aria-controls="animated-underline-home"
                                                                                    aria-selected="false">
                                                                                    บัตรเกษตรสุขใจ</a>
                                                                            </li>

                                                                            <li class="nav-item">
                                                                                <a class="nav-link " id="animated-underline-bank-tab"
                                                                                    data-toggle="tab" href="#animated-underline-bank" role="tab"
                                                                                    aria-controls="animated-underline-bank" aria-selected="false"> โอนชำระ</a>
                                                                            </li>


                                                                        </ul>
                                                                        <div class="tab-content"
                                                                            id="animateLineContent-4">

                                                                            <div class="tab-pane fade active show"
                                                                                id="animated-underline-about"
                                                                                role="tabpanel"
                                                                                aria-labelledby="animated-underline-about-tab">
                                                                                <div class="text-center">
                                                                                    <img src="{{ asset('frontend/assets/img/thai_qr_payment.png')}}"
                                                                                        class="img-fluid mx-auto rounded"
                                                                                        alt="Responsive image">
                                                                                </div>

                                                                                <div class="col-md-12 text-center">
                                                                                    <div class="align-items-center mt-5  btn-list">

                                                                                        <button type="button"
                                                                                            onclick="submit_confirm(1,'qr_payment')"
                                                                                            class="action-button btn btn-primary"
                                                                                            value="qr">ชำระเงินออนไลน์
                                                                                        </button>


                                                                                    </div>
                                                                                </div>
                                                                            </div>



                                                                            <div class="tab-pane fade"
                                                                                id="animated-underline-kasad"
                                                                                role="tabpanel"
                                                                                aria-labelledby="animated-underline-home-tab">
                                                                                <div class="row">
                                                                                    <div class="col-md-6 col-sm-12 col-12">
                                                                                        <div class="text-center">
                                                                                            <img src="{{ asset('frontend/assets/img/w960.jpg')}}"
                                                                                                class="img-fluid mx-auto"
                                                                                                alt="Responsive image">

                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="col-md-6 col-sm-12 col-12 text-center">
                                                                                        <div class="row">
                                                                                            <div
                                                                                                class="col-lg-12 col-md-12 col-sm-12 col-12">
                                                                                                <label
                                                                                                    for="img_card"><b>อัพโหลดหน้าบัตรเกษตรสุขใจ</b></label>
                                                                                                <div
                                                                                                    class="upload text-center img-thumbnail">
                                                                                                    <input type="file"
                                                                                                        id="img_pay"
                                                                                                        name="img_pay"
                                                                                                        class="dropify"
                                                                                                        data-default-file="{{ asset('frontend/assets/img/AGRI-OR-BIO-DESEL-.jpg') }}"
                                                                                                        required>
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>

                                                                                        <div class="row">
                                                                                            <div
                                                                                                class="col-lg-12 col-md-12 col-sm-12 col-12">
                                                                                                <label
                                                                                                    for="slip_image_idcard"><b>ภาพถ่ายบัตรประชาชน</b></label>
                                                                                                <div
                                                                                                    class="upload text-center img-thumbnail">
                                                                                                    <input type="file"
                                                                                                        id="img_idcard_pay"
                                                                                                        name="img_idcard_pay"
                                                                                                        class="dropify"
                                                                                                        data-default-file="{{ asset('frontend/assets/img/idcard.png') }}"
                                                                                                        required>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="col-lg-12 col-md-12 col-sm-12 col-12">

                                                                                                    <div class="row">
                                                                                                        <div
                                                                                                            class="col-lg-12 col-md-12 col-sm-12 col-12">
                                                                                                            <div
                                                                                                                class="form-group">
                                                                                                                <label
                                                                                                                    for="phone">หมายเลขโทรศัพท์
                                                                                                                    <span
                                                                                                                        class="text-danger">*</span></label>
                                                                                                                <input
                                                                                                                    type="text"
                                                                                                                    class="form-control @error('phone_pay') is-invalid @enderror"
                                                                                                                    name="phone_pay"
                                                                                                                    placeholder="หมายเลขโทรศัพท์"
                                                                                                                    value="{{ old('phone_pay') }}"
                                                                                                                    maxlength="10"
                                                                                                                    minlength="10"
                                                                                                                    required>
                                                                                                                @error('phone_pay')
                                                                                                                    <div
                                                                                                                        class="invalid-feedback">
                                                                                                                        {{ $message }}
                                                                                                                    </div>
                                                                                                                @enderror
                                                                                                            </div>


                                                                                                        </div>
                                                                                                        <input
                                                                                                            type="hidden"
                                                                                                            name="make_payment"
                                                                                                            id="make_payment">
                                                                                                        <div
                                                                                                            class="col-lg-12 col-md-12 col-sm-12 col-12">
                                                                                                            <button
                                                                                                                type="button"
                                                                                                                onclick="submit_confirm(4,'trafer')"
                                                                                                                class="action-button btn btn-primary"
                                                                                                                value="tranfer">ชำระเงินบัตรเกตรสุขใจ
                                                                                                            </button>

                                                                                                        </div>

                                                                                                    </div>

                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="tab-pane fade" id="animated-underline-bank"
                                                                            role="tabpanel" aria-labelledby="animated-underline-bank-tab">
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="text-center">
                                                                                        <img src="{{ asset('frontend/assets/img/scb.png') }}"
                                                                                            class="img-fluid mx-auto" alt="Responsive image">
                                                                                        <p class="font-20"><b>xxxx</b></p>
                                                                                        <p class="font-13">ธนาคารไทยพาณิชย์</p>
                                                                                        <p class="font-13">บริษัท กิ่งทองใบหยก จำกัด</p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6 text-center">
                                                                                    <label
                                                                                        for="slip_image"><b>อัพโหลดหลักฐานการชำระเงิน</b></label>
                                                                                    <div class="upload text-center img-thumbnail">
                                                                                        <input type="file" id="slip_image" name="slip_image"
                                                                                            class="dropify" data-default-file="">
                                                                                    </div>

                                                                                    <div
                                                                                    class="col-lg-12 col-md-12 col-sm-12 col-12">
                                                                                    <button
                                                                                        type="button"
                                                                                        onclick="submit_confirm(5,'trafer_bank')"
                                                                                        class="action-button btn btn-primary"
                                                                                        value="tranfer">โอนชำระ
                                                                                    </button>

                                                                                </div>
                                                                                </div>

                                                                            </div>


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                </fieldset>
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



    <input type="hidden" id="pv_total_js" value="{{ $data['bill']['pv_total_js'] }}">
    </div>
@endsection
@section('js')
    <script src="{{ asset('frontend/plugins/dropify/dropify.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/pages/profile_edit.js') }}"></script>

    <script src="{{ asset('frontend/plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/forms/custom-select2.js') }}"></script>

    <script src="{{ asset('frontend/assets/js/forms/multiple-step-register.js') }}"></script>



    <script>
        function sent_order(type) {
            if (type == 1) {
                $("#address_delivery").show();
                $("#address_branch").hide();
                $("#address_others").hide();
            }

            if (type == 2) {
                $("#address_delivery").hide();
                $("#address_branch").show();
                $("#address_others").hide();
            }

            if (type == 3) {
                $("#address_delivery").hide();
                $("#address_branch").hide();
                $("#address_others").show();
            }

        }

        function submit_confirm(pay_type, type) {
            $('#make_payment').val(type);

            if (pay_type == 4) {

                var $fileInput1 = $('#img_pay');

                // Check if the file input is empty or null
                if ($fileInput1[0].files.length === 0) {
                    // File input is empty
                    alert("กรุณาเพิ่มข้อมูลภาพบัตรเกษตรสุขใจ");
                    console.log('File input is empty.');
                    return; // หยุดการทำงานของ each

                }

                var $fileInput = $('#img_idcard_pay');

                // Check if the file input is empty or null
                if ($fileInput[0].files.length === 0) {
                    // File input is empty
                    alert("กรุณาเพิ่มข้อมูลภาพถ่ายบัตรประชาชน");
                    console.log('File input is empty.');
                    return; // หยุดการทำงานของ each

                }


                var $phonePayInput = $('[name="phone_pay"]');

                // Check if the input value is null or empty
                if ($phonePayInput.val() === null || $phonePayInput.val().trim() === '') {
                    // Input is null or empty
                    alert("กรุณากรอกหมายเลขโทรศัพท์");
                    console.log('Phone pay input is null or empty.');
                    return; // หยุดการทำงานของ each

                }
            }

            if (pay_type == 5) {
                var $fileInput_slip = $('#slip_image');

                // Check if the file input is empty or null
                if ($fileInput_slip[0].files.length === 0) {
                    // File input is empty
                    alert("กรุณาเพิ่มข้อมูลสลิปการโอนเงิน");
                    console.log('File input is empty.');
                    return; // หยุดการทำงานของ each

                }

            }


            $('#pay_type_id').val(pay_type);
            var address_type_order = $('[name="address_type_order"]:checked').val();
            foundEmpty = false;
            if (address_type_order == 2) {
                $('#address_branch input[required]').each(function() {
                    var value = $(this).val();
                    // ถ้าค่าว่างให้แสดง alert
                    if (!value.trim()) {
                        alert("กรุณากรอกข้อมูล ที่อยู่ผู้รับสินค้า ให้ครบทุกช่อง");
                        foundEmpty = true;
                        return false; // หยุดการทำงานของ each
                    }
                });

                // ตรวจสอบว่าพบค่าว่างหรือไม่
                if (foundEmpty == true) {
                    // ไม่ทำงาน js ด้านล่างต่อ
                    return;
                }


                $('#address_branch select[required]').each(function() {
                    var value = $(this).val();
                    // ถ้าค่าว่างให้แสดง alert
                    if (!value.trim()) {
                        alert("กรุณาเลือกเลือกสาขา");
                        foundEmpty = true;
                        return false; // หยุดการทำงานของ each
                    }
                });

                // ตรวจสอบว่าพบค่าว่างหรือไม่
                if (foundEmpty == true) {
                    // ไม่ทำงาน js ด้านล่างต่อ
                    return;
                }


            }



            if (address_type_order == 3) {
                $('#address_others input[required]').each(function() {
                    var value = $(this).val();
                    // ถ้าค่าว่างให้แสดง alert
                    if (!value.trim()) {
                        alert("กรุณากรอกข้อมูล ที่อยู่ผู้รับสินค้า ให้ครบทุกช่อง");
                        foundEmpty = true;
                        return false; // หยุดการทำงานของ each
                    }
                });

                // ตรวจสอบว่าพบค่าว่างหรือไม่
                if (foundEmpty == true) {
                    // ไม่ทำงาน js ด้านล่างต่อ
                    return;
                }


                $('#address_others select[required]').each(function() {
                    var value = $(this).val();
                    // ถ้าค่าว่างให้แสดง alert
                    if (!value.trim()) {
                        alert("กรุณาเลือกข้อมูล ที่อยู่ผู้รับสินค้า");
                        foundEmpty = true;
                        return false; // หยุดการทำงานของ each
                    }
                });

                // ตรวจสอบว่าพบค่าว่างหรือไม่
                if (foundEmpty == true) {
                    // ไม่ทำงาน js ด้านล่างต่อ
                    return;

                }
            }


            number_of_member = $('#number_of_member').val();
            pv_total_js = $('#pv_total_js').val();
            if (number_of_member == 1) {
                if (pv_total_js >= 400) {

                    swal({
                        title: 'ยืนยันการสมัครสมาชิก',
                        text: "ยืนยันการสมัครสมาชิกทั่วไปจอง 1 รหัส 400 pv",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Confirm',
                        padding: '2em'
                    }).then(function(result) {
                        if (result.value) {
                            $("#msform").submit();
                            // swal(
                            // 'Deleted!',
                            // 'Your file has been deleted.',
                            // 'success'
                            // )
                        }
                    })

                } else {
                    alert("ต้องสั่งซื้อสินค้ามากกว่า 400 pv ขึ้นไป");
                    return;
                }

            }

            if (number_of_member == 3) {
                if (pv_total_js >= 1200) {


                    swal({
                        title: 'ยืนยันการสมัครสมาชิก',
                        text: "ยืนยันการสมัครสมาชิกทั่วไปจอง 1 รหัส 1,200 pv",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Confirm',
                        padding: '2em'
                    }).then(function(result) {
                        if (result.value) {
                            $("#msform").submit();
                            //     swal(
                            //     'Deleted!',
                            //     'Your file has been deleted.',
                            //     'success'
                            //     )
                        }
                    })

                } else {
                    alert("ต้องสั่งซื้อสินค้ามากกว่า 1,200 pv ขึ้นไป");
                    return;
                }

            }

        }




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
                                        $('span.error').addClass('text-success').text(
                                            'เลขบัตรถูกต้อง');
                                    } else {
                                        $('span.error').addClass('text-danger');
                                        $('span.error').removeClass('text-success').text(
                                            'มีเลขบัตรประชาชนในระบบแล้วไม่สามารถสมัครซ้ำได้');
                                        $('#id_card').val('');
                                        Swal.fire({
                                            type: 'error',
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
                                    type: 'error',
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
            var RE =
                /^-?(0|INF|(0[1-7][0-7]*)|(0x[0-9a-fA-F]+)|((0|[1-9][0-9]*|(?=[\.,]))([\.,][0-9]+)?([eE]-?\d+)?))$/;
            return (RE.test(input));
        }


        $("#sent_changwat_order").change(function() {
            let province_id = $(this).val();
            $.ajax({
                url: '{{ route('getDistrict') }}',
                type: 'GET',
                dataType: 'json',
                data: {
                    province_id: province_id,
                },
                success: function(data) {
                    $("#sent_amphur_order").children().remove();
                    $("#sent_tambon_order").children().remove();
                    $("#sent_amphur_order").append(` <option value=""> เลือกอำเภอ </option>`);
                    $("#sent_tambon_order").append(` <option value=""> เลือกตำบล </option>`);
                    $("#sent_zipcode_order").val("");
                    data.forEach((item) => {
                        $("#sent_amphur_order").append(
                            `<option value="${item.id}">${item.name_th}</option>`
                        );

                    });
                    $("#sent_amphur_order").attr('disabled', false);
                    $("#sent_tambon_order").attr('disabled', true);
                },
                error: function() {}
            })
        });


        $("#sent_amphur_order").change(function() {
            let district_id = $(this).val();
            $.ajax({
                url: '{{ route('getTambon') }}',
                type: 'GET',
                dataType: 'json',
                data: {
                    district_id: district_id,
                },
                success: function(data) {
                    $("#sent_tambon_order").children().remove();
                    $("#sent_tambon_order").append(` <option value=""> เลือกตำบล </option>`);
                    $("#sent_zipcode_order").val("");
                    data.forEach((item) => {
                        $("#sent_tambon_order").append(
                            `<option value="${item.id}">${item.name_th}</option>`
                        );
                    });
                    $("#sent_tambon_order").attr('disabled', false);
                },
                error: function() {}
            })
        });
        // BEGIN district

        $("#sent_tambon_order").change(function() {
            let tambon_id = $('#sent_tambon_order').val();
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
                    $("#sent_zipcode_order").attr('disabled', false);
                    $("#sent_zipcode_order").val(data.zip_code);
                },
                error: function() {}
            })
        });
        //  END tambon


        $("#sent_changwat").change(function() {
            let province_id = $(this).val();
            $.ajax({
                url: '{{ route('getDistrict') }}',
                type: 'GET',
                dataType: 'json',
                data: {
                    province_id: province_id,
                },
                success: function(data) {
                    $("#sent_amphur").children().remove();
                    $("#sent_tambon").children().remove();
                    $("#sent_amphur").append(` <option value=""> เลือกอำเภอ </option>`);
                    $("#sent_tambon").append(` <option value=""> เลือกตำบล </option>`);
                    $("#sent_zipcode").val("");
                    data.forEach((item) => {
                        $("#sent_amphur").append(
                            `<option value="${item.id}">${item.name_th}</option>`
                        );

                    });
                    $("#sent_amphur").attr('disabled', false);
                    $("#sent_tambon").attr('disabled', true);
                },
                error: function() {}
            })
        });


        $("#sent_amphur").change(function() {
            let district_id = $(this).val();
            $.ajax({
                url: '{{ route('getTambon') }}',
                type: 'GET',
                dataType: 'json',
                data: {
                    district_id: district_id,
                },
                success: function(data) {
                    $("#sent_tambon").children().remove();
                    $("#sent_tambon").append(` <option value=""> เลือกตำบล </option>`);
                    $("#sent_zipcode").val("");
                    data.forEach((item) => {
                        $("#sent_tambon").append(
                            `<option value="${item.id}">${item.name_th}</option>`
                        );
                    });
                    $("#sent_tambon").attr('disabled', false);
                },
                error: function() {}
            })
        });
        // BEGIN district

        $("#sent_tambon").change(function() {
            let tambon_id = $('#sent_tambon').val();
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
                    $("#sent_zipcode").attr('disabled', false);
                    $("#sent_zipcode").val(data.zip_code);
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

        $('#copy_card_address').on('change', copyCardAddress)

        function copyCardAddress() {


            const isChecked = $(this).is(':checked')
            const card_no = $('#card_no');
            const card_moo = $('#card_moo');
            const card_home_name = $('#card_home_name');

            const card_soi = $('#card_soi');
            const card_road = $('#card_road');

            const card_changwat = $("#card_changwat").val();
            const card_amphur = $("#card_amphur").val();
            const card_tambon = $("#card_tambon").val();
            const card_zipcode = $("#card_zipcode").val();


            const sent_no = $('#sent_no');
            const sent_home_name = $('#sent_home_name');
            const sent_moo = $('#sent_moo');
            const sent_soi = $('#sent_soi');
            const sent_road = $('#sent_road');


            const sent_changwat = '#sent_changwat';
            const sent_amphures = '#sent_amphures';
            const sent_tambon = '#sent_tambon';
            const sent_zipcode = '#sent_zipcode';



            if (isChecked) {


                sent_no.val(card_no.val())
                sent_home_name.val(card_home_name.val())
                sent_moo.val(card_moo.val())
                sent_soi.val(card_soi.val())
                sent_road.val(card_road.val())

                $(`${sent_changwat}`).val($(`${card_changwat}`).val()).trigger('change')
                $(`${sent_zipcode}`).val($(`${card_zipcode}`).val())
            } else {

                sent_no.val('')
                sent_home_name.val('')
                sent_moo.val('')
                sent_soi.val('')
                sent_road.val('')
                $(`${sent_zipcode}`).val('')
                $(`${sent_changwat}, ${sent_amphures}`).val('').trigger('change')
            }
        }
    </script>

    <script>
        $('.input-number').change();

        $('.btn-number').on('click', function() {
            const type = $(this).data('type');
            const fieldName = $(this).data('field');

            let input = $('input[name=' + fieldName + ']');
            let currentVal = parseInt(input.val());

            if (!isNaN(currentVal)) {
                if (type == 'minus' && currentVal > 0) {
                    input.val(currentVal - 1).change();
                } else if (type == 'plus') {
                    input.val(currentVal + 1).change();
                }
            } else {
                input.val(0);
            }

            if (input.val() > 0) {
                input.prev().attr('disabled', false);
            } else {
                input.prev().attr('disabled', true);
            }

            calculateSumPriceAndPv(fieldName, input.val())
        });


        function calculateSumPriceAndPv(fieldName, inputVal) {

            const price = parseInt($(`[data-field='price_${fieldName}']`).text());
            const pv = parseInt($(`[data-field='pv_${fieldName}']`).text());

            const priceTotal = $(`[data-field='price_total_${fieldName}']`);
            const pvTotal = $(`[data-field='pv_total_${fieldName}']`);

            console.log(priceTotal);

            if (inputVal > 0) {
                priceTotal.text(numberWithCommas(price * inputVal))
                pvTotal.text(pv * inputVal)
            } else {
                priceTotal.text('')
                pvTotal.text('')
            }
        }

        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

        function quantity_change(item_id) {

            var qty = $('#quantity_' + item_id).val();
            var type = 'register';

            $.ajax({
                    url: '{{ route('edit_item_register') }}',
                    type: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        item_id: item_id,
                        'qty': qty,
                        'type': type
                    },
                })
                .done(function(data) {

                    var eror_id = 'eror_' + data['action_id'];
                    $('#' + eror_id).html('');
                    $('#price').html(data['price_total']);
                    $('#quantity_bill').html('(' + data['quantity'] + ') ชิ้น');
                    $('#price_total').html(data['price_total'] + ' บาท');

                    $('#price_total_tax_ship').html(data['price_total'] + ' บาท');
                    $('#pv').html(data['pv_total'] + ' PV');
                    $('#pv_total_js').val(data['pv_total_js']);
                    $('#shipping').html(data['shipping']+ ' บาท');
                    calculateSumPriceAndPv(item_id, qty)
                    console.log(data);
                    console.log("success");
                })
                .fail(function() {
                    console.log("error");
                })
                .always(function() {
                    console.log("complete");
                });
        }
    </script>
@endsection
