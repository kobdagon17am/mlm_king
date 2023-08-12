@extends('layouts.backend.app')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/plugins/table/datatable/dt-global_style.css') }}">
    <link href="{{ asset('backend/assets/css/ui-elements/pagination.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/plugins/select2/select2.min.css') }}">
    <link href="{{ asset('backend/assets/css/pages/profile.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/css/forms/form-widgets.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/plugins/animate/animate.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('page-header')
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">ระบบบริการสมาชิก</li>
            <li class="breadcrumb-item active" aria-current="page"><span>ระบบตรวจสอบเอกสาร</span></li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow mb-4 mt-4">
            {{-- <div class="row ml-4 mb-4">
                <div class="col-lg-2 mb-2 mt-2 text-left">
                    <select class="form-control" type="text" name="upline_id" id="upline_id">
                        <option> รหัสผู้เเนะนำ
                        </option>
                        @foreach ($get_member_doc as $val)
                            <option value="{{ $val->upline_id }}">
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-2 mb-2 mt-2 text-left">
                    <select class="form-control" type="text" name="username" id="username">
                        <option> รหัสสมาชิก
                        </option>
                        @foreach ($get_member_doc as $val)
                            <option value="{{ $val->username }}">
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-2 mb-2 mt-2 text-left">
                    <select class="form-control" type="text" name="first_name" id="first_name">
                        <option> ชื่อสมาชิก
                        </option>
                        @foreach ($get_member_doc as $val)
                            <option value="{{ $val->first_name }}">
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-2 mb-2 mt-2 text-left" style="margin-top:25x">
                    <button type="button" class="btn btn-outline-success btn-rounded" id="search-form"><i
                            class="las la-search font-15"></i>
                        สืบค้น</button>
                </div>
            </div> --}}
            <div class="modal fade bd-example-modal-lg" id="edit" tabindex="-1" role="dialog"
                aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header ml-4">
                            <h5 class="modal-title" id="myLargeModalLabel"><b>ตรวจสอบเอกสาร</b></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i class="las la-times"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="modal-text">
                            <div class="widget-content widget-content-area">
                                <div class="form-group row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">

                                        <form method="post" action="{{ route('admin/Member_Doc_update') }}"
                                            enctype="multipart/form-data" id="msform">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12 mx-0">
                                                    <div class="form-card">
                                                        <div class="w-100">
                                                            <div class="form-group row">
                                                                <div class="col-lg-6">
                                                                    <div class="col-lg-12 mt-2 text-center ">
                                                                        <label><b>รูปภาพ</b></label>
                                                                        <div id="img"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <input type="hidden" name="id" id="id">
                                                                    <input type="hidden" name="type" id="type">
                                                                    <div class="col-lg-12  mt-2 text-left">
                                                                        <label><b>รหัสสมาชิก:</b></label>
                                                                        <input type="text" class="form-control"
                                                                            id="username" name="username" disabled>
                                                                    </div>
                                                                    <div class="col-lg-12  mt-2 text-left">
                                                                        <label><b>ชื่อ:</b></label>
                                                                        <input type="text" class="form-control"
                                                                            id="first_name" name="first_name" disabled>
                                                                    </div>
                                                                    <div class="col-lg-12  mt-2 text-left">
                                                                        <label><b>นามสกุล:</b></label>
                                                                        <input type="text" class="form-control"
                                                                            id="last_name" name="last_name" disabled>
                                                                    </div>
                                                                    <div class="col-lg-12  mt-2 text-left">
                                                                        <label><b>หมายเลขบัตรประชาชน:</b></label>
                                                                        <input type="text" class="form-control"
                                                                            id="id_card" name="id_card" disabled>
                                                                    </div>
                                                                    <div class="col-lg-12  mt-2 text-left">
                                                                        <label><b>หมายเหตุ:</b></label>
                                                                        <input type="text-area" class="form-control"
                                                                            id="remark" name="remark">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="info-area col-md-12 text-center mt-4">
                                                        <div id="stock_button">
                                                            <button type="submit" class="btn btn-success btn-rounded"
                                                                name="member_doc_status" value="confirm">
                                                                <i class="las la-check-circle"></i>
                                                                อนุมัติ
                                                            </button>

                                                            <button type="submit" class="btn btn-danger btn-rounded"
                                                                name="member_doc_status" value="cancel">
                                                                <i class="las la-times-circle"></i>
                                                                ไม่อนุมัติ
                                                            </button>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            </p>
                        </div>

                    </div>
                </div>
            </div>


            <div class="table-responsive ml-4 mt-2 mb-2">
                <h6>รายงานเอกสารการสมัครสมาชิกรออนุมัติ</h6>
                <table id="basic-dt" class="table table-hover" style="width:100%">

                </table>
            </div>

        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('backend/plugins/table/datatable/datatables.js') }}"></script>
    <!--  The following JS library files are loaded to use Copy CSV Excel Print Options-->
    <script src="{{ asset('backend/plugins/table/datatable/button-ext/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/table/datatable/button-ext/jszip.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/table/datatable/button-ext/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/table/datatable/button-ext/buttons.print.min.js') }}"></script>
    <!-- The following JS library files are loaded to use PDF Options-->
    <script src="{{ asset('backend/plugins/table/datatable/button-ext/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/table/datatable/button-ext/vfs_fonts.js') }}"></script>
    <script>
        function edit(id, type) {
            $.ajax({
                    url: '{{ route('admin/Member_Doc_view') }}',
                    type: 'GET',
                    data: {
                        id: id,
                        type: type
                    }
                })
                .done(function(data) {
                    $("#id").val(data['data']['id']);
                    $("#username").val(data['data']['username']);
                    $("#first_name").val(data['data']['first_name']);
                    $("#last_name").val(data['data']['last_name']);
                    $("#id_card").val(data['data']['id_card']);
                    $("#remark").val(data['data']['remark']);
                    var img = '{{ asset('') }}';
                    var img_url = img + data['data']['url'] + '/' + data['data']['file'];

                    var htmlContent = '<img src="' + img_url +
                        '"class="img-fluid" id="file" name="file" alt="Document Image">';
                    $("#img").html(htmlContent);
                    $("#edit").modal();


                    if (data['data']['member_doc_status'] == 'cancel' || data['data']['member_doc_status'] ==
                        'confirm') {
                        stock_button.style.display = "none";

                        // console.log('ปิด');

                    } else {
                        stock_button.style.display = "block";
                        // console.log(data['data']['member_doc_status']);
                    }


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
                    url: '{{ route('admin/Member_Doc_datatable') }}',
                    data: function(d) {
                        // d.s_branch_id_fk = $('#s_branch_id_fk').val();
                        // d.s_warehouse_id_fk = $('#s_warehouse_id_fk').val();
                        // d.s_product_name = $('#s_product_name').val();
                        // d.s_lot_number = $('#s_lot_number').val();

                        // d.position = $('#type').val();
                        // d.id_card = $('#id_card').val();

                    },
                },


                columns: [
                    // {
                    //     data: "id",
                    //     title: "ลำดับ",
                    //     className: "w-10 text-center",
                    // },


                    {
                        data: "username",
                        title: "รหัสสมาชิก",
                        className: "w-10 ",
                    },

                    {
                        data: "first_name",
                        title: "ชื่อ",
                        className: "w-10",
                    },

                    {
                        data: "last_name",
                        title: "นามสกุล",
                        className: "w-10",
                    },

                    {
                        data: "upline_id",
                        title: "ผู้เเนะนำ",
                        className: "w-10",
                    },

                    {
                        data: "regis_doc1_status",
                        title: "ภาพถ่ายหน้าบัตรประชาชน",
                        className: "w-10",

                    },

                    {
                        data: "regis_doc2_status",
                        title: "ภาพถ่ายหน้าตรง",
                        className: "w-10",

                    },


                    {
                        data: "regis_doc3_status",
                        title: "ภาพหน้าตรงพร้อมบัตรประชาชน",
                        className: "w-10",

                    },

                    {
                        data: "regis_doc4_status",
                        title: "ภาพถ่ายหน้าบัญชีธนาคาร",
                        className: "w-10",

                    },

                    {
                        data: "order_regis_file_date",
                        title: "วันที่ส่งเอกสารล่าสุด",
                        className: "w-10",

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
