@extends('layouts.backend.app')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/plugins/table/datatable/dt-global_style.css') }}">
    <link href="{{ asset('backend/assets/css/ui-elements/pagination.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/plugins/select2/select2.min.css') }}">
    <link href="{{ asset('backend/assets/css/forms/form-widgets.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/plugins/animate/animate.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('page-header')
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">ระบบบริการสมาชิก</li>
            <li class="breadcrumb-item active" aria-current="page"><span>ระบบตรวจสอบเอกสาร</span></li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="widget-content widget-content-area br-6">
        <div class="row">

            <div class="col-md-2">
                <div class="form-group row">
                    <label class="col-form-label text-left col-lg-12 col-sm-12"><b>รหัสสมาชิก</b></label>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <select class="form-control dynamic-data">
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group row">
                    <label class="col-form-label text-left col-lg-12 col-sm-12"><b>ชื่อสมาชิก</b></label>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <select class="form-control dynamic-data">
                        </select>
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-2">
                <div class="form-group row">
                    <label class="col-form-label text-left col-lg-12 col-sm-12"><b>รหัสผู้แนะนำ</b></label>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <select class="form-control dynamic-data">
                        </select>
                    </div>
                </div>
            </div> --}}
            <div class="col-md-2">
                <div class="form-group row">
                    <label class="col-form-label text-left col-lg-12 col-sm-12"><b>สถานะการตรวจสอบ</b></label>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <select class="form-control" id="verifyDoc_status">
                            <option>รอตรวจสอบ</option>
                            <option>ผ่าน</option>
                            <option>ไม่ผ่าน</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group row">
                    <label class="col-form-label text-left col-lg-12 col-sm-12"><b>ประเทศ</b></label>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <select class="form-control" id="business_location">
                            <option>Thailand</option>
                            <option>Cambodia</option>
                            <option>Laos</option>
                            <option>Myanmar</option>
                            <option>Vietnam</option>
                        </select>
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-form-label text-left col-lg-12 col-sm-12"><b>หมายเลขบัตรประชาชน</b></label>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <select class="form-control dynamic-data">
                        </select>
                    </div>
                </div>
            </div> --}}
            <div class="col-md-2 mt-4 text-center">
                <button type="button" class="btn btn-outline-primary btn-rounded"><i class="las la-search"></i>
                    สืบค้น</button>
            </div>
        </div>
        <p>
        </p>
        <div class="table-responsive mb-4">
            <table id="ordertable" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>รหัสสมาชิก</th>
                        <th>ชื่อสมาชิก</th>
                        <th>สถานะการตรวจสอบ</th>
                        <th>ผู้อนุมัติ</th>
                        <th>วันที่อนุมัติ</th>
                        <th>รายละเอียด</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>A001</td>
                        <td>กิ่งทองใบหยก</td>
                        <td>200</td>
                        <td>A000</td>
                        <td>
                            <div class="row">
                                <div class="col-md-12">
                                    <i class="las la-id-card font-25 text-success"></i>
                                    <i class="las la-portrait font-25 text-success"></i>
                                    <i class="las la-id-card-alt font-25 text-info"></i>
                                    <i class="las la-money-check font-25 text-info"></i>
                                </div>
                            </div>
                        </td>
                        <td>06/09/2023</td>
                        <td>
                            
                                <div class="info-area col-md-12 mb-2">
                                    <button type="submit" class="btn btn-rounded btn-primary">
                                        <i class="las la-eye"></i></button>
                                    <button type="edit" class="btn btn-rounded btn-warning">
                                        <i class="las la-edit"></i></button>
                                </div>
                        </td>
                    </tr>
                    <tr>
                        <td>A001</td>
                        <td>กิ่งทองใบหยก</td>
                        <td>200</td>
                        <td>A000</td>
                        <td>
                            <div class="row">
                                <div class="col-md-12">
                                    <i class="las la-id-card font-25"></i>
                                    <i class="las la-portrait font-25 text-danger"></i>
                                    <i class="las la-id-card-alt font-25 text-danger"></i>
                                    <i class="las la-money-check font-25 text-info"></i>
                                </div>
                            </div>
                        </td>
                        <td>06/09/2023</td>
                        <td>
                            
                                <div class="info-area col-md-12 mb-2">
                                    <button type="submit" class="btn btn-rounded btn-primary">
                                        <i class="las la-eye"></i></button>
                                    <button type="edit" class="btn btn-rounded btn-warning">
                                        <i class="las la-edit"></i></button>
                                </div>
                        </td>
                    </tr>
                </tbody>

            </table>
        </div>
        <div class="pagination p1">
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
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('backend/plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/forms/custom-select2.js') }}"></script>
@endsection
