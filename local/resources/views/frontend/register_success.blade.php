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
                                    <li class="breadcrumb-item active" aria-current="page"> <span>สมัครสมาชิก</span>
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
            <div class="row layout-spacing">
                
                @foreach ($get_customers as $value)
                    <div class="col-md-4  text-center mt-3">
                        <div class="profile-left">
                            <div class="image-area">
                                <img class="avatar-xl img-fluid rounded"
                                    src="{{ asset('frontend/assets/img/profile_blank.png') }}">

                                    <div class="info-area" style="text-align: left;">
                                        <p><b>USERNAME:</b> {{ $value->username }}</p>
                                        <p><b>PASSWORD:</b> {{ $value->password_real }}</p>
                                        <p><b>ชื่อ:</b> {{ $value->first_name }}</p>
                                        <p><b>นามสกุล:</b> {{ $value->last_name }}</p>
                                    </div>
                                    
                                <div class="info-area col-md-12 text-center">
                                    <a href="{{ route('tree')}}">
                                        <button class="btn btn-info">
                                            <i class="las la-sitemap"></i> โครงสร้างสายงาน
                                        </button>
                                    </a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Main Body Ends -->
        </div>
    @endsection
    @section('js')
    @endsection
