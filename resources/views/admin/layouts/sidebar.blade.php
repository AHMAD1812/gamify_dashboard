<div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <img src="{{asset('admin_files/images/Logo 001.png')}}"   hieght="150px"  alt="" srcset="">
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">


                        <li class='sidebar-title'>Main Menu</li>

                        <li class=" sidebar-item ">
                        <li class=" {{ request()->is('admin') ? 'active' : '' }}"> 
                            <a href="{{ route('admin.index') }}" class='sidebar-link'>
                                <i data-feather="home" width="20"></i>
                                <span>Dashboard</span>
                            </a>

                        </li>

                    
                       

                        <li class="sidebar-item ">
                            <a href="{{ route('admin.teacher') }}" class='sidebar-link'>
                                <i data-feather="file-plus" width="20"></i>
                                <span>Teacher</span>
                            </a>

                        </li>

                        <li class="sidebar-item  ">
                            <a href="{{ route('admin.student') }}" class='sidebar-link'>
                                <i data-feather="file-plus" width="20"></i>
                                <span>Student</span>
                            </a>

                        </li>


                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="user" width="20"></i>
                                <span>Authentication</span>
                            </a>

                            <ul class="submenu ">

                                <li>
                                    <a href="{{ route('admin.login') }}">Login</a>
                                    
                                </li>

                                <li>
                                    <a href="{{ route('admin.register') }}">Register</a>
                                </li>

                                <li>
                                    <a href="{{ route('admin.forgot') }}">Forgot Password</a>
                                </li>

                            </ul>

                        </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>