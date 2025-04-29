<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Hero Soul - Toolbox</title>
    <link rel="icon" type="image/x-icon" href="../src/assets/img/favicon.ico"/>

    <!-- Loader -->
    <link href="../layouts/modern-dark-menu/css/light/loader.css" rel="stylesheet" />
    <link href="../layouts/modern-dark-menu/css/dark/loader.css" rel="stylesheet" />
    <script src="../layouts/modern-dark-menu/loader.js"></script>

    <!-- Global Mandatory Styles -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../src/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../layouts/modern-dark-menu/css/light/plugins.css" rel="stylesheet">
    <link href="../layouts/modern-dark-menu/css/dark/plugins.css" rel="stylesheet">

    <!-- Page Level Plugins/Custom Styles -->
    <link href="../src/plugins/src/apex/apexcharts.css" rel="stylesheet">
    <link href="../src/assets/css/light/dashboard/dash_1.css" rel="stylesheet">
    <link href="../src/assets/css/dark/dashboard/dash_1.css" rel="stylesheet">
</head>
<body class="layout-boxed">
<!-- Loader -->
<div id="load_screen">
    <div class="loader">
        <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div>
    </div>
</div>

<!-- Navbar -->
<?php include 'include/navbar.php'; ?>

<!-- Main Container -->
<div class="main-container" id="container">
    <div class="overlay"></div>
    <div class="search-overlay"></div>

    <!-- Sidebar -->
    <?php include 'include/sidebar.php'; ?>

    <!-- Content Area -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="middle-content container-xxl p-0">
                <div class="row layout-top-spacing">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-card-group">
                            <div class="widget-heading mb-4">
                                <h5 class="">Toolbox - Hero Soul</h5>
                            </div>
                            <div class="row">
                                <!-- Dice Roller -->
                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 mb-4">
                                    <div class="widget widget-card-one">
                                        <div class="widget-content text-center">
                                            <div class="w-img mx-auto mb-2">
                                                <img src="../src/assets/img/dice.png" alt="Dice Roller" width="50">
                                            </div>
                                            <h6>Dice Roller</h6>
                                            <p>Lancia d4, d6, d8, d10, d12, d20, d100</p>
                                            <a href="tools/rollerdice.php" class="btn btn-primary mt-2">Apri Tool</a>
                                        </div>
                                    </div>
                                </div>

<<<<<<< Updated upstream
                                    <!-- HP TRACKER -->
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 mb-4">
                                        <div class="widget widget-card-one">
                                            <div class="widget-content text-center">
                                                <div class="media">
                                                    <div class="w-img mx-auto mb-2">
                                                        <img src="../src/assets/img/heart.png" alt="Tracker" width="50">
                                                    </div>
                                                </div>
                                                <h6>HP/MANA Tracker</h6>
                                                <p>Tieni traccia della vita e mana dei personaggi</p>
                                                <a href="/tools/tracker.php" class="btn btn-danger mt-2">Apri Tool</a>
=======
                                <!-- HP Tracker -->
                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 mb-4">
                                    <div class="widget widget-card-one">
                                        <div class="widget-content text-center">
                                            <div class="w-img mx-auto mb-2">
                                                <img src="../src/assets/img/heart.png" alt="HP Tracker" width="50">
>>>>>>> Stashed changes
                                            </div>
                                            <h6>HP Tracker</h6>
                                            <p>Tieni traccia dei punti ferita</p>
                                            <a href="tools/tracker.php" class="btn btn-danger mt-2">Apri Tool</a>
                                        </div>
                                    </div>
<<<<<<< Updated upstream

                                    <!-- My CHARACTER -->
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 mb-4">
                                        <div class="widget widget-card-one">
                                            <div class="widget-content text-center">
                                                <div class="media">
                                                    <div class="w-img mx-auto mb-2">
                                                        <img src="../src/assets/img/character.png" alt="My Character" width="50">
                                                    </div>
                                                </div>
                                                <h6>My Character</h6>
                                                <p>Gestisci il tuo personaggio</p>
                                                <a href="/tools/character.php" class="btn btn-success mt-2">Apri Tool</a>
                                            </div>
                                        </div>
                                    </div>





=======
>>>>>>> Stashed changes
                                </div>

                                <!-- Inventory Tool -->
                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 mb-4">
                                    <div class="widget widget-card-one">
                                        <div class="widget-content text-center">
                                            <div class="w-img mx-auto mb-2">
                                                <img src="../src/assets/img/backpack.png" alt="Inventory Tool" width="50">
                                            </div>
                                            <h6>Gestione Inventario</h6>
                                            <p>Aggiungi o rimuovi oggetti e valuta</p>
                                            <a href="tools/inventory.php" class="btn btn-warning mt-2">Apri Tool</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Spellbook Tool -->
                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 mb-4">
                                    <div class="widget widget-card-one">
                                        <div class="widget-content text-center">
                                            <div class="w-img mx-auto mb-2">
                                                <img src="../src/assets/img/spellbook.png" alt="Spellbook" width="50">
                                            </div>
                                            <h6>Libro Incantesimi</h6>
                                            <p>Consulta o prepara le magie conosciute</p>
                                            <a href="tools/spellbook.php" class="btn btn-info mt-2">Apri Tool</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php include 'include/footer.php'; ?>
    </div>
</div>

<!-- Scripts -->
<script src="../src/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../src/plugins/src/mousetrap/mousetrap.min.js"></script>
<script src="../src/plugins/src/waves/waves.min.js"></script>
<script src="../layouts/modern-dark-menu/app.js"></script>

<!-- Page Level Scripts -->
<script src="../src/plugins/src/apex/apexcharts.min.js"></script>
<script src="../src/assets/js/dashboard/dash_1.js"></script>
</body>
</html>