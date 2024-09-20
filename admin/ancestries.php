<?php
include('../include/config.php');

// Recupera tutte le stirpi
$sql = "SELECT * FROM Ancestries";
$result = $link->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Ancestries</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Ancestries - Admin</h1>
    <div class="text-end mb-3">
        <a href="create_ancestry.php" class="btn btn-success">Create New Ancestry</a>
    </div>
    <div class="row">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Bonus Stats</th>
                <th>Penalties</th>
                <th>Abilities</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id_stirpe']; ?></td>
                        <td><?php echo $row['nome_stirpe']; ?></td>
                        <td><?php echo $row['bonus_stat']; ?></td>
                        <td><?php echo $row['penalità_stat']; ?></td>
                        <td><?php echo $row['abilità_speciali']; ?></td>
                        <td>
                            <a href="edit_ancestry.php?id=<?php echo $row['id_stirpe']; ?>" class="btn btn-primary">Edit</a>
                            <a href="delete_ancestry.php?id=<?php echo $row['id_stirpe']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this ancestry?');">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">No ancestries found.</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$link->close();
?>
