@extends('layouts.frontend.app')
@section('css')
<link href="plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
<link href="assets/css/dashboard/dashboard_2.css" rel="stylesheet" type="text/css" />
<link href="plugins/flatpickr/flatpickr.css" rel="stylesheet" type="text/css">
<link href="plugins/flatpickr/custom-flatpickr.css" rel="stylesheet" type="text/css">
<link href="assets/css/elements/tooltip.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboards</a></li>
                                {{-- <li class="breadcrumb-item active" aria-current="page"><span>Dashboard 2</span></li> --}}
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
            {{-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget top-welcome">
                    <div class="f-100">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="media">
                                    <div class="mr-3">
                                        <img src="assets/img/profile-16.jpg" alt="" class="avatar-md rounded-circle img-thumbnail">
                                    </div>
                                    <div class="align-self-center media-body">
                                        <div class="text-muted">
                                            <p class="mb-2 text-primary">Welcome to dashboard</p>
                                            <h5 class="mb-1">Sara</h5>
                                            <p class="mb-0">System Admin</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="align-self-center col-lg-5">
                                <div class="text-lg-center mt-4 mt-lg-0">
                                    <div class="row">
                                        <div class="col-3">
                                            <div>
                                                <p class="text-muted text-truncate mb-2">Projects</p>
                                                <h5 class="mb-0">48</h5>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div>
                                                <p class="text-muted text-truncate mb-2">Team</p>
                                                <h5 class="mb-0">40</h5>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div>
                                                <p class="text-muted text-truncate mb-2">Clients</p>
                                                <h5 class="mb-0">18</h5>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div>
                                                <p class="text-muted text-truncate mb-2">Sellers</p>
                                                <h5 class="mb-0">98</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-none d-lg-flex col-lg-3 align-items-end justify-content-center flex-column">
                                <button class="btn btn-primary">
                                   Settings
                                </button>
                                <button class="btn btn-info mt-2">
                                    My Chat
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget-chart-one">
                    <div class="widget-content overflow-hidden">
                        <div class="ticker-wrap">
                            {{-- <div class="ticker-heading bg-gradient-info">
                                <p>ประกาศ</p>
                            </div> --}}
                            <div class="ticker">
                                <div class="ticker-item">Letterpress chambray brunch.</div>
                                <div class="ticker-item">Vice mlkshk crucifix beard chillwave meditation hoodie asymmetrical Helvetica.</div>
                                <div class="ticker-item">Ugh PBR&B kale chips Echo Park.</div>
                                <div class="ticker-item">Gluten-free mumblecore chambray mixtape food truck. </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 4 Columns -->
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget bg-gradient-danger">
                    <div class="f-100">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="text-white">
                                    <h5 class="text-white">Pending Tasks !</h5>
                                    <p class="blink_me text-white mt-1">Deadline Tomorrow</p>
                                    <ul class="pl-3 mb-0">
                                        <li class="py-1">Seller Payments</li>
                                        <li class="py-1">Check Payouts</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="align-self-end col-md-5">
                                <img src="assets/img/dashboard-image-uw.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="widget">
                            <div class="d-flex align-items-center mb-3">
                                <div class="mr-3">
                                    <span class="quick-category-icon qc-primary rounded-circle">
                                        <i class="las la-shopping-cart"></i>
                                    </span>
                                </div>
                                <h5 class="font-size-14 mb-0">Orders</h5>
                            </div>
                            <div class="text-muted mt-3">
                                <h5 class="mb-2">1,452
                                    <i class="las la-angle-up text-success-teal"></i>
                                </h5>
                                <div class="d-flex">
                                    <span class="badge badge-success-teal font-size-12"> + 0.2% </span>
                                    <span class="ml-2 text-truncate">From last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="widget">
                            <div class="d-flex align-items-center mb-3">
                                <div class="mr-3">
                                    <span class="quick-category-icon qc-primary rounded-circle">
                                        <i class="las la-hand-holding-usd"></i>
                                    </span>
                                </div>
                                <h5 class="font-size-14 mb-0">Profit</h5>
                            </div>
                            <div class="text-muted mt-3">
                                <h5 class="mb-2">$200
                                    <i class="las la-angle-down text-danger"></i>
                                </h5>
                                <div class="d-flex">
                                    <span class="badge badge-danger font-size-12"> - 5.4% </span>
                                    <span class="ml-2 text-truncate">From last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="widget">
                            <div class="d-flex align-items-center mb-3">
                                <div class="mr-3">
                                    <span class="quick-category-icon qc-primary rounded-circle">
                                        <i class="las la-user"></i>
                                    </span>
                                </div>
                                <h5 class="font-size-14 mb-0">Customer</h5>
                            </div>
                            <div class="text-muted mt-3">
                                <h5 class="mb-2">9,887
                                    <i class="las la-angle-up text-success-teal"></i>
                                </h5>
                                <div class="d-flex">
                                    <span class="badge badge-success-teal font-size-12"> + 25% </span>
                                    <span class="ml-2 text-truncate">From last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-one">
                    <div class="widget-heading">
                        <h5 class="">Top Seller Performance</h5>
                        <ul class="tabs tab-pills">
                            <li>
                                <div class="dropdown  custom-dropdown-icon">
                                    <a class="dropdown-toggle" href="#" role="button" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span>Options</span> <i class="las la-angle-down"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown">
                                        <a class="dropdown-item" data-value="Settings" href="javascript:void(0);">Quarterly</a>
                                        <a class="dropdown-item" data-value="Settings" href="javascript:void(0);">Half Yearly</a>
                                        <a class="dropdown-item" data-value="Mail" href="javascript:void(0);">Mail</a>
                                        <a class="dropdown-item" data-value="Print" href="javascript:void(0);">Print</a>
                                        <a class="dropdown-item" data-value="Download" href="javascript:void(0);">Download</a>
                                        <a class="dropdown-item" data-value="Share" href="javascript:void(0);">Share</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="widget-content">
                        <div class="tabs tab-content row">
                            <div class="left-area col-lg-4">
                                <h6 class="mb-0 mt-4">WS Retail</h6>
                                <p>Best Seller of the month</p>
                                <h4 class="mt-3">$3,808</h4>
                                <div class="d-flex">
                                    <span class="badge badge-success-teal font-size-12"> + 25% </span>
                                    <span class="ml-2 text-truncate">more sales</span>
                                </div>
                                <button class="btn btn-sm btn-primary mt-4">View Details</button>
                                <p class="mb-0 mt-4">Last Month</p>
                                <p>$2,405</p>
                            </div>
                            <div class="right-area col-lg-8">
                                <div id="content_1" class="tabcontent">
                                    <div id="bestSeller"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-two">
                    <div class="widget-heading">
                        <h5 class="text-center">Top Selling Product</h5>
                    </div>
                    <div class="widget-content mt-4">
                        <img src="assets/img/product-1.jpg" class="rounded-circle avatar-md img-thumbnail m-auto object-cover"/>
                        <h6 class="text-center mt-2">Product One</h6>
                        <p class="text-center">$5,458</p>
                        <div class="d-flex justify-content-center mb-4">
                            <span class="badge badge-success font-size-12"> + 25% </span>
                            <span class="ml-2 text-truncate">From last month</span>
                        </div>
                        <img src="assets/img/product-4.jpg" class="rounded-circle avatar-md img-thumbnail m-auto object-cover"/>
                        <h6 class="text-center mt-2">Product Two</h6>
                        <p class="text-center">$5,458</p>
                        <div class="d-flex justify-content-center mb-4">
                            <span class="badge badge-danger font-size-12"> - 25% </span>
                            <span class="ml-2 text-truncate">From last month</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 layout-spacing">
                <div class="row">
                    <div class="col-md-6">
                        <div class="widget widget-chart-one">
                            <div class="widget-heading">
                                <h5 class="">Sales details of product</h5>
                            </div>
                            <div class="widget-content">
                                <div class="d-flex justify-content-between">
                                    <p class="font-35 text-success-teal">$74,989</p>
                                    <i class="lar la-chart-bar font-45 text-success-teal"></i>
                                </div>
                                <p>Total 175 Sales</p>
                                <a class="btn btn-sm btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="widget widget-chart-one">
                            <div class="widget-heading">
                                <h5 class="">Pending payment of product</h5>
                            </div>
                            <div class="widget-content">
                                <div class="d-flex justify-content-between">
                                    <p class="font-35 text-warning">$24,989</p>
                                    <i class="lar la-chart-bar font-45 text-warning"></i>
                                </div>
                                <p>Total 98 clients</p>
                                <a class="btn btn-sm btn-warning">View Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="widget widget-chart-one">
                            <div class="widget-heading">
                                <h5 class="">Recent Items</h5>
                                <ul class="tabs tab-pills">
                                    <li>
                                        <div class="dropdown  custom-dropdown-icon">
                                            <a class="dropdown-toggle" href="#" role="button" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span>Options</span> <i class="las la-angle-down"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown">
                                                <a class="dropdown-item" data-value="Print" href="javascript:void(0);">Print</a>
                                                <a class="dropdown-item" data-value="Download" href="javascript:void(0);">Download</a>
                                                <a class="dropdown-item" data-value="Share" href="javascript:void(0);">Share</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="widget-content">
                                <div class="d-flex flex-column">
                                    <div class="media recent-items w-100 align-items-center mt-2 mb-4">
                                        <img src="assets/img/product-1.jpg" alt="">
                                        <div class="media-body ml-4 mt-sm-3">
                                            <h5 class="mb-1">1005 Farland Street,West Roxbury</h5>
                                            <p>05 Jul 2018, Fergus Douchebag</p>
                                        </div>
                                        <a class="badge badge-success-teal text-white mr-2">Completed</a>
                                        <a class="badge badge-warning text-white d-none d-lg-block">Pending</a>
                                    </div>
                                    <div class="media recent-items w-100 align-items-center mb-4">
                                        <img src="assets/img/product-2.jpg" alt="">
                                        <div class="media-body ml-4 mt-sm-3">
                                            <h5 class="mb-1">845 Nrarland Street,east Opobury </h5>
                                            <p>12 Jul 2019, Fergus Douchebag</p>
                                        </div>
                                        <a class="badge badge-info text-white mr-2">Processing</a>
                                        <a class="badge badge-success text-white d-none d-lg-block">Done</a>
                                    </div>
                                    <div class="media recent-items w-100 align-items-center mb-4">
                                        <img src="assets/img/product-3.jpg" alt="">
                                        <div class="media-body ml-4 mt-sm-3">
                                            <h5 class="mb-1">8/D Talbagan Street,North 24 midland Opobury </h5>
                                            <p>12 Jul 2019, Jonas Ferguson</p>
                                        </div>
                                        <a class="badge badge-danger text-white mr-2">Failed</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-one">
                    <div class="widget-content">
                        <div class="agent-info text-center">
                            <div class="agent-img pb-3">
                                <img src="assets/img/profile-5.jpg" class="img-thumbnail rounded-circle" alt="image">
                            </div>
                            <h5 class="text-dark">Hermann P. Schnitzel</h5>
                            <p>Agent of Property</p>
                            <h6 class="mb-3 mt-3"><span class="text-primary pr-2"><i class="fa fa-phone"></i></span> (+1) 774-238-0096</h6>
                        </div>
                        <form action="index.html" class="agent-req-form mt-2">
                            <h6 class="text-muted text-center mb-4">Request Inquiry</h6>
                            <div class="form-group">
                                <input type="text" placeholder="Full Name *" class="form-control bg-white text-muted">
                            </div>
                            <div class="form-group">
                                <input type="email" placeholder="Email ID *" class="form-control bg-white text-muted">
                            </div>
                            <div class="form-group">
                                <input type="tel" placeholder="Phone No *" class="form-control bg-white text-muted">
                            </div>
                            <div class="form-group">
                                <textarea rows="3" placeholder="Message *" class="form-control bg-white text-muted"></textarea>
                            </div>
                            <div class="form-group text-right mb-0">
                                <button type="submit" class="btn btn-sm btn-outline-primary">Submit Request</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- Copyright Footer Ends -->
    <!-- Arrow Starts -->
    <div class="scroll-top-arrow" style="display: none;">
        <i class="las la-angle-up"></i>
    </div>
    <!-- Arrow Ends -->
</div>
@endsection
@section('js')
<script src="plugins/apex/apexcharts.min.js"></script>
<script src="plugins/flatpickr/flatpickr.js"></script>
<script src="assets/js/dashboard/dashboard_2.js"></script>
@endsection
