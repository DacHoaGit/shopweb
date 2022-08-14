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
                    <div class="wrap-icon-header flex-w flex-r-m">

                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="{{ isset($productCarts) ? count($productCarts) : 0 }}">
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </div>
                    </div>
                    <ul class="main-menu ">
                        <li >
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                    
                                <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                               @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-jet-responsive-nav-link>
                            </form>            
                        </li>
                    </ul>
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
        <!-- Logo moblie -->		
        <div class="logo-mobile">
            <a href="{{route('home')}}"><img src="{{asset('logo.png')}}" alt="IMG-LOGO"></a>
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m m-r-15">

            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
                <i class="zmdi zmdi-shopping-cart"></i>
            </div>

        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
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

            <li>
                <a href="about.html">About</a>
            </li>

            <li>
                <a href="contact.html">Contact</a>
            </li>
        </ul>
    </div>
</header>


