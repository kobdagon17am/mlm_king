@extends('layouts.backend.app')
@section('css')
@endsection
@section('page-header')
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">ระบบคลัง</li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin/Stock_report') }}">รายงานคลังสินค้า</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page"><span>STOCK CARD</span></li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="row layout-top-spacing">
        <div class="col-lg-12 layout-spacing">
            <div class="statbox widget box box-shadow mb-4">
                <div class="widget-content widget-content-area">
                    <div style="text-align: left;">
                        <h5><b>STOCK CARD : <b></h5>
                            <h6><b>ยอดคงเหลือ : <b></h6>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mt-2">
                        </div>
                        <div class="col-md-2 mt-2">
                            <div class="form-group">
                                <label><b>วันที่เริ่มต้น:</b></label>
                                <input class="form-control" type="date" value="yyyy-mm-dd" name="search_start"><label
                                    for="วันที่เริ่มต้น">
                            </div>
                        </div>
                        <div class="col-md-2 mt-2">
                            <div class="form-group">
                                <label><b>วันที่สิ้นสุด:</b></label>
                                <input class="form-control" type="date" value="yyyy-mm-dd" name="search_end"><label
                                    for="วันที่สิ้นสุด">
                            </div>
                        </div>
                        <div class="col-md-2 mb-4 text-left" style="margin-top:40px">
                            <button type="button" class="btn btn-outline-success btn-rounded"><i
                                    class="las la-search font-15"></i> สืบค้น</button>
                        </div>
                        <div class="col-md-3 mt-2">
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
                        <table id="ordertable" class="table table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>วันที่สืบค้น</th>
                                    <th>รายการ</th>
                                    <th>รหัสอ้างอิง</th>
                                    <th>ผู้อนุมัติ</th>
                                    <th>จำนวนรับเข้า</th>
                                    <th>จำนวนโอนย้าย</th>
                                    <th>จำนวนคงเหลือ</th>
                                </tr>
                            </thead>
                            {{-- <tbody>
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
                            </tbody> --}}
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
