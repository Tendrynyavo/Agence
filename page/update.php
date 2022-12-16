<?php 
    
    include("../inc/liste_habitation.php");
    $idHabitation = $_GET['idHabitation'];
    $habitation = getHabitationById($idHabitation);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <title>Administrateur</title>
</head>
<body>
    <!-- Side Bar -->
    <?php include("./sidebar.php"); ?>
    <!-- Side Bar -->

    <div class="container" style="margin-left: 350px;">
        <!-- Formulaire -->
        <form action="../inc/update_habitation.php?idHabitation=<?php echo $idHabitation; ?>" enctype="multipart/form-data" id="formulaire" method="post">
            <div class="w-75 p-5 rounded-4">
                <h2 class="mb-4">Update Habitation</h2>
                <div class="row">
                    <div class="mb-3 col">
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nom" name="nom" value="<?php echo $habitation->nom; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col">
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Type" name="type" value="<?php echo $habitation->type; ?>">
                    </div>
                    <div class="mb-3 col">
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nbre de chambre" name="nbChambre" value="<?php echo $habitation->nbchambre; ?>">
                    </div>
                    <div class="mb-3 col">
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Loyer par jour" name="loyer" value="<?php echo $habitation->loyer; ?>">
                    </div>
                    <div class="mb-3 col">
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Quartier" name="quartier" value="<?php echo $habitation->quartier; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Description" name="description"><?php echo $habitation->description; ?></textarea>
                    </div>
                </div>
                <input type="submit" value="Valider" class="btn btn-warning px-5">
            </div>
        </form>
        <!-- Formulaire -->
</body>
</html>