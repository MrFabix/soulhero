<?php
include("include/config.php");

//prenodo in get l'id della classe
$id = $_GET["id"];

if(!isset($id)){
    header("Location: /classes.php");
}

$sql = "SELECT * FROM class WHERE id = $id";
$result = mysqli_query($link, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $nome = $row["nome"];
    $descrizione = $row["descrizione"];
    $img = $row["img"];
    $hp = $row["hp"];
}


?>

<!DOCTYPE html >
<html lang="ita">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Hero Soul - Races</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


</head>
<body class="bg-light text-center">
<?php include("include/nav.php"); ?>

<div class="container mt-5 pt-5">
    <div class="row">
        <div class="col-9">
            <h1 class="display-1"><?php echo $nome; ?></h1>
            <p class="lead"> </p> <!-- DESCRIZIONE CLASSE -->
        </div>
        <div class="col-3 pt-3">
            <div class="card">
                <h1 class="display-6 text-danger fw-bold ">CLASS HP : <?php echo $hp; ?></h1>
            </div>

        </div>
    </div>
</div>

<div class="container">

    <div class="row g-4 py-5">
        <div class="col-6">
            <div class="card text-center">
                <?php  echo $descrizione; ?>
            </div>
        </div>
        <div class="col-6">

            <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg zoom-on-hover" style="background-image: url('img/classes/<?php echo $row["img"] ?>'); background-size: cover;">
                <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                    <h3 class="pt-5 mt-5 mb-4 display-4 lh-1 fw-bold "><?php echo $row["nome"]; ?></h3>

                </div>
            </div>
        </div>


    <div class="row py-4">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Class Features</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Livello</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Descrizione</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $sql = "SELECT * FROM class_features WHERE fk_class = $id";
                            $result = mysqli_query($link, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>".$row["livello"]."</td>";
                                    echo "<td>".$row["nome"]."</td>";
                                    echo "<td>".$row["descrizione"]."</td>";
                                    echo "</tr>";
                                }
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Core Abilities
                    </h5>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Azione</th>
                            <th scope="col">Costo</th>
                            <th scope="col">Descrizione</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql = "SELECT * FROM core_abilities WHERE fk_class = $id";
                        $result = mysqli_query($link, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>".$row["nome"]."</td>";
                                echo "<td>".$row["azione"]."</td>";
                                echo "<td>".$row["costo"]."</td>";
                                echo "<td>".$row["descrizione"]."</td>";
                                echo "</tr>";
                            }
                        }

                        ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

        <div class="row py-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Secondary Abilities</h5>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Livello</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Azione</th>
                                <th scope="col">Costo</th>
                                <th scope="col">Descrizione</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sql = "SELECT * FROM secondary_abilities WHERE fk_class = $id";
                            $result = mysqli_query($link, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>".$row["livello"]."</td>";
                                    echo "<td>".$row["nome"]."</td>";
                                    echo "<td>".$row["azione"]."</td>";
                                    echo "<td>".$row["costo"]."</td>";
                                    echo "<td>".$row["descrizione"]."</td>";
                                    echo "</tr>";
                                }
                            }

                            ?>
                            </tbody>
                        </table>



                    </div>
                </div>
            </div>
        </div>


        <div class="row py-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ultimate Abilities</h5>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Azione</th>
                                <th scope="col">Costo</th>
                                <th scope="col">Descrizione</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sql = "SELECT * FROM ultimate_abilities WHERE fk_class = $id";
                            $result = mysqli_query($link, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>".$row["nome"]."</td>";
                                    echo "<td>".$row["azione"]."</td>";
                                    echo "<td>".$row["costo"]."</td>";
                                    echo "<td>".$row["descrizione"]."</td>";
                                    echo "</tr>";
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>













</div> <!-- /container -->












<?php include("include/footer.php"); ?>
<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>

