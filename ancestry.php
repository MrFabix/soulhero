<?php
include("include/config.php");

$sql = "SELECT * FROM Ancestries";
$result = $link->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ancestries - RPG Database</title>

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
    <h1 class="text-center mb-4">Ancestries</h1>

    <!-- Campo di Ricerca -->
    <div class="row mb-4">
        <div class="col-12">
            <input type="text" id="search-input" class="form-control" placeholder="Search Ancestries...">
        </div>
    </div>

    <!-- Contenitore per le Cards (Griglia Isotope) -->
    <div class="row isotope-grid" id="ancestries-grid">
        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <div class="col-md-4 mb-4 isotope-item">
                    <div class="card h-100 rpg-card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['nome_stirpe']; ?></h5>
                            <p class="card-text"><?php echo $row['descrizione']; ?></p>
                            <p><strong>Bonus Stats:</strong>
                                <?php
                                $bonus_stats = json_decode($row['bonus_stat'], true);
                                foreach ($bonus_stats as $stat => $value) {
                                    echo ucfirst($stat) . ": " . $value . " ";
                                }
                                ?>
                            </p>
                            <p><strong>Penalties:</strong>
                                <?php
                                if ($row['penalità_stat']) {
                                    $penalty_stats = json_decode($row['penalità_stat'], true);
                                    foreach ($penalty_stats as $stat => $value) {
                                        echo ucfirst($stat) . ": " . $value . " ";
                                    }
                                } else {
                                    echo 'None';
                                }
                                ?>
                            </p>
                            <p><strong>Abilities:</strong>
                                <?php
                                $abilities = json_decode($row['abilità_speciali'], true);
                                echo implode(", ", $abilities);
                                ?>
                            </p>
                            <p><strong>Speed:</strong> <?php echo $row['velocità']; ?></p>
                            <p><strong>Base Language:</strong> <?php echo $row['lingua_base']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="text-center">No ancestries found.</p>
        <?php endif; ?>
    </div>
</div>

<?php include("include/footer.php"); ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Isotope JS -->
<script>
    // Inizializza Isotope
    var elem = document.querySelector('.isotope-grid');
    var iso = new Isotope( elem, {
        itemSelector: '.isotope-item',
        layoutMode: 'fitRows'
    });

    // Filtro basato sull'input di ricerca
    var searchInput = document.querySelector('#search-input');
    searchInput.addEventListener('keyup', function() {
        var filterValue = searchInput.value.toLowerCase();
        iso.arrange({
            filter: function(itemElem) {
                var nomeStirpe = itemElem.querySelector('.card-title').textContent.toLowerCase();
                var descrizione = itemElem.querySelector('.card-text').textContent.toLowerCase();
                // Filtra in base al nome della stirpe e alla descrizione
                return nomeStirpe.includes(filterValue) || descrizione.includes(filterValue);
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
