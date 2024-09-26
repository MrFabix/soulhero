<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hero Soul</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Custom CSS for RPG style -->
    <link href="style/global.css" rel="stylesheet">
    <!-- Google Font for RPG style -->
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Uncial+Antiqua&display=swap" rel="stylesheet">

    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        iframe {
            width: 100%;
            height: calc(100% - 40px); /* Riduce l'altezza dell'iframe di 40px per lasciare spazio per il prossimo elemento */
            border: none;
            overflow: hidden;
        }
        .next-element {
            height: 40px; /* Altezza del prossimo elemento */
            background-color: #f0f0f0;
        }
    </style>
</head>
<body class="bg-light text-center ">
<?php include("include/nav.php"); ?>

<script type="module" src="https://unpkg.com/@splinetool/viewer@1.0.54/build/spline-viewer.js"></script>
<spline-viewer loading-anim-type="spinner-small-dark" url="https://prod.spline.design/K9qO8O6CExtC4hYl/scene.splinecode"></spline-viewer>
<div class="next-element">
    <!-- Contenuto del prossimo elemento -->

</div>


<?php include("include/footer.php"); ?>
<!-- Bootstrap Bundle with Popper -->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>
