<main class="main-content">
  <!-- Top Navbar -->
<header class="top-navbar" style="background-color: #333; width: 1265px">
    <ul class="navbar-nav ml-auto" style="display: flex; padding: 1px;">


    <!-- Topbar Search -->
    <li class="nav-item" style="margin-right: 20px;">
        
        <form class="navbar-search" style="max-width: 300px;">
            <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                    aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm" style="color: white;"></i>
                    </button>
                </div>
            </div>
        </form>
    </li>

    <!-- Messages Icon -->
    <li class="nav-item dropdown no-arrow" style="margin-right: 240px; margin-left: 1px; margin-top: -43px;">
        <li class="nav-item" style="margin-right: 240px;">
    <a href="{{ route('home') }}" class="btn btn-primary rounded-circle" title="Home" style="z-index: 999; position: relative;">
        <i class="fas fa-home"></i>
    </a>
</li>

    </li>

    <div style="margin-right: -10px; margin-top: -40px;">
      <span style="margin-right: -40px">Welcome, User</span>
      <div class="auth-buttons">
          <a href="#" class="btn login">Account</a>
          <div class="dropdown-content">
            <a href="#">Profile</a>
            <a href="#">Credentials</a>
            <a href="">
              <form action="{{ route('logout') }}" method="GET">  
              @csrf
              {{-- {{ route('logout') }} --}}
              <button type="submit" class="btn logout">Log Out</button>
             </form>
             </a>
          </div>
        </div>
    </div>
</header>