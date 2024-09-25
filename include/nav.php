<style>
    body {
    }

    .footer {
        position: ;
        bottom: 0;
        width: 100%;
        background-color: #f8f9fa;
        border-top: 1px solid #dee2e6;
        padding: 10px 20px; /* Add some padding to make the footer look better */
        z-index: 99999;
    }
</style>

<?php

//prendo url corrente
$url = $_SERVER['REQUEST_URI'];

?>
<link href="style/rpg_style.css" rel="stylesheet">



<header class="p-3 text-bg-dark  fixed-top">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <i class="bi bi-dice-6-fill"></i>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/index.php" class="nav-link px-2 <?php if ($url == "/index.php") {echo "text-secondary";} else {echo "text-white";} ?>">Home</a></li>
                <li><a href="/ancestry.php" class="nav-link px-2 <?php if ($url == "/ancestry.php") {echo "text-secondary";} else {echo "text-white";} ?>">Ancestry</a></li>
                <li><a href="/classes.php" class="nav-link px-2 <?php if ($url == "/classes.php") {echo "text-secondary";} else {echo "text-white";} ?>">Classes</a></li>
                <li><a href="/roles.php" class="nav-link px-2 <?php if ($url == "/roles.php") {echo "text-secondary";} else {echo "text-white";} ?>">Roles</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Weapons
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/weapons.php">All Weapons</a></li>
                        <li><a class="dropdown-item" href="/weapons.php?category=1">Unamerde</a></li>
                        <li><a class="dropdown-item" href="/weapons.php?category=2">Single Handed</a></li>
                        <li><a class="dropdown-item" href="/weapons.php?category=3">Two Handend</a></li>
                        <li><a class="dropdown-item" href="/weapons.php?category=4">Firearms</a></li>
                        <li><a class="dropdown-item" href="/weapons.php?category=5">Ranged</a></li>
                    </ul>
                </li>
                <li><a href="/feats.php" class="nav-link px-2 <?php if ($url == "/feats.php") {echo "text-secondary";} else {echo "text-white";} ?>">Feats</a></li>


            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" action="/search.php" method="GET" role="search">
                <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." name="query" aria-label="Search">
            </form>


            <div class="text-end">
                <a href="/login.php" class="btn btn-outline-light me-2">Login</a>
                <a href="/register.php" class="btn btn-warning">Sign-up</a>

            </div>
        </div>
    </div>
</header>


