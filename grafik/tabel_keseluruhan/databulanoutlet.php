<?php
// Database configuration
$host = "localhost";
$user = "root";
$password = "";
$database = "bsimonitoring";

// Create database connection
$conn = mysqli_connect($host, $user, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Filter by month
if (isset($_POST['submit'])) {
    $bulan = $_POST['bulan'];
    $query = "SELECT outlet.nama_outlet, SUM(realisasi_cair) + SUM(total_topup) AS actual, outlet.target_outlet 
    FROM outlet
    LEFT JOIN marketing ON marketing.nama_outlet = outlet.nama_outlet
    LEFT JOIN tb_harian ON tb_harian.nama = marketing.nama_marketing AND MONTH(tb_harian.tanggal) = '$bulan'
    GROUP BY outlet.nama_outlet 
    ORDER BY actual DESC
            LIMIT 5";
} else {
    // Default query (current month)
    $query = "SELECT outlet.nama_outlet, 
    COALESCE(SUM(tb_harian.realisasi_cair), 0) + COALESCE(SUM(tb_harian.total_topup), 0) AS actual, 
    outlet.target_outlet 
    FROM outlet 
    LEFT JOIN marketing ON marketing.nama_outlet = outlet.nama_outlet 
    LEFT JOIN tb_harian ON tb_harian.nama = marketing.nama_marketing 
                 AND MONTH(tb_harian.tanggal) = MONTH(CURRENT_DATE()) 
    GROUP BY outlet.nama_outlet 
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
    array_push($categories, $row['nama_outlet']);
    array_push($actual, intval($row['actual']));
    array_push($target, intval($row['target_outlet']));
}

// Close database connection
mysqli_close($conn);
?>

<!-- Javascript for rendering highcharts chart -->
<script type="text/javascript">
    Highcharts.chart('container-outlet', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Total Cair (Actual) vs Target by <b>Outlet</b>'
        },
        subtitle: {
            text: '<b>by Month</b>',
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