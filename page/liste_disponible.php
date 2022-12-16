<?php 

    include("../inc/data_chart.php");

    $annee = $_GET['annee'];
    $month = $_GET['month'];
    $index = $_GET['index'];
    $data = getNombreHabitationByDay($annee, $month);
    $data = $data[$index];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <title>Administration</title>
</head>
<style>
    img {
        width: 100px;
        height: 100px;
        object-fit: cover;
    }
</style>
<body>
    <?php include("./sidebar.php"); ?>
    <div class="container mt-5" style="margin-left: 300px;">
        <h2>Liste des Habitations Disponible</h2>
        <table class="table w-75">
            <tr>
                <th></th>
                <th>Nom</th>
                <th>Type</th>
                <th>Nombre Chambre</th>
                <th>Loyer (Ariary)</th>
                <th>Quartier</th>
                <th></th>
            </tr>
            <?php foreach ($data as $habitation) { ?>
                <tr>
                    <td><img src="../assets/img/<?php echo $habitation->photoface; ?>" alt="" class="rounded"></td>
                    <td><?php echo $habitation->nom; ?></td>
                    <td><?php echo $habitation->type; ?></td>
                    <td><?php echo $habitation->nbchambre; ?></td>
                    <td><?php echo $habitation->loyer; ?></td>
                    <td><?php echo $habitation->quartier; ?></td>
                </tr>
            <?php } ?>
        </table>
        <a href="./chart.php"><button class="btn btn-warning">Retour</button></a>
    </div>
</body>
</html>