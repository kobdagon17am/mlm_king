@extends('layouts.frontend.app')
@section('css')

@endsection

@section('content')
<div id="content" class="main-content">
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
                                <li class="breadcrumb-item active" aria-current="page">
                                    <span>ประวัติการสั่งซื้อ</span>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div>

    <!-- Main Body Starts -->
    <div class="layout-px-spacing">
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

                        content

                    </div>
                    {{-- <div class="widget-footer text-right">
                        <button type="reset" class="btn btn-primary mr-2">Submit</button>
                        <button type="reset" class="btn btn-outline-primary">Cancel</button>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- Main Body Ends -->
</div>
@endsection
@section('js')
@endsection
