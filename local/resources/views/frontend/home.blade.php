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
                                <li class="breadcrumb-item active" aria-current="page"> <span>ข่าวสารและกิจกรรม</span></li>
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




        </div>

        <div class="row mt-3">
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top img-fluid" src="assets/img/lightbox-7.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a
                            natural lead-in to additional content. This content is a little bit
                            longer.</p>
                        <p class="card-text">
                            <small class="text-muted">Last updated 3 mins ago</small>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top img-fluid" src="assets/img/lightbox-6.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a
                            natural lead-in to additional content. This content is a little bit
                            longer.</p>
                        <p class="card-text">
                            <small class="text-muted">Last updated 3 mins ago</small>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top img-fluid" src="assets/img/lightbox-5.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a
                            natural lead-in to additional content. This content is a little bit
                            longer.</p>
                        <p class="card-text">
                            <small class="text-muted">Last updated 3 mins ago</small>
                        </p>
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
