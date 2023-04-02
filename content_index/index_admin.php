<?php
session_start();
include('../koneksi.php');
// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['role_user'] == "") {
	header("location:index.php?pesan=gagal");
}

?>

<!-- menghitung jumlah data -->
<?php
// Query untuk menghitung jumlah data akun
$akun = "SELECT COUNT(*) as jumlah_akun FROM user";
$jumlah_akun = mysqli_query($koneksi, $akun);
$data_akun = mysqli_fetch_assoc($jumlah_akun);

// Query untuk menghitung jumlah data siswa
$siswa = "SELECT COUNT(*) as jumlah_siswa FROM tabel_siswa";
$jumlah_siswa = mysqli_query($koneksi, $siswa);
$data_siswa = mysqli_fetch_assoc($jumlah_siswa);

// Query untuk menghitung jumlah data mapel
$mapel = "SELECT COUNT(*) as jumlah_mapel FROM tabel_mapel";
$jumlah_mapel = mysqli_query($koneksi, $mapel);
$data_mapel = mysqli_fetch_assoc($jumlah_mapel);

// Query untuk menghitung jumlah data guru
$guru = "SELECT COUNT(*) as jumlah_guru FROM user WHERE role_user = 'guru' ";
$jumlah_guru = mysqli_query($koneksi, $guru);
$data_guru = mysqli_fetch_assoc($jumlah_guru);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Dashboard Admin</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../../assets/img/icon.ico" type="image/x-icon" />

	<!-- Fonts and icons -->
	<script src="../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Lato:300,400,700,900"]
			},
			custom: {
				"families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
				urls: ['../assets/css/fonts.min.css']
			},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../assets/css/demo.css">
</head>

<body>
	<div class="wrapper">
		<div class="main-header">
			<?php
			include('includes/../../layout/navbar.php');
			?>
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="../assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?php echo $_SESSION['username']; ?>
									<span class="user-level"><?php echo $_SESSION['role_user']; ?></span>
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
							<a data-toggle="collapse" href="../index_admin.php" class="collapsed" aria-expanded="false">
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

						<li class="nav-item">
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-layer-group"></i>
								<p>Data Kelas</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
									<li>
										<a href="menu_admin/data_kelas.php">
											<span class="sub-item">Kelas</span>
										</a>
									</li>
									<li>
										<a href="menu_admin/data_kategori.php">
											<span class="sub-item">Kategori Kelas</span>
										</a>
									</li>
									<li>
										<a href="menu_admin/data_siswa.php">
											<span class="sub-item">Data Siswa</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

						<li class="nav-item">
							<a href="menu_admin/data_mata_pelajaran.php">
								<i class="fas fa-layer-group"></i>
								<p>Daftar Mata Pelajaran</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="menu_admin/data_akun.php">
								<i class="fas fa-layer-group"></i>
								<p>Data Akun Pengguna</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<!-- header -->
				<div class="panel-header bg-primary-gradient">
					<?php
					include('includes/../../layout/header.php');
					?>
				</div>
				<!-- end header -->

				<!-- content -->
				<div class="page-inner mt--5">
					<div class="row mt--2">
						<div class="col-md-12">
							<div class="card full-height">
								<div class="card-body">
									<div class="row">
										<div class="col-sm-6 col-md-3">
											<div class="card card-stats card-primary card-round">
												<div class="card-body">
													<div class="row">
														<div class="col-5">
															<div class="icon-big text-center">
																<i class="flaticon-users"></i>
															</div>
														</div>
														<div class="col-7 col-stats">
															<div class="numbers">
																<p class="card-category">Jumlah Akun</p>
																<h4 class="card-title"><?php echo $data_akun['jumlah_akun']; ?> </h4>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-sm-6 col-md-3">
											<div class="card card-stats card-info card-round">
												<div class="card-body">
													<div class="row">
														<div class="col-5">
															<div class="icon-big text-center">
																<i class="flaticon-users"></i>
															</div>
														</div>
														<div class="col-7 col-stats">
															<div class="numbers">
																<p class="card-category">Jumlah Siswa</p>
																<h4 class="card-title"><?php echo $data_siswa['jumlah_siswa']; ?></h4>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-sm-6 col-md-3">
											<div class="card card-stats card-success card-round">
												<div class="card-body ">
													<div class="row">
														<div class="col-5">
															<div class="icon-big text-center">
																<i class="flaticon-interface-6"></i>
															</div>
														</div>
														<div class="col-7 col-stats">
															<div class="numbers">
																<p class="card-category">Mata Pelajaran</p>
																<h4 class="card-title"><?php echo $data_mapel['jumlah_mapel']; ?></h4>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-sm-6 col-md-3">
											<div class="card card-stats card-secondary card-round">
												<div class="card-body ">
													<div class="row">
														<div class="col-5">
															<div class="icon-big text-center">
																<i class="flaticon-success"></i>
															</div>
														</div>
														<div class="col-7 col-stats">
															<div class="numbers">
																<p class="card-category">Jumlah Guru</p>
																<h4 class="card-title"><?php echo $data_guru['jumlah_guru']; ?></h4>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="card-title">Selamat Datang <?php echo $_SESSION['username']; ?></div>
									<div class="card-category">Anda bisa mengelola data user, kelas dan juga mata pelajaran.

									</div>
									<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- end content -->
			</div>
			<footer class="footer">
				<?php
				include('includes/../../layout/footer.php');
				?>
			</footer>
		</div>
	</div>
	<!--   Core JS Files   -->
	<script src="../assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="../assets/js/core/popper.min.js"></script>
	<script src="../assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Chart JS -->
	<script src="../assets/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="../assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>


	<!-- Datatables -->
	<script src="../assets/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="../assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- Sweet Alert -->
	<script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="../assets/js/atlantis.min.js"></script>

</body>

</html>