<!-- Side Navbar -->
	 <nav class="side-navbar">
		<div class="side-navbar-wrapper">
		  <!-- Sidebar Header    -->
		  <div class="sidenav-header d-flex align-items-center justify-content-center">
			 <!-- User Info-->
			 <div class="sidenav-header-inner text-center"><img src="<?php echo $url; ?>assets/img/avatar-1.jpg" alt="person" class="img-fluid rounded-circle">
				<h2 class="h5"><?php echo $_SESSION['nama']; ?></h2><span>Perpustakaan Sederhana</span>
			 </div>
			 <!-- Small Brand information, appears on minimized sidebar-->
			 <div class="sidenav-header-logo">
			 	<a href="index.html" class="brand-small text-center"> <strong>P</strong><strong class="text-primary">D</strong></a>
			 </div>
		  </div>
		  <!-- Sidebar Navigation Menus-->
		  <div class="main-menu">
			 <h5 class="sidenav-heading">Menu</h5>
			 <ul id="side-main-menu" class="side-menu list-unstyled">                  
				<li class="<?php if(isset($menuhome)) echo $menuhome; ?>">
					<a href="index.php"> <i class="icon-home"></i>Home</a>
				</li>
				<li class="<?php if(isset($menupeminjaman)) echo $menupeminjaman; ?>">
					<a href="<?php echo $url; ?>?buku"> <i class="fas fa-sign-out-alt"></i>Peminjaman</a>
				</li>
				<li class="<?php if(isset($menupengembalian)) echo $menupengembalian; ?>">
					<a href="<?php echo $url; ?>?buku"> <i class="fas fa-sign-in-alt"></i>Pengembalian</a>
				</li>
				<li class="<?php if(isset($menubiodata)) echo $menubiodata; ?>">
					<a href="<?php echo $url; ?>?buku"> <i class="fa fa-users"></i>Biodata</a>
				</li>
				<li class="<?php if(isset($menudenda)) echo $menudenda; ?>">
					<a href="<?php echo $url; ?>?buku"> <i class="fas fa-dollar-sign"></i>Setting Denda</a>
				</li>
				<li class="<?php if(isset($menupetugas)) echo $menupetugas; ?>">
					<a href="<?php echo $url; ?>?buku"> <i class="fas fa-user"></i>Petugas</a>
				</li>
				<li class="<?php if(isset($menubuku)) echo $menubuku; ?>">
					<a href="<?php echo $url; ?>?buku"> <i class="fa fa-book"></i>Buku</a>
				</li>
				
			 </ul>
		  </div>
		 
		</div>
	 </nav>