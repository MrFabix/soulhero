<?php
include("include/config.php");

// Recupera l'id della classe dalla query string
$id = $_GET['id'];

// Esegui la query per ottenere i dettagli della classe
$sql = "SELECT * FROM class WHERE id = ?";
$stmt = $link->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$class = $result->fetch_assoc();

//prendiamo la class_perk
$sql = "SELECT class_perk.name, class_perk.description FROM class_perk WHERE fk_class = ?";
$stmt = $link->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$class_perk = $result->fetch_assoc();
$name_class_perk = $class_perk['name'] ?? '';
$description_class_perk = $class_perk['description'] ?? '';
//prendiamo la MAIN CLASS ABILITY
$sql = "SELECT class_main_ability.name, class_main_ability.description, class_main_ability.action, class_main_ability.range_class, class_main_ability.cost
FROM class_main_ability WHERE fk_class = ?";
$stmt = $link->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$class_main_ability = $result->fetch_assoc();
$name_main_ability = $class_main_ability['name'];
$description_main_ability = $class_main_ability['description'];
$action_main_ability = $class_main_ability['action'] ;
$range_class_main_ability = $class_main_ability['range_class'];
$cost_main_ability = $class_main_ability['cost'];




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $class['name']; ?> - Class Details</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Uncial+Antiqua&display=swap" rel="stylesheet">
    <!-- Custom CSS specific to Class Detail page -->
    <link href="style/rpg_style_card.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Cinzel', serif;
            background-image: url('img/backgrounds/rpg_background.jpg');
            background-size: cover;
            color: #f4f4f4;
        }
        h1, h2, h3 {
            font-family: 'Uncial Antiqua', serif;
            color: #f7d794;
            text-shadow: 2px 2px 8px #000;
        }
        .class-detail-container {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border: 2px solid #d4af37;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.8);
        }
        .level-section {
            margin-top: 20px;
            padding: 15px;
            border: 1px solid #d4af37;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 5px;
        }
        .level-header {
            color: #d4af37;
            font-size: 1.5rem;
        }
        .ability-title {
            color: #f7d794;
            font-weight: bold;
            font-size: 1.1rem;
        }
        .mana-title {
            color: #f7d794;
            font-weight: bold;
            font-size: 0.8rem;
        }
        .ability-description {
            color: #f4f4f4;
            font-size: 0.95rem;
        }
        .rpg-card {
            background-color: rgba(0, 0, 0, 0.1);
            border: 2px solid #d4af37;
            border-radius: 15px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.6);
            color: #f4f4f4;
            transition: transform 0.3s;
        }
        .rpg-card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.8);
        }
        /* Ottimizzazioni per dispositivi mobili */
        @media (max-width: 767px) {
            h1, h2, h3 {
                font-size: 1.2rem;
            }
            .ability-title {
                font-size: 1rem;
            }
            .mana-title {
                font-size: 0.75rem;
            }
            .ability-description {
                font-size: 0.9rem;
            }
            .rpg-card {
                margin-bottom: 20px;
            }
            .class-header {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }
        }
    </style>

</head>

<?php include("include/nav.php"); ?>

<body>

