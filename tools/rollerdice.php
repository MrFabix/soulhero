<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dice Roller Avanzato</title>
    <link href="../src/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
<body>

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

    <div class="mb-4">
        <label for="saveName" class="form-label">Salva come attacco:</label>
        <input type="text" class="form-control" id="saveName" placeholder="Es: Attacco Spada Lunga">
        <button class="btn btn-outline-secondary mt-2" id="saveAttack">Salva</button>
    </div>

    <div class="mb-4 text-center">
        <div id="dice-animation" class="dice-face">🎲</div>
    </div>

    <div class="mb-4">
        <h5>📜 Risultato</h5>
        <div id="resultBox" class="alert alert-success"></div>
    </div>

    <div class="mb-4">
        <h5>🎯 Attacchi Salvati</h5>
        <ul id="savedAttacks" class="list-group"></ul>
    </div>

    <div class="mb-4">
        <h5>🕒 Cronologia</h5>
        <ul id="history" class="list-group history"></ul>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/mathjs/11.11.1/math.min.js"></script>
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

    function refreshSavedAttacks() {
        fetch("get-attacks.php")
            .then(res => res.json())
            .then(saved => {
                const container = document.getElementById("savedAttacks");
                container.innerHTML = "";

                saved.forEach(item => {
                    const li = document.createElement("li");
                    li.className = "list-group-item d-flex justify-content-between align-items-center";
                    li.innerHTML = `<strong>${item.name}</strong> <button class="btn btn-sm btn-outline-primary" data-roll="${item.formula}">Lancia</button>`;
                    container.appendChild(li);
                });

                container.querySelectorAll("button").forEach(btn => {
                    btn.addEventListener("click", () => {
                        document.getElementById("diceInput").value = btn.getAttribute("data-roll");
                        document.getElementById("rollDice").click();
                    });
                });
            });
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

    document.getElementById("saveAttack").addEventListener("click", () => {
        const name = document.getElementById("saveName").value.trim();
        const formula = document.getElementById("diceInput").value.trim();
        if (!name || !formula) return;

        fetch("save-attack.php", {
            method: "POST",
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `name=${encodeURIComponent(name)}&formula=${encodeURIComponent(formula)}`
        }).then(() => refreshSavedAttacks());
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