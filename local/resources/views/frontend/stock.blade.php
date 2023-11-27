@extends('layouts.frontend.app')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/plugins/table/datatable/dt-global_style.css') }}">
    <link href="{{ asset('frontend/assets/css/ui-elements/pagination.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/select2/select2.min.css') }}">
    <link href="{{ asset('frontend/assets/css/forms/form-widgets.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('frontend/assets/css/forms/multiple-step.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/dropify/dropify.min.css') }}">
    <link href="{{ asset('frontend/assets/css/pages/profile_edit.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
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
                                    <li class="breadcrumb-item active" aria-current="page"><span>สต๊อกสินค้า</span></li>
                                </ol>
                            </nav>
                        </div>
                    </li>
                </ul>
            </header>
        </div>
        <div class="row layout-top-spacing">
            <div class="col-lg-12 layout-spacing">
                <div class="statbox widget box box-shadow mb-4">
                    <div class="widget-content widget-content-area br-6">
                        <div class="row">

                            <div class="modal fade bd-example-modal-lg" id="edit" tabindex="-1" role="dialog"
                                aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header ml-4">
                                            <h5 class="modal-title" id="myLargeModalLabel"><b>จัดการสต๊อกสินค้า</b></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i class="las la-times"></i>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <p class="modal-text">
                                            <div class="widget-content widget-content-area">
                                                <div class="form-group row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <div class="card multiple-form-one px-0 pb-0 mb-3">
                                                            {{-- <form method="post" action="{{ route('admin/edit_promotion') }}"
                                                enctype="multipart/form-data" id="msform">
                                                @csrf --}}
                                                            <div class="row">
                                                                <div class="col-md-12 mx-0">
                                                                    <div class="form-card">
                                                                        <div class="w-100">
                                                                            <div class="form-group row">
                                                                                <div class="col-lg-12 text-center">
                                                                                    <input type="hidden" name="id"
                                                                                        id="id">
                                                                                    <label><b>รูปภาพสินค้า:</b></label>
                                                                                    <input type="text"
                                                                                        name="product_image"
                                                                                        id="product_image"
                                                                                        class="form-control"
                                                                                        placeholder="รูปภาพสินค้า" disabled>
                                                                                </div>
                                                                                <div class="col-lg-6 mt-2 text-left">
                                                                                    <label><b>ชื่อสินค้า:</b></label>
                                                                                    <input type="text"
                                                                                        name="product_name"
                                                                                        id="product_name"
                                                                                        class="form-control"
                                                                                        placeholder="ชื่อสินค้า" disabled>
                                                                                </div>
                                                                                <div class="col-lg-6 mt-2 text-left">
                                                                                    <label><b>จำนวนสินค้าที่ต้องการจัดส่ง*:</b></label>
                                                                                    <input type="text"
                                                                                        name="delivery_product_amt"
                                                                                        id="delivery_product_amt"
                                                                                        class="form-control"
                                                                                        placeholder="จำนวนสินค้าที่ต้องการจัดส่ง">
                                                                                </div>
                                                                                <div class="col-lg-12 mt-2 text-left">
                                                                                    <label><b>รูปแบบการจัดส่ง:</b></label>
                                                                                    <div class="row">
                                                                                        <div class="col-md-12 d-flex ml-4">
                                                                                            <div class="radio-inline mr-4">
                                                                                                <label class="radio radio-outline radio-outline-2x radio-primary">
                                                                                                    <input type="radio" name="address_delivery" id="address_delivery" checked="checked">
                                                                                                    <span></span> จัดส่งให้ตัวเอง
                                                                                                </label>
                                                                                            </div>
                                                                                            <div class="radio-inline">
                                                                                                <label class="radio radio-outline radio-outline-2x radio-primary">
                                                                                                    <input type="radio" name="address_delivery" id="address_others">
                                                                                                    <span></span> จัดส่งรูปแบบอื่น
                                                                                                </label>
                                                                                            </div>
                                                                                        </div>
                                                                                        
                                                                                        <div class="col-md-12 mt-3">
                                                                                            <div class="row">
                                                                                                <div class="col-md-5">
                                                                                                    <div
                                                                                                        class="form-group">
                                                                                                        <label
                                                                                                            for="no1">ชื่อผู้รับ
                                                                                                            <span
                                                                                                                class="text-danger">*
                                                                                                            </span></label>
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            class="form-control"
                                                                                                            id="name"
                                                                                                            placeholder="ชื่อผู้รับ">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-3">
                                                                                                    <div
                                                                                                        class="form-group">
                                                                                                        <label
                                                                                                            for="no1">เบอร์โทรศัพท์
                                                                                                            <span
                                                                                                                class="text-danger">*
                                                                                                            </span></label>
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            class="form-control"
                                                                                                            id="phone"
                                                                                                            placeholder="เบอร์โทรศัพท์">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-4">
                                                                                                    <div
                                                                                                        class="form-group">
                                                                                                        <label
                                                                                                            for="no1">อีเมล์
                                                                                                            <span
                                                                                                                class="text-danger">*
                                                                                                            </span></label>
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            class="form-control"
                                                                                                            id="email"
                                                                                                            placeholder="อีเมล์">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-4">
                                                                                                    <div
                                                                                                        class="form-group">
                                                                                                        <label
                                                                                                            for="no1">บ้านเลขที่
                                                                                                            <span
                                                                                                                class="text-danger">*
                                                                                                            </span></label>
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            class="form-control"
                                                                                                            id="no1"
                                                                                                            placeholder="บ้านเลขที่">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-4">
                                                                                                    <div
                                                                                                        class="form-group">
                                                                                                        <label
                                                                                                            for="moo1">หมู่ที่
                                                                                                            <span
                                                                                                                class="text-danger">*
                                                                                                            </span></label>
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            class="form-control"
                                                                                                            id="moo1"
                                                                                                            placeholder="หมู่ที่">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-4">
                                                                                                    <div
                                                                                                        class="form-group">
                                                                                                        <label
                                                                                                            for="homename1">หมู่บ้าน/อาคาร
                                                                                                            <span
                                                                                                                class="text-danger">*
                                                                                                            </span></label>
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            class="form-control"
                                                                                                            id="homename1"
                                                                                                            placeholder="หมู่บ้าน/อาคาร">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-4">
                                                                                                    <div
                                                                                                        class="form-group">
                                                                                                        <label
                                                                                                            for="soi1">ตรอก/ซอย
                                                                                                            <span
                                                                                                                class="text-danger">
                                                                                                            </span></label>
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            class="form-control"
                                                                                                            id="soi1"
                                                                                                            placeholder="ตรอก/ซอย">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-4">
                                                                                                    <div
                                                                                                        class="form-group">
                                                                                                        <label
                                                                                                            for="road1">ถนน
                                                                                                            <span
                                                                                                                class="text-danger">
                                                                                                            </span></label>
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            class="form-control"
                                                                                                            id="road1"
                                                                                                            placeholder="ถนน">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-4">
                                                                                                    <div
                                                                                                        class="form-group">
                                                                                                        <label
                                                                                                            for="changwat1">จังหวัด
                                                                                                            <span
                                                                                                                class="text-danger">*</span></label>
                                                                                                        <select
                                                                                                            class="form-control"
                                                                                                            id="changwat1">
                                                                                                            <option>จังหวัด
                                                                                                            </option>
                                                                                                            <option>
                                                                                                            </option>
                                                                                                            <option>
                                                                                                            </option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-4">
                                                                                                    <div
                                                                                                        class="form-group">
                                                                                                        <label
                                                                                                            for="amphur1">เขต/อำเภอ
                                                                                                            <span
                                                                                                                class="text-danger">*</span></label>
                                                                                                        <select
                                                                                                            class="form-control"
                                                                                                            id="amphur1">
                                                                                                            <option>
                                                                                                                เขต/อำเภอ
                                                                                                            </option>
                                                                                                            <option>
                                                                                                            </option>
                                                                                                            <option>
                                                                                                            </option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-4">
                                                                                                    <div
                                                                                                        class="form-group">
                                                                                                        <label
                                                                                                            for="tambon1">แขวง/ตำบล
                                                                                                            <span
                                                                                                                class="text-danger">*</span></label>
                                                                                                        <select
                                                                                                            class="form-control"
                                                                                                            id="tambon1">
                                                                                                            <option>
                                                                                                                แขวง/ตำบล
                                                                                                            </option>
                                                                                                            <option>
                                                                                                            </option>
                                                                                                            <option>
                                                                                                            </option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-4">
                                                                                                    <div
                                                                                                        class="form-group">
                                                                                                        <label
                                                                                                            for="zipcode1">รหัสไปรษณีย์
                                                                                                            <span
                                                                                                                class="text-danger">*
                                                                                                            </span></label>
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            class="form-control"
                                                                                                            id="zipcode1"
                                                                                                            placeholder="รหัสไปรษณีย์">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="info-area col-md-12 text-center mt-2">
                                                                            <button type="submit"
                                                                                class="btn btn-info btn-rounded">
                                                                                <i class="las la-save"></i>
                                                                                ยืนยันการจัดส่ง</button>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="table-responsive mt-2 mb-2">
                                <b class="ml-4">รายการสต็อกสินค้า</b>
                                <table id="basic-dt" class="table table-hover" style="width:100%">

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('js')
        <script src="{{ asset('frontend/plugins/table/datatable/datatables.js') }}"></script>
        <!--  The following JS library files are loaded to use Copy CSV Excel Print Options-->
        <script src="{{ asset('frontend/plugins/table/datatable/button-ext/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('frontend/plugins/table/datatable/button-ext/jszip.min.js') }}"></script>
        <script src="{{ asset('frontend/plugins/table/datatable/button-ext/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('frontend/plugins/table/datatable/button-ext/buttons.print.min.js') }}"></script>
        <script src="{{ asset('frontend/plugins/select2/select2.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/forms/custom-select2.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/custom.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/forms/multiple-step.js') }}"></script>
        <script src="{{ asset('frontend/plugins/dropify/dropify.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/pages/profile_edit.js') }}"></script>
        <!-- The following JS library files are loaded to use PDF Options-->
        <script src="{{ asset('frontend/plugins/table/datatable/button-ext/pdfmake.min.js') }}"></script>
        <script src="{{ asset('frontend/plugins/table/datatable/button-ext/vfs_fonts.js') }}"></script>

        <script>
            function edit(id) {
                $.ajax({
                        url: '{{ route('admin/view_promotion') }}',
                        type: 'GET',
                        data: {
                            id
                        }
                    })
                    .done(function(data) {
                        console.log(data);
                        $("#edit").modal();
                        $("#id").val(data['data']['id']);
                        $("#promotion_name").val(data['data']['promotion_name']);
                        $("#promotion_type").val(data['data']['promotion_type']);
                        $("#promotion_detail").val(data['data']['promotion_detail']);
                        $("#promotion_url").val(data['data']['promotion_url']);
                        $("#promotion_price").val(data['data']['promotion_price']);
                        $("#promotion_start_date").val(data['data']['promotion_start_date']);
                        $("#promotion_end_date").val(data['data']['promotion_end_date']);
                        $("#promotion_status").val(data['data']['promotion_status']);
                        $.each(data['img'], function(index, value) {
                            if (value['promotion_image_orderby'] == 1) {

                                var img = '{{ asset('') }}' + value['promotion_image_url'] + value[
                                    'promotion_image_name'];
                                $('#promotion_image1').attr('data-default-file', img).dropify();
                            }

                        });

                    })
                    .fail(function() {
                        console.log("error");
                    })
            }


            $(function() {
                table_order = $('#basic-dt').DataTable({
                    // dom: 'Bfrtip',
                    // buttons: ['excel'],
                    searching: false,
                    ordering: true,
                    lengthChange: false,
                    responsive: true,
                    // paging: true,
                    pageLength: 20,
                    processing: true,
                    serverSide: true,
                    "language": {
                        "lengthMenu": "แสดง _MENU_ แถว",
                        "zeroRecords": "ไม่พบข้อมูล",
                        "info": "แสดงหน้า _PAGE_ จาก _PAGES_ หน้า",
                        "search": "ค้นหา",
                        "infoEmpty": "",
                        "infoFiltered": "",
                        "paginate": {
                            "first": "หน้าแรก",
                            "previous": "ย้อนกลับ",
                            "next": "ถัดไป",
                            "last": "หน้าสุดท้าย"
                        },
                        'processing': "กำลังโหลดข้อมูล",
                    },
                    ajax: {
                        url: '{{ route('admin/promotion_datatable') }}',
                        data: function(d) {

                        },
                    },

                    columns: [
                        // {
                        //     data: "id",
                        //     title: "ลำดับ",
                        //     className: "w-10 text-center",
                        // },
                        {
                            data: "promotion_image",
                            title: "รูปภาพ",
                            className: "w-10 ",
                        },

                        {
                            data: "=njv",
                            title: "ชื่อสินค้า",
                            className: "w-10 ",
                        },
                        {
                            data: "promotion_detail",
                            title: "จำนวนสินค้า",
                            className: "w-10 ",
                        },
                        {
                            data: "promotion_price",
                            title: "ราคาต่อชิ้น",
                            className: "w-10 ",
                        },
                        {
                            data: "promotion_detail",
                            title: "ราคารวมสุทธิ",
                            className: "w-10 ",
                        },

                        {
                            data: "promotion_detail",
                            title: "PV รวม",
                            className: "w-10 ",
                        },

                        {
                            data: "action",
                            title: "Action",
                            className: "w-10",
                        },



                    ],



                });
                // $('#search-form').on('click', function(e) {
                //     table_order.draw();
                //     e.preventDefault();
                // });

            });
        </script>
    @endsection
