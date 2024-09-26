<?php
include("include/config.php");

$sql = "SELECT * FROM class";
$result = $link->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classes - RPG Database</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Isotope JS -->
    <script src="https://cdn.jsdelivr.net/npm/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Uncial+Antiqua&display=swap" rel="stylesheet">
    <!-- Custom CSS specific to Class page -->
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

        /* Personalizzazione delle card */
        .rpg-card {
            background-color: rgba(0, 0, 0, 0.8);
            color: #f4f4f4;
            border: 2px solid #d4af37;
            border-radius: 10px;
            overflow: hidden;
            position: relative;
            padding: 1.5rem;
        }

        .rpg-card:hover {
            transform: scale(1.05);
            transition: 0.3s;
        }

        .rpg-card img {
            position: absolute;
            top: 0;
            right: 0;
            height: 100%;
            opacity: 0.1; /* Riduce la visibilità dell'immagine di sfondo */
        }

        .card-body {
            z-index: 2; /* Metti il contenuto della card sopra l'immagine */
        }

        .card-title {
            font-size: 1.5rem;
        }

        .card-text {
            font-size: 1rem;
        }

        /* Ottimizzazione per dispositivi mobili */
        @media (max-width: 767px) {
            .card-title {
                font-size: 1.2rem;
            }
            .card-text {
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<?php include("include/nav.php"); ?>

<body class="text-light">

<div class="container-sm mt-5 rpg-ancestries-page">
    <h1 class="text-center mb-4">Classes</h1>

    <!-- Campo di Ricerca -->
    <div class="row mb-4">
        <div class="col-12">
            <input type="text" id="search-input" class="form-control" placeholder="Search Class...">
        </div>
    </div>

    <!-- Contenitore per le Cards (Griglia Isotope) -->
    <div class="row isotope-grid" id="ancestries-grid">
        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <div class="isotope-item col-12 col-md-6 col-lg-4">
                    <div class="card h-100 rpg-card mb-3">
                        <!-- Inserisci l'immagine di sfondo sulla destra -->
                        <img src="img/classes/<?php echo strtolower($row['name']); ?>.jpg" alt="<?php echo $row['name']; ?>" class="img-fluid">

                        <!-- Corpo della card -->
                        <div class="card-body">
                            <!-- Nome e HP con allineamento e colore -->
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title"><?php echo $row['name']; ?></h5>
                                <span class="text-danger">HP: <?php echo $row['hp']; ?></span>
                            </div>
                            <p class="card-text"><?php echo $row['description']; ?></p>
                            <!-- Aggiungi un link al dettaglio della classe -->
                            <a href="class_details.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-light">Scopri di più</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="text-center">No classes found.</p>
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
