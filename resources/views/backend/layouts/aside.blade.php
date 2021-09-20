@section('aside')
    <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
                <a href="{{route('dashboard')}}" class="site_title"><i class="fa fa-dashboard"></i>
                    <span>Laravel1pm</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
                <div class="profile_pic">
                    <img src="{{url('uploads/users/'.Auth::user()->image)}}" alt="..." class="img-circle profile_img">
                </div>
                <div class="profile_info">
                    <span>Welcome,</span>
                    <h2>{{Auth::user()->username}}</h2>
                </div>
            </div>
            <!-- /menu profile quick info -->

            <br/>

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">
                    <h3>General</h3>
                    <ul class="nav side-menu">
                        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a>

                        </li>
                        <li><a><i class="fa fa-users"></i> Users <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('create-user')}}">Add User</a></li>
                                <li><a href="{{route('users')}}">Show Users</a></li>
                            </ul>
                        </li>
                        <li><a><i class="fa fa-book"></i> Category <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('admin-category.create')}}">Add Category</a></li>
                                <li><a href="{{route('admin-category.index')}}">Show Category</a></li>
                            </ul>
                        </li>
                        <li><a><i class="fa fa-newspaper-o"></i> News <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('admin-news.create')}}">Add News</a></li>
                                <li><a href="{{route('admin-news.index')}}">Show News</a></li>
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
@endsection
