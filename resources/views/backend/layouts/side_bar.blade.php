<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="{{ url('admin-backend/index') }}" class="site_title">
                            <span>Hello</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            @if (Auth::guard('admin')->user()->role == App\Constant::ADMIN_ROLE)
                                <img src="{{ url('assets/default_images/admin.png') }}" class="img-circle profile_img"
                                    alt="">
                            @elseif (Auth::guard('admin')->user()->role == App\Constant::EDITOR_ROLE)
                                <img src="{{ url('assets/default_images/editor.png') }}" class="img-circle profile_img"
                                    alt="">
                            @elseif (Auth::guard('admin')->user()->role == App\Constant::CUSTOMER_SERVICE_ROLE)
                                <img src="{{ url('assets/default_images/customer_service.png') }}"
                                    class="img-circle profile_img" alt="">
                            @endif
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>{{ Auth::guard('admin')->user()->username }}</h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <ul class="nav side-menu">
                                <li><a href="{{ url('admin-backend/index') }}"><i class="fa fa-home"></i> Home</a></li>

                                <li><a><i class="fa fa-user"></i> User Management <span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ url('admin-backend/user/create') }}">Create</a></li>
                                        <li><a href="{{ url('admin-backend/user/show') }}">Listing</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-building"></i> City Management <span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ url('admin-backend/city/create') }}">Create</a></li>
                                        <li><a href="{{ url('admin-backend/city/index') }}">Listing</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-futbol-o"></i> Hobby Management <span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ url('admin-backend/hobby/create') }}">Create</a></li>
                                        <li><a href="{{ url('admin-backend/hobby/show') }}">Listing</a></li>
                                    </ul>
                                </li>

                                <li><a href="{{ url('admin-backend/setting') }}"><i class="fa fa-gear"></i> Setting
                                    </a></li>
                                <li><a href="{{ url('admin-backend/member/show') }}"><i class="fa fa-users"></i> Member
                                        Mangement </a></li>

                                <li><a><i class="fa fa-newspaper-o bg-dange d-inline" style="font-size: 12px;"></i>
                                        &nbsp;Knowledge Management<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ url('admin-backend/post/create') }}">Create</a></li>
                                        <li><a href="{{ url('admin-backend/post/show') }}">Listing</a></li>
                                    </ul>
                                </li>

                            </ul>
                        </div>

                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>
