<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Kingthong Baiyok</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('frontend/assets/img/favicon.ico') }}"/>
    <link href="{{ asset('frontend/assets/css/loader.css') }}" rel="stylesheet" type="text/css" />
        <!-- Common Styles Starts -->
    <link href="{{ asset('frontend/assets/css/style.css')}}" rel="stylesheet" type="text/css" />
    {{-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet"> --}}
    <link href="{{ asset('frontend/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend/assets/css/main.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend/assets/css/structure.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend/plugins/highlight/styles/monokai-sublime.css') }}" rel="stylesheet" type="text/css" />
    <!-- Common Styles Ends -->
    <!-- Common Icon Starts -->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">


    {{-- <link href="{{ asset('frontend/plugins/animate/animate.css') }}" rel="stylesheet" type="text/css" /> --}}
    <script src="{{ asset('frontend/plugins/sweetalerts/promise-polyfill.js') }}"></script>
    <link href="{{ asset('frontend/plugins/sweetalerts/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend/plugins/sweetalerts/sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend/assets/css/basic-ui/custom_sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <style>
  
  .nav-item.dropdown.notification-dropdown .blink {
    position: relative;
    
    width: 17px; /* เปลี่ยนขนาดของกล่องแจ้งเตือน */
    height: 17px; /* เปลี่ยนขนาดของกล่องแจ้งเตือน */
    background-color: red; /* เปลี่ยนสีของกล่องแจ้งเตือน */
    border-radius: 50%; /* ทำให้มีรูปร่างเป็นวงกลม */
    display: flex;
    justify-content: center;
    align-items: center;
}
    </style>
    @yield('css')
</head>
<body>
    <!-- Loader Starts -->
    <div id="load_screen">
        <div class="boxes">
            <div class="box">
                <div></div><div></div><div></div><div></div>
            </div>
            <div class="box">
                <div></div><div></div><div></div><div></div>
            </div>
            <div class="box">
                <div></div><div></div><div></div><div></div>
            </div>
            <div class="box">
                <div></div><div></div><div></div><div></div>
            </div>
        </div>
        {{-- <p class="xato-loader-heading">Xato</p> --}}
    </div>
    <!--  Loader Ends -->
    <!--  Navbar Starts  -->
    <div class="header-container fixed-top" style="background-color: #ffff;">
        <header class="header navbar navbar-expand-sm">
            <ul class="navbar-item theme-brand flex-row  text-center">
                <li class="nav-item theme-logo" style="">
                    <a href="{{route('home')}}">
                        <img src="{{ asset('frontend/assets/img/logo/Kingthong-Baiyok-Logo.png')}}" class="navbar-logo" alt="logo" >
                    </a>
                </li>
                <li class="nav-item theme-text">
                    {{-- <a href="index.html" class="nav-link"> Xato </a> --}}
                </li>
            </ul>

            <ul class="navbar-item flex-row ml-md-auto">
                {{-- <li class="nav-item dropdown fullscreen-dropdown d-none d-lg-flex">
                    <a class="nav-link full-screen-mode" href="javascript:void(0);">
                        <i class="las la-compress" id="fullScreenIcon"></i>
                    </a>
                </li> --}}
                <li class="nav-item dropdown language-dropdown">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="language-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="las la-language"></i>
                    </a>
                    <div class="dropdown-menu position-absolute" aria-labelledby="language-dropdown">
                        <a class="dropdown-item d-flex" href="javascript:void(0);">
                            <img src="{{ asset('frontend/assets/img/flag/usa-flag.png')}}" class="flag-width" alt="flag">
                            <span class="align-self-center">&nbsp;English</span>
                        </a>
                       
                    </div>
                </li>
              
                <li class="nav-item dropdown notification-dropdown">
                    <a href="{{ route('Cart') }}" class="nav-link dropdown-toggle position-relative" id="order" >
                        
                        <i class="las la-shopping-cart"> </i>
                        
                        <div class="blink " style="top: -9px;right: 8px;">
                            
                 
                            <b class="" style="font-size: 12px;color: white;" id="count_cart"> {{Cart::session(1)->getTotalQuantity() }}</b>
                        
                             
                        </div>
                    </a>
                     
                </li>
                 
                <li class="nav-item dropdown user-profile-dropdown">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <img class="rounded-circle img-thumbnail" src="{{ asset('frontend/assets/img/profile-16.jpg') }}" alt="avatar">
                    </a>
                    <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                        <div class="nav-drop is-account-dropdown">
                            <div class="inner">
                                <div class="nav-drop-body account-items pb-0">
                                    <a id="profile-link" class="account-item" href="{{ asset('Profile')}}">
                                        <div class="media align-center">
                                            <div class="media-left">
                                                <div class="image">
                                                    <img class="rounded-circle avatar-xs"
                                                        src="{{ asset('frontend/assets/img/profile-16.jpg') }}"
                                                        alt="">
                                                </div>
                                            </div>
                                            <div class="media-content ml-3">
                                                <span class="text-primary font-15"><b>{{ Auth::guard('c_user')->user()->first_name }} ({{ Auth::guard('c_user')->user()->username }})</b></span>
                                            </div>
                                            <div class="media-right">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="account-item" href="{{ asset('ChangeAccount')}}">
                                        <div class="media align-center">
                                            <div class="icon-wrap">
                                                <i class="las la-clone font-20"></i>
                                            </div>
                                            <div class="media-content ml-3">
                                                <h6 class="font-14 mb-0">สลับบัญชี</h6>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="account-item" href="{{ asset('Coupon')}}">
                                        <div class="media align-center">
                                            <div class="icon-wrap">
                                                <i class="las la-money-check font-20"></i>
                                            </div>
                                            <div class="media-content ml-3">
                                                <h6 class="font-14 mb-0">โค้ดคูปอง</h6>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="account-item" href="{{ asset('ProfileUpload')}}">
                                        <div class="media align-center">
                                            <div class="icon-wrap">
                                                <i class="las la-image font-20"></i>
                                            </div>
                                            <div class="media-content ml-3">
                                                <h6 class="font-14 mb-0">อัพโหลดรูปโปรไฟล์</h6>
                                            </div>
                                        </div>
                                    </a>


                                    <a class="account-item" href="{{ asset('Profile')}}">
                                        <div class="media align-center">
                                            <div class="icon-wrap">
                                                <i class="las la-user-edit font-20"></i>
                                            </div>
                                            <div class="media-content ml-3">
                                                <h6 class="font-14 mb-0">แก้ไขข้อมูลส่วนตัว</h6>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="account-item" settings href="{{ asset('Document')}}">
                                        <div class="media align-center">
                                            <div class="icon-wrap">
                                                <i class="las la-clipboard font-20"></i>
                                            </div>
                                            <div class="media-content ml-3">
                                                <h6 class="font-14 mb-0">เอกสารการลงทะเบียน</h6>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="account-item" href="{{ asset('ChangePassword')}}">
                                        <div class="media align-center">
                                            <div class="icon-wrap">
                                                <i class="las la-key font-20"></i>
                                            </div>
                                            <div class="media-content ml-3">
                                                <h6 class="font-14 mb-0">แก้ไขรหัส Login</h6>
                                            </div>
                                        </div>
                                    </a>
                                    <hr class="account-divider">
                                    <a class="account-item" href="{{ route('logout') }}">
                                        <div class="media align-center">
                                            <div class="icon-wrap">
                                                <i class="las la-sign-out-alt font-20"></i>
                                            </div>
                                            <div class="media-content ml-3">
                                                <h6 class="font-14 mb-0 ">Logout</h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            {{-- <ul class="navbar-item flex-row">
                <li class="nav-item dropdown header-setting">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle rightbarCollapse" data-placement="bottom">
                        <i class="las la-sliders-h"></i>
                    </a>
                </li>
            </ul> --}}
        </header>
    </div>

    <!--  Navbar Ends  -->
    <!--  Main Container Starts  -->
    <div class="main-container" id="container">
        <div class="overlay"></div>
        <div class="search-overlay"></div>
        <div class="rightbar-overlay"></div>
        <!--  Sidebar Starts  -->
        @include('layouts.frontend.sidebar')
        @yield('content')
        <!--  Sidebar Ends  -->
        <!--  Content Area Starts  -->

        <!--  Content Area Ends  -->
        <!--  Rightbar Area Starts -->
        <div class="right-bar">
            <div class="h-100">
                <div class="simplebar-wrapper" style="margin: 0px;">
                    <div class="simplebar-mask">
                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                            <div class="simplebar-content-wrapper" style="height: 100%;">
                                <div class="simplebar-content" style="padding: 0px;">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs nav-bordered nav-justified" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link  active" data-toggle="tab" href="#chat-tab" role="tab" aria-selected="true">
                                                <i class="las la-sms"></i>
                                            </a>
                                        </li>

                                    </ul>
                                    <!-- Tab panes starts -->
                                    <div class="tab-content pt-0 rightbar-tab-container">
                                        <div class="tab-pane active rightbar-tab" id="chat-tab" role="tabpanel">
                                            <form class="search-bar p-3">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control search-form-control" placeholder="Search">
                                                    <span class="mdi mdi-magnify"></span>
                                                </div>
                                            </form>



                                        </div>

                                    </div>
                                    <!-- Tab panes ends -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  Rightbar Area Ends -->
    </div>
    <!-- Main Container Ends -->
    <!-- Common Script Starts -->
    <script src="{{ asset('frontend/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('frontend/bootstrap//js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/bootstrap//js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins//perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/app.js') }}"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{ asset('frontend/assets/js/custom.js') }}"></script>
    <!-- Common Script Ends -->
    <script src="{{ asset('frontend/assets/js/loader.js') }}"></script>

    <script src="{{ asset('frontend/plugins/sweetalerts/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/basicui/sweet_alerts.js') }}"></script>
    @include('layouts.frontend.flash-message')


    @yield('js')
</body>
</html>


