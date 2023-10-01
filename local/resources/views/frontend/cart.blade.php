@extends('layouts.frontend.app')
@section('css')
    <link href="{{ asset('frontend/plugins/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend/assets/css/ui-elements/pagination.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend/assets/css/elements/tooltip.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend/assets/css/apps/ecommerce.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div id="content" class="main-content">
        <!--  Navbar Starts / Breadcrumb Area Starts -->
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
                                    <li class="breadcrumb-item active" aria-current="page"><span>ตะกร้าสินค้า</span></li>
                                </ol>
                            </nav>
                        </div>
                    </li>
                </ul>
            </header>
        </div>
        <!--  Navbar Ends / Breadcrumb Area Ends -->
        <!-- Main Body Starts -->


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
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card-box">
                                    <h4>สรุปรายการสินค้าในตระกร้า</h4>
                                    <div class="table-responsive mt-2 mb-4">
                                        <table id="ordertable" class="table table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>รูปภาพสินค้า</th>
                                                    <th>รายละเอียดสินค้า</th>
                                                    <th>จำนวนสินค้า</th>
                                                    <th>ราคา (บาท)</th>
                                                    <th>PV</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($bill['data'] as $value)
                                                    {{-- <div class="cardL-cart">
                                            <div class="row">
                                                <div class="col-3">
                                                    <img src="{{asset($value['attributes']['img'])}}"
                                                        class="mw-100 mb-2">
                                                </div>
                                                <div class="col-6">
                                                    <h6 class="mb-0">{{ $value['name'] }}</h6>
                                                    {!! $value['attributes']['descriptions'] !!}


                                                        <p class="mb-0"> {{ number_format($value['price'],2) }} บาท</p>
                                                        <p class="mb-0"> {{ number_format($value['attributes']['pv'],2) }} PV</p>

                                                </div>
                                                <div class="col-3">

                                                    <div class="text-md-end">
                                                        <button type="button" class="btn btn-outline-secondary px-2 py-1"
                                                         onclick="quantity_change({{$value['id']}},{{$value['quantity']}})">จำนวน {{ $value['quantity'] }} ชิ้น</button>
                                                            <button type="button" class="btn btn-p2 rounded-pill mb-1" onclick="cart_delete('{{ $value['id'] }}')"> <i class="fa fa-trash" aria-hidden="true"></i> </button>
                                                        <p class="mb-0">รวม {{ number_format($value['quantity']*$value['price'],2) }} บาท</p>
                                                        <p class="mb-0">รวม {{ number_format($value['quantity']*$value['attributes']['pv'],2) }} PV</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}

                                                    <tr>
                                                        <td>
                                                            <img src="{{ asset($value['attributes']['img']) }}"
                                                                alt="contact-img" title="contact-img"
                                                                class="rounded-circle mr-3" height="150" width="150"
                                                                style="object-fit: cover;">
                                                        </td>
                                                        <td>
                                                            <p><b>{{ $value['name'] }}</b><br>
                                                                {!! $value['attributes']['descriptions'] !!}</p>
                                                        </td>
                                                        <td>
                                                            <input type="number" min="1"
                                                                value="{{ $value['quantity'] }}"
                                                                class="form-control text-center"
                                                                style="width: 75px; height: 40px;" onclick="openPopup()">
                                                        </td>
                                                        <td>
                                                            {{ number_format($value['price'], 2) }}
                                                        </td>
                                                        <td>
                                                            {{ number_format($value['attributes']['pv'], 2) }}
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);"
                                                                onclick="cart_delete('{{ $value['id'] }}')"
                                                                class="action-icon text-center">
                                                                <button type="delete"
                                                                    class="btn btn-outline-danger btn-rounded font-20"><i
                                                                        class="lar la-trash-alt"></i></button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>

                                        </table>

                                    </div>


                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card-box">
                                    <div class="border border-light p-3 mt-1 rounded mb-3">
                                        <h5 class="mb-3"><b>สรุปรายการสั่งซื้อ</b></h5>
                                        <div class="table-responsive">
                                            <table class="table mb-0" id="ordertable" style="width:100%">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <h6>จำนวนสินค้า :</h6>
                                                        </td>
                                                        <td>
                                                            <h6>2</h6>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h6>ราคารวม :</h6>
                                                        </td>
                                                        <td>
                                                            <h6>฿2,000</h6>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-success-teal strong">ส่วนลด : </td>
                                                        <td class="text-success-teal strong">-฿50</td>
                                                    </tr>
                                                    <tr>
                                                        <th>คะแนนที่ได้รับ :</th>
                                                        <th>100 PV</th>
                                                    </tr>
                                                    <tr>
                                                        <th>ยอดชำระทั้งหมด :</th>
                                                        <th>฿ 1,550</th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <a href="{{ route('CartGeneral', ['type' => 1]) }}"
                                            class="w-100 btn btn-outline-info mb-0 ml-3 mr-3"><i
                                                class="las la-arrow-left"></i>
                                            สินค้า</a>
                                        <a href="{{ route('CartSummary') }}"
                                            class="w-100 btn btn-outline-info mb-0 ml-3 mr-3">สั่งซื้อ <i
                                                class="las la-arrow-right"></i></a>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                    {{-- <div class="widget-footer text-right">
                        <button type="reset" class="btn btn-primary mr-2">Submit</button>
                        <button type="reset" class="btn btn-outline-primary">Cancel</button>
                    </div> --}}
                    <form action="{{ route('cart_delete') }}" method="POST" id="cart_delete">
                        @csrf
                        <input type="hidden" id="data_id" name="data_id">

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function cart_delete(item_id) {


            swal({
                title: 'ลบสินค้าออกจากตะกร้า',
                //   text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                //   confirmButtonText: 'Confirm',
                confirmButtonText: 'ยืนยัน',
                cancelButtonText: 'ยกเลิก',
                padding: '2em'
            }).then(function(result) {
                if (result.value) {
                    $('#data_id').val(item_id);

                    // swal(
                    //   'Deleted!',
                    //   'Your file has been deleted.',
                    //   'success'
                    // )
                    $("#cart_delete").submit();
                }
            })



        }

        function openPopup() {
            // สร้างหน้าต่างป๊อปอัพที่นี่
            Swal.fire({
                title: 'แก้ไขจำนวนสินค้า!',
                input: 'number',
                inputAttributes: {
                    autocapitalize: 'off'
                },
                showCancelButton: true,
                confirmButtonText: 'บันทึก',
                cancelButtonText: 'ยกเลิก',
                showLoaderOnConfirm: true,
                preConfirm: (login) => {
                    return fetch(`//api.github.com/users/${login}`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error(response.statusText)
                            }
                            return response.json()
                        })
                        .catch(error => {
                            Swal.showValidationMessage(
                                `Request failed: ${error}`
                            )
                        })
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: `${result.value.login}'s avatar`,
                        imageUrl: result.value.avatar_url
                    })
                }
            })
        }


    </script>
@endsection
