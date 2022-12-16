<?php 

    require("./PDO.php");

    function update_habitation($habitation) {
        $sql = "UPDATE habitation SET nom = '%s', type = '%s', nbChambre = %d, loyer = %d, quartier = '%s', description = '%s' WHERE idhabitation = %d";
        $sql = sprintf($sql, $habitation['nom'], $habitation['type'], $habitation['nbChambre'], $habitation['loyer'], $habitation['quartier'], $habitation['description'], $habitation['idHabitation']);
        echo $sql;
        db_connect()->exec($sql);
    }

    $habitation = [
        "idHabitation" => $_GET['idHabitation'],
        "nom" => $_POST['nom'],
        "type" => $_POST['type'],
        "nbChambre" => $_POST['nbChambre'],
        "loyer" => $_POST['loyer'],
        "quartier" => $_POST['quartier'],
        "description" => $_POST['description']
    ];

    update_habitation($habitation);

    header("Location: ../page/backOffice.php");

?>