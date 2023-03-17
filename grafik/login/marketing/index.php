<?php

// Start the session
//session_start();

// Check if the user is logged in
//if (!isset($_SESSION["nip"])) {
//  header("Location: /grafik/login/login.php");
//  exit();
//}





?>

<head>
  <!-- Load file CSS Bootstrap -->
  <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
  <link rel="stylesheet" href="/assets/bootstrap/4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="/assets/bootstrap/4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link href="/assets/bootstrap/4.5.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link href="/assets/bootstrap/5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/style.css">

  <!-- Load file library jQuery -->
  <script src="/assets/jquery/3.5.1.slim.min.js" crossorigin="anonymous"></script>
  <script src="/assets/jquery/3.3.1.slim.min.js"  crossorigin="anonymous"></script>

  <!-- Load file library Popper JS -->
  <script src="/assets/popper.js/2.9.3/dist/umd/popper.min.js"></script>

  <!-- Load file library JavaScript -->
  <script src="/assets/bootstrap/4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</head>

  



<body>
<div class="b-example-divider hidden-scrollbar">

  <title>Monitoring Cair Marketing BSI v1</title>

    <header class=" p-3 mb-3 border-bottom">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <nav class="shift navbar-expand-md">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <li><a href="/index.html" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                  <img src="https://bsimobile.co.id/wp-content/uploads/2019/09/BSI_Horizontal-Logo_Multiple_Background_07012021-1.png" class="bi me-3" max-width="100%" height="50" role="img" aria-label="Bootstrap">
                  <use xlink:href="/grafik/index.php/" />

                </a></li>
              <li class="dropdown mt-2">
                <a class="nav-link dropdown-toggle px-2 link-dark" href="#" role="button" id="cbrmDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">CBRM</a>
                <div class="dropdown-menu" aria-labelledby="cbrmDropdown">
                  <a class="droptbl dropdown-item " href="/CBS">CBS</a>
                  <a class=" droptbl dropdown-item " href="/CSE">CSE & CFE</a>
                </div>
              </li>
              <li class="mt-2">
                <a href="/grafik/index.php" class="nav-link px-2 link-dark">Input Harian</a>
              </li>
              <li class="dropdown mt-2">
                <a class="nav-link dropdown-toggle px-2 link-dark" href="#" role="button" id="cbrmDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">View Cair</a>
                <div class="dropdown-menu" aria-labelledby="cbrmDropdown">
                  <a class="droptbl dropdown-item " href="/grafik/tabel_keseluruhan">Data Cair Marketing </a>
                  <a class=" droptbl dropdown-item " href="/grafik/tabel_keseluruhan/outletgraph.php">Grafik Performance</a>
                  <a class=" droptbl dropdown-item " href="/grafik/login/leaderboard/index.php">Print Leaderboard Marketing</a>
                  <a class=" droptbl dropdown-item " href="/grafik/login/leaderboard/cabang.php">Print Leaderboard Outlet</a>
                </div>
              </li>
              <li class="dropdown mt-2">
                <a class="nav-link dropdown-toggle px-2 link-dark" href="#" role="button" id="cbrmDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Data</a>
                <div class="dropdown-menu" aria-labelledby="cbrmDropdown">
                  <a class="droptbl dropdown-item " href="/grafik/login/marketing/">Tambah Marketing</a>
                  <a class=" droptbl dropdown-item " href="/grafik/login/outlet">Tambah Outlet</a>
                </div>
              </li>
            </ul>
          </nav>


        </div>
      </div>

  </div>
  </header>
