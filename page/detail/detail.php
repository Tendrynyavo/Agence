<?php
    include '../../inc/link.php';
    include '../../inc/db_function.php';
    $id=$_GET['idhabitation'];
    $hab=getHabitation($id);
    $photos=getHabitationPhoto($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/detail.css">
    <link rel="stylesheet" href="<?php echo $boot_css;?>">
    <link rel="stylesheet" href="<?php echo $mdb_css;?>">
    <link href="../../fontawesome-5/css/all.css" rel="stylesheet">
    <link rel="icon" href="<?php echo $icon;?>">
    
    <title>Detail Habitation</title>
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
                            <a class="nav-link text-secondary" href="../liste/maison.php">Home</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
        
        <div class="container">
            <div class="card">
                <div class="container-fluid">
                    <div class="wrapper row">
					<div class="preview col-md-6">
                        
                        <div class="preview-pic tab-content">
                                <div class="tab-pane active" id="pic-1"><a href="agrandir.php?id=<?php echo $hab[0]->idhabitation; ?>"><img src="../../img/<?php echo $hab[0]->photoface; ?>" height="400px"/></a></div>
                            <ul class="preview-thumbnail nav nav-tabs">
                            	<?php foreach ($photos as $photo) { ?>
                            		<li><a href="agrandir.php?id=<?php echo $hab[0]->idhabitation;?>"><img src="../../img/<?php echo $hab[0]->nom; ?>/<?php echo $photo->nom; ?>" /></a></li>
                            	<?php } ?>
                            </ul>
                        </div>
						
					</div>
					<div class="details col-md-6">
                        <h3 class="product-title"><?php echo $hab[0]->nom; ?>, <?php echo $hab[0]->quartier; ?></h3>
						<div class="rating">
                            <div class="stars">
                                <span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
							</div>
							<span class="review-no">41 reviews</span>
						</div>
						<p class="product-description">Suspendisse quos? Tempus cras iure temporibus? Eu laudantium cubilia sem sem! Repudiandae et! Massa senectus enim minim sociosqu delectus posuere.</p>
						<h4 class="price">current price: <span>$180</span></h4>
						<p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>
						<h5 class="colors">colors:
                            <span class="color orange not-available" data-toggle="tooltip" title="Not In store"></span>
							<span class="color green"></span>
							<span class="color blue"></span>
						</h5>

                        <!-- FORM for RESERVATION -->
						<div class="action">
                            <form action="reservation.php" method="post" action="../../traitements/reservation.php?idhabitation=<?php echo $_GET['idhabitation'] ?>">
                                <!-- Début Reservation input -->
                                <p class="text-dark">Arrivée</p>
                                <div class="form-outline mb-4">
                                    <input type="datetime-local" id="arrivee" class="form-control" name="arrivee" />
                                    <label class="form-label" for="arrivee"></label>
                                </div>
                                
                                <!-- Fin Reservation input -->
                                <p class="text-dark">Départ</p>
                                <div class="form-outline mb-4">
                                    <input type="datetime-local" id="depart" class="form-control" name="depart" />
                                    <label class="form-label" for="depart"></label>
                                </div>
                                <button class="btn btn-outline-danger me-2" type="submit" name="reserve">Reserver</button>
                            </form>
						</div>

					</div>
				</div>
			</div>
		</div>
    </div>
</main>

<script src="<?php echo $boot_js;?>"></script>
<script src="<?php echo $mdb_js;?>"></script>

</body>
</html>