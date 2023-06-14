@extends('layouts.frontend.app')
@section('css')
    <link href="{{ asset('assets/css/pages/profile.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div id="content" class="main-content">
        <!-- Main Body Starts -->
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
                                    <li class="breadcrumb-item active" aria-current="page"> <span>สลับบัญชี</span>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </li>
                </ul>
            </header>
        </div>
        <p></p>

        <div class="layout-px-spacing text">
            <div class="row layout-spacing pt-4">
                <div class="col-md-2">
                </div>
                <div class="col-md-4  text-center">
                    <div class="profile-left">
                        <div class="image-area">
                            <img class="rounded-circle img-thumbnail user-image"
                                src="{{ asset('assets/img/profile-16.jpg') }}">
                        </div>
                        <div class="info-area">
                            <h5><b>กิ่งทองใบหยก (A001)</b></h5>
                            <p>GOLD</p>
                        </div>
                        <div class="profile-tabs">
                            <div class="nav flex-column nav-pills mb-sm-0 mb-3 mx-auto" id="v-border-pills-tab"
                                role="tablist" aria-orientation="vertical">
                                <div class="form-group">
                                    <div class="info-area col-md-12 text-center">
                                        <button type="submit" class="btn btn-info ">
                                            <i class="las la-unlock-alt font-18"></i> เข้าสู่ระบบ</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 text-center">
                    <div class="profile-left">
                        <div class="image-area">
                            <img class="rounded-circle img-thumbnail user-image"
                                src="{{ asset('assets/img/profile-24.jpg') }}">
                        </div>
                        <div class="info-area">
                            <h5><b>นำโชค (A002)</b></h5>
                            <p>SILVER</p>
                        </div>
                        <div class="profile-tabs">
                            <div class="nav flex-column nav-pills mb-sm-0 mb-3 mx-auto" id="v-border-pills-tab"
                                role="tablist" aria-orientation="vertical">
                                <div class="form-group">
                                    
                                    <div class="info-area col-md-12 text-center">
                                        <button type="submit" class="btn btn-info ">
                                            <i class="las la-unlock-alt font-18"></i> เข้าสู่ระบบ</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                </div>
            </div>
        </div>
        <!-- Main Body Ends -->
    </div>
@endsection
@section('js')
@endsection