<div class="container" style="margin-top: 150px">
<center><h2> INFORMASI MARKETING </h2></center>
				<div class="card-body">
					<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambah_data"><i class="fa fa-male"></i>Tambah Marketing</a><br /><br />
					<!-- modal insert -->
					<div class="example-modal">
						<div id="tambah_data" class="modal fade" role="dialog" style="display:none;">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h3 class="modal-title fs-">Add Data</h3>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									</div>
									<div class="modal-body">
										<form action="/grafik/login/marketing/process_marketing.php?act=tambah_data" method="post" role="form" enctype="multipart/form-data">
											<div class="form-group">
												<div class="row">
													<label class="col-sm-3 control-label text-right">Nama Marketing<span class="text-red">*</span></label>
													<div class="col-sm-8">
														<input type="text" class="form-control" name="nama_marketing" placeholder="Masukkan Nama Marketing" value="">
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="row">
													<label class="col-sm-3 control-label text-right"> Nama<br />Outlet<span class="text-red">*</span></label>
													<div class="col-sm-8">
														<select name="nama_outlet" class="form-select" aria-label="Default select example" style="width: 100%;" onchange="getTargetOutlet(this.value)">
															<option value="">Pilih Outlet</option>
															<?php
															include "config.php";
															//query menampilkan nama_outlet ke dalam combobox
															$query    = mysqli_query($connect, "SELECT * FROM outlet ORDER BY id_outlet");
															while ($data = mysqli_fetch_array($query)) {
															?>
																<option value="<?= $data['nama_outlet']; ?>"><?php echo $data['nama_outlet']; ?></option>
															<?php
															}
															?>
														</select>
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="row">
													<label class="col-sm-3 control-label text-right">Target Jabatan<span class="text-red">*</span></label>
													<div class="col-sm-8">
														<input type="text" name="target_jabatan" class="form-control" value="" id="" placeholder="Masukkan Target Jabatan">
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="row">
													<label class="col-sm-3 control-label text-right">Photo<span class="text-red">*</span></label>
													<div class="col-sm-8">
														<input type="file" name="photo" accept="image/*" class="form-control">
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button id="nosave" type="button" class="btn btn-cancel" data-dismiss="modal">Batal</button>
												<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
											</div>

										</form>



									</div>
								</div>
							</div>
						</div>
					</div><!-- modal insert close -->
					<table class="table table-bordered" id="myTable">
						<thead>
							<tr>
								<th scope="col">Nama Marketing <a href="?sort=nama_marketing_asc"><img src="https://img.icons8.com/ios-filled/10/1A1A1A/long-arrow-up.png" /></a><a href="?sort=nama_marketing_desc"><img src="https://img.icons8.com/ios-filled/10/1A1A1A/long-arrow-down.png" /></a></th>
								<th scope="col">Outlet <a href="?sort=nama_outlet_asc"><img src="https://img.icons8.com/ios-filled/10/1A1A1A/long-arrow-up.png" /></a><a href="?sort=nama_outlet_desc"><img src="https://img.icons8.com/ios-filled/10/1A1A1A/long-arrow-down.png" /></a> </th>
								<th scope="col">Target Marketing <a href="?sort=target_jabatan_asc"><img src="https://img.icons8.com/ios-filled/10/1A1A1A/long-arrow-up.png" /></a><a href="?sort=target_jabatan_desc"><img src="https://img.icons8.com/ios-filled/10/1A1A1A/long-arrow-down.png" /></a> </th>
								<th scope="col">Target Outlet <a href="?sort=target_outlet_asc"><img src="https://img.icons8.com/ios-filled/10/1A1A1A/long-arrow-up.png" /></a><a href="?sort=target_outlet_desc"><img src="https://img.icons8.com/ios-filled/10/1A1A1A/long-arrow-down.png" /></a> </th>

							</tr>
						</thead>
						<tbody>
							<?php
							//menampilkan data pegawai berdasarkan pilihan combobox ke dalam form
							$no = 1;
							$sort = "";
							// Number of items per page
							$perPage = 5;

							// Retrieve the total number of records
							$totalRecordsQuery = mysqli_query($connect, "SELECT COUNT(*) as totalRecords FROM marketing");
							$totalRecordsData = mysqli_fetch_array($totalRecordsQuery);
							$totalRecords = $totalRecordsData['totalRecords'];

							// Calculate the total number of pages based on the number of records and the number of records per page
							$totalPages = ceil($totalRecords / $perPage);

							// Get the current page number, default to 1 if not set
							$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

							// Calculate the starting index for the records on the current page
							$startIndex = ($currentPage - 1) * $perPage;

							// Retrieve the records for the current page
							$marketingQuery = mysqli_query($connect, "SELECT * FROM marketing JOIN outlet ON marketing.nama_outlet = outlet.nama_outlet LIMIT $startIndex, $perPage");

							if (isset($_GET['sort'])) {
								$sort = $_GET['sort'];
							}
							$sql = "SELECT marketing.id_marketing, marketing.nama_marketing, marketing.target_jabatan, outlet.nama_outlet, outlet.target_outlet FROM marketing
      JOIN outlet ON marketing.nama_outlet = outlet.nama_outlet";
							switch ($sort) {
								case "nama_marketing_asc":
									$sql .= " ORDER BY nama_marketing ASC LIMIT $startIndex, $perPage";
									break;
								case "nama_marketing_desc":
									$sql .= " ORDER BY nama_marketing DESC LIMIT $startIndex, $perPage";
									break;
								case "nama_outlet_asc":
									$sql .= " ORDER BY nama_outlet ASC LIMIT $startIndex, $perPage";
									break;
								case "nama_outlet_desc":
									$sql .= " ORDER BY nama_outlet DESC LIMIT $startIndex, $perPage";
									break;
								case "target_jabatan_asc":
									$sql .= " ORDER BY target_jabatan ASC LIMIT $startIndex, $perPage";
									break;
								case "target_jabatan_desc":
									$sql .= " ORDER BY target_jabatan DESC LIMIT $startIndex, $perPage";
									break;
								case "target_outlet_asc":
									$sql .= " ORDER BY target_outlet ASC LIMIT $startIndex, $perPage";
									break;
								case "target_outlet_desc":
									$sql .= " ORDER BY target_outlet DESC LIMIT $startIndex, $perPage";
									break;
								default:
									$sql .= " ORDER BY nama_marketing ASC LIMIT $startIndex, $perPage";
								break;
							}

							$tamData = mysqli_query($connect, $sql);
							while ($tdat = mysqli_fetch_array($tamData)) {
								$id = $tdat['id_marketing'];
								$nama_marketing = $tdat['nama_marketing'];
								$outlet = $tdat['nama_outlet'];
								$target_jabatan = $tdat['target_jabatan'];
								$target_outlet = $tdat['target_outlet'];

								$target_jabatan_format = "Rp " . number_format($tdat['target_jabatan'], 0, ',', '.');
								$target_outlet_format = "Rp " . number_format($tdat['target_outlet'], 0, ',', '.');
							?>

								<tr>
									<td><?php echo $tdat['nama_marketing'] ?></td>
									<td><?php echo $tdat['nama_outlet'] ?></td>
									<td><?php echo $target_jabatan_format ?></td>
									<td><?php echo $target_outlet_format ?></td>
									<td>
										<button type="button" class="btn btn-edit" data-toggle="modal" data-target="#my<?php echo $id; ?>">
											<img src="https://img.icons8.com/ios-filled/30/FFFFFF/pencil--v1.png" style="max-width: 25px; height: auto;"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
										</button>

										<!-- Modal -->
										<div class="example-modal">
											<div class="modal fade" id="my<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h3 class="modal-title" id="myModalLabel">Edit Data</h3>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
														</div>
														<div class="modal-body">
															<form action="/grafik/login/marketing/process_edit_marketing.php" method="POST" role="form" enctype="multipart/form-data">
																<div class="form-group">
																	<div class="row">
																		<label class="col-sm-3 control-label text-right">Nama Marketing<span class="text-red">*</span></label>
																		<div class="col-sm-8">
																			<input type="hidden" name="id_marketing" value="<?php echo $id ?>">
																			<input type="text" name="nama_marketing" class="form-control" value="<?php echo $nama_marketing ?>" placeholder="Input field">
																		</div>
																	</div>
																</div>
																<div class="form-group">
																	<div class="row">
																		<label class="col-sm-3 control-label text-right"> Nama<br />Outlet<span class="text-red">*</span></label>
																		<div class="col-sm-8">
																			<select name="nama_outlet" class="form-select" aria-label="Default select example" style="width: 100%;" onchange="getTargetOutlet(this.value)">
																				<option value="">Pilih Outlet</option>
																				<?php
																				include "config.php";
																				//query menampilkan nama_outlet ke dalam combobox
																				$query    = mysqli_query($connect, "SELECT * FROM outlet ORDER BY id_outlet");
																				while ($data = mysqli_fetch_array($query)) {
																				?>
																					<option value="<?php echo $data['nama_outlet']; ?>"><?php echo $data['nama_outlet']; ?></option>
																				<?php
																				}
																				?>
																			</select>
																		</div>
																	</div>
																</div>
																<div class="form-group">
																	<div class="row">
																		<label class="col-sm-3 control-label text-right">Target Jabatan<span class="text-red">*</span></label>
																		<div class="col-sm-8"><input type="text" name="target_jabatan" class="form-control" value="<?php echo $target_jabatan ?>" placeholder="Masukkan Target Jabatan"></div>
																	</div>
																	<div class="form-group">
																		<div class="row">
																			<label class="col-sm-3 control-label text-right">Foto Outlet<span class="text-red">*</span></label>
																			<div class="col-sm-8">
																				<input type="file" name="photo" class="form-control">
																				<input type="hidden" name="current_photo" value="<?php echo $data['photo']; ?>">
																			</div>
																		</div>
																	</div>
																	<div class="modal-footer">
																		<button type="button" class="btn btn-cancel" data-dismiss="modal">Close</button>
																		<input type="submit" name="update" value="Update" class="btn btn-primary">

															</form>
														</div>
													</div>
												</div>
											</div>
										</div>
									</td>
								</tr>

							<?php }
							?>
						</tbody>
					</table>
					<div class="col-sm-12">
				<ul class="pagination justify-content-end">
					<?php if ($currentPage > 1) { ?>
					<li class="page-item"><a class="page-link" href="?page=<?php echo $currentPage - 1; ?>">&laquo;</a></li>
					<?php } ?>
					<?php for ($i = 1; $i <= $totalPages; $i++) { ?>
					<li class="page-item<?php if ($i == $currentPage) echo ' active'; ?>"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
					<?php } ?>
					<?php if ($currentPage < $totalPages) { ?>
					<li class="page-item"><a class="page-link" href="?page=<?php echo $currentPage + 1; ?>">&raquo;</a></li>
					<?php } ?>
				</ul>
				</div>
				</div>
			</div>
			<br />
		</div>
	</div>
</div>
	

<div class="">
    <footer class="footer">
      <ul class="nav justify-content-left pb-4 mb-4">
        <li class="nav-item"><a href="#" class="nav-link px-2 ">© 2023 PT. Bank Syariah Indonesia</a></li>
      </ul>
    </footer>
  </div>

	</body>

	</html>