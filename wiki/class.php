<?php
include '../include/config.php';

$id_class = $_GET['id'];
if (isset($id_class)) {
    $sql = "SELECT * FROM class WHERE id = $id_class";
    $result = $link->query($sql);
    $row = $result->fetch_assoc();
    $name_class = $row['name'];
}


//query pre prendere tutti i roles
$sql = "SELECT * FROM class";
$result = $link->query($sql);
//mi recupero la skill_boost e la combat_boost
$sql = "SELECT * FROM class_combact_boost JOIN combact_proficiencies on class_combact_boost.fk_combact_proficiencies = combact_proficiencies.id
         WHERE fk_class = $id_class";
$result_combat_boost = $link->query($sql);
$row_combat_boost = $result_combat_boost->fetch_assoc();
$name_combat = $row_combat_boost['name'];
$value_combat = $row_combat_boost['value'];

//mi recupero la skill_boost e la combat_boost
$sql = "SELECT * FROM class_skill_boost JOIN skill on class_skill_boost.fk_skill = skill.id
         WHERE fk_class = $id_class";
$result_skill_boost = $link->query($sql);
$row_skill_boost = $result_skill_boost->fetch_assoc();
$name_skill = $row_skill_boost['name'];
$value_skill = $row_skill_boost['value'];

//CLASS PERK
$sql = "SELECT * FROM class_perk where fk_class = $id_class";
$result_perk = $link->query($sql);
$row_perk = $result_perk->fetch_assoc();
$name_perk = $row_perk['name'];
$description_perk = $row_perk['description'];
//CLASS ABILITY
$sql = "SELECT * FROM class_main_ability where fk_class = $id_class";
$result_ability = $link->query($sql);
$row_ability = $result_ability->fetch_assoc();
$name_ability = $row_ability['name'];
$description_ability = $row_ability['description'];
$action_ability = $row_ability['action'];
$cost_ability = $row_ability['cost'] ?? '';
if ($cost_ability != '' && $cost_ability != 0) {
    $cost = "$cost_ability" . " " . "MANA.";
} else {
    $cost = '';
}
$range_ability = $row_ability['range_class'] ?? '';
if ($range_ability != '' && $range_ability != 0) {
    $range = "Range: $range_ability". ".";
} else {
    $range = '';
}

