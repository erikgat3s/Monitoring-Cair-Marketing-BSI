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



<body class="body">
    <div id="content-container">
        <header class=" p-3 mb-3 border-bottom">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <nav class="shift navbar-expand-md">
                        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                            <li><a href="/index.html" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                                    <img src="/grafik/login/leaderboard/assets/img/bsiputih.png" class="bi me-3" max-width="100%" height="50" role="img" aria-label="Bootstrap">
                                    <use xlink:href="#bootstrap" />

                                </a></li>
                        </ul>
                    </nav>


                </div>
            </div>

    </div>
    </header>
    <br /><br /><br /><br /><br /><br />

    <center>
        <button class="btn btn-warning"><a href="/grafik/tabel_keseluruhan/" style="color:#fff;">Back</a></button>
        <button class="btn btn-success" id="save-page" onclick="hideButtons()">Save Page as Image</button>
    </center>
    <br /><br />
    <center>
        <b>
            <h1> Leaderboard by Month </h1>
        </b>
    </center>

    <div class="container podium">


        <br />
        <?php
        // connect to the database
        include "config.php";

        // execute the query to get the data for the podium
        $sql = "SELECT nama_marketing, FORMAT((SUM(tb_harian.realisasi_cair) + SUM(tb_harian.total_topup)) / marketing.target_jabatan * 100, 2) AS percent,
        SUM(tb_harian.realisasi_cair) + SUM(tb_harian.total_topup) as ttl_cair, target_jabatan, marketing.photo AS photo
    FROM tb_harian 
    JOIN marketing ON tb_harian.nama = marketing.nama_marketing 
    WHERE MONTH(tb_harian.tanggal) = MONTH(CURRENT_DATE())
    GROUP BY nama_marketing 
    ORDER BY ttl_cair DESC
    LIMIT 3";
        $result = $conn->query($sql);

        // loop through the results and generate the HTML for the podium
        $i = 0;
        $folder_path =  $_SERVER['DOCUMENT_ROOT'] . '/grafik/login/marketing/photo_marketing/';
        while ($row = $result->fetch_assoc()) {
            $nama_marketing = $row["nama_marketing"];
            $percent = $row["percent"];
            $total_cair = $row["ttl_cair"];
            $percent_format = number_format($percent, 2, '.', ',');

            $target_jabatan = $row["target_jabatan"];

            $total_cair_format = "Rp " . number_format($row['ttl_cair'], 0, ",", ".");

            $photo = $row["photo"];
            $photo_name = $row['photo']; // use the photo file name instead of marketing person name
            $photo_path = $folder_path . $photo_name;
            if (file_exists($photo_path)) {
                $extension = pathinfo($photo_path, PATHINFO_EXTENSION);
                $photo_html = "<img src='http://localhost/grafik/login/marketing/photo_marketing/$photo_name' alt='$nama_marketing' width='100px' height='100px'>";
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
            <p class='podium__city'>$nama_marketing</p>
            <div class='podium__rank $position_class'>" . ($i + 1) . "</div>
            <b><p class='podium__percent'>$percent_format% ($total_cair_format)</p></b>
            </div>";
            $i++;
        }
        ?>


    </div>

    <br /><br />
    <center>
        <b>
            <h1> Leaderboard by Year </h1>
        </b>
    </center>

    <div class="container podium">

        <?php
        // connect to the database
        include "config.php";

        // execute the query to get the data for the podium
        $sql = "SELECT nama_marketing,
        SUM(tb_harian.realisasi_cair) + SUM(tb_harian.total_topup) as ttl_cair, 
        (SELECT FORMAT(marketing.target_jabatan * 12, 0) FROM marketing WHERE marketing.nama_marketing = tb_harian.nama) as target_tahun,
        FORMAT((SUM(tb_harian.realisasi_cair) + SUM(tb_harian.total_topup)) / (SELECT marketing.target_jabatan * 12 FROM marketing WHERE marketing.nama_marketing = tb_harian.nama) * 100, 2) AS percent, 
        marketing.photo AS photo
    FROM tb_harian 
    JOIN marketing ON tb_harian.nama = marketing.nama_marketing 
    WHERE YEAR(tb_harian.tanggal) = YEAR(CURRENT_DATE())
    GROUP BY nama_marketing 
    ORDER BY ttl_cair DESC
    LIMIT 3";
        $result = $conn->query($sql);

        // loop through the results and generate the HTML for the podium
        $i = 0;
        $folder_path =  $_SERVER['DOCUMENT_ROOT'] . '/Grafik/login/marketing/photo_marketing/';
        while ($row = $result->fetch_assoc()) {
            $nama_marketing = $row["nama_marketing"];
            $total_cair = $row["ttl_cair"];
            $total_cair_format = "Rp " . number_format($row['ttl_cair'], 0, ",", ".");
            $percent = $row["percent"];
            $target_jabatan = $row["target_tahun"];
            $photo = $row["photo"];
            $photo_name = $row['photo']; // use the photo file name instead of marketing person name
            $photo_path = $folder_path . $photo_name;
            if (file_exists($photo_path)) {
                $extension = pathinfo($photo_path, PATHINFO_EXTENSION);
                $photo_html = "<img src='http://localhost/grafik/login/marketing/photo_marketing/$photo_name' alt='$nama_marketing' width='100px' height='100px'>";
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
            <p class='podium__city'>$nama_marketing</p>
            <div class='podium__rank $position_class'>" . ($i + 1) . "</div>
            <b><p class='podium__percent'>$percent% (Rp. $total_cair_format)</p></b>
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
                    link.download = 'leaderboard_marketing_cbrm_page.png';
                    link.href = imgData;
                    link.click();

                    // Redirect to index.html
                    window.location.href = '/grafik/tabel_keseluruhan/index.php';
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