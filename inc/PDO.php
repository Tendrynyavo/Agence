<?php

        function db_connect() {
                $user = 'postgres';
                $pass = 'postgres';
                $dsn = 'pgsql:host=localhost;port=5433;dbname=billard';

                try {
                        $connexion = new PDO($dsn, $user, $pass);
                        return $connexion;
                } catch (PDOException $e) {
                        echo "Erreur ! :"  . $e->getMessage();
                }
        }

        function convertToArray($resultats) {
                $array = [];
                $resultats->setFetchMode(PDO::FETCH_OBJ);
                while($rows = $resultats->fetch())
                        $array[] = $rows;
                $resultats->closeCursor();
                return $array;
        }
        
?>