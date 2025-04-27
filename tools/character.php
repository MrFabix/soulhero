<?php
include '../include/config.php';
include  '../include/auth.php';
$user_id = intval($_SESSION['user_id']);
$sql = "SELECT c.id, c.name AS character_name, c.level, class.name AS class_name, species.name AS species_name
        FROM characters c
        LEFT JOIN class ON c.fk_class = class.id
        LEFT JOIN species ON c.fk_species = species.id
        WHERE c.fk_user = $user_id
        ORDER BY c.name ASC";

$result = $link->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Characters - Wiki</title>
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
                            <li class="breadcrumb-item"><a href="#">My Characters</a></li>
                        </ol>
                    </nav>
                </div>

                <div class="mb-4 d-flex justify-content-between align-items-center">
                    <h3 class="text-primary">Your Characters</h3>
                    <a href="/character/create.php" class="btn btn-success">+ Create New Character</a>
                </div>

                <div class="row g-4">
                    <?php if ($result->num_rows > 0): while ($row = $result->fetch_assoc()): ?>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title text-primary fw-bold mb-2"><?= htmlspecialchars($row['character_name']) ?></h5>
                                    <p class="mb-1 text-muted"><strong>Class:</strong> <?= htmlspecialchars($row['class_name']) ?></p>
                                    <p class="mb-1 text-muted"><strong>Species:</strong> <?= htmlspecialchars($row['species_name']) ?></p>
                                    <p class="mb-1 text-muted"><strong>Level:</strong> <?= htmlspecialchars($row['level']) ?></p>
                                    <a href="/character/view.php?id=<?= $row['id'] ?>" class="btn btn-outline-info btn-sm mt-2">View</a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; else: ?>
                        <div class="col-12">
                            <p class="text-muted">You have not created any characters yet.</p>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
        <?php include '../include/footer.php'; ?>
    </div>
</div>

<script src="../src/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../layouts/modern-dark-menu/app.js"></script>
</body>
</html>
