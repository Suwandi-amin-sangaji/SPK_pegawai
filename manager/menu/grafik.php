<?php
  $server = 'localhost';
  $username = 'root';
  $password = 'root';
  $dbName = 'spk_pegawai';

  $conn = mysqli_connect($server, $username, $password, $dbName);
?>
<script src="../assets/Chart.js/Chart.bundle.js"></script>
<section class="content-header">
  <h1>
    <i class="fa fa-bar-chart"></i> Grafik Hasil
  </h1>
  <div class="content">
    <canvas id="myChart" width="40" height="13px"></canvas>
  </div>
  <script>
    var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: [
          <?php
              $sql = "SELECT * FROM users";
              $query = mysqli_query($conn, $sql);
              if(mysqli_num_rows($query)){
                while($row = mysqli_fetch_assoc($query)){
                  $name = $row['nama_lengkap'];
                  echo "'$name',";
                }
              }
            ?>
        ],
        datasets: [{
          label: 'HASIL',
          data: [
            <?php
              $sql = "SELECT * FROM hitung";
              $query = mysqli_query($conn, $sql);
              if(mysqli_num_rows($query)){
                while($row = mysqli_fetch_assoc($query)){
                  $name = $row['vektor_s'];
                  echo "'$name',";
                }
              }
            ?>
          ],
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)'

          ],
          borderColor: [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)'
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