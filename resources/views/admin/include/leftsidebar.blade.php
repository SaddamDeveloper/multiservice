<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <div class="nav-link">
          <div class="profile-image">
            <img src="images/faces/face10.jpg" alt="image"/>
            <span class="online-status online"></span> <!--change class online to offline or busy as needed-->
          </div>
          <div class="profile-name">
            <p class="name">
              Marina Michel
            </p>
            <p class="designation">
              Super Admin
            </p>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('admin.dashboard')}}">
          <i class="icon-rocket menu-icon"></i>
          <span class="menu-title">Dashboard</span>
          <span class="badge badge-success">New</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/widgets.html">
          <i class="icon-shield menu-icon"></i>
          <span class="menu-title">Transaction</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false" aria-controls="page-layouts">
          <i class="icon-check menu-icon"></i>
          <span class="menu-title">Finance</span>
          <span class="badge badge-danger">3</span>
        </a>
        <div class="collapse" id="page-layouts">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="pages/layout/boxed-layout.html">Wallet</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/layout/rtl-layout.html">Manual Topup</a></li>
            <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="pages/layout/horizontal-menu.html">Manual Withdraw</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item d-none d-lg-block">
        <a class="nav-link" data-toggle="collapse" href="#sidebar-layouts" aria-expanded="false" aria-controls="sidebar-layouts">
          <i class="icon-layers menu-icon"></i>
          <span class="menu-title">Drivers</span>
          <span class="badge badge-warning">5</span>
        </a>
        <div class="collapse" id="sidebar-layouts">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/layout/compact-menu.html">Drivers</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/layout/sidebar-collapsed.html">New Registration Drivers</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/layout/sidebar-hidden.html">Tracking Driver</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="icon-target menu-icon"></i>
          <span class="menu-title">Users</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-advanced" aria-expanded="false" aria-controls="ui-advanced">
          <i class="icon-cup menu-icon"></i>
          <span class="menu-title">Merchants</span>
          <span class="badge badge-primary">8</span>
        </a>
        <div class="collapse" id="ui-advanced">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.merchant_category') }}">Merchants Category</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/clipboard.html">All Merchants</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/context-menu.html">New Registration Merchant</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
          <i class="icon-flag menu-icon"></i>
          <span class="menu-title">Service</span>
          <span class="badge badge-danger">3</span>
        </a>
        <div class="collapse" id="form-elements">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.service') }}">Service</a></li>                
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.vehicle_type_page') }}">Vehicle Type</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#editors" aria-expanded="false" aria-controls="editors">
          <i class="icon-anchor menu-icon"></i>
          <span class="menu-title">Promo Code</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
          <i class="icon-pie-chart menu-icon"></i>
          <span class="menu-title">Slider</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">News</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/ui-features/popups.html">
          <i class="icon-diamond menu-icon"></i>
          <span class="menu-title">Send Email</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/ui-features/notifications.html">
          <i class="icon-bell menu-icon"></i>
          <span class="menu-title">App Notifications</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/ui-features/notifications.html">
          <i class="icon-bell menu-icon"></i>
          <span class="menu-title">App Settings</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/ui-features/notifications.html">
          <i class="icon-bell menu-icon"></i>
          <span class="menu-title">Admin Profile</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
          <i class=" icon-logout menu-icon"></i>
          <span class="menu-title">Logout</span>
        </a>
        <form id="frm-logout" action="{{ route('admin.logout') }}" method="POST">
            {{ csrf_field() }}
        </form>
      </li>
    </ul>
  </nav>