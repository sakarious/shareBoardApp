<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shareboard</title>
    <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/bootstrap.css">
</head>
<body>
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="<?php echo ROOT_URL; ?>" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
            <span class="fs-4">Shareboard</span>
            </a>

            <ul class="nav nav-pills">
            <li class="nav-item"><a href="<?php echo ROOT_URL; ?>" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="<?php echo ROOT_URL; ?>shares" class="nav-link">Shares</a></li>

            <?php if(isset($_SESSION['isLoggedIn'])) : ?>

            <!-- <li class="nav-item"><a href="<?php // echo ROOT_URL; ?>" class="nav-link">Welcome <?php  //echo $_SESSION['name'] ?></a></li> -->
            <li class="nav-item"><a href="<?php echo ROOT_URL; ?>users/logout" class="nav-link">Logout</a></li>

            <li class="nav-item">Welcome <?php echo $_SESSION['name']; ?></li>

            <?php else : ?>
            <li class="nav-item"><a href="<?php echo ROOT_URL; ?>users/login" class="nav-link">Login</a></li>
            <li class="nav-item"><a href="<?php echo ROOT_URL; ?>users/register" class="nav-link">Register</a></li>
            <?php endif; ?>
            </ul>

            <!-- <ul class="nav navbar-nav navbar-right">
            <li class="nav-item"><a href="<?php //echo ROOT_URL; ?>" class="nav-link">Login</a></li>
            <li class="nav-item"><a href="<?php //echo ROOT_URL; ?>shares" class="nav-link">Register</a></li>
            </ul> -->
        </header>
    </div>

    <div class="b-example-divider"></div>

    <div class="container">

        <div class="row">
            <?php Message::display(); ?>
            <?php require($view); ?>
        </div>
    
    </div>


</body>
</html>