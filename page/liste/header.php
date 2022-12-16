<?php 
    session_start();
    $id=$_SESSION['id'];
 ?>

<div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
    <a href="../../index.php" class="d-flex align-items-center mb-lg-0 text-white text-decoration-none">
        <img src="<?php echo $logo;?>" width="35px" height="35px">
    </a>
    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href="../../index.php" class="nav-link px-2 font-weight-bold fs-3 text-white" style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">Habitation ITU</a></li>
    </ul>
    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search" method="get" action="../../traitements/search.php">
        <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search here..." aria-label="Search" name="search">
    </form>
    <div class="text-end">
        <a href="../admin/login.php" class="text-decoration-none"><button type="button" class="btn btn-outline-light me-2">Login</button></a>
        <a href="../admin/login.php" class="text-decoration-none"><button type="button" class="btn btn-outline-danger me-2">Sign-up</button></a>
    </div>
</div> 