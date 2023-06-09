@extends('layouts.frontend.app')
@section('css')
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
                                    <li class="breadcrumb-item" aria-current="page"><a
                                            href="{{ route('CartGeneral') }}">สินค้าทั่วไป</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><span>รายละเอียดสินค้า</span>
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
        <div class="layout-px-spacing">
            <div class="row layout-spacing layout-top-spacing" id="cancel-row">
                <div class="col-lg-12">
                    <div class="">
                        <div class="widget-content searchable-container grid">
                            <div class="card-box product-details">
                                <div class="row">
                                    <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12">
                                        <div class="tab-content pt-0">
                                            <div class="tab-pane show" id="product-1-item">
                                                <img src="{{ asset('assets/img/product-detail-1.jpg') }}" alt=""
                                                    class="img-fluid mx-auto d-block rounded">
                                            </div>
                                            <div class="tab-pane" id="product-2-item">
                                                <img src="{{ asset('assets/img/product-detail-2.jpg') }}" alt=""
                                                    class="img-fluid mx-auto d-block rounded">
                                            </div>
                                            <div class="tab-pane" id="product-3-item">
                                                <img src="{{ asset('assets/img/product-detail-3.jpg') }}" alt=""
                                                    class="img-fluid mx-auto d-block rounded">
                                            </div>
                                            <div class="tab-pane active" id="product-4-item">
                                                <img src="{{ asset('assets/img/product-detail-4.jpg') }}" alt=""
                                                    class="img-fluid mx-auto d-block rounded">
                                            </div>
                                        </div>
                                        <ul class="nav nav-pills nav-justified">
                                            <li class="nav-item">
                                                <a href="#product-1-item" data-toggle="tab" aria-expanded="false"
                                                    class="nav-link product-thumb show">
                                                    <img src="{{ asset('assets/img/product-detail-1.jpg') }}" alt=""
                                                        class="img-fluid mx-auto d-block rounded">
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#product-2-item" data-toggle="tab" aria-expanded="true"
                                                    class="nav-link product-thumb">
                                                    <img src="{{ asset('assets/img/product-detail-2.jpg') }}" alt=""
                                                        class="img-fluid mx-auto d-block rounded">
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#product-3-item" data-toggle="tab" aria-expanded="false"
                                                    class="nav-link product-thumb">
                                                    <img src="{{ asset('assets/img/product-detail-3.jpg') }}" alt=""
                                                        class="img-fluid mx-auto d-block rounded">
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#product-4-item" data-toggle="tab" aria-expanded="false"
                                                    class="nav-link product-thumb active">
                                                    <img src="{{ asset('assets/img/product-detail-4.jpg') }}" alt=""
                                                        class="img-fluid mx-auto d-block rounded">
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12">
                                        <div class="mt-3 mt-xl-0">
                                            <a href="{{ route('CartGeneral') }}" class="text-primary mb-3 d-block">
                                                <i class="las la-arrow-left"></i> รายการสินค้า
                                            </a>
                                            <h2 class="mb-3 text-black strong">Product 1</h2>
                                            <h3 class="mb-3">
                                                <b>฿ 1,000</b>
                                                <span class="text-success ml-2">(50PV)</span>
                                            </h3>
                                            <h6>
                                                <p class="text-muted mb-4"><b>รายละเอียดสินค้า:</b> There are many
                                                    variations of
                                                    passages of product
                                                    available, but the majority have suffered alteration in some form, by
                                                    injected humour, or randomised words which don't look even slightly
                                                    believable.</p>
                                            </h6>
                                            {{-- <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <p class="text-muted strong font-13">Highlights</p>
                                                    <div>
                                                        <p class="text-muted"><i class="lar la-check-circle"></i> Shirt
                                                            has amazing fabric</p>
                                                        <p class="text-muted"><i class="lar la-check-circle"></i> 100%
                                                            Cotton with no polyster</p>
                                                        <p class="text-muted"><i class="lar la-check-circle"></i>Perfect
                                                            for summer outfit</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>&nbsp;</p>
                                                    <div>
                                                        <p class="text-muted"><i class="lar la-check-circle"></i> Color:
                                                            Milky White</p>
                                                        <p class="text-muted"><i class="lar la-check-circle"></i> Amazing
                                                            fittings</p>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <form class="form-inline mb-4">
                                                <label class="my-1 mr-2" for="quantityinput">Quantity</label>
                                                <select class="custom-select mb-1 mr-3 pr-5" id="quantityinput">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                </select>
                                                <div class="text-center w-40">
                                                    <a href="{{ route('Cart') }}"><button type="button"
                                                            class="btn btn-success btn-rounded">
                                                            <i class="las la-cart-plus las-white font-17"></i> Add to cart
                                                        </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                                <!-- end row -->
                                {{-- <div class="w-100 animated-underline-content mt-2 details-tab-area"> --}}
                                {{-- <ul class="nav nav-tabs  mb-3" id="lineTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="underline-specification-tab" data-toggle="tab"
                                                href="#underline-specification" role="tab"
                                                aria-controls="underline-specification"
                                                aria-selected="false">Specification</a>
                                        </li>
                                    </ul> --}}
                                {{-- <div class="tab-content" id="lineTabContent-3">
                                        <!-- SPECIFICATION -->
                                        <div class="tab-pane fade show active" id="underline-specification" role="tabpanel"
                                            aria-labelledby="underline-specification-tab">
                                            <div class="d-flex flex-wrap p-2">
                                                <p class="text-muted mb-4">There are many variations of passages of shirt
                                                    available, but the majority have suffered alteration in some form, by
                                                    injected humour, or randomised words which don't look even slightly
                                                    believable.</p>
                                                <div class="row mb-3 w-100">
                                                    <div class="col-md-4">
                                                        <p class="text-muted strong font-13">Highlights</p>
                                                        <div>
                                                            <p class="text-muted"><i class="lar la-check-circle"></i>
                                                                Shirt has amazing fabric</p>
                                                            <p class="text-muted"><i class="lar la-check-circle"></i> 100%
                                                                Cotton with no polyster</p>
                                                            <p class="text-muted"><i
                                                                    class="lar la-check-circle"></i>Perfect
                                                                for summer
                                                                outfit</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <p>&nbsp;</p>
                                                        <div>
                                                            <p class="text-muted"><i class="lar la-check-circle"></i>
                                                                Color: Milky White</p>
                                                            <p class="text-muted"><i class="lar la-check-circle"></i>
                                                                Amazing fittings</p>
                                                            <p class="text-muted"><i class="lar la-check-circle"></i> Best
                                                                Design</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <p>&nbsp;</p>
                                                        <div>
                                                            <p class="text-muted"><i class="lar la-check-circle"></i> Best
                                                                Price</p>
                                                            <p class="text-muted"><i class="lar la-check-circle"></i>
                                                                Multiple Color</p>
                                                            <p class="text-muted"><i class="lar la-check-circle"></i>
                                                                Suitable for everyone</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                {{-- <div class="scroll-top-arrow" style="display: none;">
                                    <i class="las la-angle-up"></i>
                                </div> --}}
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
