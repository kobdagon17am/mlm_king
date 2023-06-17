<div class="menubar-wrapper menubar-theme">
    <nav id="sidebar">
        <ul class="list-unstyled menu-categories" id="accordionExample">
            <li class="menu main-single-menu">
                <a href="{{route('admin/Dashboard')}}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i class="las la-home"></i>
                        <span>หน้าหลัก</span>
                    </div>
                </a>
            </li>
            <li class="menu">
                <a href="#" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i class="las la-user-alt"></i>
                        <span>สมาชิก</span>
                    </div>
                </a>
            </li>
            <li class="menu">
                <a href="#" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i class="las la-clipboard-list"></i>
                        <span>ประวัติการสั่งซื้อ</span>
                    </div>
                </a>
            </li>
           
            <li class="menu main-single-menu">
                <a href="#starter-kit" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i class="las la-shopping-basket"></i>
                        <span>สินค้า</span>
                    </div>
                    <div>
                        <i class="las la-angle-right sidemenu-right-icon"></i>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="cart" data-parent="#accordionExample">
                    <li>
                        <a href="#"> สินค้าเพื่อสุขภาพ </a>
                    </li>
                    <li>
                        <a href="#"> สินค้าเกษตร </a>
                    </li>
                    <li>
                        <a href="#"> สินค้าอื่น ๆ </a>
                    </li>

                    <li>
                        <a href="#"> สินค้าโปรโมชั่น </a>
                    </li>
                </ul>
            </li>
            <li class="menu">
                <a href="#stock" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i class="las la-box-open"></i>
                        <span>สต๊อกสินค้า</span>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="stock" data-parent="#accordionExample">
                    <li>
                        <a href="#"> สต๊อกสินค้า </a>
                    </li>
                    <li>
                        <a href="#"> ประวัติสต๊อกสินค้า </a>
                    </li>
                </ul>
            </li>
            
        </ul>
    </nav>
</div>
