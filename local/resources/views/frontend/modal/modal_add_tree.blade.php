<div class="modal fade" id="modal_add_show" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">สมัครสมาชิก </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>
            <b>ผู้แนะนำ :</b> {{$data->prefix_name.' '.$data->first_name.' '.$data->last_name }} รหัส {{$data->username}} <br>
            @if($type == 'A')
            <?php
             $line = 'ซ้าย';
            ?>

            @else
            <?php
            $line = 'ขวา';
           ?>
            @endif

            <b>ฝั่งขา </b>: {{ $line }} <br>
        </p>
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
        <a href="{{route('Register',['username'=>$data->username,'line_type'=>$type,'type'=>'orther','sponser'=>$data->username])}}" type="button" class="btn btn-primary waves-effect waves-light ">สมัครทั่วไป</a>
        <a href="{{route('Register',['username'=>$data->username,'line_type'=>$type,'type'=>'warehouse','sponser'=>$data->username])}}" type="button" class="btn btn-primary waves-effect waves-light ">สมัครคลัง</a>

      </div>
    </div>
  </div>
</div>
