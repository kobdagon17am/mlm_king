<?php
use App\Http\Controllers\Frontend\TreeController;
?>
@extends('layouts.frontend.app')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/tree_new.css?v=2') }}">
<style>
.member-image img {
    width: 60 px;
    height: 60 px;
    border-radius: 50%;
    z-index: 1;
}
</style>
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
                                    <span>โครงสร้างขาาน</span>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div>

    <!-- Main Body Starts -->
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-lg-12 layout-spacing">
                <div class="statbox widget box box-shadow mb-4">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-md-8 ">
                                <div class="button-list">
                                    <a class="btn btn-success btn-sm btn-sm mt-2"
                                    href="{{ route('tree') }}" style="color: black;font-size: 16px;"><i class="las la-sort-user"></i>  <b class="font-primary">You</b></a>
                                @if ($data['lv1']->username == Auth::guard('c_user')->user()->username || $data['lv1']->upline_id == 'AA')
                                    <button class="btn btn-success btn-sm btn-disabled disabled mt-2"
                                        style="color: #FFF;font-size: 16px">
                                        <i class="las la-sort-numeric-up"></i> <b>Up one step</b></button>
                                @else

                                    <a href="#" onclick="event.preventDefault();
                    document.getElementById('upline_id').submit();" class="btn btn-success btn-sm mt-2"
                                        style=" color: #FFF;font-size: 16px"><i class="las la-sort-numeric-up"></i> <b>Up one step</b></a>
                                    <form id="upline_id" action="{{ route('tree') }}" method="POST"
                                        style="display: none;">
                                        <input type="hidden" name="username" value="{{ $data['lv1']->upline_id }}">
                                        @csrf
                                    </form>
                                @endif

                                @if (empty($data['lv2_a']) || empty($data['lv3_a_a']))
                                    <button class="btn btn-success btn-sm btn-disabled disabled mt-2"
                                        style="color: #FFF;font-size: 16px"><i class="las la-sort-down"></i> ดิ่งขาซ้าย</button>

                                @else
                                    <a href="#" onclick="event.preventDefault();
                    document.getElementById('under_a').submit();" class="btn btn-success btn-sm mt-2"
                                        style="color: #FFF;font-size:16px"><i class="las la-sort-down"></i> ดิ่งขาซ้าย</a>

                                    <form id="under_a" action="{{ route('under_a') }}" method="POST"
                                        style="display: none;">
                                        <input type="hidden" name="username" value="{{ $data['lv3_a_a']->username }}">
                                        @csrf
                                    </form>

                                @endif


                                @if (empty($data['lv2_b']) || empty($data['lv3_b_b']))
                                    <button class="btn btn-success btn-sm btn-disabled disabled mt-2"
                                        style="color: #FFF;font-size: 16px"><i class="las la-sort-down"></i> ดิ่งขาขวา </button>

                                @else
                                    <a href="#" onclick="event.preventDefault();
                    document.getElementById('under_b').submit();" class="btn btn-sm btn-success mt-2"
                                        style="color: #FFF;font-size: 16px"><i class="las la-sort-down"></i> ดิ่งขาขวา</a>

                                    <form id="under_b" action="{{ route('under_b') }}" method="POST"
                                        style="display: none;">
                                        <input type="hidden" name="username" value="{{ $data['lv3_b_b']->username }}">
                                        @csrf
                                    </form>
                                @endif
                                </div>


                            </div>
                            <div class="col-md-4 mt-2">
                                <div class="input-group input-group-button">
                                    <input type="text" class="form-control" style="text-transform: uppercase;" id="search_username" name="search_username"
                                        placeholder="Search ID" value="{{ old('search_username') }}">
                                    <span class="input-group-addon btn btn-success" id="basic-addon10"
                                        onclick="search_user()" style="margin-top: 0px;">
                                        <span class="">Search</span>
                                    </span>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">

                        <div class="structure">
                            <div class="body genealogy-body genealogy-scroll">
                                <div class="genealogy-tree">
                                    <ul>
                                        <li>
                                          <?php

                                            ?>
                                            @if ($data['lv1'])
                                                <a href="javascript:void(0);">
                                                    <div class="member-view-box">
                                                        <div class="member-image">

                                                         @if($data['lv1']->img)
                                                         <img onclick="modal_tree('{{ $data['lv1']->username }}')"
                                                                    src="{{ asset($data['lv1']->img) }}">
                                                         @else
                                                         <?php
                                                             $img_1 = TreeController::check_img($data['lv1']->qualification_id);

                                                          ?>
                                                                <img onclick="modal_tree('{{ $data['lv1']->username }}')"
                                                                    src="{{ $img_1['img'] }}">
                                                         @endif


                                                            <div class="member-detailsr">
                                                                <h6 class="mt-2">{{ $data['lv1']->username }}</h6>
                                                                <h6 class="text-primary">

                                                                        {{ @$data['lv1']->prefix_name . ' ' . @$data['lv1']->first_name . ' ' . @$data['lv1']->last_name }}

                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>

                                            @else
                                                <a href="javascript:void(0);">
                                                    <div class="member-view-box">
                                                        <div class="member-image">
                                                            <img src="frontend/assets/icon/add_user.png">
                                                        </div>
                                                    </div>
                                                </a>

                                            @endif


                                            <ul class="active">

                                            @for($i=1;$i<=2;$i++)
                                              <?php
                                              if($i==1){
                                               $data_lv2 =$data['lv2_a'];
                                               $model_lv2 = 'lv2_a';
                                               $type = 'a';
                                               $line_lv2 = 'ซ้าย';
                                               $line_lv2_add = 'A';
                                             }elseif($i==2){
                                               $data_lv2 =$data['lv2_b'];
                                               $model_lv2 = 'lv2_b';
                                               $type = 'b';
                                               $line_lv2 = 'ขวา';
                                               $line_lv2_add = 'B';
                                             }else{
                                               $data_lv2 = null;
                                               $model_lv2 = null;
                                               $line_lv2 = null;
                                               $line_lv2_add = null;
                                             }
                                             ?>

                                             @if($data_lv2)
                                            <li>
                                                    <a href="javascript:void(0);">
                                                        <div class="member-view-box">
                                                            <div class="member-image">

                                                                @if($data_lv2->img)
                                                                <img onclick="modal_tree('{{ $data_lv2->username }}')"
                                                                           src="{{ asset($data_lv2->img) }}">
                                                                @else
                                                                <?php

                                                                $img_2 = TreeController::check_img($data_lv2->qualification_id);

                                                               ?>

                                                                      <img onclick="modal_tree('{{ $data_lv2->username }}')"
                                                                      src="{{ $img_2['img'] }}">
                                                                @endif



                                                                    <div class="member-detailsr">
                                                                      <h6 class="mt-2">ขา{{$line_lv2}} : {{$data_lv2->username}}</h6>
                                                                      <h6 class="text-primary">
                                                                          {{$data_lv2->prefix_name.' '.$data_lv2->first_name.' '.$data_lv2->last_name }}
                                                                      </h6>
                                                                  </div>
                                                            </div>
                                                        </div>
                                                    </a>


                                                    <ul class="active">

                                                      @for($j=1;$j<=2;$j++)
                                                      <?php
                                                      if($j==1){
                                                       $data_lv3 =$data['lv3_'.$type.'_a'];
                                                       $model_lv3 = 'lv3_'.$type.'_a';
                                                       $line_lv3 = 'ซ้าย';
                                                       $type_v3 = 'a';
                                                       $line_lv3_add = 'A';
                                                     }elseif($j==2){
                                                       $data_lv3 =$data['lv3_'.$type.'_b'];
                                                       $model_lv3 = 'lv3_'.$type.'_b';
                                                       $line_lv3 = 'ขวา';
                                                       $type_v3 = 'b';
                                                       $line_lv3_add = 'B';
                                                     }else{
                                                       $data_lv3 = null;
                                                       $model_lv3 = null;
                                                       $line_lv3 = null;
                                                       $line_lv3_add = null;
                                                     }

                                                     ?>
                                                     @if($data_lv3)

                                                        <li>
                                                            <a href="javascript:void(0);">
                                                                <div class="member-view-box">
                                                                    <div class="member-image">

                                                                        @if($data_lv3->img)
                                                                        <img onclick="modal_tree('{{ $data_lv3->username }}')"
                                                                                   src="{{ asset($data_lv3->img) }}">
                                                                        @else
                                                                        <?php

                                                                        $img_3 = TreeController::check_img($data_lv3->qualification_id);

                                                                        ?>

                                                                        <img onclick="modal_tree('{{ $data_lv3->username }}')"
                                                                        src="{{ $img_3['img'] }}">
                                                                        @endif



                                                                    <div class="member-detailsr">
                                                                      <h6 class="mt-2">ขา{{$line_lv3}} : {{$data_lv3->username}}</h6>
                                                                      <h6 class="text-primary">
                                                                         {{$data_lv3->prefix_name.' '.$data_lv3->first_name.' '.$data_lv3->last_name }}
                                                                      </h6>
                                                                  </div>
                                                                    </div>
                                                                </div>
                                                            </a>

                                                            <ul class="active">

                                                              @for($k=1;$k<=2;$k++)
                                                              <?php

                                                              if($k==1){
                                                               $data_lv4 =$data['lv4_'.$type.'_'.$type_v3.'_a'];
                                                               $model_lv4 = 'lv4_'.$type.'_'.$type_v3.'_a';
                                                               $line_lv4 = 'ซ้าย';
                                                               $line_lv4_add = 'A';
                                                             }elseif($k==2){
                                                              $data_lv4 =$data['lv4_'.$type.'_'.$type_v3.'_b'];
                                                               $model_lv4 = 'lv4_'.$type.'_'.$type_v3.'_b';
                                                               $line_lv4 = 'ขวา';
                                                               $line_lv4_add = 'B';

                                                             }else{
                                                               $data_lv4 = null;
                                                               $model_lv4 = null;
                                                               $line_lv4 = null;
                                                               $line_lv4_add = null;
                                                             }


                                                             ?>
                                                             @if($data_lv4)

                                                                <li>
                                                                    <a href="javascript:void(0);">
                                                                        <div class="member-view-box">
                                                                            <div class="member-image">

                                                                                @if($data_lv4->img)
                                                                                <img onclick="modal_tree('{{ $data_lv4->username }}')"
                                                                                           src="{{ asset($data_lv4->img) }}">
                                                                                @else

                                                                              <?php

                                                                              $img_4 = TreeController::check_img($data_lv4->qualification_id);

                                                                              ?>

                                                                              <img onclick="modal_tree('{{ $data_lv4->username }}')"
                                                                              src="{{ $img_4['img'] }}">
                                                                                @endif



                                                                             <div class="member-detailsr last">
                                                                              <h6 class="mt-2"><span class="d-none d-md-inline-block">ขา{{$line_lv4}} :</span>  {{$data_lv4->username}}</h6>
                                                                              <h6 class="text-primary">
                                                                               <span class="d-none d-md-block">{{ $data_lv4->prefix_name.' '.$data_lv4->first_name.' '.$data_lv4->last_name }}</span>
                                                                               <span class="d-block d-md-none">
                                                                                 {{ $data_lv4->first_name }}
                                                                               </span>
                                                                              </h6>
                                                                          </div>

                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                              @else

                                                              <li>
                                                                <a href="javascript:void(0);">
                                                                  <div class="member-view-box">
                                                                      <div class="member-image">
                                                                          <img onclick="modal_add('{{$data_lv3->username}}','{{$line_lv4_add}}')" src="{{asset('frontend/assets/icon/add_user.png') }}">
                                                                           {{-- <img src="{{asset('frontend/assets/icon/add_user.png')}}"> --}}
                                                                          <div class="member-detailsr">
                                                                            <h6 class="f-w-600 mt-2 text-success">ขา{{$line_lv4}}</h6>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                              </a>

                                                            </li>

                                                              @endif
                                                              @endfor


                                                            </ul>
                                                        </li>


                                                      @else
                                                                  @if($data_lv2)
                                                                  <li>
                                                                    <a href="javascript:void(0);">
                                                                      <div class="member-view-box">
                                                                          <div class="member-image">
                                                                              <img onclick="modal_add('{{$data_lv2->username}}','{{$line_lv3_add}}')" src="{{asset('frontend/assets/icon/add_user.png')}}">
                                                                            {{-- <img src="{{asset('frontend/assets/icon/add_user.png')}}"> --}}
                                                                              <div class="member-detailsr">
                                                                                <h6 class="mt-2 text-success">ขา{{$line_lv3}} </h6>
                                                                                @if ($data['lv3_a_a'] || $data['lv3_b_a'])
                                                                                  <h6 class="invisible">fake</h6>
                                                                                @endif
                                                                              </div>
                                                                          </div>
                                                                      </div>
                                                                  </a>
                                                                      <ul class="active">
                                                                          <li>
                                                                            <a href="javascript:void(0);">
                                                                              <div class="member-view-box">
                                                                                  <div class="member-image">
                                                                                      <img src="{{asset('frontend/assets/icon/add_user_not.png')}}">
                                                                                    <div class="member-detailsr">
                                                                                      <h6 class="f-w-600 mt-2 text-success">ขาซ้าย</h6>
                                                                                    </div>
                                                                                  </div>
                                                                              </div>
                                                                          </a>
                                                                        </li>
                                                                        <li>
                                                                          <a href="javascript:void(0);">
                                                                            <div class="member-view-box">
                                                                                <div class="member-image">
                                                                                    <img src="{{asset('frontend/assets/icon/add_user_not.png')}}">
                                                                                    <div class="member-detailsr">
                                                                                      <h6 class="f-w-600 mt-2 text-success">ขาขวา</h6>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                      </li>
                                                                      </ul>
                                                                </li>


                                                                @else
                                                                <li>
                                                                  <a href="javascript:void(0);">
                                                                    <div class="member-view-box">
                                                                        <div class="member-image">
                                                                            <img   src="{{asset('frontend/assets/icon/add_user_not.png')}}">
                                                                            <div class="member-detailsr">
                                                                              <h6 class="f-w-600 mt-2 text-success">ขา{{$line_lv3}}</h6>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                              </li>

                                                                @endif

                                                      @endif
                                                      @endfor



                                                    </ul>
                                                  </li>

                                              @else
                                            <li>
                                              <a href="javascript:void(0);">
                                                <div class="member-view-box">
                                                    <div class="member-image">
                                                        <img onclick="modal_add('{{ $data['lv1']->username }}','{{ $line_lv2_add }}')" src="{{asset('frontend/assets/icon/add_user.png')}}">
                                                        {{-- <img src="{{asset('frontend/assets/icon/add_user.png')}}"> --}}
                                                        <div class="member-detailsr">
                                                          <h6 class="f-w-600 mt-2 text-success">ขา{{$line_lv2}}</h6>
                                                          <h6 class="text-muted">ภายใต้ :  {{@$data['lv1']->prefix_name.' '.@$data['lv1']->first_name.' '.@$data['lv1']->last_name }} </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>

                                            <ul class="active">
                                              <li>
                                                <a href="javascript:void(0);">
                                                  <div class="member-view-box">
                                                      <div class="member-image">
                                                          <img src="{{asset('frontend/assets/icon/add_user_not.png')}}">
                                                          <div class="member-detailsr">
                                                            <h6 class="f-w-600 mt-2 text-success">ขาซ้าย</h6>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </a>
                                              <ul class="active">
                                                <li>
                                                  <a href="javascript:void(0);">
                                                    <div class="member-view-box">
                                                        <div class="member-image">
                                                            <img src="{{asset('frontend/assets/icon/add_user_not.png')}}">
                                                            <div class="member-detailsr">
                                                              <h6 class="f-w-600 mt-2 text-success">ขาซ้าย</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                              </li>
                                              <li>
                                                <a href="javascript:void(0);">
                                                  <div class="member-view-box">
                                                      <div class="member-image">
                                                          <img src="{{asset('frontend/assets/icon/add_user_not.png')}}">
                                                          <div class="member-detailsr">
                                                            <h6 class="f-w-600 mt-2 text-success">ขาขวา</h6>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </a>
                                            </li>
                                            </ul>
                                            </li>
                                            <li>
                                              <a href="javascript:void(0);">
                                                <div class="member-view-box">
                                                    <div class="member-image">
                                                        <img src="{{asset('frontend/assets/icon/add_user_not.png')}}">
                                                        <div class="member-detailsr">
                                                          <h6 class="f-w-600 mt-2 text-success">ขาขวา</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>

                                            <ul class="active">
                                              <li>
                                                <a href="javascript:void(0);">
                                                  <div class="member-view-box">
                                                      <div class="member-image">
                                                          <img src="{{asset('frontend/assets/icon/add_user_not.png')}}">
                                                          <div class="member-detailsr">
                                                            <h6 class="f-w-600 mt-2 text-success">ขาซ้าย</h6>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </a>

                                            </li>
                                            <li>
                                              <a href="javascript:void(0);">
                                                <div class="member-view-box">
                                                    <div class="member-image">
                                                        <img src="{{asset('frontend/assets/icon/add_user_not.png')}}">
                                                        <div class="member-detailsr">
                                                          <h6 class="f-w-600 mt-2 text-success">ขาขวา</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                          </li>
                                          </ul>
                                          </li>
                                          </ul>
                                          </li>


                                              @endif
                                          @endfor

                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                    {{-- <div class="widget-footer text-right">
                        <button type="reset" class="btn btn-success mr-2">Submit</button>
                        <button type="reset" class="btn btn-outline-primary">Cancel</button>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- Main Body Ends -->
</div>


<div id="modal_tree"></div>
<div id="modal_add"></div>

<form action="{{ route('search') }}" method="post" id="home_search">
    @csrf
    <input type="hidden" id="home_search_id" name="home_search_id" value="">
</form>
@endsection
@section('js')
<script>
    // document.getElementById("lv1_anchor ").classList.remove("");

    function modal_tree(username){

$.ajax({
  url: '{{ route('modal_tree') }}',
  type: 'GET',
  data: {username:username},
})
.done(function(data) {
  console.log("success");
  $('#modal_tree').html(data);
  $('#modal_tree_show').modal('show');
})
.fail(function() {
  console.log("error");
})
.always(function() {
  console.log("complete");
});

}

    function modal_add(username, type) {
        $.ajax({
                url: '{{ route('modal_add_tree') }}',
                type: 'GET',
                data: {
                  username: username,
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

    function search_user(){
      var username = $('#search_username').val();
      $.ajax({
        url: '{{ route('home_check_customer_id') }}',
        type: 'GET',
        data: {username:username},
      })
      .done(function(data) {
        if(data['status'] == 'success'){
          //alert(data['data'])

          $('#home_search_id').val(data['username']);
          document.getElementById("home_search").submit();

        }else{
          console.log();
          Swal.fire({
            icon: 'error',
            title: data['data']['message'],
          })

        }
        //console.log("success");
        //console.log(data);
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
