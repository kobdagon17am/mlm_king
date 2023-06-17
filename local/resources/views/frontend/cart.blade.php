@extends('layouts.frontend.app')
@section('css')
    <link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/ui-elements/pagination.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/elements/tooltip.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/apps/ecommerce.css" rel="stylesheet" type="text/css" />
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
                                    <li class="breadcrumb-item active" aria-current="page"><span>ตระกร้าสินค้า</span></li>
                                </ol>
                            </nav>
                        </div>
                    </li>
                </ul>
            </header>
        </div>
        <!--  Navbar Ends / Breadcrumb Area Ends -->
        <!-- Main Body Starts -->
        <div class="layout-px-spacing">
            <div class="row layout-spacing layout-top-spacing" id="cancel-row">
                <div class="col-lg-12">
                    <div class="">
                        <div class="widget-content searchable-container cart-area">
                            <div class="row mb-4 mt-3">
                                <div class="col-md-7 cart-table">
                                    <div class="card-box">
                                        <table class="table table-responsive table table-bordered table-centered mb-0">
                                            <thead class="thead-light text-center">
                                                <tr>
                                                    <th>รูปภาพ</th>
                                                    <th>รายการ</th>
                                                    <th>จำนวน</th>
                                                    <th>ราคา</th>
                                                    <th>PV</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <img src="{{ asset('assets/img/product-1.jpg') }}" alt="contact-img"
                                                            title="contact-img" class="rounded-circle mr-3" height="60"
                                                            width="60"
                                                            style="object-fit: cover;">
                                                    </td>
                                                    <td>
                                                        <b>Jose Headphone</b>
                                                    </td>
                                                    <td>
                                                        <input type="number" min="1" value="2"
                                                            class="form-control" placeholder="Qty" style="width: 75px;">
                                                    </td>
                                                    <td>
                                                        ฿1,000
                                                    </td>
                                                    <td>
                                                        50
                                                    </td>
                                                    <td>
                                                        <a href="javascript:void(0);" class="action-icon text-center">
                                                            <button type="delete" class="btn btn-danger font-15"><i
                                                                    class="lar la-trash-alt"></i></button></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="{{ asset('assets/img/product-2.jpg') }}" alt="contact-img"
                                                            title="contact-img" class="rounded-circle mr-3" height="60"
                                                            width="60"
                                                            style="object-fit: cover;">
                                                    </td>
                                                    <td>
                                                        <b>Zikkon Camera</b>
                                                    </td>
                                                    <td>
                                                        <input type="number" min="1" value="5"
                                                            class="form-control" placeholder="Qty" style="width: 75px;">
                                                    </td>
                                                    <td>
                                                        ฿1,000
                                                    </td>
                                                    <td>
                                                        50
                                                    </td>
                                                    <td>
                                                        <a href="javascript:void(0);" class="action-icon text-center">
                                                            <button type="delete" class="btn btn-danger font-15"><i
                                                                    class="lar la-trash-alt"></i></button></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    {{-- <div class="card-box">
                                        <h6 class="mb-3">Card Details</h6>
                                        <div class="card bg-primary text-white visa-card mb-0">
                                            <div class="card-body">
                                                <div>
                                                    <div class="text-left">
                                                        <i class="lab la-cc-visa font-45 text-white"></i>
                                                    </div>
                                                </div>
                                                <div class="mt-3 row">
                                                    <div class="col-4">
                                                        <p>
                                                            <i class="las la-asterisk m-1 text-white"></i>
                                                            <i class="las la-asterisk m-1 text-white"></i>
                                                            <i class="las la-asterisk m-1 text-white"></i>
                                                        </p>
                                                    </div>
                                                    <div class="col-4">
                                                        <p>
                                                            <i class="las la-asterisk m-1 text-white"></i>
                                                            <i class="las la-asterisk m-1 text-white"></i>
                                                            <i class="las la-asterisk m-1 text-white"></i>
                                                        </p>
                                                    </div>
                                                    <div class="col-4">
                                                        <p>
                                                            <i class="las la-asterisk m-1 text-white"></i>
                                                            <i class="las la-asterisk m-1 text-white"></i>
                                                            <i class="las la-asterisk m-1 text-white"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    <h5 class="text-white float-right mb-0">12/22</h5>
                                                    <h5 class="text-white mb-0">Fredrick Taylor</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="card-box">
                                        <div class="border border-light p-3 mt-1 rounded mb-3">
                                            <h5 class="mb-3"><b>สรุปรายการสั่งซื้อ</b></h5>
                                            <div class="table-responsive">
                                                <table class="table mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td><h6>จำนวนสินค้า :</h6></td>
                                                            <td><h6>2</h6></td>
                                                        </tr>
                                                        <tr>
                                                            <td><h6>ราคารวม :</h6></td>
                                                            <td><h6>฿2,000</h6></td>
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
                                                            <th>฿ 1,550</th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('CartGeneral') }}"
                                                class="w-100 btn btn-outline-info mb-0 ml-3 mr-3"><i
                                                    class="las la-arrow-left"></i>
                                                สินค้า</a>
                                            <a href="{{ route('CartGeneral') }}"
                                                class="w-100 btn btn-outline-info mb-0 ml-3 mr-3">สั่งซื้อ <i
                                                    class="las la-arrow-right"></i></a>
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
