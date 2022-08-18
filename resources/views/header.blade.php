<header>
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        
        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop container">
                
                <!-- Logo desktop -->		
                <a href="{{route('home')}}" class="logo">
                    <img src="{{asset('logo.png')}}" alt="IMG-LOGO">
                </a>

                <!-- Menu desktop -->

                
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li >
                            <a href="{{route('home')}}">Home</a>
                        </li>
                        @foreach ($menus as $menu)
                            <li>
                                <a href="/danh-muc/{{$menu->id}}-{{Str::slug($menu->name, '-')}}.html">{{$menu->name}}</a>
                                @if (count($menu->childrenMenus))
                                    @foreach ($menu->childrenMenus as $child)
                                        <ul class="sub-menu">
                                            <li><a href="/danh-muc/{{$child->id}}-{{Str::slug($child->name, '-')}}.html">{{$child->name}}</a></li>
                                        </ul>
                                    @endforeach
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>	



                @auth
                    <div class="wrap-icon-header d-flex flex-row flex-r-m">
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="{{ isset($productCarts) ? count($productCarts) : 0 }}">
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </div>
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle nav-user arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                aria-expanded="false">
                                <span class="account-user-avatar"> 
                                    <i class="zmdi zmdi-account-circle" ></i>
                                </span>
                                <span>
                                    <span style="margin-top:10px;" class="account-user-name">{{(auth()->user()->name)}}</span>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                                <!-- item-->

                                <!-- item-->
                                <a href="/profile" class="dropdown-item notify-item">
                                    <i class="mdi mdi-account-circle mr-1"></i>
                                    <span>My Account</span>
                                </a>

                                <!-- item-->
                                <a href="/my-order" class="dropdown-item notify-item">
                                    <i class="mdi mdi-account-edit mr-1"></i>
                                    <span>My Order</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="mdi mdi-lifebuoy mr-1"></i>
                                    <span>Support</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="mdi mdi-lock-outline mr-1"></i>
                                    <span>Lock Screen</span>
                                </a>

                                <!-- item-->
                                <a href="{{route('logout')}}" class="dropdown-item notify-item ">
                                    <i class="mdi mdi-logout mr-1"></i>
                                    <span>Logout</span>
                                </a>

                            </div>
                        </div>
                    </div>
                    {{-- <ul class="main-menu ">
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle nav-user arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                aria-expanded="false">
                                <span class="account-user-avatar"> 
                                    <i class="zmdi zmdi-account-circle" ></i>
                                </span>
                                <span>
                                    <span style="margin-top:10px;" class="account-user-name">{{(auth()->user()->name)}}</span>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                                <!-- item-->
                                <div class=" dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="mdi mdi-account-circle mr-1"></i>
                                    <span>My Account</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="mdi mdi-account-edit mr-1"></i>
                                    <span>Settings</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="mdi mdi-lifebuoy mr-1"></i>
                                    <span>Support</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="mdi mdi-lock-outline mr-1"></i>
                                    <span>Lock Screen</span>
                                </a>

                                <!-- item-->
                                <a href="{{route('logout')}}" class="dropdown-item notify-item ">
                                    <i class="mdi mdi-logout mr-1"></i>
                                    <span>Logout</span>
                                </a>

                            </div>
                        </div>
                    </ul> --}}
                @else
                    <div class="wrap-icon-header flex-w flex-r-m">
                        <ul class="main-menu">
                            <li >
                                <a class="text-xl text-gray-700 dark:text-gray-500 underline" href="{{route('login')}}">Login</a>
                            </li>
                            <li >
                                <a class="text-xl text-gray-700 dark:text-gray-500 underline" href="{{route('register')}}">Register</a>
                            </li>
                        </ul>
                    </div>	
                @endauth
                
            </nav>
        </div>	
    </div>



    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
        <!-- Logo moblie -->		
        <div class="logo-mobile">
            <a href="{{route('home')}}"><img src="{{asset('logo.png')}}" alt="IMG-LOGO"></a>
        </div>
        @auth
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="{{ isset($productCarts) ? count($productCarts) : 0 }}">
                <i class="zmdi zmdi-shopping-cart"></i>
            </div>
            <div class="dropdown">
                <a class="nav-link dropdown-toggle nav-user arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                    aria-expanded="false">
                    <span class="account-user-avatar"> 
                        <i class="zmdi zmdi-account-circle" ></i>
                    </span>
                    <span>
                        <span style="margin-top:10px;" class="account-user-name">{{(auth()->user()->name)}}</span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                    <!-- item-->

                    <!-- item-->
                <a href="/profile" class="dropdown-item notify-item">
                    <i class="mdi mdi-account-circle mr-1"></i>
                    <span>My Account</span>
                </a>

                <!-- item-->
                <a href="/my-order" class="dropdown-item notify-item">
                    <i class="mdi mdi-account-edit mr-1"></i>
                    <span>My Order</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="mdi mdi-lifebuoy mr-1"></i>
                    <span>Support</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="mdi mdi-lock-outline mr-1"></i>
                    <span>Lock Screen</span>
                </a>

                <!-- item-->
                <a href="{{route('logout')}}" class="dropdown-item notify-item ">
                    <i class="mdi mdi-logout mr-1"></i>
                    <span>Logout</span>
                </a>
            </div>
            @else
                <div class="wrap-icon-header flex-w flex-r-m">
                    <ul class="main-menu">
                        <li >
                            <a class="text-xl text-gray-700 dark:text-gray-500 underline" href="{{route('login')}}">Login</a>
                        </li>
                        <li >
                            <a class="text-xl text-gray-700 dark:text-gray-500 underline" href="{{route('register')}}">Register</a>
                        </li>
                    </ul>
                </div>	
                
            @endauth
        </div>
    </div>


    <!-- Menu Mobile -->
    <div class="menu-mobile">

        <ul class="main-menu-m">
            <li >
                <a href="{{route('home')}}">Home</a>
            </li>
            @foreach ($menus as $menu)
                <li>
                    <a href="/danh-muc/{{$menu->id}}-{{Str::slug($menu->name, '-')}}.html">{{$menu->name}}</a>
                    @if (count($menu->childrenMenus))
                        @foreach ($menu->childrenMenus as $child)
                            <ul class="sub-menu-m" style="display: none;">
                                <li><a href="/danh-muc/{{$child->id}}-{{Str::slug($child->name, '-')}}.html">{{$child->name}}</a></li>
                            </ul>
                        @endforeach
                        <span class="arrow-main-menu-m">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </span>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</header>


