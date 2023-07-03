<div class="sidebar-wrapper sidebar-theme">
    <nav id="sidebar">
        <ul class="list-unstyled menu-categories" id="accordionExample">
            {{-- <li class="menu-title">Components</li> --}}
            <li class="menu">
                <a href="{{route('Profile')}}" aria-expanded="false" class="dropdown-toggle" >
                    <div class="">
                        <i class="las la-user-alt"></i>
                        <span>ข้อมูลส่วนตัว</span>
                    </div>
                </a>
            </li>
            {{-- <li class="menu">
                <a href="{{route('Register')}}" aria-expanded="false" class="dropdown-toggle" >
                    <div class="">
                        <i class="las la-user-plus"></i>
                        <span>สมัครสมาชิก</span>
                    </div>
                </a>
            </li> --}}
            <li class="menu">
                <a href="{{route('tree')}}"  aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i class="las la-sitemap"></i>
                        <span>โครงสร้างสายงาน</span>
                    </div>
                </a>
            </li>
            <li class="menu">
                <a href="{{route('DirectSponsor')}}"  aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i class="las la-handshake"></i>
                        <span>แนะนำตรง</span>
                    </div>
                </a>
            </li>
            <li class="menu">
                <a href="{{route('Bonus')}}"  aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i class="las la-coins"></i>
                        <span>โบนัส</span>
                    </div>
                </a>
            </li>
            <li class="menu">
                <a href="#cart" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i class="las la-shopping-basket"></i>
                        <span>สั่งซื้อสินค้า</span>
                    </div>
                    <div>
                        <i class="las la-angle-right sidemenu-right-icon"></i>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="cart" data-parent="#accordionExample">
                    <li>
                        <a href="{{ route('CartGeneral',['type' => 'general'])}}"> สินค้าทั่วไป </a>
                    </li>
                    <li>
                        <a href="{{ route('CartGeneral',['type' => 'stock'])}}"> สินค้า (คลัง) </a>
                    </li>
                </ul>
            </li>

            <li class="menu">
                <a href="{{ route('Order')}}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i class="las la-clipboard-check"></i>
                        <span>แจงยอด/บิลโฮล</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="{{ route('Order')}}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i class="las la-clipboard-list"></i>
                        <span>ประวัติการสั่งซื้อ</span>
                    </div>
                </a>
            </li>
            <li class="menu">
                <a href="#stock" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i class="las la-box-open"></i>
                        <span>สต๊อกสินค้า</span>
                    </div>
                    <div>
                        <i class="las la-angle-right sidemenu-right-icon"></i>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="stock" data-parent="#accordionExample">
                    <li>
                        <a href="#!"> สต๊อกสินค้า </a>
                    </li>
                    <li>
                        <a href="#!"> ประวัติสต๊อกสินค้า </a>
                    </li>
                </ul>
            </li>
            <li class="menu">
                <a href="#salespage" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i class="lab la-pinterest-square"></i>
                        <span>เพจซื้อขาย</span>
                    </div>
                    <div>
                        <i class="las la-angle-right sidemenu-right-icon"></i>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="salespage" data-parent="#accordionExample">
                    <li>
                        <a href="#!"> เพจซื้อขาย 1 </a>
                    </li>
                    <li>
                        <a href="#!"> เพจซื้อขาย 2 </a>
                    </li>
                    <li>
                        <a href="#!"> เพจซื้อขาย 3 </a>
                    </li>
                    <li>
                        <a href="#!"> เพจซื้อขาย 4 </a>
                    </li>
                    <li>
                        <a href="#!"> เพจซื้อขาย 5 </a>
                    </li>
                </ul>
            </li>
            <li class="menu">
                <a href="{{ route('ContactUs')}}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i class="las la-map-marked-alt"></i>
                        <span>ต่อต่อเรา</span>
                    </div>
                </a>
            </li>
        </ul>
    </nav>
</div>
