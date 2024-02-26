<?php
include("include/config.php");
//prendo id del tipo
$type = $_GET["type"];
if ($type == 1) {
    $name = "Alchemical";
    //alchemical
} else if ($type == 2) {
    $name = "Cooking";
    //cooking
} else if ($type == 3) {
    $name = "Magical";
    //magical
} else {
   //se non c'è un tipo valido
    header("Location: /");
    exit;
}

?>
<!DOCTYPE html >
<html lang="ita">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Hero Soul - Classes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        .zoom-on-hover {
            transition: transform 0.3s ease;
            z-index:    100;

        }

        .zoom-on-hover:hover {
            transform: scale(1.1);
            z-index:1010;
        }
        a {
            text-decoration: none;
        }

    </style>

</head>
<body class="bg-light text-center">
<?php include("include/nav.php"); ?>
<main>


    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-12">
                <h1 class="display-1">Crafting</h1>
            </div>
        </div>


    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?php echo $name; ?></h5>
        </div>
        <div class="card-header">aa</div>


    </div>






    </div>
    <?php include("include/footer.php"); ?>


</main>




<!-- Bootstrap Bundle with Popper -->







<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>

<!--
<script>
    $(document).ready(function() {
        $(".draggable-card").draggable();
    });
    //qundo finito riporto alla posizione iniziale
    $(document).ready(function() {
        $(".draggable-card").draggable({
            stop: function(event, ui) {
                $(this).animate({
                    top: 0,
                    left: 0
                });
                $(".sidebar").hide();
            }
        });
    });
    //quando trascino un elemento appare la side bar
    $(document).ready(function() {
        $(".draggable-card").draggable({
            start: function(event, ui) {
                $(".sidebar").show();
            }
        });
    });


</script>
--!>
</body>
</html>
