<?php
include '../include/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wiki - Class Browser</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="../layouts/modern-dark-menu/css/light/loader.css" rel="stylesheet">
    <link href="../layouts/modern-dark-menu/css/dark/loader.css" rel="stylesheet">
    <link href="../layouts/modern-dark-menu/css/light/plugins.css" rel="stylesheet">
    <link href="../layouts/modern-dark-menu/css/dark/plugins.css" rel="stylesheet">
    <script src="../layouts/modern-dark-menu/loader.js"></script>
    <style>
        body {
            background: linear-gradient(to right, #f3f4f6, #e2e8f0);
            font-family: 'Segoe UI', sans-serif;
        }
        .card-style {
            border: none;
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            background: #fff;
        }
        .card-style:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0,0,0,0.1);
        }
        .card-img-top {
            height: 180px;
            object-fit: cover;
        }
        .search-bar {
            border-radius: 50px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .btn-filter {
            border-radius: 50px;
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
                            <li class="breadcrumb-item"><a href="#">Classes</a></li>
                        </ol>
                    </nav>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="h3 fw-bold">📚 Class List</h1>
                    <input type="text" id="classSearch" class="form-control search-bar w-50" placeholder="Search for a class...">
                </div>

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 g-4" id="classGrid">
                    <?php
                    $sql = "SELECT * FROM class";
                    $result = $link->query($sql);

                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <div class="col class-card" data-aos="fade-up">
                                <div class="card card-style h-100">
                                    <img src="../src/assets/img/masonry-blog-style-4.jpeg" class="card-img-top" alt="class image">
                                    <div class="card-body d-flex flex-column justify-content-between">
                                        <h5 class="card-title text-primary fw-semibold"><?php echo $row['name']; ?></h5>
                                        <a href="/wiki/class.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-primary btn-sm mt-3">View Details</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo '<p class="text-muted">No classes found.</p>';
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

    // Search functionality
    document.getElementById('classSearch').addEventListener('input', function () {
        const value = this.value.toLowerCase();
        document.querySelectorAll('.class-card').forEach(card => {
            const name = card.querySelector('.card-title').textContent.toLowerCase();
            card.style.display = name.includes(value) ? 'block' : 'none';
        });
    });
</script>
</body>
</html>