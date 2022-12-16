<?php 
	function db_connect() {
        $user = 'postgres';
        $pass = ' ';
        $dsn = 'pgsql:host=localhost;port=5432;dbname=immo';
        $connexion = new PDO($dsn, $user, $pass);
        return $connexion;
    }

    function convertToArray($resultats) {
        $array = [];
        $resultats->setFetchMode(PDO::FETCH_OBJ);
        while($rows = $resultats->fetch())
                $array[] = $rows;
        $resultats->closeCursor();
        return $array;
    }

    function logIn($email, $mdp){
        $connexion=db_connect();
        $resultats=$connexion->query("SELECT * FROM utilisateur WHERE email='$email' AND mdp='$mdp'");
        $p=convertToArray($resultats);
        if (sizeof($p)>0) {
            $sudo=$p[0]->sudo;
            if ($sudo>0) {
                header("Location: ../page/admin/management.php");
            } else {
                header("Location: ../page/liste/maison.php");
            }
        } else {
            header("Location: ../page/admin/login.php");
        }
            
    }

    function signUp($nom, $email, $mdp, $numTel){
        $connexion=db_connect();
        $resultats=$connexion->query("SELECT * FROM utilisateur WHERE email='$email'");
        $check=convertToArray($resultats);
        if (sizeof($check)==0) {
            $connexion->exec("INSERT INTO utilisateur (nomUser, email, mdp, numTel, sudo) VALUES ('$nom', '$email', '$mdp', '$numTel', 0)");
        }
    }

    function getAllHabitation(){
        $connexion=db_connect();
        $resultats=$connexion->query("SELECT * FROM habitation");
        return convertToArray($resultats);
    }

    function getHabitation(){

    }

    function getTypedHabitation($spec){
        $connexion=db_connect();
        $t=convertToArray($connexion->query("SELECT * FROM type WHERE nom='$spec'"));
        $type=$t[0]->idtype;
        $resultats=$connexion->query("SELECT * FROM habitation where idtype='$type'");
        return convertToArray($resultats);
    }

    function getMember($email){
        $connexion=db_connect();
        $resultats=$connexion->query("SELECT * FROM utilisateur WHERE email='$email'");
        return convertToArray($resultats);
    }

    function ajout($nom, $type, $nbChambre, $photo, $loyer, $quartier, $description){
        $connexion=db_connect();
        $t=convertToArray($connexion->query("SELECT * FROM type WHERE nom='$type'"));
        $type=$t[0]->idtype;
        $connecion->query("INSERT INTO habitation (nom, idType, nbChambre, photoface, loyer, quartier, description) VALUES ('$nom', $type, $nbChambre, '$photo', $loyer, '$quartier', '$description')");
    }

    function dispo($habitat){
        $connexion=db_connect();
        $resultats=$connexion->query("SELECT * FROM dispo");
        return convertToArray($resultats);
    }

    function search($desc){
        $connexion=db_connect();
        $name.
        $resultats=$connexionion->query("SELECT * FROM habitation WHERE UPPER(description)  LIKE UPPER('%$desc%')");
        return convertToArray($resultats);
    }

    function reservation($idUser, $idHabitation, $arrivee, $depart){
        $connexion=db_connect();
        $connecion->query("INSERT INTO habitation (idUser, idHabitation, arrivee, depart) VALUES ($idUser, $idHabitation, '$arrivee', '$depart')");
    }
 ?>