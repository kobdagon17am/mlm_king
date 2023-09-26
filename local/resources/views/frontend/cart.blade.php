@extends('layouts.frontend.app')
@section('css')
    <link href="{{ asset('frontend/plugins/jquery-ui/jquery-ui.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend/assets/css/ui-elements/pagination.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend/assets/css/elements/tooltip.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend/assets/css/apps/ecommerce.css')}}" rel="stylesheet" type="text/css" />
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
                                    <li class="breadcrumb-item active" aria-current="page"><span>ตะกร้าสินค้า</span></li>
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

                            <div class="table-responsive mb-4">
                                <table id="ordertable" class="table table-hover" style="width:100%">
                                    <thead>
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
                                                <img src="{{ asset('frontend/assets/img/product-1.jpg') }}" alt="contact-img"
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
                                                <img src="{{ asset('frontend/assets/img/product-2.jpg') }}" alt="contact-img"
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
                            </div>
                            <div class="col-md-4">
                                <div class="card-box">
                                    <div class="border border-light p-3 mt-1 rounded mb-3">
                                        <h5 class="mb-3"><b>สรุปรายการสั่งซื้อ</b></h5>
                                        <div class="table-responsive" >
                                            <table class="table mb-0" id="ordertable" style="width:100%">
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
                                        <a href="{{ route('CartGeneral',['type'=>1]) }}"
                                            class="w-100 btn btn-outline-info mb-0 ml-3 mr-3"><i
                                                class="las la-arrow-left"></i>
                                            สินค้า</a>
                                        <a href="{{ route('CartGeneral',['type'=>1]) }}"
                                            class="w-100 btn btn-outline-info mb-0 ml-3 mr-3">สั่งซื้อ <i
                                                class="las la-arrow-right"></i></a>
                                    </div>
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
