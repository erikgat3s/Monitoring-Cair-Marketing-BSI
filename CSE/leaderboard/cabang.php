<!DOCTYPE html>
    <html lang="en">

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
  <script src="/assets/html2canvas/html2canvas.min.js" crossorigin="anonymous"></script>

</head>

<title> Leaderboard Cabang CSE & CFE </title>
    <br />

    <body class="body">
    <header class=" p-3 mb-3 border-bottom">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <nav class="shift navbar-expand-md">
                        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                            <li><a href="index.html" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                                    <img src="/grafik/login/leaderboard/assets/img/bsiputih.png" class="bi me-3" max-width="100%" height="50" role="img" aria-label="Bootstrap">
                                    <use xlink:href="#bootstrap" />

                                </a></li>
                        </ul>
                    </nav>


                </div>
            </div>

    </div>
    </header>
    <br/><br/><br/><br/><br/><br/>
    <center>
    <button class="btn btn-warning"><a href="/CSE/tabel_keseluruhan/" style="color:#fff;">Back</a></button>    
    <button class="btn btn-success" id="save-page" onclick="hideButtons()">Save Page as Image</button>
    </center>
        <br /><br />
        <center>
            <h1> Leaderboard by Month </h1>
        </center>
        <div class="container podium">

            <br />
            <?php
            // connect to the database
            include "config.php";

            // execute the query to get the data for the podium
            $query = "SELECT outlet_cse.nama_outlet, 
                COALESCE(SUM(tb_harian_cse.realisasi_cair), 0) + COALESCE(SUM(tb_harian_cse.total_topup), 0) AS actual, 
                outlet_cse.target_outlet,
                outlet_cse.photo
                FROM outlet_cse 
                LEFT JOIN marketing_cse ON marketing_cse.nama_outlet = marketing_cse.nama_outlet 
                LEFT JOIN tb_harian_cse ON tb_harian_cse.nama = marketing_cse.nama_marketing 
                            AND MONTH(tb_harian_cse.tanggal) = MONTH(CURRENT_DATE()) 
                GROUP BY outlet_cse.nama_outlet 
                ORDER BY actual DESC 
                LIMIT 3";
            $result = mysqli_query($conn, $query);

            // loop through the results and generate the HTML for the podium
            $i = 0;
            $folder_path =  $_SERVER['DOCUMENT_ROOT'] . '/CSE/outlet/photo_kepala_cabang/';
            while ($row = mysqli_fetch_assoc($result)) {
                $nama_outlet = $row["nama_outlet"];
                $actual = $row["actual"];
                $target_outlet = $row["target_outlet"];
                $actual_format = "Rp " . number_format($row['actual'], 0, ",", ".");
                $percent = ($actual / $target_outlet) * 100;
                $percent_format = number_format($percent, 2, '.', ',');
                $photo = $row["photo"];
                $photo_name = $row['photo']; // use the photo file name instead of marketing person name
                $photo_path = $folder_path . $photo_name;
                if (file_exists($photo_path)) {
                    $extension = pathinfo($photo_path, PATHINFO_EXTENSION);
                    $photo_html = "<img src='http://localhost/CSE/outlet/photo_kepala_cabang/$photo_name' alt='$photo_name' width='100px' height='100px'>";
                } else {
                    $photo_html = "No photo available";
                }
                // set the position class name based on the value of $i
                switch ($i) {
                    case 0:
                        $position_class = 'first';
                        break;
                    case 1:
                        $position_class = 'second';
                        break;
                    case 2:
                        $position_class = 'third';
                        break;
                }

                // generate the HTML for this podium item
                echo "<div class='podium__item $position_class'>
                <div class='podium__photo'>$photo_html</div>
                <p class='podium__city'>$nama_outlet</p>
                <div class='podium__rank $position_class'>" . ($i + 1) . "</div>
                <b><p class='podium__percent'>$percent_format% ($actual_format)</p></b>
                </div>";
                $i++;
            }
            ?>

        </div>

        <center>
            <h1> Leaderboard by Year </h1>
        </center>
        <div class="container podium">

            <br />
            <?php
            // connect to the database
            include "config.php";

            // execute the query to get the data for the podium
            $query = "SELECT outlet_cse.nama_outlet, 
                COALESCE(SUM(tb_harian_cse.realisasi_cair), 0) + COALESCE(SUM(tb_harian_cse.total_topup), 0) AS actual, 
                outlet_cse.target_outlet,
                outlet_cse.photo
                FROM outlet_cse 
                LEFT JOIN marketing_cse ON marketing_cse.nama_outlet = marketing_cse.nama_outlet 
                LEFT JOIN tb_harian_cse ON tb_harian_cse.nama = marketing_cse.nama_marketing 
                            AND YEAR(tb_harian_cse.tanggal) = YEAR(CURRENT_DATE()) 
                GROUP BY outlet_cse.nama_outlet 
                ORDER BY actual DESC 
                LIMIT 3";
            $result = mysqli_query($conn, $query);

            // loop through the results and generate the HTML for the podium
            $i = 0;
            $folder_path =  $_SERVER['DOCUMENT_ROOT'] . '/CSE/outlet/photo_kepala_cabang/';
            while ($row = mysqli_fetch_assoc($result)) {
                $nama_outlet = $row["nama_outlet"];
                $actual = $row["actual"];
                $target_outlet = $row["target_outlet"];
                $percent = ($actual / $target_outlet) * 100;
                $target_tahun = $target_outlet * 12;
                $actual_format_tahun = "Rp " . number_format($row["actual"], 0, ",", ".");
                $tahunpercent = $actual / $target_tahun * 100;
                $tahunpercent_format = number_format($tahunpercent, 2, '.', ',');
                $photo = $row["photo"];
                $photo_name = $row['photo']; // use the photo file name instead of marketing person name
                $photo_path = $folder_path . $photo_name;
                if (file_exists($photo_path)) {
                    $extension = pathinfo($photo_path, PATHINFO_EXTENSION);
                    $photo_html = "<img src='http://localhost/CSE/outlet/photo_kepala_cabang/$photo_name' alt='$photo_name' width='100px' height='100px'>";
                } else {
                    $photo_html = "No photo available";
                }
                // set the position class name based on the value of $i
                switch ($i) {
                    case 0:
                        $position_class = 'first';
                        break;
                    case 1:
                        $position_class = 'second';
                        break;
                    case 2:
                        $position_class = 'third';
                        break;
                }

                // generate the HTML for this podium item
                echo "<div class='podium__item $position_class'>
                <div class='podium__photo'>$photo_html</div>
                <p class='podium__city'>$nama_outlet</p>
                <div class='podium__rank $position_class'>" . ($i + 1) . "</div>
                <b><p class='podium__percent'>Percent: $tahunpercent_format% ($actual_format_tahun)</p></b>
                </div>";
                $i++;
            }
            ?>

        </div>
        </div>
        <footer class="footer">
      <ul class="nav justify-content-left pb-2 mb-2">
        <li class="nav-item"><a href="#" class="nav-link px-2 ">© 2023 PT. Bank Syariah Indonesia</a></li>
      </ul>
    </footer>

    <script>
            document.getElementById('save-page').addEventListener('click', function() {
                html2canvas(document.body).then(function(canvas) {
                    var imgData = canvas.toDataURL('image/png');
                    var link = document.createElement('a');
                    link.download = 'leaderboard_outlet_page_cse.png';
                    link.href = imgData;
                    link.click();

                    // Redirect to index.html
                    window.location.href = '/CSE/tabel_keseluruhan/index.php';
                });
            });

            function hideButtons() {
                var buttons = document.getElementsByTagName('button');
                for (var i = 0; i < buttons.length; i++) {
                    buttons[i].style.display = 'none';
                }
            }
        </script>


    </body>

    </html>