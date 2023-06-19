@extends('layouts.frontend.app')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/table/datatable/dt-global_style.css') }}">
    <link href="{{ asset('frontend/assets/css/ui-elements/pagination.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <!--  Main Container Starts  -->

    <!--  Content Area Starts  -->
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
                                    <li class="breadcrumb-item active" aria-current="page">
                                        <span>ประวัติการสั่งซื้อ</span>
                                    </li>
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
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        {{-- <h5 class="table-header"><b>รายการสั่งซื้อ</b></h5> --}}
                                        <div class="row">
                                            <div class="col-md-2 mt-2">
                                                <div class="form-group">
                                                    <label><b>สถานะการสั่งซื้อ:</b></label>
                                                    <select class="form-control" id="statusfilter">
                                                        <option>สำเร็จ</option>
                                                        <option>ไม่สำเร็จ</option>
                                                        <option>กำลังดำเนินการ</option>
                                                        <option>ยกเลิก</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                <div class="form-group">
                                                    <label><b>วันที่สั่งซื้อ:</b></label>
                                                    <input class="form-control" type="date" value="yyyy-mm-dd"
                                                        id="searchdate1"><label for="searchdate1">
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                <div class="form-group">
                                                    <label><b>วันที่สั่งซื้อ:</b></label>
                                                    <input class="form-control" type="date" value="yyyy-mm-dd"
                                                        id="searchdate2"><label for="searchdate2">
                                                </div>
                                            </div>
                                            <div class="col-md-2 text-center" style="margin-top:45px">
                                                <button type="button"
                                                    class="btn btn-outline-success btn-rounded"><i class="las la-search font-15"></i> สืบค้น</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive mt-2 mb-4">
                                <table id="ordertable" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>วันที่สั่งซื้อ</th>
                                            <th>เลขที่ใบสั่งซื้อ</th>
                                            <th>ยอดชำระ</th>
                                            <th>PV</th>
                                            <th>ชำระโดย</th>
                                            <th>สถานะ</th>
                                            <th>หมายเลขพัสดุ</th>
                                            <th>รายละเอียด</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>06/09/2023</td>
                                            <td>BILL001</td>
                                            <td>฿1,550</td>
                                            <td>200</td>
                                            <td>กิ่งทองใบหยก</td>
                                            <td>
                                                <span class="badge badge-danger light">ยกเลิก</span>
                                            </td>
                                            <td>TRACK001</td>
                                            <td class="text-center">
                                                <div class="dropdown custom-dropdown">
                                                    <a class="dropdown-toggle font-20 text-primary" href="view"
                                                        role="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i class="las la-eye text-info"></i>
                                                    </a>
                                                    <a class="dropdown-toggle font-20 text-primary" href="delete"
                                                        role="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i class="las la-trash-alt text-danger"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>06/09/2023</td>
                                            <td>BILL002</td>
                                            <td>฿1,550</td>
                                            <td>200</td>
                                            <td>กิ่งทองใบหยก</td>
                                            <td>
                                                <span class="badge badge-warning light">ไม่สำเร็จ</span>
                                            </td>
                                            <td>TRACK002</td>
                                            <td class="text-center">
                                                <div class="dropdown custom-dropdown">
                                                    <a class="dropdown-toggle font-20 text-primary" href="view"
                                                        role="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i class="las la-eye text-info"></i>
                                                    </a>
                                                    <a class="dropdown-toggle font-20 text-primary" href="delete"
                                                        role="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i class="las la-trash-alt text-danger"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>06/09/2023</td>
                                            <td>BILL002</td>
                                            <td>฿1,550</td>
                                            <td>200</td>
                                            <td>กิ่งทองใบหยก</td>
                                            <td>
                                                <span class="badge badge-info light">กำลังดำเนินการ</span>
                                            </td>
                                            <td>TRACK002</td>
                                            <td class="text-center">
                                                <div class="dropdown custom-dropdown">
                                                    <a class="dropdown-toggle font-20 text-primary" href="view"
                                                        role="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i class="las la-eye text-info"></i>
                                                    </a>
                                                    <a class="dropdown-toggle font-20 text-primary" href="delete"
                                                        role="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i class="las la-trash-alt text-danger"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>06/09/2023</td>
                                            <td>BILL003</td>
                                            <td>฿1,550</td>
                                            <td>200</td>
                                            <td>กิ่งทองใบหยก</td>
                                            <td>
                                                <span class="badge badge-success-teal light">สำเร็จ</span>
                                            </td>
                                            <td>TRACK003</td>
                                            <td class="text-center">
                                                <div class="dropdown custom-dropdown">
                                                    <a class="dropdown-toggle font-20 text-primary" href="view"
                                                        role="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i class="las la-eye text-info"></i>
                                                    </a>
                                                    <a class="dropdown-toggle font-20 text-primary" href="delete"
                                                        role="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i class="las la-trash-alt text-danger"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- Main Container Ends -->
@section('js')
@endsection
