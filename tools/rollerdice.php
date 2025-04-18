<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dice Roller Avanzato</title>
    <link rel="icon" href="../src/assets/img/favicon.ico" type="image/x-icon" />
    <link href="../src/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../layouts/modern-dark-menu/css/light/plugins.css" rel="stylesheet">
    <link href="../layouts/modern-dark-menu/css/dark/plugins.css" rel="stylesheet">
    <script src="../layouts/modern-dark-menu/loader.js"></script>
    <style>
        body { padding: 2rem; }
        .history { max-height: 200px; overflow-y: auto; }
        .dice-face {
            font-size: 5rem;
            display: inline-block;
            transition: transform 0.3s ease;
            animation: roll 0.6s ease-in-out forwards;
        }
        @keyframes roll {
            0%   { transform: rotate(0deg) scale(1); }
            25%  { transform: rotate(90deg) scale(1.2); }
            50%  { transform: rotate(180deg) scale(1); }
            75%  { transform: rotate(270deg) scale(1.2); }
            100% { transform: rotate(360deg) scale(1); }
        }
    </style>
</head>
<body class="layout-boxed">
<div id="load_screen"><div class="loader"><div class="loader-content">
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
                <div class="container">
                    <h1 class="mb-4">Dice Roller Avanzato</h1>

                    <!-- Selezione rapida dadi -->
                    <div class="mb-3">
                        <label class="form-label">Seleziona un dado:</label><br>
                        <div class="btn-group mb-2">
                            <button class="btn btn-outline-secondary dice-btn" data-dice="d4">d4</button>
                            <button class="btn btn-outline-secondary dice-btn" data-dice="d6">d6</button>
                            <button class="btn btn-outline-secondary dice-btn" data-dice="d8">d8</button>
                            <button class="btn btn-outline-secondary dice-btn" data-dice="d10">d10</button>
                            <button class="btn btn-outline-secondary dice-btn" data-dice="d12">d12</button>
                            <button class="btn btn-outline-secondary dice-btn" data-dice="d20">d20</button>
                            <button class="btn btn-outline-secondary dice-btn" data-dice="d100">d100</button>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="diceInput" class="form-label">Formula (es. <code>1d20+5</code>, <code>4d6dl1</code>):</label>
                        <input type="text" class="form-control" id="diceInput" placeholder="Es: 2d6+3">
                    </div>

                    <button class="btn btn-primary mb-3" id="rollDice">Lancia!</button>


                    <div class="mb-4 text-center">
                        <div id="dice-animation" class="dice-face">🎲</div>
                    </div>

                    <div class="mb-4">
                        <h5>📜 Risultato</h5>
                        <div id="resultBox" class="alert alert-success"></div>
                    </div>



                    <div class="mb-4">
                        <h5>🕒 Cronologia</h5>
                        <ul id="history" class="list-group history"></ul>
                    </div>
                </div>
            </div>
        </div>
        <?php include '../include/footer.php'; ?>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/mathjs/11.11.1/math.min.js"></script>
<script src="../src/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../src/plugins/src/mousetrap/mousetrap.min.js"></script>
<script src="../src/plugins/src/waves/waves.min.js"></script>
<script src="../layouts/modern-dark-menu/app.js"></script>
<script>
    const diceFaces = ['\u2680','\u2681','\u2682','\u2683','\u2684','\u2685'];

    function rollDiceFormula(formula) {
        const diceRegex = /(\d*)d(\d+)([a-z0-9]*)/gi;
        let replaced = formula.replace(diceRegex, (match, qty, sides, mod) => {
            const rolls = [];
            const times = parseInt(qty || "1");
            for (let i = 0; i < times; i++) {
                rolls.push(Math.floor(Math.random() * parseInt(sides)) + 1);
            }

            if (mod === "kh1") rolls.sort((a, b) => b - a).splice(1);
            if (mod === "kl1") rolls.sort((a, b) => a - b).splice(1);
            if (mod === "dl1") rolls.sort((a, b) => a - b).splice(0, 1);

            return "(" + rolls.join("+") + ")";
        });

        return {
            result: math.evaluate(replaced),
            expression: replaced
        };
    }

    function animateD6(result) {
        const diceDiv = document.getElementById("dice-animation");
        if (diceDiv) {
            diceDiv.style.animation = "none";
            void diceDiv.offsetWidth;
            diceDiv.style.animation = "roll 0.6s ease-in-out";

            if (result >= 1 && result <= 6) {
                diceDiv.textContent = diceFaces[result - 1];
            } else {
                diceDiv.textContent = "🎲";
            }
        }
    }

    function addToHistory(display) {
        const history = document.getElementById("history");
        const li = document.createElement("li");
        li.className = "list-group-item";
        li.textContent = display;
        history.prepend(li);
    }



    document.getElementById("rollDice").addEventListener("click", () => {
        const input = document.getElementById("diceInput").value.trim();
        if (!input) return;

        try {
            const { result, expression } = rollDiceFormula(input);
            const output = `🎲 ${input} → ${expression} = ${result}`;
            document.getElementById("resultBox").textContent = output;
            addToHistory(output);

            if (input.match(/^1d6$/)) {
                animateD6(result);
            }
        } catch (e) {
            document.getElementById("resultBox").textContent = "Errore nella formula";
        }
    });



    document.querySelectorAll('.dice-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const inputField = document.getElementById('diceInput');
            const current = inputField.value.trim();
            const sides = btn.getAttribute('data-dice').replace('d', '');
            const regex = new RegExp(`(\\b\\d*)d${sides}\\b`, 'g');

            if (regex.test(current)) {
                const updated = current.replace(regex, (match, qty) => {
                    const newQty = parseInt(qty || '1') + 1;
                    return `${newQty}d${sides}`;
                });
                inputField.value = updated;
            } else {
                inputField.value = current ? current + ' + 1' + btn.getAttribute('data-dice') : '1' + btn.getAttribute('data-dice');
            }
        });
    });

    refreshSavedAttacks();
</script>
</body>
</html>