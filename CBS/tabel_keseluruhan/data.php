<?php
// Database configuration
include "config.php";

try {
    // Create database connection with PDO
    $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Filter by month
    if (isset($_POST['submit'])) {
        $month = $_POST['bulan'];
        $query = "SELECT nama, SUM(realisasi_cair) + SUM(total_topup) AS actual, target_jabatan 
                  FROM tb_harian_cbs 
                  JOIN marketing_cbs ON tb_harian_cbs.nama = marketing_cbs.nama_marketing 
                  WHERE MONTH(tanggal) = :month 
                  GROUP BY nama 
                  ORDER BY actual DESC
    LIMIT 5";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':month', $month, PDO::PARAM_INT);
    } else {
        // Default query (current month)
        $query = "SELECT nama, SUM(realisasi_cair) + SUM(total_topup) AS actual, target_jabatan 
                  FROM tb_harian_cbs 
                  JOIN marketing_cbs ON tb_harian_cbs.nama = marketing_cbs.nama_marketing 
                  WHERE MONTH(tanggal) = MONTH(CURRENT_DATE()) 
                  GROUP BY nama 
                  ORDER BY actual DESC
    LIMIT 5";
        $stmt = $pdo->prepare($query);
    }

    // Execute query
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Build arrays for highcharts
    $categories = array();
    $actual = array();
    $target = array();
    foreach ($result as $row) {
        array_push($categories, $row['nama']);
        array_push($actual, intval($row['actual']));
        array_push($target, intval($row['target_jabatan']));
    }

    // Close database connection
    $pdo = null;
} catch (PDOException $e) {
    // handle database connection error
    echo "Failed to connect to database: " . $e->getMessage();
}

?>

<!-- Javascript for rendering highcharts chart -->
<script type="text/javascript">
    Highcharts.chart('container-month-marketing', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Total Cair (Actual) vs Target by <b>Marketing</b>'
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