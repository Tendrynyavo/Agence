<?php 

    include("../inc/liste_habitation.php");
    $habitations = getListHabitation();

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
    <!-- Side Bar -->
   <?php include("./sidebar.php"); ?>
    <!-- Side Bar -->

    <div class="container" style="margin-left: 350px;">
        <!-- Formulaire -->
        <form action="../inc/insert_habitation.php" enctype="multipart/form-data" id="formulaire" method="post">
            <div class="w-75 p-5 rounded-4">
                <h2 class="mb-4">Nouveau Habitation</h2>
                <div class="row">
                    <div class="mb-3 col">
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nom" name="nom">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col">
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Type" name="type">
                    </div>
                    <div class="mb-3 col">
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nbre de chambre" name="nbChambre">
                    </div>
                    <div class="mb-3 col">
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Loyer par jour" name="loyer">
                    </div>
                    <div class="mb-3 col">
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Quartier" name="quartier">
                    </div>
                </div>
                <div class="row">
                    <div class="input-group mb-3 col">
                        <input type="file" class="form-control" id="inputGroupFile02" name="file[]" multiple>
                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Description" name="description"></textarea>
                    </div>
                </div>
                <input type="submit" value="Valider" class="btn btn-warning px-5">
            </div>
        </form>
        <!-- Formulaire -->

        <table class="table w-75" id="habitation">
            <tr>
                <th></th>
                <th>Nom</th>
                <th>Type</th>
                <th>Nombre Chambre</th>
                <th>Loyer (Ariary)</th>
                <th>Quartier</th>
                <th></th>
            </tr>
            <?php foreach ($habitations as $habitation) { ?>
            <tr>
                <td><img src="../assets/img/<?php echo $habitation->photoface; ?>" alt="" class="rounded"></td>
                <td><?php echo $habitation->nom; ?></td>
                <td><?php echo $habitation->type; ?></td>
                <td><?php echo $habitation->nbchambre; ?></td>
                <td><?php echo $habitation->loyer; ?></td>
                <td><?php echo $habitation->quartier; ?></td>
                <td><a href="./update.php?idHabitation=<?php echo $habitation->idhabitation; ?>"><button class="btn btn-warning">Update</button></a></td>
                <td><a href="../inc/delete_habitation.php?idHabitation=<?php echo $habitation->idhabitation; ?>"><button class="btn btn-warning">Delete</button></a></td>
            </tr>
            <?php } ?>
        </table>
    </div>

</body>

</html>