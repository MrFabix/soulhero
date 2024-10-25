<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="algolia-site-verification" content="5C71C4041DE87686" />
    <title>CORK Admin - Multipurpose Bootstrap Dashboard Template</title>
    <link rel="icon" type="image/x-icon" href="../src/assets/img/favicon.ico" />

    <!-- Loader CSS -->
    <link href="../layouts/modern-dark-menu/css/light/loader.css" rel="stylesheet" type="text/css" />
    <link href="../layouts/modern-dark-menu/css/dark/loader.css" rel="stylesheet" type="text/css" />
    <script src="../layouts/modern-dark-menu/loader.js"></script>

    <!-- Global Mandatory Styles -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../src/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../layouts/modern-dark-menu/css/light/plugins.css" rel="stylesheet" type="text/css" />
    <link href="../layouts/modern-dark-menu/css/dark/plugins.css" rel="stylesheet" type="text/css" />

    <!-- Page Level Plugins/Custom Styles -->
    <link href="../src/plugins/src/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="../src/assets/css/light/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
    <link href="../src/assets/css/dark/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
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
                    <div class="widget-content widget-content-area br-8">
                        <!-- Character Image and Stats -->

                        <div class="row">

                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 layout-spacing">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex">

                                        <div class="mr-3">


                                            <img alt="avatar" src="../src/assets/img/profile-30.png" class="rounded-circle">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10 layout-spacing border-danger">
                                <div class="d-flex justify-content-between">
                                    <!-- Stats Cards -->
                                    <?php for ($i = 0; $i < 5; $i++): ?>
                                        <div class="card ca text-white" style="background-image: url('src/assets/svg/card.svg'); background-size: cover; background-position: center; width: 8%">
                                            <div class="card-header text-center">
                                                <p class="card-title text-secondary">Soul</p>
                                            </div>
                                            <div class="card-body text-warning text-center">
                                                +5
                                            </div>
                                        </div>
                                    <?php endfor; ?>
                                </div>

                            </div>
                        </div>
                        <hr>

                        <!-- Health Section -->
                        <div class="row d-flex justify-content-between">
                            <div class="col-xl-3 col-lg-3 col-md-2 col-sm-2 col-2 layout-spacing">



                            </div>
                        </div>

                        <!-- Additional Content Here -->

                    </div>
                </div>
            </div>
        </div>
        <?php include 'include/footer.php'; ?>
    </div>
</div>


<!-- Global Mandatory Scripts -->
<script src="../src/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../src/plugins/src/mousetrap/mousetrap.min.js"></script>
<script src="../src/plugins/src/waves/waves.min.js"></script>
<script src="../layouts/modern-dark-menu/app.js"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>

</html>
