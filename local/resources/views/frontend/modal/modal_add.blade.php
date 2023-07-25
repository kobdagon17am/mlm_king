<div class="modal fade" id="modal_add_show" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">เพิ่ม {{ $type }}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5>เพิ่ม {{ $type }}</h5>
        <p>ภายใต้  {{$data->prefix_name.' '.$data->first_name.' '.$data->last_name }}  </p>
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
        {{-- <a href="{{route('Register',['id'=>$data->username,'line_type'=>$type])}}" type="button" class="btn btn-primary waves-effect waves-light ">Add</a> --}}
        <a href="{{route('Register',['username'=>$data->username,'line_type'=>$type])}}" type="button" class="btn btn-primary waves-effect waves-light ">Add</a>

      </div>
    </div>
  </div>
</div>
