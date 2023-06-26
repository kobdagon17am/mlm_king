@extends('layouts.frontend.app')
@section('css')
    <link href="{{ asset('frontend/assets/css/ui-elements/pagination.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend/plugins/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend/assets/css/elements/tooltip.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend/assets/css/apps/ecommerce.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <!--  Content Area Starts  -->
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
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">สั่งซื้อสินค้า</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><span>สินค้าทั่วไป</span></li>
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
                        <div class="widget-content searchable-container grid">
                            {{-- <div class="card-box">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-7 filtered-list-search align-self-center">
                                        <form class="form-inline my-2 my-lg-0">
                                            <div class="">
                                                <i class="las la-search toggle-search"></i>
                                                <input type="text" id="input-search" class="form-control search-form-control  ml-lg-auto" placeholder="Search Products">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-12 text-sm-right text-right align-self-center">
                                        <div class="d-flex justify-content-sm-end justify-content-center contact-options">
                                            <a href="apps_ecommerce_add_product.html" title="Add a product" class="pointer font-25 s-o mr-2 bs-tooltip">
                                                <i class="las la-plus-circle"></i>
                                            </a>
                                            <a href="javascript:void(0);" title="List View" class="pointer font-25 view-list s-o mr-2 bs-tooltip">
                                                <i class="las la-list"></i>
                                            </a>
                                            <a title="Grid View" class="pointer font-25 view-grid active-view s-o mr-2 bs-tooltip">
                                                <i class="las la-th-large"></i>
                                            </a>
                                            <a title="Filter" class="pointer font-25 s-o bs-tooltip mr-2">
                                                <i class="las la-filter"></i>
                                            </a>
                                            <select class="btn btn-outline-primary btn-sm h-auto p-2"
                                                id="exampleFormControlSelect1">
                                                <option>Sort By</option>
                                                <option>ชื่อ</option>
                                                <option>ราคา ต่ำ-สูง</option>
                                                <option>ราคา สูง-ต่ำ</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-soft-warning" data-toggle="modal"
                                                    data-target=".bd-example-modal-lg" type="button">โค้ดคูปอง</button>
                                            </div>
                                            <input type="text" class="form-control" placeholder="รหัสคูปอง">
                                            <div class="input-group-append">
                                                <button class="btn btn-warning" type="button">ใช้งาน!</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myLargeModalLabel"><b>โค้ดคูปอง</b></h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <i class="las la-times"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="modal-text">
                                                <div class="table-responsive mb-4">
                                                    <table id="ordertable" class="table table-hover" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>วันหมดอายุ</th>
                                                                <th>Code</th>
                                                                <th>รายละเอียด</th>
                                                                <th>สถานะ</th>
                                                                <th>ใช้งานโค้ดคูปอง</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>15/09/2023</td>
                                                                <td><span class="badge outline-badge-dark">AAA</span></td>
                                                                <td>BUY 1 GET 1 FREE</td>
                                                                <td>
                                                                    <span class="badge badge-success light">ใช้งานได้</span>
                                                                </td>
                                                                <td><button type="submit"
                                                                        class="btn btn-outline-warning width-sm btn-sm">
                                                                        <i class="las la-check-circle font-13"></i>
                                                                        ใช้งาน</button>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>15/09/2023</td>
                                                                <td><span class="badge outline-badge-dark">AAA</span></td>
                                                                <td>BUY 1 GET 1 FREE</td>
                                                                <td>
                                                                    <span class="badge badge-success light">ใช้งานได้</span>
                                                                </td>
                                                                <td><button type="submit"
                                                                        class="btn btn-outline-warning width-sm btn-sm">
                                                                        <i class="las la-check-circle font-13"></i>
                                                                        ใช้งาน</button>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>15/09/2023</td>
                                                                <td><span class="badge outline-badge-dark">AAA</span></td>
                                                                <td>BUY 1 GET 1 FREE</td>
                                                                <td>
                                                                    <span class="badge badge-success light">ใช้งานได้</span>
                                                                </td>
                                                                <td><button type="submit"
                                                                        class="btn btn-outline-warning width-sm btn-sm">
                                                                        <i class="las la-check-circle font-13"></i>
                                                                        ใช้งาน</button>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-ml-12">
                                    <div class="widget-content widget-content-area tab-horizontal-line pt-0">
                                        <ul class="nav nav-tabs" id="animateLine" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="agriculture-tab" data-toggle="tab"
                                                    href="#agriculture" role="tab" aria-controls="agriculture"
                                                    aria-selected="true" style="font-size: 14px;"> เกษตร</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="agriculture_stock-tab" data-toggle="tab"
                                                    href="#agriculture_stock" role="tab"
                                                    aria-controls="agriculture_stock" aria-selected="false"
                                                    style="font-size: 14px;"> คลังเกษตร</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="beauty-tab" data-toggle="tab" href="#beauty"
                                                    role="tab" aria-controls="beauty" aria-selected="false"
                                                    style="font-size: 14px;">
                                                    ความงาม</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="body-tab" data-toggle="tab" href="#body"
                                                    role="tab" aria-controls="Body" aria-selected="false"
                                                    style="font-size: 14px;">
                                                    ดูแลผิวกาย</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="cosmetic-tab" data-toggle="tab" href="#cosmetic"
                                                    role="tab" aria-controls="cosmetic" aria-selected="false"
                                                    style="font-size: 14px;">
                                                    บำรุงผิวหน้า</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="promotion-tab" data-toggle="tab"
                                                    href="#promotion" role="tab" aria-controls="promotion"
                                                    aria-selected="false" style="font-size: 14px;"> ส่งเสริมการขาย</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="healthy-tab" data-toggle="tab" href="#healthy"
                                                    role="tab" aria-controls="healthy" aria-selected="false"
                                                    style="font-size: 14px;">
                                                    สินค้าสุขภาพ</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="other-tab" data-toggle="tab" href="#other"
                                                    role="tab" aria-controls="other" aria-selected="false"
                                                    style="font-size: 14px;"> อื่นๆ</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content make-post-tab" id="animateLineContent-4">
                                            <div class="tab-pane fade active show" id="agriculture" role="tabpanel"
                                                aria-labelledby="agriculture-tab">
                                                <div class="searchable-items grid card-box">
                                                    @foreach ($get_cart_agriculture as $value)
                                                        <div class="items">
                                                            <div class="item-content">
                                                                <div class="product-info">
                                                                    <div>
                                                                        <a href="{{ route('CartGeneralDetail') }}"><img
                                                                                src="{{ asset($value->product_image_url . '' . $value->product_image_name) }}"
                                                                                style="max-height: 150px; max-width: 150px;"
                                                                                alt="Responsive image"></a>
                                                                    </div>
                                                                    <div class="user-meta-info">
                                                                        <p class="product-name">
                                                                        <h5><b>{{ $value->product_name }}</b></h5>
                                                                        </p>
                                                                    </div>
                                                                    <div class="product-price">
                                                                        <p class="product-category-price"><span><b>฿
                                                                                    {{ $value->product_price_member }}</b></span>({{ $value->product_pv }}
                                                                            pv)
                                                                        </p>
                                                                    </div>

                                                                    <div class="product-stock-status">
                                                                        <p class="product-stock-status-inner">
                                                                            <a href="{{ route('Cart') }}"><button
                                                                                    type="button"
                                                                                    class="btn btn-outline-success btn-rounded"><i
                                                                                        class="las la-cart-plus las-white font-17"></i>
                                                                                    เพิ่มสินค้า
                                                                                </button>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    {{-- <div class="widget-content widget-content-area text-center w-100 mt-4">
                                                        <div class="pagination p1">
                                                            <ul class="mx-auto">
                                                                <a href="previous">
                                                                    <li><i class="las la-angle-left"></i></li>
                                                                </a>
                                                                <a class="is-active" href="page">
                                                                    <li>1</li>
                                                                </a>
                                                                <a href="page2">
                                                                    <li>2</li>
                                                                </a>
                                                                <a href="page2">
                                                                    <li>3</li>
                                                                </a>
                                                                <a href="next">
                                                                    <li><i class="las la-angle-right"></i></li>
                                                                </a>
                                                            </ul>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="agriculture_stock" role="tabpanel"
                                                aria-labelledby="agriculture_stock-tab">
                                                agriculture_stock
                                            </div>
                                            <div class="tab-pane fade" id="beauty" role="tabpanel"
                                                aria-labelledby="beauty-tab">
                                                beauty
                                            </div>
                                            <div class="tab-pane fade" id="body" role="tabpanel"
                                                aria-labelledby="body-tab">
                                                body
                                            </div>
                                            <div class="tab-pane fade" id="cosmetic" role="tabpanel"
                                                aria-labelledby="cosmetic-tab">
                                                cosmetic
                                            </div>
                                            <div class="tab-pane fade" id="promotion" role="tabpanel"
                                                aria-labelledby="promotion-tab">
                                                promotion
                                            </div>
                                            <div class="tab-pane fade" id="healthy" role="tabpanel"
                                                aria-labelledby="healthy-tab">
                                                healthy
                                            </div>
                                            <div class="tab-pane fade" id="other" role="tabpanel"
                                                aria-labelledby="other-tab">
                                                other
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
    <!--  Content Area Ends  -->
@endsection
