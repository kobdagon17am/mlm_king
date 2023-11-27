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
                                    <li class="breadcrumb-item active" aria-current="page"><span>ประวัติสต๊อกสินค้า</span></li>
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

                            <div class="table-responsive mt-2 mb-2">
                                <b class="ml-4">ประวัติการทำรายการสต็อกสินค้า</b>
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
                            data: "promotion_price",
                            title: "จำนวนสินค้าที่จัดส่ง",
                            className: "w-10 ",
                        },

                        {
                            data: "promotion_detail",
                            title: "ผู้รับสินค้า",
                            className: "w-10 ",
                        },
                        {
                            data: "promotion_detail",
                            title: "ที่อยู่จัดส่ง",
                            className: "w-10 ",
                        },

                        // {
                        //     data: "action",
                        //     title: "Action",
                        //     className: "w-10",
                        // },

                    ],

                });
                // $('#search-form').on('click', function(e) {
                //     table_order.draw();
                //     e.preventDefault();
                // });

            });
        </script>
    @endsection