<div class="container mt-5">
    <div class="class-detail-container">
        <div class="class-header d-flex justify-content-between align-items-center">
            <img src="img/classes/<?php echo strtolower($class['name']); ?>.jpg" class="img-fluid" alt="<?php echo $class['name']; ?>" width="200">
            <h1><?php echo $class['name']; ?></h1>
            <span class="text-danger fs-5">HP: <?php echo $class['hp']; ?></span> <!-- Aumenta leggermente il font per l'HP -->
        </div>

        <div class="level-section">
            <h2 class="level-header">Level 1</h2>
            <div class="ability">
                <span class="ability-title"><?php echo $class['name']; ?>'s Proficiencies:</span>
                <p class="ability-description"> At level 1, you gain
                    <span class="mana-title"><?php echo $class['n_skills_boost']; ?> </span> Skill Boosts and
                    <span class="mana-title"><?php echo $class['n_combat_boost']; ?> </span> Combat Boosts, none of these boosts can bring a proficiency higher than the 1st.
                    <br>Then you gain
                    <?php
                    $combat_boosts = [];
                    while ($row = $result->fetch_assoc()) {
                        $combat_boosts[] = "<span class='ability-title'>" . $row['combact_value'] . "</span> Combat Boost in <span class='ability-title'>" . $row['name'] . "</span>";
                    }
                    if (count($combat_boosts) > 1) {
                        $last_combat_boost = array_pop($combat_boosts);
                        echo implode(", ", $combat_boosts) . " OR " . $last_combat_boost;
                    } elseif (count($combat_boosts) == 1) {
                        echo $combat_boosts[0];
                    }
                    ?>
                    and
                    <?php
                    $skill_boosts = [];
                    while ($row = $result->fetch_assoc()) {
                        $skill_boosts[] = "<span class='ability-title'>" . $row['skill_value'] . "</span> Skill Boost in <span class='ability-title'>" . $row['name'] . "</span>";
                    }
                    if (count($skill_boosts) > 1) {
                        $last_skill_boost = array_pop($skill_boosts);
                        echo implode(", ", $skill_boosts) . " AND " . $last_skill_boost;
                    } elseif (count($skill_boosts) == 1) {
                        echo $skill_boosts[0];
                    }
                    ?>, these can bring the prof to the 2nd step.
                </p>
            </div>

            <div class="ability">
                <span class="ability-title"><?php echo $name_class_perk; ?></span> (Class Perk)
                <p class="ability-description"><?php echo $description_class_perk; ?></p>
            </div>

            <div class="ability">
                <span class="ability-title"><?php echo $name_main_ability; ?></span> (Main Class Ability)
                <span class="fw-bold ability-title">[<?php echo $action_main_ability; ?> ]</span>
                <p class="ability-description small-text"> <!-- Usa la classe small-text per ridurre la dimensione -->
                    <span class="fw-bold mana-title"> <?php echo $cost_main_ability; ?> MANA. </span> <?php echo $description_main_ability; ?>
                </p>
            </div>

            <hr>
            <h3 class="level-header"><?php echo $class['name']; ?>'s Path:</h3>
            <p class="small-text">At level 1, you choose a <?php echo $class['name']; ?>'s Path, each with various features and abilities. Once chosen, you cannot change your Path.</p>

            <!-- Visualizzazione dei Path come Card -->
            <div class="container">
                <div class="row">
                    <?php
                    $sql_paths = "SELECT  class_path.name, class_path.description, class_path.n_misc, class_path.n_skill_boost,  skill.name as skill_name , class_path.n_combact_boost, s.name as skill_name_misc, g.name as path_feats, class_path.name_path_bonus, class_path.description_path_bonus, class_path.name_path_ability, class_path.description_path_ability, class_path.action_path_ability, class_path.cost_path_ability, class_path.range_path_ability, class_path.requisite_path_ability
                        FROM class_path JOIN skill ON class_path.fk_skill = skill.id JOIN skill s on class_path.fk_skill_misc = s.id join general_feats g on class_path.path_feats = g.id 
                        WHERE fk_class = ?";
                    $stmt_paths = $link->prepare($sql_paths);
                    $stmt_paths->bind_param("i", $id);
                    $stmt_paths->execute();
                    $result_paths = $stmt_paths->get_result();

                    if ($result_paths->num_rows > 0) {
                    while ($row_path = $result_paths->fetch_assoc()) {
                        echo '
                            <div class="col-md-6 mb-4">
                                <div class="card h-100 rpg-card">
                                    <div class="card-body small-text ">
                                        <h5 class="card-title level-header">' . $row_path["name"] . '</h5>
                                        <p class="ability-description small-text">' . $row_path["description"] . '</p>
                                        <p class="small-text">You gain <span class="ability-title">' . $row_path["n_skill_boost"] . '</span> Skill Boosts in <span class="ability-title">' . $row_path["skill_name"] . '</span>, this can bring to the 2nd step.
                                        You gain a + <span class="ability-title">' . $row_path["n_misc"] . '</span> misc to <span class="ability-title">' . $row_path["skill_name_misc"] . '</span> path.</p>
                                        <p class="small-text "> <psan class="ability-title">Path Feat: </span>  <span class=" small-text">' . $row_path["path_feats"] . '</span></psan></p>
                                      <span class="ability-title">'. $row_path["name_path_bonus"] .':</span>   <span class="ability-description small-text">' . $row_path["description_path_bonus"] . '</span>
                                         <div class="ability">
                                                <span class="ability-title">'. $row_path["name_path_ability"] .'</span> (Main Path Ability)
                                                <span class="fw-bold ability-title">['. $row_path["action_path_ability"] .']</span>
                                                <p class="ability-description small-text">
                                                    <span class="fw-bold mana-title"> '. $row_path["cost_path_ability"] .' MANA. </span> '. $row_path["description_path_ability"] .' 
                                                </p>
                                            </div>
                                            
                               
                                    </div>
                                </div>
                            </div>';
                    }
                    } else {
                        echo '<p>No paths found for this class.</p>';
                    }
                    ?>
                </div>
            </div>
            <h3 class="level-header"><?php echo $class['name']; ?>'s Core Abilities:</h3>
            <p class="small-text">At level 1, you choose a <?php echo $class['name']; ?>'s Core Abilities, each with various features and abilities. Once chosen, you cannot change your Core Abilities.</p>
            <table class="table table-dark table-striped">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                    <th scope="col">Cost</th>
                    <th scope="col">range_class</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sql_core_abilities = "SELECT class_core_abilities.name, class_core_abilities.description, class_core_abilities.action, class_core_abilities.cost, class_core_abilities.range_class
                        FROM class_core_abilities WHERE fk_class = ?";
                $stmt_core_abilities = $link->prepare($sql_core_abilities);
                $stmt_core_abilities->bind_param("i", $id);
                $stmt_core_abilities->execute();
                $result_core_abilities = $stmt_core_abilities->get_result();

                if ($result_core_abilities->num_rows > 0) {
                    while ($row_core_ability = $result_core_abilities->fetch_assoc()) {
                        echo '
                            <tr>
                                <td>' . $row_core_ability["name"] . '</td>
                                <td>' . $row_core_ability["description"] . '</td>
                                <td>' . $row_core_ability["action"] . '</td>
                                <td>' . $row_core_ability["cost"] . ' MANA</td>
                                <td>' . $row_core_ability["range_class"] . '</td>
                            </tr>';
                    }
                } else {
                    echo '<tr><td colspan="5">No core abilities found for this class.</td></tr>';
                }
                ?>
                </tbody>
            </table>

            <h3 class="level-header"><?php echo $class['name']; ?>s Secondary Abilities :</h3>

            <p class="small-text">At level 1, you choose a <?php echo $class['name']; ?>'s Secondary Abilities, each with various features and abilities. Once chosen, you cannot change your Secondary Abilities.</p>
            <table class="table table-dark table-striped">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Requisite</th>
                    <th scope="col">Action</th>
                    <th scope="col">Cost</th>
                    <th scope="col">Range</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sql_secondary_abilities = "SELECT class_secondary_abilities.name, class_secondary_abilities.description, class_secondary_abilities.action, class_secondary_abilities.cost, class_secondary_abilities.range_class, class_secondary_abilities.requisite
                        FROM class_secondary_abilities WHERE fk_class = ? AND level = 1";
                $stmt_secondary_abilities = $link->prepare($sql_secondary_abilities);
                $stmt_secondary_abilities->bind_param("i", $id);
                $stmt_secondary_abilities->execute();
                $result_secondary_abilities = $stmt_secondary_abilities->get_result();

                if ($result_secondary_abilities->num_rows > 0) {
                    while ($row_secondary_ability = $result_secondary_abilities->fetch_assoc()) {
                        echo '
                            <tr>
                                <td>' . $row_secondary_ability["name"] . '</td>
                                <td>' . $row_secondary_ability["description"] . '</td>
                                <td>' . $row_secondary_ability["requisite"] . '</td>
                                <td>' . $row_secondary_ability["action"] . '</td>
                                <td>' . $row_secondary_ability["cost"] . ' MANA</td>
                                <td>' . $row_secondary_ability["range_class"] . '</td>
                            </tr>';
                    }
                } else {
                    echo '<tr><td colspan="6">No secondary abilities found for this class.</td></tr>';
                }
                ?>
                </tbody>
            </table>

            <h3 class="level-header"><?php echo $class['name']; ?>'s Features :</h3>
            <p class="small-text">At level 1, you choose a <?php echo $class['name']; ?>'s Features, each with various features and abilities. Once chosen, you cannot change your Features.</p>

            <table class="table table-dark table-striped">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>

                </tr>
                </thead>
                <tbody>
                <?php
                $sql_class_features = "SELECT class_features.name, class_features.description
                        FROM class_features WHERE fk_class = ? AND level = 1";
                $stmt_class_features = $link->prepare($sql_class_features);
                $stmt_class_features->bind_param("i", $id);
                $stmt_class_features->execute();
                $result_class_features = $stmt_class_features->get_result();

                if ($result_class_features->num_rows > 0) {
                    while ($row_class_feature = $result_class_features->fetch_assoc()) {
                        echo '
                            <tr>
                                <td>' . $row_class_feature["name"] . '</td>
                                <td>' . $row_class_feature["description"] . '</td>
                            </tr>';
                    }
                } else {
                    echo '<tr><td colspan="6">No features found for this class.</td></tr>';
                }
                ?>
                </tbody>
            </table>
        </div>



        <div class="level-section">
            <h2 class="level-header">Level 2</h2>
            <div class="ability">
                <span class="ability-title"><?php echo $class['name']; ?>'s Secondary Abilities</span>
                <table class="table table-dark table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Requisite</th>
                        <th scope="col">Action</th>
                        <th scope="col">Cost</th>
                        <th scope="col">range_class</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sql_secondary_abilities = "SELECT class_secondary_abilities.name, class_secondary_abilities.description, class_secondary_abilities.action, class_secondary_abilities.cost, class_secondary_abilities.range_class, class_secondary_abilities.requisite
                        FROM class_secondary_abilities WHERE fk_class = ? AND level = 2";
                    $stmt_secondary_abilities = $link->prepare($sql_secondary_abilities);
                    $stmt_secondary_abilities->bind_param("i", $id);
                    $stmt_secondary_abilities->execute();
                    $result_secondary_abilities = $stmt_secondary_abilities->get_result();

                    if ($result_secondary_abilities->num_rows > 0) {
                        while ($row_secondary_ability = $result_secondary_abilities->fetch_assoc()) {
                            echo '
                            <tr>
                                <td>' . $row_secondary_ability["name"] . '</td>
                                <td>' . $row_secondary_ability["description"] . '</td>
                                <td>' . $row_secondary_ability["requisite"] . '</td>
                                <td>' . $row_secondary_ability["action"] . '</td>
                                <td>' . $row_secondary_ability["cost"] . ' MANA</td>
                                <td>' . $row_secondary_ability["range_class"] . '</td>
                            </tr>';
                        }
                    } else {
                        echo '<tr><td colspan="6">No secondary abilities found for this class.</td></tr>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="level-section">
            <h2 class="level-header">Level 3</h2>
            <div class="ability">
                <span class="ability-title"><?php echo $class['name']; ?>'s Features</span>
                <table class="table table-dark table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sql_class_features = "SELECT class_features.name, class_features.description
                        FROM class_features WHERE fk_class = ? AND level = 1";
                    $stmt_class_features = $link->prepare($sql_class_features);
                    $stmt_class_features->bind_param("i", $id);
                    $stmt_class_features->execute();
                    $result_class_features = $stmt_class_features->get_result();

                    if ($result_class_features->num_rows > 0) {
                        while ($row_class_feature = $result_class_features->fetch_assoc()) {
                            echo '
                            <tr>
                                <td>' . $row_class_feature["name"] . '</td>
                                <td>' . $row_class_feature["description"] . '</td>
                            </tr>';
                        }
                    } else {
                        echo '<tr><td colspan="2">No features found for this class.</td></tr>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="level-section">
            <h2 class="level-header">Level 4</h2>
            <div class="ability">
                <span class="ability-title"><?php echo $class['name']; ?>'s Secondary Abilities</span>
                <table class="table table-dark table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Requisite</th>
                        <th scope="col">Action</th>
                        <th scope="col">Cost</th>
                        <th scope="col">range_class</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sql_secondary_abilities = "SELECT class_secondary_abilities.name, class_secondary_abilities.description, class_secondary_abilities.action, class_secondary_abilities.cost, class_secondary_abilities.range_class, class_secondary_abilities.requisite
                        FROM class_secondary_abilities WHERE fk_class = ? AND level = 2";
                    $stmt_secondary_abilities = $link->prepare($sql_secondary_abilities);
                    $stmt_secondary_abilities->bind_param("i", $id);
                    $stmt_secondary_abilities->execute();
                    $result_secondary_abilities = $stmt_secondary_abilities->get_result();

                    if ($result_secondary_abilities->num_rows > 0) {
                        while ($row_secondary_ability = $result_secondary_abilities->fetch_assoc()) {
                            echo '
                            <tr>
                                <td>' . $row_secondary_ability["name"] . '</td>
                                <td>' . $row_secondary_ability["description"] . '</td>
                                <td>' . $row_secondary_ability["requisite"] . '</td>
                                <td>' . $row_secondary_ability["action"] . '</td>
                                <td>' . $row_secondary_ability["cost"] . ' MANA</td>
                                <td>' . $row_secondary_ability["range_class"] . '</td>
                            </tr>';
                        }
                    } else {
                        echo '<tr><td colspan="6">No secondary abilities found for this class.</td></tr>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="level-section">
            <h2 class="level-header">Level 5 - Ultimate Ability</h2>
            <div class="ability">
                <span class="ability-title"><?php echo $class['name']; ?>'s Ultimate Ability</span>
                <table class="table table-dark table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Requisite</th>
                        <th scope="col">Action</th>
                        <th scope="col">Cost</th>
                        <th scope="col">range_class</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    // Recupera l'abilità ultima della classe
                    $sql_ultimate_ability = "SELECT class_ultimate.name, class_ultimate.description, class_ultimate.action, class_ultimate.cost, class_ultimate.range_class, class_ultimate.requisite
                        FROM class_ultimate WHERE fk_class = ?";
                    $stmt_ultimate_ability = $link->prepare($sql_ultimate_ability);
                    $stmt_ultimate_ability->bind_param("i", $id);
                    $stmt_ultimate_ability->execute();
                    $result_ultimate_ability = $stmt_ultimate_ability->get_result();

                    if ($result_ultimate_ability->num_rows > 0) {
                        $ultimate_ability = $result_ultimate_ability->fetch_assoc();
                        echo '
                            <tr>
                                <td>' . $ultimate_ability["name"] . '</td>
                                <td>' . $ultimate_ability["description"] . '</td>
                                <td>' . $ultimate_ability["requisite"] . '</td>
                                <td>' . $ultimate_ability["action"] . '</td>
                                <td>' . $ultimate_ability["cost"] . ' MANA</td>
                                <td>' . $ultimate_ability["range_class"] . '</td>
                            </tr>';
                    } else {
                        echo '<tr><td colspan="5">No ultimate ability found for this class.</td></tr>';
                    }


                    ?>
                    </tbody>
                </table>
                <span class="ability-title"><?php echo $class['name']; ?>'s Features</span>
                <table class="table table-dark table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sql_class_features = "SELECT class_features.name, class_features.description
                        FROM class_features WHERE fk_class = ? AND level = 5";
                    $stmt_class_features = $link->prepare($sql_class_features);
                    $stmt_class_features->bind_param("i", $id);
                    $stmt_class_features->execute();
                    $result_class_features = $stmt_class_features->get_result();

                    if ($result_class_features->num_rows > 0) {
                        while ($row_class_feature = $result_class_features->fetch_assoc()) {
                            echo '
                            <tr>
                                <td>' . $row_class_feature["name"] . '</td>
                                <td>' . $row_class_feature["description"] . '</td>
                            </tr>';
                        }
                    } else {
                        echo '<tr><td colspan="6">No features found for this class.</td></tr>';
                    }
                    ?>
                    </tbody>
                </table>

            </div>
        </div>

        <div class="level-section">
            <h2 class="level-header">Level 6</h2>
            <div class="ability">
                <span class="ability-title"><?php echo $class['name']; ?>'s Secondary Abilities</span>
                <table class="table table-dark table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Requisite</th>
                        <th scope="col">Action</th>
                        <th scope="col">Cost</th>
                        <th scope="col">range_class</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sql_secondary_abilities = "SELECT class_secondary_abilities.name, class_secondary_abilities.description, class_secondary_abilities.action, class_secondary_abilities.cost, class_secondary_abilities.range_class, class_secondary_abilities.requisite
                        FROM class_secondary_abilities WHERE fk_class = ? AND level = 6";
                    $stmt_secondary_abilities = $link->prepare($sql_secondary_abilities);
                    $stmt_secondary_abilities->bind_param("i", $id);
                    $stmt_secondary_abilities->execute();
                    $result_secondary_abilities = $stmt_secondary_abilities->get_result();

                    if ($result_secondary_abilities->num_rows > 0) {
                        while ($row_secondary_ability = $result_secondary_abilities->fetch_assoc()) {
                            echo '
                            <tr>
                                <td>' . $row_secondary_ability["name"] . '</td>
                                <td>' . $row_secondary_ability["description"] . '</td>
                                <td>' . $row_secondary_ability["requisite"] . '</td>
                                <td>' . $row_secondary_ability["action"] . '</td>
                                <td>' . $row_secondary_ability["cost"] . ' MANA</td>
                                <td>' . $row_secondary_ability["range_class"] . '</td>
                            </tr>';
                        }
                    } else {
                        echo '<tr><td colspan="6">No secondary abilities found for this class.</td></tr>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="level-section">
            <h2 class="level-header">Level 7</h2>
            <div class="ability">
                <span class="ability-title"><?php echo $class['name']; ?>'s Features</span>
                <table class="table table-dark table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sql_class_features = "SELECT class_features.name, class_features.description
                        FROM class_features WHERE fk_class = ? AND level = 7";
                    $stmt_class_features = $link->prepare($sql_class_features);
                    $stmt_class_features->bind_param("i", $id);
                    $stmt_class_features->execute();
                    $result_class_features = $stmt_class_features->get_result();

                    if ($result_class_features->num_rows > 0) {
                        while ($row_class_feature = $result_class_features->fetch_assoc()) {
                            echo '
                            <tr>
                                <td>' . $row_class_feature["name"] . '</td>
                                <td>' . $row_class_feature["description"] . '</td>
                            </tr>';
                        }
                    } else {
                        echo '<tr><td colspan="6">No features found for this class.</td></tr>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="level-section">
            <h2 class="level-header">Level 8</h2>
            <div class="ability">
                <span class="ability-title"><?php echo $class['name']; ?>'s Secondary Abilities</span>
                <table class="table table-dark table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Requisite</th>
                        <th scope="col">Action</th>
                        <th scope="col">Cost</th>
                        <th scope="col">range_class</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sql_secondary_abilities = "SELECT class_secondary_abilities.name, class_secondary_abilities.description, class_secondary_abilities.action, class_secondary_abilities.cost, class_secondary_abilities.range_class, class_secondary_abilities.requisite
                        FROM class_secondary_abilities WHERE fk_class = ? AND level = 8";
                    $stmt_secondary_abilities = $link->prepare($sql_secondary_abilities);
                    $stmt_secondary_abilities->bind_param("i", $id);
                    $stmt_secondary_abilities->execute();
                    $result_secondary_abilities = $stmt_secondary_abilities->get_result();

                    if ($result_secondary_abilities->num_rows > 0) {
                        while ($row_secondary_ability = $result_secondary_abilities->fetch_assoc()) {
                            echo '
                            <tr>
                                <td>' . $row_secondary_ability["name"] . '</td>
                                <td>' . $row_secondary_ability["description"] . '</td>
                                <td>' . $row_secondary_ability["requisite"] . '</td>
                                <td>' . $row_secondary_ability["action"] . '</td>
                                <td>' . $row_secondary_ability["cost"] . ' MANA</td>
                                <td>' . $row_secondary_ability["range_class"] . '</td>
                            </tr>';
                        }
                    } else {
                        echo '<tr><td colspan="6">No secondary abilities found for this class.</td></tr>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="level-section">
            <h2 class="level-header">Level 9</h2>
            <div class="ability">
                <span class="ability-title"><?php echo $class['name']; ?>'s Features</span>
                <table class="table table-dark table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sql_class_features = "SELECT class_features.name, class_features.description
                        FROM class_features WHERE fk_class = ? AND level = 9";
                    $stmt_class_features = $link->prepare($sql_class_features);
                    $stmt_class_features->bind_param("i", $id);
                    $stmt_class_features->execute();
                    $result_class_features = $stmt_class_features->get_result();

                    if ($result_class_features->num_rows > 0) {
                        while ($row_class_feature = $result_class_features->fetch_assoc()) {
                            echo '
                            <tr>
                                <td>' . $row_class_feature["name"] . '</td>
                                <td>' . $row_class_feature["description"] . '</td>
                            </tr>';
                        }
                    } else {
                        echo '<tr><td colspan="6">No features found for this class.</td></tr>';
                    }
                    ?>
                    </tbody>
                </table>

            </div>
        </div>

        <div class="level-section">
            <h2 class="level-header">Level 10</h2>
            <div class="ability">
                <span class="ability-title"><?php echo $class['name']; ?>'s Secondary Abilities</span>
                <table class="table table-dark table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Requisite</th>
                        <th scope="col">Action</th>
                        <th scope="col">Cost</th>
                        <th scope="col">range_class</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sql_secondary_abilities = "SELECT class_secondary_abilities.name, class_secondary_abilities.description, class_secondary_abilities.action, class_secondary_abilities.cost, class_secondary_abilities.range_class, class_secondary_abilities.requisite
                        FROM class_secondary_abilities WHERE fk_class = ? AND level = 10";
                    $stmt_secondary_abilities = $link->prepare($sql_secondary_abilities);
                    $stmt_secondary_abilities->bind_param("i", $id);
                    $stmt_secondary_abilities->execute();
                    $result_secondary_abilities = $stmt_secondary_abilities->get_result();

                    if ($result_secondary_abilities->num_rows > 0) {
                        while ($row_secondary_ability = $result_secondary_abilities->fetch_assoc()) {
                            echo '
                            <tr>
                                <td>' . $row_secondary_ability["name"] . '</td>
                                <td>' . $row_secondary_ability["description"] . '</td>
                                <td>' . $row_secondary_ability["requisite"] . '</td>
                                <td>' . $row_secondary_ability["action"] . '</td>
                                <td>' . $row_secondary_ability["cost"] . ' MANA</td>
                                <td>' . $row_secondary_ability["range_class"] . '</td>
                            </tr>';
                        }
                    } else {
                        echo '<tr><td colspan="6">No secondary abilities found for this class.</td></tr>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?php include("include/footer.php"); ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<?php
// Chiudi la connessione al database
$link->close();
?>
