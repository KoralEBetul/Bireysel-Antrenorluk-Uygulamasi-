
var options = {
          title: 'Kurulum gücü kriterine göre Alternatifler',
          curveType: 'function',
          hAxis: {title: 'Alternatifler'},
          vAxis: {title: 'Kurulum Gücü'},
          legend: 'none',
          trendlines: { 0: {}}

        };

        var chart = new google.visualization.ScatterChart(document.getElementById('curve_chart2'));






        var options = {
          title: 'Kriterlere göre Alternatifler',
          curveType: 'function',
          legend: { position: 'center' },
          pieSliceText: 'label',
          slices: {  4: {offset: 0.2},
                    6: {offset: 0.3},
                    2: {offset: 0.4},
          },

        };

        var chart = new google.visualization.PieChart(document.getElementById('curve_chart2'));




/*çizgi grafiği */

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Santral Adı', 'Kurulum Gücü', 'Yıllık Enerji Üretim Kapasitesi', 'Net Hidrolojik Düşü', 'Depolama Kapasitesi Alanı','Türbin Sayısı','Su Seviyesi'],
          <?php
          $query="select santral_adi ,C1,C2,C3,C4,C5,C6 from alternatif
          ORDER BY santral_adi 
          LIMIT 8;";
          $res=mysqli_query($conn,$query);
          while($data=mysqli_fetch_array($res)){
            $santral_adi=$data['santral_adi'];
            $C1=$data['C1'];
            $C2=$data['C2'];
            $C3=$data['C3'];
            $C4=$data['C4'];
            $C5=$data['C5'];
            $C6=$data['C6'];
            ?>
            ['<?php echo $santral_adi; ?>', <?php echo $C1; ?>, <?php echo $C2; ?>, <?php echo $C3; ?> , <?php echo $C4; ?>, <?php echo $C5; ?>   , <?php echo $C6; ?>],
            <?php

          }



            ?>





        ]);

        var options = {
          title: 'Kriterlere göre Alternatifler',
          curveType: 'function',
          legend: { position: 'center' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>