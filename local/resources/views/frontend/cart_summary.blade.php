@extends('layouts.frontend.app')
@section('css')
    <link href="{{ asset('frontend/plugins/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend/assets/css/ui-elements/pagination.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend/assets/css/elements/tooltip.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend/assets/css/apps/ecommerce.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/dropify/dropify.min.css') }}">
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
                        <div class="row">

                            <div class="col-md-8">
                                <div class="card-box">
                                    <div class="profile-shadow w-100">
                                        <h5 class="font-16"><b>การสั่งซื้อ</b></h5>
                                        <hr>
                                        <h6 class="font-16 ml-4"><b>รูปแบบการสั่งซื้อ</b></h6>
                                        <div class="row mt-3">
                                            <div class="col-6 ml-4">
                                                <div class="radio-inline">
                                                    <label class="radio radio-outline radio-outline-2x radio-primary ml-4">
                                                        <input type="radio" name="buy_type" id="buy_ownself" checked="checked">
                                                        <span></span>ซื้อให้ตัวเอง</label>
                                                    <label class="radio radio-outline radio-outline-2x radio-primary ml-4">
                                                        <input type="radio" name="buy_type" id="buy_others">
                                                        <span></span>ซื้อให้ลูกทีม</label>
                                                </div>

                                            </div>
                                        </div>
                                        <h6 class="font-16 ml-4 mt-4"><b>ที่อยู่ผู้รับสินค้า</b></h6>
                                        <div class="row mt-3">
                                            <div class="col-6 ml-4">
                                                <div class="radio-inline">
                                                    <label class="radio radio-outline radio-outline-2x radio-primary ml-4">
                                                        <input type="radio" name="address_delivery" id="address_delivery" checked="checked">
                                                        <span></span>จัดส่ง</label>
                                                    <label class="radio radio-outline radio-outline-2x radio-primary ml-4">
                                                        <input type="radio" name="address_delivery" id="address_idcard">
                                                        <span></span>ตามบัตรประชาชน</label>
                                                    <label class="radio radio-outline radio-outline-2x radio-primary ml-4">
                                                        <input type="radio" name="address_delivery" id="address_branch">
                                                        <span></span>รับที่สาขา</label>
                                                    <label class="radio radio-outline radio-outline-2x radio-primary ml-4">
                                                        <input type="radio" name="address_delivery" id="address_others">
                                                        <span></span>ที่อยู่อื่นๆ</label>
                                                </div>                                               
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="no1">ชื่อผู้รับ
                                                                <span class="text-danger">* </span></label>
                                                            <input type="text" class="form-control" id="name"
                                                                placeholder="ชื่อผู้รับ">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="no1">เบอร์โทรศัพท์
                                                                <span class="text-danger">* </span></label>
                                                            <input type="text" class="form-control" id="phone"
                                                                placeholder="เบอร์โทรศัพท์">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="no1">อีเมล์
                                                                <span class="text-danger">* </span></label>
                                                            <input type="text" class="form-control" id="email"
                                                                placeholder="อีเมล์">
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
                                                            <label for="zipcode1">รหัสไปรษณีย์
                                                                <span class="text-danger">* </span></label>
                                                            <input type="text" class="form-control" id="zipcode1"
                                                                placeholder="รหัสไปรษณีย์">
                                                        </div>
                                                    </div>
                                                    <div class="info-area col-md-12 text-right">
                                                        <button type="button" class="btn btn-info btn-rounded"><i class="las la-save"></i> บันทึก</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profile-shadow w-100 mt-4">
                                        <h5 class="font-16"><b>การชำระเงิน</b></h5>
                                        <hr>
                                        <h6 class="font-16 ml-4"><b>รูปแบบการชำระ</b></h6>
                                        <div class="widget-content widget-content-area tab-horizontal-line">
                                            <ul class="nav nav-tabs mb-3" id="animateLine" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="animated-underline-home-tab"
                                                        data-toggle="tab" href="#animated-underline-home" role="tab"
                                                        aria-controls="animated-underline-home" aria-selected="true"> โอนชำระ</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="animated-underline-about-tab" data-toggle="tab"
                                                        href="#animated-underline-about" role="tab"
                                                        aria-controls="animated-underline-about" aria-selected="false">
                                                        พร้อมเพย์</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="animated-underline-messages-tab"
                                                        data-toggle="tab" href="#animated-underline-messages" role="tab"
                                                        aria-controls="animated-underline-messages" aria-selected="false">
                                                        บัตรเครดิต</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="animateLineContent-4">
                                                <div class="tab-pane fade show active" id="animated-underline-home"
                                                    role="tabpanel" aria-labelledby="animated-underline-home-tab">
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
                                                            <div class="text-center mt-2">
                                                                <button type="button" class="btn btn-info btn-rounded">
                                                                    <span class="btn-label"><i
                                                                            class="las la-check-double"></i></span>อัพโหลดหลักฐาน
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="animated-underline-about" role="tabpanel"
                                                    aria-labelledby="animated-underline-about-tab">
                                                    <div class="text-center">
                                                        <img src="{{ asset('frontend/assets/img/thai_qr_payment.png') }}"
                                                            class="img-fluid mx-auto rounded" alt="Responsive image">
                                                    </div>
                                                    <div class="text-center mt-2">
                                                        <button type="button" class="btn btn-info btn-rounded">
                                                            <span class="btn-label"><i
                                                                    class="las la-check-double"></i></span>ชำระด้วยพร้อมเพย์
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="animated-underline-messages"
                                                    role="tabpanel" aria-labelledby="animated-underline-messages-tab">
                                                    <div class="text-center">
                                                        <img src="{{ asset('frontend/assets/img/credit-logo.png') }}"
                                                            class="img-fluid mx-auto rounded" alt="Responsive image">
                                                    </div>
                                                    <div class="text-center mt-2">
                                                        <button type="button" class="btn btn-info btn-rounded">
                                                            <span class="btn-label"><i
                                                                    class="las la-check-double"></i></span>ชำระด้วยบัตรเครดิต/บัตรเดบิต
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
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
                                                            <h6>2</h6>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h6>ราคาสินค้ารวม :</h6>
                                                        </td>
                                                        <td>
                                                            <h6>฿200</h6>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h6>Vat (7.00%) :</h6>
                                                        </td>
                                                        <td>
                                                            <h6>฿200</h6>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h6>ราคาสินค้ารวม + Vat :</h6>
                                                        </td>
                                                        <td>
                                                            <h6>฿200</h6>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h6>ค่าจัดส่ง :</h6>
                                                        </td>
                                                        <td>
                                                            <h6>฿0</h6>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-success-teal strong">ส่วนลด : </td>
                                                        <td class="text-success-teal strong">-฿50</td>
                                                    </tr>
                                                    <tr>
                                                        <th>คะแนนที่ได้รับ :</th>
                                                        <th>100 PV</th>
                                                    </tr>
                                                    <tr>
                                                        <th>ยอดชำระทั้งหมด :</th>
                                                        <th>฿1,550</th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    {{-- <div class="d-flex align-items-center">
                                        <a href="{{ route('CartGeneral', ['type' => 1]) }}"
                                            class="w-100 btn btn-outline-info mb-0 ml-3 mr-3"><i
                                                class="las la-arrow-left"></i>
                                            สินค้า</a>
                                        <a href="{{ route('CartGeneral', ['type' => 1]) }}"
                                            class="w-100 btn btn-outline-info mb-0 ml-3 mr-3"><i
                                                class="las la-money-bill-wave"></i> ชำระเงิน </a>
                                    </div> --}}
                                </div>

                            </div>
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
@endsection
