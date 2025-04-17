<?php
include '../include/config.php';

$id_class = $_GET['id'] ?? 0;
if ($id_class) {
    $sql = "SELECT * FROM class WHERE id = $id_class";
    $result = $link->query($sql);
    $row = $result->fetch_assoc();
    $name_class = $row['name'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $name_class ?? 'Class'; ?> - Wiki</title>
    <link rel="icon" href="../src/assets/img/favicon.ico" type="image/x-icon" />
    <link href="../src/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../layouts/modern-dark-menu/css/light/plugins.css" rel="stylesheet">
    <link href="../layouts/modern-dark-menu/css/dark/plugins.css" rel="stylesheet">
    <script src="../layouts/modern-dark-menu/loader.js"></script>
    <style>
        body {
            background: #f4f6f9;
            font-family: 'Segoe UI', sans-serif;
        }
        .class-header {
            border-radius: 1rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            padding: 2rem;
            background: #fff;
            margin-bottom: 2rem;
        }
        .level-section {
            border-radius: .75rem;
            background: #fff;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 2px 12px rgba(0,0,0,0.03);
        }
        .level-dot {
            width: 16px;
            height: 16px;
            background-color: #ccc;
            border-radius: 50%;
            margin-bottom: 10px;
            cursor: pointer;
        }
        .level-dot.active {
            background-color: #e2a03f;
        }
        .nav-link.active {
            background-color: #e2a03f;
            color: #fff;
        }
    </style>
</head>
<body class="layout-boxed">
<div id="load_screen"><div class="loader"><div class="loader-content">
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

                <div class="page-meta">
                    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/wiki/classes.php">Classes</a></li>
                            <li class="breadcrumb-item"><a href="#"><?php echo $name_class ?? ''; ?></a></li>
                        </ol>
                    </nav>
                </div>

                <div class="class-header">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h2><?php echo $name_class ?? ''; ?></h2>
                        <span class="badge bg-warning text-dark fs-5">HP: <?php echo $row['hp'] ?? ''; ?></span>
                    </div>
                    <div class="text-center">
                        <img src="../src/assets/img/profile-3.jpeg" class="img-fluid rounded-circle" alt="avatar" style="width: 120px;">
                    </div>
                    <p class="mt-3"> <?php echo $row['description'] ?? ''; ?> </p>
                </div>

                <div id="levels">
                    <?php
                    for ($lvl = 1; $lvl <= 10; $lvl++) {
                        $sql = "SELECT * FROM class_features WHERE fk_class = $id_class AND level = $lvl";
                        $features_result = $link->query($sql);

                        echo "<div id='level-$lvl' class='level-section'>
                            <h4 class='text-warning'>Level $lvl</h4>";

                        if ($features_result && $features_result->num_rows > 0) {
                            while ($feature = $features_result->fetch_assoc()) {
                                echo "<h5 class='text-primary'>" . htmlspecialchars($feature['name']) . "</h5>
                                      <p>" . nl2br(htmlspecialchars($feature['description'])) . "</p><hr>";
                            }
                        } else {
                            echo "<p class='text-muted'>Nessuna feature trovata per questo livello.</p>";
                        }

                        echo "</div>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php include '../include/footer.php'; ?>
    </div>
</div>

<div class="level-navigation position-fixed top-50 end-0 translate-middle-y">
    <?php for ($i = 1; $i <= 10; $i++): ?>
        <span class="level-dot" id="level-dot-<?php echo $i; ?>" onclick="scrollToLevel(<?php echo $i; ?>)"></span>
    <?php endfor; ?>
</div>

<script src="../src/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../src/plugins/src/mousetrap/mousetrap.min.js"></script>
<script src="../src/plugins/src/waves/waves.min.js"></script>
<script src="../layouts/modern-dark-menu/app.js"></script>
<script>
    function scrollToLevel(level) {
        document.querySelectorAll('.level-dot').forEach(dot => dot.classList.remove('active'));
        document.getElementById('level-dot-' + level).classList.add('active');
        document.getElementById('level-' + level).scrollIntoView({behavior: 'smooth'});
    }

    window.addEventListener('scroll', () => {
        let current = 1;
        for (let i = 1; i <= 10; i++) {
            const section = document.getElementById('level-' + i);
            if (section.getBoundingClientRect().top <= window.innerHeight / 2) {
                current = i;
            }
        }
        document.querySelectorAll('.level-dot').forEach(dot => dot.classList.remove('active'));
        document.getElementById('level-dot-' + current).classList.add('active');
    });
</script>
</body>
</html>
