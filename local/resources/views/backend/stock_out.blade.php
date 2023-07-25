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
    <link href="{{ asset('backend/assets/css/forms/form-widgets.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/assets/css/forms/file-upload.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/plugins/dropzone/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('page-header')
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">ระบบคลัง</li>
            <li class="breadcrumb-item active" aria-current="page"><span>จ่ายออกสินค้า</span></li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="widget-content widget-content-area br-6">
        <div class="row">
            <div class="col-md-12 text-right">
                <div class="input-group-prepend">
                    <button class="btn btn-success btn-rounded " data-toggle="modal" data-target="#add" type="button"><i
                            class="las la-plus-circle font-20"></i>
                        จ่ายออกสินค้า</button>
                </div>
            </div>
            <div class="modal fade bd-example-modal-lg" id="add" tabindex="-1" role="dialog"
                aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header ml-4">
                            <h5 class="modal-title" id="myLargeModalLabel"><b>จ่ายออกสินค้า</b></h5>
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
                                            <form method="post" action="{{ route('admin/Stockout_insert') }}"
                                                enctype="multipart/form-data" id="msform">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-12 mx-0">
                                                        <div class="form-card">
                                                            <div class="w-100">
                                                                <div class="form-group row">
                                                                    <div class="col-lg-6  mt-2 text-left">
                                                                        <label><b>สาขารับเข้าสินค้า:</b></label>
                                                                        <span
                                                                            class="form-label text-danger branch_id_fk_err _err"></span>
                                                                        <select class="form-control branch_select"
                                                                            name="branch_id_fk">
                                                                            <option selected disabled> เลือกสาขา
                                                                            </option>
                                                                            @foreach ($get_branch as $val)
                                                                                <option value="{{ $val->id }}">
                                                                                    {{ $val->branch_name }}
                                                                                    ({{ $val->branch_code }})
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-lg-6  mt-2 text-left">
                                                                        <label><b>สาขาจ่ายออกสินค้า:</b></label>
                                                                        <span
                                                                            class="form-label text-danger branch_out_id_fk_err _err"></span>
                                                                        <select class="form-control branch_out_select"
                                                                            name="branch_out_id_fk">
                                                                            <option selected disabled> เลือกสาขา
                                                                            </option>
                                                                            @foreach ($get_branch as $val)
                                                                                <option value="{{ $val->id }}">
                                                                                    {{ $val->branch_name }}
                                                                                    ({{ $val->branch_code }})
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-lg-6  mt-2 text-left">
                                                                        <label><b>คลังรับเข้าสินค้า:</b></label>
                                                                        <span
                                                                            class="form-label text-danger warehouse_id_fk_err _err"></span>
                                                                        <select class="form-control warehouse_select"
                                                                            name="warehouse_id_fk" disabled>
                                                                            <option selected disabled> เลือกคลัง
                                                                            </option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-lg-6  mt-2 text-left">
                                                                        <label><b>คลังจ่ายออกสินค้า:</b></label>
                                                                        <span
                                                                            class="form-label text-danger warehouse_out_id_fk_err _err"></span>
                                                                        <select class="form-control warehouse_out_select"
                                                                            name="warehouse_out_id_fk" disabled>
                                                                            <option selected disabled> เลือกคลัง
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-lg-6  mt-2 text-left">
                                                                        <label><b>สินค้า:</b></label>
                                                                        <span
                                                                            class="form-label text-danger product_id_fk_err _err"></span>
                                                                        <select class="form-control product_select"
                                                                            name="product_id_fk" disabled>
                                                                            <option selected disabled> เลือกสินค้า
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-lg-6  mt-2 text-left">
                                                                        <label><b>หมายเลขล๊อตสินค้า:</b></label>
                                                                        <span
                                                                            class="form-label text-danger lot_number_err _err"></span>
                                                                        <select class="form-control lot_number_select"
                                                                            name="lot_number" disabled>
                                                                            <option selected disabled> เลือกล๊อตสินค้า
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-lg-6  mt-2 text-left">
                                                                        <label><b>จำนวนสินค้า:</b></label>
                                                                        <span
                                                                            class="form-label text-danger product_amount_out_err _err"></span>
                                                                        <input type="number" min="1"
                                                                            name="product_amount_out" class="form-control"
                                                                            placeholder="จำนวนสินค้า">
                                                                    </div>
                                                                    <div class="col-lg-6  mt-2 text-left">
                                                                        <label><b>หน่วยสินค้า:</b></label>
                                                                        <span
                                                                            class="form-label text-danger product_unit_id_fk_err _err"></span>
                                                                        <select class="form-control product_unit_select"
                                                                            name="product_unit_id_fk" disabled>
                                                                            <option selected disabled> เลือกหน่วยสินค้า
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-lg-6  mt-2 text-left">
                                                                        <label><b>วันที่รับเข้าสินค้า:</b></label>
                                                                        <span
                                                                            class="form-label text-danger date_stock-in_err _err"></span>
                                                                        <input class="form-control" type="date"
                                                                            value="yyyy-mm-dd" name="date_stock_in"
                                                                            disabled>
                                                                    </div>
                                                                    <div class="col-lg-6  mt-2 text-left">
                                                                        <label><b>วันที่หมดอายุ:</b></label>
                                                                        <span
                                                                            class="form-label text-danger expire_stock-in_err _err"></span>
                                                                        <input class="form-control" type="date"
                                                                            value="yyyy-mm-dd" name="expire_stock_in"
                                                                            disabled>
                                                                    </div>
                                                                    <div class="col-lg-6  mt-2 text-left">
                                                                        <label><b>เลขที่เอกสาร:</b></label>
                                                                        <span
                                                                            class="form-label text-danger doc_no_err _err"></span>
                                                                        <input type="text" name="doc_no"
                                                                            class="form-control"
                                                                            placeholder="เลขที่เอกสาร">
                                                                    </div>
                                                                    <div class="col-lg-6  mt-2 text-left">
                                                                        <label><b>วันที่จ่ายออกสินค้า:</b></label>
                                                                        <span
                                                                            class="form-label text-danger date_stock-out_err _err"></span>
                                                                        <input class="form-control" type="date"
                                                                            value="yyyy-mm-dd" name="date_stock_out">
                                                                    </div>
                                                                    <div class="col-lg-6 mt-2 text-left">
                                                                        <label><b>ไฟล์เอกสารแนบ:</b></label>
                                                                        <div class="upload text-center img-thumbnail">
                                                                            <input type="file" name="doc_name"
                                                                                class="dropify">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 mt-2 text-left">
                                                                        <label><b>หมายเหตุ:</b></label>
                                                                        <textarea class="form-control" name="stock_remark" placeholder="รายละเอียดการรับเข้าสินค้า"></textarea>
                                                                    </div>
                                                                    <div class="col-lg-6  mt-2 text-left">
                                                                        <input type="hidden" name="stock_type"
                                                                            value="out">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="info-area col-md-12 text-center mt-4 ">
                                                            <button type="submit" class="btn btn-info btn-rounded"
                                                                name="stock_out_add" value="success">
                                                                <i class="las la-save"></i> จ่ายออกสินค้า</button>
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
                            <h5 class="modal-title" id="myLargeModalLabel"><b>จ่ายออกสินค้า</b></h5>
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
                                            {{-- <form method="post" action="{{ route('admin/update_stock_out') }}"
                                                enctype="multipart/form-data" id="msform">
                                                @csrf --}}
                                            <div class="row">
                                                <div class="col-md-12 mx-0">
                                                    <div class="form-card">
                                                        <div class="w-100">
                                                            <div class="form-group row">
                                                                <div class="col-lg-6  mt-2">
                                                                    <input type="hidden" name="id" id="id">
                                                                    <label><b>สาขารับเข้าสินค้า:</b></label>
                                                                    <span
                                                                        class="form-label text-danger branch_id_fk_err _err"></span>
                                                                    <select class="form-control branch_select"
                                                                        name="branch_id_fk">
                                                                        <option selected disabled> เลือกสาขา
                                                                        </option>
                                                                        @foreach ($get_branch as $val)
                                                                            <option value="{{ $val->id }}">
                                                                                {{ $val->branch_name }}
                                                                                ({{ $val->branch_code }})
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-lg-6  mt-2">
                                                                    <label><b>สาขาจ่ายออกสินค้า:</b></label>
                                                                    <span
                                                                        class="form-label text-danger branch_out_id_fk_err _err"></span>
                                                                    <select class="form-control branch_out_select"
                                                                        name="branch_out_id_fk">
                                                                        <option selected disabled> เลือกสาขา
                                                                        </option>
                                                                        @foreach ($get_branch as $val)
                                                                            <option value="{{ $val->id }}">
                                                                                {{ $val->branch_name }}
                                                                                ({{ $val->branch_code }})
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-lg-6  mt-2">
                                                                    <label><b>คลังรับเข้าสินค้า:</b></label>
                                                                    <span
                                                                        class="form-label text-danger warehouse_id_fk_err _err"></span>
                                                                    <select class="form-control warehouse_select"
                                                                        name="warehouse_id_fk" disabled>
                                                                        <option selected disabled> เลือกคลัง
                                                                        </option>
                                                                    </select>
                                                                </div>

                                                                <div class="col-lg-6  mt-2">
                                                                    <label><b>คลังจ่ายออกสินค้า:</b></label>
                                                                    <span
                                                                        class="form-label text-danger warehouse_out_id_fk_err _err"></span>
                                                                    <select class="form-control warehouse_out_select"
                                                                        name="warehouse_out_id_fk" disabled>
                                                                        <option selected disabled> เลือกคลัง
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-lg-6  mt-2">
                                                                    <label><b>สินค้า:</b></label>
                                                                    <span
                                                                        class="form-label text-danger product_id_fk_err _err"></span>
                                                                    <select class="form-control product_select"
                                                                        name="product_id_fk">
                                                                        <option selected disabled> เลือกสินค้า
                                                                        </option>
                                                                        @foreach ($get_stock_in as $key => $val)
                                                                            <option value="{{ $val->id }}"
                                                                                data-name_unit="{{ $val->product_unit_name }}">
                                                                                {{-- {{ $key + 1 }} . --}}
                                                                                {{ $val->product_name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-lg-6  mt-2 text-left">
                                                                    <label><b>หมายเลขล๊อตสินค้า:</b></label>
                                                                    <span
                                                                        class="form-label text-danger lot_number_err _err"></span>
                                                                    <input type="text" name="lot_number"
                                                                        class="form-control"
                                                                        placeholder="หมายเลขล๊อตสินค้า">
                                                                </div>
                                                                <div class="col-lg-6  mt-2 text-left">
                                                                    <label><b>จำนวนสินค้า:</b></label>
                                                                    <span
                                                                        class="form-label text-danger product_amount_out_err _err"></span>
                                                                    <input type="number" min="1"
                                                                        name="product_amount_out" class="form-control"
                                                                        placeholder="จำนวนสินค้า">
                                                                </div>
                                                                <div class="col-lg-6  mt-2 text-left">
                                                                    <label><b>หน่วยสินค้า:</b></label>
                                                                    <span
                                                                        class="form-label text-danger product_unit_id_fk_err _err"></span>
                                                                    <select class="form-control product_unit_select"
                                                                        name="product_unit_id_fk" disabled>
                                                                        <option selected disabled> เลือกหน่วยสินค้า
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-lg-6  mt-2 text-left">
                                                                    <label><b>เลขที่เอกสาร:</b></label>
                                                                    <span
                                                                        class="form-label text-danger doc_no_err _err"></span>
                                                                    <input type="text" name="doc_no"
                                                                        class="form-control" placeholder="เลขที่เอกสาร">
                                                                </div>
                                                                <div class="col-lg-6  mt-2 text-left">
                                                                    <label><b>วันที่จ่ายออกสินค้า:</b></label>
                                                                    <span
                                                                        class="form-label text-danger date_stock-out_err _err"></span>
                                                                    <input class="form-control" type="date"
                                                                        value="yyyy-mm-dd" name="date_stock_out">
                                                                </div>
                                                                <div class="col-lg-6 mt-2 text-left">
                                                                    <label><b>ไฟล์เอกสารแนบ:</b></label>
                                                                    <div class="upload text-center img-thumbnail">
                                                                        <input type="file" name="doc_name"
                                                                            class="dropify">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 text-left">
                                                                    <label><b>หมายเหตุ:</b></label>
                                                                    <textarea class="form-control" name="stock_remark" placeholder="รายละเอียดการรับเข้าสินค้า"></textarea>
                                                                </div>
                                                                <div class="col-lg-6  mt-2 text-left">
                                                                    <input type="hidden" name="stock_type"
                                                                        value="out">
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="info-area col-md-12 text-center mt-4 ">
                                                        <button type="submit" class="btn btn-info btn-rounded">
                                                            <i class="las la-save"></i> จ่ายออกสินค้า</button>
                                                    </div>

                                                </div>
                                            </div>
                                            {{-- </form> --}}
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
        <br>
        <div class="table-responsive mb-4">
            <table id="ordertable" class="table table-hover table-sm" style="width:100%">
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>สาขารับเข้า</th>
                        <th>คลังรับเข้า</th>
                        <th>สาขาจ่ายออก</th>
                        <th>คลังจ่ายออก</th>
                        <th>สินค้า</th>
                        <th>จำนวน</th>
                        <th>หน่วย</th>
                        <th>หมายเลขล๊อต</th>
                        <th>วันที่รับเข้า</th>
                        <th>วันที่จ่ายออก</th>
                        <th>ผู้ทำรายการ</th>
                        <th>ผู้อนุมัติ</th>
                        <th>วันที่อนุมัติ</th>
                        <th>สถานะ</th>
                        <th>หมายเหตุ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    {{-- @foreach ($get_warehouse as $value) --}}
                    {{-- <tr>
                            <td>{{ $value->branch_name }}</td>
                            <td>{{ $value->warehouse_code }}</td>
                            <td>{{ $value->warehouse_name }}</td>
                            <td>{{ $value->warehouse_details }}</td>
                            <td>
                                @if ($value->status == '1')
                                    <span class="badge badge-pill badge-success light">เปิดใช้งาน</span>
                                @endif
                                @if ($value->status == '0')
                                    <span class="badge badge-pill badge-danger light">ปิดใช้งาน</span>
                                @endif
                            <td>
                                <a href="#!" onclick="edit({{ $value->id }})" class="p-2">
                                    <i class="lab la-whmcs font-25 text-warning"></i></a>
                            </td>
                        </tr>
                    @endforeach --}}

                </tbody>
            </table>
        </div>




    </div>
@endsection
@section('js')
    <script src="{{ asset('backend/plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/forms/custom-select2.js') }}"></script>
    <script src="{{ asset('backend/assets/js/custom.js') }}"></script>
    <script src="{{ asset('backend/assets/js/forms/multiple-step.js') }}"></script>
    <script src="{{ asset('backend/plugins/dropify/dropify.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/pages/profile_edit.js') }}"></script>
    <script src="{{ asset('backend/assets/js/forms/file-upload.js') }}"></script>
    <script src="{{ asset('backend/plugins/dropzone/dropzone.min.js') }}"></script>
    <script>
        //นำเข้า
        $('.branch_select').change(function() {
            $('.warehouse_select').prop('disabled', false);

            const id = $(this).val();
            $.ajax({
                url: '{{ route('get_data_warehouse_select') }}',
                type: 'GET',
                dataType: 'json',
                async: false,
                data: {
                    id: id,
                },
                success: function(data) {
                    append_warehouse_select(data);
                },
            });
        });

        function append_warehouse_select(data) {
            $('.warehouse_select').empty();
            $('.warehouse_select').append(`
                <option disabled selected value=""> เลือกคลัง </option>
                `);
            data.forEach((val, key) => {

                $('.warehouse_select').append(`
                <option value="${val.id}">${val.warehouse_name} (${val.warehouse_code})</option>
                `);
            });
        }

        // เมื่อคลิก Warehouse เพื่อเปิดรายการของ Product
        $('.warehouse_select').change(function() {
            $('.product_select').prop('disabled', false);

            const id = $(this).val();
            $.ajax({
                url: '{{ route('get_data_product_select') }}',
                type: 'GET',
                dataType: 'json',
                async: false,
                data: {
                    id: id,
                },
                success: function(data) {
                    append_product_select(data);
                },
            });
        });

        function append_product_select(data) {
            $('.product_select').empty();
            $('.product_select').append(`
        <option disabled selected value=""> เลือกสินค้า </option>
    `);
            data.forEach((val, key) => {
                $('.product_select').append(`
            <option value="${val.id}">${val.product_name}</option>
        `);
            });
        }

        // เมื่อคลิก Product เพื่อเปิดรายการของ Product Unit
        $('.product_select').change(function() {
            $('.product_unit_select').prop('disabled', false);

            const productId = $(this).val(); // รหัสสินค้าที่เลือก
            $.ajax({
                url: '{{ route('get_data_product_unit_select') }}',
                type: 'GET',
                dataType: 'json',
                data: {
                    id: productId, // ส่งรหัสสินค้าไปยังเส้นทาง URL
                },
                success: function(data) {
                    append_product_unit_select(data);
                },
            });
        });

        function append_product_unit_select(data) {
            $('.product_unit_select').empty();
            $('.product_unit_select').append(`
        <option disabled selected value=""> เลือกหน่วยสินค้า </option>
    `);
            data.forEach((val, key) => {
                $('.product_unit_select').append(`
            <option value="${val.product_unit_id_fk}">${val.product_unit_th}</option>
        `);
            });
        }


     // เมื่อคลิก Product เพื่อเปิดรายการของ lot number
     $('.product_select').change(function() {
            $('.lot_number_select').prop('disabled', false);

            const productId = $(this).val(); // รหัสสินค้าที่เลือก
            $.ajax({
                url: '{{ route('get_lot_number') }}',
                type: 'GET',
                dataType: 'json',
                data: {
                    id: productId, // ส่งรหัสสินค้าไปยังเส้นทาง URL
                },
                success: function(data) {
                    append_get_lot_number(data);
                },
            });
        });

        function append_get_lot_number(data) {
            $('.lot_number_select').empty();
            $('.lot_number_select').append(`
        <option disabled selected value=""> เลือกล๊อตสินค้า </option>
    `);
            data.forEach((val, key) => {
                $('.lot_number_select').append(`
            <option value="${val.lot_number}">${val.lot_number}</option>
        `);
            });
        }



        //จ่ายออก
        $('.branch_out_select').change(function() {
            $('.warehouse_out_select').prop('disabled', false);

            const id = $(this).val();
            $.ajax({
                url: '{{ route('get_data_warehouse_out_select') }}',
                type: 'GET',
                dataType: 'json',
                async: false,
                data: {
                    id: id,
                },
                success: function(data) {
                    append_warehouse_out_select(data);
                },
            });
        });

        function append_warehouse_out_select(data) {
            $('.warehouse_out_select').empty();
            $('.warehouse_out_select').append(`
                <option disabled selected value=""> เลือกคลัง </option>
                `);
            data.forEach((val, key) => {

                $('.warehouse_out_select').append(`
                <option value="${val.id}">${val.warehouse_name} (${val.warehouse_code})</option>
                `);
            });
        }








        //
        // function edit(id) {
        //     $.ajax({
        //             url: '{{ route('admin/view_stock_in') }}',
        //             type: 'GET',
        //             data: {
        //                 id
        //             }
        //         })
        //         .done(function(data) {
        //             // console.log(data);
        //             $("#edit").modal();
        //             $("#id").val(data['data']['id']);
        //             $("#branch_id_fk").val(data['data']['branch_name']);
        //             $("#warehouse_id_fk").val(data['data']['warehouse_name']);
        //             $("#product_id_fk").val(data['data']['product_name']);
        //             $("#lot_number").val(data['data']['lot_number']);
        //             $("#product_amount").val(data['data']['amt']);
        //             $("#product_unit_id_fk").val(data['data']['product_unit_name']);
        //             $("#doc_no").val(data['data']['doc_no']);
        //             $("#date_stock_in").val(data['data']['date_in_stock']);
        //             $("#expire_stock_in").val(data['data']['lot_expired_date']);
        //             $("#stock_remark").val(data['data']['stock_remark']);


        //             var img = '{{ asset('') }}';
        //             var img_url = img + data['data']['url'] + '/' + data['data']['doc_name'];

        //             var htmlContent = '<img src="' + img_url +
        //                 '"class="img-fluid" id="doc_name" name="doc_name" alt="Document Image">';
        //             $("#img").html(htmlContent);



        //             if (data['data']['stock_status'] == 'cancel' || data['data']['stock_status'] == 'confirm') {
        //                 stock_button.style.display = "none";

        //                 // console.log('ปิด');

        //             } else {
        //                 stock_button.style.display = "block";
        //                 // console.log(data['data']['stock_status']);
        //             }


        //         })
        //         .fail(function() {
        //             console.log("error");
        //         })
        // }
    </script>
@endsection
