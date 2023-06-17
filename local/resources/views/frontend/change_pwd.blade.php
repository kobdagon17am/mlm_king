@extends('layouts.frontend.app')
@section('css')
    <link href="{{ asset('frontend/assets/css/pages/profile.css') }}" rel="stylesheet" type="text/css" />
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
                                    <li class="breadcrumb-item active" aria-current="page"> <span>แก้ไขรหัส Login</span>
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
                <div class="col-md-4">
                </div>
                <div class="col-md-4  text-center">
                    <div class="profile-left">
                        <div class="image-area">
                            <img class="rounded-circle img-thumbnail user-image"
                                src="{{ asset('frontend/assets/img/profile-16.jpg') }}">
                        </div>
                        <div class="info-area">
                            <h5><b>กิ่งทองใบหยก (A001)</b></h5>
                            <p>GOLD</p>
                        </div>
                        <div class="profile-tabs">
                            <div class="nav flex-column nav-pills mb-sm-0 mb-3 mx-auto" id="v-border-pills-tab"
                                role="tablist" aria-orientation="vertical">
                                <div class="form-group">
                                    <div class="input-group" id="change_password">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="las la-key font-20"></i></span>
                                        </div>
                                        <input type="password" class="form-control" placeholder="Change Password">
                                    </div>
                                    <p></p>
                                    <div class="input-group" id="confirm_change_password">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="las la-key font-20"></i></span>
                                        </div>
                                        <input type="password" class="form-control" placeholder="Confirm Change Password">
                                    </div>
                                    <div class="info-area col-md-12 text-center">
                                        <button type="submit" class="btn btn-info ">
                                            <i class="las la-key"></i> Change Password</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                </div>
            </div>
        </div>
        <!-- Main Body Ends -->
    </div>
@endsection
@section('js')
@endsection
