@extends('layouts.frontend.app')
@section('css')

@endsection

@section('content')
<div id="content" class="main-content">
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
                                    <span>โค้ดคูปอง</span>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div>


    <div class="row layout-top-spacing">
        <div class="col-lg-12 layout-spacing">
            <div class="statbox widget box box-shadow mb-4">
                {{-- <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Picker</h4>
                        </div>
                    </div>
                </div> --}}
                <div class="widget-content widget-content-area">

                    <div class="row mb-2">
                        <div class="col-md-2">
                            <div class="form-group">
                                <select class="form-control" id="statuscoupon">
                                    <option>ใช้งานได้</option>
                                    <option>ถูกใช้แล้ว</option>
                                    <option>หมดอายุ</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input class="form-control" type="date" value="yyyy-mm-dd"
                                    id="validformdate"><label for="searchdate1">
                            </div>
                        </div>
                        <div class="col-md-4">

                            <input class="form-control" type="date" value="yyyy-mm-dd"
                                id="validtodate"><label for="searchdate2">
                        </div>
                        <div class="col-md-2 ">
                            <button type="button"
                                class="btn btn-outline-success btn-rounded">FILTER</button>
                        </div>
                    </div>
                    <div class="table-responsive mb-4">
                        <table id="ordertable" class="table table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>วันเริ่มต้น</th>
                                    <th>วันหมดอายุ</th>
                                    <th>Code</th>
                                    <th>รายละเอียด/โปรโมชั่น</th>
                                    <th>ผู้ใช้งาน</th>
                                    <th>สถานะ</th>
                                                                                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>06/09/2023</td>
                                    <td>15/09/2023</td>
                                    <td>AAA</td>
                                    <td>BUY 1 GET 1 FREE</td>
                                    <td>กิ่งทองใบหยก</td>
                                    <td>
                                        <span class="badge badge-danger light">หมดอายุ</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>06/09/2023</td>
                                    <td>15/09/2023</td>
                                    <td>AAA</td>
                                    <td>BUY 1 GET 1 FREE</td>
                                    <td>กิ่งทองใบหยก</td>
                                    <td>
                                        <span class="badge badge-warning light">ถูกใช้งานแล้ว</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>06/09/2023</td>
                                    <td>15/09/2023</td>
                                    <td>AAA</td>
                                    <td>BUY 1 GET 1 FREE</td>
                                    <td>กิ่งทองใบหยก</td>
                                    <td>
                                        <span class="badge badge-success-teal light">ใช้งานได้</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
                {{-- <div class="widget-footer text-right">
                    <button type="reset" class="btn btn-primary mr-2">Submit</button>
                    <button type="reset" class="btn btn-outline-primary">Cancel</button>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- Main Body Ends -->
</div>
@endsection
@section('js')
@endsection
