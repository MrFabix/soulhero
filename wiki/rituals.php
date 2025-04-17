<?php
include '../include/config.php';
$sql = "SELECT * FROM rituals";
$result = $link->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rituals - Wiki</title>
    <link href="../src/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../layouts/modern-dark-menu/css/light/loader.css" rel="stylesheet">
    <link href="../layouts/modern-dark-menu/css/dark/loader.css" rel="stylesheet">
    <link href="../layouts/modern-dark-menu/css/light/plugins.css" rel="stylesheet">
    <link href="../layouts/modern-dark-menu/css/dark/plugins.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="../layouts/modern-dark-menu/loader.js"></script>
    <style>
        body {
            background: #f4f6f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .ritual-card {
            border-radius: 1rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            transition: transform 0.2s;
        }
        .ritual-card:hover {
            transform: translateY(-4px);
        }
        .ritual-header {
            background: #212529;
            color: #f8d44c;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
            padding: 1rem;
        }
        .ritual-footer {
            background: #f8f9fa;
            border-bottom-left-radius: 1rem;
            border-bottom-right-radius: 1rem;
            padding: 0.75rem 1rem;
            font-size: 0.875rem;
        }
        .text-label {
            color: #6c757d;
            font-weight: 500;
        }
    </style>
</head>
<body class="layout-boxed">
<div id="load_screen"> <div class="loader"> <div class="loader-content">
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

                <div class="page-meta mb-4">
                    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Rituals</a></li>
                        </ol>
                    </nav>
                </div>

                <div class="mb-4">
                    <input type="text" id="searchInput" class="form-control form-control-lg" placeholder="Cerca rituale...">
                </div>

                <div class="row g-4" id="ritualsGrid">
                    <?php
                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $description = htmlspecialchars($row['description']);
                            $description_short = strlen($description) > 120 ? substr($description, 0, 120) . '...' : $description;
                            ?>
                            <div class="col-xl-4 col-lg-6 ritual-item">
                                <div class="ritual-card bg-white">
                                    <div class="ritual-header d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0">🔮 <?= $row['name'] ?></h5>
                                        <small><?= $row['ritualist'] ?></small>
                                    </div>
                                    <div class="p-3">
                                        <p><span class="text-label">🕒 Time:</span> <?= $row['time_cast'] ?></p>
                                        <p><span class="text-label">🧪 Components:</span> <?= $row['components'] ?></p>
                                        <p><span class="text-label">🎯 Difficulty:</span> <?= $row['difficulty'] ?></p>
                                        <p><span class="text-label">💠 Mana:</span> <?= $row['mana'] ?></p>
                                        <p><span class="text-label">📖 Description:</span> <span class="short-desc"><?= $description_short ?></span> <span class="full-desc d-none"><?= $description ?></span>
                                            <button class="btn btn-sm btn-link toggle-desc">More</button>
                                        </p>
                                    </div>
                                    <div class="ritual-footer">
                                        <?php if ($row['success']) { ?><p><span class="text-success">✅ Success:</span> <?= $row['success'] ?></p><?php } ?>
                                        <?php if ($row['failure']) { ?><p><span class="text-danger">❌ Failure:</span> <?= $row['failure'] ?></p><?php } ?>
                                        <?php if ($row['critical_success']) { ?><p><span class="text-success">🌟 Critical Success:</span> <?= $row['critical_success'] ?></p><?php } ?>
                                        <?php if ($row['critical_failure']) { ?><p><span class="text-danger">💥 Critical Failure:</span> <?= $row['critical_failure'] ?></p><?php } ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo '<div class="col-12"><p class="text-muted">Nessun rituale trovato.</p></div>';
                    }
                    ?>
                </div>

            </div>
        </div>
        <?php include '../include/footer.php'; ?>
    </div>
</div>

<script src="../src/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../src/plugins/src/mousetrap/mousetrap.min.js"></script>
<script src="../src/plugins/src/waves/waves.min.js"></script>
<script src="../layouts/modern-dark-menu/app.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const search = document.getElementById('searchInput');
        const items = document.querySelectorAll('.ritual-item');

        search.addEventListener('input', () => {
            const value = search.value.toLowerCase();
            items.forEach(card => {
                const title = card.querySelector('h5').textContent.toLowerCase();
                card.style.display = title.includes(value) ? '' : 'none';
            });
        });

        document.querySelectorAll('.toggle-desc').forEach(btn => {
            btn.addEventListener('click', function () {
                const short = this.previousElementSibling.previousElementSibling;
                const full = this.previousElementSibling;
                if (full.classList.contains('d-none')) {
                    short.classList.add('d-none');
                    full.classList.remove('d-none');
                    this.textContent = 'Less';
                } else {
                    short.classList.remove('d-none');
                    full.classList.add('d-none');
                    this.textContent = 'More';
                }
            });
        });
    });
</script>
</body>
</html>