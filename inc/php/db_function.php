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
        $resultats=$connexion->query("SELECT * FROM utilisateur WHERE email='$email' AND sudo=1 AND mdp='$mdp'");
        $p=convertToArray($resultats);
        if (sizeof($p)>0) {
        	header("Location: ../html/Hello.html");
        } else {
        	echo "KDJNLAH ELAH!!!";
        }
        
        
    }
 ?>