<?php

include "config.php";



$query    = mysqli_query($connect, "SELECT * FROM marketing ORDER BY id_marketing");
$data = mysqli_fetch_array($query);

$hostname = $_SERVER['HTTP_HOST'];
$ip = gethostbyname($hostname);
$server_info = array('hostname' => $hostname, 'ip' => $ip);

$_SERVER["document_root"] = 'localhost/grafik';



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


<body class="body">
<div class="b-example-divider hidden-scrollbar">

<title>Monitoring Cair Marketing BSI v1</title>

<header class=" p-3 mb-3 border-bottom">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <nav class="shift navbar-expand-md">
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="/index.html" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
              <img src="https://bsimobile.co.id/wp-content/uploads/2019/09/BSI_Horizontal-Logo_Multiple_Background_07012021-1.png" class="bi me-3" max-width="100%" height="50" role="img" aria-label="Bootstrap">
              <use xlink:href="/grafik/" />

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
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="get">
              <select onchange="this.form.submit();" class="form-select" name="nama" aria-label="Default select example">
                <option value="Nama Marketing">Pilih Nama Marketing</option>
                <?php
                include "config.php";
                //query menampilkan nama marketing ke dalam combobox
                $query    = mysqli_query($connect, "SELECT DISTINCT nama_marketing FROM marketing ORDER BY id_marketing");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                  <option value="<?= $data['nama_marketing']; ?>"><?php echo $data['nama_marketing']; ?></option>

                <?php
                }
                ?>
              </select>
          </div>
          </form>

        </div>
        <div class="card-body">
          <a href="#" class="btn" data-toggle="modal" data-target="#tambah_data"><i class="fa fa-male"></i>Input Data</a><br /><br />
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
                    <form action="/grafik/proses-tambah.php?act=tambah_data" method="post" role="form">
                      <div class="form-group">
                        <div class="row">
                          <label class="col-sm-3 control-label text-right">Date<span class="text-red">*</span></label>
                          <div class="col-sm-8">
                            <input type="date" class="form-control" name="tanggal" placeholder="tanggal" value="Masukkan tanggal input" required>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <label class="col-sm-3 control-label text-right">Cair Baru<span class="text-red">*</span></label>
                          <div class="col-sm-8"><input type="text" class="form-control" name="realisasi_cair" value="0" placeholder="Masukkan Total Cair" required onfocus="if (this.value == '0') {this.value = '';}" onblur="if (this.value == '') {this.value = '0';}"></div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <label class="col-sm-3 control-label text-right">Pencairan Topup<span class="text-red">*</span></label>
                          <div class="col-sm-8"><input type="text" class="form-control" name="total_topup" value="0" placeholder="Masukkan Total Pencairan TopUp" required onfocus="if (this.value == '0') {this.value = '';}" onblur="if (this.value == '') {this.value = '0';}"></div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <label class="col-sm-3 control-label text-right">Nama Marketing <span class="text-red">*</span></label>
                          <div class="col-sm-8"><select name="nama" class="form-select" aria-label="Default select example" style="width: 100%;">
                          <option selected disabled>Pilih Nama Marketing</option>
                              <?php
                              include "config.php";
                              //query menampilkan nama marketing ke dalam combobox
                              $query = mysqli_query($connect, "SELECT DISTINCT nama_marketing FROM marketing ORDER BY id_marketing");
                              while ($data = mysqli_fetch_array($query)) {
                                $selected = isset($_GET['nama']) && $_GET['nama'] == $data['nama_marketing'] ? "selected" : "";
                              ?>
                                <option value="<?= $data['nama_marketing']; ?>" <?= $selected ?>><?php echo $data['nama_marketing']; ?></option>
                              <?php
                              }
                              ?>

                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button id="nosave" type="button" class="btn btn-cancel" data-dismiss="modal">Batal</button>
                        <input type="submit" name="submit" class="btn" value="Simpan">
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- modal insert close -->
          <?php
          include('config.php');

          // Number of records to display per page
          $perPage = 5;

          if (isset($_GET['nama'])) {
            $nama = $_GET['nama'];

            // Get the month and year to filter by, default to the current month and year if not set
            $month = isset($_GET['month']) ? $_GET['month'] : date('m');
            $year = isset($_GET['year']) ? $_GET['year'] : date('Y');

            // Retrieve the total number of records for the selected month and year
            $totalRecordsQuery = mysqli_query($connect, "SELECT COUNT(*) as totalRecords FROM tb_harian WHERE nama='$nama' AND MONTH(tanggal)='$month' AND YEAR(tanggal)='$year'");
            $totalRecordsData = mysqli_fetch_array($totalRecordsQuery);
            $totalRecords = $totalRecordsData['totalRecords'];

            // Calculate the total number of pages based on the number of records and the number of records per page
            $totalPages = ceil($totalRecords / $perPage);

            // Get the current page number, default to 1 if not set
            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

            // Calculate the starting index for the records on the current page
            $startIndex = ($currentPage - 1) * $perPage;

            // Query the database to retrieve the records for the current page and the selected month and year
            $sql = "SELECT * FROM tb_harian WHERE nama='$nama' AND MONTH(tanggal)='$month' AND YEAR(tanggal)='$year' ORDER BY nama ASC LIMIT $startIndex, $perPage";
            $tamData = mysqli_query($connect, $sql);

            // Display the table with the records for the current page and the selected month and year
          ?>
            <!-- Add a form to select the month and year to filter by -->
            <div class="float-right mt-0.2">
              <form method="get" class="form-inline">
                <div class="form-group">
                  <label for="month"></label>
                  <select name="month" id="month" class="form-control">
                    <option value="01" <?php echo $month == '01' ? 'selected' : '' ?>>Januari</option>
                    <option value="02" <?php echo $month == '02' ? 'selected' : '' ?>>Februari</option>
                    <option value="03" <?php echo $month == '03' ? 'selected' : '' ?>>Maret</option>
                    <option value="04" <?php echo $month == '04' ? 'selected' : '' ?>>April</option>
                    <option value="05" <?php echo $month == '05' ? 'selected' : '' ?>>Mei</option>
                    <option value="06" <?php echo $month == '06' ? 'selected' : '' ?>>Juni</option>
                    <option value="07" <?php echo $month == '07' ? 'selected' : '' ?>>Juli</option>
                    <option value="08" <?php echo $month == '08' ? 'selected' : '' ?>>Agustus</option>
                    <option value="09" <?php echo $month == '09' ? 'selected' : '' ?>>September</option>
                    <option value="10" <?php echo $month == '10' ? 'selected' : '' ?>>Oktober</option>
                    <option value="11" <?php echo $month == '11' ? 'selected' : '' ?>>November</option>
                    <option value="12" <?php echo $month == '12' ? 'selected' : '' ?>>Desember</option>
                    <!-- Add options for the other months -->
                  </select>
                </div>
                <div class="form-group ml-2">
                  <label for="year"></label>
                  <select name="year" id="year" class="form-control">
                    <option value="2021" <?php echo $year == '2021' ? 'selected' : '' ?>>2021</option>
                    <option value="2022" <?php echo $year == '2022' ? 'selected' : '' ?>>2022</option>
                    <option value="2023" <?php echo $year == '2023' ? 'selected' : '' ?>>2023</option>
                  </select>
                </div>

                <input type="hidden" name="nama" value="<?php echo $nama ?>">
                <button type="submit" class="btn btn-primary ml-2"><img src="https://img.icons8.com/windows/25/ffffff/search--v1.png" /></button>
              </form>
            </div>


            <!-- Display the table with the records for the current page and the selected month -->
            <table class="table table-bordered" id="myTable">
              <thead>
                <tr>
                  <th scope="col">NO.</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Cair Baru</th>
                  <th scope="col">Total Topup</th>
                  <th scope="col">Tanggal</th>
                </tr>
              </thead>
              <tbody>
                <?php
                // Loop through the records and display them in the table
                $no = $startIndex + 1;
                $total_topup = 0;
                $total_realisasi = 0;

                $total_realisasi_query = mysqli_query($connect, "SELECT SUM(realisasi_cair) as total_realisasi FROM tb_harian WHERE nama='$nama' AND MONTH(tanggal)='$month' ORDER BY nama ASC");
                $total_topup_query = mysqli_query($connect, "SELECT SUM(total_topup) as total_topup FROM tb_harian WHERE nama='$nama' AND MONTH(tanggal)='$month' ORDER BY nama ASC");

                $total_realisasi_data = mysqli_fetch_array($total_realisasi_query);
                $total_topup_data = mysqli_fetch_array($total_topup_query);

                $total_realisasi = $total_realisasi_data['total_realisasi'];
                $total_topup = $total_topup_data['total_topup'];

                $total_cair_all = $total_realisasi + $total_topup;
                while ($tdat = mysqli_fetch_array($tamData)) {
                  $id = $tdat['id'];

                  // Format realisasi cair to rupiah
                  $realisasi_cair_format = "Rp " . number_format($tdat['realisasi_cair'], 0, ',', '.');
                  $total_topup_format = "Rp " . number_format($tdat['total_topup'], 0, ',', '.');
                  $total_realisasi_data_format = "Rp " . number_format($total_realisasi_data['total_realisasi'], 0, ',', '.');
                  $total_topup_data_format = "Rp " . number_format($total_topup_data['total_topup'], 0, ',', '.');

                ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $tdat['nama'] ?></td>
                    <td><?php echo $realisasi_cair_format ?></td>
                    <td><?php echo $total_topup_format ?></td>
                    <td><?php echo $tdat['tanggal'] ?></td>
                    <td>
                      <button type="button" class="btn btn-edit" data-toggle="modal" data-target="#my<?php echo $tdat['id']; ?>">
                        <img src="https://img.icons8.com/ios-filled/30/FFFFFF/pencil--v1.png" style="max-width: 25px; height: auto;">
                      </button>
                      <!-- Modal -->
                      <div class="example-modal">
                        <div class="modal fade" id="my<?php echo $tdat['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h3 class="modal-title" id="myModalLabel">Edit Data</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              </div>
                              <div class="modal-body">
                                <form action="proses-edit.php" method="POST" role="form">


                                  <div class="form-group">

                                    <input type="hidden" name="id" class="form-control" value="<?php echo $tdat['id']; ?>" id="" placeholder="Input field">
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Tanggal<span class="text-red">*</span></label>
                                      <div class="col-sm-8"><input type="date" name="tanggal" class="form-control" value="<?php echo $tdat['tanggal']; ?>" id="" placeholder="Input field"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Realisasi Cair<span class="text-red">*</span></label>
                                      <div class="col-sm-8"><input type="text" name="realisasi_cair" class="form-control" value="<?php echo $tdat['realisasi_cair']; ?>" id="" placeholder="Input field"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Pencairan Topup<span class="text-red">*</span></label>
                                      <div class="col-sm-8"><input type="text" class="form-control" name="total_topup" placeholder="Masukkan Total Pencairan TopUp" value="<?= $tdat['total_topup'] ?>"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Nama Marketing<span class="text-red">*</span></label>
                                      <div class="col-sm-8"><input type="text" name="nama" class="form-control" readonly value="<?php echo $tdat['nama']; ?>" id="" placeholder="Input field"></div>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-cancel" data-dismiss="modal">Close</button>
                                    <button type="submit" name="update" class="btn">Save changes</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
              <tr>
                <td colspan="2" align="center"><b>JUMLAH</b></td>
                <td>
                  <?php
                  if (empty($total_realisasi_data_format)) {
                    echo ("Rp 0");
                  } else {
                    echo $total_realisasi_data_format;
                  }
                  ?>
                </td>
                <td>
                  <?php
                  if (empty($total_topup_data_format)) {
                    echo ("Rp 0");
                  } else {
                    echo $total_topup_data_format;
                  }
                  ?>
                </td>
                <td>

                </td>
              </tr>

            </table>

            <div class="row">
              <div class="col-sm-6">
                <p>Showing <?php echo $perPage; ?> of <?php echo $totalRecords; ?> records</p><br />
                <p>Total data (Total Cair + Total TopUp) dari <b> <?= $nama ?> </b> :<br /><?php
                                                                                            if (empty($total_cair_all)) {
                                                                                              echo ("Rp 0");
                                                                                            } else {
                                                                                              echo '<b><h2>' . 'Rp ' . number_format($total_cair_all, 0, ',', '.') . '</h2></b>';
                                                                                            }
                                                                                            ?></p>
              </div>
              <div class="col-sm-6">
                <nav aria-label="Page navigation example">
                  <ul class="pagination justify-content-end">
                    <?php
                    // Display the previous page link if the current page is not the first page
                    if ($currentPage > 1) {
                    ?>
                      <li class="page-item">
                        <a class="page-link" href="?nama=<?php echo $nama; ?>&page=<?php echo $currentPage - 1; ?>" aria-label="Previous">
                          <span aria-hidden="true">&laquo;</span>
                          <span class="sr-only">Previous</span>
                        </a>
                      </li>
                    <?php
                    }

                    // Loop through the page numbers and display the links
                    for ($i = 1; $i <= $totalPages; $i++) {
                    ?>
                      <li class="page-item<?php echo $currentPage == $i ? ' active' : ''; ?>">
                        <a class="page-link" href="?nama=<?php echo $nama; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                      </li>
                    <?php
                    }

                    // Display the next page link if the current page is not the last page
                    if ($currentPage < $totalPages) {
                    ?>
                      <li class="page-item">
                        <a class="page-link" href="?nama=<?php echo $nama; ?>&page=<?php echo $currentPage + 1; ?>" aria-label="Next">
                          <span aria-hidden="true">&raquo;</span>
                          <span class="sr-only">Next</span>
                        </a>
                      </li>
                    <?php
                    }
                    ?>
                  </ul>
                </nav>
              </div>
            </div>
          <?php
          } else {
            echo "<h2><marquee>WELCOME TO REPORT MONITORING PENCAIRAN AREA BATAM</marquee></h2>";
          }
          ?>
        </div>
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