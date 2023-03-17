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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <!-- Load file library jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <!-- Load file library Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

  <!-- Load file library JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">

  <div class="b-example-divider hidden-scrollbar">

  <title>Monitoring Cair Marketing BSI v1</title>

    <header class=" p-3 mb-3 border-bottom">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <nav class="shift navbar-expand-md">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <li><a href="index.html" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                  <img src="https://bsimobile.co.id/wp-content/uploads/2019/09/BSI_Horizontal-Logo_Multiple_Background_07012021-1.png" class="bi me-3" max-width="100%" height="50" role="img" aria-label="Bootstrap">
                  <use xlink:href="#bootstrap" />

                </a></li>
              <li class="dropdown mt-2">
                <a class="nav-link dropdown-toggle px-2 link-dark" href="#" role="button" id="cbrmDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tabel CBRM</a>
                <div class="dropdown-menu" aria-labelledby="cbrmDropdown">
                  <a class="droptbl dropdown-item " href="/CBS">Tabel CBS</a>
                  <a class=" droptbl dropdown-item " href="/CSE">Tabel CSE & CFE</a>
                </div>
              </li>
              <li class="mt-2">
                <a href="/grafik/index.php" class="nav-link px-2 link-dark">Input Harian</a>
              </li>
              <li class="dropdown mt-2">
                <a class="nav-link dropdown-toggle px-2 link-dark" href="#" role="button" id="cbrmDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">View Cair</a>
                <div class="dropdown-menu" aria-labelledby="cbrmDropdown">
                  <a class="droptbl dropdown-item " href="/grafik/tabel_keseluruhan">Data Cair Marketing </a>
                  <a class=" droptbl dropdown-item " href="/grafik/tabel_keseluruhan/outletgraph.php">Grafik Marketing</a>
                  <a class=" droptbl dropdown-item " href="/grafik/login/leaderboard/">Leaderboard Marketing</a>
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


</head>

<div class="card-body">
	<table class="table table-bordered" id="myTable">
		<thead>
			<tr>
				<th scope="col">No</th>
				<th scope="col">Nama Marketing</th>
				<th scope="col">Outlet</th>
				<th scope="col">Target Jabatan</th>
				<th scope="col">Target Outlet</th>
			</tr>
		</thead>
		<tbody>
			<?php
			include('config.php');


			include('config.php');
			//menampilkan data pegawai berdasarkan pilihan combobox ke dalam form
			$no = 1;
			$sql = "SELECT * FROM marketing";
			$tamData = mysqli_query($connect, $sql);
			while ($data = mysqli_fetch_array($tamData)) {

				$no = 1;
				
			?>



				<tr>
					<td><?php echo $no++ ?></td>
					<td><?php echo $data['nama_marketing']; ?></td>
					<td><?php echo $data['nama_outlet']; ?></td>
					<td><?php echo $data['target_jabatan']; ?></td>
					<td><?php echo $data['target_outlet'] ?></td>
				</tr>

			<?php 
			}
			?>
		</tbody>
		<td colspan="3" align="center"><b>Capacity Plan Total</b></td>
		<td><?php
			error_reporting(error_reporting() & ~E_NOTICE);

			if (empty($total_target)) {
				die("Tidak ada data!");
			} else {
				echo $total_target;
			}
			?>
		</td>

		<td><?php
			error_reporting(error_reporting() & ~E_NOTICE);

			if (empty($total_cair)) {
				die("Tidak ada data!");
			} else {
				echo $total_cair;
			}
			?>
		</td>
		<td><?php
			error_reporting(error_reporting() & ~E_NOTICE);

			if (empty($total_cair)) {
				die("Tidak ada data!");
			} else {
				echo $total_cair;
			}
			?>
		</td>
		<td>-</td>
		<td><?php
			error_reporting(error_reporting() & ~E_NOTICE);

			if (empty($total_cair)) {
				die("Tidak ada data!");
			} else {
				echo $total_cair;
			}
			?>
		</td>
		<td><?php
			error_reporting(error_reporting() & ~E_NOTICE);

			if (empty($total_persen)) {
				die("Tidak ada data!");
			} else {
				echo $total_persen . "%";
			}
			?>
		</td>

	</table>
</div>
</div>
</div>
</div>
<div>

</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
</script>


</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>