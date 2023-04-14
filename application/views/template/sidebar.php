<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
		<div class="sidebar-brand-icon rotate-n-15">
		<i class="fas fa-solid fa-fire"></i>
		</div>
		<div class="sidebar-brand-text mx-3">CORALLIS</div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	<div class="sidebar-heading">
		Users
	</div>
	<!-- Nav Item - Dashboard -->
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('User/index')?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a>
	</li>

	<!-- Nav Item - User -->
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('User/datauser')?>">
			<i class="fas fa-fw fa-table"></i>
			<span>Data User</span></a>
	</li>

	
	<!-- Nav Item - Tables -->
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('User/changePassword')?>">
			<i class="fas fa-fw fa-key"></i>
			<span>Change Password</span></a>
	</li>
	<!-- Nav Item - Tables -->
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('Auth/logout')?>" onclick="return confirm('Yakin Ingin Logout <?= $user['username'] ?> ?')" >
		<i class="fas fa-solid fa-power-off"></i>
			<span>Logout</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

	</ul>
<!-- End of Sidebar -->
