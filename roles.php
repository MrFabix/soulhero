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
        $sql = "SELECT * FROM roles ORDER BY nome";
        $result = mysqli_query($link, $sql);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                ?>


                <div class="col">
                        <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg zoom-on-hover " >
                                <div class="card-header">
                                <h3 class="card-title display-6 lh-1 fw-bold "><?php echo $row["nome"]; ?></h3>
                                </div>
                            <div class="card-body p-4">
                                <table class="table table-striped ">
                                    <thead>

                                    <tr>
                                        <td>Nome</td>
                                        <td>Descrizione</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                <?php
                                    $sql2 = "SELECT * FROM roles_bonus WHERE fk_role = " . $row["id_role"];
                                    $result2 = mysqli_query($link, $sql2);
                                    if (mysqli_num_rows($result2) > 0) {
                                        while($row2 = mysqli_fetch_assoc($result2)) {
                                            ?>
                                            <tr>
                                                <td class="fw-bold"><?php echo $row2["nome"]; ?></td>
                                                <td><?php echo $row2["descrizione"]; ?></td>
                                            </tr>




                                            <?php
                                        }
                                    }
                                ?>
                                    </tbody>
                                </table>


                            </div>


                        </div>
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
