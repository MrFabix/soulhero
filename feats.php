<?php
include("include/config.php");

$sql ="SELECT * from general_feats";

$result = $link->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>General Feats - RPG Database</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Uncial+Antiqua&display=swap" rel="stylesheet">
    <!-- Custom CSS specific to Weapons page -->
    <link href="style/rpg_style_table.css" rel="stylesheet">
    <style>
        /* Stile globale per il font */
        body, html {
            font-family: 'Cinzel', serif;
            color: #f4f4f4;
            height: 100%;
            margin: 0;
            padding: 0;
        }

        /* Flexbox per allungare il contenitore */
        body {
            display: flex;
            flex-direction: column;
        }

        .rpg-container {
            flex: 1;
            flex-direction: column;
            justify-content: space-between;
            padding: 20px 0;
        }

        /* Stile per il titolo */
        h1 {
            font-family: 'Uncial Antiqua', serif;
            color: #f7d794;
        }

        /* Customizzazione della tabella */
        .dataTables_wrapper .dataTables_filter input {
            font-family: 'Cinzel', serif;
            border: 1px solid #d4af37;
            background-color: rgba(0, 0, 0, 0.3);
            color: #f4f4f4;
        }

        .dataTables_wrapper .dataTables_length select {
            font-family: 'Cinzel', serif;
            border: 1px solid #d4af37;
            background-color: rgba(0, 0, 0, 0.3);
            color: #f4f4f4;
        }

        .table th, .table td {
            color: #f4f4f4;
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid #d4af37;
        }

        /* Ottimizzazione per dispositivi mobili */
        @media (max-width: 767px) {
            h1 {
                font-size: 1.5rem;
            }
            .table {
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<?php include("include/nav.php"); ?>

<body >

<div class="container rpg-container mt-5">
    <h1 class="text-center mb-4">Feats</h1>

    <!-- Tabella delle armi -->
    <div class="table-responsive">
        <table id="weapons-table" class="table">
            <thead>
            <tr>
                <th>Skill Name</th>
                <th>Prerequisite</th>
                <th>Bonus</th>

            </tr>
            </thead>
            <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['prerequisite']; ?></td>
                        <td><?php echo $row['bonus']; ?></td>


                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">No weapons found.</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include("include/footer.php"); ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!-- jQuery and DataTables JS -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

<!-- Script per inizializzare DataTables -->
<script>
    $(document).ready(function() {
        $('#weapons-table').DataTable({
            "paging": true,
            "responsive": true,
            "searching": true,
            "ordering": true,
            "pageLength": 25,
            "lengthChange": true,
            "language": {
                "search": "Search Weapons:",
                "lengthMenu": "Show _MENU_ entries per page",
                "zeroRecords": "No weapons found",
                "info": "Showing _PAGE_ of _PAGES_",
                "infoEmpty": "No records available",
                "infoFiltered": "(filtered from _MAX_ total records)"
            }
        });
    });
</script>

</body>
</html>

<?php
// Chiudi la connessione al database
$link->close();
?>