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
                                        <span>ประวัติการสั่งซื้อ</span>
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
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        {{-- <h5 class="table-header"><b>รายการจอง</b></h5> --}}



                                        <div class="row mb-4 ml-2">
                                            <div class="col-lg-2 mt-2">
                                                <label>วันที่เริ่มต้น</label>
                                                <input type="date" class="form-control  myCustom date_start"
                                                    name="date_start" id="date_start" placeholder="วันที่เริ่มต้น"
                                                    value="{{ date('Y-m-01') }}">
                                            </div>

                                            <div class="col-lg-2 mt-2">
                                                <label>วันที่สิ้นสุด</label>
                                                <input type="date" class="form-control  myCustom date_end"
                                                    name="date_end" id="date_end" placeholder="วันที่สิ้นสุด"
                                                    value="{{ date('Y-m-t') }}">
                                            </div>

                                            <div class="col-lg-2 mt-2">
                                                <label>Code Order</label>
                                                <input type="taxt" class="form-control myCustom code_order"
                                                    name="code_order" id="code_order" placeholder="Code Order">
                                            </div>


                                            <div class="col-lg-2 mt-2">
                                                <label>รหัสสมาชิก</label>
                                                <input type="taxt" class="form-control myCustom customers_user_name"
                                                    name="customers_user_name" id="customers_user_name"
                                                    placeholder="รหัสสมาชิก">
                                            </div>




                                            {{-- <div class="col-lg-2 mt-2">
                    <label>ประเภทการสั่งซื้อ</label>
                    <select class="form-control myWhere type" name="type" id="type">
                        <option selected="" value=""> ทั้งหมด </option>
                        <option value="other">ซื้อซ้ำ</option>
                        <option value="register">สมัครสมาชิก</option>

                    </select>
                </div> --}}


                                            {{-- <div class="col-lg-2 mb-2 mt-2" style="margin-top:15px">
                    <select class="form-control myWhere" name="status">
                        <option value="0">ทั้งหมด</option>
                        <option selected value="1">รออนุมัติ</option>
                        <option value="2">อนุมัติ</option>
                        <option value="3">ไม่อนุมัติ</option>
                    </select>


                </div> --}}
                                            <div class="col-md-2 text-center" style="margin-top:45px">
                                                <button type="button" class="btn btn-outline-success btn-rounded"
                                                    id="search-form"><i class="las la-search font-15"></i> ค้นหา</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="table-responsive mt-2 mb-2">
                                    <table id="basic-dt" class="table table-hover" style="width:100%">
                                    </table>
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
                    "lengthMenu": "Show _MENU_ Raw",
                    "zeroRecords": "No information",
                    "info": "Show page _PAGE_ From _PAGES_ Page",
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
                    url: '{{ route('order_datatable') }}',
                    data: function(d) {
                        // d.s_username = $('#s_username').val();
                        // d.code_order = $('#code_order').val();
                        d.order_status_id_fk = $('#order_status_id_fk').val();
                        // d.y = $('#y').val();
                        // d.m = $('#m').val();

                    },
                },


                columns: [

                    {
                        data: "created_at",
                        title: "วันที่สั่งซื้อสินค้า",
                        className: "w-10 ",
                    },

                    {
                        data: "code_order",
                        title: "หมายเลขบิล",
                        className: "w-10 ",
                    },
                    {
                        data: "type",
                        title: "ประเภทบิล",
                        className: "w-10 ",
                    },


                    {
                        data: "customers_user_name",
                        title: "รหัสผู้ทำรายการ",
                        className: "w-10 ",
                    },

                    {
                        data: "customers_user_name_send",
                        title: "สั่งซื้อให้รหัส",
                        className: "w-10 ",
                    },

                    {
                        data: "total_price",
                        title: "ราคา",
                        className: "w-10 ",
                    },


                    {
                        data: "pay_type_name",
                        title: "ประเภทการชำระ",
                        className: "w-10 ",
                    },

                    {
                        data: "order_status_id_fk",
                        title: "สถานะ",
                        className: "w-10",
                    },

                    {
                        data: "tracking_no",
                        title: "หมายเลขพัสดุ",
                        className: "w-10",
                    },

                    {
                        data: "action",
                        title: "รายละเอียด",
                        className: "w-1",
                    },



                ],



            });
            $('#search-form').on('click', function(e) {
                table_order.draw();
                e.preventDefault();
            });

        });
    </script>
@endsection
