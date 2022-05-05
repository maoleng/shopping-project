<div class="navbar-container">
    <div class="header-navbar">
        <div class="navbar-con-PC">
            <ul class="navbar-list">
                <li class="navbar-item">
                    <a href="{{route('index')}}">Trang chủ</a>
                </li>
                <li class="navbar-item navbar-item-lv2">
                    <a href="{{route('products')}}">Sản phẩm</a>
                    <div class="nav-lv2">
                        <ul class="nav-lv2-list">
                            @foreach($types_grouped as $type_grouped)
                            <li class="nav-lv2-item">
                                <a href="{{route('type', ['type' => $type_grouped->type_id])}}">
                                    {{$type_grouped->type_name}}
                                </a>
                                @if(isset($type_grouped->subtype_name))
                                <div class="nav-lv3">
                                    <ul class="nav-lv3-list">
                                        @foreach($types_included as $type_included)
                                            <li class="nav-lv3-item">
                                                <a href="{{route('subtype', ['subtype' => $type_included->subtype_id])}}">
                                                    {{$type_included->subtype_name}}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </li>

                <li class="navbar-item">
                    <a href="{{route('contact')}}">Liên hệ</a>
                </li>
            </ul>
        </div>
        <div class="navbar-con-mobile">
            <div class="nav-bar-icon">
                <i class="fa-solid fa-bars"></i>
            </div>
            <input type="checkbox" checked id="btnControl" />
            <div class="hidden-navbar">
                <ul class="hidden-navbar-list">
                    <li class="hidden-navbar-item">
                        <a href="#">Trang chủ</a>
                    </li>
                    <li class="hidden-navbar-item">
                        <a href="#"
                        >Sản phẩm
                            <div class="nav-lv2">
                                <ul class="nav-lv2-list">
                                    @foreach($types_grouped as $type_grouped)
                                    <li class="nav-lv2-item">
                                        <a href="{{route('type', ['type' => $type_grouped->type_id])}}">
                                            {{$type_grouped->type_name}}
                                        </a>
                                        @if(isset($type_grouped->subtype_name))
                                        <ul class="nav-lv2-list">
                                            @foreach($types_included as $type_included)
                                            <li class="nav-lv2-item">
                                                <a href="{{route('subtype', ['subtype' => $type_included->subtype_id])}}">
                                                    {{$type_included->subtype_name}}
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </a>
                    </li>
                    <li class="hidden-navbar-item">
                        <a href="#">Liên hệ</a>
                    </li>
                </ul>
            </div>
            <label class="btn-open-navbar" for="btnControl"></label>
        </div>
        <div class="hot_line_number">Hotline:{{$config[5]->value}}</div>
    </div>
</div>
<div class="header-with-search">
    <div class="header-logo hide-on-tablet" style="text-align: center">
        <a class="logo-link" href="#">
            <img
                src="{{$config[10]->value}}"
                alt=""
                width="70px"
                height="70px"
            />
        </a>
    </div>
    <div class="header-search">
        <div class="header-search-place-wrap">
            <form>
                <input
                    name="q" value="{{$search}}"
                    type="search"
                    class="header-search-place"
                    placeholder="Search sản phẩm"
                />
            </form>
            <!-- Search history -->
        </div>
        <button class="header-search-btn">
            <i class="fas fa-search header-search-icon"></i>
        </button>

    </div>
    <div class="header-cart">
        <a href="{{route('carts.index')}}">
            <i class="fas fa-shopping-cart header-cart-icon"></i>
        </a>
    </div>

</div>
