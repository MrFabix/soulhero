<?php
include '../include/config.php';

$id_class = $_GET['id'] ?? 0;
if ($id_class) {
    $sql = "SELECT * FROM class WHERE id = $id_class";
    $result = $link->query($sql);
    $row = $result->fetch_assoc();
    $name_class = $row['name'];

//mi recupero la skill_boost e la combat_boost
    $sql = "SELECT * FROM class_skill_boost JOIN skill on class_skill_boost.fk_skill = skill.id
         WHERE fk_class = $id_class";
    $result_skill_boost = $link->query($sql);
    $row_skill_boost = $result_skill_boost->fetch_assoc();
//controllo se è piu di uno
    $name_skill ="";
    if ($result_skill_boost->num_rows > 1) {
        $value_skill = $row_skill_boost['value'];
        while ($row_skill_boost = $result_skill_boost->fetch_assoc()) {
            $name_skill .= " and " . $row_skill_boost['name'];
        }

    }else{
        $name_skill = $row_skill_boost['name'] ?? '';
        $value_skill = $row_skill_boost['value'] ?? '';
    }



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
    //query pre prendere tutti i roles
    $sql = "SELECT * FROM class";
    $result = $link->query($sql);
//mi recupero la skill_boost e la combat_boost
    $sql = "SELECT * FROM class_combact_boost JOIN combact_proficiencies on class_combact_boost.fk_combact_proficiencies = combact_proficiencies.id
         WHERE fk_class = $id_class";
    $result_combat_boost = $link->query($sql);
    $row_combat_boost = $result_combat_boost->fetch_assoc();
//controllo se è piu di uno
    if ($result_combat_boost->num_rows > 1) {
        $name_combat = $row_combat_boost['name'];
        $value_combat = $row_combat_boost['value'];
        while ($row_combat_boost = $result_combat_boost->fetch_assoc()) {
            $name_combat .= " or " . $row_combat_boost['name'];

        }


    } else {
        $name_combat = $row_combat_boost['name'];
        $value_combat = $row_combat_boost['value'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $name_class ?? 'Class'; ?> - Wiki</title>
    <link rel="icon" href="../src/assets/img/favicon.ico" type="image/x-icon" />
    <link href="../src/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../layouts/modern-dark-menu/css/light/plugins.css" rel="stylesheet">
    <link href="../layouts/modern-dark-menu/css/dark/plugins.css" rel="stylesheet">
    <script src="../layouts/modern-dark-menu/loader.js"></script>
    <style>
        body {
            background: #f4f6f9;
            font-family: 'Segoe UI', sans-serif;
        }
        .class-header {
            border-radius: 1rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            padding: 2rem;
            background: #fff;
            margin-bottom: 2rem;
        }
        .level-section {
            border-radius: .75rem;
            background: #fff;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 2px 12px rgba(0,0,0,0.03);
        }
        .level-dot {
            width: 18px;
            height: 18px;
            margin: 6px 0;
            border-radius: 50%;
            background-color: #ccc;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .level-dot:hover {
            background-color: #e2a03f;
            transform: scale(1.2);
            box-shadow: 0 0 8px rgba(226, 160, 63, 0.7);
        }

        .level-dot.active {
            background-color: #e2a03f;
        }

    </style>
</head>
<body class="layout-boxed">
<div id="load_screen"> <div class="loader"> <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div></div></div>

<?php include '../include/navbar.php'; ?>
<div class="main-container" id="container">
    <div class="overlay"></div>
    <div class="search-overlay"></div>
    <?php include '../include/sidebar.php'; ?>

    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="middle-content container-xxl p-0">

                <div class="page-meta">
                    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/wiki/classes.php">Classes</a></li>
                            <li class="breadcrumb-item"><a href="#"><?php echo $name_class ?? ''; ?></a></li>
                        </ol>
                    </nav>
                </div>

                <div class="class-header card">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h2><?php echo $name_class ?? ''; ?></h2>
                        <span class="badge bg-warning text-dark fs-5">HP: <?php echo $row['hp'] ?? ''; ?></span>
                    </div>
                    <div class="text-center">
                        <img src="../src/assets/img/profile-3.jpeg" class="img-fluid rounded-circle" alt="avatar" style="width: 120px;">
                    </div>
                    <p class="mt-3"> <?php echo $row['description'] ?? ''; ?> </p>
                </div>
                <!--SEZIONE LIVELLO 1  -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 layout-top-spacing">
                    <div class="card" id="level-1">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="text-info fw-bold mb-0">LEVEL 1</h4>
                            <span class="badge bg-warning text-dark fs-6">Level 1</span>
                        </div>
                        <div class="card-body">
                            <section class="mb-4">
                                <h5 class="text-info fw-bold mb-2"><?php echo $row['name']; ?>'s Proficiencies</h5>
                                <p>
                                    At level 1 you gain <span class="text-primary fw-bold"><?php echo $row['n_skills_boost']; ?> skill boost</span> and <span class="text-primary fw-bold"><?php echo $row['n_combat_boost']; ?> Combat Boosts</span>, none of these can bring a proficiency higher than the 1st level.<br>
                                    Then you gain <span class="text-primary fw-bold"><?php echo $value_combat; ?> Combat Boosts</span> in <span class="text-primary fw-bold"><?php echo $name_combat; ?></span> and <span class="text-primary fw-bold"><?php echo $value_skill; ?> Skill Boosts</span> in <span class="text-primary fw-bold"><?php echo $name_skill; ?></span>, which can reach the 2nd step.
                                </p>
                            </section>

                            <section class="mb-4">
                                <h5 class="text-info fw-bold mb-2"><?php echo $name_perk; ?> <small class="text-muted">(Class Perk)</small></h5>
                                <p><?php echo $description_perk; ?></p>
                            </section>

                            <section class="mb-4">
                                <h5 class="text-info fw-bold mb-2"><?php echo $name_ability; ?> <?php echo $action_ability; ?> <small class="text-muted">(Class Ability)</small></h5>
                                <p><?php echo $cost; ?> <?php echo $range; ?> <?php echo $description_ability; ?></p>
                            </section>

                            <section class="mb-4">
                                <h4 class="text-info fw-bold mb-2"><?php echo $row['name']; ?>'s Path</h4>
                                <p>At level 1, you choose a Path with various features and abilities. Once chosen, it cannot be changed.</p>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <?php
                                            $sql = "SELECT * FROM class_path WHERE fk_class = $id_class";
                                            $result = $link->query($sql);
                                            $i = 0;
                                            while ($row = $result->fetch_assoc()) {
                                                $name = $row['name'];
                                                $id = $row['id'];
                                                $i++;
                                                echo "<button class='nav-link ".($i == 1 ? 'active' : '')."' id='v-pills-profile-tab-$id' data-bs-toggle='pill' data-bs-target='#v-pills-profile-$id' type='button' role='tab'>$name</button>";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="tab-content" id="v-pills-tabContent">
                                            <?php
                                            $sql = "SELECT class_path.*, general_feats.name as name_feats, general_feats.bonus, skill.name as name_skill, s.name as name_skill_misc FROM class_path JOIN general_feats ON class_path.path_feats = general_feats.id LEFT JOIN skill ON class_path.fk_skill = skill.id LEFT JOIN skill s ON class_path.fk_skill_misc = s.id WHERE fk_class = $id_class";
                                            $result = $link->query($sql);
                                            $i = 0;
                                            while ($row = $result->fetch_assoc()) {
                                                $id = $row['id'];
                                                $name_skill_boost = $row['name_skill_boost'];
                                                $n_skill_boost = $row['n_skill_boost'];
                                                $name_skill = $row['name_skill'];
                                                $n_misc = $row['n_misc'];
                                                $name_skill_misc = $row['name_skill_misc'];
                                                $name_feats = $row['name_feats'];
                                                $bonus_feats = $row['bonus'];
                                                $name_path_bonus = $row['name_path_bonus'];
                                                $description_path_bonus = $row['description_path_bonus'];
                                                $name_path_ability = $row['name_path_ability'];
                                                $action_path_ability = $row['action_path_ability'];
                                                $cost_path_ability = $row['cost_path_ability'] ? $row['cost_path_ability'] . " MANA." : '';
                                                $range_path_ability = $row['range_path_ability'] ? "Range: {$row['range_path_ability']}." : '';
                                                $description_path_ability = $row['description_path_ability'];

                                                $i++;
                                                echo "<div class='tab-pane fade ".($i == 1 ? 'show active' : '')."' id='v-pills-profile-$id' role='tabpanel'>
                                        <h6 class='text-primary fw-bold'>$name_skill_boost</h6>
                                        <p>You gain <span class='text-primary'>$n_skill_boost</span> skill boost in <span class='text-primary'>$name_skill</span>, and +<span class='text-primary'>$n_misc</span> to <span class='text-primary'>$name_skill_misc</span>.</p>

                                        <h6 class='text-primary fw-bold'>$name_feats</h6>
                                        <p>$bonus_feats</p>

                                        <h6 class='text-primary fw-bold'>$name_path_bonus</h6>
                                        <p>$description_path_bonus</p>

                                        <h6 class='text-primary fw-bold'>$name_path_ability $action_path_ability</h6>
                                        <p>$cost_path_ability $range_path_ability $description_path_ability</p>";

                                                if (isset($row['fk_spellcasting'])) {
                                                    $sql = "SELECT * FROM spellcasting WHERE id = " . $row['fk_spellcasting'];
                                                    $resultspellcasting = $link->query($sql);
                                                    $spell = $resultspellcasting->fetch_assoc();
                                                    echo "<h6 class='text-primary fw-bold'>{$spell['name']}</h6>
                                          <p>" . trim($spell['description']) . "</p>";

                                                    if (isset($row['n_echoes'])) {
                                                        echo "<h6 class='text-primary fw-bold'>Echoes of Magic</h6>
                                              <p>At level 1 choose <span class='text-primary'>{$row['n_echoes']}</span> Echoes of Magic.</p>";
                                                    }
                                                }

                                                echo "</div>";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>

                <!-- SEZIONE CORE ABILITY -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 layout-top-spacing">
                    <div class=" mb-4 card shadow-sm" id="core-ability-section">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="text-info fw-bold mb-0"><?php echo $name_class; ?>'s Core Ability</h4>
                            <span class="badge bg-warning text-dark fs-6">Level 1</span>
                        </div>
                        <div class="card-body">
                            <p class="mb-4">At level 1, you choose a <strong><?php echo $name_class; ?>'s Core Ability</strong>. Once chosen, you cannot change it later.</p>

                            <div class="table-responsive">
                                <table class="table table-hover table-bordered table-striped align-middle">
                                    <thead class=" ">
                                    <tr>
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

                                        // Format cost and range
                                        $cost_display = ($cost != '' && $cost != 0) ? "$cost MANA" : '-';
                                        $range_display = ($range != '' && $range != 0) ? "Range: $range" : '-';

                                        // Word wrap for long descriptions
                                        if (strlen($description) > 100) {
                                            $description = wordwrap($description, 100, "<br>");
                                        }

                                        echo "<tr>
                                <td><strong>$name</strong></td>
                                <td>$description</td>
                                <td>$action</td>
                                <td>$cost_display</td>
                                <td>$range_display</td>
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


                <div id="levels">
                    <?php
                    for ($lvl = 1; $lvl <= 10; $lvl++) {
                        $id_class = intval($id_class);

                        // === LIVELLI DISPARI (Class Features) ===
                        if ($lvl % 2 != 0) {
                            $sql = "SELECT * FROM class_features WHERE fk_class = $id_class AND level = $lvl";
                            $features_result = $link->query($sql);

                            echo "<div id='level-$lvl' class='card col-12 layout-top-spacing mt-4 mb-4'>";
                            echo "  <div class='card-header d-flex justify-content-between align-items-center'>";
                            echo "      <h4 class='text-info fw-bold mb-0'>$name_class's Class Features</h4>";
                            echo "      <span class='badge bg-warning text-dark fs-6'>Level $lvl</span>";
                            echo "  </div>";
                            echo "  <div class='card-body'>";

                            // === CONTINUA CLASS FEATURES
                            if ($features_result && $features_result->num_rows > 0) {
                                while ($feature = $features_result->fetch_assoc()) {
                                    echo "<h5 class='text-primary fw-semibold mb-1'>" . htmlspecialchars($feature['name']) . "</h5>";
                                    echo "<p>" . nl2br(htmlspecialchars($feature['description'])) . "</p><hr>";
                                }
                                if ($lvl == 5) {
                                    // === SEZIONE ULTIMATE ABILITIES (SOLO PER IL LIVELLO 5) ===
                                    echo "<h4 class='text-primary fw-bold mb-3'>$name_class's Ultimate Abilities</h4>";
                                    echo "<div class='table-responsive mb-4'>";
                                    echo "<table class='table table-bordered table-striped align-middle'>";
                                    echo "  <thead class='table-light'>";
                                    echo "      <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Action</th>
                                <th>Cost</th>
                                <th>Range</th>
                                <th>Requisite</th>
                            </tr>";
                                    echo "  </thead><tbody>";

                                    $sql = "SELECT * FROM class_ultimate WHERE fk_class = $id_class";
                                    $ultimate_result = $link->query($sql);

                                    if ($ultimate_result && $ultimate_result->num_rows > 0) {
                                        while ($ult = $ultimate_result->fetch_assoc()) {
                                            $name = htmlspecialchars($ult['name']);
                                            $description = nl2br(htmlspecialchars(wordwrap($ult['description'], 100)));
                                            $action = htmlspecialchars($ult['action']);
                                            $cost = $ult['cost'] ? $ult['cost'] . ' MANA.' : '';
                                            $range = $ult['range_class'] ? 'Range: ' . $ult['range_class'] . '.' : '';
                                            $requisite = htmlspecialchars($ult['requisite'] ?? '');

                                            echo "<tr>
                                <td class='fw-semibold'>$name</td>
                                <td>$description</td>
                                <td>$action</td>
                                <td>$cost</td>
                                <td>$range</td>
                                <td>$requisite</td>
                            </tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='6' class='text-muted'>No Ultimate Abilities found.</td></tr>";
                                    }

                                    echo "</tbody></table></div><hr>";
                                }

                            } else {
                                echo "<p class='text-muted'>No features found for this level.</p>";
                            }

                            echo "  </div>";
                            echo "</div>";
                        }

                        // === LIVELLI PARI (Secondary Abilities) ===
                        else {
                            $sql = "SELECT * FROM class_secondary_abilities WHERE fk_class = $id_class AND level = $lvl";
                            $result = $link->query($sql);

                            echo "<div id='level-$lvl' class='col-12 layout-top-spacing mt-4 mb-4'>";
                            echo "  <div class='card shadow-sm border-0'>";
                            echo "      <div class='card-header bg-transparent d-flex justify-content-between align-items-center'>";
                            echo "          <h4 class='text-primary fw-bold mb-0'>$name_class's Secondary Abilities</h4>";
                            echo "          <span class='badge bg-warning text-dark fs-6'>Level $lvl</span>";
                            echo "      </div>";
                            echo "      <div class='card-body'>";

                            if ($result && $result->num_rows > 0) {
                                echo "      <div class='table-responsive'>";
                                echo "          <table class='table table-striped align-middle table-bordered mb-0'>";
                                echo "              <thead class='table-light'>";
                                echo "                  <tr>";
                                echo "                      <th>Name</th>";
                                echo "                      <th>Description</th>";
                                echo "                      <th>Action</th>";
                                echo "                      <th>Cost</th>";
                                echo "                      <th>Range</th>";
                                echo "                      <th>Requisite</th>";
                                echo "                  </tr>";
                                echo "              </thead>";
                                echo "              <tbody>";

                                while ($row = $result->fetch_assoc()) {
                                    $name = htmlspecialchars($row['name']);
                                    $description = nl2br(htmlspecialchars(wordwrap($row['description'], 100)));
                                    $action = htmlspecialchars($row['action'] ?? '');
                                    $cost = $row['cost'] ? $row['cost'] . ' MANA.' : '';
                                    $range = $row['range_class'] ? 'Range: ' . $row['range_class'] . '.' : '';
                                    $requisite = htmlspecialchars($row['requisite'] ?? '');

                                    echo "<tr>";
                                    echo "  <td class='fw-semibold'>$name</td>";
                                    echo "  <td>$description</td>";
                                    echo "  <td>$action</td>";
                                    echo "  <td>$cost</td>";
                                    echo "  <td>$range</td>";
                                    echo "  <td>$requisite</td>";
                                    echo "</tr>";
                                }

                                echo "              </tbody>";
                                echo "          </table>";
                                echo "      </div>";
                            } else {
                                echo "<p class='text-muted'>No secondary abilities found for this level.</p>";
                            }

                            echo "      </div>";
                            echo "  </div>";
                            echo "</div>";
                        }
                    }
                    ?>
                </div>


            </div>
        </div>
        <?php include '../include/footer.php'; ?>
    </div>

</div>

<div class="level-navigation position-fixed top-50 end-0 translate-middle-y d-flex flex-column align-items-center">
    <?php for ($i = 1; $i <= 10; $i++): ?>
        <span class="level-dot" id="level-dot-<?php echo $i; ?>" onclick="scrollToLevel(<?php echo $i; ?>)" title="Level <?php echo $i; ?>"></span>
    <?php endfor; ?>
</div>


<script src="../src/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../src/plugins/src/mousetrap/mousetrap.min.js"></script>
<script src="../src/plugins/src/waves/waves.min.js"></script>
<script src="../layouts/modern-dark-menu/app.js"></script>
<script>
    // Funzione per scrollare alla sezione desiderata
    function scrollToLevel(level) {
        document.querySelectorAll('.level-dot').forEach(dot => dot.classList.remove('active'));
        document.getElementById('level-dot-' + level).classList.add('active');

        const target = document.getElementById('level-' + level);
        if (target) {
            target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }

    // Evidenzia il dot in base alla sezione visibile
    window.addEventListener('scroll', function () {
        const levels = document.querySelectorAll('[id^="level-"]');
        let currentLevel = 1;

        levels.forEach((el, index) => {
            const rect = el.getBoundingClientRect();
            if (rect.top < window.innerHeight * 0.3) {
                const idMatch = el.id.match(/level-(\d+)/);
                if (idMatch) currentLevel = parseInt(idMatch[1]);
            }
        });

        document.querySelectorAll('.level-dot').forEach(dot => dot.classList.remove('active'));
        const activeDot = document.getElementById('level-dot-' + currentLevel);
        if (activeDot) activeDot.classList.add('active');
    });
</script>


</body>
</html>
