<?php
session_start();
if (!isset($_SESSION['initiative_list'])) {
    $_SESSION['initiative_list'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['clear'])) {
        $_SESSION['initiative_list'] = [];
    } elseif (isset($_POST['remove'])) {
        $idx = (int)$_POST['remove'];
        if (isset($_SESSION['initiative_list'][$idx])) {
            array_splice($_SESSION['initiative_list'], $idx, 1);
        }
    } else {
        $name = trim($_POST['name'] ?? '');
        $score = intval($_POST['score'] ?? 0);
        if ($name !== '') {
            $_SESSION['initiative_list'][] = ['name' => $name, 'score' => $score];
            usort($_SESSION['initiative_list'], function($a, $b) {
                return $b['score'] <=> $a['score'];
            });
        }
    }
    header('Location: initiative.php');
    exit;
}
$initiative = $_SESSION['initiative_list'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Initiative Tracker</title>
    <link rel="icon" href="../src/assets/img/favicon.ico" type="image/x-icon" />
    <link href="../src/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../layouts/modern-dark-menu/css/light/plugins.css" rel="stylesheet">
    <link href="../layouts/modern-dark-menu/css/dark/plugins.css" rel="stylesheet">
    <script src="../layouts/modern-dark-menu/loader.js"></script>
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
                            <li class="breadcrumb-item"><a href="../homepage.php">Toolbox</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Initiative Tracker</li>
                        </ol>
                    </nav>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form class="row g-2" method="post">
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Nome" required>
                            </div>
                            <div class="col-md-3">
                                <input type="number" name="score" class="form-control" placeholder="Iniziativa" required>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary w-100">Aggiungi</button>
                            </div>
                        </form>
                        <?php if ($initiative): ?>
                        <table class="table mt-4">
                            <thead>
                                <tr><th>Nome</th><th>Iniziativa</th><th></th></tr>
                            </thead>
                            <tbody>
                            <?php foreach ($initiative as $idx => $entry): ?>
                                <tr>
                                    <td><?= htmlspecialchars($entry['name']) ?></td>
                                    <td><?= $entry['score'] ?></td>
                                    <td>
                                        <form method="post" style="display:inline-block">
                                            <input type="hidden" name="remove" value="<?= $idx ?>">
                                            <button type="submit" class="btn btn-sm btn-link text-danger">Rimuovi</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <form method="post">
                            <button type="submit" name="clear" class="btn btn-secondary">Svuota Lista</button>
                        </form>
                        <?php endif; ?>
                    </div>
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
</body>
</html>
