<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hero Soul - Character Creation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f6f9; font-family: 'Segoe UI', sans-serif; }
        .step { display: none; }
        .step.active { display: block; }
        .wizard-nav button { margin: 0 5px; }
        .wizard-container { max-width: 800px; margin: auto; padding: 2rem; background: #fff; border-radius: 1rem; box-shadow: 0 4px 20px rgba(0,0,0,0.05); }
    </style>
</head>
<body>

<div class="wizard-container mt-5">
    <h2 class="mb-4 text-center">🧙‍♂️ Hero Soul - Character Creation</h2>

    <!-- Step 1: Base info -->
    <div class="step active" id="step-1">
        <h4>Step 1: Nome e Concept</h4>
        <div class="mb-3">
            <label class="form-label">Nome del personaggio</label>
            <input type="text" class="form-control" id="pg-name">
        </div>
        <div class="mb-3">
            <label class="form-label">Età</label>
            <input type="number" class="form-control" id="pg-age">
        </div>
        <div class="mb-3">
            <label class="form-label">Aspetto</label>
            <textarea class="form-control" id="pg-aspect" rows="2"></textarea>
        </div>
    </div>

    <!-- Step 2: Specie -->
    <div class="step" id="step-2">
        <h4>Step 2: Seleziona la Specie</h4>
        <div id="species-container" class="row"></div>
    </div>

    <!-- Step 3: Classe e Percorso -->
    <div class="step" id="step-3">
        <h4>Step 3: Classe e Percorso</h4>
        <div class="row" id="roles-container"></div>
        <hr>
        <h5 class="mt-4">Percorsi disponibili</h5>
        <div class="row" id="path-container"></div>
    </div>

    <!-- Step 4: Statistiche Base -->
    <div class="step" id="step-4">
        <h4>Step 4: Distribuisci i Punti Statistica</h4>
        <p>Hai <strong>10 punti</strong> da distribuire tra le 4 statistiche.</p>
        <div class="row">
            <div class="col-6 mb-3">
                <label>Forza</label>
                <input type="number" class="form-control stat-input" id="stat-str" value="0" min="0" max="10">
            </div>
            <div class="col-6 mb-3">
                <label>Destrezza</label>
                <input type="number" class="form-control stat-input" id="stat-dex" value="0" min="0" max="10">
            </div>
            <div class="col-6 mb-3">
                <label>Intelligenza</label>
                <input type="number" class="form-control stat-input" id="stat-int" value="0" min="0" max="10">
            </div>
            <div class="col-6 mb-3">
                <label>Carisma</label>
                <input type="number" class="form-control stat-input" id="stat-cha" value="0" min="0" max="10">
            </div>
        </div>
        <p id="points-left" class="text-danger">Punti rimanenti: 10</p>
    </div>

    <!-- Step 5: Riepilogo -->
    <div class="step" id="step-5">
        <h4>Step 5: Riepilogo Personaggio</h4>
        <div id="summary-container"></div>
    </div>

    <!-- Bottoni -->
    <div class="wizard-nav d-flex justify-content-between mt-4">
        <button class="btn btn-secondary" id="prevBtn" onclick="nextPrev(-1)">Indietro</button>
        <button class="btn btn-primary" id="nextBtn" onclick="nextPrev(1)">Avanti</button>
    </div>
</div>

<script>
    let currentStep = 0;
    const steps = document.querySelectorAll('.step');
    let characterData = {
        name: '', age: 0, aspect: '',
        species: '', role: '', path: '',
        stats: { str: 0, dex: 0, int: 0, cha: 0 }
    };

    function showStep(n) {
        steps.forEach((step, index) => step.classList.toggle('active', index === n));
        document.getElementById('prevBtn').style.display = n === 0 ? 'none' : 'inline-block';
        document.getElementById('nextBtn').textContent = (n === steps.length - 1) ? 'Conferma' : 'Avanti';
        if (n === 4) updateStatPoints();
        if (n === 5) generateSummary();
    }

    function nextPrev(n) {
        if (currentStep === 4 && n === 1 && getRemainingPoints() !== 0) {
            alert("Devi assegnare esattamente 10 punti.");
            return;
        }
        currentStep += n;
        if (currentStep >= steps.length) {
            alert('Personaggio salvato con successo!');
            console.log(characterData);
            // Potresti inviare i dati a un file PHP qui
            return;
        }
        showStep(currentStep);
    }

    function updateStatPoints() {
        document.querySelectorAll('.stat-input').forEach(input => {
            input.addEventListener('input', () => {
                const pointsLeft = getRemainingPoints();
                document.getElementById('points-left').textContent = `Punti rimanenti: ${pointsLeft}`;
            });
        });
    }

    function getRemainingPoints() {
        const total = [...document.querySelectorAll('.stat-input')]
            .map(input => parseInt(input.value) || 0)
            .reduce((a, b) => a + b, 0);
        return 10 - total;
    }

    function generateSummary() {
        characterData.name = document.getElementById('pg-name').value;
        characterData.age = document.getElementById('pg-age').value;
        characterData.aspect = document.getElementById('pg-aspect').value;
        characterData.stats.str = parseInt(document.getElementById('stat-str').value);
        characterData.stats.dex = parseInt(document.getElementById('stat-dex').value);
        characterData.stats.int = parseInt(document.getElementById('stat-int').value);
        characterData.stats.cha = parseInt(document.getElementById('stat-cha').value);

        const summaryHTML = `
            <ul class="list-group">
                <li class="list-group-item"><strong>Nome:</strong> ${characterData.name}</li>
                <li class="list-group-item"><strong>Età:</strong> ${characterData.age}</li>
                <li class="list-group-item"><strong>Aspetto:</strong> ${characterData.aspect}</li>
                <li class="list-group-item"><strong>Specie:</strong> ${characterData.species}</li>
                <li class="list-group-item"><strong>Classe:</strong> ${characterData.role}</li>
                <li class="list-group-item"><strong>Percorso:</strong> ${characterData.path}</li>
                <li class="list-group-item"><strong>Statistiche:</strong> For: ${characterData.stats.str}, Des: ${characterData.stats.dex}, Int: ${characterData.stats.int}, Car: ${characterData.stats.cha}</li>
            </ul>
        `;
        document.getElementById('summary-container').innerHTML = summaryHTML;
    }

    function selectSpecies(name) {
        characterData.species = name;
        console.log("Specie selezionata:", name);
    }

    function selectRole(name) {
        characterData.role = name;
        console.log("Classe selezionata:", name);
    }

    function selectPath(name) {
        characterData.path = name;
        console.log("Percorso selezionato:", name);
    }

    async function loadSpecies() {
        const res = await fetch('api/get_species.php');
        const species = await res.json();
        const container = document.getElementById('species-container');
        species.forEach(s => {
            container.innerHTML += `
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">${s.nome_stirpe}</h5>
                            <p class="card-text text-muted">${s.descrizione}</p>
                            <button class="btn btn-outline-primary" onclick="selectSpecies('${s.nome_stirpe}')">Scegli</button>
                        </div>
                    </div>
                </div>`;
        });
    }

    async function loadClassPaths() {
        const res = await fetch('api/get_class_path.php');
        const paths = await res.json();
        const container = document.getElementById('path-container');
        paths.forEach(p => {
            container.innerHTML += `
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">${p.name}</h5>
                            <p>${p.description}</p>
                            <button class="btn btn-outline-success" onclick="selectPath('${p.name}')">Scegli Percorso</button>
                        </div>
                    </div>
                </div>`;
        });
    }

    document.addEventListener('DOMContentLoaded', () => {
        showStep(currentStep);
        loadSpecies();
        loadClassPaths();
    });
</script>
</body>
</html>
