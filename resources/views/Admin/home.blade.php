
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>{{$title}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('logo.png')}}">
    <!-- App css -->
    <link href="{{asset('css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/app.min.css')}}" rel="stylesheet" type="text/css" id="light-style" />

    <link href="https://code.jquery.com/ui/1.9.2/themes/smoothness/jquery-ui.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css"/>

    
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
</head>

<body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">

            <!-- LOGO -->
            <a href="{{route('admin')}}" class="logo text-center logo-light">
                <span class="logo-lg">
                    <img src="{{asset('logo.png')}}" alt="" height="100">
                </span>
                <span class="logo-sm">
                    <img src="" alt="" height="16">
                </span>
            </a>

            <!-- LOGO -->
            <a href="{{route('admin')}}" class="logo text-center logo-dark">
                <span class="logo-lg">
                    <img src="{{asset('logo.png')}}" alt="" height="100">
                </span>
                <span class="logo-sm">
                    <img src="{{asset('logo.png')}}" alt="" height="100">
                </span>
            </a>

            <div class="h-100" style="margin-top:50px;" id="left-side-menu-container" data-simplebar>

                <!--- Sidemenu -->
                <ul class="metismenu side-nav">

                    <li class="side-nav-item">
                        <a href="{{route('admin')}}" class="side-nav-link">
                            <i class="uil-home-alt"></i>
                            <span> Dashboards </span>
                        </a>
                    </li>


                    <li class="side-nav-item">
                        <a href="javascript: void(0);" class="side-nav-link">
                            <i class="dripicons-list"></i>
                            <span> Catalog </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="side-nav-second-level" aria-expanded="false">
                            <li>
                                <a href="/admin/menus/add">Add Catalog</a>
                            </li>
                            <li>
                                <a href="/admin/menus/list">List Catalogs</a>
                            </li>
                        </ul>
                    </li>

                    <li class="side-nav-item">
                        <a href="javascript: void(0);" class="side-nav-link">
                            <i class="uil-cart"></i>
                            <span> Product </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="side-nav-second-level" aria-expanded="false">
                            <li>
                                <a href="/admin/products/add">Add Product</a>
                            </li>
                            <li>
                                <a href="/admin/products/list">List Products</a>
                            </li>
                        </ul>
                    </li>

                    <li class="side-nav-item">
                        <a href="javascript: void(0);" class="side-nav-link">
                            <i class="uil-cart"></i>
                            <span> Slider </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="side-nav-second-level" aria-expanded="false">
                            <li>
                                <a href="/admin/sliders/add">Add Slider</a>
                            </li>
                            <li>
                                <a href="/admin/sliders/list">List Sliders</a>
                            </li>
                        </ul>
                    </li>
                    <li class="side-nav-item">
                        <a href="javascript: void(0);" class="side-nav-link">
                            <i class="uil-cart"></i>
                            <span> Payment </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="side-nav-second-level" aria-expanded="false">
                            <li>
                                <a href="/admin/payments/add">Add Payment</a>
                            </li>
                            <li>
                                <a href="/admin/payments/list">List Payments</a>
                            </li>
                        </ul>
                    </li>
                    <li class="side-nav-item">
                        <a href="/admin/customer" class="dropdown-toggle side-nav-link" >
                            <i class="mdi mdi-account-details"></i>
                            <span id="count-notify" data-count="0" class="badge badge-success float-right">{{$_COOKIE['countNotify']??''}}</span>
                            <span> Customer </span>
                        </a>
                    </li>
                </ul>

                <!-- Help Box -->
                <!-- end Help Box -->
                <!-- End Sidebar -->

                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                <!-- Topbar Start -->
                <div class="navbar-custom">
                    <ul class="list-unstyled topbar-right-menu float-right mb-0">
                        <li class="dropdown notification-list d-lg-none">
                            <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i  class="dripicons-search noti-icon"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                                <form class="p-3">
                                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                </form>
                            </div>
                        </li>
                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle nav-user arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                aria-expanded="false">
                                <span class="account-user-avatar"> 
                                    <i class="mdi mdi-account mdi-24px" ></i>
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
                        </li>

                    </ul>
                    <button class="button-menu-mobile open-left disable-btn">
                        <i class="mdi mdi-menu"></i>
                    </button>
                    <div class="app-search dropdown d-none d-lg-block">
                        <form>
                            <div class="input-group">
                                <input type="text" class="form-control dropdown-toggle" placeholder="Search..." id="top-search">
                                <span class="mdi mdi-magnify search-icon"></span>
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </div>
                            </div>
         
                        </form>
                    </div>
                </div>
                <!-- end Topbar -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">{{$title}}</h4>
                        </div>
                    </div>
                </div>
                <!-- Start Content-->
                <div class="container-fluid">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                
                    @if (Session::has('error'))     
                        <div class="alert alert-danger">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    @yield('content')
                </div>
                <!-- container -->

            </div>
            <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            2018 - 2020 © Hyper - Coderthemes.com
                        </div>
                        <div class="col-md-6">
                            <div class="text-md-right footer-links d-none d-md-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    <!-- /Right-bar -->

    <!-- bundle -->
    <script src="{{asset('js/vendor.min.js')}}"></script>
    <script src="{{asset('js/app.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

    <script src="https://js.pusher.com/4.3/pusher.min.js"></script>

    <script type="text/javascript">
        // var notificationsWrapper   = $('.dropdown-notifications');
        // var notificationsToggle    = notificationsWrapper.find('a[data-toggle]');
        // var notificationsCountElem = notificationsToggle.find('i[data-count]');
        // var notificationsCount     = parseInt(notificationsCountElem.data('count'));
        // var notifications          = notificationsWrapper.find('ul.dropdown-menu');
    
    
        // Enable pusher logging - don't include this in production
         Pusher.logToConsole = true;
    
        var pusher = new Pusher('{{env('PUSHER_APP_KEY')}}', {
            cluster: 'ap1',
            encrypted: false
        });
        
        // Subscribe to the channel we specified in our Laravel Event
        var channel = pusher.subscribe('NotifyOrder');
        // Bind a function to a Event (the full Laravel class)
        channel.bind('send-notify', function(data) {
            var count = $('#count-notify').text();
        
            count = parseInt(count)+1;
            $('#count-notify').text(count);
            $.ajax({
                type:'get',
                datatype:'json',
                url:'/admin/update-cookie',
                success:function(result){
                    
                }
            })
                // $('#count-notify').attr('data-count', parseInt(count));

            // console.log(typeof count);
            // var existingNotifications = notifications.html();
            // var avatar = Math.floor(Math.random() * (71 - 20 + 1)) + 20;
            // var newNotificationHtml = `
            //   <li class="notification active">
            //       <div class="media">
            //         <div class="media-left">
            //           <div class="media-object">
            //             <img src="https://api.adorable.io/avatars/71/`+avatar+`.png" class="img-circle" alt="50x50" style="width: 50px; height: 50px;">
            //           </div>
            //         </div>
            //         <div class="media-body">
            //           <strong class="notification-title">`+data.title+`</strong>
            //           <p class="notification-desc">`+data.content+`</p>
            //           <div class="notification-meta">
            //             <small class="timestamp">about a minute ago</small>
            //           </div>
            //         </div>
            //       </div>
            //   </li>
            // `;
            // notifications.html(newNotificationHtml + existingNotifications);
    
            // notificationsCount += 1;
            // notificationsCountElem.attr('data-count', notificationsCount);
            // notificationsWrapper.find('.notif-count').text(notificationsCount);
            // notificationsWrapper.show();
        });
    </script>


    <script src="{{asset('js/main.js')}}"></script>


    <!-- Datatable Init js -->
    @stack('js')

    
</body>
</html>


