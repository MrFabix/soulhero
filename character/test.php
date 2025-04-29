<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Hero Soul - Scheda Personaggio Digitalizzata</title>
    <link rel="icon" type="image/x-icon" href="../src/assets/img/favicon.ico"/>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Marcellus+SC&display=swap" rel="stylesheet">

    <link href="../layouts/modern-dark-menu/css/light/loader.css" rel="stylesheet" />
    <link href="../layouts/modern-dark-menu/css/dark/loader.css" rel="stylesheet" />
    <script src="../layouts/modern-dark-menu/loader.js"></script>


    <link href="../src/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../layouts/modern-dark-menu/css/light/plugins.css" rel="stylesheet">
    <link href="../layouts/modern-dark-menu/css/dark/plugins.css" rel="stylesheet">

    <style>
        :root {
            --dnd-red: rgba(7, 167, 255, 0.45);
            --dnd-red-dark: #6a1917;
            --dnd-gold: #c9ad6a;
            --dnd-gold-light: #e0d4b3;
            --dnd-bg: #f5f5f0;
            --dnd-card-bg: #ffffff;
            --dnd-text: #333333;
            --dnd-text-light: #666666;
            --dnd-border: #d6d6c2;
        }

        body.dark {
            --dnd-bg: #1a1a1a;
            --dnd-card-bg: #2a2a2a;
            --dnd-text: #f0f0f0;
            --dnd-text-light: #cccccc;
            --dnd-border: #444444;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: var(--dnd-bg);
            color: var(--dnd-text);
        }

        .dnd-header {
            font-family: 'Marcellus SC', serif;
            color: var(--dnd-red);
            text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
            letter-spacing: 1px;
        }

        .dnd-subheader {
            color: var(--dnd-text-light);
            font-weight: 300;
            letter-spacing: 0.5px;
        }

        .dnd-card {
            background-color: var(--dnd-card-bg);
            border: 1px solid var(--dnd-border);
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            transition: transform 0.2s;
            margin-bottom: 1.5rem; /* Added spacing */
        }

        .dnd-card:hover {
            transform: translateY(-2px);
        }

        .dnd-card-header {
            background-color: var(--dnd-red);
            color: white;
            padding: 12px 16px;
            border-radius: 8px 8px 0 0;
            font-weight: 500;
            font-size: 1.1rem;
        }

        .dnd-card-body {
            padding: 16px;
        }

        .stat-block {
            text-align: center;
            padding: 10px 5px; /* Adjusted padding */
            border: 1px solid var(--dnd-border);
            border-radius: 4px;
            margin-bottom: 10px;
            background-color: var(--dnd-bg); /* Light background for contrast */
        }

        .stat-value {
            font-size: 2rem; /* Slightly smaller */
            font-weight: 700;
            color: var(--dnd-red);
            line-height: 1;
        }

        .stat-label {
            font-size: 0.8rem; /* Slightly smaller */
            text-transform: uppercase;
            color: var(--dnd-text-light);
            letter-spacing: 0.5px;
            margin-top: 4px;
            font-weight: 500;
        }

        .stat-mod { /* Optional: For displaying modifier if calculated */
            font-size: 1rem;
            font-weight: 500;
            color: var(--dnd-gold);
            margin-top: 2px;
        }

        .combat-stat-block {
            text-align: center;
            padding: 12px;
        }

        .combat-stat-value {
            font-size: 2rem;
            font-weight: 700;
            color: var(--dnd-gold); /* Use gold for these */
        }

        .combat-stat-label {
            font-size: 0.9rem;
            text-transform: uppercase;
            color: var(--dnd-text-light);
            letter-spacing: 1px;
            margin-top: 4px;
        }

        .hp-display, .mana-display {
            font-size: 2rem;
            font-weight: 700;
            color: var(--dnd-red);
        }

        .hp-max, .mana-max {
            font-size: 1rem;
            color: var(--dnd-text-light);
        }

        .nav-tabs .nav-link {
            color: var(--dnd-text);
            font-weight: 500;
            border: none;
            padding: 12px 20px; /* Adjusted padding */
            position: relative;
            font-size: 0.95rem;
        }

        .nav-tabs .nav-link.active {
            color: var(--dnd-red);
            background-color: transparent;
        }

        .nav-tabs .nav-link.active:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 60%;
            height: 3px;
            background-color: var(--dnd-red);
        }

        .section-title {
            border-bottom: 2px solid var(--dnd-border);
            padding-bottom: 8px;
            margin-bottom: 16px;
            margin-top: 16px; /* Added margin top */
            color: var(--dnd-red);
            font-weight: 500;
            font-size: 1.2rem; /* Increased size */
        }

        .skill-item, .proficiency-item, .inventory-item, .magic-item-slot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 4px; /* Adjusted padding */
            border-bottom: 1px dashed var(--dnd-border);
            font-size: 0.95rem;
        }
        .skill-item:last-child, .proficiency-item:last-child,
        .inventory-item:last-child, .magic-item-slot:last-child {
            border-bottom: none;
        }

        .skill-name, .proficiency-name, .inventory-name, .magic-slot-name {
            font-weight: 500;
        }

        .skill-details, .proficiency-details, .inventory-details, .magic-slot-details {
            color: var(--dnd-gold);
            font-weight: 500;
            text-align: right;
        }
        .skill-stat {
            font-size: 0.8em;
            color: var(--dnd-text-light);
            margin-left: 8px;
        }

        .trait-block p {
            margin-bottom: 10px;
            font-size: 0.95rem;
        }
        .trait-block strong {
            color: var(--dnd-red-dark);
            body.dark & { color: var(--dnd-red); }
        }

        .resource-bar {
            background-color: var(--dnd-border);
            border-radius: 4px;
            overflow: hidden;
            height: 10px;
            margin-top: 4px;
        }
        .resource-bar-fill {
            background-color: var(--dnd-gold);
            height: 100%;
            width: 75%; /* Example fill */
            border-radius: 4px 0 0 4px;
        }
        .wounded-section span {
            margin-right: 15px;
        }
        .wounded-section input[type="checkbox"] {
            margin-right: 5px;
        }

    </style>
