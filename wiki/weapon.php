<?php
include '../include/config.php';
//query pre prendere tutti i roles
$sql = "SELECT weapons.id, weapons.name, weapons.price, weapons.damage, weapons.bulk, weapon_type.name AS weapon_type,  weapon_traits.description AS traits_description, weapons.range, weapons.reload, weapons.capacity, weapons.misfire,
        GROUP_CONCAT(CONCAT(weapon_traits.name, IF(weapon_weapon_traits.value IS NOT NULL, CONCAT(' (', weapon_weapon_traits.value, ')'), '')) SEPARATOR ', ') AS weapon_traits
        FROM weapons
        JOIN weapon_type ON weapons.weapon_type_id = weapon_type.id
        LEFT JOIN weapon_weapon_traits ON weapons.id = weapon_weapon_traits.weapon_id
        LEFT JOIN weapon_traits ON weapon_weapon_traits.weapon_trait_id = weapon_traits.id
        GROUP BY weapons.id";

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
                            <li class="breadcrumb-item"><a href="#">Weapon</a></li>
                        </ol>
                    </nav>
                </div>
                <!-- /BREADCRUMB -->

                <div class="row layout-top-spacing">


                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-8">
                            <div class="table-form">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                        <!--FILTRO CON TIPOLOGIA DI ARMA-->
                                        <div class=" ">
                                            <select class="form-control" onchange="filterType(this)">
                                                <option value="0">All</option>
                                                <?php
                                                $sql = "SELECT * FROM weapon_type";
                                                $result_select = $link->query($sql);
                                                if ($result_select->num_rows > 0) {
                                                    while ($row_select = $result_select->fetch_assoc()) {
                                                        echo "<option value='" . $row_select["name"] . "'>" . $row_select["name"] . "</option>";
                                                    }
                                                } else {
                                                    echo "<option value='0'>0 results</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 text-right">
                               <!--         <button class="btn btn-primary" onclick="addWeapon()" >Add Weapon</button> -->
                                    </div>
                                </div>
                            </div>
                            <table id="ecommerce-list" class="table dt-table-hover" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Damage</th>
                                    <th>Bulk</th>
                                    <th>Type</th>
                                    <th>Range</th>
                                    <th>Reload</th>
                                    <th>Capacity</th>
                                    <th>Misfire</th>
                                    <th>Traits</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . ($row["name"]) . "</td>";
                                        echo "<td>" . ($row["price"]) . "</td>";
                                        echo "<td>" . ($row["damage"]) . "</td>";
                                        echo "<td>" . ($row["bulk"]) . "</td>";
                                        echo "<td>" . ($row["weapon_type"]) . "</td>";
                                        echo "<td>" . ($row["range"]) . "</td>";
                                        echo "<td>" . ($row["reload"]) . "</td>";
                                        echo "<td>" . ($row["capacity"]) . "</td>";
                                        echo "<td>" . ($row["misfire"]) . "</td>";
                                        //explode weapon_traits in array
                                        echo "<td>";
                                        if ($row["weapon_traits"] != null) {
                                            // Dividi i tratti e le descrizioni in array separati
                                            $weapon_traits = explode(", ", $row["weapon_traits"]);
                                            $traits_descriptions = explode(", ", $row["traits_description"]); // Descrizioni dei tratti

                                            // Cicla attraverso i tratti e le descrizioni
                                            foreach ($weapon_traits as $index => $trait) {
                                                // Verifica se esiste una descrizione corrispondente per il tratto
                                                $trait_description = isset($traits_descriptions[$index]) ? $traits_descriptions[$index] : "No description";

                                                // Stampa il tratto come link con popover contenente la descrizione
                                                echo '<a class="bs-popover" data-bs-container="body" data-bs-trigger="hover" data-bs-content="' . $trait_description . '" data-bs-placement="top" data-bs-toggle="popover" title="">' . $trait . '</a>, ';
                                            }
                                        }
                                        echo "</td>";




                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='10'>0 results</td></tr>";
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
<

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
    multiCheck(ecommerceList);

    function filterType(type) {
        //prendo il testo della select
        var type_id = type.value;
        //se il valore è 0 allora mostro tutti gli elementi
        if (type_id == 0) {
            ecommerceList.columns(4).search('').draw();
        } else {
            ecommerceList.columns(4).search(type_id).draw();
        }

    }



</script>





</body>
</html>