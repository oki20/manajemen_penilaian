<?php 
	$directoryURI = $_SERVER['REQUEST_URI'];
	$path = parse_url($directoryURI, PHP_URL_PATH);
	$components = explode('/', $path);
	$first_part = $components[1];
?>

<div class="sidebar-wrapper scrollbar scrollbar-inner">
	<div class="sidebar-content">
		<div class="user">
			<div class="avatar-sm float-left mr-2">
				<img src="../../assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
			</div>
			<div class="info">
				<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
					<span>
						Hizrian
					<span class="user-level">Administrator</span>
					<span class="caret"></span>
					</span>
				</a>
				<div class="clearfix"></div>

				<div class="collapse in" id="collapseExample">
					<ul class="nav">
						<li>
							<a href="#profile">
								<span class="link-collapse">My Profile</span>
							</a>
						</li>
						<li>
							<a href="#edit">
								<span class="link-collapse">Edit Profile</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
    	</div>

		<ul class="nav nav-primary">
			<li class="nav-item active">
				<a data-toggle="collapse" href="../content_index/index_admin.php" class="collapsed" aria-expanded="false">
					<i class="fas fa-home"></i>
					<p>Dashboard</p>
				</a>
			</li>

			<li class="nav-section">
				<span class="sidebar-mini-icon">
					<i class="fa fa-ellipsis-h"></i>
				</span>
				<h4 class="text-section">Menu</h4>
			</li>

			<li class="nav-item <?php if ($first_part=="") {echo "active"; } else  {echo "noactive";}?>">
				<a href="../content_index/menu_admin/data_kelas.php">
					<i class="fas fa-layer-group"></i>
					<p>Data Kelas</p>
				</a>
			</li>

			<li class="nav-item">
				<a data-toggle="collapse" href="../content_index/menu_admin/data_mata_pelajaran.php">
					<i class="fas fa-layer-group"></i>
					<p>Daftar Mata Pelajaran</p>
				</a>
			</li>

			<li class="nav-item">
				<a data-toggle="collapse" href="../content_index/menu_admin/data_semua_mapel.php">
					<i class="fas fa-layer-group"></i>
					<p>Data Mapel Seluruh Kelas</p>
				</a>
			</li>
			
			<li class="nav-item">
				<a data-toggle="collapse" href="../content_index/menu_admin/data_akun.php">
					<i class="fas fa-layer-group"></i>
					<p>Data Akun Pengguna</p>
				</a>
			</li>
		</ul>
	</div>
</div>