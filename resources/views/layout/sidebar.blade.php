<div class="left-side-menu mm-show">

    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-light">
        <span class="logo-lg">
        <img src="assets/images/logo.png" alt="" height="16">
   </span>
   <span class="logo-sm">
       <img src="assets/images/logo_sm.png" alt="" height="16">
   </span>
</a>

<!-- LOGO -->
<a href="index.html" class="logo text-center logo-dark">
  <span class="logo-lg">
   <img src="assets/images/logo-dark.png" alt="" height="16">
</span>
<span class="logo-sm">
   <img src="assets/images/logo_sm_dark.png" alt="" height="16">
</span>
</a>

<div class="h-100 mm-active" id="left-side-menu-container" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;"><div class="simplebar-content" style="padding: 0px;">

    <!--- Sidemenu -->
    <ul class="metismenu side-nav mm-show">

        <li class="side-nav-title side-nav-item">Tổng quan</li>

        <li class="side-nav-item mm-active">
            <a href="https://github.com/" class="side-nav-link active">
                <i class="uil-home-alt"></i>
{{--                <span class="badge badge-success float-right">2</span>--}}
                <span> Trang chủ </span>
            </a>
{{--            <ul class="side-nav-second-level mm-collapse mm-show" aria-expanded="false">--}}
{{--                <li>--}}
{{--                    <a href="#">Đối ngoại</a>--}}
{{--                </li>--}}
{{--                <li class="mm-active">--}}
{{--                    <a href="#" class="active">Nội bộ</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
        </li>

        <li class="side-nav-title side-nav-item">Vùng nội bộ</li>

        <li class="side-nav-item">
            <a href="javascript: void(0);" class="side-nav-link">
                <i class="uil-store"></i>
                <span> Nhà cung cấp </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="side-nav-second-level mm-collapse" aria-expanded="false">
                <li>
                    <a href={{route('manufacturers.index')}}>Quản lý</a>
                </li>
                <li>
                    <a href={{route('manufacturers.create')}}>Thêm</a>
                </li>
            </ul>
        </li>

        <li class="side-nav-item">
            <a href="javascript: void(0);" class="side-nav-link">
                <i class="uil-shopping-basket"></i>
                <span> Sản phẩm </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="side-nav-second-level mm-collapse" aria-expanded="false">
                <li>
                    <a href={{route('products.index')}}>Quản lý</a>
                </li>
                <li>
                    <a href={{route('products.create')}}>Thêm</a>
                </li>
            </ul>
        </li>

        <li class="side-nav-item">
            <a href="javascript: void(0);" class="side-nav-link">
                <i class="uil-shopping-cart-alt"></i>
                <span> Đơn hàng </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="side-nav-second-level mm-collapse" aria-expanded="false">
                <li>
                    <a href="{{route('receipts.index')}}">Tất cả</a>
                </li>
                <li>
                    <a href={{route('receipts.index', ['status' => '0'])}}>Chưa xử lý</a>
                </li>
                <li>
                    <a href={{route('receipts.index', ['status' => '1'])}}>Đang giao</a>
                </li>
                <li>
                    <a href={{route('receipts.index', ['status' => '2'])}}>Giao thành công</a>
                </li>
                <li>
                    <a href={{route('receipts.index', ['status' => '3'])}}>Đã hủy</a>
                </li>
            </ul>
        </li>

        <li class="side-nav-item">
            <a href="{{route('types.index')}}" class="side-nav-link">
                <i class="uil-list-ui-alt"></i>
                <span> Thể loại </span>
            </a>
        </li>

        <li class="side-nav-item">
            <a href="javascript: void(0);" class="side-nav-link">
                <i class="uil-clipboard-alt"></i>
                <span> Thống kê </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="side-nav-second-level mm-collapse" aria-expanded="false">
                <li>
                    <a href="apps-tasks.html">Thu nhập</a>
                </li>
                <li>
                    <a href="apps-tasks-details.html">Sản phẩm</a>
                </li>
                <li>
                    <a href="apps-kanban.html">Hóa đơn</a>
                </li>
                <li>
                    <a href="apps-kanban.html">Khách hàng thân thiết</a>
                </li>
            </ul>
        </li>

{{--        <li class="side-nav-title side-nav-item">Custom</li>--}}

{{--        <li class="side-nav-item">--}}
{{--            <a href="{{route('customers.index')}}" class="side-nav-link">--}}
{{--                <i class="uil-comments-alt"></i>--}}
{{--                <span> Khách hàng </span>--}}
{{--            </a>--}}
{{--        </li>--}}


        @if (session()->get('level') === 1)
        <li class="side-nav-title side-nav-item mt-1">Vùng dành cho quản lý</li>

        <li class="side-nav-item">
            <a href="javascript: void(0);" class="side-nav-link">
                <i class="uil-package"></i>
                <span> Nhân viên </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="side-nav-second-level mm-collapse" aria-expanded="false">
                <li>
                    <a href={{route('admins.index')}}>Quản lý</a>
                </li>
                <li>
                    <a href={{route('admins.create')}}>Thêm</a>
                </li>
            </ul>
        </li>

        <li class="side-nav-item">
            <a href="{{route('configs.index')}}" class="side-nav-link">
                <i class="uil-copy-alt"></i>
                <span> Cấu hình </span>
            </a>
        </li>

        <li class="side-nav-item">
            <a href="apps-chat.html" class="side-nav-link">
                <i class="uil-copy-alt"></i>
                <span> Lịch sử hoạt động </span>
            </a>
        </li>

        @endif
    </ul>
    <div class="clearfix"></div>

</div></div></div></div><div class="simplebar-placeholder" style="width: auto; height: 1580px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none; transform: translate3d(0px, 0px, 0px);"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 415px; transform: translate3d(0px, 0px, 0px); display: block;"></div></div></div>
<!-- Sidebar -left -->

</div>
