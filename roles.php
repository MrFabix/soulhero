<?php
include("include/config.php");

$sql = "SELECT roles.id_role, roles.nome, roles.name_role_daily, roles.description_role_daily, statistics.name AS statistic_name, roles.boost_statistic, skill.name AS skill_name, roles.boost_skill
 FROM roles 
 JOIN statistics ON roles.fk_statistic = statistics.id 
 JOIN skill ON roles.fk_skill = skill.id";
$result = $link->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roles - RPG Database</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Isotope JS -->
    <script src="https://cdn.jsdelivr.net/npm/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Uncial+Antiqua&display=swap" rel="stylesheet">
    <!-- Custom CSS specific to Roles page -->
    <link href="style/rpg_style_card.css" rel="stylesheet">
    <style>
        /* Imposta il font globale della pagina */
        body {
            font-family: 'Cinzel', serif;
            color: #f4f4f4;
        }

        /* Stile per il titolo */
        h1, h2, h3, h4, h5 {
            font-family: 'Uncial Antiqua', serif;
            color: #f7d794;
        }

        /* Stile per le card dei ruoli */
        .rpg-card {
            background-color: rgba(255, 255, 255, 0.1);
            border: 2px solid #d4af37;
            color: #f4f4f4;
            border-radius: 10px;
            transition: transform 0.3s ease;
        }

        .rpg-card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.8);
        }

        /* Campo di ricerca */
        #search-input {
            font-family: 'Cinzel', serif;
        }

        /* Bordi dorati per i titoli di sezione */
        strong {
            color: #d4af37;
        }

    </style>
</head>

<?php include("include/nav.php"); ?>

<body>

<div class="container mt-5 rpg-ancestries-page">
    <h1 class="text-center mb-4">Roles</h1>

    <!-- Campo di Ricerca -->
    <div class="row mb-4">
        <div class="col-12">
            <input type="text" id="search-input" class="form-control" placeholder="Search Roles...">
        </div>
    </div>

    <!-- Contenitore per le Cards (Griglia Isotope) -->
    <div class="row isotope-grid" id="roles-grid">
        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <div class="col-3 mb-3  isotope-item">
                    <div class="card h-100 rpg-card">
                        <div class="card-body">
                            <!-- Nome del ruolo -->
                            <h5 class="card-title"><?php echo $row['nome']; ?></h5>

                            <!-- Statistiche del ruolo -->
                            <p><strong>Statistic Bonus:</strong> <?php echo $row['statistic_name']; ?> +<?php echo $row['boost_statistic']; ?></p>

                            <!-- Abilità del ruolo -->
                            <p><strong>Skill Bonus:</strong> <?php echo $row['skill_name']; ?> +<?php echo $row['boost_skill']; ?></p>

                            <!-- Nome dell'abilità giornaliera -->
                            <p><strong>Daily Ability:</strong> <?php echo $row['name_role_daily']; ?></p>

                            <!-- Descrizione dell'abilità giornaliera -->
                            <p><?php echo $row['description_role_daily']; ?></p>
                            <a href="role_details.php?id=<?php echo $row['id_role']; ?>" class="btn btn-outline-light disabled">Scopri di più</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="text-center">No roles found.</p>
        <?php endif; ?>
    </div>
</div>

<?php include("include/footer.php"); ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Isotope JS -->
<script>
    // Inizializza Isotope dopo il caricamento della pagina
    var elem = document.querySelector('.isotope-grid');
    var iso = new Isotope(elem, {
        itemSelector: '.isotope-item',
        layoutMode: 'fitRows'
    });

    // Filtro basato sull'input di ricerca
    var searchInput = document.querySelector('#search-input');
    searchInput.addEventListener('keyup', function() {
        var filterValue = searchInput.value.toLowerCase();
        iso.arrange({
            filter: function(itemElem) {
                var nomeRole = itemElem.querySelector('.card-title').textContent.toLowerCase();
                // Filtra in base al nome del ruolo
                return nomeRole.includes(filterValue);
            }
        });
    });
</script>

</body>
</html>

<?php
// Chiudi la connessione al database
$link->close();
?>
