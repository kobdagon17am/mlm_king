@extends('layouts.frontend.app')
@section('css')
    <link href="{{ asset('frontend/plugins/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend/assets/css/ui-elements/pagination.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend/assets/css/elements/tooltip.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend/assets/css/apps/ecommerce.css') }}" rel="stylesheet" type="text/css" />
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
                                    <li class="breadcrumb-item active" aria-current="page"><span>สรุปรายการสั่งซื้อ</span>
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
                                                        <input type="radio" name="radios16" checked="checked">
                                                        <span></span>ซื้อให้ตัวเอง</label>
                                                    <label class="radio radio-outline radio-outline-2x radio-primary ml-4">
                                                        <input type="radio" name="radios16">
                                                        <span></span>ซื้อให้ลูกทีม</label>
                                                </div>

                                            </div>
                                        </div>
                                        <h6 class="font-16 ml-4 mt-4"><b>ที่อยู่ผู้รับสินค้า</b></h6>
                                        <div class="row mt-3">
                                            <div class="col-6 ml-4">
                                                <div class="radio-inline">
                                                    <label class="radio radio-outline radio-outline-2x radio-primary ml-4">
                                                        <input type="radio" name="radios17" checked="checked">
                                                        <span></span>จัดส่ง</label>
                                                    <label class="radio radio-outline radio-outline-2x radio-primary ml-4">
                                                        <input type="radio" name="radios17">
                                                        <span></span>ตามบัตรประชาชน</label>
                                                    <label class="radio radio-outline radio-outline-2x radio-primary ml-4">
                                                        <input type="radio" name="radios17">
                                                        <span></span>รับที่สาขา</label>
                                                    <label class="radio radio-outline radio-outline-2x radio-primary ml-4">
                                                        <input type="radio" name="radios17">
                                                        <span></span>อื่นๆ</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profile-shadow w-100 mt-4">
                                        <h5 class="font-16"><b>การชำระเงิน</b></h5>
                                        <hr>
                                        <h6 class="font-16 ml-4"><b>รูปแบบการชำระ</b></h6>
                                        <div class="row mt-2">
                                            <div class="col-md-4">
                                                <div class="border border-light p-3 mb-3 rounded">
                                                    <div class="custom-control custom-radio custom-control-inline"><label
                                                            class="radio radio-outline radio-outline-2x radio-primary">
                                                            <input type="radio" name="radios18" checked="checked">
                                                            <span></span>โอนชำระ</label>
                                                    </div>
                                                    <div class="text-center">
                                                        <img src="{{ asset('frontend/assets/img/scb.png') }}"
                                                        class="img-fluid mx-auto" alt="Responsive image">
                                                        <p class="font-13 ">xxxx</p>
                                                        <p class="font-13">ธนาคารไทยพาณิชย์</p>
                                                        <p class="font-13">บริษัท กิ่งทองใบหยก จำกัด</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="border border-light p-3 mb-3 rounded">
                                                    <div class="custom-control custom-radio custom-control-inline"><label
                                                            class="radio radio-outline radio-outline-2x radio-primary">
                                                            <input type="radio" name="radios18">
                                                            <span></span>Online Banking</label>
                                                    </div>
                                                    <div class="text-center">
                                                        <img src="{{ asset('frontend/assets/img/scb.png') }}"
                                                        class="img-fluid mx-auto" alt="Responsive image">
                                                        <p class="font-13">ชำระด้วย Promptpay</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="border border-light p-3 mb-3 rounded">
                                                    <div class="custom-control custom-radio custom-control-inline"><label
                                                            class="radio radio-outline radio-outline-2x radio-primary">
                                                            <input type="radio" name="radios18">
                                                            <span></span>Credit/Debit</label>
                                                    </div>
                                                    <div class="text-center">
                                                        <img src="{{ asset('frontend/assets/img/scb.png') }}"
                                                        class="img-fluid mx-auto" alt="Responsive image">
                                                        <p class="font-13">ชำระด้วย Promptpay</p>
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
