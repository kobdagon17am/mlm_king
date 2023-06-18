<?php

use App\Helpers\Frontend;
use App\Models\Frontend\MonthPv;

?>
<div class="modal fade" id="modal_tree_show" tabindex="-1" role="dialog">
 <div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
   <div class="modal-header">
    <h4 class="modal-title">  {{$user->prefix_name.' '.$user->first_name.' '.$user->last_name }} ({{$user->username}})</h4>

    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
   </button>
 </div>


 <div class="modal-body text-left">
  <div class="table-responsive">
   <table class="table">
    <tbody>
     <tr class="table-success">
      <td><strong>วันที่สมัคร </strong></td>
      <td>{{ date('d/m',strtotime($user->regis_date_doc)) }}/{{  date('Y',strtotime($user->regis_date_doc))+543 }}</td>
      <td></td>
    </tr>
    <tr>
      <td><strong>ผู้แนะนำ  </strong></td>
      <td>
        @if($introduce)
        {{$introduce->prefix_name.' '.$introduce->first_name.' '.$introduce->last_name }} ({{$introduce->username}})
        @else
         -
        @endif
         </td>
      <td></td>
    </tr>
    <tr class="table-success">
      <td><strong>คะแนน Pv สะสม:</strong></td>
      <td>{{ number_format($user->pv_all) }} PV</td>
      <td></td>

    </tr>

    <tr class="table-success">
      <td><strong>คะแนน Pv รายเดือน:</strong></td>
      <td>{{ number_format($user->pv) }} PV</td>
      <td></td>

    </tr>


    <tr>
      <td><strong>ตำแหน่ง</strong></td>
      <td>@if($user->business_qualifications) {{$user->business_qualifications}} @else - @endif </td>
      <td>  </td>
    </tr>

    <tr>
      <td><strong>ตำแหน่งเกียรติยศ</strong></td>
      <td>@if($user->dt_package) {{$user->dt_package}} @else - @endif </td>
      <td>  </td>
    </tr>

    <tr>
      <td><strong>คุณสมบัติรายเดือน Active ถึง</strong></td>
      <td>@if(empty($user->pv_mt_active))
        -
        @else
        {{ date('d/m',strtotime($user->pv_mt_active)) }}/{{  date('Y',strtotime($user->pv_mt_active))+543 }}
      @endif </td>
      <td>[เหลือ {{ number_format($user->pv_mt) }} PV]</td>
    </tr>


  </tbody>
</table>
</div>

</div>

<div class="modal-footer">
  <p class="m-b-0 text-left" style="font-size: 12px"> ข้อมูลวันที่ :{{ date('d/m') }} / {{  date('Y')+543 }}</p>
  <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">ปิด</button>
  <button type="button"  onclick="event.preventDefault();
  document.getElementById('line_id_v1').submit();" class="btn btn-primary waves-effect waves-light ">ดูสายงาน</button>
  <form id="line_id_v1" action="{{route('tree')}}" method="POST" style="display: none;">
    <input type="hidden" name="username" value="{{$user->username}}">
    @csrf
  </form>


</div>

</div>
</div>
</div>
