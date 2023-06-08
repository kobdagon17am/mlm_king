<div class="sidebar-wrapper sidebar-theme">
    <nav id="sidebar">
        <ul class="list-unstyled menu-categories" id="accordionExample">
            {{-- <li class="menu-title">Components</li> --}}
            <li class="menu">
                <a href="#profile" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i class="las la-user-alt"></i>
                        <span>ข้อมูลส่วนตัว</span>
                    </div>
                </a>
            </li>
            <li class="menu">
                <a href="#sitemap" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i class="las la-sitemap"></i>
                        <span>โครงสร้างสายงาน</span>
                    </div>
                </a>
            </li>
            <li class="menu">
                <a href="#orders" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i class="las la-boxes"></i>
                        <span>สั่งซื้อสินค้า</span>
                    </div>
                    <div>
                        <i class="las la-angle-right sidemenu-right-icon"></i>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="orders" data-parent="#accordionExample">
                    <li>
                        <a href="{{ route('CartGeneral')}}"> สินค้าทั่วไป </a>
                    </li>
                    <li>
                        <a href="fertilizer_orders.html"> สินค้าปุ๋ย </a>
                    </li>
                </ul>
            </li>
            <li class="menu">
                <a href="history.html" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i class="las la-clipboard-list"></i>
                        <span>ประวัติการสั่งซื้อ</span>
                    </div>
                </a>
            </li>
            <li class="menu">
                <a href="#stock" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i class="las la-boxes"></i>
                        <span>สต๊อกสินค้า</span>
                    </div>
                    <div>
                        <i class="las la-angle-right sidemenu-right-icon"></i>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="stock" data-parent="#accordionExample">
                    <li>
                        <a href="stock.html"> สต๊อกสินค้า </a>
                    </li>
                    <li>
                        <a href="stock_history.html"> ประวัติสต๊อกสินค้า </a>
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
                        <a href="salespage1.html"> เพจซื้อขาย 1 </a>
                    </li>
                    <li>
                        <a href="salespag2.html"> เพจซื้อขาย 2 </a>
                    </li>
                    <li>
                        <a href="salespag3.html"> เพจซื้อขาย 3 </a>
                    </li>
                    <li>
                        <a href="salespag4.html"> เพจซื้อขาย 4 </a>
                    </li>
                    <li>
                        <a href="salespag5.html"> เพจซื้อขาย 5 </a>
                    </li>
                </ul>
            </li>
            <li class="menu">
                <a href="contact.html" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i class="lab la-telegram-plane"></i>
                        <span>Contact Us</span>
                    </div>
                </a>
            </li>
        </ul>
    </nav>
</div>
