<?php
include '../include/config.php';
$sql = "SELECT roles.id_role, roles.nome, s1.name AS statistic_name1, s2.name AS statistic_name2, roles.misc_boost, skill.name AS skill_name, roles.name_role_daily, roles.description_role_daily FROM roles LEFT JOIN statistics s1 ON roles.fk_statistic = s1.id LEFT JOIN statistics s2 ON roles.fk_statistic_2 = s2.id JOIN skill ON roles.fk_skill = skill.id";
$result = $link->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roles - Wiki</title>
    <link rel="icon" href="../src/assets/img/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link href="../layouts/modern-dark-menu/css/light/plugins.css" rel="stylesheet">
    <link href="../layouts/modern-dark-menu/css/dark/plugins.css" rel="stylesheet">
    <link href="../layouts/modern-dark-menu/css/light/loader.css" rel="stylesheet">
    <link href="../layouts/modern-dark-menu/css/dark/loader.css" rel="stylesheet">

    <script src="../layouts/modern-dark-menu/loader.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .role-card {
            border-radius: 1rem;
            transition: 0.3s;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        }
        .role-card:hover {
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
                            <li class="breadcrumb-item"><a href="#">Roles</a></li>
                        </ol>
                    </nav>
                </div>

                <div class="mb-4">
                    <input id="searchInput" type="text" class="form-control form-control-lg" placeholder="Search for a role...">
                </div>

                <div class="row g-4" id="rolesGrid">
                    <?php
                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $stat1 = ucfirst(strtolower($row['statistic_name1']));
                            $stat2 = ucfirst(strtolower($row['statistic_name2']));
                            ?>
                            <div class="col-xl-3 col-lg-4 col-md-6 role-item" data-aos="fade-up">
                                <div class="card role-card h-100">
                                    <img src="../src/assets/img/role-default.jpeg" class="card-img-top" alt="Role Image">
                                    <div class="card-body">
                                        <h5 class="card-title text-primary fw-bold"><?php echo $row['nome']; ?></h5>
                                        <p class="mb-2"><strong class="text-info">Stat Boost:</strong> <?php echo "$stat1 or $stat2"; ?></p>
                                        <p class="mb-2"><strong class="text-success">Misc Boost:</strong> +<?php echo $row['misc_boost'] . ' ' . $row['skill_name']; ?></p>
                                        <p><strong class="text-warning"><?php echo $row['name_role_daily']; ?>:</strong> <?php echo $row['description_role_daily']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo '<div class="col-12"><p class="text-muted">No roles found.</p></div>';
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
<script src="../src/plugins/src/global/vendors.min.js"></script>
<script src="../src/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../src/plugins/src/mousetrap/mousetrap.min.js"></script>
<script src="../src/plugins/src/waves/waves.min.js"></script>
<script src="../layouts/modern-dark-menu/app.js"></script>
<script src="../src/assets/js/custom.js"></script>
<script>
    AOS.init();
    document.getElementById('searchInput').addEventListener('input', function () {
        const value = this.value.toLowerCase();
        document.querySelectorAll('.role-item').forEach(card => {
            const name = card.querySelector('.card-title').textContent.toLowerCase();
            card.style.display = name.includes(value) ? 'block' : 'none';
        });
    });
</script>
</body>
</html>
