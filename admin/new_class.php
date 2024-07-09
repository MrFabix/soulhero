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
<?php include("../include/nav.php"); ?>

<div class="container mt-5 pt-5">

</div>

<div class="container">

    <div class="row">
        <div class="card">
            <div class="card-header">
                <h1>New Ancestry</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="ancestry_name" placeholder="ancestry_name">
                            <label for="ancestry_name">Name Ancestry*</label>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <textarea  class="form-control" id="note" placeholder="Note"> </textarea>
                            <label for="note">Descrizione</label>
                        </div>
                    </div>
                </div>

                <!--BONUS ANCERSTRY-->
                <div class="row">
                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="bonus_ancestry" placeholder="bonus_ancestry">
                            <label for="bonus_ancestry">Bonus Ancestry*</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <input type="file" class="form-control" id="image" placeholder="image">
                            <label for="image">Image</label>
                        </div>





                    </div>

                    <div class="card-footer">
                        <button onclick="salva()" class="btn btn-success" id="btn_salva">Save Ancestry</button>
                    </div>
                </div>
            </div>
















        </div> <!-- /container -->












        <?php include("../include/footer.php"); ?>
        <!-- Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>

