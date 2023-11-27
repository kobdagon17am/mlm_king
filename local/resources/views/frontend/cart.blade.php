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
                                    <h5>สรุปรายการสินค้าในตระกร้า</h5>
                                    <div class="table-responsive mt-2 mb-4">
                                        <table id="ordertable" class="table table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>รูปภาพ</th>
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
                                                    <h6 class="mb-0ัั">{{ $value['name'] }}</h6>
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
                                                            <button  type="button"  class="btn btn-outline-primary" onclick="quantity_change({{$value['id']}},{{$value['quantity']}})">{{ $value['quantity'] }}</button>
                                                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered  modal-sm" role="document">
                                                                      <form action="{{ route('quantity_change') }}" method="POST">
                                                                                @csrf
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalCenterTitle">แก้ไขจำนวนสินค้า</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <i class="las la-times"></i>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <input type="hidden" name="product_id" id="product_id">
                                                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                                                <label class="my-1 mr-2" for="quantityinput">จำนวนสินค้า</label>
                                                                                <div class="p-l-0 m-b-30">
                                                                                    <div class="input-group">
                                                                                        <span class="input-group-btn">
                                                                                            <button type="button"
                                                                                                class="btn btn-default btn-number shadow-none btn-sm btn-block"
                                                                                                data-type="minus" data-field="quant[1]">
                                                                                                <i class="las la-minus-circle font-25"></i>
                                                                                            </button>
                                                                                        </span>

                                                                                        <input type="text" id="quant" name="productQty"
                                                                                            class="form-control input-number text-center font-15"
                                                                                            value="1" max="1000">
                                                                                        <span class="input-group-btn">
                                                                                            <button type="button"
                                                                                                class="btn btn-default btn-number shadow-none btn-sm"
                                                                                                data-type="plus" data-field="quant[1]">
                                                                                                <i class="las la-plus-circle font-25"></i>
                                                                                            </button>
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>


                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> ยกเลิก</button>
                                                                            <button type="submit"  class="btn btn-primary" onclick="addcart()">แก้ไข</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            {{ number_format($value['price'], 2) }}
                                                        </td>
                                                        <td>
                                                            {{ number_format($value['attributes']['pv'], 2) }}
                                                        </td>
                                                        <td>


                                                             <a href="javascript:void(0);"  onclick="cart_delete('{{ $value['id'] }}')" class="bs-tooltip font-20 ml-2 text-danger" title="" data-original-title="Delete"><i class="las la-trash"></i></a>
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
                                    <div class="border border-light p-3  rounded mb-3">
                                        <h5 class="mb-3"><b>สรุปยอดการสั่งซื้อสินค้า</b></h5>
                                        <div class="table-responsive">
                                            <table class="table mb-0" id="ordertable" style="width:100%">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <h6>จำนวนสินค้า :</h6>
                                                        </td>
                                                        <td>
                                                            <h6>{{Cart::session('1')->getTotalQuantity()}}</h6>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h6>ราคาสินค้ารวม :</h6>
                                                        </td>
                                                        <td>
                                                            <h6>฿200</h6>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h6>Vat (7.00%) :</h6>
                                                        </td>
                                                        <td>
                                                            <h6>฿200</h6>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h6>ราคาสินค้ารวม + Vat :</h6>
                                                        </td>
                                                        <td>
                                                            <h6>฿200</h6>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h6>ค่าจัดส่ง :</h6>
                                                        </td>
                                                        <td>
<<<<<<< HEAD
                                                            <h6>{{ number_format(Cart::session('1')->getTotal(),2) }}</h6>
=======
                                                            <h6>฿0</h6>
>>>>>>> e65aa02ac115e3384644476b6ace3d91e4415b9a
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-success-teal strong">ค่าส่งสินค้า : </td>
                                                        <td class="text-success-teal strong">{{$bill['shipping']}}</td>
                                                    </tr>
                                                    <tr>
                                                        <?php
                                                        $cartCollection = Cart::session('1')->getContent();
                                                        $data = $cartCollection->toArray();

                                                        if ($data) {
                                                            foreach ($data as $value) {
                                                                $pv[] = $value['quantity'] * $value['attributes']['pv'];
                                                            }
                                                            $pv_total = array_sum($pv);
                                                        } else {
                                                            $pv_total = 0;
                                                        }

                                                        ?>
                                                        <th>คะแนนที่ได้รับ :</th>
                                                        <th>{{ number_format($pv_total,2)}} PV</th>
                                                    </tr>
                                                    <tr>
                                                        <th>ยอดชำระทั้งหมด :</th>
<<<<<<< HEAD
                                                        <th>{{ number_format(Cart::session('1')->getTotal()+$bill['shipping']) }} บาท</th>
=======
                                                        <th>฿1,550</th>
>>>>>>> e65aa02ac115e3384644476b6ace3d91e4415b9a
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

    </script>

     <script>
            document.addEventListener("DOMContentLoaded", function() {
                var plusBtn = document.querySelector("[data-type='plus']");
                var minusBtn = document.querySelector("[data-type='minus']");
                var inputField = document.getElementById("quant");

                plusBtn.addEventListener("click", function() {
                    var currentValue = parseInt(inputField.value);
                    if (currentValue < parseInt(inputField.max)) {
                        inputField.value = currentValue + 1;
                    }
                });

                minusBtn.addEventListener("click", function() {
                    var currentValue = parseInt(inputField.value);
                    if (currentValue > 1) {
                        inputField.value = currentValue - 1;
                    }
                });
            });


            function quantity_change(item_id,qyt){
    $('#product_id').val(item_id);
    $('#quant').val(qyt);
     $('#exampleModalCenter').modal('show');

  }
        </script>


@endsection
