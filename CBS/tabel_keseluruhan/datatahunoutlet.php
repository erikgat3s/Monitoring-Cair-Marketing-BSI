<?php
// Database configuration
include "config.php";

// Create database connection
$conn = mysqli_connect($host, $user, $pass, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form has been submitted
if (isset($_POST['submit'])) {
    $tahun = $_POST['tahun'];
    $query = "SELECT outlet_cbs.nama_outlet, SUM(realisasi_cair) + SUM(total_topup) AS actual, outlet_cbs.target_outlet 
    FROM outlet_cbs
    LEFT JOIN marketing_cbs ON marketing_cbs.nama_outlet = outlet_cbs.nama_outlet
    LEFT JOIN tb_harian_cbs ON tb_harian_cbs.nama = marketing_cbs.nama_marketing AND YEAR(tb_harian_cbs.tanggal) = $tahun
    GROUP BY outlet_cbs.nama_outlet 
    ORDER BY actual DESC
    LIMIT 5";
} else {
    // Default query (current year)
    $query = "SELECT outlet_cbs.nama_outlet, 
    COALESCE(SUM(tb_harian_cbs.realisasi_cair), 0) + COALESCE(SUM(tb_harian_cbs.total_topup), 0) AS actual, 
    outlet_cbs.target_outlet 
    FROM outlet_cbs 
    LEFT JOIN marketing_cbs ON marketing_cbs.nama_outlet = outlet_cbs.nama_outlet 
    LEFT JOIN tb_harian_cbs ON tb_harian_cbs.nama = marketing_cbs.nama_marketing 
                 AND MONTH(tb_harian_cbs.tanggal) = MONTH(CURRENT_DATE()) 
                 AND YEAR(tb_harian_cbs.tanggal) = YEAR(CURRENT_DATE()) 
    GROUP BY outlet_cbs.nama_outlet 
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
    array_push($target, intval($row['target_outlet'])*12);
}

// Close database connection
mysqli_close($conn);
?>

<!-- Javascript for rendering highcharts chart -->
<script type="text/javascript">
    // Set the active tab based on whether the form has been submitted
    
    Highcharts.chart('container-year', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Total Cair (Actual) vs Target by <b>Outlet</b>'
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
        },
        {
            name: 'Target',
            data: <?php echo json_encode($target); ?>,
            color: '#F2AB3B'
        }]
    });
</script>

