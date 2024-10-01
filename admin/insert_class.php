<?php
// Includi il file di configurazione
include("../include/config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recupera i dati dal form
    $class_name = $_POST['class_name'];
    $class_description = $_POST['class_description'];
    $class_hp = $_POST['class_hp'];
    $n_skills_boost = $_POST['n_skills_boost'];
    $n_combat_boost = $_POST['n_combat_boost'];

    $sql = "INSERT INTO class (name, description, hp, n_skills_boost, n_combat_boost) 
        VALUES ('$class_name', '$class_description', '$class_hp', '$n_skills_boost', '$n_combat_boost')";
    $result = $link->query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wizard Form - Insert Class</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .step {display: none;} /* Nasconde tutti gli step inizialmente */
        .step.active {display: block;} /* Mostra solo lo step attivo */
    </style>
</head>
<body>
<?php include("../include/nav.php"); ?>

<div class="container mt-5">
    <form id="wizardForm" method="POST" action="">
        <!-- Step 1: Class Information -->
        <div class="step active">
            <h3>Step 1: Class Information</h3>
            <div class="mb-3">
                <label for="class_name" class="form-label">Class Name</label>
                <input type="text" class="form-control" id="class_name" name="class_name" required>
            </div>
            <div class="mb-3">
                <label for="class_description" class="form-label">Class Description</label>
                <textarea class="form-control" id="class_description" name="class_description" rows="3" required></textarea>
            </div>
            <button type="button" class="btn btn-primary" onclick="nextStep()">Next</button>
        </div>

        <!-- Step 2: Class Attributes -->
        <div class="step">
            <h3>Step 2: Class Attributes</h3>
            <div class="mb-3">
                <label for="class_hp" class="form-label">Hit Points (HP)</label>
                <input type="number" class="form-control" id="class_hp" name="class_hp" required>
            </div>
            <div class="mb-3">
                <label for="n_skills_boost" class="form-label">Number of Skill Boosts</label>
                <input type="number" class="form-control" id="n_skills_boost" name="n_skills_boost" required>
            </div>
            <div class="mb-3">
                <label for="n_combat_boost" class="form-label">Number of Combat Boosts</label>
                <input type="number" class="form-control" id="n_combat_boost" name="n_combat_boost" required>
            </div>
            <button type="button" class="btn btn-secondary" onclick="prevStep()">Previous</button>
            <button type="button" class="btn btn-primary" onclick="nextStep()">Next</button>
        </div>

        <!-- (Main Class Feature) -->
        <div class="step">
            <h3>Step 3: Main Class Feature</h3>
            <div class="mb-3">
                <label for="main_class_feature" class="form-label">Main Class Feature</label>
                <textarea class="form-control" id="main_class_feature" name="main_class_feature" rows="3" required></textarea>
            </div>
            <button type="button" class="btn btn-secondary" onclick="prevStep()">Previous</button>
            <button type="button" class="btn btn-primary" onclick="nextStep()">Next</button>
        </div>







        <!-- Step 3: Review & Submit -->
        <div class="step">
            <h3>Step 3: Review and Submit</h3>
            <div class="mb-3">
                <p><strong>Class Name:</strong> <span id="review_class_name"></span></p>
                <p><strong>Class Description:</strong> <span id="review_class_description"></span></p>
                <p><strong>Hit Points (HP):</strong> <span id="review_class_hp"></span></p>
                <p><strong>Skill Boosts:</strong> <span id="review_n_skills_boost"></span></p>
                <p><strong>Combat Boosts:</strong> <span id="review_n_combat_boost"></span></p>
            </div>
            <button type="button" class="btn btn-secondary" onclick="prevStep()">Previous</button>
            <button type="submit" class="btn btn-success">Submit</button>
        </div>




    </form>
</div>

<!-- Bootstrap and JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    let currentStep = 0;
    const steps = document.querySelectorAll('.step');

    function showStep(step) {
        steps.forEach((s, index) => {
            s.classList.remove('active');
            if (index === step) {
                s.classList.add('active');
            }
        });
    }

    function nextStep() {
        if (currentStep < steps.length - 1) {
            currentStep++;
            showStep(currentStep);
        }

        // Se si è all'ultimo step, aggiorna la recensione
        if (currentStep === steps.length - 1) {
            document.getElementById('review_class_name').innerText = document.getElementById('class_name').value;
            document.getElementById('review_class_description').innerText = document.getElementById('class_description').value;
            document.getElementById('review_class_hp').innerText = document.getElementById('class_hp').value;
            document.getElementById('review_n_skills_boost').innerText = document.getElementById('n_skills_boost').value;
            document.getElementById('review_n_combat_boost').innerText = document.getElementById('n_combat_boost').value;
        }
    }

    function prevStep() {
        if (currentStep > 0) {
            currentStep--;
            showStep(currentStep);
        }
    }
</script>

</body>
</html>
