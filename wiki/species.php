<?php
include '../include/config.php';
$sql = "SELECT ancestries.*, skill.name as name_skill FROM ancestries JOIN skill on ancestries.fk_skill = skill.id";
$result = $link->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wiki - Species</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link href="../layouts/modern-dark-menu/css/light/loader.css" rel="stylesheet">
    <link href="../layouts/modern-dark-menu/css/dark/loader.css" rel="stylesheet">
    <link href="../layouts/modern-dark-menu/css/light/plugins.css" rel="stylesheet">
    <link href="../layouts/modern-dark-menu/css/dark/plugins.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../src/assets/img/favicon.ico" />
    <script src="../layouts/modern-dark-menu/loader.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .ancestry-card {
            border-radius: 1rem;
            transition: 0.3s;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        }
        .ancestry-card:hover {
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
<!-- BEGIN LOADER -->
<div id="load_screen">
    <div class="loader">
        <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div>
    </div>
</div>
<!-- END LOADER -->

<?php include '../include/navbar.php'; ?>
<div class="main-container" id="container">
    <div class="overlay"></div>
    <div class="search-overlay"></div>
    <?php include '../include/sidebar.php'; ?>

    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="middle-content container-xxl p-0">

                <!-- BREADCRUMB -->
                <div class="page-meta mb-4">
                    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Species</a></li>
                        </ol>
                    </nav>
                </div>

                <div class="mb-4">
                    <input id="searchInput" type="text" class="form-control form-control-lg" placeholder="Search for a species...">
                </div>

                <div class="row g-4" id="ancestriesGrid">
                    <?php
                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <div class="col-xl-3 col-lg-4 col-md-6 ancestry-item" data-aos="fade-up">
                                <div class="card ancestry-card h-100">
                                    <img src="../src/assets/img/masonry-blog-style-4.jpeg" class="card-img-top" alt="Ancestry Image">
                                    <div class="card-body">
                                        <h5 class="card-title text-primary fw-bold"><?php echo $row['nome_stirpe']; ?></h5>
                                        <p class="card-text text-muted mb-2"><?php echo $row['descrizione']; ?></p>
                                        <div class="d-flex justify-content-between">
                                            <small class="text-info">Speed: <?php echo $row['velocità']; ?></small>
                                            <small class="text-success">Skill: <?php echo $row['name_skill']; ?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo '<div class="col-12"><p class="text-muted">No ancestries found.</p></div>';
                    }
                    ?>
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

    document.getElementById('searchInput').addEventListener('input', function () {
        const value = this.value.toLowerCase();
        document.querySelectorAll('.ancestry-item').forEach(card => {
            const name = card.querySelector('.card-title').textContent.toLowerCase();
            card.style.display = name.includes(value) ? 'block' : 'none';
        });
    });
</script>
</body>
</html>