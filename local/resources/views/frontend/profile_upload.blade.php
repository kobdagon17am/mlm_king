@extends('layouts.frontend.app')
@section('css')
<link rel="stylesheet" type="text/css" href="plugins/dropify/dropify.min.css">
    <link href="{{ asset('assets/css/pages/profile_edit.css') }}" rel="stylesheet" type="text/css" />
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
                                <li class="breadcrumb-item active" aria-current="page"> <span>อัพโหลดรูปโปรไฟล์</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <p></p>
    
    <div class="col-md-4">
                <div class="upload text-center img-thumbnail">
            <input type="file" id="idcard_image" class="dropify"
                data-default-file="{{ asset('assets/img/user.png') }}"
                data-max-file-size="2M" />
                <p></p>
            <div class="info-area col-md-12 text-center">
                <button type="submit" class="btn btn-info ">
                    <i class="las la-cloud-upload-alt font-20"></i> อัพโหลดรูปภาพ</button>
            </div>
        </div>
    <!-- Main Body Ends -->
</div>
@endsection
@section('js')
<script src="{{ asset('plugins/dropify/dropify.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/profile_edit.js') }}"></script>
@endsection
