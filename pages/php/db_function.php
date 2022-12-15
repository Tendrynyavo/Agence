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

    function get($user){
        $connexion=db_connect();
        $resultats=$connexion->query("SELECT * FROM utilisateur WHERE nomUser='$user'");
        return convertToArray($resultats);
    }
 ?>