<?php 
// load user data
$user = User::getUserByID( $_SESSION['user']['id'] );
 ?>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Container wrapper -->
  <div class="container px-5">
    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Navbar brand -->
      <a class="navbar-brand mt-2 mt-lg-0" href="/">
        <img
          src="/assets/logo.png"
          height="50"
          alt="MedicalCare"
          loading="lazy"
        />
      </a>
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link <?php echo ($path == "") ? "active" : ""; ?>" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo ($path == "about") ? "active" : ""; ?>" aria-current="page" href="/about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo ($path == "services") ? "active" : ""; ?>" aria-current="page" href="/services">Services</a>
        </li>
      </ul>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->

    <!-- Right elements -->
    <div class="d-flex align-items-center">


    <?php if ( Authentication::isLoggedIn() ) : ?>
        <!-- logged in -->
        <ul class="navbar-nav">
            <li class="nav-item me-3 dropdown">
                <a
                class="nav-link dropdown-toggle"
                href=""
                id="navbarDropdown"
                role="button"
                data-mdb-toggle="dropdown"
                aria-expanded="false"
                >
                <img src="https://ui-avatars.com/api/?name=<?php echo $user['name']; ?>" class="rounded-circle"
                height="22" alt="Avatar" loading="lazy" />
                </a>
                <ul
                class="dropdown-menu dropdown-menu-end"
                aria-labelledby="navbarDropdownMenuAvatar"
                >
                <li>
                    <a class="dropdown-item" href="/profile">My Profile</a>
                </li>
                <li>
                    <a class="dropdown-item" href="/appointments">Appointments</a>
                </li>
                <li>
                    <a class="dropdown-item" href="/logout">Logout</a>
                </li>
                <?php if ( Authentication::isDoctor() ) : ?>
                <li><hr class="dropdown-divider" /></li>
                <li>
                  <a class="dropdown-item" href="/doctor/home">Doctor Dashboard</a>
                </li>
                <?php endif; ?>
                <?php if ( Authentication::isStaff() ) : ?>
                <li><hr class="dropdown-divider" /></li>
                <li>
                  <a class="dropdown-item" href="/staff/home">Nurse Dashboard</a>
                </li>
                <?php endif; ?>
                <?php if ( Authentication::isAdmin() ) : ?>
                <li><hr class="dropdown-divider" /></li>
                <li>
                  <a class="dropdown-item" href="/admin/dashboard">Admin Dashboard</a>
                </li>
                <?php endif; ?>
                </ul>
            </li>
        </ul>
        <?php else : ?>
            <!-- guest -->
            <div class="d-flex align-items-center">
                <a type="button" class="btn btn-link px-3 me-2" href="login">
                Login
                </a>
                <a type="button" class="btn btn-primary me-3" href="signup">
                Sign Up
                </a>
            </div>
    <?php endif; ?>
    </div>
    <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->