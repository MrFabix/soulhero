<?php
include '../include/config.php';

// Recupera le magie dal DB ordinate per livello e nome
$sql = "SELECT * FROM magic ORDER BY level, name";
$result = $link->query($sql);

$magic_by_level = [];
while ($row = $result->fetch_assoc()) {
    $magic_by_level[$row['level']][] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magic Spells - Wiki</title>
    <link rel="icon" href="../src/assets/img/favicon.ico" type="image/x-icon" />
    <link href="../src/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../layouts/modern-dark-menu/css/light/plugins.css" rel="stylesheet">
    <link href="../layouts/modern-dark-menu/css/dark/plugins.css" rel="stylesheet">
    <script src="../layouts/modern-dark-menu/loader.js"></script>
    <style>
        .card {
            border-radius: 1rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            transition: transform 0.2s ease;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .level-nav .nav-link.active {
            background-color: #e2a03f;
            color: white;
        }
        .isotope-search {
            max-width: 300px;
            margin-bottom: 20px;
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

                <div class="page-meta">
                    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Magic</a></li>
                        </ol>
                    </nav>
                </div>

                <input type="text" class="form-control isotope-search" id="magicSearch" placeholder="Search spells...">

                <!-- Navigazione tra livelli -->
                <ul class="nav nav-pills mb-3 level-nav" id="pills-tab" role="tablist">
                    <?php $i = 0; foreach ($magic_by_level as $level => $spells): ?>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link <?= $i === 0 ? 'active' : '' ?>" id="pills-level<?= $level ?>-tab" data-bs-toggle="pill" data-bs-target="#pills-level<?= $level ?>" type="button" role="tab">
                                Level <?= $level ?>
                            </button>
                        </li>
                        <?php $i++; endforeach; ?>
                </ul>

                <!-- Contenuto delle tab dei livelli -->
                <div class="tab-content" id="pills-tabContent">
                    <?php $i = 0; foreach ($magic_by_level as $level => $spells): ?>
                        <div class="tab-pane fade <?= $i === 0 ? 'show active' : '' ?>" id="pills-level<?= $level ?>" role="tabpanel">
                            <div class="row g-4 isotope-container">
                                <?php foreach ($spells as $spell): ?>
                                    <div class="col-xl-3 col-lg-4 col-md-6 mb-4 spell-card" data-name="<?= strtolower(($spell['name'])) ?>">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <h5 class="card-title text-primary fw-bold mb-2"><?= ($spell['name']) ?></h5>
                                                <p class="card-text text-muted">Level <?= $spell['level'] ?></p>
                                                <p><?= nl2br(($spell['description'] ?? '')) ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php $i++; endforeach; ?>
                </div>


                </div>
        </div>
        <?php include '../include/footer.php'; ?>
    </div>
</div>

<script src="../src/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../layouts/modern-dark-menu/app.js"></script>
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
<script>
    // Inizializza Isotope per ogni tab
    document.querySelectorAll('[data-bs-toggle="pill"]').forEach(btn => {
        btn.addEventListener('shown.bs.tab', () => {
            setTimeout(() => {
                document.querySelectorAll('.tab-pane.show.active').forEach(pane => {
                    if (pane.isotopeInstance) {
                        pane.isotopeInstance.layout();
                    }
                });
            }, 100);
        });
    });


    document.getElementById('magicSearch').addEventListener('input', function () {
        const value = this.value.toLowerCase();

        document.querySelectorAll('.tab-pane.show.active').forEach(activePane => {
            const iso = activePane.isotopeInstance;
            iso.arrange({
                filter: itemElem => {
                    const name = itemElem.getAttribute('data-name');
                    return name.includes(value);
                }
            });


        });
    });

</script>
</body>
</html>
