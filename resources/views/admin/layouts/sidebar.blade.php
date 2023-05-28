<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin') ? 'active' : 'collapsed' }}" href="{{ route('admin.index') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->


        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/instructor') ? 'active' : 'collapsed' }}" href="{{ route('admin.instructor') }}">
                <i class="bi-person"></i>
                <span>Instructors</span>
            </a>
        </li><!-- End Register Page Nav -->

        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/student') ? 'active' : 'collapsed' }}" href="{{ route('admin.student') }}">
                <i class="bi-people"></i>
                <span>Student</span>
            </a>
        </li><!-- End Register Page Nav -->

        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/courses') ? 'active' : 'collapsed' }}" href="{{ route('admin.courses') }}">
                <i class="bi-camera-video"></i>
                <span>Courses</span>
            </a>
        </li><!-- End Login Page Nav -->

        {{-- <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.profile') }}">
                <i class="bi bi-card-list"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Register Page Nav --> --}}

        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/support') ? 'active' : 'collapsed' }}" href="{{ route('admin.support') }}">
                <i class="bi-question-lg"></i>
                <span>Support</span>
            </a>
        </li><!-- End Register Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.logout') }}">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Logout</span>
            </a>
        </li><!-- End Login Page Nav -->


</aside><!-- End Sidebar-->
