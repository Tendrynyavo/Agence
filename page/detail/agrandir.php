<?php
    include '../../inc/link.php';
    include '../../inc/db_function.php';
    $id=$_GET['id'];
    $hab=getHabitation($id);
    $photos=getHabitationPhoto($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $boot_css;?>">
    <link rel="stylesheet" href="<?php echo $mdb_css;?>">
    <link href="../../fontawesome-5/css/all.css" rel="stylesheet">
    <link rel="icon" href="<?php echo $icon;?>">
    <style>
        i{
          font-size: 60px;
        }
    </style>
    <title>Plus de photos</title>
</head>
<body>
    <main>
        <header class=" text-bg-dark">
            <div class="container">
                <?php include 'header.php'; ?>     <!-- MEME HEADER POUR LISTE HABITATION -->
                <nav class="text-center navbar navbar-dark bg-dark">
                    <!-- Navbar content -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="../../index.php">Home</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>

        <div class="container p-2">
            <a href="detail.php?idhabitation=<?php echo $_GET['id'] ?>" class="text-decoration-none">
                <i class="far fa-arrow-alt-circle-left"></i>
            </a>
        </div>

        <div class="container p-2">
            <div class="row justify-content-evenly">
                <div class="col-4">
                    <img src="../../img/<?php echo $hab[0]->photoface; ?>" height="400px" class="rounded"/>
                </div>
                <div class="col-4">
                    <img src="../../img/<?php echo $hab[0]->nom; ?>/<?php echo $photos[0]->nom ?>" height="400px" class="rounded"/>
                </div>
            </div>
        </div>
            <br>
        <div class="container">
            <div class="row justify-content-evenly">
                <div class="col-4">
                    <img src="../../img/<?php echo $hab[0]->nom; ?>/<?php echo $photos[1]->nom ?>" height="400px" class="rounded"/>
                </div>
                <div class="col-4">
                    <img src="../../img/<?php echo $hab[0]->nom; ?>/<?php echo $photos[2]->nom ?>" height="400px" class="rounded"/>
                </div>
            </div>
        </div>
    </main>

    <script src="<?php echo $boot_js;?>"></script>
    <script src="<?php echo $mdb_js;?>"></script>
</body>
</html>