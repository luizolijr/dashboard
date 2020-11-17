<html>
    <head>
    <meta charset="utf-8">

      <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
  
        function drawChart() {
          var data = google.visualization.arrayToDataTable([
            ['Cidade', 'População',{ role: 'anotation' }],            
            <?php
            
            include 'conexao.php';
            $sql = "SELECT * FROM cidades";
            $buscar = mysqli_query($conexao,$sql);

            while ($dados = mysqli_fetch_array($buscar)) {
              $cidade = $dados['cidade'];
              $populacao = $dados['populacao'];
            
            ?>

            ['<?php echo $cidade ?>',  <?php echo $populacao ?>, <?php echo $populacao ?>],

            <?php } ?>
          ]);
  
          var options = {
            title: 'População das Cidades',
            // curveType: 'function',
            legend: { position: 'top' }
          };
  
          var chart = new google.visualization.LineChart(document.getElementById('graficoLinha'));
  
          chart.draw(data, options);
        }
      </script>
    </head>
    <body>
      <div id="graficoLinha" style="height: 400px; width: 1200px"></div>
    </body>
  </html>
  