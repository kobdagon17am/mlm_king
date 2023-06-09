<div class="menubar-wrapper menubar-theme">
    <nav id="sidebar">
        <ul class="list-unstyled menu-categories" id="accordionExample">

            <li class="menu main-single-menu">
                <a href="{{route('admin/Dashboard')}}" aria-expanded="true" class="dropdown-toggle" >
                    <div class="">
                        <i class="las la-home"></i>
                        <span>หน้าหลัก</span>
                    </div>
                </a>
            </li>


            <li class="menu main-single-menu">
                <a href="#a1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i class="las la-user-alt"></i>
                        <span> ระบบบริการสมาชิก </span>
                    </div>
                    <div>
                        <i class="las la-angle-right sidemenu-right-icon"></i>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="a1" data-parent="#accordionExample">
                    <li>
                        <a href="{{route('admin/MemberRegister')}}"> ระบบบริการสมาชิก </a>
                    </li>
                    <li>
                        <a href="{{route('admin/MemberDocument')}}"> ระบบตรวจสอบเอกสาร </a>
                    </li>
                    <li>
                        <a href="{{route('admin/HistoryDocument')}}"> ประวัติการตรวจสอบเอกสาร </a>
                    </li>
                </ul>
            </li>


            <li class="menu main-single-menu">
                <a href="#a2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i class="las la-shopping-cart"></i>
                        <span> ระบบสินค้า </span>
                    </div>
                    <div>
                        <i class="las la-angle-right sidemenu-right-icon"></i>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="a2" data-parent="#accordionExample">
                    <li>
                        <a href="{{route('admin/Products')}}"> สินค้า </a>
                    </li>
                    
                    <li>
                        <a href="#"> สินค้าโปรโมชั่น </a>
                    </li>
                    <li>
                        <a href="#"> คูปองโปรโมชั่น </a>
                    </li>
                    <li>
                        <a href="{{route('admin/Category')}}"> หมวดสินค้า </a>
                    </li>
                    <li>
                        <a href="{{route('admin/Unit')}}"> หน่วยสินค้า </a>
                    </li>
                </ul>
            </li>
            <li class="menu main-single-menu">
                <a href="#a3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i class="las la-hand-holding-usd"></i>
                        <span> ระบบขาย </span>
                    </div>
                    <div>
                        <i class="las la-angle-right sidemenu-right-icon"></i>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="a3" data-parent="#accordionExample">
                    <li>
                        <a href="#"> สินค้ารอจัดส่ง </a>
                    </li>
                    <li>
                        <a href="#"> สถานะสินค้าจัดส่ง </a>
                    </li>
                </ul>
            </li>
            <li class="menu main-single-menu">
                <a href="#a4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i class="las la-certificate"></i>
                        <span> ระบบคอมมิสชั่น </span>
                    </div>
                    <div>
                        <i class="las la-angle-right sidemenu-right-icon"></i>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="a4" data-parent="#accordionExample">
                    <li>
                        <a href="#"> รายงานรายสัปดาห์ </a>
                    </li>
                    <li>
                        <a href="#"> รายงานรายเดือน </a>
                    </li>
                    <li>
                        <a href="#"> อัปโหลดใบทวิ 50 </a>
                    </li>
                </ul>
            </li>
            <li class="menu main-single-menu">
                <a href="#a5" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i class="las la-user-lock"></i>
                        <span> ระบบความปลอดภัย </span>
                    </div>
                    <div>
                        <i class="las la-angle-right sidemenu-right-icon"></i>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="a5" data-parent="#accordionExample">
                    <li>
                        <a href="#"> เปลี่ยนแปลงรหัสผ่าน </a>
                    </li>
                    <li>
                        <a href="#"> ยกเลิกรหัส </a>
                    </li>
                </ul>
            </li>
            <li class="menu main-single-menu">
                <a href="#a6" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i class="las la-user-cog"></i>
                        <span> การตั้งค่าระบบทั่วไป </span>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="a6" data-parent="#accordionExample">
                    <li>
                        <a href="{{route('admin/Branch')}}"> ข้อมูลสาขาบริษัท </a>
                    </li>
                    {{-- <li>
                        <a href="#"> ข้อมูลแผนกบริษัท </a>
                    </li> --}}
                    <li>
                        <a href="#"> ข้อมูลผู้ใช้งาน </a>
                    </li>
                    <li>
                        <a href="#"> กำหนดสิทธิ์ผู้ใช้งาน </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</div>
