<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <style>
         @charset "utf-8";
            @font-face {
                font-family: 'THSarabunNew';
                font-style: normal;
                font-weight: normal;
                src: url("{{ asset('frontend/fonts/THSarabunNew.ttf')}}") format('truetype');
            }

            @font-face {
                font-family: 'THSarabunNew_b';
                font-style: normal;
                font-weight: normal;
                src: url("{{asset('frontend/fonts/THSarabunNewBold.ttf')}}") format('truetype');
            }

        p,tbody,th,tr,table,td{
            border-collapse: collapse;
            line-height: 1;

             /* margin: 1px;
             padding: 1px; */
             font-family: 'THSarabunNew';
             font-size: 13px;
             font-weight: normal;

            /* line-height: 16px;
            margin-top: 0px;
            margin-left: 13px;
            margin-right: 33px;
            line-height: 13px; */
        }
         body{

            font-family: 'THSarabunNew';
            font-weight: normal;
            font-size: 13px;
            margin-top: 0px;
            margin-bottom: 0px; /* Adjust the value to reduce the space as needed */
            margin-top: 0px;
        }

        h3{
            font-family: 'THSarabunNew';
            font-weight: normal;
            }

        b{
        font-family: 'THSarabunNew_b';
        font-weight: normal;
        }
        br {
            margin-bottom: 0px; /* Adjust the value to reduce the space as needed */
            margin-top: 0px;
        }
        .horizontal-line {
            border-top: 1px solid black;
            margin: 2px 0;
        }
        .text-right{
            text-align: right;
        }

        .text-center{
            text-align: center;
        }


    </style>

<style>
    #h, #f {
        height: 50vh; /* ให้สูงครึ่ง A4 */
        page-break-inside: avoid; /* หลีกเลี่ยงการตัดหน้ากระดาษ */
        margin-bottom: 10px; /* ระยะห่างระหว่าง div */
    }
</style>
</head>

