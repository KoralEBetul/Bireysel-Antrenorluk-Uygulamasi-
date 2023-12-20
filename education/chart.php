<?php include "chartdb.php";   ?>
<?php
session_start(); ob_start();
require_once("Ayarlar/ayar.php"); 
require_once("ayarlar/fonksiyonlar.php");

?>
<html>
  <head>
    <meta http-equiv="content-type" content="text-html"; charset="utf-8">
    <meta charset="UTF-8">
    <meta http-equiv="content-language" content="tr">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Salonlar</title>
    <link type="image/png" rel="icon" href="images/logo_transparent.png">
    <script type="text/javascript" src="frameworks/JQuery/jquery-3.6.0.min" language="javascript"></script>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <script type="text/javascript" src="Ayarlar/fonksiyonlar.js" language="javascript"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Santral Adı', 'Kurulum Gücü'],
          <?php
          $query="select santral_adi ,C1 from alternatif
          ORDER BY santral_adi ";
          $res=mysqli_query($conn,$query);
          while($data=mysqli_fetch_array($res)){
            $santral_adi=$data['santral_adi'];
            $C1=$data['C1'];
            ?>
            ['<?php echo $santral_adi; ?>', <?php echo $C1; ?>],
            <?php

          }



            ?>





        ]);

        var options = {
          title: 'Kurulum gücü kriterine göre Alternatifler',
          hAxis: {title: 'Alternatifler',minValue: 0, maxValue: 3},
          vAxis: {title: 'Kurulum Gücü',minValue: 0, maxValue: 3},
          legend: { position: 'center' },
          height:500,
          width:800,
          pointShape: 'circle',
          colors: ['#9932CC'],
          trendlines: { 0: {
            color: 'purple',
        lineWidth: 10,
        opacity: 0.2,
        type: 'exponential'

          },
          1: {
              type: 'linear',
              pointSize: 10,
              pointsVisible: true
            }}

        };

        var chart = new google.visualization.ScatterChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
      
    </script>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Santral Adı', 'Yıllık Üretim'],
          <?php
          $query="select santral_adi ,C2 from alternatif
          ORDER BY santral_adi ";
          $res=mysqli_query($conn,$query);
          while($data=mysqli_fetch_array($res)){
            $santral_adi=$data['santral_adi'];
            $C2=$data['C2'];
            ?>
            ['<?php echo $santral_adi; ?>', <?php echo $C2; ?>],
            <?php

          }



            ?>





        ]);

        var options = {
          title: 'Yıllık Enerji Üretim kapasitesi kriterine göre Alternatifler',
          hAxis: {title: 'Alternatifler',minValue: 0, maxValue: 3},
          vAxis: {title: 'Yıllık Enerji üretim kapasitesi',minValue: 0, maxValue: 3},
          legend: { position: 'center' },
          height:500,
          width:850,
          pointShape: 'polynomial',
          colors: ['#4DD0E1'],
          trendlines: { 0: {
            color: 'purple',
        lineWidth: 10,
        opacity: 0.2,
        type: 'exponential'

          },
          1: {
              type: 'linear',
              pointSize: 10,
              pointsVisible: true
            }}

        };

        var chart = new google.visualization.ScatterChart(document.getElementById('curve_chart2'));

        chart.draw(data, options);
      }
    </script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Santral Adı', 'Hidrolojik Düşü'],
          <?php
          $query="select santral_adi ,C3 from alternatif
          ORDER BY santral_adi ";
          $res=mysqli_query($conn,$query);
          while($data=mysqli_fetch_array($res)){
            $santral_adi=$data['santral_adi'];
            $C3=$data['C3'];
            ?>
            ['<?php echo $santral_adi; ?>', <?php echo $C3; ?>],
            <?php

          }



            ?>





        ]);

        var options = {
          title: 'Net Hidrolojik düşü kriterine göre Alternatifler',
          hAxis: {title: 'Alternatifler',minValue: 0, maxValue: 3},
          vAxis: {title: 'Net Hidrolojik düşü',minValue: 0, maxValue: 3},
          legend: { position: 'center' },
          height:500,
          width:1700,
          pointShape: 'star',
          colors: ['#228B22'],
          trendlines: { 0: {
            color: 'purple',
            lineWidth: 10,
            opacity: 0.2,
            type: 'exponential',
            degree: 3,
            visibleInLegend: true,
            pointSize: 20, // Set the size of the trendline dots.
            opacity: 0.1

          }}

        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart3'));

        chart.draw(data, options);
      }
    </script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Santral Adı', 'Depo Kapasitesi'],
          <?php
          $query="select santral_adi ,C4 from alternatif
          ORDER BY santral_adi ";
          $res=mysqli_query($conn,$query);
          while($data=mysqli_fetch_array($res)){
            $santral_adi=$data['santral_adi'];
            $C4=$data['C4'];
            ?>
            ['<?php echo $santral_adi; ?>', <?php echo $C4; ?>],
            <?php

          }



            ?>





        ]);

        var options = {
          title: 'Depolama Kapasitesi Alanı kriterine göre Alternatifler',
          hAxis: {title: 'Alternatifler',minValue: 0, maxValue: 3},
          vAxis: {title: 'Depolama Kapasitesi',minValue: 0, maxValue: 3},
          legend: { position: 'center' },
          height:500,
          width:1700,
          pointShape: 'star',
          colors: ['#BC8F8F'],
          trendlines: { 0: {
            color: 'purple',
            lineWidth: 10,
            opacity: 0.2,
            type: 'exponential',
            degree: 3,
            visibleInLegend: true,
            pointSize: 20, // Set the size of the trendline dots.
            opacity: 0.1

          }}

        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart4'));

        chart.draw(data, options);
      }
    </script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Santral Adı', 'Türbin Sayısı'],
          <?php
          $query="select santral_adi ,C5 from alternatif
          ORDER BY santral_adi ";
          $res=mysqli_query($conn,$query);
          while($data=mysqli_fetch_array($res)){
            $santral_adi=$data['santral_adi'];
            $C5=$data['C5'];
            ?>
            ['<?php echo $santral_adi; ?>', <?php echo $C5; ?>],
            <?php

          }



            ?>





        ]);

        var options = {
          title: 'Türbin Sayısı kriterine göre Alternatifler',
          hAxis: {title: 'Alternatifler',minValue: 0, maxValue: 3},
          vAxis: {title: 'Türbin Sayısı',minValue: 0, maxValue: 3},
          legend: { position: 'center' },
          height:500,
          width:800,
          pointShape: 'circle',
          colors: ['#EE82EE'],
          trendlines: { 0: {
            color: 'purple',
            lineWidth: 10,
            opacity: 0.2,
            type: 'exponential',
            degree: 3,
            visibleInLegend: true,
            pointSize: 20, // Set the size of the trendline dots.
            opacity: 0.1

          }}

        };

        var chart = new google.visualization.ScatterChart(document.getElementById('curve_chart5'));

        chart.draw(data, options);
      }
    </script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Santral Adı', 'Su Seviyesi'],
          <?php
          $query="select santral_adi ,C6 from alternatif
          ORDER BY santral_adi ";
          $res=mysqli_query($conn,$query);
          while($data=mysqli_fetch_array($res)){
            $santral_adi=$data['santral_adi'];
            $C6=$data['C6'];
            ?>
            ['<?php echo $santral_adi; ?>', <?php echo $C6; ?>],
            <?php

          }



            ?>





        ]);

        var options = {
          title: 'Su Seviyesi kriterine göre Alternatifler',
          hAxis: {title: 'Alternatifler',minValue: 0, maxValue: 3},
          vAxis: {title: 'Su Seviyesi',minValue: 0, maxValue: 3},
          legend: { position: 'center' },
          height:500,
          width:800,
          pointShape: 'circle',
          colors: ['#9ACD32'],
          trendlines: { 0: {
            color: 'purple',
            lineWidth: 10,
            opacity: 0.2,
            type: 'exponential',
            degree: 3,
            visibleInLegend: true,
            pointSize: 20, // Set the size of the trendline dots.
            opacity: 0.1

          }}

        };

        var chart = new google.visualization.ScatterChart(document.getElementById('curve_chart6'));

        chart.draw(data, options);
      }
    </script>


    






      
  </head>
  <body>




    <!--! menu section start -->
    <section class="menu" id="menu"> 
    <h1 class="heading">Tüm <span>Alternatifler</span></h1>
        





        <div class="box-container">
            <div class="box" id="curve_chart" style="width: 850px; height: 300px; padding:50px;">
                
                
            </div>

            <div class="box" id="curve_chart2" style="width: 900px; height: 600px;  ">
                    
              
                
            </div>
            
        </div>
        <div class="box-container">
            <div class="box" id="curve_chart3" style="width: 1790px; height: 600px;  " >
            </div>
        </div>
        <div class="box-container">
          <div class="box" id="curve_chart4" style="width: 1790px; height: 600px;  " >

          </div>          
        </div>
        <div class="box-container">
            <div class="box" id="curve_chart5" style="width: 850px; height: 300px; padding:50px;">
                
                
            </div>

            <div class="box" id="curve_chart6" style="width: 900px; height: 600px;  ">
                    
              
                
            </div>
            
        </div>
        
                
                

           


      </section>

  </body>
</html>
