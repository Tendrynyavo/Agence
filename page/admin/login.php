<?php
    include '../../inc/link.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/index.css">
    <link rel="stylesheet" href="<?php echo $boot_css;?>">
    <link rel="stylesheet" href="<?php echo $mdb_css;?>">
    <link rel="icon" href="<?php echo $icon;?>">
    <title>Login Habitation</title>
</head>
<body>
    <main class="p-5">
        <div class="container w-100 d-flex justify-content-center">
            <div class="w-50">
                    <!-- Pills navs -->
                <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab"
                    aria-controls="pills-login" aria-selected="true">Login</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab"
                    aria-controls="pills-register" aria-selected="false">Register</a>
                </li>
                </ul>
                <!-- Pills navs -->

                <!-- Pills content -->
                <div class="tab-content">
                    <!-- Start of Login Form -->
                <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                    <form method="post" action="../../traitements/logIn.php">
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" id="loginName" class="form-control" name="email" />
                            <label class="form-label" for="loginName">Email or username</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" id="loginPassword" class="form-control" name="mdp" />
                            <label class="form-label" for="loginPassword">Password</label>
                        </div>

                        <!-- 2 column grid layout -->
                        <div class="row mb-4">
                            <div class="col-md-6 d-flex justify-content-center">
                            <!-- Checkbox -->
                            <div class="form-check mb-3 mb-md-0">
                                <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
                                <label class="form-check-label" for="loginCheck"> Remember me </label>
                            </div>
                            </div>

                            <div class="col-md-6 d-flex justify-content-center">
                            <!-- Simple link -->
                            <a href="#!">Forgot password?</a>
                            </div>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block mb-4" name="sub">Sign in</button>

                        <!-- Index buttons -->
                        <div class="text-center">
                            <p>Revenir à la page d'accueil? <a href="../../index.php">Accueil</a></p>
                        </div>
                    </form>
                </div>
                    <!-- End of Login Form -->

                    <!-- Start of Inscription Form -->
                <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                    <form method="post" action="../../traitements/reservation.php">
                        <!-- Username input -->
                        <div class="form-outline mb-4">
                            <input type="text" id="registerUsername" class="form-control" name="username" />
                            <label class="form-label" for="registerUsername">Username</label>
                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" id="registerEmail" class="form-control" name="email" />
                            <label class="form-label" for="registerEmail">Email</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" id="registerPassword" class="form-control" name="pwd" />
                            <label class="form-label" for="registerPassword">Password</label>
                        </div>

                        <!-- Phone input -->
                        <div class="form-outline mb-4">
                            <input type="tel" id="phoneNumber" class="form-control" name="tel" />
                            <label class="form-label" for="phoneNumber">Phone Number</label>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block mb-3" name="sub">Sign up</button>

                        <!-- Index buttons -->
                        <div class="text-center">
                            <p>Revenir à la page d'accueil? <a href="../../index.php">Accueil</a></p>
                        </div>
                    </form>
                </div>
                    <!-- End of Inscription Form -->
                </div>
                <!-- Pills content -->
            </div>
        </div>
    </main>

<script src="<?php echo $boot_js;?>"></script>
<script src="<?php echo $mdb_js;?>"></script>

</body>
</html>