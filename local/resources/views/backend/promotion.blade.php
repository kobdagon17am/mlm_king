@extends('layouts.backend.app')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/plugins/table/datatable/dt-global_style.css') }}">
    <link href="{{ asset('backend/assets/css/ui-elements/pagination.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/plugins/select2/select2.min.css') }}">
    <link href="{{ asset('backend/assets/css/forms/form-widgets.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/assets/css/forms/multiple-step.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/plugins/dropify/dropify.min.css') }}">
    <link href="{{ asset('backend/assets/css/pages/profile_edit.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('page-header')
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">ระบบสินค้า</li>
            <li class="breadcrumb-item active" aria-current="page"><span>สินค้าโปรโมชั่น</span></li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="widget-content widget-content-area br-6">
        <div class="row">
            {{-- <div class="col-md-2">
                <div class="form-group row">
                    <label class="col-form-label text-left col-lg-12 col-sm-12"><b>รหัสสินค้า</b></label>
                    <input type="text" class="form-control float-left text-center w130 myLike product_code "
                        placeholder="รหัสสินค้า">
                </div>
            </div> --}}

            <div class="col-md-12 text-right">
                <div class="input-group-prepend">
                    <button class="btn btn-success btn-rounded " data-toggle="modal" data-target="#add" type="button"><i
                            class="las la-plus-circle font-20"></i>
                        เพิ่มโปรโมชั่น</button>
                </div>
            </div>
            <div class="modal fade bd-example-modal-lg" id="add" tabindex="-1" role="dialog"
                aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header ml-4">
                            <h5 class="modal-title" id="myLargeModalLabel"><b>เพิ่มโปรโมชั่น</b></h5>
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
                                            <form method="post" action="{{ route('admin/Promotion_insert') }}"
                                                enctype="multipart/form-data" id="msform">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-12 mx-0">
                                                        <div class="form-card">
                                                            <div class="w-100">
                                                                <div class="form-group row">
                                                                    <div class="col-lg-6 text-left">
                                                                        <label><b>ชื่อโปรโมชั่น:</b></label>
                                                                        <input type="text" name="promotion_name"
                                                                            class="form-control"
                                                                            placeholder="ชื่อโปรโมชั่น">
                                                                    </div>
                                                                    <div class="col-lg-6 text-left">
                                                                        <label><b>ประเภท:</b></label>
                                                                        <select class="form-control" name="promotion_type">
                                                                            <option value="General">โปรโมชั่นสินค้าทั่วไป
                                                                            </option>
                                                                            <option value="Warehouse">โปรโมชั่นเปิดคลังใบหยก
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-lg-12 mt-2 text-left">
                                                                        <label><b>รายละเอียด:</b></label>
                                                                        <textarea class="form-control" rows="3" name="promotion_detail" placeholder="รายละเอียดโปรโมชั่น"></textarea>
                                                                    </div>
                                                                    
                                                                    <div class="col-lg-6  mt-2 text-left">
                                                                        <label><b>วันที่เริ่มโปรโมชั่น:</b></label>
                                                                        <input class="form-control" type="datetime-local" value="{{date ('Y-m-d H:i:00')}}" name="promotion_start_date">
                                                                    </div>
                                                                    <div class="col-lg-6  mt-2 text-left">
                                                                        <label><b>วันที่สิ้นสุดโปรโมชั่น:</b></label>
                                                                        <input class="form-control" type="datetime-local" value="{{date ('Y-m-d H:i:00')}}"  name="promotion_end_date">
                                                                    </div>

                                                                    <div class="col-lg-6 mt-2 text-left">
                                                                        <label><b>URL:</b></label>
                                                                        <input type="text" name="promotion_url"
                                                                            class="form-control"
                                                                            placeholder="URL">
                                                                    </div>

                                                                    <div class="col-lg-6 mt-2 text-left">
                                                                        <label><b>สถานะโปรโมชั่น:</b></label>
                                                                        <select class="form-control"
                                                                            name="promotion_status">
                                                                            <option value="1">เปิดใช้งาน</option>
                                                                            <option value="0">ปิดใช้งาน</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-lg-6 mt-2 text-left">
                                                                        <label for="promotion_image1"><b>รูปภาพโปรโมท</b></label>
                                                                        <div class="upload text-center img-thumbnail">
                                                                            <input type="file"
                                                                                name="promotion_image1" class="dropify"
                                                                                data-default-file="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 mt-2 text-left">
                                                                        <label for="promotion_image2"><b>รูปภาพโปรโมท</b></label>
                                                                        <div class="upload text-center img-thumbnail">
                                                                            <input type="file"
                                                                                name="promotion_image2" class="dropify"
                                                                                data-default-file="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 mt-2 text-left">
                                                                        <label for="promotion_image3"><b>รูปภาพโปรโมท</b></label>
                                                                        <div class="upload text-center img-thumbnail">
                                                                            <input type="file"
                                                                                name="promotion_image3" class="dropify"
                                                                                data-default-file="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 mt-2 text-left">
                                                                        <label for="promotion_image4"><b>รูปภาพโปรโมท</b></label>
                                                                        <div class="upload text-center img-thumbnail">
                                                                            <input type="file"
                                                                                name="promotion_image4" class="dropify"
                                                                                data-default-file="">
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="info-area col-md-12 text-center mt-4 ">
                                                            <button type="submit" class="btn btn-info btn-rounded">
                                                                <i class="las la-save"></i> เพิ่มโปรโมชั่น</button>
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


            <div class="modal fade bd-example-modal-lg" id="edit" tabindex="-1" role="dialog"
                aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header ml-4">
                            <h5 class="modal-title" id="myLargeModalLabel"><b>แก้ไขโปรโมชั่น</b></h5>
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
                                            <form method="post" action="{{ route('admin/edit_promotion') }}"
                                                enctype="multipart/form-data" id="msform">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-12 mx-0">
                                                        <div class="form-card">
                                                            <div class="w-100">
                                                                <div class="form-group row">
                                                                    <div class="col-lg-6 text-left">
                                                                        <input type="hidden" name="id"
                                                                            id="id">
                                                                        <label><b>ชื่อโปรโมชั่น:</b></label>
                                                                        <input type="text" name="promotion_name"
                                                                            id="promotion_name" class="form-control"
                                                                            placeholder="ชื่อโปรโมชั่น">
                                                                    </div>
                                                                    <div class="col-lg-6 text-left">
                                                                        <label><b>ประเภท:</b></label>
                                                                        <select class="form-control" name="promotion_type"
                                                                            id="promotion_type">
                                                                            <option value="General">โปรโมชั่นสินค้าทั่วไป
                                                                            </option>
                                                                            <option value="Warehouse">
                                                                                โปรโมชั่นเปิดคลังใบหยก
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-lg-12 mt-2 text-left">
                                                                        <label><b>รายละเอียด:</b></label>
                                                                        <textarea class="form-control" rows="3" name="promotion_detail" id="promotion_detail"
                                                                            placeholder="รายละเอียดโปรโมชั่น"></textarea>
                                                                    </div>
                                                                    <div class="col-lg-6  mt-2 text-left">
                                                                        <label><b>วันที่เริ่มโปรโมชั่น:</b></label>
                                                                        <input class="form-control" type="datetime-local" value="" id="promotion_start_date" name="promotion_start_date">
                                                                    </div>
                                                                    <div class="col-lg-6  mt-2 text-left">
                                                                        <label><b>วันที่สิ้นสุดโปรโมชั่น:</b></label>
                                                                        <input class="form-control" type="datetime-local" value="" id="promotion_end_date" name="promotion_end_date">
                                                                    </div>
                                                                    <div class="col-lg-6 mt-2 text-left">
                                                                        <label><b>URL:</b></label>
                                                                        <input type="text" name="promotion_url" id="promotion_url"
                                                                            class="form-control"
                                                                            placeholder="URL">
                                                                    </div>
                                                                    <div class="col-lg-6 mt-2 text-left">
                                                                        <label><b>สถานะโปรโมชั่น:</b></label>
                                                                        <select class="form-control"
                                                                            name="promotion_status" id="promotion_status">
                                                                            <option value="1">เปิดใช้งาน</option>
                                                                            <option value="0">ปิดใช้งาน</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-lg-6 mt-2 text-left">
                                                                        <label for="promotion_image1"><b>รูปภาพโปรโมท</b></label>
                                                                        <div class="upload text-center img-thumbnail">
                                                                            <input type="file" id="promotion_image1"
                                                                                name="promotion_image1" class="dropify"
                                                                                data-default-file="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 mt-2 text-left">
                                                                        <label for="promotion_image2"><b>รูปภาพโปรโมท</b></label>
                                                                        <div class="upload text-center img-thumbnail">
                                                                            <input type="file"
                                                                                name="promotion_image2" id="promotion_image2" class="dropify"
                                                                                data-default-file="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 mt-2 text-left">
                                                                        <label for="promotion_image3"><b>รูปภาพโปรโมท</b></label>
                                                                        <div class="upload text-center img-thumbnail">
                                                                            <input type="file"
                                                                                name="promotion_image3" id="promotion_image3" class="dropify"
                                                                                data-default-file="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 mt-2 text-left">
                                                                        <label for="promotion_image4"><b>รูปภาพโปรโมท</b></label>
                                                                        <div class="upload text-center img-thumbnail">
                                                                            <input type="file"
                                                                                name="promotion_image4" id="promotion_image4" class="dropify"
                                                                                data-default-file="">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="info-area col-md-12 text-center mt-4 ">
                                                            <button type="submit" class="btn btn-info btn-rounded">
                                                                <i class="las la-save"></i> แก้ไขโปรโมชั่น</button>
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
        <div class="table-responsive mt-4 mb-2">
            <table id="basic-dt" class="table table-hover" style="width:100%">

            </table>
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
    <script src="{{ asset('backend/plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/forms/custom-select2.js') }}"></script>
    <script src="{{ asset('backend/assets/js/custom.js') }}"></script>
    <script src="{{ asset('backend/assets/js/forms/multiple-step.js') }}"></script>
    <script src="{{ asset('backend/plugins/dropify/dropify.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/pages/profile_edit.js') }}"></script>
    <!-- The following JS library files are loaded to use PDF Options-->
    <script src="{{ asset('backend/plugins/table/datatable/button-ext/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/table/datatable/button-ext/vfs_fonts.js') }}"></script>
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
                    $("#promotion_start_date").val(data['data']['promotion_start_date']);
                    $("#promotion_end_date").val(data['data']['promotion_end_date']);
                    $("#promotion_status").val(data['data']['promotion_status']);
                    $.each(data['img'], function(index, value) {
                        if (value['promotion_image_orderby'] == 1) {

                            var img = '{{ asset('') }}' + value['promotion_image_url'] + value[
                                'promotion_image_name'];
                            $('#promotion_image1').attr('data-default-file', img).dropify();
                        }

                        if (value['promotion_image_orderby'] == 2) {
                            var img = '{{ asset('') }}' + value['promotion_image_url'] + value[
                                'promotion_image_name'];
                            $('#promotion_image2').attr('data-default-file', img).dropify();
                        }

                        if (value['promotion_image_orderby'] == 3) {
                            var img = '{{ asset('') }}' + value['promotion_image_url'] + value[
                                'promotion_image_name'];
                            $('#promotion_image3').attr('data-default-file', img).dropify();
                        }

                        if (value['promotion_image_orderby'] == 4) {
                            var img = '{{ asset('') }}' + value['promotion_image_url'] + value[
                                'promotion_image_name'];
                            $('#promotion_image4').attr('data-default-file', img).dropify();
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
                        data: "promotion_name",
                        title: "ชื่อโปรโมชั่น",
                        className: "w-10 ",
                    },
                    {
                        data: "promotion_type",
                        title: "ประเภท",
                        className: "w-10",
                    },
                    {
                        data: "promotion_detail",
                        title: "รายละเอียด",
                        className: "w-10 ",
                    },
                    
                    {
                        data: "promotion_start_date",
                        title: "วันที่เริ่มโปรโมชั่น",
                        className: "w-10",
                    },

                    {
                        data: "promotion_end_date",
                        title: "วันที่สิ้นสุดโปรโมชั่น",
                        className: "w-10",
                    },
                    {
                        data: "promotion_status",
                        title: "สถานะโปรโมชั่น",
                        className: "w-10",

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
