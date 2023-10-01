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
            <li class="breadcrumb-item" aria-current="page">
                <a href="{{ route('admin/Promotion') }}">สินค้าโปรโมชั่น</a>
            </li>            
            <li class="breadcrumb-item active" aria-current="page"><span>เพิ่มสินค้าโปรโมชั่น</span></li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="widget-content widget-content-area br-6">
        <div class="row">
            <div class="col-md-12 ml-4 text-left">
                {{-- <h6><b>เพิ่มสินค้าโปรโมชั่น</b></h6> --}}
                <div class="row mt-4 ">
                    <div class="col-md-10 mx-auto">
                        <div class="form-card">
                            <div class="w-100">
                                <div class="form-group row">
                                    <div class="col-md-6 text-left">
                                        <label><b>ชื่อโปรโมชั่น:</b></label>
                                        <input type="text" name="promotion_name" class="form-control"
                                            placeholder="ชื่อโปรโมชั่น" disabled>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <label><b>ประเภท:</b></label>
                                        <select class="form-control" name="promotion_type" disabled>
                                            <option value="General">โปรโมชั่นสินค้าทั่วไป
                                            </option>
                                            <option value="Warehouse">โปรโมชั่นเปิดคลังใบหยก
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 mt-3 text-left">
                                        <label><b>ชื่อสินค้า:</b></label>
                                        <select class="form-control" name="product_name">
                                            {{-- @foreach ($get_categories as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->category_name }}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                    <div class="col-lg-4 mt-3 text-left">
                                        <label><b>จำนวนสินค้า:</b></label>
                                        <input type="nember" class="form-control" name="product_amt"
                                            placeholder="จำนวนสินค้า">
                                    </div>
                                    <div class="col-lg-4 mt-3 text-left">
                                        <label><b>หน่วยสินค้า:</b></label>
                                        <select class="form-control" name="product_unit_name">
                                            {{-- @foreach ($get_unit as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->product_unit_th }}
                                                </option>
                                            @endforeach --}}
                                        </select>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="info-area col-md-12 text-center mt-4 ">
                            <button type="submit" class="btn btn-success btn-rounded">
                                <i class="las la-plus-circle font-15"></i> เพิ่มสินค้า</button>
                        </div>
                    </div>

                    <div class="col-md-10 mt-4 mx-auto">
                        <div class="col-md-12 text-left">
                            <h6><b>รายการสินค้าในโปรโมชั่น</b></h6>
                        </div>
                        <div class="form-card">
                            <div class="w-100">
                                <div class="form-group row">
                                    <div class="table-responsive mb-3">
                                        <table id="ordertable" class="table table-hover table-sm" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>รูปภาพสินค้า</th>
                                                    <th>สินค้า</th>
                                                    <th>จำนวน</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="info-area col-md-6 text-left mt-4">
                                <a href="{{ route('admin/Promotion') }}">
                                    <button class="btn bg-light-dark btn-rounded">
                                        <i class="las la-long-arrow-alt-left font-15"></i> ย้อนกลับ
                                    </button>
                                </a>
                            </div>

                            <div class="info-area col-md-6 text-right mt-4 ">
                                <a href="">
                                <button type="submit" class="btn btn-info btn-rounded">
                                    <i class="las la-save font-15"></i> บันทึก</button>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
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
