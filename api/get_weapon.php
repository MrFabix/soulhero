<?php
include '../include/config.php';
$id = $_GET['id'];
$sql = "SELECT * FROM weapons WHERE id = $id";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    echo json_encode($result->fetch_assoc());
}
?>
