@extends('layouts.backend.app')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/plugins/table/datatable/dt-global_style.css') }}">
    <link href="{{ asset('backend/assets/css/ui-elements/pagination.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/plugins/select2/select2.min.css') }}">
    <link href="{{ asset('backend/assets/css/forms/form-widgets.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/assets/css/forms/multiple-step.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/plugins/dropify/dropify.min.css') }}">
    <link href="{{ asset('backend/assets/css/pages/profile_edit.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('page-header')
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">ระบบสินค้า</li>
            <li class="breadcrumb-item active" aria-current="page"><span>สินค้า</span></li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="widget-content widget-content-area br-6">
        <div class="row">
            {{-- <div class="col-md-2">
                <div class="form-group row">
                    <label class="col-form-label text-left col-lg-12 col-sm-12"><b>รหัสสินค้า</b></label>
                    <input type="text" class="form-control float-left text-center w130 myLike product_code "
                        placeholder="รหัสสินค้า">
                </div>
            </div> --}}

            <div class="col-md-12 text-right">
                <div class="input-group-prepend">
                    <button class="btn btn-success btn-rounded " data-toggle="modal"
                        data-target=".bd-example-modal-lg" type="button"><i class="las la-plus-circle font-20"></i>
                        เพิ่มสินค้า</button>
                </div>
            </div>
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header ml-4">
                            <h5 class="modal-title" id="myLargeModalLabel"><b>เพิ่มสินค้า</b></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i class="las la-times"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="modal-text">
                            <div class="widget-content widget-content-area">
                                <div class="form-group row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="card multiple-form-one px-0 pb-0 mb-3">
                                            <div class="row">
                                                <div class="col-md-12 mx-0">
                                                    <form id="msform">
                                                        <ul id="progressbar">
                                                            <li class="active" id="account" style="width: 33.33%;">
                                                                <strong>ข้อมูลสินค้า</strong>
                                                            </li>
                                                            <li id="payment" style="width: 33.33%;">
                                                                <strong>อัพโหลดรูปภาพ</strong>
                                                            </li>
                                                            <li id="confirm" style="width: 33.33%;">
                                                                <strong>เพิ่มสินค้าสำเร็จ</strong>
                                                            </li>
                                                        </ul>
                                                        <fieldset>
                                                            <div class="form-card">
                                                                <h6 class="fs-title mb-4">รายละเอียดสินค้า</h6>
                                                                <div class="w-100">
                                                                    <div class="form-group row">
                                                                        <div class="col-lg-6  mt-2">
                                                                            <label><b>รหัสสินค้า:</b></label>
                                                                            <input type="text" class="form-control"
                                                                                placeholder="รหัสสินค้า">
                                                                        </div>
                                                                        <div class="col-lg-6  mt-2">
                                                                            <label><b>ชื่อสินค้าสินค้า:</b></label>
                                                                            <input type="text" class="form-control"
                                                                                placeholder="ชื่อสินค้าสินค้า">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <div class="col-lg-6 mt-2">
                                                                            <label><b>หมวดสินค้า:</b></label>
                                                                            <select class="form-control" id="product_group">
                                                                                <option>เกษตร</option>
                                                                                <option>คลังเกษตร</option>
                                                                                <option>ความงาม</option>
                                                                                <option>ดูแลผิวกาย</option>
                                                                                <option>บำรุงผิวหน้า</option>
                                                                                <option>ส่งเสริมการขาย</option>
                                                                                <option>สินค้าการขาย</option>
                                                                                <option>อื่น ๆ</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-lg-6  mt-2">
                                                                            <label><b>รายละเอียดสินค้า:</b></label>
                                                                            <textarea class="form-control" id="product_detail" placeholder="รายละเอียดสินค้า"></textarea>
                                                                        </div>
                                                                        <div class="col-lg-6  mt-2">
                                                                            <label><b>จำนวนสินค้า:</b></label>
                                                                            <input type="text" class="form-control"
                                                                                id="product_amount"
                                                                                placeholder="จำนวนสินค้า">
                                                                        </div>
                                                                        <div class="col-lg-6  mt-2">
                                                                            <label><b>หน่วยสินค้า:</b></label>
                                                                            <select class="form-control" id="product_unit">
                                                                                <option>กระปุก</option>
                                                                                <option>กระสอบ</option>
                                                                                <option>กล่อง</option>
                                                                                <option>ขวด</option>
                                                                                <option>ชิ้น</option>
                                                                                <option>ชุด</option>
                                                                                <option>ตัว</option>
                                                                                <option>ถุง</option>
                                                                                <option>ใบ</option>
                                                                                <option>แพ็ค</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="col-lg-6  mt-2">
                                                                            <label><b>ราคาต้นทุน (บาท):</b></label>
                                                                            <input type="text" class="form-control"
                                                                                id="product_cost"
                                                                                placeholder="ราคาต้นทุน">
                                                                        </div>
                                                                        <div class="col-lg-6  mt-2">
                                                                            <label><b>ราคาขายสมาชิก (บาท):</b></label>
                                                                            <input type="text" class="form-control"
                                                                                id="product_price_member"
                                                                                placeholder="ราคาขายสมาชิก">
                                                                        </div>
                                                                        <div class="col-lg-6  mt-2">
                                                                            <label><b>ส่วนลด (%):</b></label>
                                                                            <input type="text" class="form-control"
                                                                                id="product_discount_percent"
                                                                                placeholder="ส่วนลด (%)">
                                                                        </div>
                                                                        <div class="col-lg-6  mt-2">
                                                                            <label><b>ส่วนลด (บาท):</b></label>
                                                                            <input type="text" class="form-control"
                                                                                id="product_discount"
                                                                                placeholder="ส่วนลด (บาท)">
                                                                        </div>
                                                                        <div class="col-lg-12 mt-2">
                                                                            <label><b>สถานะสินค้าขาย:</b></label>
                                                                            <select class="form-control"
                                                                                id="product_status">
                                                                                <option>เปิดใช้งาน</option>
                                                                                <option>ปิดใช้งาน</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input type="button" name="next"
                                                                class="next action-button btn btn-outline-primary"
                                                                value="ถัดไป" />
                                                        </fieldset>

                                                        <fieldset>
                                                            <div class="form-card">
                                                                <h6 class="fs-title mb-4">รูปภาพสินค้า</h6>
                                                                <div class="w-100">
                                                                    <div class="row">
                                                                        <div class="col-lg-6  mt-2">
                                                                            <label for="product_detail">รูปภาพที่ 1
                                                                                <b class="text-danger">(ภาพหลัก)</b></label>
                                                                            <div class="upload text-center img-thumbnail">
                                                                                <input type="file" id="product_image1"
                                                                                    class="dropify">
                                                                                <div
                                                                                    class="info-area col-md-12 text-center p-2">
                                                                                    <button type="submit"
                                                                                        class="btn btn-info">
                                                                                        <i class="las la-save"></i>
                                                                                        อัพโหลด</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6  mt-2">
                                                                            <label for="product_detail">รูปภาพที่ 2</label>
                                                                            <div class="upload text-center img-thumbnail">
                                                                                <input type="file" id="product_image2"
                                                                                    class="dropify">
                                                                                <div
                                                                                    class="info-area col-md-12 text-center p-2">
                                                                                    <button type="submit"
                                                                                        class="btn btn-info">
                                                                                        <i class="las la-save"></i>
                                                                                        อัพโหลด</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6  mt-2">
                                                                            <label for="product_detail">รูปภาพที่ 3</label>
                                                                            <div class="upload text-center img-thumbnail">
                                                                                <input type="file" id="product_image2"
                                                                                    class="dropify">
                                                                                <div
                                                                                    class="info-area col-md-12 text-center p-2">
                                                                                    <button type="submit"
                                                                                        class="btn btn-info">
                                                                                        <i class="las la-save"></i>
                                                                                        อัพโหลด</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6  mt-2">
                                                                            <label for="product_detail">รูปภาพที่ 4</label>
                                                                            <div class="upload text-center img-thumbnail">
                                                                                <input type="file" id="product_image2"
                                                                                    class="dropify">
                                                                                <div
                                                                                    class="info-area col-md-12 text-center p-2">
                                                                                    <button type="submit"
                                                                                        class="btn btn-info">
                                                                                        <i class="las la-save"></i>
                                                                                        อัพโหลด</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input type="button" name="previous"
                                                                class="previous action-button-previous btn btn-outline-primary"
                                                                value="กลับ" />
                                                            <input type="button" name="next"
                                                                class="next action-button btn btn-outline-primary"
                                                                value="ถัดไป" />
                                                        </fieldset>


                                                        <fieldset>
                                                            <div class="form-card">
                                                                <h5 class="fs-title mb-4 text-center">เพิ่มสินค้าสำเร็จ !</h5><br>
                                                                <div class="row justify-content-center">
                                                                    <div class="col-md-3">
                                                                        <svg class="checkmark"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 52 52">
                                                                            <circle class="checkmark__circle"
                                                                                cx="26" cy="26"
                                                                                r="25" fill="none" />
                                                                            <path class="checkmark__check" fill="none"
                                                                                d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                                                                        </svg>
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
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="table-responsive mb-4">
            <table id="ordertable" class="table table-hover table-sm" style="width:100%">
                <thead>
                    <tr>
                        <th>รหัสสินค้า</th>
                        <th>ชื่อสินค้า</th>
                        <th>หมวดสินค้า</th>
                        <th>หน่วย</th>
                        <th>ราคาต้นทุน (บาท)</th>
                        <th>ราคาขาย (บาท)</th>
                        <th>PV</th>
                        <th>สถานะ</th>
                        <th>แก้ไข</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>ปุ๋ย</td>
                        <td>เกษตร</td>
                        <td>ถุง</td>
                        <td>1,500</td>
                        <td>1,000</td>
                        <td>200</td>
                        <td><span class="badge badge-pill badge-success light">เปิดใช้งาน</span></td>
                        <td>
                            <a href="#!" class="p-2">
                                <i class="lab la-whmcs font-25 text-warning"></i></a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
        {{-- <div class="pagination p1">
            <ul class="mx-auto">
                <a href="previous">
                    <li><i class="las la-angle-left"></i></li>
                </a>
                <a class="is-active" href="page">
                    <li>1</li>
                </a>
                <a href="page2">
                    <li>2</li>
                </a>
                <a href="page2">
                    <li>3</li>
                </a>
                <a href="next">
                    <li><i class="las la-angle-right"></i></li>
                </a>
            </ul>
        </div> --}}



    </div>
@endsection
@section('js')
    <script src="{{ asset('backend/plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/forms/custom-select2.js') }}"></script>
    <script src="{{ asset('backend/assets/js/custom.js') }}"></script>
    <script src="{{ asset('backend/assets/js/forms/multiple-step.js') }}"></script>
    <script src="{{ asset('backend/plugins/dropify/dropify.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/pages/profile_edit.js') }}"></script>
@endsection
