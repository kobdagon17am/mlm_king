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
            <li class="breadcrumb-item active" aria-current="page"><span>รับเข้าสินค้า</span></li>
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
                        รับเข้าสินค้า</button>
                </div>
            </div>
            <div class="modal fade bd-example-modal-lg" id="add" tabindex="-1" role="dialog"
                aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header ml-4">
                            <h5 class="modal-title" id="myLargeModalLabel"><b>รับเข้าสินค้า</b></h5>
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
                                            {{-- <form method="post" action="{{ route('admin/Warehouse_insert') }}">
                                                @csrf --}}
                                            <div class="row">
                                                <div class="col-md-12 mx-0">
                                                    <div class="form-card">
                                                        <div class="w-100">
                                                            <div class="form-group row">
                                                                <div class="col-lg-6  mt-2">

                                                                    <label><b>สาขา:</b></label>
                                                                    <span
                                                                        class="form-label text-daproduct_id_fk_err _err"></span>
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
                                                                    <label><b>คลังสินค้า:</b></label>
                                                                    <span
                                                                        class="form-label text-danger warehouse_id_fk_err _err"></span>
                                                                    <select class="form-control warehouse_select"
                                                                        name="warehouse_id_fk" disabled>
                                                                        <option selected disabled> เลือกคลัง
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-lg-6  mt-2">
                                                                    <label><b>สินค้า:</b></label>
                                                                    <span
                                                                        class="form-label text-danger product_id_fk_err _err"></span>
                                                                    <select class="form-control product_select"
                                                                        name=" product_id_fk">
                                                                        <option selected disabled> เลือกสินค้า
                                                                        </option>
                                                                        @foreach ($get_product as $key => $val)
                                                                            <option value="{{ $val->id }}" data-name_unit="{{ $val->product_unit_name }}">
                                                                                {{-- {{ $key + 1 }} . --}}
                                                                                {{ $val->product_name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-lg-6  mt-2">
                                                                    <label><b>หมายเลขล๊อตสินค้า:</b></label>
                                                                    <span
                                                                        class="form-label text-danger lot_number_err _err"></span>
                                                                    <input type="text" id="lot_number" name="lot_number"
                                                                        class="form-control"
                                                                        placeholder="หมายเลขล๊อตสินค้า">
                                                                </div>
                                                                <div class="col-lg-6  mt-2">
                                                                    <label><b>จำนวนสินค้า:</b></label>
                                                                    <span
                                                                        class="form-label text-danger product_amount_err _err"></span>
                                                                    <input type="number" id="product_amount"
                                                                        min="1" name="product_amount"
                                                                        class="form-control" placeholder="จำนวนสินค้า">
                                                                </div>
                                                                <div class="col-lg-6  mt-2">
                                                                    <label><b>หน่วยสินค้า:</b></label>
                                                                    <span
                                                                        class="form-label text-danger product_unit_id_fk_err _err"></span>
                                                                    <select class="form-control product_unit_select"
                                                                        name="product_unit_id_fk" disabled>
                                                                        <option selected disabled> เลือกหน่วยสินค้า
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-lg-6  mt-2">
                                                                    <label><b>เลขที่เอกสาร:</b></label>
                                                                    <span
                                                                        class="form-label text-danger doc_no_err _err"></span>
                                                                    <input type="text" id="doc_no" name="doc_no"
                                                                        class="form-control" placeholder="เลขที่เอกสาร">
                                                                </div>
                                                                <div class="col-lg-6  mt-2">
                                                                    <label><b>วันที่รับเข้าสินค้า:</b></label>
                                                                    <span
                                                                        class="form-label text-danger date_stock-in_err _err"></span>
                                                                    <input class="form-control" id="date_stock-in"
                                                                        type="date" value="yyyy-mm-dd"
                                                                        name="date_stock-in">
                                                                </div>
                                                                <div class="col-lg-6  mt-2">
                                                                    <label><b>วันที่หมดอายุ:</b></label>
                                                                    <span
                                                                        class="form-label text-danger expire_stock-in_err _err"></span>
                                                                    <input class="form-control" id="expire_stock-in"
                                                                        type="date" value="yyyy-mm-dd"
                                                                        name="expire_stock-in">
                                                                </div>
                                                                <div class="col-lg-6  mt-2">
                                                                    <label><b>ไฟล์เอกสารแนบ:</b></label>
                                                                    {{-- <input type="file" name="document_no"
                                                                        class="form-control" placeholder="ไฟล์เอกสารแนบ"> --}}
                                                                    <div id="dropzone">
                                                                        <form action="/upload"
                                                                            class="dropzone needsclick dz-clickable"
                                                                            name="file_stock_in" id="file_stock_in">
                                                                            <div class="dz-message needsclick">
                                                                                <button type="button"
                                                                                    class="dz-button">คลิกเพื่อเลือกไฟล์แนบ</button>

                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="info-area col-md-12 text-center mt-4 ">
                                                        <button type="submit" class="btn btn-warning btn-rounded">
                                                            <i class="las la-plus-circle"></i> รับเข้าสินค้า</button>
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

            <div class="modal fade bd-example-modal-lg" id="edit" tabindex="-1" role="dialog"
                aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header ml-4">
                            <h5 class="modal-title" id="myLargeModalLabel"><b>รับเข้าสินค้า</b></h5>
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
                                            {{-- <form method="post" action="{{ route('admin/edit_warehouse') }}">
                                                @csrf --}}
                                            <div class="row">
                                                <div class="col-md-12 mx-0">
                                                    <div class="form-card">
                                                        <div class="w-100">
                                                            <div class="form-group row">
                                                                <div class="col-lg-6  mt-2">
                                                                    <input type="hidden" name="id" id="id">
                                                                    <label><b>ชื่อสาขา:</b></label>
                                                                    {{-- <select class="form-control" name="branch_name" id="branch_name">
                                                                            @foreach ($get_branch as $item)
                                                                                <option value="{{ $item->id }}">
                                                                                    {{ $item->branch_name }}</option>
                                                                            @endforeach

                                                                        </select> --}}
                                                                </div>
                                                                <div class="col-lg-6  mt-2">
                                                                    <label><b>รหัสคลังสินค้า:</b></label>
                                                                    <input type="text" name="warehouse_code"
                                                                        id="warehouse_code" class="form-control"
                                                                        placeholder="รหัสคลังสินค้า">
                                                                </div>
                                                                <div class="col-lg-6  mt-2">
                                                                    <label><b>ชื่อคลังสินค้า:</b></label>
                                                                    <input type="text" name="warehouse_name"
                                                                        id="warehouse_name" class="form-control"
                                                                        placeholder="ชื่อคลังสินค้า">
                                                                </div>
                                                                <div class="col-lg-6  mt-2">
                                                                    <label><b>รายละเอียดคลังสินค้า:</b></label>
                                                                    <textarea class="form-control" id="warehouse_details" name="warehouse_details" id="warehouse_details"
                                                                        placeholder="รายละเอียดคลังสินค้า"></textarea>
                                                                </div>
                                                                <div class="col-lg-6 mt-2">
                                                                    <label><b>สถานะ:</b></label>
                                                                    <select class="form-control" name="warehouse_status"
                                                                        id="warehouse_status">
                                                                        <option value="1">เปิดใช้งาน</option>
                                                                        <option value="0">ปิดใช้งาน</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="info-area col-md-12 text-center mt-4 ">
                                                        <button type="submit" class="btn btn-info btn-rounded">
                                                            <i class="las la-save"></i> รับเข้าสินค้า</button>
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
                        <th>สาขา</th>
                        <th>คลังสินค้า</th>
                        <th>สินค้า</th>
                        <th>จำนวน</th>
                        <th>หน่วย</th>
                        <th>หมายเลขล๊อต</th>
                        <th>วันที่รับเข้า</th>
                        <th>วันหมดอายุ</th>
                        <th>แก้ไข</th>
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
    <script src="{{ asset('backend/plugins/dropify/dropify.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/pages/profile_edit.js') }}"></script>
    <script src="{{ asset('backend/assets/js/forms/file-upload.js') }}"></script>
    <script src="{{ asset('backend/plugins/dropzone/dropzone.min.js') }}"></script>

    <script>
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
                <option disabled selected value=""> เลือกสาขา </option>
                `);
            data.forEach((val, key) => {

                $('.warehouse_select').append(`
                <option value="${val.id}">${val.warehouse_name} (${val.warehouse_code})</option>
                `);
            });
        }





        //
        $('.product_select').change(function() {
            $('.product_unit_select').prop('disabled', false);

            const id = $(this).val();
            const name = $(this).find(':selected').data('name_unit');

            $('.product_unit_select').empty();

            $('.product_unit_select').append(`
        <option value="${id}">${name}</option>
    `);
        });


        // function append_product_unit_select(data) {
        //     $('.product_unit_select').empty();
        //     $('.product_unit_select').append(`
    //         <option disabled selected value=""> เลือกหน่วยสินค้า </option>
    //         `);
        //     data.forEach((val, key) => {

        //         $('.product_unit_select').append(`
    //         <option value="${val.id}">${val.product_unit_name}</option>
    //         `);
        //     });
        // }      
    </script>
@endsection
