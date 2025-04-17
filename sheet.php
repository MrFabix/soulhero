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

    <div class="step" id="step-2">
        <h4>Step 2: Seleziona la Specie</h4>
        <div id="species-container" class="row"></div>
    </div>

    <div class="step" id="step-3">
        <h4>Step 3: Seleziona il Ruolo</h4>
        <div id="roles-container" class="row"></div>
    </div>

    <div class="step" id="step-4">
        <h4>Step 4: Classe e Percorso</h4>
        <p class="text-muted">(Integrazione dati da classi e path)</p>
    </div>

    <div class="wizard-nav d-flex justify-content-between mt-4">
        <button class="btn btn-secondary" id="prevBtn" onclick="nextPrev(-1)">Indietro</button>
        <button class="btn btn-primary" id="nextBtn" onclick="nextPrev(1)">Avanti</button>
    </div>
</div>

<script>
    let currentStep = 0;
    const steps = document.querySelectorAll('.step');

    function showStep(n) {
        steps.forEach((step, index) => {
            step.classList.remove('active');
            if (index === n) step.classList.add('active');
        });
        document.getElementById('prevBtn').style.display = n === 0 ? 'none' : 'inline-block';
        document.getElementById('nextBtn').textContent = (n === steps.length - 1) ? 'Fine' : 'Avanti';
    }

    function nextPrev(n) {
        currentStep += n;
        if (currentStep >= steps.length) {
            alert('Salvataggio dati e redirect alla scheda personaggio...');
            return;
        }
        showStep(currentStep);
    }

    document.addEventListener('DOMContentLoaded', () => {
        showStep(currentStep);
        loadSpecies();
        loadRoles();
    });

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

    async function loadRoles() {
        const res = await fetch('api/get_roles.php');
        const roles = await res.json();
        const container = document.getElementById('roles-container');

        roles.forEach(r => {
            container.innerHTML += `
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title text-warning">${r.nome}</h5>
                            <p><strong>Stat Boost:</strong> ${r.stat1} or ${r.stat2}</p>
                            <p><strong>Misc:</strong> +${r.misc_boost} ${r.skill}</p>
                            <p><strong>${r.daily_name}:</strong> ${r.daily_desc}</p>
                            <button class="btn btn-outline-primary" onclick="selectRole('${r.nome}')">Scegli</button>
                        </div>
                    </div>
                </div>`;
        });
    }

    function selectSpecies(name) {
        console.log("Specie selezionata:", name);
    }

    function selectRole(name) {
        console.log("Ruolo selezionato:", name);
    }
</script>
</body>
</html>