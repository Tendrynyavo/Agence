<?php 

    require("./PDO.php");

    function insert_habitation($habitation) {
        $sql = "INSERT habitation (type, nbChambre, photoface, loyer, quartier, description) VALUES ('%s', %d, '%s', %d, '%s', '%s')";
        $sql = sprintf($sql, $habitation['type'], $habitation['nbChambre'], $habitation['photoface'], $habitation['loyer'], $habitation['quartier'], $habitation['description']);
        db_connect()->exec($sql);
    }

    function upload_photo($photo) {
        $sql = "INSERT INTO Photo (idHabitation, nom)  VALUES ('%s', '%s');";
        $sql = sprintf($sql, $photo['idHabitation'], $photo['nom']);
        db_connect()->exec($sql);
    }

    function getLast() {
        $connexion = db_connect();
        $resultats = $connexion->query('SELECT * FROM habitation ORDER BY idHabitation DESC');
        return convertToArray($resultats);
    }
    
    $habitation = [
        "type" => $_POST['type'],
        "nbChambre" => $_POST['type'],
        "photoface" => $_POST['photoface'],
        "loyer" => $_POST['loyer'],
        "quartier" => $_POST['quartier'],
        "description" => $_POST['description']
    ];
    
    insert_habitation($habitation);
    $countfiles = count($_FILES['file']['name']);
    for($i = 0; $i < $countfiles; $i++) {
        $filename = $_FILES['file']['name'][$i];
        $photo = [
            "idHabitation" => getLast()[0]['idHabitation'],
            "nom" => $filename
        ];
        upload_photo($photo);
        if (in_array(strchr($fichier, "."), array('.png', '.gif', '.jpg', '.jpeg'))) {
            move_uploaded_file($_FILES['file']['tmp_name'][$i], '../assets/img' . $filename);
        }
    }
?>