<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>HP & Mana Tracker</title>
    <link rel="icon" href="../src/assets/img/favicon.ico" type="image/x-icon" />

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
    <link href="../src/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../layouts/modern-dark-menu/css/light/plugins.css" rel="stylesheet">
    <link href="../layouts/modern-dark-menu/css/dark/plugins.css" rel="stylesheet">
    <script src="../layouts/modern-dark-menu/loader.js"></script>
    <style>
        body {
            font-family: 'Roboto', Arial, serif;
            font-weight: 400;
            font-size: 14px;
            transition: background 0.3s;
        }
        .tracker-container {
            padding-top: 100px;
            text-align: center;
        }
        .tracker {
            max-width: 180px;
            margin: auto;
        }
        .tracker h2 {
            font-weight: 400;
            margin-bottom: 10px;
        }
        .value-display {
            font-size: 3em;
            font-weight: 300;
            margin: 15px 0;
        }
        .tracker button {
            width: 75px;
            height: 45px;
            font-size: 1.5em;
            border: none;
            border-radius: .5rem;
            margin: 0 10px;
            transition: background-color 0.3s;
        }
    </style>
</head>
<body class="layout-boxed">
<div id="load_screen"><div class="loader"><div class="loader-content"><div class="spinner-grow align-self-center"></div></div></div></div>

<?php include '../include/navbar.php'; ?>
<div class="main-container" id="container">
    <div class="overlay"></div>
    <div class="search-overlay"></div>
    <?php include '../include/sidebar.php'; ?>

    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="middle-content container-xxl p-0">
                <div class="tracker-container">

                    <div class="tracker mb-5">
                        <h2 class="text-success">HP</h2>
                        <div id="hp-display" class="value-display text-success">30</div>
                        <div>
                            <button id="hp-add" class="btn btn-success">+</button>
                            <button id="hp-sub" class="btn btn-outline-success">-</button>
                        </div>
                    </div>

                    <div class="tracker">
                        <h2 class="text-primary">Mana</h2>
                        <div id="mana-display" class="value-display text-primary">10</div>
                        <div>
                            <button id="mana-add" class="btn btn-primary">+</button>
                            <button id="mana-sub" class="btn btn-outline-primary">-</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <?php include '../include/footer.php'; ?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    let hp = localStorage.getItem('hp') ? parseInt(localStorage.getItem('hp')) : 30;
    let mana = localStorage.getItem('mana') ? parseInt(localStorage.getItem('mana')) : 10;

    const updateDisplay = () => {
        $('#hp-display').text(hp);
        $('#mana-display').text(mana);
    };

    const storeValues = () => {
        localStorage.setItem('hp', hp);
        localStorage.setItem('mana', mana);
    };

    $('#hp-add').click(() => { hp++; updateDisplay(); storeValues(); });
    $('#hp-sub').click(() => { hp--; updateDisplay(); storeValues(); });
    $('#mana-add').click(() => { mana++; updateDisplay(); storeValues(); });
    $('#mana-sub').click(() => { mana--; updateDisplay(); storeValues(); });

    $(document).ready(() => {
        updateDisplay();
    });
</script>
<script src="../src/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../src/plugins/src/mousetrap/mousetrap.min.js"></script>
<script src="../src/plugins/src/waves/waves.min.js"></script>
<script src="../layouts/modern-dark-menu/app.js"></script>
</body>
</html>
