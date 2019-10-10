<?php
require 'config/koneksi.php';

$query = "SELECT * FROM benchmark ORDER BY id ASC";
$sql = mysqli_query($koneksi, $query)or die("Error: " . mysqli_error($koneksi));

$arrayFramework = [];
$arayNilai = [];
$arrayPengguna = [];

if(mysqli_num_rows($sql) != 0){
    while($data = mysqli_fetch_assoc($sql)){
        $arrayFramework[] = '"' . $data['framework'] . '"';
        $arrayNilai[] = $data['nilai'];
        $arrayPengguna[] = $data['pengguna'];
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="author name">
    <meta name="description" content="write yout description here">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>Hello, world!</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="jumbotron my-2">
                    <h1 class="display-4">Pembuatan Chartjs dengan PHP & Mysql</h1>
                    <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra
                        attention to featured content or information.</p>
                    <hr class="my-2">
                    <p>It uses utility classes for typography and spacing to space content out within the larger
                        container.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3>Data Statistik</h3>
                    </div>
                    <div class="card-body">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3>Data Statistik</h3>
                    </div>
                    <div class="card-body">
                        <canvas id="pie-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!-- chartjs -->
    <script src="node_modules/chart.js/dist/Chart.bundle.min.js"></script>

    <script>
        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [ <?= join($arrayFramework, ','); ?> ],
                datasets: [{
                    label: '# of Votes',
                    data: [ <?= join($arrayNilai, ','); ?> ],
                    backgroundColor: 'rgba(255, 159, 64, 1)',
                    borderColor: 'rgba(255, 159, 64, 1)',
                    fill: false,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>

    <script>
        var ctx = document.getElementById('pie-chart');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: [<?= join($arrayFramework, ','); ?>],
                datasets: [{
                    label: 'Penggunaa Framework',
                    data: [<?= join($arrayNilai, ','); ?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>

</body>

</html>