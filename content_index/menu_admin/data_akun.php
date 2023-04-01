<?php 
	session_start();
	
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['role_user']==""){
		header("location:index.php?pesan=gagal");
	}
 
?>

<!-- TAMBAH DATA USER -->
<?php 
	// cek apakah tombol daftar sudah diklik atau blum?
	if(isset($_POST['simpan'])){

		// ambil data dari formulir
		$role_user = $_POST['role_user'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$nama_user = $_POST['nama_user'];
		$jenis_kelamin_user = $_POST['jenis_kelamin_user'];
		$kelas_jabatan_user = $_POST['kelas_jabatan_user'];
		$nis_nip_user = $_POST['nis_nip_user'];
		$nomor_wa_user = $_POST['nomor_wa_user'];
		
		// buat query
		$data_user = "INSERT INTO user (role_user, username, password, nama_user, jenis_kelamin_user, kelas_jabatan_user, nis_nip_user, nomor_wa_user) 
				VALUE ('$role_user', '$username', '$password', '$nama_user', '$jenis_kelamin_user', '$kelas_jabatan_user', '$nis_nip_user', '$nomor_wa_user')";
		$user = mysqli_query($koneksi, $data_user);

		// apakah query simpan berhasil?
		if( $query ) {
		// kalau berhasil alihkan ke halaman index.php dengan status=sukses
			header('Location: data_akun.php?status=sukses');
		} else {
		// kalau gagal alihkan ke halaman indek.php dengan status=gagal
			header('Location: data_akun.php?status=gagal');
		}
	}
?>
<!-- END TAMBAH DATA  -->


<!-- DELETE DATA -->
<?php

	if( isset($_GET['id_user']) ){

    // ambil id dari query string
    $id = $_GET['id_user'];

    // buat query hapus
    $delete = "DELETE FROM user WHERE id_user=$id";
    $delete_data = mysqli_query($koneksi, $delete);

    // apakah query hapus berhasil?
    if( $delete_data ){
        header('Location: data_akun.php');
    } else {
        die("gagal menghapus...");
    }
	}
?>
<!-- END DELETE DATA -->


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

						<li class="nav-item">
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-layer-group"></i>
								<p>Data Kelas</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
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
						
						<li class="nav-item active">
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
						<h4 class="page-title">Data Akun</h4>
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
								<a href="#">Tabel</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Data Akun</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Data Akun Pengguna</h4>
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
											<i class="fa fa-plus"></i>
											Tambah Akun Baru
										</button>
									</div>
								</div>
								<div class="card-body">
									<!-- Modal -->
									<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Input Data Kelas</span> 
														<span class="fw-light">
															Baru
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<p class="small">Lengkapi Data Dibawah :</p>
													<form method="POST" action="data_akun.php">
														<div class="form-group form-floating-label">
															<select class="form-control input-solid" name="role_user" id="role_user" required="">
																<option value="">&nbsp;</option>
																<option>admin</option>
																<option>guru</option>
																<option>siswa</option>
															</select>
															<label for="role_user" class="placeholder">Pilih Role</label>
														</div>
														<div class="form-group form-floating-label">
															<input id="username" name="username" type="text" class="form-control input-solid" required="">
															<label for="username" class="placeholder">Input Username</label>
														</div>
														<div class="form-group form-floating-label">
															<input id="password" name="password" type="password" class="form-control input-solid" required="">
															<label for="password" class="placeholder">Input Password</label>
														</div>
														<div class="form-group form-floating-label">
															<input id="nama_user" name="nama_user" type="text" class="form-control input-solid" required="">
															<label for="nama_user" class="placeholder">Input Nama User</label>
														</div>
														<div class="form-check">
															<label>Pilih Gender</label><br>
															<label class="form-radio-label" for="jenis_kelamin_user">
																<input class="form-radio-input" type="radio" name="jenis_kelamin_user" value="laki-laki" checked="">
																<span class="form-radio-sign">Laki-Laki</span>
															</label>
															<label class="form-radio-label ml-3" for="jenis_kelamin_user">
																<input class="form-radio-input" type="radio" name="jenis_kelamin_user" value="perempuan">
																<span class="form-radio-sign">Perempuan</span>
															</label>
														</div>
														<div class="form-group form-floating-label">
															<input id="kelas_jabatan_user" name="kelas_jabatan_user" type="text" class="form-control input-solid" required="">
															<label for="kelas_jabatan_user" class="placeholder">Input Kelas/Jabatan User</label>
														</div>
														<div class="form-group form-floating-label">
															<input id="nis_nip_user" name="nis_nip_user" type="number" class="form-control input-solid" required="">
															<label for="nis_nip_user" class="placeholder">Input NIS/NIP</label>
														</div>
														<div class="form-group form-floating-label">
															<input id="nomor_wa_user" name="nomor_wa_user" type="number" class="form-control input-solid" required="">
															<label for="nomor_wa_user" class="placeholder">Input Nomor Whatsapp</label>
														</div>
														<div class="modal-footer no-bd">
															<button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
															<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>

									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>Username</th>
													<th>Password</th>
													<th>Role User</th>
													<th>Nama User</th>
													<th>Jenis Kelamin</th>
													<th>Kelas/Jabatan</th>
													<th>NIS/NIP</th>
													<th>Nomor Whatsapp</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											
											<tbody>
												<?php 
													include('../../koneksi.php');
													$user = mysqli_query($koneksi,"SELECT * from user ORDER BY id_user DESC");
													while($row = mysqli_fetch_array($user))
													{ ?>
												<tr>
													<td><?php echo $row['username']; ?></td>
													<td><?php echo $row['password']; ?></td>
													<td><?php echo $row['role_user']; ?></td>
													<td><?php echo $row['nama_user']; ?></td>
													<td><?php echo $row['jenis_kelamin_user']; ?></td>
													<td><?php echo $row['kelas_jabatan_user']; ?></td>
													<td><?php echo $row['nis_nip_user']; ?></td>
													<td><?php echo $row['nomor_wa_user']; ?></td>
													<td>
														<div class="form-button-action">
																<a href="edit_data_akun.php?id_user=<?=$row['id_user']?>" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Detail akun">
																	<i class="fa fa-edit"></i>
																</a>
																
																<a href="data_akun.php?id_user=<?=$row['id_user']?>" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
																	<i class="fa fa-times"></i>
																</href=>
														</div>
													</td>
												</tr>
												<?php } ?>
											</tbody>
										</table>
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
	<!-- Datatables -->
	<script src="../../assets/js/plugin/datatables/datatables.min.js"></script>
	<!-- Atlantis JS -->
	<script src="../../assets/js/atlantis.min.js"></script>
	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="../../assets/js/setting-demo2.js"></script>
	<script >
		$(document).ready(function() {
			$('#basic-datatables').DataTable({
			});

			$('#multi-filter-select').DataTable( {
				"pageLength": 5,
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
								);

							column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
						} );

						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
			});

			// Add Row
			$('#add-row').DataTable({
				"pageLength": 5,
			});

			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

			$('#addRowButton').click(function() {
				$('#add-row').dataTable().fnAddData([
					$("#addName").val(),
					$("#addPosition").val(),
					$("#addOffice").val(),
					action
					]);
				$('#addRowModal').modal('hide');

			});
		});
	</script>
</body>
</html>