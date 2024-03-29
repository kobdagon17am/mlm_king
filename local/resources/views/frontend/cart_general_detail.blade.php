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
                                            href="{{ route('CartGeneral', ['type' => 'general']) }}">สินค้าทั่วไป</a></li>
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
                                            @foreach ($data['img'] as $value_img)
                                                <div class="tab-pane @if ($value_img->product_image_orderby == 1) show active @endif"
                                                    id="product-{{ $value_img->product_image_orderby }}-item">
                                                    <img src="{{ asset($value_img->product_image_url . '' . $value_img->product_image_name) }}"
                                                        style="max-height: 300px; max-width: 300px;" alt=""
                                                        class="img-fluid mx-auto d-block rounded">
                                                </div>
                                            @endforeach
                                        </div>
                                        <ul class="nav nav-pills nav-justified">
                                            @foreach ($data['img'] as $value_img)
                                                <li class="nav-item">
                                                    <a href="#product-{{ $value_img->product_image_orderby }}-item"
                                                        data-toggle="tab" aria-expanded="false"
                                                        class="nav-link product-thumb @if ($value_img->product_image_orderby == 1) show active @endif">
                                                        <img src="{{ asset($value_img->product_image_url . '' . $value_img->product_image_name) }}"
                                                            alt="" class="img-fluid mx-auto d-block rounded">
                                                    </a>
                                                </li>
                                            @endforeach

                                            @if (count($data['img']) == 3)
                                                <li class="nav-item">
                                                </li>
                                            @endif
                                            @if (count($data['img']) == 2)
                                                <li class="nav-item">
                                                </li>
                                                <li class="nav-item">
                                                </li>
                                            @endif
                                            @if (count($data['img']) == 1)
                                                <li class="nav-item">
                                                </li>
                                                <li class="nav-item">
                                                </li>
                                                <li class="nav-item">
                                                </li>
                                            @endif

                                        </ul>
                                    </div>
                                    <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12">
                                        <div class="mt-3 mt-xl-0">
                                            <a href="{{ route('CartGeneral', ['type' => 'general']) }}"
                                                class="text-primary mb-3 d-block">
                                                <i class="las la-arrow-left"></i> รายการสินค้า
                                            </a>
                                            <h2 class="mb-3 text-black strong">{{ $data['product_data']->product_name }}
                                            </h2>
                                            <h3 class="mb-3">
                                                <b>฿ {{ $data['product_data']->product_price_member }}</b>
                                                <span
                                                    class="text-success ml-2">({{ $data['product_data']->product_pv }}PV)</span>
                                            </h3>
                                            <h6>
                                                <p class="text-muted mb-4"><b>รายละเอียดสินค้า:</b>
                                                    {{ $data['product_data']->product_detail }}</p>
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
                                            <div class="row">

                                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                                    <label class="my-1 mr-2" for="quantityinput">จำนวนสินค้า</label>
                                                    <div class="p-l-0 m-b-30">
                                                        <div class="input-group">
                                                            <span class="input-group-btn">
                                                                <button type="button"
                                                                    class="btn btn-default btn-number shadow-none btn-sm btn-block"
                                                                    data-type="minus" data-field="quant[1]">
                                                                    <i class="las la-minus-circle font-25"></i>
                                                                </button>
                                                            </span>
                                                            <input type="text" id="quant" name="quant[1]"
                                                                class="form-control input-number text-center font-15"
                                                                value="1" max="1000">
                                                            <span class="input-group-btn">
                                                                <button type="button"
                                                                    class="btn btn-default btn-number shadow-none btn-sm"
                                                                    data-type="plus" data-field="quant[1]">
                                                                    <i class="las la-plus-circle font-25"></i>
                                                                </button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 text-center " id=""
                                                    style="margin-top:30px">
                                                    <button type="button"
                                                        onclick="addcart({{ $data['product_data']->id }})"
                                                        class="btn btn-success btn-rounded btn-block">
                                                        <i class="las la-cart-plus las-white font-20"></i> เพิ่มสินค้า
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row mt-3">
                                    <div class="col-md-12 ml-4">
                                        <h6>
                                            <p class="text-muted mb-4"><b>วิดีโอสินค้าเพิ่มเติม</b>
                                        </h6>
                                    </div>
                                    <div class="col-md-3 mt-1 text-center">
                                        <iframe width="300" height="200"
                                            src="{{ $data['product_data']->product_url1 }}" title="YouTube video player"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            allowfullscreen></iframe>
                                    </div>
                                    <div class="col-md-3 mt-1 text-center">
                                        <iframe width="300" height="200"
                                            src="{{ $data['product_data']->product_url2 }}" title="YouTube video player"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            allowfullscreen></iframe>
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
    <!--  Content Area Ends  -->
@endsection

@section('js')
    <script>
        function addcart(product_id) {

            var id = product_id;
            //  alert(id);
            var quantity = $('#quant').val();

            $.ajax({
                    url: '{{ route('add_cart') }}',
                    type: 'get',
                    // dataType: 'json',
                    data: {
                        id: id,
                        quantity: quantity
                    },
                })
                .done(function(data) {

                    $('#count_cart').html(data['qty']);

                    swal.fire({
                        icon: 'success',
                        title: 'สำเร็จ !',
                        text: "เพิ่มสินค้าในตะกร้าสำเร็จ",
                        timer: 4000,
                        type: 'success'
                    }).then((value) => {}).catch(swal.noop);
                })
                .fail(function() {
                    console.log("error");
                });
        }
    </script>
    {{-- เพิ่มลดจำนวนสินค้า --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var plusBtn = document.querySelector("[data-type='plus']");
            var minusBtn = document.querySelector("[data-type='minus']");
            var inputField = document.getElementById("quant");

            plusBtn.addEventListener("click", function() {
                var currentValue = parseInt(inputField.value);
                if (currentValue < parseInt(inputField.max)) {
                    inputField.value = currentValue + 1;
                }
            });

            minusBtn.addEventListener("click", function() {
                var currentValue = parseInt(inputField.value);
                if (currentValue > 1) {
                    inputField.value = currentValue - 1;
                }
            });
        });
    </script>
@endsection
