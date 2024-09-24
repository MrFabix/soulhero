<?php
include("include/config.php");

// Recupera tutte le classi
$sql = "SELECT * FROM class";
$result = $link->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Items - RPG Database</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS for RPG style -->
    <link href="style/rpg_style_table.css" rel="stylesheet">
    <!-- Google Font for RPG style -->
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Uncial+Antiqua&display=swap" rel="stylesheet">
</head>
<body>
<?php include("include/nav.php"); ?>

<!-- Sfondo e Contenitore principale -->
<div class="container mt-5 rpg-container">
    <h1 class="text-center mb-4 rpg-title">Items</h1>

    <div class="row">
        <table class="table  rpg-table" id="classes-table">
            <thead>
            <tr>
                <th>Class Name</th>
                <th>Description</th>
                <th>Details</th>
            </tr>
            </thead>
            <tbody>
            <!-- Verifica se ci sono classi nel database -->
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <!-- Colonna del nome della classe -->
                        <td><?php echo $row['nome']; ?></td>
                        <!-- Colonna della descrizione della classe -->
                        <td><?php echo $row['descrizione']; ?></td>
                        <!-- Colonna per andare ai dettagli -->
                        <td>
                            <a href="class_details.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-light">View Details</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3" class="text-center">No classes found.</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script

</body>
</html>
<script>
    $(document).ready(function() {
        $('#classes-table').DataTable({
            "paging": true,
            "searching": true,

        });
    });
</script>


<?php
// Chiudi la conessione al database
$link->close();

?>
