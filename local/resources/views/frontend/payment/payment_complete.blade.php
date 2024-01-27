@extends('layouts.frontend.app')
@section('css')

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/pages/coming-soon/style.css') }}">

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
                                    <li class="breadcrumb-item active" aria-current="page"><span>ผลการชำระเงินสำเร็จ</span>
                                    </li>
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


                            <div class="col-lg-12 col-xl-12">
                                <div class="coming-soon-bottom">
                                    <h1>ชำระเงินสำเร็จ</h1>
                                    <p class="mb-0 mt-3">ขอบคุณที่เลือกลงทนกับเรา</p>
                                    <p class="mb-0">รอคอยติดตามผลกำไรได้ที่หน้าแรกของเรา</p>
                                    <a href="{{route('Order')}}" class="btn btn-success mt-3">
                                        <i class="las la-clipboard-list"></i> ประวัติการชำระเงิน </a>

                                </div>
                            </div>
                        </div>
                    </div>



                </div>

            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('frontend/plugins/dropify/dropify.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/pages/profile_edit.js') }}"></script>


@endsection
