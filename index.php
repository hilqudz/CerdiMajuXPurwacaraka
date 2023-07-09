<?php
require 'cek-sesi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard - Admin</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  

</head>

<body id="page-top">

<?php
require ('koneksi.php');
require ('sidebar.php');


// Mengambil data dari database
$query = "SELECT DISTINCT MONTHNAME(tgl_pemasukan) AS bulan, SUM(jumlah) AS total
          FROM pemasukan
          GROUP BY MONTH(tgl_pemasukan)
          ORDER BY MONTH(tgl_pemasukan)";

$result = mysqli_query($koneksi, $query);

// Membuat array untuk menampung data
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[$row['bulan']] = $row['total'];
}

// Mengisi data untuk setiap bulan
$labels = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
$values = array();
foreach ($labels as $bulan) {
    $values[] = isset($data[$bulan]) ? $data[$bulan] : 0;
}





$pemasukan=mysqli_query($koneksi,"SELECT * FROM pemasukan");
while ($masuk=mysqli_fetch_array($pemasukan)){
$arraymasuk[] = $masuk['jumlah'];
}
$jumlahmasuk = array_sum($arraymasuk);


$pengeluaran=mysqli_query($koneksi,"SELECT * FROM pengeluaran");
while ($keluar=mysqli_fetch_array($pengeluaran)){
$arraykeluar[] = $keluar['jumlah']  ;
}
$jumlahkeluar = array_sum($arraykeluar);


$uang = $jumlahmasuk - $jumlahkeluar;

?>
      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
<h3> Pengelolaan Keuangan Purwacaraka</h3>

<?php require 'user.php'; ?>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="export-semua.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Download Laporan</a>
          </div>

          <!-- Content Row -->
          <div class="row">

          <div class="col-lg-6 mb-4">
            

<!-- Project Card Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Sumber Pendapatan</h6>
  </div>
  <div class="card-body">
<?php
$namasumber1 = mysqli_query($koneksi,"SELECT * FROM `sumber` where id_sumber= 1 ");
$sumbern1= mysqli_fetch_assoc($namasumber1);

$namasumber2 = mysqli_query($koneksi,"SELECT * FROM `sumber` where id_sumber= 2 ");
$sumbern2= mysqli_fetch_assoc($namasumber2);

$namasumber3 = mysqli_query($koneksi,"SELECT * FROM `sumber` where id_sumber= 3 ");
$sumbern3= mysqli_fetch_assoc($namasumber3);

$namasumber4 = mysqli_query($koneksi,"SELECT * FROM `sumber` where id_sumber= 4 ");
$sumbern4= mysqli_fetch_assoc($namasumber4);

$namasumber5 = mysqli_query($koneksi,"SELECT * FROM `sumber` where id_sumber= 5 ");
$sumbern5= mysqli_fetch_assoc($namasumber5);

$hasil1=mysqli_query($koneksi,"SELECT * FROM pemasukan where id_sumber = 1");
while ($jumlah1=mysqli_fetch_array($hasil1)){
$arrayhasil1[] = $jumlah1['jumlah'];
}
$jumlahhasil1 = array_sum($arrayhasil1);

$hasil2=mysqli_query($koneksi,"SELECT * FROM pemasukan where id_sumber = 2");
while ($jumlah2=mysqli_fetch_array($hasil2)){
$arrayhasil2[] = $jumlah2['jumlah'];
}
$jumlahhasil2 = array_sum($arrayhasil2);

$hasil3=mysqli_query($koneksi,"SELECT * FROM pemasukan where id_sumber = 3");
while ($jumlah3=mysqli_fetch_array($hasil3)){
$arrayhasil3[] = $jumlah3['jumlah'];
}
$jumlahhasil3 = array_sum($arrayhasil3);

$hasil4=mysqli_query($koneksi,"SELECT * FROM pemasukan where id_sumber = 4");
while ($jumlah4=mysqli_fetch_array($hasil4)){
$arrayhasil4[] = $jumlah4['jumlah'];
}
$jumlahhasil4 = array_sum($arrayhasil4);

