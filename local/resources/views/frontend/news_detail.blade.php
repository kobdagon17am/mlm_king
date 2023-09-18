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
                                        <span>ข่าวสารและกิจกรรม</span>
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
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12 mt-4 text-center">
                                    <h3><b>{{ $get_news->news_title }}</b></h3>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div id="content_6" class="tabcontent">
                                        <div class="posted-post">
                                            <div class="post-body-1 t2">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="image-container">
                                                            <img src="{{ asset($get_news->news_image_url . '' . $get_news->news_image_name) }}"
                                                                class="img-fluid" />
                                                        </div>
                                                        <div class="col-md-12 mt-4">
                                                            <h5 class="post-text">
                                                                {{ $get_news->news_detail }}
                                                            </h5>
                                                        </div>
                                                        <div class="col-md-12 mt-5 text-right">
                                                            <b>วันที่เขียนข่าว: </b>{{ $get_news->created_at }}
                                                        </div>
                                                        <div class="col-md-12 text-right">
                                                            <b>แหล่งข่าวอ้างอิง: </b><a href="{{ $get_news->news_url }}">{{ $get_news->news_url }}</a>
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
                </div>
            </div>
            <!-- Main Body Ends -->
        </div>
    @endsection
    @section('js')
    @endsection
