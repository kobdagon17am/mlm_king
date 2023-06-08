@extends('layouts.frontend.app')

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
                            <div class="card-box">
                                <div class="row">
                                    {{-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-7 filtered-list-search align-self-center">
                                        <form class="form-inline my-2 my-lg-0">
                                            <div class="">
                                                <i class="las la-search toggle-search"></i>
                                                <input type="text" id="input-search" class="form-control search-form-control  ml-lg-auto" placeholder="Search Products">
                                            </div>
                                        </form>
                                    </div> --}}
                                    <div class="col-md-12 text-sm-right text-right align-self-center">
                                        <div class="d-flex justify-content-sm-end justify-content-center contact-options">
                                            {{-- <a href="apps_ecommerce_add_product.html" title="Add a product" class="pointer font-25 s-o mr-2 bs-tooltip">
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
                                            </a> --}}
                                            <select class="btn btn-outline-primary btn-sm h-auto p-2" id="exampleFormControlSelect1">
                                                <option>Select Sort By</option>
                                                <option>Name</option>
                                                <option>Price Low to High</option>
                                                <option>Price Hight to Low</option>
                                                <option>Stock</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="searchable-items grid card-box">
                                <div class="items items-header-section">
                                    <div class="item-content">
                                        <div class="">
                                            <h4>Full Name</h4>
                                        </div>
                                        <div class="product-price">
                                            <h4>Price</h4>
                                        </div>
                                        <div class="product-rating">
                                            <h4 style="margin-left: 0;">Rating</h4>
                                        </div>
                                        <div class="product-stock-status">
                                            <h4 style="margin-left: 3px;">Status</h4>
                                        </div>
                                        <div class="product-stock-status">
                                            <h4 style="margin-left: 3px;">Options</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="items">
                                    <div class="item-content">
                                        <div class="product-info">
                                            <img src="assets/img/product-5.jpg" alt="avatar">
                                            <div class="user-meta-info">
                                                <p class="product-name">Product 1</p>
                                                <p class="product-category">Category One</p>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <p class="product-category-addr"><span>Price: </span>$1001</p>
                                        </div>
                                        <div class="product-rating">
                                            <p class="product-rating-inner"><span>Rating: </span>
                                                <a class="d-flex align-center">
                                                    5  <img src="assets/img/star.png" class="avatar-xxs ml-2" alt="star">
                                                </a>
                                            </p>
                                        </div>
                                        <div class="product-stock-status">
                                            <p class="product-stock-status-inner">
                                                <small class="badge badge-success">In Stock</small>
                                            </p>
                                        </div>
                                        <div class="action-btn">
                                            <i class="lar la-edit text-primary font-20 mr-2 btn-edit-contact"></i>
                                            <i class="lar la-trash-alt text-danger font-20 mr-2"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="items">
                                    <div class="item-content">
                                        <div class="product-info">
                                            <img src="assets/img/product-1.jpg" alt="avatar">
                                            <div class="user-meta-info">
                                                <p class="product-name">Product 2</p>
                                                <p class="product-category">Category two</p>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <p class="product-category-addr"><span>Price: </span>$1975</p>
                                        </div>
                                        <div class="product-rating">
                                            <p class="product-rating-inner"><span>Rating: </span>
                                                <a class="d-flex align-center">
                                                    3  <img src="assets/img/star.png" class="avatar-xxs ml-2" alt="star">
                                                </a>
                                            </p>
                                        </div>
                                        <div class="product-stock-status">
                                            <p class="product-stock-status-inner">
                                                <small class="badge badge-danger">No Stock</small>
                                            </p>
                                        </div>
                                        <div class="action-btn">
                                            <i class="lar la-edit text-primary font-20 mr-2 btn-edit-contact"></i>
                                            <i class="lar la-trash-alt text-danger font-20 mr-2"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="items">
                                    <div class="item-content">
                                        <div class="product-info">
                                            <img src="assets/img/product-2.jpg" alt="avatar">
                                            <div class="user-meta-info">
                                                <p class="product-name">Product 3</p>
                                                <p class="product-category">Category Three</p>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <p class="product-category-addr"><span>Price: </span>$2455</p>
                                        </div>
                                        <div class="product-rating">
                                            <p class="product-rating-inner"><span>Rating: </span>
                                                <a class="d-flex align-center">
                                                    4 <img src="assets/img/star.png" class="avatar-xxs ml-2" alt="star">
                                                </a>
                                            </p>
                                        </div>
                                        <div class="product-stock-status">
                                            <p class="product-stock-status-inner">
                                                <small class="badge badge-danger">No Stock</small>
                                            </p>
                                        </div>
                                        <div class="action-btn">
                                            <i class="lar la-edit text-primary font-20 mr-2 btn-edit-contact"></i>
                                            <i class="lar la-trash-alt text-danger font-20 mr-2"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="items">
                                    <div class="item-content">
                                        <div class="product-info">
                                            <img src="assets/img/product-3.jpg" alt="avatar">
                                            <div class="user-meta-info">
                                                <p class="product-name">Product 4</p>
                                                <p class="product-category">Category Four</p>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <p class="product-category-addr"><span>Price: </span>$1655</p>
                                        </div>
                                        <div class="product-rating">
                                            <p class="product-rating-inner"><span>Rating: </span>
                                                <a class="d-flex align-center">
                                                    2 <img src="assets/img/star.png" class="avatar-xxs ml-2" alt="star">
                                                </a>
                                            </p>
                                        </div>
                                        <div class="product-stock-status">
                                            <p class="product-stock-status-inner">
                                                <small class="badge badge-success">In Stock</small>
                                            </p>
                                        </div>
                                        <div class="action-btn">
                                            <i class="lar la-edit text-primary font-20 mr-2 btn-edit-contact"></i>
                                            <i class="lar la-trash-alt text-danger font-20 mr-2"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="items">
                                    <div class="item-content">
                                        <div class="product-info">
                                            <img src="assets/img/product-5.jpg" alt="avatar">
                                            <div class="user-meta-info">
                                                <p class="product-name">Product 5</p>
                                                <p class="product-category">Category Five</p>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <p class="product-category-addr"><span>Price: </span>$7555</p>
                                        </div>
                                        <div class="product-rating">
                                            <p class="product-rating-inner"><span>Rating: </span>
                                                <a class="d-flex align-center">
                                                    5 <img src="assets/img/star.png" class="avatar-xxs ml-2" alt="star">
                                                </a>
                                            </p>
                                        </div>
                                        <div class="product-stock-status">
                                            <p class="product-stock-status-inner">
                                                <small class="badge badge-danger">No Stock</small>
                                            </p>
                                        </div>
                                        <div class="action-btn">
                                            <i class="lar la-edit text-primary font-20 mr-2 btn-edit-contact"></i>
                                            <i class="lar la-trash-alt text-danger font-20 mr-2"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="items">
                                    <div class="item-content">
                                        <div class="product-info">
                                            <img src="assets/img/product-2.jpg" alt="avatar">
                                            <div class="user-meta-info">
                                                <p class="product-name">Product 6</p>
                                                <p class="product-category">Category Six</p>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <p class="product-category-addr"><span>Price: </span>$2655</p>
                                        </div>
                                        <div class="product-rating">
                                            <p class="product-rating-inner"><span>Rating: </span>
                                                <a class="d-flex align-center">
                                                    5 <img src="assets/img/star.png" class="avatar-xxs ml-2" alt="star">
                                                </a>
                                            </p>
                                        </div>
                                        <div class="product-stock-status">
                                            <p class="product-stock-status-inner">
                                                <small class="badge badge-success">In Stock</small>
                                            </p>
                                        </div>
                                        <div class="action-btn">
                                            <i class="lar la-edit text-primary font-20 mr-2 btn-edit-contact"></i>
                                            <i class="lar la-trash-alt text-danger font-20 mr-2"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="items">
                                    <div class="item-content">
                                        <div class="product-info"><img src="assets/img/product-4.jpg" alt="avatar">
                                            <div class="user-meta-info">
                                                <p class="product-name">Product 7</p>
                                                <p class="product-category">Catgeory Seven</p>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <p class="product-category-addr"><span>Price: </span>$8655</p>
                                        </div>
                                        <div class="product-rating">
                                            <p class="product-rating-inner"><span>Rating: </span>
                                                <a class="d-flex align-center">
                                                    3 <img src="assets/img/star.png" class="avatar-xxs ml-2" alt="star">
                                                </a>
                                            </p>
                                        </div>
                                        <div class="product-stock-status">
                                            <p class="product-stock-status-inner">
                                                <small class="badge badge-success">In Stock</small>
                                            </p>
                                        </div>
                                        <div class="action-btn">
                                            <i class="lar la-edit text-primary font-20 mr-2 btn-edit-contact"></i>
                                            <i class="lar la-trash-alt text-danger font-20 mr-2"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="pagination p13 text-center w-100 mt-4">
                                    <ul class="mx-auto">
                                    <a href="#" class="prev"><li>Prev</li></a>
                                    <a class="is-active" href="#"><li>1</li></a>
                                    <a href="#"><li>2</li></a>
                                    <a href="#"><li>3</li></a>
                                    <a href="#" class="next"><li>Next</li></a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  Content Area Ends  -->
    </div>
@endsection
