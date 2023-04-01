<?php 
	session_start();
 	include('../../koneksi.php');
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['role_user']==""){
		header("location:index.php?pesan=gagal");
	}
 
?>

<!-- Tampilkan Data -->
<?php
	

	if( isset($_GET['id_siswa']) ){

	//ambil id dari query string
	$id = $_GET['id_siswa'];
	
	// buat query untuk ambil data dari database
	$sql = "SELECT * FROM tabel_siswa WHERE id_siswa=$id";
	$query = mysqli_query($koneksi, $sql);
	$siswa = mysqli_fetch_assoc($query);

	// jika data yang di-edit tidak ditemukan
	if( mysqli_num_rows($query) < 1 ){
		die("data tidak ditemukan...");
	}
}
?>

<?php
	
	// cek apakah tombol simpan sudah diklik atau blum?
	if(isset($_POST['update'])){

		// ambil data dari formulir
		$id = $_POST['id_siswa'];
		$nis_siswa = $_POST['nis_siswa'];
		$nama_siswa = $_POST['nama_siswa'];
		$jenis_kelamin = $_POST['jenis_kelamin'];
		$tingkatan_kelas = $_POST['tingkatan_kelas'];
		$kategori_kelas = $_POST['kategori_kelas'];
		
		// buat query update
		
		$sql = "UPDATE tabel_siswa 
				SET nis_siswa='$nis_siswa', nama_siswa='$nama_siswa', jenis_kelamin='$jenis_kelamin', tingkatan_kelas='$tingkatan_kelas', kategori_kelas='$kategori_kelas'
				WHERE id_siswa=$id";
		$query = mysqli_query($koneksi, $sql);
		
		// apakah query update berhasil?
		if( $query ) {
			// kalau berhasil alihkan ke halaman list-siswa.php
			header('Location: data_siswa.php');
		} else {
			// kalau gagal tampilkan pesan
			die("Gagal menyimpan perubahan...");
		}


	}
	

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>DATA AKUN</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../../assets/img/icon.ico" type="image/x-icon"/>
	
	<!-- Fonts and icons -->
	<script src="../../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../../assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../assets/css/atlantis.min.css">
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../../assets/css/demo.css">
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">
				
				<a href="../index.html" class="logo">
					<img src="../../assets/img/logo.svg" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
				
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</form>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="/../../assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="../../assets/img/profile.jpg" alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4>Hizrian</h4>
												<p class="text-muted">hello@example.com</p><a href="profile.html" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">My Profile</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">Logout</a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>
		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="../../assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?php echo $_SESSION['username'];
									?>
								<span class="user-level"><?php echo $_SESSION['role_user'];
									?></span>
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
						<li class="nav-item">
							<a href="../index_admin.php" class="collapsed" aria-expanded="false">
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

						<li class="nav-item active">
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-layer-group"></i>
								<p>Data Kelas</p>
								<span class="caret"></span>
							</a>
							<div class="collapse show" id="base">
								<ul class="nav nav-collapse">
									<li>
										<a href="data_kelas.php">
											<span class="sub-item">Kelas</span>
										</a>
									</li>
									<li>
										<a href="data_kategori.php">
											<span class="sub-item">Kategori Kelas</span>
										</a>
									</li>
									<li>
										<a href="data_siswa.php">
											<span class="sub-item">Data Siswa</span>
										</a>
									</li>
								</ul>
							</div>
						</li>	

						<li class="nav-item ">
							<a href="data_mata_pelajaran.php">
								<i class="fas fa-layer-group"></i>
								<p>Daftar Mata Pelajaran</p>
							</a>
						</li>
						
						<li class="nav-item">
							<a href="data_akun.php">
								<i class="fas fa-layer-group"></i>
								<p>Data Akun Pengguna</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- end sidebar -->

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Data Siswa</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="../index_admin.php">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Edit</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Edit Data Siswa</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Edit Data Siswa</h4>
									</div>
								</div>
								<div class="card-body">
                                    <div class="col-lg-12">
                                        <form method="POST" action="edit_data_siswa.php">
											<fieldset>
											<div class="card-mb-8">
												<div class="card mb-4">
													<div class="card-body">
														<div class="row">
															<div class="col-sm-1">
																<input type="hidden" name="id_siswa" value="<?php echo $siswa['id_siswa'] ?>" />
															</div>
														</div>
														
														<div class="row">
															<div class="col-sm-3">
																<p >NIS Siswa &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:	</p>
															</div>
															<div class="col-sm-7">
																<input class="text-muted mb-0 form-control input-solid" 
																style="border:none " id="nis_siswa" 
																name="nis_siswa"  value="<?php echo $siswa['nis_siswa'];?>"
																type="text" required="">
															</div>
														</div>
														<hr>

														<div class="row">
															<div class="col-sm-3">
																<p >Nama Siswa &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:	</p>
															</div>
															<div class="col-sm-7">
																<input class="text-muted mb-0 form-control input-solid" 
																style="border:none " id="nama_siswa" 
																name="nama_siswa"  value="<?php echo $siswa['nama_siswa'];?>"
																type="text" required="">
															</div>
														</div>
														<hr>

														<div class="row">
															<div class="col-sm-3">
																<p >Jenis_Kelamin &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:	</p>
															</div>
															<div class="col-sm-7">
																<label class="form-radio-label" for="jenis_kelamin">
																	<input class="form-radio-input" type="radio" name="jenis_kelamin" value="laki-laki" <?php if($siswa['jenis_kelamin']=='laki-laki') echo 'checked'?>>
																	<span class="form-radio-sign">Laki-Laki</span>
																</label>
																<label class="form-radio-label ml-3" for="jenis_kelamin">
																	<input class="form-radio-input" type="radio" name="jenis_kelamin" value="perempuan" <?php if($siswa['jenis_kelamin']=='perempuan') echo 'checked'?>>
																	<span class="form-radio-sign">Perempuan</span>
																</label>
															</div>
														</div>
														<hr>

														<div class="row">
															<div class="col-sm-3">
																<p >Tingkatan Kelas &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:	</p>
															</div>
															
															<div class="form-group form-floating-label col-sm-7">
																	<select name="tingkatan_kelas" class="form-control input-solid" id="selectFloatingLabel2" required="">
																		<option value="<?php echo $siswa['tingkatan_kelas']?>"><?php echo $siswa['tingkatan_kelas']?></option>
																		<?php
																			$data1 = mysqli_query($koneksi,"SELECT * from tabel_kelas");
																			while($kelas = mysqli_fetch_array($data1))
																			{ 
																				if ($siswa['tingkatan_kelas']==$kelas['tingkatan_kelas']) {
																					$select="selected";
																				}else{
																					$select="";
																					}
																					echo "<option $select>".$kelas['tingkatan_kelas']."</option>";	
																				?>
																				
																			<?php } ?> 
																	</select>														
															</div>
														</div>
														<hr>

														<div class="row">
															<div class="col-sm-3">
																<p >Kategori Kelas &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:	</p>
															</div>
															
															<div class="form-group form-floating-label col-sm-7">
																	<select name="kategori_kelas" class="form-control input-solid" id="selectFloatingLabel2" required="">
																		<option value="<?php echo $siswa['kategori_kelas']?>"><?php echo $siswa['kategori_kelas']?></option>
																		<?php
																			$data1 = mysqli_query($koneksi,"SELECT * from tabel_kategori");
																			while($kategori = mysqli_fetch_array($data1))
																			{ 
																				if ($siswa['kategori_kelas']==$kategori['kategori_kelas']) {
																					$select="selected";
																				}else{
																					$select="";
																					}
																					echo "<option $select>".$kategori['kategori_kelas']."</option>";	
																				?>
																				
																			<?php } ?> 
																	</select>														
															</div>
														</div>
										
														<div class="modal-footer no-bd">
															<button type="submit" name="update" class="btn btn-primary">
																Simpan Perubahan</a>
															</button>
														</div>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>		
							</div>
						</div>				
					</div>
				</div>
			</div>
			            

			<footer class="footer">
				<?php
					include('includes/../../../layout/footer.php');
				?>
			</footer>
		</div>
	</div>

	<!--   Core JS Files   -->
	<script src="../../assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="../../assets/js/core/popper.min.js"></script>
	<script src="../../assets/js/core/bootstrap.min.js"></script>
	<!-- jQuery UI -->
	<script src="../../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
	
	<!-- jQuery Scrollbar -->
	<script src="../../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

	<!-- Atlantis JS -->
	<script src="../../assets/js/atlantis.min.js"></script>
	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="../../assets/js/setting-demo2.js"></script>
	
</body>
</html>