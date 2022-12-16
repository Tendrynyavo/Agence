<?php 

    require("../inc/PDO.php");

    function getJour($annee) {
        $jour = [0, 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
        if ((0 == $annee % 4) & (0 != $annee % 100) || (0 == $annee % 400))
            $jour[2] = 29;
        return $jour;
    }
    
    function getNombreHabitation($annee, $mois) {
        $jour = getJour($annee);
        $data = [];
        for ($i = 1; $i <= $jour[$mois]; $i++)
            $data[] = getCount($annee, $mois, $i)->nombre;
        return json_encode($data);
    }

    function getLoyerHabitationByDay($annee, $mois) {
        $jour = getJour($annee);
        $data = [];
        for ($i = 1; $i <= $jour[$mois]; $i++) {
            $data[] = (getSum($annee, $mois, $i)->somme == null) ? 0 : getSum($annee, $mois, $i)->somme;
        }
        return json_encode($data);
    }

    function getCount($annee, $mois, $jour) {
        $sql = "SELECT count(*) as nombre
                FROM reservation
                    JOIN habitation h on h.idhabitation = reservation.idhabitation
                WHERE arrivee <= '".$annee."-".$mois."-".$jour."' and '".$annee."-".$mois."-".$jour."' <= depart;";
        $connexion = db_connect();
        $resultats = $connexion->query($sql);
        return convertToArray($resultats)[0];
    }
    
    function getSum($annee, $mois, $jour) {
        $sql = "SELECT sum(h.loyer) as somme
                FROM reservation
                    JOIN habitation h on h.idhabitation = reservation.idhabitation
                WHERE arrivee <= '".$annee."-".$mois."-".$jour."' and '".$annee."-".$mois."-".$jour."' <= depart;";
        $connexion = db_connect();
        $resultats = $connexion->query($sql);
        return convertToArray($resultats)[0];
    }

    function getHabitant($annee, $mois, $jour) {
        $sql = "SELECT *
                FROM habitation
                WHERE dispo_debut <= '".$annee."-".$mois."-".$jour."' and '".$annee."-".$mois."-".$jour."' <= dispo_fin;";
        $connexion = db_connect();
        $resultats = $connexion->query($sql);
        return convertToArray($resultats);
    }

    function getNombreHabitationByDay($annee, $mois) {
        $jour = getJour($annee);
        $data = array();
        for ($i = 1; $i <= $jour[$mois]; $i++)
            $data[] = getHabitant($annee, $mois, $i);
        return $data;
    }
    
?>