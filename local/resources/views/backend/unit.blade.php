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
            <li class="breadcrumb-item active" aria-current="page"><span>หน่วยสินค้า</span></li>
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
                    <button class="btn btn-success btn-rounded " data-toggle="modal" data-target="#add"
                        type="button"><i class="las la-plus-circle font-20"></i>
                        เพิ่มหน่วยสินค้า</button>
                </div>
            </div>
            <div class="modal fade bd-example-modal-lg" id="add" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header ml-4">
                            <h5 class="modal-title" id="myLargeModalLabel"><b>เพิ่มหน่วยสินค้า</b></h5>
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
                                            <form method="post" action="{{ route('admin/Unit_insert') }}">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-12 mx-0">
                                                        <div class="form-card">
                                                            <div class="w-100">
                                                                <div class="form-group row">
                                                                    <div class="col-lg-6  mt-2">
                                                                        <label><b>หน่วยสินค้า:</b></label>
                                                                        <input type="text" name="unit_name"
                                                                            class="form-control" placeholder="หน่วยสินค้า">
                                                                    </div>
                                                                    <div class="col-lg-6  mt-2">
                                                                        <label><b>หน่วยสินค้า (ภาษาอังกฤษ):</b></label>
                                                                        <input type="text" name="unit_en_name"
                                                                            class="form-control"
                                                                            placeholder="หน่วยสินค้า (ภาษาอังกฤษ)">
                                                                    </div>
                                                                    <div class="col-lg-12 mt-2">
                                                                        <label><b>สถานะหน่วยสินค้า:</b></label>
                                                                        <select class="form-control" name="unit_status">
                                                                            <option value="1">เปิดใช้งาน</option>
                                                                            <option value="0">ปิดใช้งาน</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="info-area col-md-12 text-center mt-4 ">
                                                            <button type="submit" class="btn btn-info btn-rounded">
                                                                <i class="las la-save"></i> เพิ่มหน่วยสินค้า</button>
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

            <div class="modal fade bd-example-modal-lg" id="edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header ml-4">
                        <h5 class="modal-title" id="myLargeModalLabel"><b>เก้ไขหน่วยสินค้า</b></h5>
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
                                        <form method="post" action="{{ route('admin/edit_unit') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12 mx-0">
                                                    <div class="form-card">
                                                        <div class="w-100">
                                                            <div class="form-group row">
                                                                <div class="col-lg-6  mt-2">
                                                                    <label><b>หน่วยสินค้า:</b></label>
                                                                    <input type="hidden" name="id" id="id">
                                                                    <input type="text" name="unit_name" id="unit_name"
                                                                        class="form-control" placeholder="หน่วยสินค้า">
                                                                </div>
                                                                <div class="col-lg-6  mt-2">
                                                                    <label><b>หน่วยสินค้า (ภาษาอังกฤษ):</b></label>
                                                                    <input type="text" name="unit_en_name" id="unit_en_name"
                                                                        class="form-control"
                                                                        placeholder="หน่วยสินค้า (ภาษาอังกฤษ)">
                                                                </div>
                                                                <div class="col-lg-12 mt-2">
                                                                    <label><b>สถานะหน่วยสินค้า:</b></label>
                                                                    <select class="form-control" name="unit_status" id="unit_status">
                                                                        <option value="1">เปิดใช้งาน</option>
                                                                        <option value="0">ปิดใช้งาน</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="info-area col-md-12 text-center mt-4 ">
                                                        <button type="submit" class="btn btn-info btn-rounded">
                                                            <i class="las la-save"></i> แก้ไขหน่วยสินค้า</button>
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
        <br>
        <div class="table-responsive mb-4">
            <table id="ordertable" class="table table-hover table-sm" style="width:100%">
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>หน่วยสินค้า</th>
                        <th>หน่วยสินค้า (ภาษาอังกฤษ)</th>
                        <th>สถานะหน่วยสินค้า</th>
                        <th>แก้ไข</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    @foreach ($get_unit as $value)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $value->product_unit_th }}</td>
                            <td>{{ $value->product_unit_en }}</td>
                            <td>
                                @if ($value->status == '1')
                                    <span class="badge badge-pill badge-success light">เปิดใช้งาน</span>
                                @endif
                                @if ($value->status == '0')
                                    <span class="badge badge-pill badge-danger light">ปิดใช้งาน</span>
                                @endif
                            </td>
                            <td>
                                <a href="#!" onclick="edit({{$value->id}})" class="p-2">
                                    <i class="lab la-whmcs font-25 text-warning"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    {{-- <tr>
                        <td>1</td>
                        <td>ถุง</td>
                        <td>Pack</td>
                        <td><span class="badge badge-pill badge-success light">เปิดใช้งาน</span></td>
                        <td>
                            <a href="#!" class="p-2">
                                <i class="lab la-whmcs font-25 text-warning"></i></a>
                        </td>
                    </tr> --}}

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
    <script>


        function edit(id) {
            $.ajax({
                    url: '{{ route('admin/view_unit') }}',
                    type: 'GET',
                    data: {
                        id
                    }
                })
                .done(function(data) {
                   //console.log(data);

                    $("#id").val(data['data']['id']);

                    $("#unit_name").val(data['data']['product_unit_th']);
                    $("#unit_en_name").val(data['data']['product_unit_en']);
                    $("#unit_status").val(data['data']['status']);

                    $("#edit").modal();

                })
                .fail(function() {
                    console.log("error");
                })
        }

    </script>
@endsection
