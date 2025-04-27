<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="algolia-site-verification"  content="5C71C4041DE87686" />
    <title>CORK Admin - Multipurpose Bootstrap Dashboard Template </title>
    <link rel="icon" type="image/x-icon" href="../src/assets/img/favicon.ico"/>
    <link href="../layouts/modern-dark-menu/css/light/loader.css" rel="stylesheet" type="text/css" />
    <link href="../layouts/modern-dark-menu/css/dark/loader.css" rel="stylesheet" type="text/css" />
    <script src="../layouts/modern-dark-menu/loader.js"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../src/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../layouts/modern-dark-menu/css/light/plugins.css" rel="stylesheet" type="text/css" />
    <link href="../layouts/modern-dark-menu/css/dark/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="../src/plugins/src/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="../src/assets/css/light/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
    <link href="../src/assets/css/dark/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>
<body class="layout-boxed">
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    <?php include 'include/navbar.php'; ?>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <?php include 'include/sidebar.php'; ?>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0">

                    <div class="row layout-top-spacing">




                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                            <div class="widget widget-card-group">
                                <div class="widget-heading mb-4">
                                    <h5 class="">Toolbox</h5>
                                </div>
                                <div class="row">

                                    <!-- DICE ROLLER -->
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 mb-4">
                                        <div class="widget widget-card-one">
                                            <div class="widget-content text-center">
                                                <div class="media">
                                                    <div class="w-img mx-auto mb-2">
                                                        <img src="../src/assets/img/dice.png" alt="Dice Roller" width="50">
                                                    </div>
                                                </div>
                                                <h6>Dice Roller</h6>
                                                <p>Lancia d4, d6, d8, d10, d12, d20, d100</p>
                                                <a href="tools/rollerdice.php" class="btn btn-primary mt-2">Apri Tool</a>
                                            </div>
                                        </div>
                                    </div>

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
                                            </div>
                                        </div>
                                    </div>

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





                                </div>
                            </div>
                        </div>















                    </div>

                </div>

            </div>



            <!--  BEGIN FOOTER  -->
            <?php include 'include/footer.php'; ?>
            <!--  END FOOTER  -->
        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="../src/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../src/plugins/src/mousetrap/mousetrap.min.js"></script>
    <script src="../src/plugins/src/waves/waves.min.js"></script>
    <script src="../layouts/modern-dark-menu/app.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="../src/plugins/src/apex/apexcharts.min.js"></script>
    <script src="../src/assets/js/dashboard/dash_1.js"></script>

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

</body>
</html>