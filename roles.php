<?php
include("include/config.php");

$sql = "SELECT * FROM roles";
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
    <!-- Custom CSS specific to Ancestries page -->
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

        /* Campo di ricerca */
        #search-input {
            font-family: 'Cinzel', serif;
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
                <div class="col-md-4 mb-4 isotope-item">
                    <div class="card h-100 rpg-card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['nome']; ?></h5>
                            <p><strong>Bonuses:</strong></p>
                            <ul>
                                <?php
                                // Recupera i bonus associati a questo ruolo
                                $role_id = $row['id_role'];
                                $sql_bonus = "SELECT * FROM roles_bonus WHERE fk_role = $role_id";
                                $result_bonus = $link->query($sql_bonus);
                                if ($result_bonus->num_rows > 0) {
                                    while($row_bonus = $result_bonus->fetch_assoc()) {
                                        echo "<li><strong>" . $row_bonus['nome'] . ":</strong> " . $row_bonus['descrizione'] . "</li>";
                                    }
                                } else {
                                    echo "<li>No bonuses available for this role.</li>";
                                }
                                ?>
                            </ul>
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