<body>
<div id="h">
    <table style="width: 100%;border: 0px;margin: 0px" border="0">
        <thead>

            <tr>

                <th style="text-align: left;">
                    <p style="font-size: 18px;color: #123d71"> TopUp </p>

                    @if($order->address_sent =='branch')
                    <p class="inv-email-address"><b>รับที่สาขา</b>

                        <br>
                       สาขา: {{ $order->branch_name }} <br>

                    @else
                    <p class="inv-email-address"><b>ที่อยู่จัดส่ง</b> <br>
                        {{ $order->name }}<br>
                         @if ($order->house_no)
                             {{ $order->house_no }}
                         @endif
                         @if ($order->moo != '-' and $order->moo != '')
                             หมู่.{{ $order->moo }}
                         @endif
                         @if ($order->house_name != '-' and $order->house_name != '')
                             หมู่บ้าน.{{ $order->house_name }}
                         @endif
                         @if ($order->soi != '-' and $order->soi != '')
                             ซอย.{{ $order->soi }}
                         @endif
                         @if ($order->road != '-' and $order->road != '')
                             ถนน.{{ $order->road }}
                         @endif
                         @if ($order->district != '-' and $order->district != '')
                             อำเภอ{{ $order->district }}
                         @endif
                         @if ($order->tambon != '-' and $order->tambon != '')
                             ตำบล{{ $order->tambon }}
                         @endif
                         <br>
                         @if ($order->province != '-' and $order->province != '')
                             จังหวัด{{ $order->province }}
                         @endif
                         @if ($order->zipcode)
                             {{ $order->zipcode }}
                         @endif
                         เบอร์โทรศัพท์ : {{ $order->tel }}
                     </p>
                    @endif
                </th>

            <th align="left">
                <h3 style="font-size: 18px;color: #123d71;" class="text-right">ใบเสร็จ<br><font style="font-size: 18px">ต้นฉบับ</font></h3>
                <p class="inv-list-number">
                    <span class="inv-title">เลขที่ใบเสร็จ : </span> <span class="inv-number">{{ $order->code_order }}</span><br>
                    <span class="inv-title">ชื่อ : </span><span class="inv-customer-name">{{ $order->name }}</span><br>

            <span class="inv-title">วันที่ชำระ : </span>
                <span class="inv-date">
                    @if ($order->approve_date)
                        {{ $order->approve_date }}
                    @endif
                </span>
            </p>


            </th>
            </tr>

        </thead>
    </table>

    <table style="width: 100%;border: 0px solid black;padding: 0px;margin: 0px" border="0">
        <thead class="">
            <tr>
               <td style="background-color:#a3a3a3;padding-left: 2px; width: 40%;><b style="color: #000;font-size: 14px;margin-left: 5px;margin-top: 0px;">รายละเอียด</b></td>
               <td style="background-color:#a3a3a3;padding-left: 2px; width: 20%;text-align: right"><b style="color: #000;font-size: 14px;margin-left: 5px;margin-top: 0px;">จำนวน</b></td>
               <td style="background-color:#a3a3a3;padding-left: 2px; width: 20%;text-align: right"><b style="color: #000;font-size: 14px;margin-left: 5px;margin-top: 0px;">PV/หน่วย</b></td>
               <td style="background-color:#a3a3a3;padding-left: 2px; width: 20%;text-align: right"><b style="color: #000;font-size: 14px;margin-left: 5px;margin-top: 0px;">รวม PV</b></td>
               <td style="background-color:#a3a3a3;padding-left: 2px;width: 20%;text-align: right"><b style="color: #000;font-size: 14px;margin-left: 5px;margin-top: 0px;">ราคา/หน่วย (บาท)</b></td>
               <td style="background-color:#a3a3a3;padding-left: 2px;width: 20%;text-align: right"><b style="color: #000;font-size: 14px;margin-left: 5px;margin-top: 0px;">Vat 7%</b></td>
               <td style="background-color:#a3a3a3;padding-left: 2px;width: 20%;text-align: right"><b style="color: #000;font-size: 14px;margin-left: 5px;margin-top: 0px;">รวม (บาท)</b></td>

            </tr>
        </thead>
        <tbody>

            @foreach($db_order_products_list as $value)
            <tr>

                <td>
                     {{$value->product_name}}
                </td>
                <td class="text-right">
                    {{number_format($value->amt)}}

                </td>
                <td class="text-right">
                    {{number_format($value->pv)}}

                </td>
                <td class="text-right">
                    {{number_format($value->total_pv)}}

                </td>
                <td class="text-right">
                    {{number_format($value->selling_price-$value->vat,2)}}

                </td>
                <td  class="text-right">
                    {{number_format($value->vat,2)}}
                </td>
                <td  class="text-right">
                    {{number_format($value->total_price,2)}}
                </td>
            </tr>
            @endforeach

            <tr>
                <td colspan="7"><div class="horizontal-line"></div></td>

            </tr>
            <tr>
                <td colspan="5" rowspan="1" ><p style="padding: 0px;margin: 0px;font-size: 13px">*บริษัทขอสงวนสิทธิ์ที่จะปฏิเสธการรับคืนสินค้าในกรณีที่สินค้าเสียหาย นอกเหนือจากความเสียหายที่เกิดจากการขนส่งเท่านั้น
                    <br>
                    *บิลรับเองโปรดรับสินค้าภายใน 7 วัน</p></td>
                    <td class="text-right">ราคาสินค้าไม่รวม Vat :<br>
                        รวม Vat 7% :

                    </td>
                    <td class="text-right"> {{number_format($order->sum_price,2)}}<br>
                        {{number_format($order->tax_total,2)}} </td>

            </tr>



            <tr>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>

                <td class="text-right">ค่าจัดส่ง :</td>
                <td class="text-right"> {{number_format($order->shipping_price,2)}} </td>

            </tr>

            <tr>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>



                <td class="text-right">ยอดรวม :</td>
                <td class="text-right"> {{number_format($order->total_price,2)}} </td>

            </tr>





        </tbody>
    </table>

    <table style="width: 100%;border: 0px solid black;padding: 0px;margin: 0px" border="0">
        <tr >
            <th class="text-center"><p style="font-size: 12px">ผู้รับเงิน<br>(Collector)</p></th>
            <th>...........................................</th>
            <th  class="text-center"><p style="font-size: 12px">ผู้รับสินค้า<br>(Received)</p></th>
            <th>...........................................</th>
            <th  class="text-center"><p style="font-size: 12px">ผู้ง่ายสินค้า<br>(Delivered)</p></th>
            <th>...........................................</th>
            <th  class="text-center"><p style="font-size: 12px">ผู้มีอำนาจลงนาม<br>(Authorized Signature)</p></th>
            <th>...........................................</th>
        </tr>
    </table>

