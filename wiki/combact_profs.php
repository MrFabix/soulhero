<?php
include '../include/config.php';
//query pre prendere tutti i roles
$sql = "SELECT combact_proficiencies.*, statistics.name as combact_proficiencies , s2.name as combact_proficiencies2
        FROM combact_proficiencies JOIN statistics on combact_proficiencies.fk_stat1 = statistics.id
        LEFT JOIN statistics s2 on combact_proficiencies.fk_stat2 = s2.id";
$result = $link->query($sql);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
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

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" type="text/css" href="../src/plugins/src/table/datatable/datatables.css">

    <link rel="stylesheet" type="text/css" href="../src/plugins/css/light/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="../src/plugins/css/dark/table/datatable/dt-global_style.css">
    <!--  END CUSTOM STYLE FILE  -->
    <style>
        .bs-popover {
            cursor: pointer;
            text-decoration: underline;
        }
    </style>


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
                            <li class="breadcrumb-item"><a href="#">Combact Profs</a></li>
                        </ol>
                    </nav>
                </div>
                <!-- /BREADCRUMB -->

                <div class="row layout-top-spacing">


                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-8">
                            <div class="table-form">
                                <div class="row">

                                    <div class="col-sm-6 col-md-6 text-right">
                                        <!--         <button class="btn btn-primary" onclick="addWeapon()" >Add Weapon</button> -->
                                    </div>
                                </div>
                            </div>
                            <table id="ecommerce-list" class="table dt-table-hover" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Stats Scale</th>
                                    <th>Stats Scale2</th>


                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . ($row["name"]) . "</td>";
                                        echo "<td>" . ($row["combact_proficiencies"]) . "</td>";
                                        echo "<td>" . ($row["combact_proficiencies2"]) . "</td>";

                                        echo "</tr>";


                                    }
                                } else {
                                    echo "<tr><td colspan='2'>0 results</td></tr>";
                                }
                                ?>




                                </tbody>
                            </table>
                        </div>
                    </div>

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
<!-- Modal for Add/Edit Weapon -->
<div class="modal fade" id="weaponModal" tabindex="-1" aria-labelledby="weaponModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="weaponForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="weaponModalLabel">Add Weapon</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="weaponId" name="weaponId">
                    <div class="mb-3">
                        <label for="weaponName" class="form-label">Weapon Name</label>
                        <input type="text" class="form-control" id="weaponName" name="weaponName" required>
                    </div>
                    <div class="mb-3">
                        <label for="weaponType" class="form-label">Weapon Type</label>
                        <select class="form-select" id="weaponType" name="weaponType" required>
                            <option value="">Select Weapon Type</option>
                            <?php
                            $sql = "SELECT * FROM weapon_type";
                            $result = $link->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
                                }
                            } else {
                                echo "<option value=''>0 results</option>";
                            }
                            ?>
                        </select>
                    </div>


                    <div class="mb-3">
                        <label for="weaponPrice" class="form-label">Price</label>
                        <input type="number" class="form-control" id="weaponPrice" name="weaponPrice" required>
                    </div>
                    <div class="mb-3">
                        <label for="weaponDamage" class="form-label">Damage</label>
                        <input type="text" class="form-control" id="weaponDamage" name="weaponDamage" required>
                    </div>
                    <div class="mb-3">
                        <label for="weaponBulk" class="form-label">Bulk</label>
                        <input type="text" class="form-control" id="weaponBulk" name="weaponBulk" required>
                    </div>
                    <div class="mb-3">
                        <label for="weaponRange" class="form-label">Range</label>
                        <input type="text" class="form-control" id="weaponRange" name="weaponRange" required>
                    </div>
                    <div class="mb-3">
                        <label for="weaponReload" class="form-label">Reload</label>
                        <input type="text" class="form-control" id="weaponReload" name="weaponReload" required>
                    </div>
                    <div class="mb-3">
                        <label for="weaponCapacity" class="form-label">Capacity</label>
                        <input type="text" class="form-control" id="weaponCapacity" name="weaponCapacity" required>
                    </div>
                    <div class="mb-3">
                        <label for="weaponMisfire" class="form-label">Misfire</label>
                        <input type="text" class="form-control" id="weaponMisfire" name="weaponMisfire" required>
                    </div>

                    <!-- Multi select with traits -->
                    <div class="mb-3">
                        <label for="weaponTraits" class="form-label">Traits</label>
                        <table class="table table-bordered">
                            <tr>
                                <th></th>
                                <th>Weapon Traits</th>
                                <th>Value</th>
                            </tr>
                            <?php
                            $sql = "SELECT * FROM weapon_traits";
                            $result = $link->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td><input type='checkbox' name='weaponTraits[]' value='" . $row["id"] . "'></td>";
                                    echo "<td>" . $row["name"] . "</td>";
                                    echo "<td><input type='text' name='weaponTraitValues[" . $row["id"] . "]'></td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<option value=''>0 results</option>";
                            }
                            ?>
                        </table>
                    </div>

                    <div id="traitsValuesContainer"></div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="saveWeaponBtn">Save changes</button>
                    </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal for Delete Confirmation -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this weapon?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
            </div>
        </div>
    </div>
</div>

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<script src="../src/plugins/src/global/vendors.min.js"></script>
<script src="../src/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../src/plugins/src/mousetrap/mousetrap.min.js"></script>
<script src="../src/plugins/src/waves/waves.min.js"></script>
<script src="../layouts/modern-dark-menu/app.js"></script>
<script src="../src/assets/js/custom.js"></script>
<!-- END GLOBAL MANDATORY STYLES -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="../src/plugins/src/table/datatable/datatables.js"></script>
<script>
    ecommerceList = $('#ecommerce-list').DataTable({


        "order": [[ 1, "asc" ]],
        "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l>" +
            "<'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
            "<'table-responsive'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
        "oLanguage": {

            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
        },

        "stripeClasses": [],
        "lengthMenu": [7, 10, 20, 50],
        "pageLength": 50
    });

    function filterType(type) {
        //prendo il testo della select
        var type_id = type.value;
        //se il valore è 0 allora mostro tutti gli elementi
        if (type_id == 0) {
            ecommerceList.columns(5).search('').draw();
        } else {
            ecommerceList.columns(5).search(type_id).draw();
        }

    }



</script>





</body>
</html>