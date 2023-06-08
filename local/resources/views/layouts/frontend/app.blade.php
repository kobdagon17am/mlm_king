<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Xato Blank Page | Xato - Multipurpose Bootstrap Admin Dashboard Template </title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}"/>

    <link href="{{ asset('assets/css/loader.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('assets/js/loader.js') }}"></script>
    <!-- Common Styles Starts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/structure.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/highlight/styles/monokai-sublime.css') }}" rel="stylesheet" type="text/css" />
    <!-- Common Styles Ends -->
    <!-- Common Icon Starts -->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link href="{{ asset('assets/css/loader.css')}}" rel="stylesheet" type="text/css" />
    @yield('css')
</head>

<body>
    <!-- Loader Starts -->
    <div id="load_screen">
        <div class="boxes">
            <div class="box">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div class="box">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div class="box">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div class="box">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        {{-- <p class="xato-loader-heading">Xato</p> --}}
    </div>
    <!--  Loader Ends -->
    <!--  Navbar Starts  -->
    <div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm">
            <ul class="navbar-item theme-brand flex-row  text-center">
                <li class="nav-item theme-logo">
                    <a href="{{route('home')}}">
                        <img src="{{ asset('assets/img/logo.png') }}" class="navbar-logo" alt="logo">
                    </a>
                </li>
                <li class="nav-item theme-text">
                    <a href="{{route('home')}}" class="nav-link"> Xato </a>
                </li>
            </ul>
            <ul class="navbar-item flex-row ml-md-auto">
                {{-- <li class="nav-item dropdown fullscreen-dropdown d-none d-lg-flex">
                    <a class="nav-link full-screen-mode" href="javascript:void(0);">
                        <i class="las la-compress" id="fullScreenIcon"></i>
                    </a>
                </li> --}}
                {{-- <li class="nav-item dropdown language-dropdown">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="language-dropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="las la-language"></i>
                    </a>
                    <div class="dropdown-menu position-absolute" aria-labelledby="language-dropdown">
                        <a class="dropdown-item d-flex" href="javascript:void(0);">
                            <img src="{{ asset('assets/img/flag/usa-flag.png') }}" class="flag-width" alt="flag">
                            <span class="align-self-center">&nbsp;English</span>
                        </a>
                        <a class="dropdown-item d-flex" href="javascript:void(0);">
                            <img src="{{ asset('assets/img/flag/spain-flag.png') }}" class="flag-width" alt="flag">
                            <span class="align-self-center">&nbsp;Spanish</span>
                        </a>
                        <a class="dropdown-item d-flex" href="javascript:void(0);">
                            <img src="{{ asset('assets/img/flag/france-flag.png') }}" class="flag-width"
                                alt="flag">
                            <span class="align-self-center">&nbsp;French</span>
                        </a>
                        <a class="dropdown-item d-flex" href="javascript:void(0);">
                            <img src="{{ asset('assets/img/flag/saudi-arabia-flag.png') }}" class="flag-width"
                                alt="flag">
                            <span class="align-self-center">&nbsp;Arabic</span>
                        </a>
                    </div>
                </li> --}}
                <li class="nav-item dropdown message-dropdown">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="messageDropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="las la-envelope"></i>
                    </a>
                    <div class="dropdown-menu position-absolute" aria-labelledby="messageDropdown">
                        <div class="nav-drop is-notification-dropdown">
                            <div class="inner">
                                <div class="nav-drop-header">
                                    <span class="text-black font-12 strong">3 new mails</span>
                                    <a class="text-muted font-12" href="#">
                                        Mark all read
                                    </a>
                                </div>
                                <div class="nav-drop-body account-items pb-0">
                                    <a class="account-item">
                                        <div class="media">
                                            <div class="user-img">
                                                <img class="rounded-circle avatar-xs" src="assets/img/profile-11.jpg"
                                                    alt="profile">
                                            </div>
                                            <div class="media-body">
                                                <div class="">
                                                    <h6 class="text-primary font-13 mb-0 strong">Jennifer Queen</h6>
                                                    <p class="m-0 mt-1 font-10 text-muted">Permission Required</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="account-item marked-read">
                                        <div class="media">
                                            <div class="user-img">
                                                <img class="rounded-circle avatar-xs" src="assets/img/profile-10.jpg"
                                                    alt="profile">
                                            </div>
                                            <div class="media-body">
                                                <div class="">
                                                    <h6 class="text-primary font-13 mb-0 strong">Lara Smith</h6>
                                                    <p class="m-0 mt-1 font-10 text-muted">Invoice needed</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="account-item marked-read">
                                        <div class="media">
                                            <div class="user-img">
                                                <img class="rounded-circle avatar-xs" src="assets/img/profile-9.jpg"
                                                    alt="profile">
                                            </div>
                                            <div class="media-body">
                                                <div class="">
                                                    <h6 class="text-primary font-13 mb-0 strong">Victoria Williamson
                                                    </h6>
                                                    <p class="m-0 mt-1 font-10 text-muted">Account need to be synced
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <hr class="account-divider">
                                    <div class="text-center">
                                        <a class="text-primary strong font-13" href="apps_mail.html">View All</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown notification-dropdown">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle position-relative"
                        id="notificationDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="las la-bell"></i>
                        <div class="blink">
                            <div class="circle"></div>
                        </div>
                    </a>
                    <div class="dropdown-menu position-absolute" aria-labelledby="notificationDropdown">
                        <div class="nav-drop is-notification-dropdown">
                            <div class="inner">
                                <div class="nav-drop-header">
                                    <span class="text-black font-12 strong">5 Notifications</span>
                                    <a class="text-muted font-12" href="#">
                                        Clear All
                                    </a>
                                </div>
                                <div class="nav-drop-body account-items pb-0">
                                    <a class="account-item" href="apps_ecommerce_orders.html">
                                        <div class="media align-center">
                                            <div class="icon-wrap">
                                                <i class="las la-box font-20"></i>
                                            </div>
                                            <div class="media-content ml-3">
                                                <h6 class="font-13 mb-0 strong">2 New orders placed</h6>
                                                <p class="m-0 mt-1 font-10 text-muted">10 sec ago</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="account-item" href="javascript:void(0)">
                                        <div class="media align-center">
                                            <div class="icon-wrap">
                                                <i class="las la-user-plus font-20"></i>
                                            </div>
                                            <div class="media-content ml-3">
                                                <h6 class="font-13 mb-0 strong">New User registered</h6>
                                                <p class="m-0 mt-1 font-10 text-muted">5 minute ago</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="account-item" href="apps_tickets.html">
                                        <div class="media align-center">
                                            <div class="icon-wrap">
                                                <i class="las la-grin-beam font-20"></i>
                                            </div>
                                            <div class="media-content ml-3">
                                                <h6 class="font-13 mb-0 strong">21 Queries solved</h6>
                                                <p class="m-0 mt-1 font-10 text-muted">1 hour ago</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="account-item" href="javascript:void(0)">
                                        <div class="media align-center">
                                            <div class="icon-wrap">
                                                <i class="las la-cloud-download-alt font-20"></i>
                                            </div>
                                            <div class="media-content ml-3">
                                                <h6 class="font-13 mb-0 strong">New update available</h6>
                                                <p class="m-0 mt-1 font-10 text-muted">1 day ago</p>
                                            </div>
                                        </div>
                                    </a>
                                    <hr class="account-divider">
                                    <div class="text-center">
                                        <a class="text-primary strong font-13" href="pages_notifications.html">View
                                            All</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown user-profile-dropdown">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <img src="{{ asset('assets/img/profile-16.jpg') }}" alt="avatar">
                    </a>
                    <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                        <div class="nav-drop is-account-dropdown">
                            <div class="inner">
                                <div class="nav-drop-body account-items pb-0">
                                    <a id="profile-link" class="account-item" href="pages_profile.html">
                                        <div class="media align-center">
                                            <div class="media-left">
                                                <div class="image">
                                                    <img class="rounded-circle avatar-xs"
                                                        src="{{ asset('assets/img/profile-16.jpg') }}"
                                                        alt="">
                                                </div>
                                            </div>
                                            <div class="media-content ml-3">
                                                <span class="text-primary font-15">กิ่งทองใบหยก</span>
                                            </div>
                                            <div class="media-right">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="account-item" href="pages_profile.html">
                                        <div class="media align-center">
                                            <div class="icon-wrap">
                                                <i class="las la-image font-20"></i>
                                            </div>
                                            <div class="media-content ml-3">
                                                <h6 class="font-13 mb-0 strong">อัพโหลดรูปโปรไฟล์</h6>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="account-item" href="pages_timeline.html">
                                        <div class="media align-center">
                                            <div class="icon-wrap">
                                                <i class="las la-edit font-20"></i>
                                            </div>
                                            <div class="media-content ml-3">
                                                <h6 class="font-13 mb-0 strong">แก้ไขข้อมูลส่วนตัว</h6>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="account-item settings">
                                        <div class="media align-center">
                                            <div class="icon-wrap">
                                                <i class="las la-clipboard font-20"></i>
                                            </div>
                                            <div class="media-content ml-3">
                                                <h6 class="font-13 mb-0 strong">เอกสารการลงทะเบียน</h6>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="account-item" href="auth_lock_screen_3.html">
                                        <div class="media align-center">
                                            <div class="icon-wrap">
                                                <i class="lab la-expeditedssl font-20"></i>
                                            </div>
                                            <div class="media-content ml-3">
                                                <h6 class="font-13 mb-0 strong">แก้ไขรหัส Login</h6>
                                            </div>
                                        </div>
                                    </a>
                                    <hr class="account-divider">
                                    <a class="account-item" href="auth_login_3.html">
                                        <div class="media align-center">
                                            <div class="icon-wrap">
                                                <i class="las la-sign-out-alt font-20"></i>
                                            </div>
                                            <div class="media-content ml-3">
                                                <h6 class="font-13 mb-0 strong ">Logout</h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
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
        <!--  Sidebar Ends  -->
        <!--  Content Area Starts  -->
        @yield('content')


    </div>
    <!-- Main Container Ends -->
    <!-- Common Script Starts -->
    <script src="{{ asset('assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <!-- Common Script Ends -->
    <!-- Page Level Plugin/Script Starts -->
    <script src="{{ asset('assets/js/loader.js') }}"></script>
    <script src="{{ asset('plugins/apex/apexcharts.min.js') }}"></script>
    <script src="{{ asset('plugins/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard/dashboard_1.js') }}"></script>
    <!-- Page Level Plugin/Script Ends -->
</body>

</html>
