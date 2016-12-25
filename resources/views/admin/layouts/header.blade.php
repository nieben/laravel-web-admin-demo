<header class="header white-bg">
    <div class="sidebar-toggle-box">
        <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
    </div>
    <!--logo start-->
    <a href="{{url('/admin/home')}}" class="logo">{{ config('app.name', '管理后台') }}</a>
    <!--logo end-->
    <div class="nav notify-row" id="top_menu">
        <!--  通知 start -->
        <ul class="nav top-menu">
            <!-- notification dropdown start-->
            <li id="header_notification_bar" class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                    <i class="icon-bell-alt"></i>
                    <span class="badge bg-warning"></span>
                </a>
                <ul class="dropdown-menu extended notification">
                </ul>
            </li>
            <!-- notification dropdown end -->
        </ul>
        <!--  notification end -->
    </div>
    <div class="top-nav ">
        <!--search & user info start-->
        <ul class="nav pull-right top-menu">
            <!-- user login dropdown start-->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <img alt="" height="29" width="29" src="{{asset('/img/administrator.png')}}">
                    <span class="username">{{Auth('admin')->user()->email}}</span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout">
                    <div class="log-arrow-up"></div>
                    <li><a href="#"><i class=" icon-suitcase"></i>个人信息</a></li>
                    <li><a href="#"><i class="icon-cog"></i> 设置</a></li>
                    <li><a href="#"><i class="icon-bell-alt"></i> 通知</a></li>
                    <li>
                        <a href="{{ url('/admin/logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="icon-key"></i> 退出
                        </a>
                        <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
            <!-- user login dropdown end -->
        </ul>
        <!--search & user info end-->
    </div>
</header>