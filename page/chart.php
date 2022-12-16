<?php 

  include("../inc/data_chart.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <script src="../assets/js/Chart.js"></script>
    <title>DashBoard</title>
</head>
<body>
    <?php include("./sidebar.php"); ?>
    <div class="container" style="margin-left: 350px;">
        <h2 class="mt-5">Évolution du nombre d'habitation occupé par jour</h2>
        <canvas id="nombre" style="width: 100%;max-width:700px"></canvas>
    </div>
    <div class="container" style="margin-left: 350px;">
        <h2 class="mt-5">Évolution du montant des loyers d'habitation par jour</h2>
        <canvas id="somme" style="width: 100%;max-width:700px"></canvas>
    </div>
</body>
<script>
        var t = [];
        for (let i = 1; i < 31; i++) { 
            t.push(i);
        }

        var xValues = t;

        new Chart("nombre", {
          type: "line",
          data: {
            labels: xValues,
            datasets: [{
              data: <?php echo getNombreHabitation(2022, 12); ?>,
              borderColor: "red",
              fill: false
            }]
          },
          options: {
            legend: {display: false}
          }
        });
        new Chart("somme", {
          type: "line",
          data: {
            labels: xValues,
            datasets: [{
              data: <?php echo getLoyerHabitationByDay(2022, 12); ?>,
              borderColor: "red",
              fill: false
            }]
          },
          options: {
            legend: {display: false}
          }
        });
</script>
</html>