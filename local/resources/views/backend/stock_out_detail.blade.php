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
            <li class="breadcrumb-item" aria-current="page"><a
                href="{{ route('admin/Stock_out')}}">สินค้าในคลัง</a></li>
            <li class="breadcrumb-item active" aria-current="page"><span>จ่ายออกสินค้า</span></li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="widget-content widget-content-area br-6">
        <div class="row">
            <div class="col-md-12 mx-0">
                <div class="form-card">
                    <div class="w-100">
                        <div class="form-group row">
                            <div class="col-lg-4  mt-2 text-left">
                                <label><b>สาขาต้นทาง:</b></label>
                                <span class="form-label text-danger branch_id_fk_err _err"></span>
                                <input type="text" name="branch_id_fk" class="form-control" value="{{ $get_stock->branch_name }}" disabled>
                            </div>
                            <div class="col-lg-4  mt-2 text-left">
                                <label><b>คลังสินค้าต้นทาง:</b></label>
                                <span class="form-label text-danger warehouse_id_fk_err _err"></span>
                                <input type="text" name="warehouse_id_fk" class="form-control" value="{{ $get_stock->warehouse_name }}" disabled>
                            </div>
                            <div class="col-lg-4  mt-2 text-left">
                                <label><b>สินค้าต้นทาง:</b></label>
                                <span class="form-label text-danger product_id_fk_err _err"></span>
                                <input type="text" name="product_id_fk" class="form-control" value="{{ $get_stock->product_name }}" disabled>
                            </div>
                            <div class="col-lg-4  mt-2 text-left">
                                <label><b>สาขาปลายทาง:</b></label>
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
                            <div class="col-lg-4  mt-2 text-left">
                                <label><b>คลังสินค้าปลายทาง:</b></label>
                                <span
                                    class="form-label text-danger branch_id_fk_err _err"></span>
                                <select class="form-control branch_select"
                                    name="branch_id_fk">
                                    <option selected disabled> เลือกสาขา
                                    </option>
                                    @foreach ($get_warehouse as $val)
                                        <option value="{{ $val->id }}">
                                            {{ $val->branch_name }}
                                            ({{ $val->branch_code }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4  mt-2 text-left">
                                <input type="hidden" name="stock_type" value="in">
                            </div>
                           
                        </div>
                    </div>
                </div>
               

            </div>
        </div>
        <div class="table-responsive mb-4">
            <table id="ordertable" class="table table-hover table-sm" style="width:100%">
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>หมายเลขล๊อต</th>
                        <th>จำนวนคงเหลือ</th>
                        <th>จ่ายออกสินค้า</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($get_stock_lot as $value)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $value->lot_number }}</td>
                            <td>{{ $value->amt }}</td>
                            <td>
                                <a href="#!" onclick="add({{ $value->id }})" class="p-2">
                                    <i class="lab la-whmcs font-25 text-warning"></i></a>
                            </td>
                        </tr>
                    @endforeach

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
        function add(id) {
            $.ajax({
                    url: '{{ route('admin/view_stock_in') }}',
                    type: 'GET',
                    data: {
                        id
                    }
                })
                .done(function(data) {
                    // console.log(data);
                    $("#add").modal();
                    $("#id").val(data['data']['id']);
                    $("#branch_id_fk").val(data['data']['branch_name']);
                    $("#warehouse_id_fk").val(data['data']['warehouse_name']);
                    $("#product_id_fk").val(data['data']['product_name']);
                    $("#lot_number").val(data['data']['lot_number']);
                    $("#product_amount").val(data['data']['amt']);
                    $("#product_unit_id_fk").val(data['data']['product_unit_name']);
                    $("#doc_no").val(data['data']['doc_no']);
                    $("#date_stock_in").val(data['data']['date_in_stock']);
                    $("#expire_stock_in").val(data['data']['lot_expired_date']);
                    $("#stock_remark").val(data['data']['stock_remark']);


                    var img = '{{ asset('') }}';
                    var img_url = img + data['data']['url'] + '/' + data['data']['doc_name'];

                    var htmlContent = '<img src="' + img_url +
                        '"class="img-fluid" id="doc_name" name="doc_name" alt="Document Image">';
                    $("#img").html(htmlContent);



                    if (data['data']['stock_status'] == 'cancel' || data['data']['stock_status'] == 'confirm') {
                        stock_button.style.display = "none";

                        // console.log('ปิด');

                    } else {
                        stock_button.style.display = "block";
                        // console.log(data['data']['stock_status']);
                    }


                })
                .fail(function() {
                    console.log("error");
                })
        }
    </script>
@endsection
