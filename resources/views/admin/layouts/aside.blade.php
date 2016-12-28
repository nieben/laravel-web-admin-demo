<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
            <li class="
            @if ($active == 'home')
                    active
            @endif
            ">
                <a class="" href="{{url('/admin/home')}}">
                    <i class="icon-dashboard"></i>
                    <span>控制面板</span>
                </a>
            </li>
            <li class="sub-menu
            @if ($active == 'article')
                    active
            @endif
             ">
                <a href="{{url('/admin/article/list')}}" class="">
                    <i class="icon-book"></i>
                    <span>文章管理</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{url('/admin/article/list')}}">所有文章</a></li>
                    <li><a class="" href="{{url('/admin/article/add')}}">写文章</a></li>
                </ul>
            </li>
            <li class="sub-menu
            @if ($active == 'label')
                    active
            @endif
            ">
                <a href="{{url('/admin/label/list')}}" class="">
                    <i class="icon-ticket"></i>
                    <span>标签管理</span>
                </a>
            </li>
            <li class="sub-menu
            @if ($active == 'user')
                    active
            @endif
            ">
                <a class="" href="{{url('/admin/user/list')}}">
                    <i class="icon-user"></i>
                    <span>用户管理</span>
                </a>
            </li>
            <li class="sub-menu
            @if ($active == 'forum')
                    active
            @endif
                    ">
                <a href="{{url('/admin/post/list')}}" class="">
                    <i class="icon-comment"></i>
                    <span>论坛管理</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{url('/admin/post/list')}}">所有帖子</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ url('/admin/logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form2').submit();">
                    <i class="icon-key"></i> 退出
                </a>
                <form id="logout-form2" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>