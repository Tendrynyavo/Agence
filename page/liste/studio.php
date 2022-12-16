<?php
    include '../../inc/link.php';
    include '../../inc/db_function.php';
    $studios=getTypedHabitation("studio");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/index.css">
    <link rel="stylesheet" href="<?php echo $boot_css;?>">
    <script src="<?php echo $boot_js;?>"></script>
    <link rel="icon" href="<?php echo $icon;?>">
    
    <title>Site Habitation</title>
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
                            <a class="nav-link text-secondary" href="maison.php">Maison</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="studio.php">Studio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="appartement.php">Appartement</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
    
        <!-- Start of List -->
    
        <div class="album py-5 bg-light">
            <div class="container">        
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
<!-- boucle -->     <?php foreach ($studios as $studio) { ?>
                <a href="<?php echo $link_address;?>?idhabitation=<?php echo $studio->idhabitation; ?>" class="text-decoration-none">
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="../../img/<?php echo $studio->photoface ?>">

                            <div class="card-body">
                                <p class="card-text"><?php echo $studio->description ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                    </div>
                                    <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
<!-- fin boucle --> <?php } ?>
                </div>
            </div>
        </div>  

        <!-- End of List -->

    </main>
</body>
</html>