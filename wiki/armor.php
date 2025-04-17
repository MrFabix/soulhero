<?php
include '../include/config.php';
$sql = "SELECT
    armor.item_bonus,
    armor.id,
    armor.name,
    armor.price,
    armor.bulk,
    armor_type.nome AS armor_type,
    GROUP_CONCAT(DISTINCT 
        IF(armor_armor_traits.value IS NOT NULL, 
           CONCAT(armor_traits.nome, ' (', armor_armor_traits.value, ')'), 
           armor_traits.nome) 
        SEPARATOR ', ') AS armor_traits,
    GROUP_CONCAT(DISTINCT armor_traits.descrizione SEPARATOR ', ') AS traits_description
FROM armor
JOIN armor_type ON armor.fk_armor_type = armor_type.id
LEFT JOIN armor_armor_traits ON armor.id = armor_armor_traits.fk_armor
LEFT JOIN armor_traits ON armor_armor_traits.fk_armor_traits = armor_traits.id
GROUP BY armor.id;";
$result = $link->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wiki - Armor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link href="../layouts/modern-dark-menu/css/light/loader.css" rel="stylesheet">
    <link href="../layouts/modern-dark-menu/css/dark/loader.css" rel="stylesheet">
    <link href="../layouts/modern-dark-menu/css/light/plugins.css" rel="stylesheet">
    <link href="../layouts/modern-dark-menu/css/dark/plugins.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../src/assets/img/favicon.ico" />
    <script src="../layouts/modern-dark-menu/loader.js"></script>
    <style>
        body { background-color: #f8f9fa; }
        .armor-card {
            border-radius: 1rem;
            transition: 0.3s;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        }
        .armor-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 25px rgba(0,0,0,0.1);
        }
        .card-img-top {
            height: 180px;
            object-fit: cover;
        }
    </style>
</head>
<body class="layout-boxed">
<div id="load_screen">
    <div class="loader">
        <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div>
    </div>
</div>

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
                            <li class="breadcrumb-item"><a href="#">Armor</a></li>
                        </ol>
                    </nav>
                </div>

                <div class="mb-4">
                    <input id="searchInput" type="text" class="form-control form-control-lg" placeholder="Search for an armor...">
                </div>

                <div class="row g-4" id="armorGrid">
                    <?php
                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $traits = explode(", ", $row['armor_traits'] ?? '');
                            $descriptions = explode(", ", $row['traits_description'] ?? '');
                            ?>
                            <div class="col-xl-3 col-lg-4 col-md-6 armor-item" data-aos="fade-up">
                                <div class="card armor-card h-100">
                                    <img src="../src/assets/img/masonry-blog-style-4.jpeg" class="card-img-top" alt="Armor Image">
                                    <div class="card-body">
                                        <h5 class="card-title text-primary fw-bold"><?php echo $row['name']; ?></h5>
                                        <p class="mb-2"><strong class="text-info">Type:</strong> <?php echo $row['armor_type']; ?></p>
                                        <p class="mb-2"><strong class="text-success">Item Bonus:</strong> <?php echo $row['item_bonus']; ?> | <strong>Bulk:</strong> <?php echo $row['bulk']; ?></p>
                                        <p class="mb-2"><strong>Price:</strong> <?php echo $row['price']; ?></p>
                                        <p><strong class="text-warning">Traits:</strong><br>
                                            <?php
                                            foreach ($traits as $i => $trait) {
                                                $desc = $descriptions[$i] ?? 'No description';
                                                echo '<span class="badge bg-secondary me-1 mb-1" data-bs-toggle="tooltip" title="' . htmlspecialchars($desc) . '">' . htmlspecialchars($trait) . '</span>';
                                            }
                                            ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php }} else {
                        echo '<div class="col-12"><p class="text-muted">No armor found.</p></div>';
                    } ?>
                </div>
            </div>
        </div>
        <?php include '../include/footer.php'; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="../src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../src/plugins/src/mousetrap/mousetrap.min.js"></script>
<script src="../src/plugins/src/waves/waves.min.js"></script>
<script src="../layouts/modern-dark-menu/app.js"></script>
<script>
    AOS.init();
    const input = document.getElementById('searchInput');
    input.addEventListener('input', function () {
        const value = this.value.toLowerCase();
        document.querySelectorAll('.armor-item').forEach(card => {
            const name = card.querySelector('.card-title').textContent.toLowerCase();
            card.style.display = name.includes(value) ? 'block' : 'none';
        });
    });
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
</script>
</body>
</html>