<!DOCTYPE html>
<html>

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
		<script src="/assets/jquery/3.3.1.slim.min.js" crossorigin="anonymous"></script>
		
		<!-- Load file library Popper JS -->
		<script src="/assets/popper.js/2.9.3/dist/umd/popper.min.js"></script>

		<!-- Load file library JavaScript -->
		<script src="/assets/bootstrap/4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

		<script src="/assets/highcharts/highcharts.js"></script>
		<script src="/assets/highcharts/modules/exporting.js"></script>
		<script src="/assets/highcharts/modules/export-data.js"></script>

	</head>

<body class="body-graph">
<div class="b-example-divider hidden-scrollbar">

<title>Monitoring Cair Marketing BSI v1</title>

<header class=" p-3 mb-3 border-bottom">
  <div class="container">
	<div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
	  <nav class="shift navbar-expand-md">
		<ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
		  <li><a href="/index.html" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
			  <img src="https://bsimobile.co.id/wp-content/uploads/2019/09/BSI_Horizontal-Logo_Multiple_Background_07012021-1.png" class="bi me-3" max-width="100%" height="50" role="img" aria-label="Bootstrap">
			  <use xlink:href="/CSE/index.php/" />

			</a></li>
		  <li class="dropdown mt-2">
			<a class="nav-link dropdown-toggle px-2 link-dark" href="#" role="button" id="cbrmDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">CSE & CFE</a>
			<div class="dropdown-menu" aria-labelledby="cbrmDropdown">
			  <a class="droptbl dropdown-item " href="/grafik">CBRM</a>
			  <a class=" droptbl dropdown-item " href="/CBS">CBS</a>
			</div>
		  </li>
		  <li class="mt-2">
			<a href="/CSE/index.php" class="nav-link px-2 link-dark">Input Harian</a>
		  </li>
		  <li class="dropdown mt-2">
			<a class="nav-link dropdown-toggle px-2 link-dark" href="#" role="button" id="cbrmDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">View Cair</a>
			<div class="dropdown-menu" aria-labelledby="cbrmDropdown">
			  <a class="droptbl dropdown-item " href="/CSE/tabel_keseluruhan">Data Cair Marketing </a>
			  <a class=" droptbl dropdown-item " href="/CSE/tabel_keseluruhan/outletgraph.php">Grafik Performance</a>
			  <a class=" droptbl dropdown-item " href="/CSE/leaderboard/index.php">Print Leaderboard Marketing</a>
			  <a class=" droptbl dropdown-item " href="/CSE/leaderboard/cabang.php">Print Leaderboard Outlet</a>
			</div>
		  </li>
		  <li class="dropdown mt-2">
			<a class="nav-link dropdown-toggle px-2 link-dark" href="#" role="button" id="cbrmDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Data</a>
			<div class="dropdown-menu" aria-labelledby="cbrmDropdown">
			  <a class="droptbl dropdown-item " href="/CSE/marketing/">Tambah Marketing</a>
			  <a class=" droptbl dropdown-item " href="/CSE/outlet">Tambah Outlet</a>
			</div>
		  </li>
		</ul>
	  </nav>


	</div>
  </div>

</div>
</header>
	<div class="container" style="margin-top: 120px">
		<center>
			<h1>Performance Review All Marketing and Outlet</h1>
		</center>
		<br />
		<form method="post" class="form-inline">
				<div class="form-group">
					<label for="bulan"></label>
					<select id="bulan" name="bulan" class="form-control">
						<option value="" <?php if (!isset($_POST['bulan'])) echo "selected"; ?>>Select Month</option>
						<option value="01" <?php if (isset($_POST['bulan']) && $_POST['bulan'] == "01") echo "selected"; ?>>January</option>
						<option value="02" <?php if (isset($_POST['bulan']) && $_POST['bulan'] == "02") echo "selected"; ?>>February</option>
						<option value="03" <?php if (isset($_POST['bulan']) && $_POST['bulan'] == "03") echo "selected"; ?>>March</option>
						<option value="04" <?php if (isset($_POST['bulan']) && $_POST['bulan'] == "04") echo "selected"; ?>>April</option>
						<option value="05" <?php if (isset($_POST['bulan']) && $_POST['bulan'] == "05") echo "selected"; ?>>May</option>
						<option value="06" <?php if (isset($_POST['bulan']) && $_POST['bulan'] == "06") echo "selected"; ?>>June</option>
						<option value="07" <?php if (isset($_POST['bulan']) && $_POST['bulan'] == "07") echo "selected"; ?>>July</option>
						<option value="08" <?php if (isset($_POST['bulan']) && $_POST['bulan'] == "08") echo "selected"; ?>>August</option>
						<option value="09" <?php if (isset($_POST['bulan']) && $_POST['bulan'] == "09") echo "selected"; ?>>September</option>
						<option value="10" <?php if (isset($_POST['bulan']) && $_POST['bulan'] == "10") echo "selected"; ?>>October</option>
						<option value="11" <?php if (isset($_POST['bulan']) && $_POST['bulan'] == "11") echo "selected"; ?>>November</option>
						<option value="12" <?php if (isset($_POST['bulan']) && $_POST['bulan'] == "12") echo "selected"; ?>>December</option>
					</select>
				</div>
				<div class="form-group">
					<label for="tahun"> </label>
					<select id="tahun" name="tahun" class="form-control">
						<option value="" disabled selected>Select Year</option>
						<?php for ($i = date("Y"); $i >= 2021; $i--) { ?>
							<option value="<?php echo $i ?>" <?php if ($i == date("Y")) echo "selected"; ?>><?php echo $i ?></option>
						<?php } ?>
					</select>
				</div>
				<button type="submit" name="submit" class="btn">Filter</button>
			</form>
	</div>
	</div>
	</div>
	<br /><br />
	<div id="month" class="tab-pane active">
		<div class="row">
			<div class="col-md-6">
				<div id="container-outlet"></div>
			</div>
			<div class="col-md-6">
				<div id="container-year"></div>
			</div>
			<div class="col-md-6">
				<div id="container-month-marketing"></div>
			</div>
			<div class="col-md-6">
				<div id="container-year-marketing"></div>
			</div>


			<div id="year" class="tab-pane fade">
				<h3>Graph by Year</h3>
				<div id="container-year"></div>
			</div>
		</div>

	</div>

	<div id="container-outlet"></div>

	<script>
		document.addEventListener('DOMContentLoaded', function() {
			var bulan = document.getElementById("bulan");

			bulan.addEventListener("change", function() {

			});
		});
	</script>

	<?php
	include 'databulanoutlet.php';
	?>
	</div>

	<div id="container-year"></div>

	<script>
		document.addEventListener('DOMContentLoaded', function() {
			var bulan = document.getElementById("tahun");

			bulan.addEventListener("change", function() {

			});
		});
	</script>

	<?php
	include 'datatahunoutlet.php';
	?>
	</div>

	<div id="container-month-marketing"></div>

	<script>
		document.addEventListener('DOMContentLoaded', function() {
			var bulan = document.getElementById("bulan");

			bulan.addEventListener("change", function() {

			});
		});
	</script>

	<?php
	include 'data.php';
	?>
	</div>

	<div id="container-year-marketing"></div>

	<script>
		document.addEventListener('DOMContentLoaded', function() {
			var bulan = document.getElementById("tahun");

			bulan.addEventListener("change", function() {

			});
		});
	</script>

	<?php
	include 'datatahun.php';
	?>
	</div>

</body>

</html>