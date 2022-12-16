<?php 

    require("../inc/PDO.php");

    function getListHabitation() {
        $connexion = db_connect();
        $resultats = $connexion->query('SELECT * FROM habitation_dispo');
        return convertToArray($resultats);
    }

    function getHabitationById($idHabitation) {
        $connexion = db_connect();
        $resultats = $connexion->query('SELECT * FROM habitation_dispo WHERE idHabitation='.$idHabitation);
        return convertToArray($resultats)[0];
    }

?>