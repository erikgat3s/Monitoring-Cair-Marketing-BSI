<?php
// Database configuration
include "config.php";

// Create database connection
$conn = mysqli_connect($host, $user, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Filter by month
if (isset($_POST['submit'])) {
    $year = $_POST['tahun'];
    $query = "SELECT tb_harian.nama, SUM(tb_harian.realisasi_cair) + SUM(tb_harian.total_topup) AS actual, marketing.target_jabatan * 12 as target_jabatan 
              FROM tb_harian 
              JOIN marketing ON tb_harian.nama = marketing.nama_marketing 
              WHERE YEAR(tanggal) = $year 
              GROUP BY tb_harian.nama 
              ORDER BY tb_harian.actual DESC
            LIMIT 5";
} else {
    // Default query (current month)
    $query = "SELECT tb_harian.nama, SUM(realisasi_cair) + SUM(total_topup) AS actual, marketing.target_jabatan * 12 as target_jabatan 
              FROM tb_harian 
              JOIN marketing ON tb_harian.nama = marketing.nama_marketing 
              WHERE YEAR(tanggal) = YEAR(CURRENT_DATE()) 
              GROUP BY tb_harian.nama 
              ORDER BY actual DESC
            LIMIT 5";
}

// Execute query
$result = mysqli_query($conn, $query);

// Build arrays for highcharts
$categories = array();
$actual = array();
$target = array();
while ($row = mysqli_fetch_array($result)) {
    array_push($categories, $row['nama']);
    array_push($actual, intval($row['actual']));
    array_push($target, intval($row['target_jabatan']));
}

// Close database connection
mysqli_close($conn);
?>

<!-- Javascript for rendering highcharts chart -->
<script type="text/javascript">
Highcharts.chart('container-year-marketing', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Total Cair (Actual) vs Target <b>Marketing</b>'
    },
    subtitle: {
            text: '<b>by Year</b>',
            style: {
                fontWeight: 'bold',
                fontSize: '20px',
                color: '#000'
            }
        },
    xAxis: {
        categories: <?php echo json_encode($categories); ?>,
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Amount (Rp.)'
        },
        labels: {
            formatter: function() {
                    var formattedNumber;
                    if (this.value >= 1000000000) {
                        formattedNumber = Highcharts.numberFormat(this.value / 1000000000, 1, '.', ',') + 'Milyar';
                    } else {
                        formattedNumber = Highcharts.numberFormat(this.value, 0, '.', ',');
                    }
                    return formattedNumber;
                }
        }
    },
    series: [{
        name: 'Actual',
        data: <?php echo json_encode($actual); ?>,
        color: '#48a39e'
    }, {
        name: 'Target',
        data: <?php echo json_encode($target); ?>,
        color: '#F2AB3B'
    }]
});
</script>

