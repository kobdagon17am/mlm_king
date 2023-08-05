@extends('layouts.backend.app')
@section('css')
@endsection
@section('page-header')
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">ระบบคลัง</li>
            <li class="breadcrumb-item active" aria-current="page"><span>รายงานคลังสินค้า</span></li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="row layout-top-spacing">
        <div class="col-lg-12 layout-spacing">
            <div class="statbox widget box box-shadow mb-4">
                <div class="widget-content widget-content-area">
                    <div class="row">
                        <div class="col-md-3 mt-2">
                        </div>
                        <div class="col-lg-3  mt-2 text-left">
                            <label><b>สาขา:</b></label>
                            <span class="form-label text-danger branch_id_fk_err _err"></span>
                            <select class="form-control branch_select" name="branch_id_fk">
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
                        <div class="col-lg-3  mt-2 text-left">
                            <label><b>คลังสินค้า:</b></label>
                            <span class="form-label text-danger warehouse_id_fk_err _err"></span>
                            <select class="form-control warehouse_select" name="warehouse_id_fk" disabled>
                                <option selected disabled> เลือกคลัง
                                </option>
                            </select>
                        </div>
                        <div class="col-md-3 mt-2">
                        </div>
                        <div class="col-md-3 mt-2">
                        </div>
                        <div class="col-lg-3  mt-2">
                            <label><b>สินค้า:</b></label>
                            <select class="form-control" name="product_name">
                                @foreach ($get_product as $key => $val)
                                    <option value="{{ $val->id }}" data-name_unit="{{ $val->product_unit_name }}">
                                        {{-- {{ $key + 1 }} . --}}
                                        {{ $val->product_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3  mt-2">
                            <label><b>หมายเลขล๊อต:</b></label>
                            <select class="form-control" name="lot_number">
                            </select>
                        </div>
                        <div class="col-md-3 mt-2">
                        </div>
                        <div class="col-md-12 mt-4 mb-4 text-center" style="margin-top:45px">
                            <button type="button" class="btn btn-outline-success btn-rounded"><i
                                    class="las la-search font-15"></i> สืบค้น</button>
                        </div>
                    </div>
                    <div style="text-align: right;">
                        <button class="dt-button buttons-excel buttons-html5 btn btn-outline-warning btn-rounded"
                            tabindex="0" aria-controls="export-dt">
                            <span>Excel</span>
                        </button>
                        <button class="dt-button buttons-print btn btn-outline-warning btn-rounded" tabindex="0"
                            aria-controls="export-dt"><span>Print</span></button>
                    </div>
                    <div class="table-responsive mt-2 mb-4">
                        <h6><b>รายงานการเคลื่อนไหวคลังสินค้า</b></h6>
                        <table id="ordertable" class="table table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>สาขา</th>
                                    <th>คลังสินค้า</th>
                                    <th>สินค้า</th>
                                    <th>หมายเลขล๊อต</th>
                                    <th>วันที่รับเข้า</th>
                                    <th>วันที่หมดอายุ</th>
                                    <th>จำนวน</th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($get_stock_lot as $value)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $value->branch_name }}</td>
                                        <td>{{ $value->warehouse_name }}</td>
                                        <td>{{ $value->product_name }}</td>
                                        <td>{{ $value->lot_number }}</td>
                                        <td>{{ $value->date_in_stock }}</td>
                                        <td>{{ $value->lot_expired_date }}</td>
                                        <td>{{ $value->amt }}</td>
                                        <td>
                                            <a href="{{ route('admin/Stock_card') }}"
                                                class="badge badge-rounded outline-badge-info">STOCK CARD</a>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
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
            <option disabled selected value=""> เลือกคลัง </option>
            `);
            data.forEach((val, key) => {

                $('.warehouse_select').append(`
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
        //             // $("#doc_no").val(data['data']['doc_no']);
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