$hasil5=mysqli_query($koneksi,"SELECT * FROM pemasukan where id_sumber = 5");
while ($jumlah5=mysqli_fetch_array($hasil5)){
$arrayhasil5[] = $jumlah5['jumlah'];
}
$jumlahhasil5 = array_sum($arrayhasil5);

$sumber1 = mysqli_query($koneksi,"SELECT id_sumber FROM pemasukan where id_sumber ='1'");
$sumber1text = mysqli_num_rows($sumber1);
$sumber1 = mysqli_num_rows($sumber1);
$sumber1 = $sumber1 * 10;

$sumber2 = mysqli_query($koneksi,"SELECT id_sumber FROM pemasukan where id_sumber ='2'");
$sumber2text = mysqli_num_rows($sumber2);
$sumber2 = mysqli_num_rows($sumber2);
$sumber2 = $sumber2 * 10;

$sumber3 = mysqli_query($koneksi,"SELECT id_sumber FROM pemasukan where id_sumber ='3'");
$sumber3text = mysqli_num_rows($sumber3);
$sumber3 = mysqli_num_rows($sumber3);
$sumber3 = $sumber3 * 10;

$sumber4 = mysqli_query($koneksi,"SELECT id_sumber FROM pemasukan where id_sumber ='4'");
$sumber4text = mysqli_num_rows($sumber4);
$sumber4 = mysqli_num_rows($sumber4);
$sumber4 = $sumber4 * 10;

$sumber5 = mysqli_query($koneksi,"SELECT id_sumber FROM pemasukan where id_sumber ='5'");
$sumber5text = mysqli_num_rows($sumber5);
$sumber5 = mysqli_num_rows($sumber5);
$sumber5 = $sumber5 * 10;



$no=1;
echo '
    <h4 class="small font-weight-bold">'.$sumbern1['nama'].'<span class="float-right">Rp. '.number_format($jumlahhasil1,2,',','.').'</span></h4>
    <div class="progress mb-4">
      <div class="progress-bar bg-danger" role="progressbar" style="width:'.$sumber1.'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">'.$sumber1text.' Kali</div>
    </div>
<h4 class="small font-weight-bold">'.$sumbern2['nama'].'<span class="float-right">Rp. '.number_format($jumlahhasil2,2,',','.').'</span></h4>
    <div class="progress mb-4">
      <div class="progress-bar bg-warning" role="progressbar" style="width:'.$sumber2.'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">'.$sumber2text.' Kali</div>
    </div>
<h4 class="small font-weight-bold">'.$sumbern3['nama'].'<span class="float-right">Rp. '.number_format($jumlahhasil3,2,',','.').'</span></h4>
    <div class="progress mb-4">
      <div class="progress-bar bg-info" role="progressbar" style="width:'.$sumber3.'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">'.$sumber3text.' Kali</div>
    </div>
<h4 class="small font-weight-bold">'.$sumbern4['nama'].'<span class="float-right">Rp. '.number_format($jumlahhasil4,2,',','.').'</span></h4>
    <div class="progress mb-4">
      <div class="progress-bar bg-primary" role="progressbar" style="width:'.$sumber4.'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">'.$sumber4text.' Kali</div>
    </div>
<h4 class="small font-weight-bold">'.$sumbern5['nama'].'<span class="float-right">Rp. '.number_format($jumlahhasil5,2,',','.').'</span></h4>
    <div class="progress mb-4">
      <div class="progress-bar bg-success" role="progressbar" style="width:'.$sumber5.'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">'.$sumber5text.' Kali</div>
    </div>';
?>
  </div>
</div>
</div>
            <!-- Pending Requests Card Example -->
             <!-- Content Column -->
             <div class="col-lg-6 mb-4">

<!-- Project Card Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Sumber Pengeluaran</h6>
  </div>
  <div class="card-body">
  <?php
$namasumber1 = mysqli_query($koneksi,"SELECT * FROM `sumber` WHERE id_sumber = 6");
$sumbern1 = mysqli_fetch_assoc($namasumber1);

