<?php

// Start the session
//session_start();

// Check if the user is logged in
//if (!isset($_SESSION["nip"])) {
//  header("Location: /grafik/login/login.php");
//  exit();
//}

$current_month = date('F');





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
  <div class="container" style="">


    <form method="post" action="">
      <label for="bulan">Select Month:</label>
      <select onchange="this.form.submit();" class="form-select" id="bulan" name="bulan">
        <option value="">Select Month</option>
        <option value="01">January</option>
        <option value="02">February</option>
        <option value="03">March</option>
        <option value="04">April</option>
        <option value="05">May</option>
        <option value="06">June</option>
        <option value="07">July</option>
        <option value="08">August</option>
        <option value="09">September</option>
        <option value="10">October</option>
        <option value="11">November</option>
        <option value="12">December</option>
      </select>
      <div class="d-grid gap-2">
        <input class="btn" type="submit" name="submit" value="Filter">
      </div>
    </form>
    <div class="card-body">
      <div class="table-responsive">
        <!-- Add a form to select the month and year to filter by -->
        <div class="float-right mt-0.2">
          <form method="POST" id="pageForm" class="form-inline">
            <div class="form-group">
              <label for="page">Tampilkan :&nbsp;</label>
              <select onchange="this.form.submit();" name="page" id="page" class="select-filter form-select">
                <option value=""></option>
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="10000">All</option>
                <!-- Add options for the other months -->
              </select>
            </div>
            <!-- <button type="submit" class="btn btn-primary ml-2"><img src="https://img.icons8.com/windows/25/ffffff/search--v1.png"/></button> -->
          </form>
        </div>
        <table class="table table-bordered" id="myTable">
          <thead>
            <tr>
              <th scope="col">
                <center>Rank.</center>
              </th>
              <th scope="col">
                <center>Nama Marketing</center>
              </th>
              <th scope="col">
                <center>Outlet</center>
              </th>
              <th scope="col">
                <center>Target Jabatan</center>
              </th>
              <th scope="col">
                <center>Total Cair</center>
              </th>
              <th scope="col">
                <center>Pencairan Baru</center>
              </th>
              <th scope="col">
                <center>Pencairan TopUp</center>
              </th>
              <th scope="col">
                <center>Total Pencairan Growth</center>
              </th>
              <th scope="col">
                <center>Persen <a href="?sort=ttl_cair_asc" id="asc"><img src="https://img.icons8.com/ios-filled/10/1A1A1A/long-arrow-up.png"></a><a href="?sort=ttl_cair_desc" id="desc"><img src="https://img.icons8.com/ios-filled/10/1A1A1A/long-arrow-down.png"></a></center>
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
            include('config.php');

            if (isset($_POST['submit'])) {
              $month = $_POST['bulan'];
              $sqltotal = "SELECT SUM(tb_harian_cse.realisasi_cair) + SUM(tb_harian_cse.total_topup) as totalcair, tanggal FROM tb_harian_cse WHERE MONTH(tanggal) = $month";
              $totData = mysqli_query($conn, $sqltotal);
              while ($data = mysqli_fetch_array($totData)) {
                $total_all = $data['totalcair'];
              }
            } else {
              $sqltotal = "SELECT SUM(tb_harian_cse.realisasi_cair) + SUM(tb_harian_cse.total_topup) as totalcair, tanggal FROM tb_harian_cse WHERE MONTH(tanggal) = MONTH(CURRENT_DATE())";
              $totData = mysqli_query($conn, $sqltotal);
              while ($data = mysqli_fetch_array($totData)) {
                $total_all = $data['totalcair'];
              }
            }

            // Number of records to display per page
            $perPage = isset($_POST['page']) ? $_POST['page'] : 5;

            if (isset($_POST['submit'])) {
              $month = $_POST['bulan'];
              $sort = "";
              if (isset($_GET['sort'])) {
                $sort = $_GET['sort'];
              }

              // Retrieve the total number of records
              $totalRecordsQuery = mysqli_query($conn, "SELECT COUNT(DISTINCT tb_harian_cse.nama) as totalRecords FROM tb_harian_cse JOIN marketing_cse ON tb_harian_cse.nama = marketing_cse.nama_marketing WHERE MONTH(tanggal) = $month");
              $totalRecordsData = mysqli_fetch_array($totalRecordsQuery);
              $totalRecords = $totalRecordsData['totalRecords'];

              // Calculate the total number of pages based on the number of records and the number of records per page
              $totalPages = ceil($totalRecords / $perPage);

              // Get the current page number, default to 1 if not set
              $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

              // Calculate the starting index for the records on the current page
              $startIndex = ($currentPage - 1) * $perPage;

              $sql = "SELECT
        tb_harian_cse.nama,
        tb_harian_cse.tanggal as tanggal,
        marketing_cse.nama_outlet,
        SUM(tb_harian_cse.realisasi_cair) as sum_realisasi,
        SUM(tb_harian_cse.total_topup) as sum_topup,
        SUM(tb_harian_cse.realisasi_cair) + SUM(tb_harian_cse.total_topup) as ttl_cair,
        marketing_cse.target_jabatan,
        FORMAT((SUM(tb_harian_cse.realisasi_cair) + SUM(tb_harian_cse.total_topup)) / marketing_cse.target_jabatan * 100, 2) as percent,
        FORMAT(SUM(tb_harian_cse.realisasi_cair) + SUM(tb_harian_cse.total_topup), 2) as total_cair
        FROM tb_harian_cse
        JOIN marketing_cse ON tb_harian_cse.nama = marketing_cse.nama_marketing
        WHERE MONTH(tanggal) = $month 
        GROUP BY tb_harian_cse.nama";
              if (isset($_GET['sort'])) {
                $sort = $_GET['sort'];
                if ($sort == 'ttl_cair_asc') {
                  $sql .= " ORDER BY ttl_cair ASC LIMIT $startIndex, $perPage";
                } elseif ($sort == 'ttl_cair_desc') {
                  $sql .= " ORDER BY ttl_cair DESC LIMIT $startIndex, $perPage";
                }
              } else {
                // Default sort order
                $sort = 'ttl_cair_asc';
                $sql .= " ORDER BY ttl_cair DESC LIMIT $startIndex, $perPage";
              }
            } else {

              // Retrieve the total number of records
              $totalRecordsQuery = mysqli_query($conn, "SELECT COUNT(DISTINCT tb_harian_cse.nama) as totalRecords FROM tb_harian_cse JOIN marketing_cse ON tb_harian_cse.nama = marketing_cse.nama_marketing WHERE MONTH(tanggal) = MONTH(CURRENT_DATE())");
              $totalRecordsData = mysqli_fetch_array($totalRecordsQuery);
              $totalRecords = $totalRecordsData['totalRecords'];

              // Calculate the total number of pages based on the number of records and the number of records per page
              $totalPages = ceil($totalRecords / $perPage);

              // Get the current page number, default to 1 if not set
              $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

              // Calculate the starting index for the records on the current page
              $startIndex = ($currentPage - 1) * $perPage;


              $sql = "SELECT
              tb_harian_cse.nama,
              tb_harian_cse.tanggal as tanggal,
              marketing_cse.nama_outlet,
              SUM(tb_harian_cse.realisasi_cair) as sum_realisasi,
              SUM(tb_harian_cse.total_topup) as sum_topup,
              SUM(tb_harian_cse.realisasi_cair) + SUM(tb_harian_cse.total_topup) as ttl_cair,
              marketing_cse.target_jabatan,
              FORMAT((SUM(tb_harian_cse.realisasi_cair) + SUM(tb_harian_cse.total_topup)) / marketing_cse.target_jabatan * 100, 2) as percent,
              FORMAT(SUM(tb_harian_cse.realisasi_cair) + SUM(tb_harian_cse.total_topup), 2) as total_cair
              FROM tb_harian_cse
              JOIN marketing_cse ON tb_harian_cse.nama = marketing_cse.nama_marketing
              WHERE MONTH(tanggal) = MONTH(CURRENT_DATE())
              GROUP BY tb_harian_cse.nama";
              if (isset($_GET['sort'])) {
                $sort = $_GET['sort'];
                if ($sort == 'ttl_cair_asc') {
                  $sql .= " ORDER BY ttl_cair ASC LIMIT $startIndex, $perPage";
                } elseif ($sort == 'ttl_cair_desc') {
                  $sql .= " ORDER BY ttl_cair DESC LIMIT $startIndex, $perPage";
                }
              } else {
                // Default sort order
                $sort = 'ttl_cair_asc';
                $sql .= " ORDER BY ttl_cair DESC LIMIT $startIndex, $perPage";
              }
              // Limit the number of pagination links to the actual number of pages
              $maxPaginationLinks = min($totalPages, 5);

              // Generate the pagination links
              $paginationLinks = '';
              if ($totalPages > 1) {
                for ($i = 1; $i <= $maxPaginationLinks; $i++) {
                  $activeClass = ($currentPage == $i) ? 'active' : '';
                  $paginationLinks .= "<li class='$activeClass'><a href='?page=$i&sort=$sort'>$i</a></li>";
                }
              }
            }

            //Display table rows

            $realisasi = [];
            $total_cair = 0;
            $targetmarketing = [];
            $total_target = 0;
            $persen = [];
            $total_persen = 0;
            $hasilrealisasi = [];
            $pencairan_baru = 0;
            $hasiltopup = [];
            $topup_total = 0;

            $no = ($currentPage - 1) * $perPage + 1;
            if ($no + $perPage > $totalRecords) {
              $lastPageCount = $totalRecords - $no + 1;
            } else {
              $lastPageCount = $perPage;
            }


            $tamData = mysqli_query($conn, $sql);
            while ($data = mysqli_fetch_array($tamData)) {
              $realisasi[] = $data['sum_realisasi'] + $data['sum_topup'];
              $total_cair = array_sum($realisasi);
              $targetmarketing[] = $data['target_jabatan'];
              $total_target = array_sum($targetmarketing);
              $persen[] = $data['percent'];
              $total_persen = array_sum($persen);
              $hasilrealisasi[] = $data['sum_realisasi'];
              $pencairan_baru = array_sum($hasilrealisasi);
              $hasiltopup[] = $data['sum_topup'];
              $topup_total = array_sum($hasiltopup);



            ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['nama_outlet']; ?></td>
                <td><?php echo "Rp " . number_format($data['target_jabatan'], 0, ",", "."); ?></td>
                <td><?php echo "Rp " . number_format(($data['sum_realisasi'] + $data['sum_topup']), 0, ",", "."); ?></td>
                <td><?php echo "Rp " . number_format($data['sum_realisasi'], 0, ",", "."); ?></td>
                <td><?php echo "Rp " . number_format($data['sum_topup'], 0, ",", "."); ?></td>
                <td><?php echo "Rp " . number_format(($data['sum_realisasi'] + $data['sum_topup']), 0, ",", "."); ?></td>
                <td><?php echo $data['percent'] ?>%</td>
              </tr>
            <?php  } ?>
          </tbody>
          <td colspan="3" align="center"><b>Capacity Plan Total</b></td>
          <td><?php
              error_reporting(error_reporting() & ~E_NOTICE);

              if (empty($total_target)) {
                die("Rp 0");
              } else {
                echo 'Rp ' . number_format($total_target, 0, ',', '.');
              }
              ?>
          </td>

          <td><?php
              error_reporting(error_reporting() & ~E_NOTICE);

              if (empty($total_cair)) {
                die("Rp 0");
              } else {
                echo 'Rp ' . number_format($total_cair, 0, ',', '.');
              }
              ?>
          </td>
          <td><?php
              error_reporting(error_reporting() & ~E_NOTICE);

              if (empty($pencairan_baru)) {
                die("Rp 0");
              } else {
                echo 'Rp ' . number_format($pencairan_baru, 0, ',', '.');
              }
              ?>
          </td>
          <td><?php
              error_reporting(error_reporting() & ~E_NOTICE);

              if (empty($topup_total)) {
                echo ("Rp 0");
              } else {
                echo 'Rp ' . number_format($topup_total, 0, ',', '.');
              }
              ?>
          </td>
          <td><?php
              error_reporting(error_reporting() & ~E_NOTICE);

              if (empty($total_cair)) {
                echo ("Rp 0");
              } else {
                echo 'Rp ' . number_format($total_cair, 0, ',', '.');
              }
              ?>
          </td>
          <td><?php
              error_reporting(error_reporting() & ~E_NOTICE);

              if (($total_persen) == 0) {
                echo ("Rp 0");
              } else {
                echo $total_persen . "%";
              }
              ?>
          </td>


        </table>

        <!-- Button to trigger export -->
        <button class="btn" id="exportButton">Export to Excel</button>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.1/xlsx.full.min.js"></script>
        <script>
          document.querySelector('#exportButton').addEventListener('click', () => {
            const table = document.querySelector('#myTable');
            const workbook = XLSX.utils.book_new();
            const sheetName = 'Sheet 1';

            // Add data to a sheet
            const sheet = XLSX.utils.table_to_sheet(table);
            XLSX.utils.book_append_sheet(workbook, sheet, sheetName);

            // Apply a style to the first row
            const range = XLSX.utils.decode_range(sheet['!ref']);
            for (let i = range.s.c; i <= range.e.c; i++) {
              const cellAddress = XLSX.utils.encode_cell({
                r: range.s.r,
                c: i
              });
              const cell = sheet[cellAddress];
              if (range.s.c === i) {
                cell.s = {
                  font: {
                    bold: true
                  },
                  fill: {
                    type: 'pattern',
                    patternType: 'solid',
                    fgColor: {
                      rgb: 'FFFF00'
                    }
                  }
                };
              } else {
                cell.s = {
                  font: {
                    bold: false
                  },
                  fill: {
                    type: 'pattern',
                    patternType: 'none'
                  }
                };
              }
            }

            // Export the workbook to a file
            const wbout = XLSX.write(workbook, {
              bookType: 'xlsx',
              type: 'array'
            });
            const filename = 'myTable.xlsx';
            const blob = new Blob([wbout], {
              type: 'application/octet-stream'
            });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = filename;
            a.click();
            setTimeout(() => {
              URL.revokeObjectURL(url);
            }, 0);
          });
        </script>

        <div class="row">
          <div class="col-sm-6">
            <p>Showing <?php echo ($perPage > 100) ? "All" : $perPage; ?> of <?php echo $totalRecords; ?> records of
              <?php
              if (isset($_POST['submit'])) {
                $date = DateTime::createFromFormat('m', $_POST['bulan']);
                $month = $date->format('F');
                echo "<b>" . $month;
              } else {
                echo "<b>" . $current_month;
              }
              ?>
            </p>
            <br />
            <p>Total data cair (Total Cair + Total TopUp) keseluruhan marketing CSE & CFE :<br /><?php
                                                                                            if (empty($total_cair)) {
                                                                                              echo ("Rp 0");
                                                                                            } else {
                                                                                              echo '<b><h2>' . 'Rp ' . number_format($total_all, 0, ',', '.') . '</h2></b>';
                                                                                            }
                                                                                            ?></p>
          </div>


          <!-- Display pagination links -->
          <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end">
              <?php
              // Display the previous page link if the current page is not the first page
              if ($currentPage > 1) {
              ?>
                <li class="page-item">
                  <a class="page-link" href="?page=<?php echo $currentPage - 1; ?>" aria-label="&laquo;">
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
                  <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
              <?php
              }

              // Display the next page link if the current page is not the last page
              if ($currentPage < $totalPages) {
              ?>
                <li class="page-item">
                  <a class="page-link" href="?page=<?php echo $currentPage + 1; ?>" aria-label="&raquo;">
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
    </div>
  </div>
  <div>

  </div>

  <div class="">
    <footer class="footer">
      <ul class="nav justify-content-left pb-3 mb-3">
        <li class="nav-item"><a href="#" class="nav-link px-2">© 2023 PT. Bank Syariah Indonesia</a></li>
      </ul>
    </footer>
  </div>

</body>

</html>