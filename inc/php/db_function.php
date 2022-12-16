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
            if ($resultats[0]->sudo==0) {
                header("Location: ../html/Hello.html");
            } else {
                header("Location: ../html/Admin.html");
            }
        } else {
            echo "Pop-Up: mot de passe ou email erroné";
        }
            
    }

    function signIn($nom, $email, $mdp, $numTel){
        $connection=db_connect();
        $resultats=$connexion->query("SELECT * FROM utilisateur WHERE email='$email'");
        if (condition) {
            $connection->exec("INSERT INTO utilisateur (nomUser, email, mdp, numTel, sudo) VALUES ('$nom', '$email', '$mdp', '$numTel', 0)");
        } else {
            echo "Pop-up: Utilisateur déjà existant";        }
    }

    function getAllHabitation(){
        $connexion=db_connect();
        $resultats=$connexion->query("SELECT * FROM habitation");
        return convertToArray($resultats);
    }

    function ajout($nom, $type, $nbChambre, $photo, $loyer, $quartier, $description){
        $connection=db_connect();
        $t=convertToArray($connection->query("SELECT * FROM type WHERE nom='$type'"));
        $type=$t[0]->idtype;
        $connecion->query("INSERT INTO habitation (nom, idType, nbChambre, photoface, loyer, quartier, description) VALUES ('$nom', $type, $nbChambre, '$photo', $loyer, '$quartier', '$description')");
    }

    function dispo($habitat){
        $connection=db_connect();
        $resultats=$connexion->query("SELECT * FROM dispo");
        return convertToArray($resultats);
    }

    function search($desc){
        $connection=db_connect();
        $name.
        $resultats=$connexion->query("SELECT * FROM habitation WHERE UPPER(description)  LIKE UPPER('%$desc%')");
        return convertToArray($resultats);
    }
 ?>