$namasumber2 = mysqli_query($koneksi,"SELECT * FROM `sumber` WHERE id_sumber = 7");
$sumbern2 = mysqli_fetch_assoc($namasumber2);

$namasumber3 = mysqli_query($koneksi,"SELECT * FROM `sumber` WHERE id_sumber = 8");
$sumbern3 = mysqli_fetch_assoc($namasumber3);

$namasumber4 = mysqli_query($koneksi,"SELECT * FROM `sumber` WHERE id_sumber = 9");
$sumbern4 = mysqli_fetch_assoc($namasumber4);

$namasumber5 = mysqli_query($koneksi,"SELECT * FROM `sumber` WHERE id_sumber = 10");
$sumbern5 = mysqli_fetch_assoc($namasumber5);

$hasil1 = mysqli_query($koneksi,"SELECT jumlah FROM pengeluaran WHERE id_sumber = 6");
$arrayhasil1 = mysqli_fetch_all($hasil1, MYSQLI_ASSOC);
$jumlahhasil1 = array_sum(array_column($arrayhasil1, 'jumlah'));

$hasil2 = mysqli_query($koneksi,"SELECT jumlah FROM pengeluaran WHERE id_sumber = 7");
$arrayhasil2 = mysqli_fetch_all($hasil2, MYSQLI_ASSOC);
$jumlahhasil2 = array_sum(array_column($arrayhasil2, 'jumlah'));

$hasil3 = mysqli_query($koneksi,"SELECT jumlah FROM pengeluaran WHERE id_sumber = 8");
$arrayhasil3 = mysqli_fetch_all($hasil3, MYSQLI_ASSOC);
$jumlahhasil3 = array_sum(array_column($arrayhasil3, 'jumlah'));

$hasil4 = mysqli_query($koneksi,"SELECT jumlah FROM pengeluaran WHERE id_sumber = 9");
$arrayhasil4 = mysqli_fetch_all($hasil4, MYSQLI_ASSOC);
$jumlahhasil4 = array_sum(array_column($arrayhasil4, 'jumlah'));

$hasil5 = mysqli_query($koneksi,"SELECT jumlah FROM pengeluaran WHERE id_sumber = 10");
$arrayhasil5 = mysqli_fetch_all($hasil5, MYSQLI_ASSOC);
$jumlahhasil5 = array_sum(array_column($arrayhasil5, 'jumlah'));

$sumber1 = mysqli_query($koneksi,"SELECT id_sumber FROM pengeluaran WHERE id_sumber = '6'");
$sumber1text = mysqli_num_rows($sumber1);
$sumber1 = $sumber1text * 10;

$sumber2 = mysqli_query($koneksi,"SELECT id_sumber FROM pengeluaran WHERE id_sumber = '7'");
$sumber2text = mysqli_num_rows($sumber2);
$sumber2 = $sumber2text * 10;

$sumber3 = mysqli_query($koneksi,"SELECT id_sumber FROM pengeluaran WHERE id_sumber = '8'");
$sumber3text = mysqli_num_rows($sumber3);
$sumber3 = $sumber3text * 10;

$sumber4 = mysqli_query($koneksi,"SELECT id_sumber FROM pengeluaran WHERE id_sumber = '9'");
$sumber4text = mysqli_num_rows($sumber4);
$sumber4 = $sumber4text * 10;

$sumber5 = mysqli_query($koneksi,"SELECT id_sumber FROM pengeluaran WHERE id_sumber = '10'");
$sumber5text = mysqli_num_rows($sumber5);
$sumber5 = $sumber5text * 10;

