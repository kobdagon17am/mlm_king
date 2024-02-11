@extends('layouts.frontend.app')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/select2/select2.min.css') }}">
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
                                        <span>สมัครสมาชิก</span>
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
                                        {{-- <h5 class="table-header"><b>รายการสั่งซื้อ</b></h5> --}}
                                        <div class="row">
                                            @if($data['status'] == 'all')
                                            <div class="col-md-4 mt-2">
                                                <div class="form-group">
                                                    <label><b>เลือกผู้แนะนำ:</b></label>

                                                    <select name="sponser" class="form-control basic" id="sponser"
                                                        required>
                                                        <option value="">เลือกผู้แนะนำ</option>
                                                        @foreach ($data['username'] as $value)
                                                            <option value="{{ $value }}">
                                                                {{ $value }} ({{ $data['name'][$value] }})</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-md-3 mt-2">
                                                <div class="form-group">
                                                    <label><b>เลือกฝั่งที่จะสมัคร:</b></label>
                                                    <select name="line_type" class="form-control" id="line_type" required>
                                                        <option value="A" selected>ฝั่งขาซาย</option>
                                                        <option value="B">ฝั่งขาขวา</option>

                                                    </select>
                                                </div>
                                            </div>
                                            @else

                                            <div class="col-md-4 mt-2">
                                                <div class="form-group">
                                                    <label><b>เลือกผู้แนะนำ:</b></label>

                                                    <select name="sponser" class="form-control basic" id="sponser"
                                                        required>


                                                            <option value="{{ $data['username']->username }}">
                                                                {{ $data['username']->first_name }} {{ $data['username']->last_name }} ({{ $data['username']->username }})</option>

                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-md-3 mt-2">
                                                <div class="form-group">
                                                    <label><b>เลือกฝั่งที่จะสมัคร:</b></label>
                                                    <select name="line_type" class="form-control" id="line_type" required>
                                                        <option value="A" @if($data['type']=='A') selected  @endif >ฝั่งขาซ้าย</option>
                                                        <option value="B"  @if($data['type']=='B') selected  @endif>ฝั่งขาขวา</option>

                                                    </select>
                                                </div>
                                            </div>

                                            @endif

                                            <div class="col-md-2 text-center" style="margin-top:45px">
                                                <button type="button" onclick="check_upline()" class="btn btn-primary btn-rounded"><i
                                                        class="las la-search font-15"></i> ตรวจสอบ</button>
                                            </div>
                                        </div>

                                        <div id="modal_add"></div>
                                    </div>
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
    <script src="{{ asset('frontend/plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/forms/custom-select2.js') }}"></script>

    <script>
           $(document).ready(function() {
        $('#sponser').select2({
            tags: false
        });
    });
        function check_upline() {
            var sponser = $('#sponser').val();

            if((sponser == null || sponser === '') ){
                Swal.fire({
                            type: 'error',
                            title: 'กรุณาเลือกรหัสผู้แนะนำ',
                        })
                return;
            }
            var line_type = $('#line_type').val();
            $.ajax({
                    url: '{{ route('check_data_register') }}',
                    type: 'GET',
                    data: {
                        sponser:sponser,
                        line_type: line_type
                    },
                })
                .done(function(data) {
                    if (data['status'] == 'success') {
                        //console.log(data['customer']['username'])
                         modal_add(data['customer']['username'],line_type,sponser);
                    } else {

                        Swal.fire({
                            type: 'error',
                            title: 'ไม่พบรายละเอียดกรุณาเลือกรายการไหม่',
                        })
                    }
                })
        }


        function modal_add(username, type,sponser) {
        $.ajax({
                url: '{{ route('modal_add') }}',
                type: 'GET',
                data: {
                  username: username,
                  sponser:sponser,
                  type: type
                },
            })
            .done(function(data) {
                console.log("success");
                $('#modal_add').html(data);
                $('#modal_add_show').modal('show');
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });

    }

    </script>
@endsection
