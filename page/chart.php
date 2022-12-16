<?php 

  include("../inc/mois.php");
  include("../inc/data_chart.php");

  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $month = $_POST['month'];
    $annee = $_POST['annee'];
    $data = getNombreHabitationByDay($annee, $month);
  }

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
      <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post" class="w-50 mt-5">
        <select name="month" class="form-control mb-3">
          <option value="1">Janvier</option>
          <option value="2">Fevrier</option>
          <option value="3">Mars</option>
          <option value="4">Avril</option>
          <option value="5">Mai</option>
          <option value="6">Juin</option>
          <option value="7">Juillet</option>
          <option value="8">Août</option>
          <option value="9">Septembre</option>
          <option value="10">Octobre</option>
          <option value="11">Novembre</option>
          <option value="12">Decembre</option>
        </select>
        <select name="annee" class="form-control mb-3">
          <?php for ($i = 2022; $i < 2050; $i++) { ?>
          <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
          <?php } ?>
        </select>
        <input type="submit" value="Ok" class="btn btn-warning">
      </form>
    </div>
    <?php if (isset($month) && isset($annee)) { ?>
    <div class="container" style="margin-left: 350px;">
        <h2 class="mt-5">Évolution du nombre d'habitation occupé par jour</h2>
        <canvas id="nombre" style="width: 100%;max-width:700px"></canvas>
    </div>
    <div class="container" style="margin-left: 350px;">
        <h2 class="mt-5">Évolution du montant des loyers d'habitation par jour</h2>
        <canvas id="somme" style="width: 100%;max-width:700px"></canvas>
    </div>
    <div class="container" style="margin-left: 350px;">
    <h2 class="mt-4"><?php echo $mois[$month]. " " . $annee; ?></h2>
      <table class="table">
        <tr>
          <th>Date</th>
          <th>Nombre</th>
        </tr>
        <?php for($i = 1; $i <= count($data); $i++) { ?>
        <tr>
          <td><?php echo $i. " ".$mois[$month]." ".$annee; ?></td>
          <td><a href="liste_disponible.php?index=<?php echo $i - 1; ?>&&annee=<?php echo $annee; ?>&&month=<?php echo $month; ?>"><?php echo count($data[$i - 1]); ?></a</td>
        </tr>
        <?php } ?>
      </table>
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
          data: <?php echo getNombreHabitation($annee, $month); ?>,
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
          data: <?php echo getLoyerHabitationByDay($annee, $month); ?>,
          borderColor: "red",
          fill: false
        }]
      },
      options: {
        legend: {display: false}
      }
    });
  </script>
  <?php } ?>
</html>