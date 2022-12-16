<?php 

    require("../inc/PDO.php");

    function getListHabitation() {
        $connexion = db_connect();
        $resultats = $connexion->query('SELECT * FROM habitation');
        return convertToArray($resultats);
    }
    
?>