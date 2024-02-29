@extends('layouts.frontend.app')
@section('css')
    <link href="{{ asset('frontend/plugins/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend/assets/css/ui-elements/pagination.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend/assets/css/elements/tooltip.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend/assets/css/apps/ecommerce.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/dropify/dropify.min.css') }}">
    <link href="{{ asset('frontend/assets/css/forms/radio-theme.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/ui-elements/alert.css') }}">
@endsection
@section('content')
    <div id="content" class="main-content">
        <!--  Navbar Starts / Breadcrumb Area Starts -->
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
                                    <li class="breadcrumb-item active" aria-current="page"><span>สรุปการสั่งซื้อ</span>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </li>
                </ul>
            </header>
        </div>
        <!--  Navbar Ends / Breadcrumb Area Ends -->
        <!-- Main Body Starts -->


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
                    <div class="widget-content widget-content-area">

                        <form id="msform" method="post"  action="{{ route('confirm_cart') }}" enctype="multipart/form-data" >
                            @csrf
                        <div class="row">

                            <div class="col-md-7">
                                <div class="card-box">
                                    <div class="profile-shadow w-100">
                                        <h5 class="font-16"><b>การสั่งซื้อ</b></h5>
                                        <hr>
                                        <h6 class="font-16 ml-4"><b>รูปแบบการสั่งซื้อ</b></h6>
                                        <div class="row mt-3">
                                            <div class="col-6 ml-4">
                                                <div class="radio-inline">
                                                    <label class="radio radio-outline radio-outline-2x radio-primary ml-4">
                                                        <input type="radio" name="bill_type" checked="checked" value="TopUp">
                                                        <span></span>TopUp</label>
                                                    <label class="radio radio-outline radio-outline-2x radio-primary ml-4">
                                                        <input type="radio" name="bill_type" value="BillHold">
                                                        <span></span>Bill Hold</label>
                                                </div>

                                            </div>
                                        </div>
                                        <h6 class="font-16 ml-4"><b>เลือกสมาชิก</b></h6>
                                        <div class="row mt-3">
                                            <div class="col-6 ml-4">
                                                <div class="form-group">

                                                    <select name="user_name_send" id="user_name_send" class="form-control basic" required>
                                                        <option value="">เลือกสมาชิก</option>
                                                        @foreach ($data['bill']['user_all']['username'] as $value)
                                                            <option value="{{ $value }}">
                                                                {{ $value }}
                                                                ({{ $data['bill']['user_all']['name'][$value] }})</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>
                                        </div>


                                        <div class="profile-shadow w-100 mt-4">
                                            <h6 class="font-16 mt-2"><b>ที่อยู่ผู้รับสินค้า</b></h6>


                                            <div class="row">
                                                <div class="col-12 ml-4">
                                                    <div class="form-group mb-4">
                                                        <div class="radio-inline">
                                                            <label class="radio" style="box-shadow: none;">
                                                                <input type="radio" name="address_type_order"
                                                                    onclick="sent_order(1)" checked="checked"
                                                                    value="1">
                                                                <span></span>จัดส่งตามที่อยู่ลงทะเบียน</label>
                                                            <label class="radio" style="box-shadow: none;">
                                                                <input type="radio" name="address_type_order"
                                                                    onclick="sent_order(2)" value="2">
                                                                <span></span>รับที่สาขา</label>
                                                            <label class="radio" style="box-shadow: none;">
                                                                <input type="radio" name="address_type_order"
                                                                    onclick="sent_order(3)" value="3">
                                                                <span></span>ที่อยู่อื่นๆ</label>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="row mt-3" id="address_check">

                                                <div class="col-md-12 mt-3">
                                                    <div class="row" id="address_delivery">
                                                        @if ($data['customers_address_delivery'])
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="no_order">ชื่อผู้รับ
                                                                        <span class="text-danger">*
                                                                        </span></label>
                                                                    <input type="text" class="form-control"
                                                                        name="sent_name_order_regis"
                                                                        id="sent_name_order_regis"
                                                                        placeholder="ชื่อผู้รับ"
                                                                        value="{{ Auth::guard('c_user')->user()->first_name }} {{ Auth::guard('c_user')->user()->last_name }}"
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="no_order">เบอร์โทรศัพท์
                                                                        <span class="text-danger">*
                                                                        </span></label>
                                                                    <input type="text" class="form-control"
                                                                        maxlength="10" name="sent_phone_order_regis"
                                                                        id="sent_phone_order_regis"
                                                                        placeholder="เบอร์โทรศัพท์"
                                                                        value="{{ Auth::guard('c_user')->user()->phone }}"
                                                                        required>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="no_order">บ้านเลขที่
                                                                        <span class="text-danger">*
                                                                        </span></label>
                                                                    <input type="text" class="form-control"
                                                                        name="sent_no_order_regis"
                                                                        id="sent_no_order_regis" placeholder="บ้านเลขที่"
                                                                        value="{{ $data['customers_address_delivery']->sent_no }}"
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="moo_order">หมู่ที่
                                                                        <span class="text-danger">*
                                                                        </span></label>
                                                                    <input type="text" class="form-control"
                                                                        name="sent_moo_order_regis"
                                                                        id="sent_moo_order_regis" placeholder="หมู่ที่"
                                                                        value="{{ $data['customers_address_delivery']->sent_moo }}"
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="homename_order">หมู่บ้าน/อาคาร
                                                                        <span class="text-danger">*
                                                                        </span></label>
                                                                    <input type="text" class="form-control"
                                                                        name="sent_homename_order_regis"
                                                                        placeholder="หมู่บ้าน/อาคาร"
                                                                        value="{{ $data['customers_address_delivery']->sent_home_name }}"
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="soi_order">ตรอก/ซอย
                                                                        <span class="text-danger">
                                                                        </span></label>
                                                                    <input type="text" class="form-control"
                                                                        name="sent_soi_order_regis"
                                                                        id="sent_soi_order_regis" placeholder="ตรอก/ซอย"
                                                                        value="{{ $data['customers_address_delivery']->sent_soi }}"
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="road_order">ถนน
                                                                        <span class="text-danger">
                                                                        </span></label>
                                                                    <input type="text" class="form-control"
                                                                        name="sent_road_order_regis"
                                                                        id="sent_road_order_regis"
                                                                        value="{{ $data['customers_address_delivery']->sent_road }}"
                                                                        placeholder="ถนน">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="changwat_order">จังหวัด
                                                                        <span class="text-danger">*</span></label>
                                                                    <select class="form-control"
                                                                        name="sent_changwat_order_regis"
                                                                        id="sent_changwat_order_regis" required>

                                                                        <option
                                                                            value="{{ $data['customers_address_delivery']->sent_province_id_fk }}">
                                                                            {{ $data['customers_address_delivery']->sent_province }}
                                                                        </option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="amphur_order">เขต/อำเภอ
                                                                        <span class="text-danger">*</span></label>
                                                                    <select class="form-control"
                                                                        name="sent_amphur_order_regis"
                                                                        id="sent_amphur_order_regis" required>
                                                                        <option
                                                                            value="{{ $data['customers_address_delivery']->sent_district_id_fk }}">
                                                                            {{ $data['customers_address_delivery']->sent_district }}
                                                                        </option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="tambon_order">แขวง/ตำบล
                                                                        <span class="text-danger">*</span></label>
                                                                    <select class="form-control"
                                                                        name="sent_tambon_order_regis"
                                                                        id="sent_tambon_order_regis" required>
                                                                        <option
                                                                            value="{{ $data['customers_address_delivery']->sent_tambon_id_fk }}">
                                                                            {{ $data['customers_address_delivery']->sent_tambon }}
                                                                        </option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="zipcode_order">รหัสไปรษณีย์
                                                                        <span class="text-danger">*
                                                                        </span></label>
                                                                    <input type="text" class="form-control"
                                                                        name="sent_zipcode_order_regis"
                                                                        id="sent_zipcode_order_regis"
                                                                        placeholder="รหัสไปรษณีย์"
                                                                        value="{{ $data['customers_address_delivery']->sent_zipcode }}">
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <div class="alert alert-light-warning text-warning mb-4"
                                                                        role="alert">

                                                                        <strong>ไม่พบที่อยู่ในการจัดส่งสินค้า !</strong> <a
                                                                            href="{{ route('Profile') }}"
                                                                            class="btn btn-sm bg-gradient-warning float-right mr-2 text-white">
                                                                            เพิ่มที่อยู่
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>


                                                    <div class="row" id="address_branch" style="display: none">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="no_order">ชื่อผู้รับ
                                                                    <span class="text-danger">*
                                                                    </span></label>
                                                                <input type="text" class="form-control"
                                                                    name="sent_name_order" id="sent_name_order"
                                                                    placeholder="ชื่อผู้รับ"
                                                                    value="{{ Auth::guard('c_user')->user()->first_name }} {{ Auth::guard('c_user')->user()->last_name }}"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="no_order">เบอร์โทรศัพท์
                                                                    <span class="text-danger">*
                                                                    </span></label>
                                                                <input type="text" maxlength="10" class="form-control"
                                                                    name="sent_phone_order" id="sent_phone_order" placeholder="เบอร์โทรศัพท์" value="{{ Auth::guard('c_user')->user()->phone }}" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="no_order">เลือกสาขา
                                                                    <span class="text-danger">*
                                                                    </span></label>

                                                                <select class="form-control" name="sent_branch_order"
                                                                    required>
                                                                    <option value="">
                                                                        เลือกสาขา</option>

                                                                    @foreach ($data['get_branch'] as $value)
                                                                        <option value="{{ $value->id }}">
                                                                            {{ $value->branch_name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row" id="address_others" style="display: none">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="no_order">ชื่อผู้รับ
                                                                    <span class="text-danger">*
                                                                    </span></label>
                                                                <input type="text" class="form-control"
                                                                    name="sent_name_order" id="sent_name_order"
                                                                    placeholder="ชื่อผู้รับ" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="no_order">เบอร์โทรศัพท์
                                                                    <span class="text-danger">*
                                                                    </span></label>
                                                                <input type="text" class="form-control" maxlength="10"
                                                                    name="sent_phone_order" id="sent_phone_order"
                                                                    placeholder="เบอร์โทรศัพท์" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="no_order">บ้านเลขที่
                                                                    <span class="text-danger">*
                                                                    </span></label>
                                                                <input type="text" class="form-control"
                                                                    name="sent_no_order" id="sent_no_order"
                                                                    placeholder="บ้านเลขที่" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="moo_order">หมู่ที่
                                                                    <span class="text-danger">*
                                                                    </span></label>
                                                                <input type="text" class="form-control"
                                                                    name="sent_moo_order" id="sent_moo_order"
                                                                    placeholder="หมู่ที่" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="homename_order">หมู่บ้าน/อาคาร
                                                                    <span class="text-danger">*
                                                                    </span></label>
                                                                <input type="text" class="form-control"
                                                                    name="sent_homename_order"
                                                                    placeholder="หมู่บ้าน/อาคาร" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="soi_order">ตรอก/ซอย
                                                                    <span class="text-danger">
                                                                    </span></label>
                                                                <input type="text" class="form-control"
                                                                    name="sent_soi_order" id="sent_soi_order"
                                                                    placeholder="ตรอก/ซอย" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="road_order">ถนน
                                                                    <span class="text-danger">
                                                                    </span></label>
                                                                <input type="text" class="form-control"
                                                                    name="sent_road_order" id="sent_road_order"
                                                                    placeholder="ถนน">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="changwat_order">จังหวัด
                                                                    <span class="text-danger">*</span></label>
                                                                <select class="form-control" name="sent_changwat_order"
                                                                    id="sent_changwat_order" required>
                                                                    @foreach ($data['provinces'] as $value_provinces_order)
                                                                        <option value="{{ $value_provinces_order->id }}"
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
                                                                    <span class="text-danger">*</span></label>
                                                                <select class="form-control" name="sent_amphur_order"
                                                                    id="sent_amphur_order" required>
                                                                    <option>เขต/อำเภอ</option>

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="tambon_order">แขวง/ตำบล
                                                                    <span class="text-danger">*</span></label>
                                                                <select class="form-control" name="sent_tambon_order"
                                                                    id="sent_tambon_order" required>
                                                                    <option>แขวง/ตำบล</option>

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="zipcode_order">รหัสไปรษณีย์
                                                                    <span class="text-danger">*
                                                                    </span></label>
                                                                <input type="text" class="form-control"
                                                                    name="sent_zipcode_order" id="sent_zipcode_order"
                                                                    placeholder="รหัสไปรษณีย์" required>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="card-box">
                                    <div class="border border-light p-3  rounded mb-3">
                                        <h5 class="mb-3"><b>สรุปยอดการสั่งซื้อสินค้า</b></h5>
                                        <div class="table-responsive">
                                            <table class="table mb-0" id="ordertable" style="width:100%">
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
                                                            <strong class="" id="price_total">
                                                                {{ $data['bill']['price_total_not_ship'] }}
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
                                                            <h6></h6>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th>คะแนนที่ได้รับ :</th>
                                                        <th><strong class="text-success" id="pv">
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

                                    <div class="profile-shadow w-100 mt-4">
                                        <h5 class="font-16"><b>การชำระเงิน</b></h5>
                                        <hr>
                                        <input type="hidden" name="pay_type_id" id="pay_type_id">
                                        <h6 class="font-16 ml-4"><b>รูปแบบการชำระ</b></h6>
                                        <div class="widget-content widget-content-area tab-horizontal-line">
                                            <ul class="nav nav-tabs mb-3" id="animateLine" role="tablist">

                                                <li class="nav-item">
                                                    <a class="nav-link active" id="animated-underline-about-tab"
                                                        data-toggle="tab" href="#animated-underline-about" role="tab"
                                                        aria-controls="animated-underline-about" aria-selected="true">
                                                        ชำระเงินออนไลน์</a>
                                                </li>


                                                <li class="nav-item">
                                                    <a class="nav-link" id="animated-underline-home-tab"
                                                        data-toggle="tab" href="#animated-underline-kasad" role="tab"
                                                        aria-controls="animated-underline-home" aria-selected="false">
                                                        บัตรเกษตรสุขใจ</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link " id="animated-underline-bank-tab"
                                                        data-toggle="tab" href="#animated-underline-bank" role="tab"
                                                        aria-controls="animated-underline-bank" aria-selected="false">
                                                        โอนชำระ</a>
                                                </li>


                                            </ul>
                                            <div class="tab-content" id="animateLineContent-4">

                                                <div class="tab-pane fade active show" id="animated-underline-about"
                                                    role="tabpanel" aria-labelledby="animated-underline-about-tab">
                                                    <div class="text-center">
                                                        <img src="{{ asset('frontend/assets/img/thai_qr_payment.png') }}"
                                                            class="img-fluid mx-auto rounded" alt="Responsive image">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="d-flex align-items-center mt-5  btn-list">

                                                            <button type="button"
                                                                onclick="submit_confirm(1,'qr_payment')"
                                                                class="action-button btn btn-primary"
                                                                value="qr">ชำระเงินออนไลน์
                                                            </button>


                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="tab-pane fade" id="animated-underline-kasad" role="tabpanel"
                                                    aria-labelledby="animated-underline-home-tab">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-12 col-12">
                                                            <div class="row">
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                                                    <label
                                                                        for="img_card"><b>อัพโหลดหน้าบัตรเกษตรสุขใจ</b></label>
                                                                    <div class="upload text-center img-thumbnail">
                                                                        <input type="file" id="img_pay"
                                                                            name="img_pay" class="dropify"
                                                                            data-default-file="{{ asset('frontend/assets/img/AGRI-OR-BIO-DESEL-.jpg') }}"
                                                                            required>
                                                                    </div>
                                                                </div>

                                                            </div>



                                                        </div>
                                                        <div class="col-md-6 col-sm-12 col-12 text-center">


                                                            <div class="row">
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                                                    <label
                                                                        for="slip_image_idcard"><b>ภาพถ่ายบัตรประชาชน</b></label>
                                                                    <div class="upload text-center img-thumbnail">
                                                                        <input type="file" id="img_idcard_pay"
                                                                            name="img_idcard_pay" class="dropify"
                                                                            data-default-file="{{ asset('frontend/assets/img/idcard.png') }}"
                                                                            required>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                                                            <div class="row">
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                                                    <div class="form-group">
                                                                        <label for="phone">หมายเลขโทรศัพท์
                                                                            <span class="text-danger">*</span></label>
                                                                        <input type="text"
                                                                            class="form-control @error('phone_pay') is-invalid @enderror"
                                                                            name="phone_pay" placeholder="หมายเลขโทรศัพท์"
                                                                            value="{{ old('phone_pay') }}" maxlength="10"
                                                                            minlength="10" required>
                                                                        @error('phone_pay')
                                                                            <div class="invalid-feedback">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>


                                                                </div>
                                                                <input type="hidden" name="make_payment"
                                                                    id="make_payment">
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                                                    <button type="button"
                                                                        onclick="submit_confirm(4,'trafer')"
                                                                        class="action-button btn btn-primary"
                                                                        value="tranfer">ชำระเงินบัตรเกตรสุขใจ
                                                                    </button>

                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade" id="animated-underline-bank" role="tabpanel"
                                                    aria-labelledby="animated-underline-bank-tab">
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

                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 mt-2">
                                                                <button type="button"
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

                            </div>


                        <div class="modal fade" id="confirm_pay" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">ยืนยันการชำระเงิน</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="las la-times"></i>
                                        </button>
                                    </div>
                                    {{-- <div class="modal-body">
                                        <div class="text-center">
                                            <img src="{{ asset('frontend/assets/img/thai_qr_payment.png') }}"
                                                class="img-fluid mx-auto rounded"
                                                alt="Responsive image">
                                        </div>
                                    </div> --}}
                                    <div class="modal-footer">
                                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> ยกเลิก</button>
                                        <button type="button" onclick="document.getElementById('msform').submit()" class="btn btn-primary" >ยืนยันการชำระเงิน</button>
                                    </div>
                                </div>
                            </div>
                        </div>



                        </div>

                        </form>
                    </div>


                </div>
                {{-- <div class="widget-footer text-right">
                        <button type="reset" class="btn btn-primary mr-2">Submit</button>
                        <button type="reset" class="btn btn-outline-primary">Cancel</button>
                    </div> --}}
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


        function submit_confirm(pay_type, type) {
            $('#make_payment').val(type);
             $('#pay_type_id').val(pay_type);
           var user_name_send = $('#user_name_send').val();

           if(!user_name_send){
             alert("กรุณาเลือกสมาชิก");
                    console.log('File input is empty.');
                    return; // หยุดการทำงานของ each
           }

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

            var address_type_order = $('[name="address_type_order"]:checked').val();
            foundEmpty = false;


            if (address_type_order == 1) {

                    var customers_address_delivery = "{{@$data['customers_address_delivery']->sent_zipcode}}";


                    if(!customers_address_delivery){
                        alert("กรุณากรอกข้อมูล ที่อยู่ผู้รับสินค้า ให้ครบทุกช่อง");
                            foundEmpty = true;
                            return false; // หยุดการทำงานของ each
                    }
            }


            if (address_type_order == 2 ) {



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

            $('#confirm_pay').modal();

        }
    </script>
@endsection
