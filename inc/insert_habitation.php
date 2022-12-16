<?php 

    require("./PDO.php");

    function insert_habitation($habitation) {
        $sql = "INSERT INTO habitation (nom, type, nbChambre, photoface, loyer, quartier, description) VALUES ('%s', '%s', %d, '%s', %d, '%s', '%s')";
        $sql = sprintf($sql, $habitation['nom'], $habitation['type'], $habitation['nbChambre'], $habitation['photoface'], $habitation['loyer'], $habitation['quartier'], $habitation['description']);
        db_connect()->exec($sql);
    }

    function upload_photo($photo) {
        $sql = "INSERT INTO Photo (idHabitation, nom)  VALUES ('%s', '%s');";
        $sql = sprintf($sql, $photo['idHabitation'], $photo['nom']);
        db_connect()->exec($sql);
    }

    function getLast() {
        $connexion = db_connect();
        $resultats = $connexion->query('SELECT idHabitation FROM habitation ORDER BY idHabitation DESC LIMIT 1');
        return convertToArray($resultats);
    }
    
    $habitation = [
        "nom" => $_POST['nom'],
        "type" => $_POST['type'],
        "nbChambre" => $_POST['nbChambre'],
        "photoface" => $_FILES['file']['name'][0],
        "loyer" => $_POST['loyer'],
        "quartier" => $_POST['quartier'],
        "description" => $_POST['description']
    ];
    
    insert_habitation($habitation);
    $countfiles = count($_FILES['file']['name']);
    for($i = 1; $i < $countfiles; $i++) {
        $filename = $_FILES['file']['name'][$i];
        if (in_array(strchr($filename, "."), array('.png', '.gif', '.jpg', '.jpeg'))) {
            $photo = [
                "idHabitation" => getLast()[0]->idhabitation,
                "nom" => $filename
            ];
            upload_photo($photo);
            move_uploaded_file($_FILES['file']['tmp_name'][$i], '../assets/img/' . $filename);
        } else {
            echo "Not Image File";
        }
    }
    header("Location: ../page/backOffice.php");
    
?>