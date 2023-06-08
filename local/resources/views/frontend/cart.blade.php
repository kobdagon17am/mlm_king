@extends('layouts.frontend.app')
@section('css')
    <link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/ui-elements/pagination.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/elements/tooltip.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/apps/ecommerce.css" rel="stylesheet" type="text/css" />
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
                                                    <th>รายการ/th>
                                                    <th>จำนวน</th>
                                                    <th>ราคา</th>
                                                    <th>PV</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <img src="assets/img/product-1.jpg" alt="contact-img"
                                                            title="contact-img" class="rounded-circle mr-3" height="48"
                                                            width="48"
                                                            style="object-fit: cover;
                                                    ">
                                                        <p class="mb-0 mt-3 d-inline-block align-middle font-16">
                                                            <a href="ecommerce-product-detail.html"
                                                                class="text-reset font-family-secondary">Jose Headphone</a>
                                                            <br>
                                                            <small class="mr-2"><b>Size:</b> Large </small>
                                                            <small><b>Color:</b> Black
                                                            </small>
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <select class="custom-select mb-1 mr-3 pr-5" id="quantityinput">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <h6>$1,000</h6>
                                                    </td>
                                                    <td>
                                                        <h6>50</h6>
                                                    </td>
                                                    <td>
                                                        <a href="javascript:void(0);" class="action-icon text-center">
                                                            <button type="button" class="btn btn-danger font-15"><i
                                                                    class="lar la-trash-alt"></i></button></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="assets/img/product-2.jpg" alt="contact-img"
                                                            title="contact-img" class="rounded-circle mr-3" height="48"
                                                            width="48"
                                                            style="object-fit: cover;
                                                    ">
                                                        <p class="mb-0 mt-3 d-inline-block align-middle font-16">
                                                            <a href="ecommerce-product-detail.html"
                                                                class="text-body font-family-secondary">Zikkon Camera</a>
                                                            <br>
                                                            <small class="mr-2"><b>Model:</b> ZK90R </small>
                                                            <small><b>Color:</b> Black </small>
                                                        </p>
                                                    </td>
                                                    <td>
                                                        $500.00
                                                    </td>
                                                    <td>
                                                        <input type="number" min="1" value="1"
                                                            class="form-control" placeholder="Qty" style="width: 90px;">
                                                    </td>
                                                    <td>
                                                        $500.00
                                                    </td>
                                                    <td>
                                                        <a href="javascript:void(0);" class="action-icon"> <i
                                                                class="mdi mdi-delete"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="assets/img/product-3.jpg" alt="contact-img"
                                                            title="contact-img" class="rounded-circle mr-3" height="48"
                                                            width="48"
                                                            style="object-fit: cover;
                                                    ">
                                                        <p class="mb-0 mt-3 d-inline-block align-middle font-16">
                                                            <a href="ecommerce-product-detail.html"
                                                                class="text-body font-family-secondary">My Notebook</a>
                                                            <br>
                                                            <small class="mr-2"><b>Size:</b> Medium </small>
                                                            <small><b>Color:</b> Grey </small>
                                                        </p>
                                                    </td>
                                                    <td>
                                                        $5000
                                                    </td>
                                                    <td>
                                                        <input type="number" min="1" value="1"
                                                            class="form-control" placeholder="Qty" style="width: 90px;">
                                                    </td>
                                                    <td>
                                                        $5000.00
                                                    </td>
                                                    <td>
                                                        <a href="javascript:void(0);" class="action-icon"> <i
                                                                class="mdi mdi-delete"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="assets/img/product-4.jpg" alt="contact-img"
                                                            title="contact-img" class="rounded-circle mr-3"
                                                            height="48" width="48"
                                                            style="object-fit: cover;
                                                    ">
                                                        <p class="mb-0 mt-3 d-inline-block align-middle font-16">
                                                            <a href="ecommerce-product-detail.html"
                                                                class="text-body font-family-secondary">Canvas Shoe</a>
                                                            <br>
                                                            <small class="mr-2"><b>Size:</b> Large </small>
                                                            <small><b>Color:</b> Green </small>
                                                        </p>
                                                    </td>
                                                    <td>
                                                        $100.00
                                                    </td>
                                                    <td>
                                                        <input type="number" min="1" value="1"
                                                            class="form-control" placeholder="Qty" style="width: 90px;">
                                                    </td>
                                                    <td>
                                                        $100.00
                                                    </td>
                                                    <td>
                                                        <a href="javascript:void(0);" class="action-icon"> <i
                                                                class="mdi mdi-delete"></i></a>
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
                                        <div class="border border-light p-3 mt-4 rounded mb-3">
                                            <h5 class="mb-3"><b>สรุปรายการสั่งซื้อ</b></h5>
                                            <div class="table-responsive">
                                                <table class="table mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td>Sub Total :</td>
                                                            <td>$6100.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-success-teal">Discount : </td>
                                                            <td class="text-success-teal">-$100.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Shipping Charge :</td>
                                                            <td>$25.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Estimated Tax : </td>
                                                            <td>$10.00</td>
                                                        </tr>
                                                        <tr>
                                                            <th>GrandTotal :</th>
                                                            <th>$6035.00</th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <a class="w-100 btn btn-dark mb-0 ml-3 mr-3"><i class="las la-arrow-left"></i>
                                                Go Back</a>
                                            <a href="apps_ecommerce_checkout.html"
                                                class="w-100 btn btn-outline-primary mb-0 ml-3 mr-3">Continue <i
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
