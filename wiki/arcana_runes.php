<?php
include '../include/config.php';
//query pre prendere tutti i roles
$sql = "SELECT arcane_runes.*, arcane_rune_type.nome as type FROM arcane_runes join arcane_rune_type on arcane_runes.fk_type = arcane_rune_type.id";
$result = $link->query($sql);

if (isset($_GET["id"])) {
    $id_search = $_GET["id"];
}

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
                            <li class="breadcrumb-item"><a href="#">Arcana Runes</a></li>
                        </ol>
                    </nav>
                </div>
                <!-- /BREADCRUMB -->

                <div class="row layout-top-spacing">


                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-8">
                            <div class="table-form">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <!--FILTRO CON TIPOLOGIA DI ARMA-->
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Type</label>
                                            <select class="form-control" id="exampleFormControlSelect1" onchange="filterType(this)">
                                                <option value="0">All</option>
                                                <option value="Advanced">Advanced</option>
                                                <option value="Basic">Basic</option>
                                                <option value="Structure">Structure</option>
                                                <option value="Echoes of Magic">Echoes of Magic </option>

                                            </select>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <table id="ecommerce-list" class="table dt-table-hover" style="width:100%">
                                <thead>
                                <tr>

                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Mana Cost</th>
                                    <th>Effect</th>



                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr data-id='" . $row["id"] . "'>";
                                        echo "<td>" . ($row["name"]) . "</td>";
                                        echo "<td>" . ($row["type"]) . "</td>";
                                            echo "<td>" . ($row["mana_cost"]) . "</td>";
                                        echo "<td>" . ($row["effect"]) . "</td>";





                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='8'>0 results</td></tr>";
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

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<script src="../src/plugins/src/global/vendors.min.js"></script>
<script src="../src/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../src/plugins/src/mousetrap/mousetrap.min.js"></script>
<script src="../src/plugins/src/waves/waves.min.js"></script>
<script src="../layouts/modern-dark-menu/app.js"></script>
<script src="../src/assets/js/custom.js"></script>
<script src="../src/plugins/src/jquery/jquery-3.6.0.min.js"></script>
<script src="../src/plugins/src/jquery-ui/jquery-ui.min.js"></script>

<!-- END GLOBAL MANDATORY STYLES -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="../src/plugins/src/table/datatable/datatables.js"></script>
<script>
    ecommerceList = $('#ecommerce-list').DataTable({

        "order": [[ 2, "asc" ]],
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
            ecommerceList.columns(1).search('').draw();
        } else {
            ecommerceList.columns(1).search(type_id).draw();
        }

    }

    document.addEventListener("DOMContentLoaded", function() {
        // Recupera l'ID dalla query string
        const params = new URLSearchParams(window.location.search);
        const id = params.get("id");

        if (id) {
            // Trova la riga corrispondente con l'attributo data-id
            const targetRow = document.querySelector(`tr[data-id='${id}']`);
            if (targetRow) {
                // Scorri fino alla riga
                targetRow.scrollIntoView({ behavior: "smooth", block: "center" });
                // Aggiungo una classe alla targetRow
                targetRow.classList.add( "border-warning" , "border");
                //aggiungo un effeto di shake con jqueryUI
                $(targetRow).effect("shake", { times: 2 }, 1000);

            }


        }
    });

</script>

</body>
</html>