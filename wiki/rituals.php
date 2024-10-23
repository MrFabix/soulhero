<?php
include '../include/config.php';
//query pre prendere tutti i roles
$sql = "SELECT * FROM rituals";
$result = $link->query($sql);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>WIKI </title>
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
<?php include '../include/navbar.php'; ?>
<!--  END NAVBAR  -->

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

    <div class="overlay"></div>
    <div class="search-overlay"></div>

    <!--  BEGIN SIDEBAR  -->
    <?php include '../include/sidebar.php'; ?>
    <!--  END SIDEBAR  -->

    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="middle-content container-xxl p-0">

                <!-- BREADCRUMB -->
                <div class="page-meta">
                    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Rituals</a></li>
                        </ol>
                    </nav>
                </div>
                <!-- /BREADCRUMB -->

                <div class="row layout-top-spacing">
                    <div class="col-lg-3 col-md-3 col-sm-3 mb-4">
                        <input id="t-text" type="text" name="txt" placeholder="Search" class="form-control" required="">
                    </div>




                </div>

                <div class="row" id="roles-grid">
                    <?php
                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <div class="col-xl-3 col-lg-4 col-md-6 mb-4 isotope-item">
                                <div class="card">
                                    <div class="card-header ">
                                        <div class="d-flex justify-content-between">
                                            <h5 class="card-title text-warning "><?php echo $row['name']; ?></h5>
                                            <h5 class="card-title  "><?php echo $row['ritualist']; ?></h5>

                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p><span class="text-warning">Time:</span> <?php echo $row['time_cast']; ?></p>
                                        <p><span class="text-warning">Components:</span> <?php echo $row['components']; ?></p>
                                        <p><span class="text-warning">Diffiuclty: </span><?php echo $row['difficulty']; ?></p>
                                        <p><span class="text-warning">Mana :</span> <?php echo $row['mana']; ?></p>
                                        <p><span class="text-warning"> Description:</span> <?php echo $row['description']; ?></p>

                                    </div>
                                    <div class="card-footer">
                                        <?php
                                        if (isset($row['success']) && !empty($row['success'])) {
                                            ?>
                                            <p><span class="text-success">Success:</span> <?php echo $row['success']; ?></p>
                                            <?php
                                        }
                                        ?>
                                        <?php
                                        if (isset($row['failure']) && !empty($row['failure'])) {
                                            ?>
                                            <p><span class="text-danger">Failure:</span> <?php echo $row['failure']; ?></p>
                                            <?php
                                        }
                                        ?>
                                        <?php
                                        if (isset($row['critical_success']) && !empty($row['critical_success'])) {
                                            ?>
                                            <p><span class="text-success">Critical Success:</span> <?php echo $row['critical_success']; ?></p>
                                            <?php
                                        }
                                        ?>
                                        <?php
                                        if (isset($row['critical_failure']) && !empty($row['critical_failure'])) {
                                            ?>
                                            <p><span class="text-danger">Critical Failure:</span> <?php echo $row['critical_failure']; ?></p>
                                            <?php
                                        }
                                        ?>

                                    </div>
                                    </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo "<p>No roles found.</p>";
                    }
                    ?>
                </div>

            </div>

        </div>


        <!--  BEGIN FOOTER  -->
        <?php include '../include/footer.php'; ?>
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
<script src="https://cdn.jsdelivr.net/npm/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
<script>
    // Inizializza Isotope dopo il caricamento della pagina
    var grid = document.querySelector('#roles-grid');
    var iso = new Isotope(grid, {
        itemSelector: '.isotope-item',
        layoutMode: 'fitRows'
    });

    // Filtro basato sull'input di ricerca
    var searchInput = document.querySelector('#t-text');
    searchInput.addEventListener('keyup', function() {
        var filterValue = searchInput.value.toLowerCase();
        iso.arrange({
            filter: function(itemElem) {
                var roleName = itemElem.querySelector('.card-title').textContent.toLowerCase();
                return roleName.includes(filterValue);
            }
        });
    });

    // Ordinamento
    var sortBySelect = document.querySelector('.form-select[aria-label="Sort By"]');
    sortBySelect.addEventListener('change', function() {
        var sortByValue = sortBySelect.value;

        iso.arrange({
            sortBy: sortByValue
        });
    });
</script>

</body>
</html>