</div>


<div id="f">
    <table style="width: 100%;border: 0px;margin: 0px" border="0">
        <thead>

            <tr>

                <th style="text-align: left;">
                    <p style="font-size: 18px;color: #123d71"> TopUp </p>
                    <p class="inv-email-address"><b>ที่อยู่จัดส่ง</b> <br>


                       {{ $order->name }}<br>

                        @if ($order->house_no)
                            {{ $order->house_no }}
                        @endif
                        @if ($order->moo != '-' and $order->moo != '')
                            หมู่.{{ $order->moo }}
                        @endif
                        @if ($order->house_name != '-' and $order->house_name != '')
                            หมู่บ้าน.{{ $order->house_name }}
                        @endif
                        @if ($order->soi != '-' and $order->soi != '')
                            ซอย.{{ $order->soi }}
                        @endif
                        @if ($order->road != '-' and $order->road != '')
                            ถนน.{{ $order->road }}
                        @endif
                        @if ($order->district != '-' and $order->district != '')
                            อำเภอ{{ $order->district }}
                        @endif
                        @if ($order->tambon != '-' and $order->tambon != '')
                            ตำบล{{ $order->tambon }}
                        @endif
                        <br>
                        @if ($order->province != '-' and $order->province != '')
                            จังหวัด{{ $order->province }}
                        @endif
                        @if ($order->zipcode)
                            {{ $order->zipcode }}
                        @endif

                        เบอร์โทรศัพท์ : {{ $order->tel }}

                    </p>

                </th>

            <th align="left">
                <h3 style="font-size: 18px;color: #123d71;" class="text-right">ใบเสร็จ<br><font style="font-size: 18px">สำเนา</font></h3>
                <p class="inv-list-number">
                    <span class="inv-title">เลขที่ใบเสร็จ : </span> <span class="inv-number">{{ $order->code_order }}</span><br>
                    <span class="inv-title">ชื่อ : </span><span class="inv-customer-name">{{ $order->name }}</span><br>

            <span class="inv-title">วันที่ชำระ : </span>
                <span class="inv-date">
                    @if ($order->approve_date)
                        {{ $order->approve_date }}
                    @endif
                </span>
            </p>


            </th>
            </tr>

        </thead>
    </table>

    <table style="width: 100%;border: 0px solid black;padding: 0px;margin: 0px" border="0">
        <thead class="">
            <tr>
               <td style="background-color:#a3a3a3;padding-left: 2px; width: 40%;><b style="color: #000;font-size: 14px;margin-left: 5px;margin-top: 0px;">รายละเอียด</b></td>
               <td style="background-color:#a3a3a3;padding-left: 2px; width: 20%;text-align: right"><b style="color: #000;font-size: 14px;margin-left: 5px;margin-top: 0px;">จำนวน</b></td>
               <td style="background-color:#a3a3a3;padding-left: 2px; width: 20%;text-align: right"><b style="color: #000;font-size: 14px;margin-left: 5px;margin-top: 0px;">PV/หน่วย</b></td>
               <td style="background-color:#a3a3a3;padding-left: 2px; width: 20%;text-align: right"><b style="color: #000;font-size: 14px;margin-left: 5px;margin-top: 0px;">รวม PV</b></td>
               <td style="background-color:#a3a3a3;padding-left: 2px;width: 20%;text-align: right"><b style="color: #000;font-size: 14px;margin-left: 5px;margin-top: 0px;">ราคา/หน่วย (บาท)</b></td>
               <td style="background-color:#a3a3a3;padding-left: 2px;width: 20%;text-align: right"><b style="color: #000;font-size: 14px;margin-left: 5px;margin-top: 0px;">Vat 7%</b></td>
               <td style="background-color:#a3a3a3;padding-left: 2px;width: 20%;text-align: right"><b style="color: #000;font-size: 14px;margin-left: 5px;margin-top: 0px;">รวม (บาท)</b></td>

            </tr>
        </thead>
        <tbody>

            @foreach($db_order_products_list as $value)
            <tr>

                <td>
                     {{$value->product_name}}
                </td>
                <td class="text-right">
                    {{number_format($value->amt)}}

                </td>
                <td class="text-right">
                    {{number_format($value->pv)}}

                </td>
                <td class="text-right">
                    {{number_format($value->total_pv)}}

                </td>
                <td class="text-right">
                    {{number_format($value->selling_price-$value->vat,2)}}

                </td>
                <td  class="text-right">
                    {{number_format($value->vat,2)}}
                </td>
                <td  class="text-right">
                    {{number_format($value->total_price,2)}}
                </td>
            </tr>
            @endforeach

            <tr>
                <td colspan="7"><div class="horizontal-line"></div></td>
            </tr>
            <tr>
                <td colspan="5" rowspan="1" ><p style="padding: 0px;margin: 0px;font-size: 13px">*บริษัทขอสงวนสิทธิ์ที่จะปฏิเสธการรับคืนสินค้าในกรณีที่สินค้าเสียหาย นอกเหนือจากความเสียหายที่เกิดจากการขนส่งเท่านั้น
                    <br>
                    *บิลรับเองโปรดรับสินค้าภายใน 7 วัน</p></td>
                    <td class="text-right">ราคาสินค้าไม่รวม Vat :<br>
                        รวม Vat 7% :

                    </td>
                    <td class="text-right"> {{number_format($order->sum_price,2)}}<br>
                        {{number_format($order->tax_total,2)}} </td>

            </tr>


            <tr>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>

                <td class="text-right">ค่าจัดส่ง :</td>
                <td class="text-right"> {{number_format($order->shipping_price,2)}} </td>

            </tr>

            <tr>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>



                <td class="text-right">ยอดรวม :</td>
                <td class="text-right"> {{number_format($order->total_price,2)}} </td>

            </tr>

        </tbody>
    </table>

    <table style="width: 100%;border: 0px solid black;padding: 0px;margin: 0px" border="0">
        <tr >
            <th class="text-center"><p style="font-size: 12px">ผู้รับเงิน<br>(Collector)</p></th>
            <th>...........................................</th>
            <th  class="text-center"><p style="font-size: 12px">ผู้รับสินค้า<br>(Received)</p></th>
            <th>...........................................</th>
            <th  class="text-center"><p style="font-size: 12px">ผู้ง่ายสินค้า<br>(Delivered)</p></th>
            <th>...........................................</th>
            <th  class="text-center"><p style="font-size: 12px">ผู้มีอำนาจลงนาม<br>(Authorized Signature)</p></th>
            <th>...........................................</th>
        </tr>
    </table>


    </table>


</div>
{{-- <p style="padding: 0px;margin: 0px;">*หากมีปัญหาเกี่ยวกับสินค้ากรุณาติตต่อบริษัทที่ท่านสั่งซื้อสินคำโดยตรงและหากหัสดุดีกลับกรุณานำส่ง ตามชื่อผู้ฝากส่งรายการสินค้า</p> --}}



</body>
<html>
