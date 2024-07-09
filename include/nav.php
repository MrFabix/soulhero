<style>
    body {
    }

    .footer {
        position: fixed;
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



<header class="p-3 text-bg-dark  fixed-top">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <i class="bi bi-dice-6-fill"></i>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/index.php" class="nav-link px-2 <?php if ($url == "/index.php") {echo "text-secondary";} else {echo "text-white";} ?>">Home</a></li>
                <li><a href="/races.php" class="nav-link px-2 <?php if ($url == "/races.php") {echo "text-secondary";} else {echo "text-white";} ?>">Races</a></li>
                <li><a href="/classes.php" class="nav-link px-2 <?php if ($url == "/classes.php") {echo "text-secondary";} else {echo "text-white";} ?>">Classes</a></li>
                <li><a href="/roles.php" class="nav-link px-2 <?php if ($url == "/roles.php") {echo "text-secondary";} else {echo "text-white";} ?>">Roles</a></li>
                <li><a href="/magic.php" class="nav-link px-2 <?php if ($url == "/magic.php") {echo "text-secondary";} else {echo "text-white";} ?>">Spells</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Crafting
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/crafting.php?type=1">Crafting Alchemical</a></li>
                        <li><a class="dropdown-item" href="/crafting.php?type=2">Crafting Cooking</a></li>
                        <li><a class="dropdown-item" href="/crafting.php?type=3">Crafting Magical</a></li>


                    </ul>
                </li>
                <li><a href="/monsters.php" class="nav-link px-2 <?php if ($url == "/monsters.php") {echo "text-secondary";} else {echo "text-white";} ?>">Monsters</a></li>
                    <li><a  href="/sheet.php" class="nav-link px-2 disabled <?php if ($url == "/sheet.php") {echo "text-secondary";} else {echo "text-white";} ?>">Sheet</a></li>

                <!--ADMIN-->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Admin
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/admin/new_role.php">New Role</a></li>
                            <li><a class="dropdown-item" href="/admin/new_class.php">New Class</a></li>
                            <li><a class="dropdown-item" href="/admin/new_ancestry.php">New Ancestry</a></li>
                        </ul>
                    </li>



            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
            </form>

            <div class="text-end">
                <button type="button" class="btn btn-outline-light me-2">Login</button>
                <button type="button" class="btn btn-warning">Sign-up</button>

            </div>
        </div>
    </div>
</header>


<!-- <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                </a>
                <ul class="dropdown-menu text-small" style="">
                    <li><a class="dropdown-item" href="#">New project...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul> -->