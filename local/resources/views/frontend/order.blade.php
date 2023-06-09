@extends('layouts.frontend.app')
@section('css')
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">

@section('content')

    <!--  Main Container Starts  -->
    <div class="main-container" id="container">
        <div class="overlay"></div>
        <div class="search-overlay"></div>
        <div class="rightbar-overlay"></div>
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
                <div class="layout-top-spacing mb-2">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="container p-0">
                                <div class="row layout-top-spacing date-table-container">
                                    <!-- Datatable with a dropdown -->
                                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                                        <div class="widget-content widget-content-area br-6">
                                            <h5 class="table-header"><b>รายการสั่งซื้อ</b></h5>
                                            
                                            <div class="table-responsive mb-4">
                                                <table id="dropdown-dt" class="table table-hover" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>วันที่สั่งซื้อ</th>
                                                            <th>เลขที่ใบสั่งซื้อ</th>
                                                            <th>ยอดชำระ</th>
                                                            <th>PV</th>
                                                            <th>ชำระโดย</th>
                                                            <th>สถานะ</th>
                                                            <th>หมายเลขพัสดุ</th>
                                                            <th>ACTION</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>2023/05/05</td>
                                                            <td>BILL001</td>
                                                            <td>฿ 1,550</td>
                                                            <td>200</td>
                                                            <td>กิ่งทองใบหยก</td>
                                                            <td>
                                                                <span class="badge badge-warning light">Pending</span>
                                                            </td>
                                                            <td>TRACK001</td>
                                                            <td class="text-center">
                                                                <div class="dropdown custom-dropdown">
                                                                    <a class="dropdown-toggle font-20 text-primary"
                                                                        href="view" role="button" data-toggle="dropdown"
                                                                        aria-haspopup="true" aria-expanded="false">
                                                                        <i class="las la-eye"></i>
                                                                    </a>
                                                                    <a class="dropdown-toggle font-20 text-primary"
                                                                        href="delete" role="button" data-toggle="dropdown"
                                                                        aria-haspopup="true" aria-expanded="false">
                                                                        <i class="las la-trash-alt"></i>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>2023/05/05</td>
                                                            <td>BILL002</td>
                                                            <td>฿ 1,550</td>
                                                            <td>200</td>
                                                            <td>กิ่งทองใบหยก</td>
                                                            <td>
                                                                <span class="badge badge-warning light">Pending</span>
                                                            </td>
                                                            <td>TRACK001</td>
                                                            <td class="text-center">
                                                                <div class="dropdown custom-dropdown">
                                                                    <a class="dropdown-toggle font-20 text-primary"
                                                                        href="view" role="button" data-toggle="dropdown"
                                                                        aria-haspopup="true" aria-expanded="false">
                                                                        <i class="las la-eye"></i>
                                                                    </a>
                                                                    <a class="dropdown-toggle font-20 text-primary"
                                                                        href="delete" role="button" data-toggle="dropdown"
                                                                        aria-haspopup="true" aria-expanded="false">
                                                                        <i class="las la-trash-alt"></i>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>2023/05/05</td>
                                                            <td>BILL003</td>
                                                            <td>฿ 1,550</td>
                                                            <td>200</td>
                                                            <td>กิ่งทองใบหยก</td>
                                                            <td>
                                                                <span class="badge badge-success-teal light">Success</span>
                                                            </td>
                                                            <td>TRACK001</td>
                                                            <td class="text-center">
                                                                <div class="dropdown custom-dropdown">
                                                                    <a class="dropdown-toggle font-20 text-primary"
                                                                        href="view" role="button" data-toggle="dropdown"
                                                                        aria-haspopup="true" aria-expanded="false">
                                                                        <i class="las la-eye"></i>
                                                                    </a>
                                                                    <a class="dropdown-toggle font-20 text-primary"
                                                                        href="delete" role="button" data-toggle="dropdown"
                                                                        aria-haspopup="true" aria-expanded="false">
                                                                        <i class="las la-trash-alt"></i>
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
                </div>
            </div>
        </div>
    </div>
    <!-- Main Container Ends -->
@section('css')
@endsection
