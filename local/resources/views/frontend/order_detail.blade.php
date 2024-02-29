@extends('layouts.frontend.app')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/table/datatable/dt-global_style.css') }}">
    <link href="{{ asset('frontend/assets/css/ui-elements/pagination.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <!--  Main Container Starts  -->

    <!--  Content Area Starts  -->
    <div id="content" class="main-content">
        <!--  Navbar Starts / Breadcrumb Area  -->
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
                                        <span>รายละเอียดบิล {{ $order->code_order }}</span>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </li>
                </ul>
            </header>
        </div>
        <!--  Navbar Ends / Breadcrumb Area  -->
        <!-- Main Body Starts -->



        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-lg-12 layout-spacing">
                    <div class="statbox widget box box-shadow mb-4">
                        <div class="widget-content widget-content-area">
                            <div class="invoice-container">
                                <div class="content-section  animated animatedFadeInUp fadeInUp">

                                    <div class="row inv--head-section">
                                        <div class="col-md-9 col-lg-9 col-sm-6 col-12 align-self-center align-self-center">
                                            <div class="company-info">
                                                <img src="{{ asset('frontend/assets/img/logo/Kingthong-Baiyok-Logo.png') }}" width="100">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-sm-6 col-12 ">
                                         <p class="text-right">
                                            <a target="_blank" href="{{route('export_pdf_history',['code'=>$order->id])}}"class="p-2">
                                                <i class="las la-print font-30 text-primary"></i></a>
                                         </p>
                                            <h3 class="in-heading">ใบเสร็จการชำระเงิน</h3>
                                        </div>
                                    </div>
                                    <div class="row inv--detail-section">


                                        <div class="col-md-6 col-lg-6 col-sm-6 align-self-center">
                                            <p class="inv-to"> บริษัท พียู เน็ตเวิร์ค จำกัด <br>
                                                169/97-98 หมู่ 3 ตำบลคูคต อำเภอลำลูกกา จังหวัดปทุมธานี 12130
                                            </p>

                                            {{-- <p class="inv-street-addr">โทร : 081-195-3908</p> --}}
                                            <br>
                                            <p class="inv-email-address"><b>ที่อยู่จัดส่ง</b> <br>
                                                {{ $order->name }}<br>


                                                {{ $order->house_no }} หมู่. {{ $order->moo }} หมู่บ้าน. {{ $order->moo }} ซอย. {{ $order->soi }} ถนน.
                                                {{ $order->road }} ตำบล. {{ $order->tambon }}
                                                อำเภอ. {{ $order->district }}<br> จังหวัด. {{ $order->province }}   {{ $order->zipcode }}

                                                <br>
                                                เบอร์โทรศัพท์ : {{ $order->tel }}

                                            </p>
                                        </div>

                                        <div class="col-md-3 col-lg-3 col-sm-0 align-self-center">
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-sm-6 ">

                                            <p class="inv-list-number"><span class="inv-title">เลขที่ใบเสร็จ : </span> <span
                                                    class="inv-number">{{ $order->code_order }}</span></p>
                                            <p class="inv-created-date"><span class="inv-title">ประเภทบิล : </span>
                                                <span class="inv-customer-name">{{ $order->type }}</span>

                                            </p>
                                            <p class="inv-created-date"><span class="inv-title">ชื่อ : </span>
                                                <span class="inv-customer-name">{{ $order->name }}</span>
                                            </p>
                                            <p class="inv-created-date"><span class="inv-title">วันที่ชำระ : </span>
                                                <span class="inv-date">
                                                    @if ($order->approve_date)
                                                        {{ $order->approve_date }}
                                                    @endif
                                                </span>
                                            </p>
                                            <p class="inv-created-date"><span class="inv-title">ชำระโดย : </span>
                                                <span class="inv-customer-name">{{ $order->pay_type_name }}</span>
                                            </p>



                                        </div>



                                    </div>

                                    <div class="row inv--product-table-section">
                                        <div class="col-12">

                                            <table id="ordertable" class="table table-hover" style="width:100%">
                                                <thead>

                                                    <tr>
                                                        <th>รูปภาพ</th>
                                                        <th>รายละเอียด</th>
                                                        <th class="text-right">จำนวน</th>
                                                        <th class="text-right">PV/หน่วย</th>
                                                        <th class="text-right">รวม PV</th>
                                                        <th class="text-right">ราคา/หน่วย (บาท)</th>
                                                        <th class="text-right"> Vat 7%</th>
                                                        <th class="text-right"> รวม (บาท)</th>


                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($db_order_products_list as $value)
                                                    <tr>
                                                        <td>
                                                            <img src="{{asset($value->product_image_url.$value->product_image_name)}}"
                                                                alt="contact-img" title="contact-img"
                                                                class="rounded-circle mr-3"  width="80"
                                                                style="object-fit: cover;">
                                                        </td>


                                                            <td>
                                                                 {{$value->product_name}}
                                                            </td>
                                                            <td class="text-right">
                                                                {{number_format($value->amt)}}

                                                            </td>
                                                            <td class="text-right">
                                                                {{number_format($value->pv)}}

                                                            </td>
                                                            <td class="text-right">
                                                                {{number_format($value->total_pv)}}

                                                            </td>
                                                            <td class="text-right">
                                                                {{number_format($value->selling_price-$value->vat,2)}}

                                                            </td>
                                                            <td  class="text-right">
                                                                {{number_format($value->vat,2)}}
                                                            </td>
                                                            <td  class="text-right">
                                                                {{number_format($value->total_price,2)}}
                                                            </td>


                                                    </tr>
                                                    @endforeach

                                                </tbody>

                                            </table>

                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mt-2">
                                        <div class="col-md-4 col-lg-4 col-sm-4 col-12 order-sm-0 order-1">

                                        </div>
                                        <div class="col-md-8 col-lg-8 col-sm-8 col-12 order-sm-1 order-0">
                                            <div class="inv--total-amounts text-sm-right">
                                                <div class="row">

                                                    <div class="col-sm-10 col-10 grand-total-title">
                                                        <h5 class="">ราคาสินค้าไม่รวม Vat : </h5>
                                                        <h5 class=""> รวม Vat 7% :</h5>
                                                        <h5 class=""> ค่าจัดส่ง :</h5>
                                                        <h5 class=""> ยอดรวม :</h5>
                                                    </div>
                                                    <div class="col-sm-2 col-2 grand-total-amount">
                                                        <h5 class=""> {{number_format($order->sum_price,2)}}</h5>
                                                        <h5 class="">{{number_format($order->tax_total,2)}} </h5>
                                                        <h5 class=""> {{number_format($order->shipping_price,2)}} </h5>
                                                        <h5 class="">{{number_format($order->total_price,2)}} </h5>
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
    </div>
@endsection
<!-- Main Container Ends -->
@section('js')
    <script src="{{ asset('frontend/plugins/table/datatable/datatables.js') }}"></script>
    <!--  The following JS library files are loaded to use Copy CSV Excel Print Options-->
    <script src="{{ asset('frontend/plugins/table/datatable/button-ext/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/table/datatable/button-ext/jszip.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/table/datatable/button-ext/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/table/datatable/button-ext/buttons.print.min.js') }}"></script>
    <!-- The following JS library files are loaded to use PDF Options-->
    <script src="{{ asset('frontend/plugins/table/datatable/button-ext/pdfmake.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/table/datatable/button-ext/vfs_fonts.js') }}"></script>
@endsection
