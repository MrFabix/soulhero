<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hero Sheet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../layouts/modern-dark-menu/css/light/plugins.css" rel="stylesheet">
    <link href="../layouts/modern-dark-menu/css/dark/plugins.css" rel="stylesheet">
    <link href="../layouts/modern-dark-menu/css/light/loader.css" rel="stylesheet">
    <link href="../layouts/modern-dark-menu/css/dark/loader.css" rel="stylesheet">
    <script src="../layouts/modern-dark-menu/loader.js"></script>
    <style>
        body {
            background-color: var(--bs-body-bg);
            font-family: 'Segoe UI', sans-serif;
            color: var(--bs-body-color);
        }
        .sheet-container {
            max-width: 1400px;
            margin: auto;
            padding: 2rem;
            background: var(--bs-body-bg);
            border-radius: 1rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        }
        .character-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        .character-header h1 {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }
        .avatar {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #e2a03f;
            margin-bottom: 1rem;
        }
        .section-title {
            background-color: #e2a03f;
            color: #fff;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
            font-weight: bold;
        }
        .stat-box, .info-block {
            background: var(--bs-light-bg-subtle);
            padding: 0.75rem;
            border-radius: 0.5rem;
            margin-bottom: 0.75rem;
            text-align: center;
        }
        .info-block strong {
            display: inline-block;
            width: 120px;
        }
        .skills-grid, .abilities-section {
            margin-top: 2rem;
        }
        .skills-grid .row > div, .abilities-section .row > div {
            margin-bottom: 1rem;
        }
        .dot {
            display: inline-block;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: #212529;
            margin-right: 4px;
        }
    </style>
</head>
<body class="layout-boxed">
<div id="load_screen">
    <div class="loader">
        <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div>
    </div>
</div>

<?php include '../include/navbar.php'; ?>
<div class="main-container" id="container">
    <div class="overlay"></div>
    <div class="search-overlay"></div>
    <?php include '../include/sidebar.php'; ?>

    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="sheet-container">
                <div class="character-header">
                    <img src="../src/assets/img/profile-3.jpeg" alt="Character Avatar" class="avatar">
                    <h1 id="pg-name">Aelyra Shadowborn</h1>
                    <p id="pg-meta" class="text-muted">Elfa - Guerriero - Sentiero del Fuoco</p>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="section-title">Stats</div>
                        <div class="stat-box">Initiative: <strong>+2</strong></div>
                        <div class="stat-box">Speed: <strong>9m</strong></div>
                        <div class="stat-box">Hit Points: <strong>28</strong></div>
                        <div class="stat-box">Mana: <strong>10</strong></div>
                        <div class="stat-box">MR: <strong>2</strong></div>
                        <div class="stat-box">Armor: <strong>17</strong></div>
                        <div class="stat-box">Dodge Armor: <strong>3</strong></div>
                        <div class="stat-box">Shield: <strong>2</strong></div>
                    </div>

                    <div class="col-md-6">
                        <div class="section-title">Abilities</div>
                        <div class="info-block"><strong>Class Perk:</strong> Precision</div>
                        <div class="info-block"><strong>Class Ability:</strong> Rapid Strike (1 Mana)</div>
                        <div class="info-block"><strong>Path Ability:</strong> Flame Burst (2 Mana)</div>
                        <div class="info-block"><strong>Core Ability:</strong> Inner Strength</div>
                        <div class="info-block"><strong>Secondary:</strong> Evasion</div>
                        <div class="info-block"><strong>Role Ability:</strong> Smite Evil</div>
                        <div class="info-block"><strong>Ultimate:</strong> Infernal Storm</div>

                        <div class="section-title">Weapons & Attacks</div>
                        <div class="info-block">
                            <strong>Longsword:</strong> Prof ●●●, 1d8 + STR, Traits: Versatile, Reach
                        </div>
                        <div class="info-block">
                            <strong>Shortbow:</strong> Prof ●●, 1d6 + DEX, Traits: Ranged, Reload
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="section-title">Skills</div>
                        <div class="skills-grid">
                            <div class="row">
                                <div class="col-6">Athletics ●●●</div>
                                <div class="col-6">Stealth ●●</div>
                                <div class="col-6">Arcane (Lore) ●</div>
                                <div class="col-6">Survival ●●</div>
                                <div class="col-6">Diplomacy ●</div>
                                <div class="col-6">Perception ●●●</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <?php include '../include/footer.php'; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../src/plugins/src/mousetrap/mousetrap.min.js"></script>
<script src="../src/plugins/src/waves/waves.min.js"></script>
<script src="../layouts/modern-dark-menu/app.js"></script>
</body>
</html>