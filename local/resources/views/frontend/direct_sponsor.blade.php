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
                                    <span>ข้อมูลผังแนะนำตรง</span>
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

                    
                    <div class="table-responsive mb-4">
                        <table id="ordertable" class="table table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>วันที่สมัคร</th>
                                    <th>ผังองค์กร</th>
                                    <th>รหัส-ชื่อสมาชิก</th>
                                    <th>สาย</th>
                                    <th>ภายใต้</th>
                                    <th>คะแนนสะสม</th>
                                    <th class="text-center">ตำแหน่งทางธุรกิจ</th>
                                    <th class="text-center">ตำแหน่งเกียรติยศ</th>
                                                                                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>06/09/2023</td>
                                    <td><button type="button" class="btn btn-outline-success btn-sm"><i class="las la-sitemap font-20"></i></button></td>
                                    <td>กิ่งทองใบหยก (A001)</td>
                                    <td>A</td>
                                    <td>นำโชค</td>
                                    <td>200</td>
                                    <td class="text-center">Member</td>
                                    <td class="text-center">มงกุฎ 1</td>
                                </tr>
                                <tr>
                                    <td>06/09/2023</td>
                                    <td><button type="button" class="btn btn-outline-success btn-sm"><i class="las la-sitemap font-20"></i></button></td>
                                    <td>กิ่งทองใบหยก (A001)</td>
                                    <td>A</td>
                                    <td>นำโชค</td>
                                    <td>1,000</td>
                                    <td class="text-center">Silver</td>
                                    <td class="text-center">มงกุฎ 2</td>
                                </tr>
                                <tr>
                                    <td>06/09/2023</td>
                                    <td><button type="button" class="btn btn-outline-success btn-sm"><i class="las la-sitemap font-20"></i></button></td>
                                    <td>กิ่งทองใบหยก (A001)</td>
                                    <td>A</td>
                                    <td>นำโชค</td>
                                    <td>10,000</td>
                                    <td class="text-center">Gold</td>
                                    <td class="text-center">มงกุฎ 3</td>
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
