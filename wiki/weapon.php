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
                                        <button class="btn btn-primary" onclick="addWeapon()" >Add Weapon</button>
                                    </div>
                                </div>
                            </div>
                            <table id="ecommerce-list" class="table dt-table-hover" style="width:100%">
                                <thead>
                                <tr>
                                    <th class="checkbox-column"></th>
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
                                    <th class="no-content text-center">Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td></td>";
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
                                            $weapon_traits = explode(", ", $row["weapon_traits"]);
                                            if ($row["traits_description"] != null) {
                                                $trait_description =  ($row["traits_description"]);
                                            }else{
                                                $trait_description = "No description";
                                            }
                                        }
                                        foreach ($weapon_traits as $trait) {

                                            echo '<a class="bs-popover " data-bs-container="body" data-bs-trigger="hover" data-bs-content="' .$trait_description . '" data-bs-placement="top" data-bs-toggle="popover" data-original-title="" title="">' . $trait . ' </a>,';
                                        }
                                        echo "</td>";




                                        echo "<td class='text-center'>
                                                <div class='dropdown'>
                                                    <a class='dropdown-toggle' href='#' role='button' id='dropdownMenuLink1' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='true'>
                                                        <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-more-horizontal'>
                                                            <circle cx='12' cy='12' r='1'></circle>
                                                            <circle cx='19' cy='12' r='1'></circle>
                                                            <circle cx='5' cy='12' r='1'></circle>
                                                        </svg>
                                                    </a>
                                                    <div class='dropdown-menu' aria-labelledby='dropdownMenuLink1'>
                                                        <a class='dropdown-item' href='#' onclick='editWeapon(" . $row['id'] . ")'>Edit</a>
                                                        <a class='dropdown-item' href='#' onclick='deleteWeapon(" . $row['id'] . ")'>Delete</a>
                                                    </div>
                                                </div>
                                            </td>";
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
                        <select class="form-select" id="weaponTraits" name="weaponTraits[]" multiple>
                            <?php
                            $sql = "SELECT * FROM weapon_traits";
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
        headerCallback:function(e, a, t, n, s) {
            e.getElementsByTagName("th")[0].innerHTML=`
                <div class="form-check form-check-primary d-block new-control">
                    <input class="form-check-input chk-parent" type="checkbox" id="form-check-default">
                </div>`
        },
        columnDefs:[ {
            targets:0, width:"30px", className:"", orderable:!1, render:function(e, a, t, n) {
                return `
                    <div class="form-check form-check-primary d-block new-control">
                        <input class="form-check-input child-chk" type="checkbox" id="form-check-default">
                    </div>`
            }
        }],
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
            ecommerceList.columns(5).search('').draw();
        } else {
            ecommerceList.columns(5).search(type_id).draw();
        }

    }

    function editWeapon(id) {

        //pulisco i campi del form
        $('#weaponForm').trigger('reset');



        // Retrieve weapon data using AJAX or existing array
        $.ajax({
            url: '/api/get_weapon.php',
            type: 'GET',
            data: {id: id},
            success: function(response) {
                // Assuming response is JSON with weapon data
                const weapon = JSON.parse(response);
                console.log(weapon);

                // Fill the modal fields
                $('#weaponId').val(weapon.id);
                $('#weaponName').val(weapon.name);
                $('#weaponPrice').val(weapon.price);
                $('#weaponDamage').val(weapon.damage);
                $('#weaponBulk').val(weapon.bulk);
                $('#weaponType').val(weapon.weapon_type_id);
                // Change modal title and button text
                $('#weaponModalLabel').text('Edit Weapon');
                $('#saveWeaponBtn').text('Save changes');
                // Show the modal
                $('#weaponModal').modal('show');
            }
        });
    }

    function deleteWeapon(id) {
        // Store the weapon ID in a global variable or hidden field
        window.weaponIdToDelete = id;

        // Show the delete confirmation modal
        $('#deleteModal').modal('show');
    }

    $('#confirmDeleteBtn').click(function() {
        // Perform the delete operation using AJAX
        $.ajax({
            url: '/api/delete_weapon.php',
            type: 'POST',
            data: {id: window.weaponIdToDelete},
            success: function(response) {
                // Handle success response (e.g., reload the table or remove the deleted row)
                location.reload(); // Reload the page to refresh the table
            }
        });
    });

    // Handling the submit action for add/edit form
    $('#weaponForm').submit(function(event) {
        event.preventDefault();

        // Determine whether we are adding or editing
        const actionUrl = $('#weaponId').val() ? '/api/edit_weapon.php' : '/api/add_weapon.php';

        // Send the form data via AJAX
        $.ajax({
            url: actionUrl,
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                // Handle success response (e.g., reload the table)
                console.log(response);
                $('#weaponModal').modal('hide');
               // location.reload();
            }
        });
    });

    function addWeapon() {
        // Reset the form and clear the fields
        $('#weaponForm').trigger('reset');
        $('#weaponId').val('');  // Make sure to reset the hidden input field for weaponId

        // Reset the modal title and button text
        $('#weaponModalLabel').text('Add Weapon');
        $('#saveWeaponBtn').text('Add Weapon');

        // Show the modal (this can also be done via Bootstrap attributes)
        $('#weaponModal').modal('show');
    }



</script>





</body>
</html>