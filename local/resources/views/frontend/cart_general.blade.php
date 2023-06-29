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
                    <div class="widget-content searchable-container grid">
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
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                    </div>
                    <div class="row">
                        <div class="col-ml-12">
                            <div class="widget-content widget-content-area tab-horizontal-line">
                                <ul class="nav nav-tabs" id="category" role="tablist">
                                    
                                    @foreach ($get_category as $index => $value)
                                            <li class="nav-item">
                                                <a class="nav-link {{ $index == 0 ? 'active' : '' }}"
                                                    id="tab-{{ $value->category_name }}" data-toggle="tab"
                                                    href="#other-{{ $value->id }}" role="tab"
                                                    aria-controls="other-{{ $value->category_name }}"
                                                    aria-selected="{{ $index == 0 ? 'true' : 'false' }}"
                                                    style="font-size: 14px;">{{ $value->category_name }}</a>
                                            </li>                   
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content make-post-tab" id="animateLineContent-4">
                        <?php
                        $i=0;
                        ?>
                        @foreach ($get_category as $index => $value)
                        <?php
                        $i++;
                        if($i == 1){
                            $class = 'active show';
                        }else{
                            $class = '';
                        }
                        ?>
                            <div class="tab-pane fade {{$class}}" id="other-{{ $value->id }}" role="tabpanel"
                                aria-labelledby="tab-{{ $value->category_name }}">
                                <?php
                                $product =\App\Http\Controllers\Frontend\CartGeneralController::product_detail($value->id);
                             
                                ?>
                                <div class="container">
                                    <div class="row">
                                    
                                        <div class="col-12">
                                            <div class="searchable-items grid card-box">
                                                @foreach ($product as $item)
                                                <div class="items">
                                                    <div class="item-content">
                                                        
                                                            @if ($item->product_category_id_fk == $value->id)
                                                                <div>
                                                                    <a href="{{ route('CartGeneralDetail') }}"><img
                                                                            src="{{ asset($item->product_image_url . '' . $item->product_image_name) }}"
                                                                            style="max-height: 150px; max-width: 150px;"
                                                                            alt="Responsive image"></a>
                                                                </div>
                                                                <div class="user-meta-info">
                                                                    <p class="product-name">
                                                                    <h5><b>{{ $item->product_name }}</b></h5>
                                                                    </p>
                                                                </div>
                                                                <div class="product-price">
                                                                    <p class="product-category-price">
                                                                        <span><b>฿{{ $item->product_price_member }}</b></span>({{ $item->product_pv }}
                                                                        pv)
                                                                    </p>
                                                                </div>
                                                                <div class="product-stock-status">
                                                                    <p class="product-stock-status-inner">
                                                                        <a href="{{ route('Cart') }}"><button
                                                                                type="button"
                                                                                class="btn btn-outline-success btn-rounded"><i
                                                                                    class="las la-cart-plus las-white font-17"></i>
                                                                                เพิ่มสินค้า</button>
                                                                    </p>
                                                                </div>
                                                            @endif
                                                       
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!--  Content Area Ends  -->
@endsection