</head>
<body class="layout-boxed">

<div id="load_screen"> <div class="loader"> <div class="loader-content"> <div class="spinner-grow align-self-center"></div> </div> </div> </div>

<?php  include '../include/navbar.php'; ?>


<div class="main-container" id="container">
    <div class="overlay"></div>
    <div class="search-overlay"></div>

    <?php include '../include/sidebar.php'; ?>

    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="middle-content container-xxl p-0">

                <div class="character-header mb-4 row align-items-center">
                    <div class="col-md-4">
                        <label for="charName" class="form-label">Character Name</label>
                        <input type="text" class="form-control" id="charName" placeholder="Nome Personaggio">
                    </div>
                    <div class="col">
                        <label for="charSpecies" class="form-label">Species</label>
                        <input type="text" class="form-control" id="charSpecies" placeholder="Species">
                    </div>
                    <div class="col">
                        <label for="charClass" class="form-label">Class</label>
                        <input type="text" class="form-control" id="charClass" placeholder="Class">
                    </div>
                    <div class="col">
                        <label for="charPath" class="form-label">Path</label>
                        <input type="text" class="form-control" id="charPath" placeholder="Path">
                    </div>
                    <div class="col-md-1">
                        <label for="charLevel" class="form-label">Level</label>
                        <input type="number" class="form-control" id="charLevel" placeholder="Lvl">
                    </div>
                </div>

                <ul class="nav nav-tabs justify-content-center mb-4" id="tabSheet" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="core-tab" data-bs-toggle="tab" data-bs-target="#core" type="button" role="tab" aria-controls="core" aria-selected="true">Core Stats</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="combat-tab" data-bs-toggle="tab" data-bs-target="#combat" type="button" role="tab" aria-controls="combat" aria-selected="false">Combat & Skills</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="abilities-tab" data-bs-toggle="tab" data-bs-target="#abilitie" type="button" role="tab" aria-controls="abilities" aria-selected="false">Abilities & Feats</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="inventory-tab" data-bs-toggle="tab" data-bs-target="#inventory" type="button" role="tab" aria-controls="inventory" aria-selected="false">Inventory</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="magic-tab" data-bs-toggle="tab" data-bs-target="#magic" type="button" role="tab" aria-controls="magic" aria-selected="false">Magic</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="companion-tab" data-bs-toggle="tab" data-bs-target="#companion" type="button" role="tab" aria-controls="companion" aria-selected="false">Companion</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="notes-tab" data-bs-toggle="tab" data-bs-target="#notes" type="button" role="tab" aria-controls="notes" aria-selected="false">Notes & Campaign</button>
                    </li>
                </ul>

                <div class="tab-content" id="tabSheetContent">

                    <div class="tab-pane fade show active" id="core" role="tabpanel" aria-labelledby="core-tab">
                        <div class="row g-3">
                            <div class="col-lg-3 col-md-6">
                                <div class="dnd-card">
                                    <div class="dnd-card-header">Abilitie</div>
                                    <div class="dnd-card-body">
                                        <div class="row g-2">
                                            <div class="col-6"><div class="stat-block"><div class="stat-value">10</div><div class="stat-label">Might</div><div class="stat-mod">+0</div></div></div>
                                            <div class="col-6"><div class="stat-block"><div class="stat-value">10</div><div class="stat-label">Agility</div><div class="stat-mod">+0</div></div></div>
                                            <div class="col-6"><div class="stat-block"><div class="stat-value">10</div><div class="stat-label">Intellect</div><div class="stat-mod">+0</div></div></div>
                                            <div class="col-6"><div class="stat-block"><div class="stat-value">10</div><div class="stat-label">Charisma</div><div class="stat-mod">+0</div></div></div>
                                            <div class="col-12"><div class="stat-block"><div class="stat-value">10</div><div class="stat-label">Soul</div><div class="stat-mod">+0</div></div></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="dnd-card">
                                    <div class="dnd-card-header">Hit Points</div>
                                    <div class="dnd-card-body text-center">
                                        <input type="number" class="form-control hp-display d-inline-block w-50 text-center mb-1" value="45">
                                        <span class="hp-max fs-3 align-middle">/ 45</span>
                                        <div class="stat-label">Current / Max HP</div>
                                        <div class="mt-3 wounded-section">
                                            <span class="stat-label">Wounded:</span>
                                            <span><input type="checkbox" id="wounded1"> -1</span>
                                            <span><input type="checkbox" id="wounded2"> -2</span>
                                            <span><input type="checkbox" id="wounded3"> -3</span> </div>
                                    </div>
                                </div>
                                <div class="dnd-card">
                                    <div class="dnd-card-header">Mana</div>
                                    <div class="dnd-card-body text-center">
                                        <input type="number" class="form-control mana-display d-inline-block w-50 text-center mb-1" value="20">
                                        <span class="mana-max fs-3 align-middle">/ 20</span>
                                        <div class="stat-label">Current / Max Mana</div>
                                    </div>
                                </div>
                                <div class="dnd-card">
                                    <div class="dnd-card-header">Other Resources</div>
                                    <div class="dnd-card-body">
                                        <div class="skill-item"> <span class="skill-name">Action Points</span> <span class="skill-details">1 / 1</span> </div>
                                        <div class="skill-item"> <span class="skill-name">Item Charges</span> <span class="skill-details">2 / 3</span> </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="dnd-card">
                                    <div class="dnd-card-header">Combat Stats</div>
                                    <div class="dnd-card-body">
                                        <div class="row text-center">
                                            <div class="col-6 mb-3"><div class="combat-stat-block"><div class="combat-stat-value">10</div><div class="combat-stat-label">Initiative</div></div></div>
                                            <div class="col-6 mb-3"><div class="combat-stat-block"><div class="combat-stat-value">30</div><div class="combat-stat-label">Speed (ft)</div></div></div>
                                            <div class="col-6 mb-3"><div class="combat-stat-block"><div class="combat-stat-value">15</div><div class="combat-stat-label">Armor</div></div></div>
                                            <div class="col-6 mb-3"><div class="combat-block"><div class="combat-stat-value">12</div><div class="combat-stat-label">Dodge Armor</div></div></div>
                                            <div class="col-6"><div class="combat-stat-block"><div class="combat-stat-value">13</div><div class="combat-stat-label">Magic Resist (MR)</div></div></div>
                                            <div class="col-6"><div class="combat-stat-block"><div class="combat-stat-value">+2</div><div class="combat-stat-label">Proficiency</div></div></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="dnd-card">
                                    <div class="dnd-card-header">Combat Proficiencies</div>
                                    <div class="dnd-card-body">
                                        <h5 class="section-title mt-0">Weapons</h5>
                                        <div class="proficiency-item">
                                            <span class="proficiency-name">Unarmed</span>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="unarmed" value="1">
                                                <label class="form-check-label">1</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="unarmed" value="2">
                                                <label class="form-check-label">2</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="unarmed" value="3">
                                                <label class="form-check-label">3</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="unarmed" value="4">
                                                <label class="form-check-label">4</label>
                                            </div>
                                        </div>
                                        <div class="proficiency-item">
                                            <span class="proficiency-name">Unarmed</span>
                                            <input type="number" class="form-control form-control-sm" min="0" max="4" value="0" style="width: 60px;">
                                        </div>

                                        <div class="proficiency-item"><span class="proficiency-name">Single Handed</span> <input type="checkbox" class="form-check-input"></div>
                                        <div class="proficiency-item"><span class="proficiency-name">Two Handed</span> <input type="checkbox" class="form-check-input"></div>
                                        <div class="proficiency-item"><span class="proficiency-name">Ranged</span> <input type="checkbox" class="form-check-input"></div>
                                        <div class="proficiency-item"><span class="proficiency-name">Firearms</span> <input type="checkbox" class="form-check-input"></div>

                                        <h5 class="section-title">Armor</h5>
                                        <div class="proficiency-item"><span class="proficiency-name">No Armor</span> <input type="checkbox" class="form-check-input"></div>
                                        <div class="proficiency-item"><span class="proficiency-name">Light Armor</span> <input type="checkbox" class="form-check-input"></div>
                                        <div class="proficiency-item"><span class="proficiency-name">Medium Armor</span> <input type="checkbox" class="form-check-input"></div>
                                        <div class="proficiency-item"><span class="proficiency-name">Heavy Armor</span> <input type="checkbox" class="form-check-input"></div>
                                        <div class="proficiency-item"><span class="proficiency-name">Shields</span> <input type="checkbox" class="form-check-input"></div>

                                        <h5 class="section-title">Other</h5>
                                        <div class="proficiency-item"><span class="proficiency-name">Spellcasting</span> <input type="checkbox" class="form-check-input"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="combat" role="tabpanel" aria-labelledby="combat-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="dnd-card">
                                    <div class="dnd-card-header">Skills</div>
                                    <div class="dnd-card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="skill-item"><span class="skill-name">Acrobatics</span> <span class="skill-details">+0 <span class="skill-stat">(Agi)</span></span></div>
                                                <div class="skill-item"><span class="skill-name">Athletics</span> <span class="skill-details">+0 <span class="skill-stat">(Mig)</span></span></div>
                                                <div class="skill-item"><span class="skill-name">Concentration</span> <span class="skill-details">+0 <span class="skill-stat">(Soul?)</span></span></div>
                                                <div class="skill-item"><span class="skill-name">Craft Alchemy</span> <span class="skill-details">+0 <span class="skill-stat">(Int)</span></span></div>
                                                <div class="skill-item"><span class="skill-name">Craft Cooking</span> <span class="skill-details">+0 <span class="skill-stat">(Int)</span></span></div>
                                                <div class="skill-item"><span class="skill-name">Craft Runic Forge</span> <span class="skill-details">+0 <span class="skill-stat">(Mig/Int?)</span></span></div>
                                                <div class="skill-item"><span class="skill-name">Craft Enchanting</span> <span class="skill-details">+0 <span class="skill-stat">(Int)</span></span></div>
                                                <div class="skill-item"><span class="skill-name">Deception</span> <span class="skill-details">+0 <span class="skill-stat">(Cha)</span></span></div>
                                                <div class="skill-item"><span class="skill-name">Diplomacy</span> <span class="skill-details">+0 <span class="skill-stat">(Cha)</span></span></div>
                                                <div class="skill-item"><span class="skill-name">Endurance</span> <span class="skill-details">+0 <span class="skill-stat">(Mig?)</span></span></div>
                                                <div class="skill-item"><span class="skill-name">Intimidation</span> <span class="skill-details">+0 <span class="skill-stat">(Cha/Mig?)</span></span></div>
                                                <div class="skill-item"><span class="skill-name">Investigation</span> <span class="skill-details">+0 <span class="skill-stat">(Int)</span></span></div>
                                                <div class="skill-item"><span class="skill-name">Medicine</span> <span class="skill-details">+0 <span class="skill-stat">(Int)</span></span></div>

                                            </div>
                                            <div class="col-lg-6">
                                                <div class="skill-item"><span class="skill-name">Lore Arcane</span> <span class="skill-details">+0 <span class="skill-stat">(Int)</span></span></div>
                                                <div class="skill-item"><span class="skill-name">Lore Clockwork</span> <span class="skill-details">+0 <span class="skill-stat">(Int)</span></span></div>
                                                <div class="skill-item"><span class="skill-name">Lore Divine</span> <span class="skill-details">+0 <span class="skill-stat">(Int/Soul?)</span></span></div>
                                                <div class="skill-item"><span class="skill-name">Lore History</span> <span class="skill-details">+0 <span class="skill-stat">(Int)</span></span></div>
                                                <div class="skill-item"><span class="skill-name">Lore Nature</span> <span class="skill-details">+0 <span class="skill-stat">(Int)</span></span></div>
                                                <div class="skill-item"><span class="skill-name">Lore Planes</span> <span class="skill-details">+0 <span class="skill-stat">(Int)</span></span></div>
                                                <div class="skill-item"><span class="skill-name">Lore Society</span> <span class="skill-details">+0 <span class="skill-stat">(Int)</span></span></div>
                                                <div class="skill-item"><span class="skill-name">Perception</span> <span class="skill-details">+0 <span class="skill-stat">(Int/Soul?)</span></span></div>
                                                <div class="skill-item"><span class="skill-name">Performance</span> <span class="skill-details">+0 <span class="skill-stat">(Cha)</span></span></div>
                                                <div class="skill-item"><span class="skill-name">Ritualism</span> <span class="skill-details">+0 <span class="skill-stat">(Int/Soul?)</span></span></div>
                                                <div class="skill-item"><span class="skill-name">Sense Motive</span> <span class="skill-details">+0 <span class="skill-stat">(Soul?/Cha?)</span></span></div>
                                                <div class="skill-item"><span class="skill-name">Stealth</span> <span class="skill-details">+0 <span class="skill-stat">(Agi)</span></span></div>
                                                <div class="skill-item"><span class="skill-name">Survival</span> <span class="skill-details">+0 <span class="skill-stat">(Int/Mig?)</span></span></div>
                                                <div class="skill-item"><span class="skill-name">Thievery</span> <span class="skill-details">+0 <span class="skill-stat">(Agi)</span></span></div>
                                            </div>
                                        </div>
                                        <p class="text-muted mt-3"><small>Skill bonuses = Ability Mod + Proficiency (if proficient) + Misc. (Stat mapping based on common TTRPGs, adjust as needed for Hero Soul rules)</small></p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="dnd-card">
                                    <div class="dnd-card-header">Weapons & Attacks</div>
                                    <div class="dnd-card-body">
                                        <div class="inventory-item">
                                            <input type="text" class="form-control form-control-sm me-2" placeholder="Weapon Name" style="flex-basis: 30%;">
                                            <input type="text" class="form-control form-control-sm me-2" placeholder="Atk Bonus" style="flex-basis: 15%;">
                                            <input type="text" class="form-control form-control-sm me-2" placeholder="Damage/Type" style="flex-basis: 25%;">
                                            <input type="text" class="form-control form-control-sm" placeholder="Traits/Range" style="flex-basis: 30%;">
                                        </div>
                                        <div class="inventory-item">
                                            <input type="text" class="form-control form-control-sm me-2" placeholder="Weapon Name" style="flex-basis: 30%;">
                                            <input type="text" class="form-control form-control-sm me-2" placeholder="Atk Bonus" style="flex-basis: 15%;">
                                            <input type="text" class="form-control form-control-sm me-2" placeholder="Damage/Type" style="flex-basis: 25%;">
                                            <input type="text" class="form-control form-control-sm" placeholder="Traits/Range" style="flex-basis: 30%;">
                                        </div>
                                        <button class="btn btn-sm btn-outline-secondary mt-2">Add Weapon</button>
                                    </div>
                                </div>

                                <div class="dnd-card">
                                    <div class="dnd-card-header">Rest Actions</div>
                                    <div class="dnd-card-body">
                                        <p><strong>Short Rest:</strong> Regain X Mana (As per rules). Use Hit Dice?</p>
                                        <p><strong>Long Rest:</strong> Regain all HP and Mana. Reset abilities? (As per rules).</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="abilitie" role="tabpanel" aria-labelledby="abilities-tab">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="dnd-card">
                                    <div class="dnd-card-header">Species Traits</div>
                                    <div class="dnd-card-body trait-block">
                                        <textarea class="form-control" rows="8" placeholder="Enter Species traits and abilities..."></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="dnd-card">
                                    <div class="dnd-card-header">Class Features & Perks</div>
                                    <div class="dnd-card-body trait-block">
                                        <h5 class="section-title mt-0">Class Perk</h5>
                                        <textarea class="form-control mb-3" rows="3" placeholder="Class Perk description..."></textarea>
                                        <h5 class="section-title">Class Abilities</h5>
                                        <textarea class="form-control" rows="5" placeholder="Class abilities descriptions..."></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="dnd-card">
                                    <div class="dnd-card-header">Path & Core Abilities</div>
                                    <div class="dnd-card-body trait-block">
                                        <h5 class="section-title mt-0">Path Ability</h5>
                                        <textarea class="form-control mb-3" rows="3" placeholder="Path Ability description..."></textarea>
                                        <h5 class="section-title">Core Ability</h5>
                                        <textarea class="form-control mb-3" rows="3" placeholder="Core Ability description..."></textarea>
                                    </div>
                                </div>
                                <div class="dnd-card">
                                    <div class="dnd-card-header">Feats</div>
                                    <div class="dnd-card-body trait-block">
                                        <textarea class="form-control" rows="5" placeholder="List acquired Feats..."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="inventory" role="tabpanel" aria-labelledby="inventory-tab">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="dnd-card">
                                    <div class="dnd-card-header">Equipment & Inventory</div>
                                    <div class="dnd-card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5 class="section-title mt-0">Equipped Items</h5>
                                                <div class="inventory-item"><input type="text" class="form-control form-control-sm" placeholder="Equipped Item 1"></div>
                                                <div class="inventory-item"><input type="text" class="form-control form-control-sm" placeholder="Equipped Item 2 (e.g., Armor)"></div>
                                                <div class="inventory-item"><input type="text" class="form-control form-control-sm" placeholder="Equipped Item 3 (e.g., Shield)"></div>
                                            </div>
                                            <div class="col-md-6">
                                                <h5 class="section-title mt-0">Backpack / Other Items</h5>
                                                <div class="inventory-item">
                                                    <input type="number" class="form-control form-control-sm me-1" placeholder="Qty" style="flex-basis: 15%;">
                                                    <input type="text" class="form-control form-control-sm me-1" placeholder="Item Name" style="flex-basis: 60%;">
                                                    <input type="number" class="form-control form-control-sm" placeholder="Bulk" style="flex-basis: 15%;">
                                                </div>
                                                <div class="inventory-item">
                                                    <input type="number" class="form-control form-control-sm me-1" value="1" style="flex-basis: 15%;">
                                                    <input type="text" class="form-control form-control-sm me-1" value="Rope (50ft)" style="flex-basis: 60%;">
                                                    <input type="number" class="form-control form-control-sm" value="1" style="flex-basis: 15%;">
                                                </div>
                                                <button class="btn btn-sm btn-outline-secondary mt-2">Add Item</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="dnd-card">
                                    <div class="dnd-card-header">Currency & Bulk</div>
                                    <div class="dnd-card-body">
                                        <h5 class="section-title mt-0">Currency</h5>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">GP</span>
                                            <input type="number" class="form-control" placeholder="Gold" value="0">
                                        </div>
                                        <h5 class="section-title">Bulk</h5>
                                        <div class="input-group">
                                            <span class="input-group-text">Current</span>
                                            <input type="number" class="form-control" placeholder="Current Bulk" value="5">
                                            <span class="input-group-text">Max</span>
                                            <input type="number" class="form-control" placeholder="Max Bulk (e.g., 5 + Might)" value="15">
                                        </div>
                                        <small class="text-muted">Max Bulk typically = 5 + Might Score (Check Rules)</small>
                                    </div>
                                </div>
                                <div class="dnd-card">
                                    <div class="dnd-card-header">Linked Magic Items</div>
                                    <div class="dnd-card-body">
                                        <div class="magic-item-slot"><span class="magic-slot-name">Weapon/Wand/Shield 1</span><input type="text" class="form-control form-control-sm" placeholder="Item Name"></div>
                                        <div class="magic-item-slot"><span class="magic-slot-name">Weapon/Wand/Shield 2</span><input type="text" class="form-control form-control-sm" placeholder="Item Name"></div>
                                        <div class="magic-item-slot"><span class="magic-slot-name">Armor</span><input type="text" class="form-control form-control-sm" placeholder="Item Name"></div>
                                        <div class="magic-item-slot"><span class="magic-slot-name">Amulet</span><input type="text" class="form-control form-control-sm" placeholder="Item Name"></div>
                                        <div class="magic-item-slot"><span class="magic-slot-name">Misc Slot 1</span><input type="text" class="form-control form-control-sm" placeholder="Item Name"></div>
                                        <div class="magic-item-slot"><span class="magic-slot-name">Misc Slot 2</span><input type="text" class="form-control form-control-sm" placeholder="Item Name"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="magic" role="tabpanel" aria-labelledby="magic-tab">
                        <div class="dnd-card">
                            <div class="dnd-card-header">Magic & Spells</div>
                            <div class="dnd-card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h5 class="section-title mt-0">Spellcasting Info</h5>
                                        <div class="mb-2"><span class="skill-name">Spell Attack Bonus:</span> <input type="text" class="form-control form-control-sm d-inline-block w-25 ms-2" placeholder="+0"></div>
                                        <div class="mb-2"><span class="skill-name">Spell Save DC:</span> <input type="text" class="form-control form-control-sm d-inline-block w-25 ms-2" placeholder="10"></div>
                                        <div class="mb-2"><span class="skill-name">Spells Known:</span> <input type="text" class="form-control form-control-sm d-inline-block w-25 ms-2" placeholder="0"></div>
                                        <div class="mb-2"><span class="skill-name">Spells Prepared:</span> <input type="text" class="form-control form-control-sm d-inline-block w-25 ms-2" placeholder="0"></div>
                                    </div>
                                    <div class="col-md-8">
                                        <h5 class="section-title mt-0">Spell List</h5>
                                        <textarea class="form-control" rows="10" placeholder="List known spells, cantrips, prepared spells, rituals etc. Include details like casting time, range, duration, components, effects..."></textarea>
                                        <button class="btn btn-sm btn-outline-secondary mt-2">Add Spell</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="companion" role="tabpanel" aria-labelledby="companion-tab">
                        <div class="dnd-card">
                            <div class="dnd-card-header">Animal Companion / Familiar</div>
                            <div class="dnd-card-body">
                                <p>Placeholder for Companion/Familiar Sheet based on Page 5 of the PDF.</p>
                                <p>Include fields for Name, Type, HP, Armor, MR, Speed, Stats (Might, Agility, Intellect, Charisma, Soul), Skills, Abilities, Attacks, etc.</p>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="notes" role="tabpanel" aria-labelledby="notes-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="dnd-card">
                                    <div class="dnd-card-header">Character Notes</div>
                                    <div class="dnd-card-body">
                                        <textarea class="form-control" rows="10" placeholder="Backstory, personality, appearance, allies, enemies, goals..."></textarea>
                                    </div>
                                </div>
                                <div class="dnd-card">
                                    <div class="dnd-card-header">Quests</div>
                                    <div class="dnd-card-body">
                                        <textarea class="form-control" rows="5" placeholder="Active and completed quests..."></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="dnd-card">
                                    <div class="dnd-card-header">Lore Bits</div>
                                    <div class="dnd-card-body">
                                        <textarea class="form-control" rows="5" placeholder="Important lore discovered..."></textarea>
                                    </div>
                                </div>
                                <div class="dnd-card">
                                    <div class="dnd-card-header">NPC Tracker</div>
                                    <div class="dnd-card-body">
                                        <textarea class="form-control" rows="5" placeholder="Name, Location, Details..."></textarea>
                                    </div>
                                </div>
                                <div class="dnd-card">
                                    <div class="dnd-card-header">Location Tracker</div>
                                    <div class="dnd-card-body">
                                        <textarea class="form-control" rows="5" placeholder="Location Name, Details..."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <?php  include '../include/footer.php'; ?>

    </div>
</div>

<script src="../src/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../src/plugins/src/global/vendors.min.js"></script>
<script src="../src/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../src/plugins/src/mousetrap/mousetrap.min.js"></script>
<script src="../src/plugins/src/waves/waves.min.js"></script>
<script src="../layouts/modern-dark-menu/app.js"></script>
<script src="../src/assets/js/custom.js"></script>
<script>
    // Basic dark mode toggle example (add a button/switch to trigger this)

</script>

</body>
</html>