$no=1;
echo '  
    <h4 class="small font-weight-bold">'.$sumbern1['nama'].'<span class="float-right">Rp. '.number_format($jumlahhasil1, 2, ',', '.').'</span></h4>
    <div class="progress mb-4">
      <div class="progress-bar bg-danger" role="progressbar" style="width:'.$sumber1.'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">'.$sumber1text.' Kali</div>
    </div>
    <h4 class="small font-weight-bold">'.$sumbern2['nama'].'<span class="float-right">Rp. '.number_format($jumlahhasil2, 2, ',', '.').'</span></h4>
    <div class="progress mb-4">
      <div class="progress-bar bg-warning" role="progressbar" style="width:'.$sumber2.'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">'.$sumber2text.' Kali</div>
    </div>
    <h4 class="small font-weight-bold">'.$sumbern3['nama'].'<span class="float-right">Rp. '.number_format($jumlahhasil3, 2, ',', '.').'</span></h4>
    <div class="progress mb-4">
      <div class="progress-bar bg-info" role="progressbar" style="width:'.$sumber3.'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">'.$sumber3text.' Kali</div>
    </div>
    <h4 class="small font-weight-bold">'.$sumbern4['nama'].'<span class="float-right">Rp. '.number_format($jumlahhasil4, 2, ',', '.').'</span></h4>
    <div class="progress mb-4">
      <div class="progress-bar bg-primary" role="progressbar" style="width:'.$sumber4.'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">'.$sumber4text.' Kali</div>
    </div>
    <h4 class="small font-weight-bold">'.$sumbern5['nama'].'<span class="float-right">Rp. '.number_format($jumlahhasil5, 2, ',', '.').'</span></h4>
    <div class="progress mb-4">
      <div class="progress-bar bg-success" role="progressbar" style="width:'.$sumber5.'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">'.$sumber5text.' Kali</div>
    </div>';
?>

  </div>
</div>
</div>
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Rekap Pendapatan</h6>
                  
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                  <!-- <canvas id="myBarChart"></canvas> -->
                  <canvas id="myChart"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Perbandingan</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Pendapatan
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-danger"></i> Pengeluaran
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Sisa
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>



        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php require 'footer.php'?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

<?php require 'logout-modal.php'; ?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script type="text/javascript">
  // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';



// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["January", "February", "March", "April", "May", "June"],
    datasets: [{
      label: "Revenue",
      backgroundColor: "#4e73df",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "#4e73df",
      data: [4215, 5312, 6251, 7841, 9821, 14984],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 6
        },
        maxBarThickness: 25,
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 15000,
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '$' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
        }
      }
    },
  }
});

  
  </script>
  
  <script type="text/javascript">
  
  // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';
// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Pendapatan", "Pengeluaran", "Sisa"],
    datasets: [{
      data: [<?php echo $jumlahmasuk/1000000 ?>, <?php echo $jumlahkeluar/1000000 ?>, <?php echo $uang/1000000 ?>],
      backgroundColor: ['#4e73df', '#e74a3b', '#36b9cc'],
      hoverBackgroundColor: ['#2e59d9', '#e74a3b', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});

  
  </script>
  <!-- <script>
    // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

var labels = <?php echo json_encode($labels); ?>;
var values = <?php echo json_encode($values); ?>;
// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels:labels,
    datasets: [{
      label: "Revenue",
      backgroundColor: "#4e73df",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "#4e73df",
      data: values,
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 6
        },
        maxBarThickness: 25,
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 15000,
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '$' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
        }
      }
    },
  }
});

  </script> -->

  <script>
        // Mendapatkan data dari PHP
        var labels = <?php echo json_encode($labels); ?>;
        var values = <?php echo json_encode($values); ?>;

        // Bar Chart Example
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: "Pemasukan",
                    backgroundColor: "#4e73df",
                    hoverBackgroundColor: "#2e59d9",
                    borderWidth: 0, // Menghapus garis belakang
                    data: values,
                }],
            },
            options: {
                maintainAspectRatio: false,
                scales: {
                    x: {
                        grid: {
                            display: false,
                            drawBorder: false, // Menghapus garis grid belakang
                        },
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 5000,
                            callback: function (value, index, values) {
                                return '$' + value;
                            }
                        },
                        grid: {
                            color: "rgba(0, 0, 0, 0)", // Menghapus garis grid pada sumbu y
                        },
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function (context) {
                                var label = context.dataset.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                label += '$' + context.parsed.y;
                                return label;
                            }
                        }
                    }
                }
            }
        });
    </script>


</body>

</html>
