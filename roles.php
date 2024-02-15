<?php
include("include/config.php");



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



<div class="container mt-5 pt-5">
    <div class="row">
        <div class="col-12">
            <h1 class="display-1">Roles</h1>
            <p class="lead">Classes</p>
        </div>
    </div>
</div>


<div class="container">
    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">

        <?php
        $sql = "SELECT * FROM class order by nome";
        $result = mysqli_query($link, $sql);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                ?>


                <div class="col">
                    <a href="/classe.php?id=<?php echo $row["id"]?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Anteprima">
                        <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg zoom-on-hover draggable-card" style="background-image: url('img/classes/<?php echo $row["img"] ?>'); background-size: cover;">
                            <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                                <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold "><?php echo $row["nome"]; ?></h3>
                                <ul class="d-flex list-unstyled mt-auto">
                                    <li class="me-auto"></li>
                                    <li class="d-flex align-items-center me-3 ">
                                        <i class="bi bi-person "></i>
                                        <small><?php echo $row["nome"]; ?></small>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <i class="bi bi-heart-fill"></i>
                                        <small class="text-danger">HP <?php echo $row["hp"]; ?> </small>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
            }
        }
        ?>




    </div>
</div>





<?php include("include/footer.php"); ?>
<!-- Bootstrap Bundle with Popper -->







<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

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
