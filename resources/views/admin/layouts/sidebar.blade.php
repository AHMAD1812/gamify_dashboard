<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="{{request()->is('/') ? 'active' : '' }}">
    <a class="nav-link " href="{{ route('admin.index') }}">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->


  <li class="{{request()->is('/') ? 'active' : '' }}">
    <a class="nav-link collapsed" href="{{ route('admin.teacher') }}"> 
      <i class="bi bi-card-list"></i>
      <span>Teacher</span>
    </a>
  </li><!-- End Register Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('admin.student') }}"> 
      <i class="bi bi-card-list"></i>
      <span>Student</span>
    </a>
  </li><!-- End Register Page Nav -->

  <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin.courses') }}">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Courses</span>
        </a>
      </li><!-- End Login Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('admin.profile') }}">
      <i class="bi bi-card-list"></i>
      <span>Profile</span>
    </a>
  </li><!-- End Register Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('admin.feedback') }}">
      <i class="bi bi-card-list"></i>
      <span>Feedback</span>
    </a>
  </li><!-- End Register Page Nav -->

  
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('admin.register') }}">
      <i class="bi bi-card-list"></i>
      <span>Register</span>
    </a>
  </li><!-- End Register Page Nav -->

  <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin.login') }}">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </li><!-- End Login Page Nav -->

      
</aside><!-- End Sidebar-->

