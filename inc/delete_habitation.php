<?php 

    require("./PDO.php");

    function delete_habitation($idHabitation) {
        $sql = "INSERT INTO habitation_delete (idHabitation) VALUES (%d)";
        $sql = sprintf($sql, $idHabitation);
        db_connect()->exec($sql);
    }

    delete_habitation($_GET['idHabitation']);

    header("Location: ../page/backOffice.php");

?>