//core ability







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
    <link href="../src/assets/css/dark/components/tabs.css" rel="stylesheet" type="text/css" />

    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="../src/assets/css/light/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
    <link href="../src/assets/css/dark/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../src/plugins/src/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="../src/plugins/css/light/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="../src/plugins/css/dark/table/datatable/dt-global_style.css">

    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <style>

        @media (min-width: 768px) {
            .nav-pills {
                width: 200px; /* Imposta la larghezza fissa solo per schermi grandi */
                white-space: nowrap; /* Impedisce che il testo vada a capo */
                text-overflow: ellipsis; /* Aggiunge i puntini se il testo è troppo lungo */
            }

            .nav-pills .nav-link {
                width: 100%; /* Fa sì che i pulsanti riempiano tutto lo spazio disponibile */
            }
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
                            <li class="breadcrumb-item"><a href="/wiki/classes.php">Classes</a></li>
                            <li class="breadcrumb-item"><a href="#"><?php echo $row['name']; ?></a></li>
                        </ol>
                    </nav>
                </div>
                <!-- /BREADCRUMB -->


                <div class="row layout-top-spacing">

                    <!--NAME HP DESCRIPTION IMAGE-->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 layout-top-spacing">
                        <div class="user-profile">
                            <div class="widget-content widget-content-area">
                                <div class="d-flex justify-content-between">
                                    <h3 class=""> <?php echo $row['name']; ?> </h3>
                                    <h3  class="text-warning"> <?php echo $row['hp']; ?> HP</h3>
                                </div>
                                <div class="text-center user-info">
                                    <img src="../src/assets/img/profile-3.jpeg" alt="avatar">
                                </div>
                                <!--description-->
                                <div class="user-info-list">
                                    <div class="">
                                        <span>DESCRIPTION</span>
                                        <p><?php echo $row['description']; ?></p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- LEVEl 1 -->

                <div class="row layout top-spacing">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 layout-top-spacing">
                        <div class="widget-content widget-content-area">
                            <div class="d-flex justify-content-between">
                                <h3 class="">Level 1</h3>

                            </div>
                            <hr>
                                <div class="">
                                    <span class="text-info fw-bold"><?php echo $row['name']; ?> 's profencies</span>
                                    <p>At level 1 you gain <span class="text-primary"> <?php echo $row['n_skills_boost']; ?> skills boost </span>  and  <span class="text-primary"> <?php echo $row['n_combat_boost']; ?> Combat Boosts </span>, none of these boost can bring a proficiency higher than the 1st.
                                        Then you gain <span class="text-primary"> <?php echo $value_combat ?> Combat Boosts in <?php echo $name_combat; ?> </span> and <span class="text-primary"> <?php echo $value_skill ?> Skills Boosts in <?php echo $name_skill; ?> </span>.</p>
                                    </p>
                                    <hr>
                                    <span class="text-info fw-bold"><?php echo $name_perk; ?> </span>(class perk)
                                    <!--PERK-->
                                    <p><?php echo $description_perk; ?></p>
                                    <hr>
                                    <!-- Class Ability-->
                                    <span class="text-info fw-bold"><?php echo $name_ability; ?>  [<?php echo $action_ability; ?> ]</span> (class ability)
                                    <p><?php echo $cost; ?> <?php echo $range; ?> <?php echo $description_ability; ?></p>
                                    <hr>
                                    <!-- Class Path-->
                                    <h4 class="text-info fw-bold"> <?php echo $row['name']; ?> 's Path</h4>
                                    <p >At level 1, you choose a Bard’s Path each with various features and abilities. Once chosen you can not change your Path.</p>
                                    <!--Class path -->
                                    <hr>

                                        <div class="row layout ">
                                            <div class="vertical-pill">
                                                <div class="d-flex flex-column flex-md-row align-items-start">
                                                    <div class="nav flex-row flex-md-column nav-pills me-3 justify-content-center align-items-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                        <?php
                                                        $sql = "SELECT * FROM class_path WHERE fk_class = $id_class";
                                                        $result = $link->query($sql);
                                                        $i = 0;
                                                        while ($row = $result->fetch_assoc()) {
                                                            $name = $row['name'];
                                                            $id = $row['id'];
                                                            $i++;
                                                            echo "<button class='nav-link ".($i == 1 ? 'active' : '')."' id='v-pills-profile-tab-$id' data-bs-toggle='pill' data-bs-target='#v-pills-profile-$id' type='button' role='tab' aria-controls='v-pills-profile-$id' aria-selected='".($i == 1 ? 'true' : 'false')."'>$name</button>";
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="tab-content" id="v-pills-tabContent">
                                                        <?php
                                                        $sql = "SELECT class_path.*,general_feats.name as name_feats,general_feats.bonus, skill.name as name_skill , s.name as name_skill_misc
                                                                FROM class_path JOIN general_feats on class_path.path_feats = general_feats.id LEFT JOIN  skill on class_path.fk_skill = skill.id  LEFT JOIN skill s  on class_path.fk_skill_misc = s.id
                                                                WHERE fk_class = $id_class";
                                                        $result = $link->query($sql);
                                                        $i = 0;
                                                        while ($row = $result->fetch_assoc()) {
                                                            $description = $row['description'];
                                                            $bonus_feats = $row['bonus'];
                                                            $id = $row['id'];
                                                            $name_feats = $row['name_feats'];
                                                            $name_skill = $row['name_skill'];
                                                            $n_skill_boost = $row['n_skill_boost'];
                                                            $n_combat_boost = $row['n_combact_boost'];
                                                            $n_misc = $row['n_misc'];
                                                            $name_skill_misc = $row['name_skill_misc'];
                                                            $name_path_bonus = $row['name_path_bonus'];
                                                            $description_path_bonus = $row['description_path_bonus'];
                                                            $name_path_ability = $row['name_path_ability'];
                                                            $description_path_ability = $row['description_path_ability'];
                                                            $action_path_ability = $row['action_path_ability'];
                                                            $requisite_path_ability = $row['requisite_path_ability'];
                                                            $range_path_ability = $row['range_path_ability'];
                                                            $cost_path_ability = $row['cost_path_ability'];
                                                            if ($cost_path_ability != '' && $cost_path_ability != 0) {
                                                                $cost_path_ability = "$cost_path_ability" . " " . "MANA.";
                                                            } else {
                                                                $cost_path_ability = '';
                                                            }
                                                            if ($range_path_ability != '' && $range_path_ability != 0) {
                                                                $range_path_ability = "Range: $range_path_ability" . ".";
                                                            } else {
                                                                $range_path_ability = '';
                                                            }






                                                            $i++;
                                                            ?>
                                                            <div class='tab-pane fade <?php echo $i == 1 ? "show active" : ""; ?>' id='v-pills-profile-<?php echo $id; ?>' role='tabpanel' aria-labelledby='v-pills-profile-tab-<?php echo $id; ?>'>
                                                                        <span class=" text-primary fw-bold"> Nome Skill boost </span> (Skill Boost)
                                                                <p>You gain <span class="text-primary"> <?php echo $n_skill_boost; ?> </span> skill boost in <span class="text-primary"> <?php echo $name_skill; ?> </span>, this can bring the prof to the 2nd step.  You gain a + <?php echo $n_misc?> to  <span class="text-primary"> <?php echo $name_skill_misc; ?> </span> .</p>


                                                                        <span class="text-primary fw-bold"> <?php echo $name_feats; ?> </span> (Path Feat)
                                                                        <p><?php echo $bonus_feats; ?></p>
                                                                       <span class="text-primary fw-bold"> <?php echo $name_path_bonus; ?> </span> (Path Bonus)
                                                                        <p><?php echo $description_path_bonus; ?></p>

                                                                        <span class="text-primary fw-bold"> <?php echo $name_path_ability; ?> <?php echo $action_path_ability; ?> </span> (Path Ability)
                                                                        <p><?php echo $cost_path_ability; ?> <?php echo $range_path_ability; ?> <?php echo $description_path_ability; ?></p>
                                                            </div>
                                                            <?php
                                                        } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <hr>

                                    <!-- Core Ability-->

                                    <h4 class="text-info fw-bold"> <?php echo $name_class ?> 's Core Ability</h4>
                                    <p >At level 1, you choose a <?php echo $name_class ?>'s Core Ability. Once chosen you can not change your Core Ability.</p>
                                    <div class="table-responsive">
                                    <table id="core-ability" class="table table-striped table-bordered "s>
                                        <thead>
                                        <tr class=" ">
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                            <th>Cost</th>
                                            <th>Range</th>
                                            <th>Requisite</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $sql = "SELECT * FROM class_core_abilities WHERE fk_class = $id_class";
                                        $result = $link->query($sql);
                                        while ($row = $result->fetch_assoc()) {
                                            $name = $row['name'];
                                            $description = $row['description'];
                                            $action = $row['action'];
                                            $cost = $row['cost'];
                                            $range = $row['range_class'];
                                            $requisite = $row['requisite'];
                                            if ($cost != '' && $cost != 0) {
                                                $cost = "$cost" . " " ;
                                            } else {
                                                $cost = '';
                                            }
                                            if ($range != '' && $range != 0) {
                                                $range = "Range: $range"  ;
                                            } else {
                                                $range = '';
                                            }
                                            echo "<tr>
                                                    <td>$name</td>
                                                    <td>$description</td>
                                                    <td>$action</td>
                                                    <td>$cost</td>
                                                    <td>$range</td>
                                                    <td>$requisite</td>
                                                </tr>";
                                        }

                                        ?>
                                        </tbody>
                                    </table>
                                    </div>


                                    



                                </div>
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

<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="../src/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../src/plugins/src/mousetrap/mousetrap.min.js"></script>
<script src="../src/plugins/src/waves/waves.min.js"></script>
<script src="../layouts/modern-dark-menu/app.js"></script>
<script src="../src/assets/js/custom.js"></script>
<script src="../src/plugins/src/highlight/highlight.pack.js"></script>


    <!-- END GLOBAL MANDATORY SCRIPTS -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<script src="../src/plugins/src/apex/apexcharts.min.js"></script>
<script src="../src/assets/js/dashboard/dash_1.js"></script>

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<script src="../src/plugins/src/table/datatable/datatables.js"></script>
<script>
    // Inizializza Isotope dopo il caricamento della pagina
    ecommerceList = $('#core-ability').DataTable({
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


</script>

</body>
</html>